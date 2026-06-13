<nav class="navbar">
    <a href="/QLSV/public/home" class="navbar-brand">QLSV</a>
    <div class="navbar-nav">
        <?php
        $currentUrl = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
        $isSinhVien = strpos($currentUrl, 'sinhvien') === 0;
        $isLopHoc   = strpos($currentUrl, 'lophoc') === 0;
        $loggedIn   = isset($_SESSION['username']);
        ?>
        <?php if ($loggedIn): ?>
            <a href="/QLSV/public/sinhvien" class="<?php echo $isSinhVien ? 'active' : ''; ?>">Quản lý sinh viên</a>
            <a href="/QLSV/public/lophoc"   class="<?php echo $isLopHoc   ? 'active' : ''; ?>">Quản lý lớp học</a>
            <span style="padding:7px 10px;font-size:14px;color:#555;">👤 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="/QLSV/public/auth/logout" style="padding:7px 16px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:500;color:#fff;background:#e74c3c;transition:background 0.2s;" onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">Đăng xuất</a>
        <?php else: ?>
            <a href="/QLSV/public/home/login">Đăng nhập</a>
        <?php endif; ?>
    </div>
</nav>
