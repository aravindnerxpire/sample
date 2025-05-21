<?php
class Dog {
    public $name;
    public $breed;

    public function bark() {
        return "Woof! Woof!<br>";
    }

    public function fetch() {
        return "{$this->name} is fetching.<br>";
    }
}
