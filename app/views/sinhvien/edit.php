<div class="container" style="max-width:500px;">
    <h2>Sửa thông tin sinh viên</h2>
    <form id="form-edit-sv" action="/QLSV/public/sinhvien/update" method="post">
        <input type="hidden" name="id" value="<?php echo $sinhvien['id']; ?>">
        <div class="form-group">
            <label for="hoten">Họ tên</label>
            <input type="text" name="hoten" id="hoten" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>">
        </div>
        <div class="form-group">
            <label for="gioitinh">Giới tính</label>
            <input type="text" name="gioitinh" id="gioitinh" value="<?php echo htmlspecialchars($sinhvien['gioitinh']); ?>">
        </div>
        <div class="form-group">
            <label for="mssv">MSSV</label>
            <input type="text" name="mssv" id="mssv" value="<?php echo htmlspecialchars($sinhvien['mssv']); ?>">
        </div>
        <div class="form-group">
            <label for="lop_id">Lớp học</label>
            <select name="lop_id" id="lop_id">
                <option value="">-- Chọn lớp --</option>
                <?php foreach ($lophocs as $lh): ?>
                    <option value="<?php echo $lh['id']; ?>"
                        <?php echo ($sinhvien['lop_id'] == $lh['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($lh['malop'] . ' - ' . $lh['tenlop']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn-submit">Cập nhật</button>
    </form>
    <a href="/QLSV/public/sinhvien/index" class="btn-back">← Quay lại danh sách</a>
</div>

<script src="https://unpkg.com/just-validate@4.3.0/dist/just-validate.production.min.js"></script>
<script>
    const validation = new JustValidate('#form-edit-sv', {
        errorFieldCssClass: 'just-validate-error-field',
        successFieldCssClass: 'just-validate-success-field',
        errorLabelCssClass: 'just-validate-error-label',
    });

    validation
        .addField('#hoten', [
            { rule: 'required', errorMessage: 'Vui lòng nhập họ tên' },
            { rule: 'customRegexp', value: /^[^\d]+$/, errorMessage: 'Họ tên không được chứa số' }
        ])
        .addField('#gioitinh', [
            { rule: 'required', errorMessage: 'Vui lòng nhập giới tính' }
        ])
        .addField('#mssv', [
            { rule: 'required', errorMessage: 'Vui lòng nhập MSSV' },
            { rule: 'customRegexp', value: /^\d+$/, errorMessage: 'MSSV chỉ được chứa số' }
        ])
        .addField('#lop_id', [
            { rule: 'required', errorMessage: 'Vui lòng chọn lớp học' }
        ])
        .onSuccess(() => {
            document.getElementById('form-edit-sv').submit();
        });
</script>
