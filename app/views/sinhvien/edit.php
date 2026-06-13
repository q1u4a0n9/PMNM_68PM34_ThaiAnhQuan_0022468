<div class="container" style="max-width:500px;">
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
