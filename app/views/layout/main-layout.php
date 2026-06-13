<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' — QLSV' : 'QLSV'; ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; color: #333; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── Navbar ── */
        .navbar { background: #fff; height: 56px; display: flex; align-items: center; padding: 0 30px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 100; }
        .navbar-brand { font-size: 22px; font-weight: 700; color: #2c3e50; text-decoration: none; letter-spacing: 1px; margin-right: auto; }
        .navbar-nav { display: flex; gap: 6px; }
        .navbar-nav a { padding: 7px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; color: #555; transition: background 0.2s, color 0.2s; }
        .navbar-nav a:hover, .navbar-nav a.active { background: #2980b9; color: #fff; }

        /* ── Content ── */
        .content { flex: 1; padding: 30px 20px 80px; }

        /* ── Footer ── */
        .footer { background: #2c3e50; color: #aab; text-align: center; padding: 14px; font-size: 13px; }

        /* ── Container card ── */
        .container { max-width: 1100px; margin: 0 auto; background: #fff; padding: 28px 30px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }

        /* ── Tiêu đề trang ── */
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; flex-wrap: wrap; gap: 12px; }
        .page-title { font-size: 22px; font-weight: 700; color: #2c3e50; display: flex; align-items: center; gap: 10px; }
        .badge-count { background: #2980b9; color: #fff; font-size: 13px; padding: 2px 10px; border-radius: 20px; font-weight: 600; }
        .container h2 { color: #2c3e50; margin-bottom: 22px; font-size: 20px; }

        /* ── Nút thêm ── */
        .btn-add { display: inline-flex; align-items: center; gap: 6px; background: #27ae60; color: #fff; padding: 9px 18px; text-decoration: none; border-radius: 7px; font-weight: 600; font-size: 14px; transition: background 0.2s; white-space: nowrap; }
        .btn-add:hover { background: #219150; }

        /* ── Search form ── */
        .search-form { display: flex; gap: 8px; margin-bottom: 18px; flex-wrap: wrap; align-items: center; }
        .search-input { flex: 1; min-width: 180px; padding: 8px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; }
        .search-input:focus { outline: none; border-color: #2980b9; }
        .search-select { padding: 8px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; background: #fff; min-width: 160px; }
        .search-select:focus { outline: none; border-color: #2980b9; }
        .btn-search { padding: 8px 18px; background: #2980b9; color: #fff; border: none; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        .btn-search:hover { background: #2471a3; }
        .btn-reset { padding: 8px 14px; background: #95a5a6; color: #fff; border-radius: 6px; font-size: 14px; font-weight: 600; text-decoration: none; transition: background 0.2s; }
        .btn-reset:hover { background: #7f8c8d; }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; margin-top: 4px; }
        th, td { padding: 12px 14px; text-align: left; border-bottom: 1px solid #eef0f3; font-size: 14px; }
        th { background: #34495e; color: #fff; font-weight: 600; text-transform: uppercase; font-size: 12px; letter-spacing: 0.5px; }
        td:first-child, th:first-child { text-align: center; width: 50px; }
        tr:hover td { background: #f8f9fa; }
        tr:last-child td { border-bottom: none; }
        .empty-data { text-align: center !important; padding: 30px; color: #7f8c8d; font-style: italic; }

        /* ── Badge lớp học ── */
        .lop-badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #e8f4fd; color: #1a6fa8; white-space: nowrap; }

        /* ── Badge mã lớp ── */
        .malop-badge { display: inline-block; padding: 3px 9px; border-radius: 5px; font-size: 12px; font-weight: 700; background: #2c3e50; color: #fff; letter-spacing: 0.5px; }

        /* ── Action buttons ── */
        .action-link { text-decoration: none; padding: 5px 12px; border-radius: 5px; color: #fff; font-size: 13px; font-weight: 500; display: inline-block; margin: 0 2px; transition: opacity 0.2s; }
        .action-link:hover { opacity: 0.82; }
        .btn-edit   { background: #f39c12; }
        .btn-delete { background: #e74c3c; }

        /* ── Pagination ── */
        .pagination-wrap { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; flex-wrap: wrap; gap: 10px; }
        .pagination-info { font-size: 13px; color: #7f8c8d; }
        .pagination { display: flex; gap: 4px; }
        .pagination a { display: inline-block; padding: 6px 13px; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #333; font-size: 14px; font-weight: 500; transition: background 0.2s; }
        .pagination a.active { background: #2980b9; color: #fff; border-color: #2980b9; }
        .pagination a:hover:not(.active) { background: #f1f1f1; }

        /* ── Form create/edit ── */
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; color: #555; font-size: 14px; }
        .form-group input[type="text"],
        .form-group select { width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box; background: #fff; }
        .form-group input[type="text"]:focus,
        .form-group select:focus { outline: none; border-color: #2980b9; }
        .btn-submit { background: #27ae60; color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; width: 100%; transition: background 0.2s; margin-top: 6px; }
        .btn-submit:hover { background: #219150; }
        .btn-back { display: inline-block; margin-top: 14px; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .btn-back:hover { color: #333; }
    </style>
</head>
<body>
    <?php require_once '../app/views/layout/partial/header.php'; ?>

    <div class="content">
        <?php if (isset($viewname)) {
            require_once '../app/views/' . $viewname . '.php';
        } ?>
    </div>

    <?php require_once '../app/views/layout/partial/footer.php'; ?>
</body>
</html>
