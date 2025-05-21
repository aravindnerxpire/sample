<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dog_controller extends CI_Controller {

    public function index() {
        // Load Dog class from libraries
        $this->load->model('Dog');

        $dog1 = new Dog();
        $dog2 = new Dog();

        $dog1->name = "Buddy";
        $dog1->breed = "Labrador";

        $dog2->name = "Max";
        $dog2->breed = "Golden Retriever";

        $output = '';
        $output .= $dog1->bark();
        $output .= $dog2->fetch();

        $data['dog_output'] = $output;

        $this->load->view('dog_view', $data);
    }
}