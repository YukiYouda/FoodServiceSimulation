<?php

namespace Restaurants;

use FoodOrders\FoodOrder;
use Invoices\Invoice;

class Restaurant {
    private array $menu;
    private array $employees;

    public function __construct(array $menu, array $employees)
    {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function getMenu(): array
    {
        return $this->menu;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function order(FoodOrder $foodOrder): Invoice
    {
        $employees = $this->getEmployees();
        $foodItems = $foodOrder->getItems();
        $invoice = new \Invoices\Invoice($foodOrder);

        for ($i = 0; $i < count($employees); $i++) {
            $fullClassName = get_class($employees[$i]);
            $className = basename(str_replace('\\', '/', $fullClassName));
            if ($className == "Chef") {
                $chef = $employees[$i];
                $chefName = $chef->getName();
            } elseif ($className == "Cashier") {
                $cashier = $employees[$i];
                $cashierName = $cashier->getName();
            }
        }

        echo $cashierName . " recieved the order.\n";

        for ($i = 0; $i < count($foodItems); $i++) {
            echo $chefName . " was cooking " . $foodItems[$i]->getName() . "\n";
        }

        echo $chefName . " took " . $invoice->getEstimatedTimeInMinutes() . " minutes to cook.\n";

        echo $cashierName . " made the invoice.";

        return $invoice;
    }
}