<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function register()
    {
        $this->call->library('auth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');
            $role = $this->io->post('role') ?? 'user';

            if ($this->auth->register($username, $password, $role)) {
                redirect(site_url('auth/login'));
            }
        }

        $this->call->view('auth/register');
    }

    public function login()
    {
        $this->call->library('auth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($this->auth->login($username, $password)) {
                redirect(site_url('auth/dashboard'));
            } else {
                echo "Login failed!";
            }
        }

        $this->call->view('auth/login');
    }

    public function dashboard()
    {
        $this->call->library('auth');

        if (!$this->auth->is_logged_in()) {
            redirect(site_url('auth/login'));
        }

        $this->call->view('auth/dashboard');
    }

    public function logout()
    {
        $this->call->library('auth');
        $this->auth->logout();
        redirect(site_url('auth/login'));
    }
}
