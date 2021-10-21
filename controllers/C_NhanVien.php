<?php
include '../models/M_NhanVien.php';

class C_NhanVien
{
    public function invoke()
    {
        if (isset($_GET['id'])) {
            $NhanVienID = $_GET['id'];
            $ModelNhanVien = new Model_NhanVien();
            $NhanVien = $ModelNhanVien->get_NhanVienDetails($NhanVienID);

            include_once('../admin/staff/info.php');
        } else {
            $ModelNhanVien = new Model_NhanVien();
            $NhanVienList = $ModelNhanVien->get_AllNhanVien();

            include_once('../admin/staff.php');
        }
    }
}

$C_NhanVien = new C_NhanVien();
$C_NhanVien->invoke();
