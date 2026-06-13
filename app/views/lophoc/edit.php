<div class="container" style="max-width:500px;">
    <h2>Sửa thông tin lớp học</h2>
    <form id="form-edit-lh" action="/QLSV/public/lophoc/update" method="post">
        <input type="hidden" name="id" value="<?php echo $lophoc['id']; ?>">
        <div class="form-group">
            <label for="malop">Mã lớp</label>
            <input type="text" name="malop" id="malop" value="<?php echo htmlspecialchars($lophoc['malop']); ?>">
        </div>
        <div class="form-group">
            <label for="tenlop">Tên lớp</label>
            <input type="text" name="tenlop" id="tenlop" value="<?php echo htmlspecialchars($lophoc['tenlop']); ?>">
        </div>
        <div class="form-group">
            <label for="ghichu">Khoa / Ghi chú</label>
            <input type="text" name="ghichu" id="ghichu" value="<?php echo htmlspecialchars($lophoc['ghichu']); ?>">
        </div>
        <button type="submit" class="btn-submit">Cập nhật</button>
    </form>
    <a href="/QLSV/public/lophoc/index" class="btn-back">← Quay lại danh sách</a>
</div>

<script src="https://unpkg.com/just-validate@4.3.0/dist/just-validate.production.min.js"></script>
<script>
    const validation = new JustValidate('#form-edit-lh', {
        errorFieldCssClass: 'just-validate-error-field',
        successFieldCssClass: 'just-validate-success-field',
        errorLabelCssClass: 'just-validate-error-label',
    });

    validation
        .addField('#malop', [
            { rule: 'required', errorMessage: 'Vui lòng nhập mã lớp' },
            { rule: 'customRegexp', value: /^\S+$/, errorMessage: 'Mã lớp không được chứa khoảng trắng' }
        ])
        .addField('#tenlop', [
            { rule: 'required', errorMessage: 'Vui lòng nhập tên lớp' }
        ])
        .addField('#ghichu', [
            { rule: 'required', errorMessage: 'Vui lòng nhập ghi chú' }
        ])
        .onSuccess(() => {
            document.getElementById('form-edit-lh').submit();
        });
</script>
