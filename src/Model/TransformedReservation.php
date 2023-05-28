<?php

namespace PrevioTest\Model;

class TransformedReservation extends AbstractJsonSerializableModel
{
    private int $reservationId;
    private string $firstName;
    private string $lastName;
    private string $room;
    private Term $term;
    private array $priceToBePaid = [];

    /**
     * @return int
     */
    public function getReservationId(): int
    {
        return $this->reservationId;
    }

    /**
     * @param int $reservationId
     * @return TransformedReservation
     */
    public function setReservationId(int $reservationId): TransformedReservation
    {
        $this->reservationId = $reservationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return TransformedReservation
     */
    public function setFirstName(string $firstName): TransformedReservation
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return TransformedReservation
     */
    public function setLastName(string $lastName): TransformedReservation
    {
        $this->lastName = $lastName;
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
     * @return TransformedReservation
     */
    public function setRoom(string $room): TransformedReservation
    {
        $this->room = $room;
        return $this;
    }

    /**
     * @return Term
     */
    public function getTerm(): Term
    {
        return $this->term;
    }

    /**
     * @param Term $term
     * @return TransformedReservation
     */
    public function setTerm(Term $term): TransformedReservation
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @return array
     */
    public function getPriceToBePaid(): array
    {
        return $this->priceToBePaid;
    }

    /**
     * @param array $priceToBePaid
     * @return TransformedReservation
     */
    public function setPriceToBePaid(array $priceToBePaid): TransformedReservation
    {
        $this->priceToBePaid = $priceToBePaid;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}