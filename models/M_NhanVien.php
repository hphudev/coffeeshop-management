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
                $NhanVien = new NhanVien($row);
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
                $NhanVien = new NhanVien($row);
                $conn->close();
                return $NhanVien;
            }
        }
    }
}

