-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 04:35 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` varchar(10) NOT NULL,
  `TenCV` varchar(100) NOT NULL,
  `TroCap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctkm_mon`
--

CREATE TABLE `ctkm_mon` (
  `MaKM` varchar(10) CHARACTER SET utf8 NOT NULL,
  `MaMon` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TongTienHoaDonToiThieu` int(11) NOT NULL DEFAULT 0,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctkm_phantram`
--

CREATE TABLE `ctkm_phantram` (
  `MaCTKM` varchar(10) CHARACTER SET utf8 NOT NULL,
  `MaKM` varchar(10) CHARACTER SET utf8 NOT NULL,
  `PhanTramKhuyenMai` tinyint(4) NOT NULL DEFAULT 0,
  `TienKhuyenMaiToiDa` int(11) NOT NULL,
  `TienKhuyenMaiToiThieu` int(11) NOT NULL,
  `TongTienHoaDonToiThieu` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `MaHD` varchar(10) NOT NULL,
  `MaMon` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_kichthuocmon`
--

CREATE TABLE `ct_kichthuocmon` (
  `TenDonVi` varchar(10) CHARACTER SET utf8 NOT NULL,
  `MaKTM` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_mon`
--

CREATE TABLE `ct_mon` (
  `MaMon` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenKichThuoc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_phieukiem`
--

CREATE TABLE `ct_phieukiem` (
  `MaPK` varchar(10) NOT NULL,
  `MaNVL` varchar(10) NOT NULL,
  `SoLuongBaoCao` int(11) NOT NULL,
  `SoLuongThucTe` int(11) NOT NULL,
  `MaTT` varchar(10) NOT NULL,
  `GhiChu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_phieunhap`
--

CREATE TABLE `ct_phieunhap` (
  `MaPN` varchar(10) NOT NULL,
  `MaNVL` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_phieuxuat`
--

CREATE TABLE `ct_phieuxuat` (
  `MaPX` varchar(10) NOT NULL,
  `MaNVL` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `MaDVT` varchar(10) NOT NULL,
  `TenDVT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(10) NOT NULL,
  `MaKH` varchar(10) NOT NULL,
  `MaNVLap` varchar(10) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `NgayThanhToan` datetime NOT NULL,
  `TongTienThanhToan` int(11) NOT NULL,
  `TienKhachHang` int(11) NOT NULL,
  `TienTraLai` int(11) NOT NULL,
  `TienKhuyenMai` int(11) NOT NULL,
  `GhiChu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(10) NOT NULL,
  `HoTen` varchar(150) NOT NULL,
  `SDT` int(10) NOT NULL,
  `MaLoaiTV` varchar(10) NOT NULL,
  `DiemTV` int(11) NOT NULL,
  `NgayDangKy` date NOT NULL,
  `TongChi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenKM` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ThoiGianBatDau` date NOT NULL,
  `ThoiGianKetThuc` date NOT NULL,
  `SoLuongPhatHanh` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichthuocmon`
--

CREATE TABLE `kichthuocmon` (
  `MaKTM` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenBangKichThuoc` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithanhvien`
--

CREATE TABLE `loaithanhvien` (
  `MaLoaiTV` varchar(10) NOT NULL,
  `TenLoaiTV` varchar(50) NOT NULL,
  `TiLeTichLuy` float NOT NULL,
  `DiemLenHang` int(11) NOT NULL,
  `HangThanhVien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_mon`
--

CREATE TABLE `loai_mon` (
  `MaLoaiMon` varchar(10) NOT NULL,
  `TenLoaiMon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nguyenvatlieu`
--

CREATE TABLE `loai_nguyenvatlieu` (
  `MaLoaiNVL` varchar(10) NOT NULL,
  `TenLoaiNVL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

CREATE TABLE `mon` (
  `MaMon` varchar(10) NOT NULL,
  `TenMon` varchar(50) NOT NULL,
  `MaLoaiMon` varchar(10) NOT NULL,
  `MaTT` varchar(10) NOT NULL,
  `MaDVT` varchar(10) NOT NULL,
  `HinhAnh` varchar(200) NOT NULL,
  `MoTa` varchar(200) NOT NULL,
  `GhiChu` varchar(100) NOT NULL,
  `NgayThem` date NOT NULL,
  `NgayChinhSuaLanCuoi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenvatlieu`
--

CREATE TABLE `nguyenvatlieu` (
  `MaNVL` varchar(10) NOT NULL,
  `MaLoaiNVL` varchar(10) NOT NULL,
  `TenNVL` varchar(50) NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `MaDVT` varchar(10) NOT NULL,
  `DonGiaNhap` int(11) NOT NULL,
  `MaNCC` varchar(10) NOT NULL,
  `MaTinhTrang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `CMND` int(12) NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(150) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `MaCV` varchar(10) NOT NULL,
  `Luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukiem`
--

CREATE TABLE `phieukiem` (
  `MaPK` varchar(10) NOT NULL,
  `MaNVKiem` varchar(10) NOT NULL,
  `MaNVPhuKiem` varchar(10) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `GhiChu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` varchar(10) NOT NULL,
  `MaNVNhap` varchar(10) NOT NULL,
  `MaNCC` varchar(10) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TenNguoiGiao` varchar(100) NOT NULL,
  `TienThanhToan` int(11) NOT NULL,
  `TienNo` int(11) NOT NULL,
  `GhiChu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `MaPX` varchar(10) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `MaNVXuat` varchar(10) NOT NULL,
  `MaNVNhan` varchar(10) NOT NULL,
  `GhiChu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTT` varchar(10) NOT NULL,
  `TenTT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topping_lienket`
--

CREATE TABLE `topping_lienket` (
  `MaMon` varchar(10) CHARACTER SET utf8 NOT NULL,
  `MaTopping` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Chỉ mục cho bảng `ctkm_mon`
--
ALTER TABLE `ctkm_mon`
  ADD PRIMARY KEY (`MaKM`,`MaMon`);

--
-- Chỉ mục cho bảng `ctkm_phantram`
--
ALTER TABLE `ctkm_phantram`
  ADD PRIMARY KEY (`MaCTKM`);

--
-- Chỉ mục cho bảng `ct_kichthuocmon`
--
ALTER TABLE `ct_kichthuocmon`
  ADD PRIMARY KEY (`TenDonVi`,`MaKTM`);

--
-- Chỉ mục cho bảng `ct_mon`
--
ALTER TABLE `ct_mon`
  ADD PRIMARY KEY (`MaMon`,`TenKichThuoc`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`MaDVT`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `kichthuocmon`
--
ALTER TABLE `kichthuocmon`
  ADD PRIMARY KEY (`MaKTM`);

--
-- Chỉ mục cho bảng `loaithanhvien`
--
ALTER TABLE `loaithanhvien`
  ADD PRIMARY KEY (`MaLoaiTV`);

--
-- Chỉ mục cho bảng `loai_mon`
--
ALTER TABLE `loai_mon`
  ADD PRIMARY KEY (`MaLoaiMon`);

--
-- Chỉ mục cho bảng `loai_nguyenvatlieu`
--
ALTER TABLE `loai_nguyenvatlieu`
  ADD PRIMARY KEY (`MaLoaiNVL`);

--
-- Chỉ mục cho bảng `nguyenvatlieu`
--
ALTER TABLE `nguyenvatlieu`
  ADD PRIMARY KEY (`MaNVL`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phieukiem`
--
ALTER TABLE `phieukiem`
  ADD PRIMARY KEY (`MaPK`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`MaPX`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTT`);

--
-- Chỉ mục cho bảng `topping_lienket`
--
ALTER TABLE `topping_lienket`
  ADD PRIMARY KEY (`MaMon`,`MaTopping`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
