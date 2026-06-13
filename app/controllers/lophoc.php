<?php
require_once '../app/core/Controller.php';
require_once '../app/models/lophocModel.php';

class lophoc extends Controller
{
    // Hiển thị danh sách có phân trang + search
    public function index($page = 1)
    {
        $lophocModel = $this->model('lophocModel');

        $limit   = 5;
        $page    = is_numeric($page) && $page > 0 ? (int)$page : 1;
        $offset  = ($page - 1) * $limit;
        $keyword = trim($_GET['keyword'] ?? '');

        $totalLH    = $lophocModel->getTotalLopHoc($keyword);
        $totalPages = ceil($totalLH / $limit);
        $lophocs    = $lophocModel->getLopHocPaging($limit, $offset, $keyword);

        $this->view("layout/main-layout", [
            'viewname'    => 'lophoc/index',
            'lophocs'     => $lophocs,
            'totalPages'  => $totalPages,
            'totalLH'     => $totalLH,
            'currentPage' => $page,
            'keyword'     => $keyword,
            'title'       => "Danh sách lớp học"
        ]);
    }
    
    // Hiển thị form sửa
    public function edit($id) {
        $lophocModel = $this->model('lophocModel');
        $lophoc = $lophocModel->getById($id);
        
        if (!$lophoc) {
            header("Location: /QLSV/public/lophoc/index");
            exit();
        }
        
        $this->view("layout/main-layout", [
            'viewname' => 'lophoc/edit',
            'lophoc'   => $lophoc,
            'title'    => "Sửa thông tin lớp học"
        ]);
    }

    // Xử lý cập nhật
    public function update() {
        $id     = $_POST['id'];
        $malop  = $_POST['malop'];
        $tenlop = $_POST['tenlop'];
        $ghichu = $_POST['ghichu'];
        
        $lophocModel = $this->model('lophocModel');
        $result = $lophocModel->update($id, $malop, $tenlop, $ghichu);
        
        if ($result) {
            header("Location: /QLSV/public/lophoc/index");
        } else {
            echo "Cập nhật lớp học thất bại";
        }
    }

    // Xử lý xóa
    public function delete($id) {
        $lophocModel = $this->model('lophocModel');
        $lophocModel->delete($id);
        header("Location: /QLSV/public/lophoc/index");
        exit();
    }

    // Hiển thị form thêm mới
    public function create(){
        $this->view("layout/main-layout", [
            'viewname' => 'lophoc/create',
            'title'    => "Thêm lớp học mới"
        ]);
    }

    // Xử lý lưu mới
    public function store(){
        $malop  = $_POST['malop'];
        $tenlop = $_POST['tenlop'];
        $ghichu = $_POST['ghichu'];
        
        $lophocModel = $this->model('lophocModel');
        $result = $lophocModel->create($malop, $tenlop, $ghichu);
        
        if($result) {
            header("Location: /QLSV/public/lophoc/index");
        } else {
            echo "Thêm mới lớp học thất bại";
        }
    }
}
?>