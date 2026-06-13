<div class="container" style="max-width:400px;">
    <h2>Đăng nhập</h2>
    <form action="/QLSV/public/auth/login" method="post">
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-submit">Đăng nhập</button>
    </form>
</div>
