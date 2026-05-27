<?php
class DB {
    private static $host = 'localhost';
    private static $db_name = '68pm34'; // Đổi lại thành tên database thực tế của bạn
    private static $username = 'root';
    private static $password = '';

    public static function ConnectDB() {
        try {
            // Tạo kết nối biến cục bộ và thiết lập thuộc tính
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Trả thẳng kết nối ra ngoài
            return $conn;
            
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
            return null;
        }
    }
}
?>