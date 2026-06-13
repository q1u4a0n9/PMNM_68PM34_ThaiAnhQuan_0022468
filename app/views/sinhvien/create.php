<div class="container" style="max-width:500px;">
    <h2>Thêm mới sinh viên</h2>
    <form action="/QLSV/public/sinhvien/store" method="post">
        <div class="form-group">
            <label for="hoten">Họ tên</label>
            <input type="text" name="hoten" id="hoten" required>
        </div>
        <div class="form-group">
            <label for="gioitinh">Giới tính</label>
            <input type="text" name="gioitinh" id="gioitinh" required>
        </div>
        <div class="form-group">
            <label for="mssv">MSSV</label>
            <input type="text" name="mssv" id="mssv" required>
        </div>
        <div class="form-group">
            <label for="lop_id">Lớp học</label>
            <select name="lop_id" id="lop_id" required>
                <option value="">-- Chọn lớp --</option>
                <?php foreach ($lophocs as $lh): ?>
                    <option value="<?php echo $lh['id']; ?>">
                        <?php echo htmlspecialchars($lh['malop'] . ' - ' . $lh['tenlop']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn-submit">Thêm mới</button>
    </form>
    <a href="/QLSV/public/sinhvien/index" class="btn-back">← Quay lại danh sách</a>
</div>
