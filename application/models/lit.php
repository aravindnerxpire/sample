<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lit extends CI_Model {

    private $name;
    private $color;
    private $weight;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFruit($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function setStrawberry($name, $color, $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    private function introFruit()
    {
        return "The fruit is {$this->name} and the color is {$this->color}.";
    }

    private function introStrawberry()
    {
        return "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }

    // Public functions to expose the private intros
    public function getFruitIntro()
    {
        return $this->introFruit();
    }

    public function getStrawberryIntro()
    {
        return $this->introStrawberry();
    }
}
