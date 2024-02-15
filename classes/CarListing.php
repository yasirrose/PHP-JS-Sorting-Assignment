<?php

class CarListing {
    
    function getCarData(string $sort='asc') {
        
        $jsonData = '[
            {"car_name": "Tesla Model S", "price": 79999, "discount": 5000, "hand": 4, "availability" : "In Stock", "color" : "Red"},
            {"car_name": "Toyota Prius", "price": 24999, "discount": 2000, "hand": 2, "availability" : "Out of Stock", "color" : "Blue"},
            {"car_name": "Ford Mustang", "price": 55999, "discount": 3000, "hand": 3, "availability" : "In Stock", "color" : "Black"},
            {"car_name": "Audi A4", "price": 39999, "discount": 4500, "hand": 1, "availability" : "In Stock", "color" : "White"},
            {"car_name": "BMW 3 Series", "price": 41999, "discount": 4000, "hand": 1, "availability" : "Out of Stock", "color" : "Silver"}
        ]';
        
        $qGetCars = json_decode($jsonData, true);

        return $this->sort($qGetCars, $sort);
    }

    function sort($dataArray, $sortType) {
        if ($sortType == 'asc') {
            usort($dataArray, array($this,'sortByPrice'));
        } elseif ($sortType == 'desc') {
            usort($dataArray, array($this,'sortByPrice'));
            $dataArray = array_reverse($dataArray);
        }

        return $dataArray;
    }

    private static function sortByPrice($a,$b) {
        return $a["price"] - $b["price"];
    }
}