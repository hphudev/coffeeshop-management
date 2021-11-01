<?php
include_once '../models/M_ChucVu.php';
include_once '../models/M_General_CMD.php';

class C_NhanVien
{
    public function invoke()
    {
        $ModelChucVu = new Model_ChucVu();
        $ModelGeneral = new General_CMD();

        if (isset($_GET['add'])) {
            $ChucVu = new ChucVu();
            $ChucVu->set_MaCV($ModelGeneral->AutoGetID('chucvu', 'cv'));
            $ChucVu->set_TenCV($_GET['TenCV']);
            $ChucVu->set_MucTroCap($_GET['TroCap']);
            $result = $ModelChucVu->add_ChucVu($ChucVu);

            if ($result == 1) {
                echo 'success';
            } else {
                echo 'error';
            }
        }

        if (isset($_GET['check'])) {
            $ChucVu = $ModelChucVu->get_ChucVuByName($_GET['check']);

            if ($ChucVu != null) {
                echo 'exist';
            } else echo 'success';
        }
    }
}

$C_NhanVien = new C_NhanVien();
$C_NhanVien->invoke();
