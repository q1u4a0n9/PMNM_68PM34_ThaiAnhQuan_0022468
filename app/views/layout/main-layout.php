<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Danh sách sinh viên'; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
           
        }

        
        /* CSS cho Header */
        .header {
            width: 100%;
            height: 80px;
            background-color: red;
            color: white; /* Thêm màu chữ để dễ đọc */
           
        }

        /* CSS cho phần thân trang để không bị footer che khuất */
        .content {
            padding: 20px;
            padding-bottom: 100px; /* Tạo khoảng trống phía dưới cho footer cố định */
        }
        
        /* CSS cho Footer */
        .footer {
            width: 100%;
            height: 80px;
            background-color: blue;
            color: white;
            position: fixed;
            bottom: 0;
        }

        /* CSS dùng chung cho các trang CRUD */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; }

        .container { max-width: 1000px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .container h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; font-size: 28px; text-transform: uppercase; letter-spacing: 1px; }
        .container h2 { color: #2c3e50; margin-bottom: 25px; text-align: center; }

        .btn-add { display: inline-block; background-color: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 15px; margin-bottom: 20px; transition: background-color 0.3s; }
        .btn-add:hover { background-color: #219150; }

        table { width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 0 0 1px #eaedf1; }
        th, td { padding: 15px; text-align: center; border-bottom: 1px solid #eaedf1; }
        th { background-color: #34495e; color: #ffffff; font-weight: 600; text-transform: uppercase; font-size: 14px; }
        tr:hover { background-color: #f8f9fa; }
        tr:last-child td { border-bottom: none; }

        .action-link { text-decoration: none; padding: 6px 12px; border-radius: 4px; color: white; font-size: 13px; font-weight: 500; display: inline-block; margin: 0 3px; transition: opacity 0.2s; }
        .action-link:hover { opacity: 0.8; }
        .btn-edit   { background-color: #2980b9; }
        .btn-delete { background-color: #e74c3c; }
        .empty-data { text-align: center; padding: 30px; color: #7f8c8d; font-style: italic; }

        .pagination { margin-top: 25px; text-align: center; }
        .pagination a { display: inline-block; padding: 8px 15px; margin: 0 4px; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #333; font-weight: 500; transition: background-color 0.3s; }
        .pagination a.active { background-color: #2980b9; color: white; border-color: #2980b9; }
        .pagination a:hover:not(.active) { background-color: #f1f1f1; }

        /* Form dùng chung (create/edit) */
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; color: #555; }
        .form-group input[type="text"] { width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 15px; box-sizing: border-box; }
        .form-group input[type="text"]:focus { outline: none; border-color: #2980b9; }
        .btn-submit { background-color: #2980b9; color: white; border: none; padding: 11px 24px; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; width: 100%; transition: background-color 0.3s; }
        .btn-submit:hover { background-color: #2471a3; }
        .btn-back { display: inline-block; margin-top: 14px; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .btn-back:hover { color: #333; }
        .form-group select { width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 15px; box-sizing: border-box; background-color: #fff; }
        .form-group select:focus { outline: none; border-color: #2980b9; }
    </style>
    
</head>
<body>
    
    <?php require_once '../app/views/layout/partial/header.php'; ?>
    
    <div class="content">
        <?php 
            if (isset($viewname)) {
                require_once '../app/views/' . $viewname . '.php';
            }
        ?>
    </div>
    
    <?php require_once '../app/views/layout/partial/footer.php'; ?>

</body>
</html>