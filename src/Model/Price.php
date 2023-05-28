<?php

namespace PrevioTest\Model;

class Price extends AbstractJsonSerializableModel
{
    private string $currency;
    private string $price;

    /**
     * @param string $currency
     * @param string $price
     */
    public function __construct(string $currency, string $price)
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
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return Price
     */
    public function setPrice(string $price): Price
    {
        $this->price = $price;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}