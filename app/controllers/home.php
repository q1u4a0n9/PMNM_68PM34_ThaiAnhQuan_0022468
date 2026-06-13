<?php
require_once '../app/core/Controller.php';

class home extends Controller
{
    public function index()
    {
        $this->view("layout/main-layout", [
            'viewname' => 'home/index',
            'title'    => 'Trang chủ'
        ]);
    }

    public function login()
    {
        $this->view("layout/main-layout", [
            'viewname' => 'home/login',
            'title'    => 'Đăng nhập'
        ]);
    }
}
