<div class="container">
    <h1><?php echo isset($title) ? $title : 'Danh sách sinh viên'; ?></h1>

    <a href="/QLSV/public/sinhvien/create" class="btn-add">+ Thêm sinh viên mới</a>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>MSSV</th>
                <th>Lớp</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($sinhviens)) {
                $stt = ($currentPage - 1) * 5 + 1;
                foreach ($sinhviens as $sv) {
            ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><strong>#<?php echo $sv['id']; ?></strong></td>
                    <td><?php echo htmlspecialchars($sv['hoten']); ?></td>
                    <td><?php echo htmlspecialchars($sv['gioitinh']); ?></td>
                    <td><?php echo htmlspecialchars($sv['mssv']); ?></td>
                    <td><?php echo htmlspecialchars($sv['malop'] ?? '—'); ?></td>
                    <td>
                        <a href="/QLSV/public/sinhvien/edit/<?php echo $sv['id']; ?>" class="action-link btn-edit">Sửa</a>
                        <a href="/QLSV/public/sinhvien/delete/<?php echo $sv['id']; ?>" class="action-link btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">Xóa</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='7' class='empty-data'>Chưa có dữ liệu sinh viên nào trong hệ thống.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php if (isset($totalPages) && $totalPages > 1): ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="/QLSV/public/sinhvien/index/<?php echo $i; ?>"
               class="<?php echo (isset($currentPage) && $i == $currentPage) ? 'active' : ''; ?>">
               <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

</div>
