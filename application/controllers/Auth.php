<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_Model');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        if (!$this->session->has_userdata('email')) {
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Hepi Mart - Login Page';
                $this->load->view('auth/login', $data);
            } else {
                $this->_subLogin();
            }
        } else {
            redirect('welcome');
        }
    }

    private function _subLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Auth_Model->loginUser($email);
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $dataSession = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'level' => $user['level']
                    ];
                    if ($user['level'] == 'Owner') {
                        //set session for 30 minutes
                        $this->session->sess_expiration = '43200'; //12 Jam
                        $this->session->sess_expire_on_close = 'true';
                    } else if ($user['level'] == 'Admin') {
                        //set session for 30 minutes
                        $this->session->sess_expiration = '43200'; //12 Jam
                        $this->session->sess_expire_on_close = 'true';
                    } else {
                        //set session for 30 minutes
                        $this->session->sess_expiration = '7200'; //2 Jam
                        $this->session->sess_expire_on_close = 'true';
                    }
                    $this->Auth_Model->updateLastLogin($user['id_user']);
                    $this->session->set_userdata($dataSession);
                    if ($this->session->has_userdata('checkout_url')) {
                        redirect($this->session->userdata('checkout_url'));
                    } else {
                        ($this->session->level == 'Admin') ? redirect('dashboard/admin') : redirect('dashboard/customers');
                    }
                } else {
                    $this->freeM->getAlertBS('message', 'danger', 'Error!', 'Wrong password.');
                    redirect('auth/login');
                }
            } else {
                $this->freeM->getAlertBS('message', 'danger', 'Error!', 'This email has not been activated.');
                redirect('auth/login');
            }
        } else {
            $this->freeM->getAlertBS('message', 'danger', 'Error!', 'Email is not registered.');
            redirect('auth/login');
        }
    }

    public function register()
    {
        if (!$this->session->has_userdata('email')) {
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim|min_length[3]');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|min_length[1]');
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[data_user.email]', [
                'is_unique' => 'This email already exist'
            ]); //UNTUK TESTING, PASSWORD MIN LENGTH 1
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password1]|min_length[1]|max_length[50]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short, Min 8 Characters!'
            ]);
            $this->form_validation->set_rules('password1', ' ', 'trim|required|matches[password]', [
                'matches' => ' '
            ]);
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Hepi Mart - Register Page';
                $this->load->view('auth/register', $data);
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('fname', true)) . ' ' .
                        htmlspecialchars($this->input->post('lname', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'level' => 'Member'
                ];
                if ($this->Auth_Model->regisUser($data)) {
                    $this->freeM->getAlertBS('message', 'success', 'Congratulation!', 'Your account has been created. Please Login.');
                    redirect('auth/login');
                } else {
                    $this->freeM->getAlertBS('message', 'danger', 'Upss!', 'Your account cant not be created. Please Try Again.');
                }
            }
        } else {
            redirect('welcome');
        }
    }

    public function logout()
    {
        if ($this->session->has_userdata('email')) {
            $this->Auth_Model->lastLoginReset($this->session->id_user);
            $this->session->unset_userdata(['email', 'nama', 'level', 'id_user', 'checkout_url',]);
            $this->freeM->getAlertBS('message', 'success', 'Congratulation!', 'Your has been logged out.');
            $this->cart->destroy();
            redirect('auth/login');
            // $this->session->sess_destroy();
        } else {
            redirect('welcome');
        }
    }
}
