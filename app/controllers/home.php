<?php
class home
{
    public function index()
    {
        // Đã thêm app/ vào đường dẫn
        require_once '../app/views/home/index.php';
    }

    public function about()
    {
        // Đã thêm app/ vào đường dẫn
        require_once '../app/views/home/about.php';
    }

    public function login()
    {
        require_once '../app/views/home/login.php';
    }
}
?>