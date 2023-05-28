<?php

namespace PrevioTest\Model;

class Term extends AbstractJsonSerializableModel
{
    private string $from;
    private string $to;
    private ?int $nights;
    private ?int $hours;

    /**
     * @param string $from
     * @param string $to
     * @param int|null $nights
     * @param int|null $hours
     */
    public function __construct(string $from, string $to, ?int $nights, ?int $hours)
    {
        $this->from = $from;
        $this->to = $to;
        $this->nights = $nights;
        $this->hours = $hours;
    }


    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return Term
     */
    public function setFrom(string $from): Term
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return Term
     */
    public function setTo(string $to): Term
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNights(): ?int
    {
        return $this->nights;
    }

    /**
     * @param int|null $nights
     * @return Term
     */
    public function setNights(?int $nights): Term
    {
        $this->nights = $nights;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHours(): ?int
    {
        return $this->hours;
    }

    /**
     * @param int|null $hours
     * @return Term
     */
    public function setHours(?int $hours): Term
    {
        $this->hours = $hours;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}