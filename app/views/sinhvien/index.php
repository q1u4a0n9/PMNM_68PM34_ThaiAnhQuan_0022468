<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Danh sách sinh viên'; ?></title>
    <style>
        /* Reset cơ bản và setup Font chữ */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6; /* Nền xám nhạt dịu mắt */
            color: #333;
            padding: 40px 20px;
        }

        /* Container bọc toàn bộ nội dung */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); /* Đổ bóng nhẹ */
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Nút thêm sinh viên */
        .btn-add {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-add:hover {
            background-color: #219150;
        }

        /* Bảng dữ liệu */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden; /* Giữ góc bo tròn cho header */
            box-shadow: 0 0 0 1px #eaedf1; /* Viền siêu mỏng */
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eaedf1;
        }
        th {
            background-color: #34495e;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }
        
        /* Hiệu ứng di chuột vào từng hàng */
        tr:hover {
            background-color: #f8f9fa;
        }
        tr:last-child td {
            border-bottom: none;
        }

        /* Cột hành động (Sửa / Xóa) */
        .action-link {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
            font-size: 13px;
            font-weight: 500;
            transition: opacity 0.2s;
            display: inline-block;
            margin: 0 3px;
        }
        .action-link:hover {
            opacity: 0.8;
        }
        .btn-edit {
            background-color: #2980b9; /* Xanh dương */
        }
        .btn-delete {
            background-color: #e74c3c; /* Đỏ */
        }

        /* Layout khi không có dữ liệu */
        .empty-data {
            text-align: center;
            padding: 30px;
            color: #7f8c8d;
            font-style: italic;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1><?php echo isset($title) ? $title : 'Danh sách sinh viên'; ?></h1>
        
        <a href="/QLSV/public/sinhvien/create" class="btn-add">+ Thêm sinh viên mới</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>MSSV</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($sinhviens)) {
                    foreach ($sinhviens as $sv) { 
                ?>
                    <tr>
                        <td><strong>#<?php echo $sv['id']; ?></strong></td>
                        <td><?php echo $sv['hoten']; ?></td>
                        <td><?php echo $sv['gioitinh']; ?></td>
                        <td><?php echo $sv['mssv']; ?></td>
                        <td>
                            <a href="/QLSV/public/sinhvien/edit/<?php echo $sv['id']; ?>" class="action-link btn-edit">Sửa</a>
                            <a href="/QLSV/public/sinhvien/delete/<?php echo $sv['id']; ?>" class="action-link btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">Xóa</a>
                        </td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='5' class='empty-data'>Chưa có dữ liệu sinh viên nào trong hệ thống.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>