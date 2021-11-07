<?php
include '../models/M_TaiKhoan.php';
include '../models/M_PhanQuyen.php';
class C_TaiKhoan
{
    public function invoke()
    {
        $ModelTaiKhoan = new Model_TaiKhoan();
        $ModelNhanVien = new Model_NhanVien();
        if (isset($_GET['login'])) {
            $TaiKhoan = new TaiKhoan();
            $TaiKhoan->set_MaTK($_GET['id']);
            $TaiKhoan->set_MatKhau($_GET['password']);
            $loginResult = $ModelTaiKhoan->login($TaiKhoan);
            if ($loginResult == null) {
                echo 'notfound';
            } else if ($loginResult == 'wrongpassword') {
                echo 'wrongpassword';
            } else {
                session_start();
                $_SESSION["id"] = $loginResult;
                $NhanVien = $ModelNhanVien->get_NhanVienDetails($loginResult);
                $_SESSION["nhanvien"] = $NhanVien;
                require_once './admin/index.php';
            }
        }
        if (isset($_GET['logout'])) {
            session_start();
            session_unset();
            echo "success";
        }
    }
}

$C_TaiKhoan = new C_TaiKhoan();
$C_TaiKhoan->invoke();
