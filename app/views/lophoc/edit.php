<div class="container">
    <h2>Sửa thông tin lớp học</h2>
    <form action="/QLSV/public/lophoc/update" method="post">
        <input type="hidden" name="id" value="<?php echo $lophoc['id']; ?>">
        
        <div class="form-group">
            <label for="malop">Mã Lớp</label>
            <input type="text" name="malop" id="malop" value="<?php echo htmlspecialchars($lophoc['malop']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tenlop">Tên Lớp</label>
            <input type="text" name="tenlop" id="tenlop" value="<?php echo htmlspecialchars($lophoc['tenlop']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="ghichu">Khoa / Ghi chú</label>
            <input type="text" name="ghichu" id="ghichu" value="<?php echo htmlspecialchars($lophoc['ghichu']); ?>" required>
        </div>
        
        <button type="submit" class="btn-submit">Cập nhật</button>
    </form>
    <a href="/QLSV/public/lophoc/index" class="btn-back">← Quay lại danh sách</a>
</div>