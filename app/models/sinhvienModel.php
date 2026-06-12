<?php
require_once '../app/core/DB.php';
class sinhvienModel 
{   
    private $conn;
    public function __construct(){
        $this->conn = DB::ConnectDB();
    }
    
    // Hàm cũ: lấy tất cả (giữ lại phòng khi cần dùng ở chức năng khác)
    public function getAllSinhVien(){
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // THÊM MỚI: Đếm tổng số lượng sinh viên
    public function getTotalSinhVien() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM tbl_sinhviens");
        $stmt->execute();
        return $stmt->fetchColumn(); 
    }

    // THÊM MỚI: Lấy danh sách sinh viên có giới hạn để phân trang
    public function getSinhVienPaging($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_sinhviens LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_sinhviens WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $hoten, $gioitinh, $mssv) {
        $stmt = $this->conn->prepare("UPDATE tbl_sinhviens SET hoten = :hoten, gioitinh = :gioitinh, mssv = :mssv WHERE id = :id");
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function create($hoten, $gioitinh, $mssv) {
        $query = "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>