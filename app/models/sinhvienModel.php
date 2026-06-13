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

    // Đếm tổng số lượng sinh viên (hỗ trợ search)
    public function getTotalSinhVien($keyword = '', $lop_id = 0) {
        $kw = '%' . $keyword . '%';
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM tbl_sinhviens sv
             WHERE (sv.hoten LIKE :kw1 OR sv.mssv LIKE :kw2)
               AND (:lop1 = 0 OR sv.lop_id = :lop2)"
        );
        $stmt->bindValue(':kw1',  $kw);
        $stmt->bindValue(':kw2',  $kw);
        $stmt->bindValue(':lop1', $lop_id, PDO::PARAM_INT);
        $stmt->bindValue(':lop2', $lop_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Lấy danh sách sinh viên có phân trang + search + sort
    public function getSinhVienPaging($limit, $offset, $keyword = '', $lop_id = 0, $sort = 'id', $order = 'ASC') {
        $allowed = ['id', 'mssv', 'hoten', 'gioitinh'];
        $sort  = in_array($sort, $allowed) ? $sort : 'id';
        $order = $order === 'DESC' ? 'DESC' : 'ASC';

        $kw = '%' . $keyword . '%';
        $stmt = $this->conn->prepare(
            "SELECT sv.*, lh.malop, lh.tenlop
             FROM tbl_sinhviens sv
             LEFT JOIN tbl_lophocs lh ON sv.lop_id = lh.id
             WHERE (sv.hoten LIKE :kw1 OR sv.mssv LIKE :kw2)
               AND (:lop1 = 0 OR sv.lop_id = :lop2)
             ORDER BY sv.$sort $order
             LIMIT :limit OFFSET :offset"
        );
        $stmt->bindValue(':kw1',  $kw);
        $stmt->bindValue(':kw2',  $kw);
        $stmt->bindValue(':lop1', $lop_id, PDO::PARAM_INT);
        $stmt->bindValue(':lop2', $lop_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
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

    public function update($id, $hoten, $gioitinh, $mssv, $lop_id) {
        $stmt = $this->conn->prepare(
            "UPDATE tbl_sinhviens SET hoten=:hoten, gioitinh=:gioitinh, mssv=:mssv, lop_id=:lop_id WHERE id=:id"
        );
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindValue(':lop_id', $lop_id, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM tbl_sinhviens WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function create($hoten, $gioitinh, $mssv, $lop_id) {
        $stmt = $this->conn->prepare(
            "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv, lop_id) VALUES (:hoten, :gioitinh, :mssv, :lop_id)"
        );
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindValue(':lop_id', $lop_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>