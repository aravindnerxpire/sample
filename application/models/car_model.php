<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Car_model extends CI_Model {

    public $name;

    public function __construct($name = '') {
        parent::__construct();
        $this->name = $name;
    }

    // Abstract method that must be implemented by subclasses
    abstract public function intro(): string;
}

// Audi Model
class Audi_model extends Car_model {

    public function __construct($name = 'Audi') {
        parent::__construct($name);
    }

    public function intro(): string {
        return "Choose German quality! I'm an $this->name!";
    }
}

// Volvo Model
class Volvo_model extends Car_model {

    public function __construct($name = 'Volvo') {
        parent::__construct($name);
    }

    public function intro(): string {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

// Citroen Model
class Citroen_model extends Car_model {

    public function __construct($name = 'Citroen') {
        parent::__construct($name);
    }

    public function intro(): string {
        return "French extravagance! I'm a $this->name!";
    }
}
