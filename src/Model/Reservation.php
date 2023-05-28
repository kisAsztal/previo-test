<?php

namespace PrevioTest\Model;

use PrevioTest\Enums\Currency;
use PrevioTest\Enums\ReservationType;

class Reservation
{
    private int $reservationId;
    private string $guest;
    private string $room;
    private ReservationType $type;
    private array $prices;
    private Currency $currency;
    private int $alreadyPaid;

    /**
     * @return int
     */
    public function getReservationId(): int
    {
        return $this->reservationId;
    }

    /**
     * @param int $reservationId
     * @return Reservation
     */
    public function setReservationId(int $reservationId): Reservation
    {
        $this->reservationId = $reservationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getGuest(): string
    {
        return $this->guest;
    }

    /**
     * @param string $guest
     * @return Reservation
     */
    public function setGuest(string $guest): Reservation
    {
        $this->guest = $guest;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     * @return Reservation
     */
    public function setRoom(string $room): Reservation
    {
        $this->room = $room;
        return $this;
    }

    /**
     * @return ReservationType
     */
    public function getType(): ReservationType
    {
        return $this->type;
    }

    /**
     * @param ReservationType $type
     * @return Reservation
     */
    public function setType(ReservationType $type): Reservation
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param array $prices
     * @return Reservation
     */
    public function setPrices(array $prices): Reservation
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     * @return Reservation
     */
    public function setCurrency(Currency $currency): Reservation
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int
     */
    public function getAlreadyPaid(): int
    {
        return $this->alreadyPaid;
    }

    /**
     * @param int $alreadyPaid
     * @return Reservation
     */
    public function setAlreadyPaid(int $alreadyPaid): Reservation
    {
        $this->alreadyPaid = $alreadyPaid;
        return $this;
    }


}