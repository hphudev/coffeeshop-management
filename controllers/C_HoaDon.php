<?php
include '../models/M_HoaDon.php';
include '../models/M_Mon.php';
include '../models/M_NhanVien.php';
include '../models/M_KhuyenMai.php';

class C_HoaDon
{
    public function invoke()
    {
        session_start();
        $ModelHoaDon = new Model_HoaDon();
        $ModelMon = new Model_Mon();
        $ModelNhanVien = new Model_NhanVien();
        $ModelKhuyenMai = new Model_KhuyenMai();
        if ($_POST['action'] == 'pay') {
            $goiMonId = $_POST['id'];
            $DatMon = $ModelHoaDon->get_DatMon($goiMonId);
            $DatMonDetails = $ModelHoaDon->get_DatMonDetails($goiMonId);
            $NhanVienThuNgan = $ModelNhanVien->get_NhanVienDetails($_SESSION['id']);
            include_once '../admin/payment/payment.php';
        }
        if ($_POST['action'] == 'khuyenmai') {
            $khuyenMaiId = $_POST['id'];
            $KhuyenMai = $ModelKhuyenMai->get_KhuyenMai($khuyenMaiId);
            if ($KhuyenMai == null) {
                echo "error";
            } else {
                $today = new DateTime('now');
                if ($KhuyenMai->get_ThoiGianKT()->format("Y-m-d") < $today->format("Y-m-d")) {
                    echo "expired";
                } else if ($KhuyenMai->get_SoLuong() < 0) {
                    echo "runout";
                } else {
                    echo $KhuyenMai->get_TienKMToiDa();
                }
                //echo date_format($KhuyenMai->get_ThoiGianBD(), "DD/MM")
                //echo $KhuyenMai->get_ThoiGianBD();
            }
        }
    }
}

$C_HoaDon = new C_HoaDon();
$C_HoaDon->invoke();
