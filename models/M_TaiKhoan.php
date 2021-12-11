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

    public function add_TaiKhoan($TaiKhoan, $NVID)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO `taikhoan`(`MaTaiKhoan`, `MatKhau`, `MaNV`) VALUES 
        ('" . $TaiKhoan->get_MaTK() . "',
        '" . $TaiKhoan->get_MatKhau() . "',
        '" . $NVID . "')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function update_TaiKhoan($TaiKhoan, $NVID)
    {
        include '../configs/config.php';
        $sql = "UPDATE `taikhoan` SET 
                `MaTaiKhoan`='" . $TaiKhoan->get_MaTK() .  "',
                `MatKhau`='" . $TaiKhoan->get_MatKhau() .  "'
                WHERE `MaNV`='" .  $NVID .  "'";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function check_TaiKhoan($MaTK)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM `taikhoan` WHERE MaTaiKhoan='" . $MaTK . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_TaiKhoanDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM taikhoan WHERE MaNV="' . $id . '"';
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
