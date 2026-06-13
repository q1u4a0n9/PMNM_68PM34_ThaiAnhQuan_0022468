<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập — QLSV</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --color-primary: #2980b9;
            --color-text: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* page-account */
        .page-account {
            background: linear-gradient(135deg, #1a2a6c 0%, #2980b9 50%, #6dd5fa 100%);
            min-height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding-top: 50px;
            padding-bottom: 40px;
        }

        /* form-account */
        .form-account {
            background-color: #fff;
            border-radius: 24px;
            width: 630px;
            margin: 0 auto;
            padding: 90px 57px;
        }

        .form-account .inner-title {
            margin-top: 0;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 700;
            font-size: 32px;
            color: var(--color-text);
        }

        .form-account .inner-desc {
            margin-top: 0;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 600;
            font-size: 18px;
            color: var(--color-text);
            opacity: 0.8;
        }

        .form-account .inner-form {
            margin-bottom: 30px;
        }

        .form-account .inner-group {
            margin-bottom: 30px;
            position: relative;
        }

        .form-account .inner-group .inner-label {
            display: block;
            margin-bottom: 15px;
            font-weight: 600;
            font-size: 18px;
            color: var(--color-text);
            opacity: 0.8;
        }

        .form-account .inner-group .inner-control {
            width: 100%;
            height: 56px;
            background-color: #F1F4F9;
            border: 1px solid #D8D8D8;
            border-radius: 8px;
            padding: 0 16px;
            font-weight: 600;
            font-size: 18px;
            color: var(--color-text);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-account .inner-group .inner-control::placeholder {
            color: #A6A6A6;
            font-weight: 400;
        }

        .form-account .inner-group .inner-control:focus {
            border-color: var(--color-primary);
            background-color: #fff;
        }

        .form-account .inner-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .form-account .inner-confirm {
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .form-account .inner-confirm .inner-check {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: var(--color-primary);
        }

        .form-account .inner-confirm .inner-label {
            font-weight: 600;
            font-size: 16px;
            color: var(--color-text);
            opacity: 0.6;
            margin-bottom: 0;
            cursor: pointer;
        }

        .form-account .inner-button {
            width: 100%;
            height: 56px;
            border: 0;
            outline: none;
            background-color: var(--color-primary);
            border-radius: 8px;
            opacity: 0.9;
            font-weight: 700;
            font-size: 20px;
            color: #fff;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .form-account .inner-button:hover {
            opacity: 1;
        }

        /* error message */
        .alert-error {
            background: #fdecea;
            border: 1px solid #f5c6cb;
            color: #c0392b;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 24px;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
        }

        @media (max-width: 991.98px) {
            .form-account {
                border-radius: 20px;
                width: 500px;
                padding: 50px 30px;
            }
            .form-account .inner-title { font-size: 28px; }
            .form-account .inner-desc  { margin-bottom: 30px; font-size: 16px; }
            .form-account .inner-group .inner-label   { margin-bottom: 10px; font-size: 16px; }
            .form-account .inner-group .inner-control { font-size: 16px; }
            .form-account .inner-button { font-size: 16px; }
        }

        @media (max-width: 575.98px) {
            .form-account { width: 95%; }
        }
    </style>
</head>
<body>
    <div class="page-account">
        <div class="form-account">
            <h2 class="inner-title">Đăng nhập</h2>
            <p class="inner-desc">Vui lòng nhập tên đăng nhập và mật khẩu để tiếp tục</p>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert-error">Tên đăng nhập hoặc mật khẩu không đúng.</div>
            <?php endif; ?>

            <form class="inner-form" action="/QLSV/public/auth/login" method="POST">
                <div class="inner-group">
                    <label class="inner-label" for="username">Tên đăng nhập</label>
                    <input class="inner-control" type="text" name="username" id="username"
                           placeholder="Ví dụ: admin" required>
                </div>
                <div class="inner-group">
                    <label class="inner-label" for="password">Mật khẩu</label>
                    <input class="inner-control" type="password" name="password" id="password"
                           placeholder="Nhập mật khẩu" required>
                </div>
                <div class="inner-meta">
                    <label class="inner-confirm">
                        <input class="inner-check" type="checkbox" name="remember" id="remember">
                        <span class="inner-label" for="remember">Nhớ mật khẩu</span>
                    </label>
                </div>
                <button class="inner-button" type="submit">Đăng Nhập</button>
            </form>
            <div style="text-align:center; margin-top:20px;">
                <a href="/QLSV/public/home" style="color:#7f8c8d; font-size:14px; text-decoration:none;">← Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</body>
</html>
