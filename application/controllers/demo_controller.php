<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Car_model');
    }

    public function index()
    {
        $intros = $this->Car_model->getCarsIntro();

        $data['audi_intro'] = $intros['audi'];
        $data['volvo_intro'] = $intros['volvo'];
        $data['citroen_intro'] = $intros['citroen'];

        $this->load->view('demo_view', $data);
    }
}
