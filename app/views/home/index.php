<div class="container" style="max-width:600px; text-align:center; padding: 60px 30px;">
    <h1 style="font-size:28px; color:#2c3e50; margin-bottom:12px;">Hệ thống Quản lý Sinh viên</h1>
    <p style="color:#7f8c8d; margin-bottom:30px;">PMNM_68PM34_QLSV</p>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="/QLSV/public/sinhvien" class="btn-add">Quản lý sinh viên</a>
        &nbsp;
        <a href="/QLSV/public/lophoc" class="btn-add btn-add-blue">Quản lý lớp học</a>
    <?php else: ?>
        <a href="/QLSV/public/home/login" class="btn-add">Đăng nhập</a>
    <?php endif; ?>
</div>
