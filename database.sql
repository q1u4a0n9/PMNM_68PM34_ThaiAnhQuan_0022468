-- ============================================================
-- QLSV - Hệ thống Quản lý Sinh viên
-- Database: 68pm34
-- Tài khoản đăng nhập: admin/123456 hoặc hieulx/123456
-- ============================================================

CREATE DATABASE IF NOT EXISTS `68pm34`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `68pm34`;

-- Bảng lớp học (tạo trước vì sinh viên tham chiếu đến)
CREATE TABLE IF NOT EXISTS `tbl_lophocs` (
  `id`     INT          NOT NULL AUTO_INCREMENT,
  `malop`  VARCHAR(50)  NOT NULL,
  `tenlop` VARCHAR(200) NOT NULL,
  `ghichu` VARCHAR(500) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng sinh viên
CREATE TABLE IF NOT EXISTS `tbl_sinhviens` (
  `id`       INT          NOT NULL AUTO_INCREMENT,
  `hoten`    VARCHAR(200) NOT NULL,
  `gioitinh` VARCHAR(20)  DEFAULT '',
  `mssv`     VARCHAR(50)  DEFAULT '',
  `lop_id`   INT          DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`lop_id`) REFERENCES `tbl_lophocs`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
