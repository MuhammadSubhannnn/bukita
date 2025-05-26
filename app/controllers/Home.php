<?php
class Home extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Halaman Home';

        // Panggil model untuk hitung total
        $data['total_buku'] = $this->model('BukuModel')->getTotalBuku();
        $data['total_kategori'] = $this->model('KategoriModel')->getTotalKategori();
        $data['total_user'] = $this->model('UserModel')->getTotalUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}