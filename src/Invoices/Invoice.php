<?php

namespace Invoices;

use FoodOrders\FoodOrder;

class Invoice {
    private float $finalPrice;
    private string $orderTime;
    private int $estimatedTimeInMinutes;

    public function __construct(float $finalPrice, string $orderTime, int $estimatedTimeInMinutes)
    {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    public function printInvoice(): void
    {
        echo "-------------------------------\n";
        echo "Date: " . $this->orderTime . "\n";
        echo "Final Price: $" . $this->finalPrice . "\n";
        echo "-------------------------------\n";
    }

    public function getEstimatedTimeInMinutes(): int
    {
        return $this->estimatedTimeInMinutes;
    }
}