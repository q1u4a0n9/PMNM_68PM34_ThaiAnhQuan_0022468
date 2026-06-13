<nav class="navbar">
    <a href="/QLSV/public/home" class="navbar-brand">QLSV</a>
    <div class="navbar-nav">
        <?php
        $currentUrl = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
        $isSinhVien = strpos($currentUrl, 'sinhvien') === 0;
        $isLopHoc   = strpos($currentUrl, 'lophoc') === 0;
        ?>
        <a href="/QLSV/public/sinhvien" class="<?php echo $isSinhVien ? 'active' : ''; ?>">Quản lý sinh viên</a>
        <a href="/QLSV/public/lophoc"   class="<?php echo $isLopHoc   ? 'active' : ''; ?>">Quản lý lớp học</a>
    </div>
</nav>
