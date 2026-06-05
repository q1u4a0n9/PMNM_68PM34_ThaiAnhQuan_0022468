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
            color: white; /* Thêm màu chữ để dễ đọc */
            position: fixed;
            bottom: 0;
            
        }
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