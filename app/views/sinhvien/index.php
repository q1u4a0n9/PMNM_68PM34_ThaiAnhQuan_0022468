<div class="container">
    <div class="page-header">
        <div class="page-title">
            Danh sách sinh viên
            <span class="badge-count"><?php echo isset($totalSV) ? $totalSV : ''; ?></span>
        </div>
        <a href="/QLSV/public/sinhvien/create" class="btn-add">+ Thêm sinh viên</a>
    </div>

    <form method="GET" action="/QLSV/public/sinhvien/index" class="search-form">
        <input type="text" name="keyword" class="search-input"
               placeholder="Tìm theo họ tên hoặc MSSV..."
               value="<?php echo htmlspecialchars($keyword ?? ''); ?>">
        <select name="lop_id" class="search-select">
            <option value="0">-- Tất cả lớp --</option>
            <?php foreach ($lophocs as $lh): ?>
                <option value="<?php echo $lh['id']; ?>"
                    <?php echo (($lop_id ?? 0) == $lh['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($lh['tenlop']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn-search">Tìm kiếm</button>
        <a href="/QLSV/public/sinhvien/index" class="btn-reset">Đặt lại</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>MSSV</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Lớp học</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sinhviens)):
                $stt = ($currentPage - 1) * 5 + 1;
                foreach ($sinhviens as $sv): ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo htmlspecialchars($sv['mssv']); ?></td>
                    <td><?php echo htmlspecialchars($sv['hoten']); ?></td>
                    <td><?php echo htmlspecialchars($sv['gioitinh']); ?></td>
                    <td>
                        <?php if (!empty($sv['tenlop'])): ?>
                            <span class="lop-badge"><?php echo htmlspecialchars($sv['tenlop']); ?></span>
                        <?php else: ?>
                            <span style="color:#bbb;font-style:italic;font-size:13px;">Chưa phân lớp</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/QLSV/public/sinhvien/edit/<?php echo $sv['id']; ?>" class="action-link btn-edit">Sửa</a>
                        <a href="/QLSV/public/sinhvien/delete/<?php echo $sv['id']; ?>" class="action-link btn-delete"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach;
            else: ?>
                <tr><td colspan="6" class="empty-data">Không tìm thấy sinh viên nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
        $limit   = 5;
        $queryStr = http_build_query(array_filter([
            'keyword' => $keyword ?? '',
            'lop_id'  => ($lop_id ?? 0) > 0 ? $lop_id : ''
        ]));
        $queryStr = $queryStr ? '?' . $queryStr : '';
        $from = $totalSV > 0 ? ($currentPage - 1) * $limit + 1 : 0;
        $to   = min($currentPage * $limit, $totalSV ?? 0);
    ?>
    <div class="pagination-wrap">
        <div class="pagination-info">
            Hiển thị <?php echo $from; ?>–<?php echo $to; ?> trong <?php echo $totalSV ?? 0; ?> bản ghi
        </div>
        <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="/QLSV/public/sinhvien/index/<?php echo $i . $queryStr; ?>"
                   class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                   <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
