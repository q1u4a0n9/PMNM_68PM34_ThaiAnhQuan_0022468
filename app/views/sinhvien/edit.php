<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; padding: 40px 20px; }
        .container { max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h2 { color: #2c3e50; margin-bottom: 25px; text-align: center; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; color: #555; }
        input[type="text"] { width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 15px; }
        input[type="text"]:focus { outline: none; border-color: #2980b9; }
        .btn-submit { background-color: #2980b9; color: white; border: none; padding: 11px 24px; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; width: 100%; transition: background-color 0.3s; }
        .btn-submit:hover { background-color: #2471a3; }
        .btn-back { display: inline-block; margin-top: 14px; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .btn-back:hover { color: #333; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sửa thông tin sinh viên</h2>
        <form action="/QLSV/public/sinhvien/update" method="post">
            <input type="hidden" name="id" value="<?php echo $sinhvien['id']; ?>">
            <div class="form-group">
                <label for="hoten">Họ tên</label>
                <input type="text" name="hoten" id="hoten" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>" required>
            </div>
            <div class="form-group">
                <label for="gioitinh">Giới tính</label>
                <input type="text" name="gioitinh" id="gioitinh" value="<?php echo htmlspecialchars($sinhvien['gioitinh']); ?>" required>
            </div>
            <div class="form-group">
                <label for="mssv">MSSV</label>
                <input type="text" name="mssv" id="mssv" value="<?php echo htmlspecialchars($sinhvien['mssv']); ?>" required>
            </div>
            <button type="submit" class="btn-submit">Cập nhật</button>
        </form>
        <a href="/QLSV/public/sinhvien/index" class="btn-back">← Quay lại danh sách</a>
    </div>
</body>
</html>
