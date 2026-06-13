<div class="container" style="max-width:500px;">
    <h2>Thêm mới lớp học</h2>
    <form id="form-create-lh" action="/QLSV/public/lophoc/store" method="post">
        <div class="form-group">
            <label for="malop">Mã lớp</label>
            <input type="text" name="malop" id="malop" placeholder="VD: 68PM4">
        </div>
        <div class="form-group">
            <label for="tenlop">Tên lớp</label>
            <input type="text" name="tenlop" id="tenlop" placeholder="VD: Công nghệ phần mềm 4">
        </div>
        <div class="form-group">
            <label for="ghichu">Khoa / Ghi chú</label>
            <input type="text" name="ghichu" id="ghichu" placeholder="VD: Khoa CNTT">
        </div>
        <button type="submit" class="btn-submit">Thêm mới</button>
    </form>
    <a href="/QLSV/public/lophoc/index" class="btn-back">← Quay lại danh sách</a>
</div>

<script src="https://unpkg.com/just-validate@4.3.0/dist/just-validate.production.min.js"></script>
<script>
    const validation = new JustValidate('#form-create-lh', {
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
            document.getElementById('form-create-lh').submit();
        });
</script>
