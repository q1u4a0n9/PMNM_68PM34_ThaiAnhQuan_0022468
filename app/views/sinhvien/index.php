<?php
// Helper tạo URL sort, giữ keyword + lop_id + pageSize
function sortUrl($col, $currentSort, $currentOrder, $keyword, $lop_id, $pageSize) {
    $newOrder = ($currentSort === $col && $currentOrder === 'ASC') ? 'DESC' : 'ASC';
    $params = array_filter([
        'keyword'  => $keyword,
        'lop_id'   => $lop_id > 0 ? $lop_id : '',
        'sort'     => $col,
        'order'    => $newOrder,
        'pageSize' => $pageSize != 5 ? $pageSize : '',
    ]);
    return '/QLSV/public/sinhvien/index?' . http_build_query($params);
}

function sortIcon($col, $currentSort, $currentOrder) {
    if ($currentSort !== $col) return ' <span style="opacity:.3;font-size:10px;">▲</span>';
    return $currentOrder === 'ASC' ? ' <span style="font-size:11px;">▲</span>' : ' <span style="font-size:11px;">▼</span>';
}

$sort     = $sort     ?? 'id';
$order    = $order    ?? 'ASC';
$keyword  = $keyword  ?? '';
$lop_id   = $lop_id   ?? 0;
$pageSize = $pageSize ?? 5;
?>

<div class="container">
    <div class="page-header">
        <div class="page-title">
            Danh sách sinh viên
            <span class="badge-count"><?php echo $totalSV ?? 0; ?></span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            <form id="pageSizeForm" method="GET" action="/QLSV/public/sinhvien/index" style="display:flex;align-items:center;gap:6px;">
                <input type="hidden" name="keyword"  value="<?php echo htmlspecialchars($keyword); ?>">
                <input type="hidden" name="lop_id"   value="<?php echo $lop_id; ?>">
                <input type="hidden" name="sort"     value="<?php echo htmlspecialchars($sort); ?>">
                <input type="hidden" name="order"    value="<?php echo htmlspecialchars($order); ?>">
                <span style="font-size:14px;color:#555;white-space:nowrap;">Hiển thị:</span>
                <select name="pageSize" class="pagesize-select" onchange="document.getElementById('pageSizeForm').submit()">
                    <?php foreach ([5,10,25,50] as $ps): ?>
                        <option value="<?php echo $ps; ?>" <?php echo $pageSize==$ps?'selected':''; ?>>
                            <?php echo $ps; ?> / trang
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
            <a href="/QLSV/public/sinhvien/create" class="btn-add">+ Thêm sinh viên</a>
        </div>
    </div>

    <form method="GET" action="/QLSV/public/sinhvien/index" class="search-form">
        <?php if ($sort !== 'id' || $order !== 'ASC'): ?>
            <input type="hidden" name="sort"  value="<?php echo htmlspecialchars($sort); ?>">
            <input type="hidden" name="order" value="<?php echo htmlspecialchars($order); ?>">
        <?php endif; ?>
        <input type="text" name="keyword" class="search-input"
               placeholder="Tìm theo họ tên hoặc MSSV..."
               value="<?php echo htmlspecialchars($keyword); ?>">
        <select name="lop_id" class="search-select">
            <option value="0">-- Tất cả lớp --</option>
            <?php foreach ($lophocs as $lh): ?>
                <option value="<?php echo $lh['id']; ?>"
                    <?php echo ($lop_id == $lh['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($lh['tenlop']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn-search">Tìm kiếm</button>
        <a href="/QLSV/public/sinhvien/index" class="btn-reset">Đặt lại</a>
    </form>

    <table>
        <colgroup>
            <col style="width:55px">
            <col style="width:140px">
            <col style="width:220px">
            <col style="width:100px">
            <col>
            <col style="width:160px">
        </colgroup>
        <thead>
            <tr>
                <th>STT</th>
                <th>
                    <a href="<?php echo sortUrl('mssv', $sort, $order, $keyword, $lop_id, $pageSize); ?>" class="sort-link">
                        MSSV<?php echo sortIcon('mssv', $sort, $order); ?>
                    </a>
                </th>
                <th>
                    <a href="<?php echo sortUrl('hoten', $sort, $order, $keyword, $lop_id, $pageSize); ?>" class="sort-link">
                        Họ tên<?php echo sortIcon('hoten', $sort, $order); ?>
                    </a>
                </th>
                <th>Giới tính</th>
                <th>Lớp học</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sinhviens)):
                $stt = ($currentPage - 1) * $pageSize + 1;
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
        $queryStr = http_build_query(array_filter([
            'keyword'  => $keyword,
            'lop_id'   => $lop_id > 0 ? $lop_id : '',
            'sort'     => $sort !== 'id' ? $sort : '',
            'order'    => $order !== 'ASC' ? $order : '',
            'pageSize' => $pageSize != 5 ? $pageSize : '',
        ]));
        $queryStr = $queryStr ? '?' . $queryStr : '';
        $from = ($totalSV ?? 0) > 0 ? ($currentPage - 1) * $pageSize + 1 : 0;
        $to   = min($currentPage * $pageSize, $totalSV ?? 0);
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
