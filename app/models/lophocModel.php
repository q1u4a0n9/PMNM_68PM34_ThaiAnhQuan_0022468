<?php
require_once '../app/core/DB.php';

class lophocModel 
{   
    private $conn;
    public function __construct(){
        $this->conn = DB::ConnectDB();
    }
    
    public function getAllLopHoc() {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_lophocs ORDER BY malop");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đếm tổng số lượng lớp học (hỗ trợ search)
    public function getTotalLopHoc($keyword = '') {
        $kw = '%' . $keyword . '%';
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM tbl_lophocs
             WHERE malop LIKE :kw1 OR tenlop LIKE :kw2"
        );
        $stmt->bindValue(':kw1', $kw);
        $stmt->bindValue(':kw2', $kw);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Lấy danh sách lớp học có phân trang + search
    public function getLopHocPaging($limit, $offset, $keyword = '') {
        $kw = '%' . $keyword . '%';
        $stmt = $this->conn->prepare(
            "SELECT * FROM tbl_lophocs
             WHERE malop LIKE :kw1 OR tenlop LIKE :kw2
             LIMIT :limit OFFSET :offset"
        );
        $stmt->bindValue(':kw1',  $kw);
        $stmt->bindValue(':kw2',  $kw);
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin 1 lớp học theo ID (dùng cho chức năng Sửa)
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_lophocs WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật thông tin lớp học
    public function update($id, $malop, $tenlop, $ghichu) {
        $stmt = $this->conn->prepare("UPDATE tbl_lophocs SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu WHERE id = :id");
        $stmt->bindValue(':malop', $malop);
        $stmt->bindValue(':tenlop', $tenlop);
        $stmt->bindValue(':ghichu', $ghichu);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Xóa lớp học
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM tbl_lophocs WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Thêm mới lớp học (Ví dụ: Mã: 68PM4, Tên: Phần mềm 4)
    public function create($malop, $tenlop, $ghichu) {
        $query = "INSERT INTO tbl_lophocs (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':malop', $malop);
        $stmt->bindValue(':tenlop', $tenlop);
        $stmt->bindValue(':ghichu', $ghichu);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>