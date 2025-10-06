<?php
class Auth {
    private $_lava;
    protected $session;

    protected $db;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');
        $this->session = load_class('session');
    }

    public function register($username, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->_lava->db->table('users')->insert([
            'username' => $username,
            'password' => $hash,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function login($username, $password)
    {
        $user = $this->_lava->db->table('users')->where('username',$username)->get();

        if ($user && password_verify($password, $user['password'])) {
            $this->_lava->session->set_userdata([
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
        if (!$this->session) return false;
        return(bool) $this->_lava->session->userdata('logged_in');
    }

    public function has_role($role)
    {
        if (!$this->session) return false;
        return $this->_lava->session->userdata('role') === $role;
    }

    public function logout()
    {
        $this->_lava->session->unset_userdata(['user_id','username','role','logged_in']);
    }
}
?>