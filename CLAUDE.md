# QLSV - Hệ Thống Quản Lý Sinh Viên

Ứng dụng web PHP theo kiến trúc MVC tự xây dựng, chạy trên XAMPP tại `localhost/QLSV/public/`.

---

## Cấu Trúc Thư Mục

```
QLSV/
├── public/
│   ├── index.php          # Entry point duy nhất
│   └── .htaccess          # Rewrite tất cả request về index.php
│
├── app/
│   ├── core/
│   │   ├── App.php        # Router: parse URL → controller/action/params
│   │   ├── Controller.php # Base controller: model() và view()
│   │   └── DB.php         # Kết nối PDO tới MySQL
│   │
│   ├── controllers/
│   │   ├── home.php       # Trang chủ, login page
│   │   ├── auth.php       # Xử lý đăng nhập POST
│   │   └── sinhvien.php   # CRUD sinh viên (index, create, store)
│   │
│   ├── models/
│   │   └── sinhvienModel.php  # Truy vấn DB bảng tbl_sinhviens
│   │
│   ├── views/
│   │   ├── layout/
│   │   │   ├── main-layout.php        # Layout chính (header + content + footer)
│   │   │   └── partial/
│   │   │       ├── header.php
│   │   │       └── footer.php
│   │   ├── home/
│   │   │   ├── index.php   # Trang chủ
│   │   │   └── login.php   # Form đăng nhập
│   │   └── sinhvien/
│   │       ├── index.php   # Danh sách sinh viên (có phân trang)
│   │       └── create.php  # Form thêm sinh viên
│   │
│   └── middleware.php      # Kiểm tra session đăng nhập
```

---

## URL Routing

Pattern: `/controller/action/param1/param2`

| URL | Controller | Action | Ghi chú |
|-----|-----------|--------|---------|
| `/` hoặc `/home` | home | index | Trang chủ |
| `/home/login` | home | login | Hiển thị form login |
| `/auth/login` (POST) | auth | login | Xử lý đăng nhập |
| `/sinhvien` | sinhvien | index | Danh sách SV trang 1 |
| `/sinhvien/index/2` | sinhvien | index | Danh sách SV trang 2 |
| `/sinhvien/create` | sinhvien | create | Form thêm SV |
| `/sinhvien/store` (POST) | sinhvien | store | Lưu SV mới |

`.htaccess` rewrite: mọi request → `public/index.php?url=<path>`

---

## Database

- **Host**: localhost  
- **Database**: `68pm34`  
- **User**: root / Password: (rỗng)  
- **Driver**: PDO với `ERRMODE_EXCEPTION`

### Bảng `tbl_sinhviens`

| Cột | Kiểu | Mô tả |
|-----|------|-------|
| id | INT PK AUTO_INCREMENT | ID sinh viên |
| hoten | VARCHAR | Họ và tên |
| gioitinh | VARCHAR | Giới tính |
| mssv | VARCHAR | Mã số sinh viên |

---

## Authentication

- Credentials hardcode trong `app/controllers/auth.php`:
  - `admin` / `123456`
  - `hieulx` / `123456`
- Session key: `$_SESSION['username']`
- Middleware (`middleware.php`) hiện đang bị **comment out** trong `public/index.php`
- Public pages (không cần login): `home/index`, `home/login`, `auth/login`

---

## Luồng Hoạt Động

### Xem danh sách sinh viên
1. Request `/sinhvien` → htaccess → `index.php?url=sinhvien`
2. `App` parse URL: controller=`sinhvien`, action=`index`
3. `sinhvien::index($page=1)` gọi `sinhvienModel::getSinhVienPaging(5, 0)`
4. View `layout/main-layout` nhúng `sinhvien/index.php` với data phân trang

### Phân trang
- Mỗi trang: 5 sinh viên
- Model method: `getTotalSinhVien()` + `getSinhVienPaging($limit, $offset)`
- URL phân trang: `/sinhvien/index/{page}`

### Thêm sinh viên
1. GET `/sinhvien/create` → hiển thị form
2. POST `/sinhvien/store` → `sinhvien::store()` → `sinhvienModel::create()`

---

## Các Vấn Đề Đã Biết (Bugs)

| File | Vấn đề |
|------|--------|
| `sinhvienModel.php` | `create()` có lỗi bindParam (tham số sai) — chưa hoạt động |
| `sinhvien/create.php` | Thiếu nút Submit — form không gửi được |
| `sinhvien/index.php` | Nút Sửa/Xóa hiển thị nhưng chưa có controller method `edit()` và `delete()` |
| `middleware.php` | Bị comment out — không có bảo vệ route |
| `auth.php` | Credentials hardcode, không hash password |

---

## Quy Ước Code

- Controller file: `app/controllers/<tên>.php`, class cùng tên file
- Model file: `app/models/<tên>Model.php`, class cùng tên file
- View: `app/views/<controller>/<action>.php`
- Gọi model từ controller: `$this->model('sinhvienModel')`
- Gọi view với layout: `$this->view("layout/main-layout", ['viewname' => 'sinhvien/index', ...data])`
- Gọi view không có layout: `require_once '../app/views/...'` trực tiếp

---

## Chạy Local

1. Khởi động XAMPP (Apache + MySQL)
2. Database: tạo DB `68pm34`, import bảng `tbl_sinhviens`
3. Truy cập: `http://localhost/QLSV/public/`
