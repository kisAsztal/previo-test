<?php

namespace PrevioTest\Services;

use PrevioTest\Enums\Currency;
use PrevioTest\Enums\ReservationType;
use PrevioTest\Model\Reservation;

class ReservationParser
{
    /**
     * @param array $data
     * @return Reservation
     * @throws \Exception
     */
    public function parseJsonData(array $data): Reservation
    {
        $this->validateData($data);

        try {
            $reservation = (new Reservation())
                ->setReservationId($data["reservationId"])
                ->setGuest($data["guest"])
                ->setRoom($data["room"])
                ->setType(ReservationType::tryFrom($data["type"]))
                ->setPrices($data["prices"])
                ->setCurrency(Currency::tryFrom($data["currency"]))
                ->setAlreadyPaid($data["alreadyPaid"]);
        } catch (\Throwable $e) {
            throw new \Exception("Couldn't parse json data to Reservation:" . $e->getMessage());
        }

        return $reservation;
    }

    /**
     * @param array $data
     * @return void
     * @throws \Exception
     */
    private function validateData(array $data): void
    {
        $requiredFields = ['reservationId', 'guest', 'room', 'type', 'prices', 'currency', 'alreadyPaid'];

        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $data)) {
                throw new \Exception("Missing required field: " . $field);
            }
        }
    }
}