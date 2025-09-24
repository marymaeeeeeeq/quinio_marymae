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

    public function file_upload() {
    //     if($_POST) {
    //         $target_dir = "uploads/";
    //         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //         $uploadOk = 1;
    //         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //     if(isset($_POST["submit"])) {
    //         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //         if($check !== false) {
    //             echo "File is an image - " . $check["mime"] . ".";
    //             $uploadOk = 1;
    //         } else {
    //             echo "File is not an image.";
    //             $uploadOk = 0;
    //         }
    //     }

    //     if (file_exists($target_file)) {
    //         echo "Sorry, file already exists.";
    //         $uploadOk = 0;
    //     }

    //     if ($_FILES["fileToUpload"]["size"] > 500000) {
    //         echo "Sorry, your file is too large.";
    //         $uploadOk = 0;
    //     }

    //     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //     && $imageFileType != "gif" ) {
    //         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //         $uploadOk = 0;
    //     }

    //     if ($uploadOk == 0) {
    //         echo "Sorry, your file was not uploaded.";
    //     } else {
    //         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //             echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    //         } else {
    //             echo "Sorry, there was an error uploading your file.";
    //         }
    //     }
    // }

    $this->call->view('upload_form');
    }
}