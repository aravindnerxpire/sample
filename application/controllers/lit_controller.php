<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lit_controller extends CI_Controller {

    public function index()
    {
        // Load the model (filename: application/models/Lit.php)
        $this->load->model('Lit');

        // Set and get Fruit intro
        $this->Lit->setFruit("Apple", "Green");
        $fruit_intro = $this->Lit->getFruitIntro();

        // Set and get Strawberry intro
        $this->Lit->setStrawberry("Strawberry", "Red", 50);
        $strawberry_intro = $this->Lit->getStrawberryIntro();

        // Pass data to the view
        $data['fruit_intro'] = $fruit_intro;
        $data['strawberry_intro'] = $strawberry_intro;

        // Load the view (filename: application/views/litra.php)
        $this->load->view('litra', $data);
    }
}
