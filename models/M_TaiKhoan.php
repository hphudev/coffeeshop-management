<?php
include 'E_TaiKhoan.php';
class Model_TaiKhoan
{
    public function __construct()
    {
    }

    public function get__AllChucVu()
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
        $sql = 'SELECT * FROM taikhoan WHERE MaTK="' . $id . '"';
        $result = $conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $TaiKhoan = new TaiKhoan();
                $TaiKhoan->clone($row);
                $conn->close();
                return $TaiKhoan;
            }
        }
    }
}
