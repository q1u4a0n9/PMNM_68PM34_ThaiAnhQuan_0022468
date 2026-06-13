<?php
require_once("../app/core/App.php");


class middleware
{
     function checklogin(){
        $publicPages = ['home/index', 'home/login', 'auth/login'];

        // Parse URL giống App.php: strip prefix 'QLSV' và 'public' nếu bị dính vào
        $rawUrl = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
        $parts  = explode('/', $rawUrl);
        if (isset($parts[0]) && $parts[0] === 'QLSV')   array_shift($parts);
        if (isset($parts[0]) && $parts[0] === 'public')  array_shift($parts);

        // Chỉ cần controller/action để so sánh
        $currentUrl = implode('/', array_slice($parts, 0, 2));
        if (empty($currentUrl)) $currentUrl = 'home/index';

        if(!isset($_SESSION["username"]) && !in_array($currentUrl, $publicPages)){
            header("Location: /QLSV/public/home/login");
            exit();
        }
     }
}
?>