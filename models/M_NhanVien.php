<?php
include 'E_NhanVien.php';

class Model_NhanVien
{
    public function __construct()
    {
    }

    public function get_AllNhanVien()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nhanvien';
        $result = $conn->query($sql);
        $NhanVienList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NhanVien = new NhanVien();
                $NhanVien->clone($row);
                array_push($NhanVienList, $NhanVien);
            }
            return $NhanVienList;
        }
    }

    public function get_NhanVienDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nhanvien WHERE MaNV="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NhanVien = new NhanVien();
                $NhanVien->clone($row);
                $conn->close();
                return $NhanVien;
            }
        }
    }

    public function update_NhanVienDetails($NhanVien)
    {
        include '../configs/config.php';

        $sql = "UPDATE `nhanvien` 
                SET `HoTen`='" . $NhanVien->get_HoTenDem() . " " . $NhanVien->get_Ten() . "',
                    `NgaySinh`='" . date('Y-m-d H:i:s', $NhanVien->get_NgaySinh()) . "',
                    `GioiTinh`='" . $NhanVien->get_GioiTinh() . "',
                    `CMND`='" . $NhanVien->get_CMND() . "',
                    `SDT`='" . $NhanVien->get_SDT() . "',
                    `DiaChi`='" . $NhanVien->get_DiaChi() . "',
                    `NgayVaoLam`='" . date('Y-m-d H:i:s', $NhanVien->get_NgayVaoLam()) . "',
                    `MaCV`='" . $NhanVien->get_ChucVu()->get_MaCV() . "',
                    `Luong`='" . $NhanVien->get_Luong() . "',
                    `MaTK`='" . $NhanVien->get_TaiKhoan()->get_MaTK() . "' 
                WHERE `MaNV`='" . $NhanVien->get_MaNV() . "'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function add_NhanVien($NhanVien)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO `nhanvien`(`MaNV`, `HoTen`, `NgaySinh`, `GioiTinh`, `CMND`, `SDT`, `DiaChi`, `NgayVaoLam`, `MaCV`, `Luong`, `MaTK`) 
                VALUES 
                ('" . $NhanVien->get_MaNV() . "',
                '" . $NhanVien->get_HoTenDem() . " " . $NhanVien->get_Ten() . "',
                '" . date('Y-m-d H:i:s', $NhanVien->get_NgaySinh()) . "',
                '" . $NhanVien->get_GioiTinh() . "',
                '" . $NhanVien->get_CMND() . "' ,
                '" . $NhanVien->get_SDT() . "',
                '" . $NhanVien->get_DiaChi() . "',
                '" . date('Y-m-d H:i:s', $NhanVien->get_NgayVaoLam()) . "',
                '" . $NhanVien->get_ChucVu()->get_MaCV() . "',
                '" . $NhanVien->get_Luong() . "',
                '" . $NhanVien->get_TaiKhoan()->get_MaTK() . "')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_NhanVien($id)
    {
        include '../configs/config.php';
        $sql = "DELETE FROM nhanvien
                WHERE MaNV='" . $id . "'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

