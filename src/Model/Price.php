<?php

namespace PrevioTest\Model;

class Price extends AbstractJsonSerializableModel
{
    private string $currency;
    private float $price;

    /**
     * @param string $currency
     * @param float $price
     */
    public function __construct(string $currency, float $price)
    {
        $this->currency = $currency;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Price
     */
    public function setCurrency(string $currency): Price
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Price
     */
    public function setPrice(float $price): Price
    {
        $this->price = $price;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}