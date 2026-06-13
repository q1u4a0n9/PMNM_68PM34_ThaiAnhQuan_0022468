<div class="container">
    <h1><?php echo isset($title) ? $title : 'Danh sách lớp học'; ?></h1>
    
    <a href="/QLSV/public/lophoc/create" class="btn-add">+ Thêm lớp học mới</a>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Khoa/Ghi Chú</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($lophocs)) {
                $stt = ($currentPage - 1) * 5 + 1;
                foreach ($lophocs as $lh) {
            ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><strong><?php echo htmlspecialchars($lh['malop']); ?></strong></td>
                    <td><?php echo htmlspecialchars($lh['tenlop']); ?></td>
                    <td><?php echo htmlspecialchars($lh['ghichu']); ?></td>
                    <td>
                        <a href="/QLSV/public/lophoc/edit/<?php echo $lh['id']; ?>" class="action-link btn-edit">Sửa</a>
                        <a href="/QLSV/public/lophoc/delete/<?php echo $lh['id']; ?>" class="action-link btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?');">Xóa</a>
                    </td>
                </tr>
            <?php 
                } 
            } else {
                // Đã chỉnh colspan='5' cho vừa khớp số cột
                echo "<tr><td colspan='5' class='empty-data'>Chưa có dữ liệu lớp học nào trong hệ thống.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php if (isset($totalPages) && $totalPages > 1): ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="/QLSV/public/lophoc/index/<?php echo $i; ?>"
               class="<?php echo (isset($currentPage) && $i == $currentPage) ? 'active' : ''; ?>">
               <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>