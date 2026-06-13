<div class="container">
    <h2>Thêm mới lớp học</h2>
    <form action="/QLSV/public/lophoc/store" method="post">
        <div class="form-group">
            <label for="malop">Mã Lớp</label>
            <input type="text" name="malop" id="malop" placeholder="VD: 68PM4" required>
        </div>
        
        <div class="form-group">
            <label for="tenlop">Tên Lớp</label>
            <input type="text" name="tenlop" id="tenlop" placeholder="VD: Công nghệ phần mềm 4" required>
        </div>
        
        <div class="form-group">
            <label for="ghichu">Khoa / Ghi chú</label>
            <input type="text" name="ghichu" id="ghichu" placeholder="VD: Khoa CNTT" required>
        </div>
        
        <button type="submit" class="btn-submit">Thêm mới</button>
    </form>
    <a href="/QLSV/public/lophoc/index" class="btn-back">← Quay lại danh sách</a>
</div>