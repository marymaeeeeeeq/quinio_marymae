<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {

    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('StudentModel');
    }

    public function getAll() 
    {
        $data['students'] = $this->StudentModel->all();
        $this->call->view('index', $data);
    }

    public function create()
    {
        if($this->io->method() == 'post') {
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if($this->StudentModel->insert($data)) {
                redirect(site_url('/students'));
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('create');
        }
    }

    public function update($id) {
        $data['student'] = $this->StudentModel->find($id);
        if($this->io->method() == 'post') {
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if($this->StudentModel->update($id, $data)) {
                redirect(site_url('/students'));
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('update', $data);
        }
    }

    public function delete($id) 
    {
        if($this->StudentModel->delete($id)) {
            redirect(site_url('/students'));
        } else {
            echo 'Something went wrong';
        }
    }
}
