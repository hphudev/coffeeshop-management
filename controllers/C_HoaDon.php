<?php
include '../models/M_HoaDon.php';
include '../models/M_NhanVien.php';
include '../models/M_Mon.php';
include '../models/M_KhuyenMai.php';
include '../models/M_General_CMD.php';
include '../models/M_KhachHang.php';
include '../models/M_Blender.php';


class C_HoaDon
{
    public function invoke()
    {
        session_start();
        $ModelHoaDon = new Model_HoaDon();
        $ModelNhanVien = new Model_NhanVien();
        $ModelKhuyenMai = new Model_KhuyenMai();
        $ModelGeneral = new General_CMD();
        $ModelMon = new Model_Mon();
        $ModelKhachHang = new Model_KhachHang();

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'pay') {
                $goiMonId = $_POST['id'];
                $DatMon = $ModelHoaDon->get_DatMon($goiMonId);
                $DatMonDetails = $ModelHoaDon->get_DatMonDetails($goiMonId);
                $NhanVienThuNgan = $ModelNhanVien->get_NhanVienDetails($_SESSION['id']);
                
                include_once '../admin/payment/payment.php';
                echo "<script>console.log('" . $_SESSION['id'] . "')</script>";
            }
            if ($_POST['action'] == 'khuyenmai') {
                $khuyenMaiId = $_POST['id'];
                $KM = $ModelKhuyenMai->get_KhuyenMai($khuyenMaiId);
                if ($KM == null) {
                    echo "error";
                } else {
                    $today = new DateTime('now');
                    if (date("Y-m-d", $KM->get_ThoiGianKT()) < $today->format("Y-m-d")) {
                        echo "expired";
                    } else if ($KM->get_SoLuongConLai() <= 0) {
                        echo "runout";
                    } else {
                        echo $KM->get_MaKM();
                        echo "\n";
                        echo $KM->get_TienKMToiDa();
                    }
                }
            }
            if ($_POST['action'] == 'hoadon') {
                // Cap nhat thong tin hoa don
                $HoaDon = new HoaDon();
                $HoaDon->set_MaHD($ModelGeneral->getIDNum('hoadon', 'hd', 'MaHD'));
                $HoaDon->set_MaNVLap($_SESSION['id']);
                $HoaDon->set_MaKH($_POST['customer']);
                $HoaDon->set_TongTienTT($_POST['pay']);
                $HoaDon->set_TongTienKH($_POST['payed']);
                $HoaDon->set_TienKhuyenMai($_POST['discount']);
                $HoaDon->set_TongTienKH($_POST['payed']);
                $HoaDon->set_TienTraLai($_POST['excess']);
                $HoaDon->set_ChiTietHoaDon($ModelHoaDon->get_HoaDonByDatMon($_POST['order']));
                $SoThuTu = $_POST['position'];
                $ModelHoaDon->add_HoaDon($HoaDon);
                foreach ($HoaDon->get_ChiTietHoaDon() as $CTHD) {
                    $ModelMon->update_SellAmount($CTHD->get_MaMon(), $CTHD->get_SoLuong());
                }
                // Cap nhat thong tin khach hang
                $KH = new KhachHang();
                if ($_POST['customer'] != "") {
                    $KH = $ModelKhachHang->get_KhachHangDetails($_POST['customer']);
                    $KH->set_DiemTV($KH->get_DiemTV() + ($HoaDon->get_TongTienTT() / 1000) * $KH->get_LoaiTV()->get_TyLeTichDiem());
                    $KH->set_TongChi($KH->get_TongChi() + $HoaDon->get_TongTienTT());
                    $ModelKhachHang->update_KhachHangPoint($KH);
                    $ModelKhachHang->update_HangThanhVien($KH);
                }
                // Cap nhap thong tin ma khuyen mai
                if ($_POST['discount_id'] != 'null' && $_POST['discount_id'] != '') {
                    $KhuyenMai = $ModelKhuyenMai->get_KhuyenMaiById($_POST['discount_id']);
                    $KhuyenMai->set_SoLuongConLai($KhuyenMai->get_SoLuongConLai() - 1);
                    $ModelKhuyenMai->update_KhuyenMai($KhuyenMai);
                }


                $NhanVienThuNgan = $ModelNhanVien->get_NhanVienDetails($HoaDon->get_MaNVLap());
                include_once '../admin/payment/receipt.php';
            }
        }
    }
}

$C_HoaDon = new C_HoaDon();
$C_HoaDon->invoke();
