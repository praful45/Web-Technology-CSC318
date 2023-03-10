<?php
    class Vehicle {
        protected $make;
        protected $model;
        protected $year;
      
        public function __construct($make, $model, $year) {
          $this->make = $make;
          $this->model = $model;
          $this->year = $year;
        }
      
        public function getMake() {
          return $this->make;
        }
      
        public function getModel() {
          return $this->model;
        }
      
        public function getYear() {
          return $this->year;
        }
      
        public function getInfo() {
          return "Make: {$this->make}<br> Model: {$this->model}<br> Year: {$this->year}";
        }
      }
      
      class Car extends Vehicle {
        protected $numDoors;
      
        public function __construct($make, $model, $year, $numDoors) {
          parent::__construct($make, $model, $year);
          $this->numDoors = $numDoors;
        }
      
        public function getNumDoors() {
          return $this->numDoors;
        }
      
        public function getInfo() {
          return parent::getInfo() . "<br> Number of Doors: {$this->numDoors}";
        }
      
        public function drive() {
          return "Driving the car...";
        }
      }
      
      class Motorcycle extends Vehicle {
        protected $engineSize;
      
        public function __construct($make, $model, $year, $engineSize) {
          parent::__construct($make, $model, $year);
          $this->engineSize = $engineSize;
        }
      
        public function getEngineSize() {
          return $this->engineSize;
        }
      
        public function getInfo() {
          return parent::getInfo() . "<br> Engine Size: {$this->engineSize}";
        }
      
        public function ride() {
          return "Riding the motorcycle...";
        }
      }
      
      // Create objects of child classes and access their functions
      $car = new Car("Toyota", "Corolla", 2022, 4);
      echo $car->getInfo() . "<br>";
      echo $car->drive() . "<br><br>";
      
      $motorcycle = new Motorcycle("Harley Davidson", "Sportster", 2021, "1200cc");
      echo $motorcycle->getInfo() . "<br>";
      echo $motorcycle->ride() . "<br><br>";
      
?>