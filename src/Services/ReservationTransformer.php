<?php

namespace PrevioTest\Services;

use PrevioTest\Enums\Currency;
use PrevioTest\Enums\ReservationType;
use PrevioTest\Model\Price;
use PrevioTest\Model\Reservation;
use PrevioTest\Model\Term;
use PrevioTest\Model\TransformedReservation;

class ReservationTransformer
{
    private FileManager $fileManager;
    private ReservationParser $reservationParser;

    public function __construct()
    {
        $this->fileManager = new FileManager();
        $this->reservationParser = new ReservationParser();
    }

    /**
     * @param string $inputFilePath
     * @param string $outputFilePath
     * @return void
     * @throws \Exception
     */
    public function transform(string $inputFilePath, string $outputFilePath): void
    {
        $data = $this->fileManager->readFile($inputFilePath);

        $transformedReservations = [];
        foreach ($data as $reservationJsonData) {
            $reservation = $this->reservationParser->parseJsonData($reservationJsonData);

            [$firstName, $lastName] = explode(' ', $reservation->getGuest(), 2);

            $transformedReservation = (new TransformedReservation())
                ->setReservationId($reservation->getReservationId())
                ->setFirstName($firstName)
                ->setLastName($lastName)
                ->setRoom($reservation->getRoom())
                ->setTerm($this->transformTerm($reservation))
                ->setPriceToBePaid($this->transformPriceToBePaid($reservation));

            $transformedReservations[] = $transformedReservation;
        }

        $this->fileManager->writeFile($outputFilePath, json_encode($transformedReservations, JSON_PRETTY_PRINT));
    }


    /**
     * @param Reservation $reservation
     * @return Term
     * @throws \Exception
     */
    private function transformTerm(Reservation $reservation): Term
    {
        $dates = array_keys($reservation->getPrices());
        $from = new \DateTime($dates[0]);
        $to = new \DateTime($dates[count($dates) - 1]);

        return match ($reservation->getType()) {
            ReservationType::TYPE_DAY => new Term($from->format('Y-m-d'), $to->format('Y-m-d'), count($dates) + 1, null),
            ReservationType::TYPE_HOUR => new Term($from->format('c'), $to->format('c'), null, count($dates)),
        };
    }

    /**
     * @param Reservation $reservation
     * @return Price[]
     */
    private function transformPriceToBePaid(Reservation $reservation): array
    {
        $remainingPayment = array_sum($reservation->getPrices()) - $reservation->getAlreadyPaid();

        $priceToBePaidCZK = new Price(Currency::CZK->value, round($reservation->getCurrency() === Currency::CZK ? $remainingPayment : $remainingPayment * 26, 2));
        $priceToBePaidEUR = new Price(Currency::EUR->value, round($reservation->getCurrency() === Currency::EUR ? $remainingPayment : $remainingPayment / 26, 2));

        return [$priceToBePaidCZK, $priceToBePaidEUR];
    }
}