<?php
require_once '../app/core/Controller.php';
require_once '../app/models/sinhvienModel.php';

class sinhvien extends Controller
{
    // Thêm tham số $page vào hàm index, mặc định là trang 1
    
    public function index( $page = 1)
    {
        
        $sinhvienModel = $this->model('sinhvienModel');
        
        // --- BẮT ĐẦU LOGIC PHÂN TRANG ---
        $limit = 5; // Số sinh viên hiển thị trên 1 trang (bạn có thể đổi thành 10)
        
        // Đảm bảo $page là số nguyên hợp lệ lớn hơn 0
        $page = is_numeric($page) && $page > 0 ? (int)$page : 1;
        
        // Tính vị trí bắt đầu lấy dữ liệu trong Database
        $offset = ($page - 1) * $limit;
        
        // Lấy tổng số lượng sinh viên và tính ra tổng số trang
        $totalSV = $sinhvienModel->getTotalSinhVien();
        $totalPages = ceil($totalSV / $limit);
        
        // Lấy dữ liệu 5 sinh viên của trang hiện tại
        $sinhviens = $sinhvienModel->getSinhVienPaging($limit, $offset);
        // --- KẾT THÚC LOGIC PHÂN TRANG ---

        // Truyền thêm dữ liệu tính toán được sang View
        $this->view("layout/main-layout", [
            'viewname'    => 'sinhvien/index',
            'sinhviens'   => $sinhviens, 
            'totalPages'  => $totalPages,
            'currentPage' => $page,
            'title'       => "Danh sách sinh viên"
        ]);
    }
    
    public function edit($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel->getById($id);
        if (!$sinhvien) {
            header("Location: /QLSV/public/sinhvien/index");
            exit();
        }
        $lophocModel = $this->model('lophocModel');
        $lophocs = $lophocModel->getAllLopHoc();
        $this->view("layout/main-layout", [
            'viewname' => 'sinhvien/edit',
            'sinhvien' => $sinhvien,
            'lophocs'  => $lophocs,
            'title'    => "Sửa thông tin sinh viên"
        ]);
    }

    public function update() {
        $id       = $_POST['id'];
        $hoten    = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $mssv     = $_POST['mssv'];
        $lop_id   = $_POST['lop_id'];
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv, $lop_id);
        if ($result) {
            header("Location: /QLSV/public/sinhvien/index");
        } else {
            echo "Cập nhật sinh viên thất bại";
        }
    }

    public function delete($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvienModel->delete($id);
        header("Location: /QLSV/public/sinhvien/index");
        exit();
    }

    public function create(){
        $lophocModel = $this->model('lophocModel');
        $lophocs = $lophocModel->getAllLopHoc();
        $this->view("layout/main-layout", [
            'viewname' => 'sinhvien/create',
            'lophocs'  => $lophocs,
            'title'    => "Thêm sinh viên mới"
        ]);
    }

    public function store(){
        $hoten    = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $mssv     = $_POST['mssv'];
        $lop_id   = $_POST['lop_id'];
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->create($hoten, $gioitinh, $mssv, $lop_id);
        if($result) {
            header("Location: /QLSV/public/sinhvien/index");
        } else {
            echo "Thêm mới sinh viên thất bại";
        }
    }

}