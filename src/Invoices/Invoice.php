<?php

namespace Invoices;

use FoodOrders\FoodOrder;

class Invoice {
    private float $finalPrice;
    private string $orderTime;
    private int $estimatedTimeInMinutes;

    public function __construct(FoodOrder $foodOrder)
    {
        $items = $foodOrder->getItems();
        $totalPrice = 0;
        $totalTime = 0;

        for ($i = 0; $i < count($items); $i++) {
            $totalPrice += $items[$i]->getPrice();
            $totalTime += $items[$i]->getEstimatedTimeInMinutes();
        }

        $this->finalPrice = $totalPrice;
        $this->orderTime = $foodOrder->getOrderTime();
        $this->estimatedTimeInMinutes = $totalTime;
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