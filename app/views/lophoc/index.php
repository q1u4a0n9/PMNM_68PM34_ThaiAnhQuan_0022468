<div class="container">
<?php $pageSize = $pageSize ?? 5; ?>
    <div class="page-header">
        <div class="page-title">
            Danh sách lớp học
            <span class="badge-count"><?php echo $totalLH ?? 0; ?></span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            <form id="pageSizeForm" method="GET" action="/QLSV/public/lophoc/index" style="display:flex;align-items:center;gap:6px;">
                <input type="hidden" name="keyword" value="<?php echo htmlspecialchars($keyword ?? ''); ?>">
                <span style="font-size:14px;color:#555;white-space:nowrap;">Hiển thị:</span>
                <select name="pageSize" class="pagesize-select" onchange="document.getElementById('pageSizeForm').submit()">
                    <?php foreach ([5,10,25,50] as $ps): ?>
                        <option value="<?php echo $ps; ?>" <?php echo $pageSize==$ps?'selected':''; ?>>
                            <?php echo $ps; ?> / trang
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
            <a href="/QLSV/public/lophoc/create" class="btn-add">+ Thêm lớp học</a>
        </div>
    </div>

    <form method="GET" action="/QLSV/public/lophoc/index" class="search-form">
        <input type="text" name="keyword" class="search-input"
               placeholder="Tìm theo mã lớp hoặc tên lớp..."
               value="<?php echo htmlspecialchars($keyword ?? ''); ?>">
        <button type="submit" class="btn-search">Tìm kiếm</button>
        <a href="/QLSV/public/lophoc/index" class="btn-reset">Đặt lại</a>
    </form>

    <table>
        <colgroup>
            <col style="width:55px">
            <col style="width:120px">
            <col>
            <col style="width:280px">
            <col style="width:160px">
        </colgroup>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th style="text-align:left;">Ghi chú</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lophocs)):
                $stt = ($currentPage - 1) * $pageSize + 1;
                foreach ($lophocs as $lh): ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><span class="malop-badge"><?php echo htmlspecialchars($lh['malop']); ?></span></td>
                    <td style="white-space:normal;"><?php echo htmlspecialchars($lh['tenlop']); ?></td>
                    <td style="white-space:normal;text-align:left;"><?php echo htmlspecialchars($lh['ghichu']); ?></td>
                    <td>
                        <a href="/QLSV/public/lophoc/edit/<?php echo $lh['id']; ?>" class="action-link btn-edit">Sửa</a>
                        <a href="/QLSV/public/lophoc/delete/<?php echo $lh['id']; ?>" class="action-link btn-delete"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach;
            else: ?>
                <tr><td colspan="5" class="empty-data">Không tìm thấy lớp học nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
        $qs = array_filter([
            'keyword'  => $keyword ?? '',
            'pageSize' => ($pageSize ?? 5) != 5 ? $pageSize : '',
        ]);
        $queryStr = http_build_query($qs);
        $queryStr = $queryStr ? '?' . $queryStr : '';
        $ps  = $pageSize ?? 5;
        $from = ($totalLH ?? 0) > 0 ? ($currentPage - 1) * $ps + 1 : 0;
        $to   = min($currentPage * $ps, $totalLH ?? 0);
    ?>
    <div class="pagination-wrap">
        <div class="pagination-info">
            Hiển thị <?php echo $from; ?>–<?php echo $to; ?> trong <?php echo $totalLH ?? 0; ?> bản ghi
        </div>
        <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="/QLSV/public/lophoc/index/<?php echo $i . $queryStr; ?>"
                   class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                   <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
