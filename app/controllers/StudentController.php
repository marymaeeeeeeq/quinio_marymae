<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {

    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('StudentModel');
        $this->call->library('auth');

        if (!$this->auth->is_logged_in()) {
            redirect(site_url('auth/login'));
        }

        if (!$this->auth->has_role('admin')) {
            echo "Access denied!";
            exit;
        }
    }

    public function getAll() 
    {
        $page = 1;
        if(isset($_GET['page']) &&! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) &&! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $all = $this->StudentModel->page($q, $records_per_page, $page);

        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];

        $this->pagination->set_options([
            'total_rows' => $total_rows,
            'per_page' => $records_per_page,
            'cur_page' => $page,
            'first_link' => '|<< First',
            'last_link' => 'Last >>|',
            'next_link' => 'Next ->',
            'prev_link' => '<- Prev',
            'page_delimiter' => '&page='
        ]);

        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            site_url('/students').'?q='.$q
        );

        $data['page'] = $this->pagination->paginate();

        $data['students'] = $this->StudentModel->all();
        $this->call->view('index', $data);
    }

    public function uploadForm() {
        $this->call->view('upload_form');
    }
    public function upload() 
    {
        $this->call->library('upload', $_FILES["userfile"]);

        $this->upload
            ->max_size(5)
            ->min_size(1)
            ->set_dir('uploads')
            ->allowed_extensions(['jpg','jpeg','png','gif'])
            ->allowed_mimes(['image/jpg','image/jpeg','image/png','image/gif'])
            ->is_image()
            ->encrypt_name();

        if($this->upload->do_upload()) {
            $data['filename'] = $this->upload->get_filename();
            $this->call->view('upload_success', $data);
        } else {
            $data['errors'] = $this->upload->get_errors();
            $this->call->view('upload_form', $data);
        }
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