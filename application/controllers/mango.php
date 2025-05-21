<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mango extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mango_model');
      

        // Skip session check for login and logout
        $allowed = ['login', 'logout'];

        if (!in_array($this->router->fetch_method(), $allowed)) {
            $this->check_login();
        }
    }

    private function check_login() {
        if (!$this->session->userdata('user_id')) {
            redirect('mango/login');
        }
    }

    public function index() {
        redirect('mango/login');
    }

    public function view() {
        $data['mangos'] = $this->Mango_model->get_all_mango_with_pineapple();
        $this->load->view('mango_view', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $mango_data = [
                'name' => $this->input->post('name'),
                'age' => $this->input->post('age')
            ];

            $pineapple_data = [
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $this->Mango_model->insert_mango_with_pineapple($mango_data, $pineapple_data);
            redirect('mango/view');
        } else {
            $this->load->view('mango_create');
        }
    }

    public function edit($id) {
        $data['mango'] = $this->Mango_model->get_mango_with_pineapple($id);
        if (!$data['mango']) {
            show_404();
        }
        $this->load->view('mango_edit', $data);
    }

    public function update($id) {
        if ($this->input->post()) {
            $mango_data = [
                'name' => $this->input->post('name'),
                'age' => $this->input->post('age')
            ];

            $pineapple_data = [
                'email' => $this->input->post('email')
            ];

            $password = $this->input->post('password');
            if (!empty($password)) {
                $pineapple_data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->Mango_model->update_mango_with_pineapple($id, $mango_data, $pineapple_data);
            redirect('mango/view');
        } else {
            redirect('mango/edit/' . $id);
        }
    }

    public function delete($id) {
        $this->Mango_model->delete_mango_with_pineapple($id);
        redirect('mango/view');
    }

    public function login() {
        $secretKey = "6Lfx4T8rAAAAAHGoJnXbb0esWJxIwfqoRo3Oulby";

        if ($this->input->post()) {
            $recaptchaResponse = $this->input->post('g-recaptcha-response');
            $verifyResponse = file_get_contents(
                'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recaptchaResponse
            );
            $responseData = json_decode($verifyResponse);

            if ($responseData && $responseData->success) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->Mango_model->get_user_by_email($email);

                if ($user && password_verify($password, $user->password)) {
                    $this->session->set_userdata('user_id', $user->id);
                    $this->session->set_userdata('user_email', $user->email);
                    redirect('mango/view');
                } else {
                    $data['error'] = "Invalid email or password.";
                    $this->load->view('mango_login', $data);
                }
            } else {
                $data['error'] = "reCAPTCHA verification failed. Please try again.";
                $this->load->view('mango_login', $data);
            }
        } else {
            $this->load->view('mango_login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();
        redirect('mango/login');
    }
}
