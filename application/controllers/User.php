<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mango_model');
        $this->load->model('Pineapple_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        if ($this->session->userdata('user_id')) {
            redirect('user/dashboard');
        } else {
            redirect('user/login');
        }
    }

    public function register() {
        if ($this->input->post('create')) {
            $name = $this->input->post('name', TRUE);
            $age = $this->input->post('age', TRUE);
            $email = $this->input->post('email', TRUE);
            $password = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT);

            $mango_data = array(
                'name' => $name,
                'age' => $age
            );

            $mango_id = $this->Mango_model->insert_user($mango_data);

            if ($mango_id) {
                $pineapple_data = array(
                    'mango_id' => $mango_id,
                    'email' => $email,
                    'password' => $password
                );

                $this->Pineapple_model->insert_profile($pineapple_data);

                $this->session->set_userdata('user_id', $mango_id);
                $this->session->set_userdata('user_name', $name);

                redirect('user/dashboard');
            } else {
                $data['error'] = 'Failed to register. Please try again.';
                $this->load->view('register', $data);
            }
        } else {
            $this->load->view('register');
        }
    }

    public function login() {
        if ($this->input->post('login')) {
            $email = $this->input->post('email', TRUE);
            $password_input = $this->input->post('password', TRUE);

            $pineapple = $this->Pineapple_model->get_user_by_email($email);

            if ($pineapple && password_verify($password_input, $pineapple['password'])) {
                $mango = $this->Mango_model->get_user_by_id($pineapple['mango_id']);
                $this->session->set_userdata('user_id', $mango['id']);
                $this->session->set_userdata('user_name', $mango['name']);
                redirect('user/dashboard');
            } else {
                $data['error'] = 'Invalid email or password';
                $this->load->view('login', $data);
            }
        } else {
            $this->load->view('login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('user_id')) {
            redirect('user/login');
        }

        $data['users'] = $this->Mango_model->get_all_users();
        $this->load->view('dashboard', $data);
    }

    public function edit($id) {
        if (!$this->session->userdata('user_id')) {
            redirect('user/login');
        }

        $data['user'] = $this->Mango_model->get_user_by_id($id);

        if ($this->input->post('update')) {
            $name = $this->input->post('name', TRUE);
            $age = $this->input->post('age', TRUE);
            $email = $this->input->post('email', TRUE);
            $password = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT);

            $mango_data = array(
                'name' => $name,
                'age' => $age
            );

            $pineapple_data = array(
                'email' => $email,
                'password' => $password
            );

            $this->Mango_model->update_user($id, $mango_data);
            $this->Pineapple_model->update_profile($id, $pineapple_data);

            redirect('user/dashboard');
        } else {
            $this->load->view('edit', $data);
        }
    }

    public function delete($id) {
        if (!$this->session->userdata('user_id')) {
            redirect('user/login');
        }

        $this->Pineapple_model->delete_profile($id);
        $this->Mango_model->delete_user($id);

        redirect('user/dashboard');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/login');
    }
}
