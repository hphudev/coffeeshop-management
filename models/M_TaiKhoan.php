<?php
include 'E_TaiKhoan.php';
class Model_TaiKhoan
{
    public function __construct()
    {
    }

    public function get__AllTaiKhoan()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM taikhoan';
        $result = $conn->query($sql);
        $TaiKhoanList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TaiKhoan = new TaiKhoan();
                $TaiKhoan->clone($row);
                array_push($TaiKhoanList, $TaiKhoan);
            }
            return $TaiKhoanList;
        }
    }

    public function get_TaiKhoanDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM taikhoan WHERE MaNV="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TaiKhoan = new TaiKhoan();
                $TaiKhoan->clone($row);
                $conn->close();
                return $TaiKhoan;
            }
        }
    }

    public function login($TaiKhoan)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM `taikhoan` WHERE MaTaiKhoan='" . $TaiKhoan->get_MaTK() . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = new TaiKhoan();
                $temp->clone($row);
                $conn->close();
                if ($TaiKhoan->get_MatKhau() != $temp->get_MatKhau()) {
                    return "wrongpassword";
                } else {
                    return $temp->get_MaNV();
                }
            }
        } else {
            return null;
        }
    }
}
