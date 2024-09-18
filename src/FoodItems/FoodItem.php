<?php

namespace FoodItems;

abstract class FoodItem {
    protected string $name;
    protected string $description;
    protected float $price;
    protected int $estimatedTimeInMinutes;

    public function __construct(string $name, string $description, float $price, int $estimatedTimeInMinutes)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    abstract public static function getCategory(): string;

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEstimatedTimeInMinutes(): int
    {
        return $this->estimatedTimeInMinutes;
    }

}