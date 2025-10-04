<?php
class Auth {
    protected $_lava;
    protected $session;

    protected $db;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');
    }

    public function register($username, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->table('users')->insert([
            'username' => $username,
            'password' => $hash,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function login($username, $password)
    {
        $user = $this->db->table('users')->where('username',$username)->get();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);
            return true;
        }
        return false;
    }

    public function is_logged_in()
    {
        return(bool) $this->session->userdata('logged_in');
    }

    public function has_role($role)
    {
        return $this->session->userdata('role') === $role;
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }
}
?>