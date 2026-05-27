<?php
require_once("../app/core/App.php");

// Chỉ nên gọi session_start() nếu session chưa tồn tại để tránh cảnh báo (warning)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class middleware
{
     function checklogin(){
        // 1. SỬA LỖI VÒNG LẶP: Thêm 'home/login' vào danh sách các trang không bị chặn
        $publicPages = ['home/index', 'home/login', 'auth/login']; 
        
        // 2. SỬA LỖI SO SÁNH: Lấy url từ .htaccess truyền qua. 
        // Nếu vừa vào trang chủ không gõ gì thì mặc định là 'home/index'
        $currentUrl = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';

        // 3. Tiến hành kiểm tra
        if(!isset($_SESSION["username"]) && !in_array($currentUrl, $publicPages)){
            // Nếu chưa đăng nhập và đang vào trang cấm -> Đá về login
            // Code cũ: header("Location: /home/login");
// Code mới:
header("Location: /QLSV/public/home/login");
            exit();
        }
     }
}
?>