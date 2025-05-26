<?php
class LoginModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Fungsi untuk memeriksa login user
    public function checkLogin($data)
    {
        $query = "SELECT * FROM {$this->table} WHERE username = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password'])); // Gunakan md5 hanya jika di DB juga md5

        return $this->db->single(); // Kembalikan data user jika cocok
    }
}
