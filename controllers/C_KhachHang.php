<?php
include '../models/M_KhachHang.php';
include '../models/M_KhuyenMai.php';
include '../models/M_General_CMD.php';
include '../models/M_PhanQuyen.php';


class C_KhachHang
{
    public function invoke()
    {
        $ModelKhachHang = new Model_KhachHang();
        $ModelKhuyenMai = new Model_KhuyenMai();
        $General = new General_CMD();
        $DSKhachHang = $ModelKhachHang->get_AllKhachHang();
        $DSLoaiKH = $ModelKhachHang->get_AllHangTV();

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'customer') {
                include_once '../admin/customer.php';
            }
        }

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'khachhang') {
                $ModelKhachHang->get_AllKhachHang();
                include_once '../admin/customer/customerList.php';
            }
            if ($_POST['action'] == 'hangthanhvien') {
                $DSHangTV = $ModelKhachHang->get_AllHangTV();
                include_once '../admin/customer/rank.php';
            }
            if ($_POST['action'] == 'khuyenmai') {
                $DSKhuyenMai = $ModelKhuyenMai->get_AllKhuyenMai();
                include_once '../admin/customer/discount.php';
            }
            if ($_POST['action'] == 'update') {
                $KhachHang = new KhachHang();
                //$KhachHang->set_MaKH($General->AutoGetID());
                echo $_POST['hoten'];
                $KhachHang->set_MaKH($_POST['id']);
                $KhachHang->set_HoTen($_POST['hoten']);
                $KhachHang->set_SDT($_POST['sdt']);
                $KhachHang->set_GioiTinh($_POST['gioitinh']);
                $KhachHang->set_DiemTV($_POST['diemtv']);
                $KhachHang->set_TongChi($_POST['tongchi']);
                $KhachHang->set_DiemTV($_POST['diemtv']);
                $KhachHang->set_NgayDK(date('Y-m-d H:i:s', strtotime($_POST['ngaydk'])));
                $KhachHang->set_LoaiTV($ModelKhachHang->get_LoaiTVByName($_POST['loaitv']));
                if ($ModelKhachHang->update_KhachHang($KhachHang)) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            if ($_POST['action'] == 'add') {
                $KhachHang = new KhachHang();
                $KhachHang->set_MaKH($General->getIDNum('khachhang', 'kh', 'MaKH'));
                $KhachHang->set_HoTen($_POST['hoten']);
                $KhachHang->set_SDT($_POST['sdt']);
                $KhachHang->set_GioiTinh($_POST['gioitinh']);
                $KhachHang->set_DiemTV($_POST['diemtv']);
                $KhachHang->set_TongChi($_POST['tongchi']);
                $KhachHang->set_DiemTV($_POST['diemtv']);
                $KhachHang->set_NgayDK(date('Y-m-d', strtotime($_POST['ngaydk'])));
                $KhachHang->set_LoaiTV($ModelKhachHang->get_LoaiTVByName($_POST['loaitv']));

                if ($ModelKhachHang->find_KHBySDT($KhachHang->get_SDT()) == null) {
                    if ($ModelKhachHang->add_KhachHang($KhachHang)) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                } else {
                    echo "phone";
                }

                //echo $General->getIDNum('khachhang', 'kh', 'MaKH');
            }
            if ($_POST['action'] == 'delete') {
                if ($ModelKhachHang->delete_KhachHang($_POST['id'])) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            if ($_POST['action'] == 'updateHangTV') {
                $LoaiTV = new LoaiTV();
                $LoaiTV->set_MaLoaiTV($_POST['id']);
                $LoaiTV->set_TenLoaiTV($_POST['tenloaitv']);
                $LoaiTV->set_DiemLenHang($_POST['diemlenhang']);
                $LoaiTV->set_TyLeTichDiem($_POST['tyletichluy']);
                $LoaiTV->set_HangTV($_POST['hangtv']);
                if ($ModelKhachHang->update_LoaiTV($LoaiTV)) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            if ($_POST['action'] == 'addHangTV') {
                $LoaiTV = new LoaiTV();
                $LoaiTV->set_MaLoaiTV($General->AutoGetID('loaithanhvien', 'tv', 'MaLoaiTV'));
                $LoaiTV->set_TenLoaiTV($_POST['tenloaitv']);
                $LoaiTV->set_DiemLenHang($_POST['diemlenhang']);
                $LoaiTV->set_TyLeTichDiem($_POST['tyletichluy']);
                $LoaiTV->set_HangTV($_POST['hangtv']);

                if ($ModelKhachHang->get_LoaiTVByName($LoaiTV->get_TenLoaiTV()) == null) {
                    if ($ModelKhachHang->add_LoaiTV($LoaiTV)) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                } else {
                    echo "exist";
                }
            }
            if ($_POST['action'] == 'deleteHangTV') {
                if ($ModelKhachHang->delete_LoaiTV($_POST['id'])) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            if ($_POST['action'] == 'findKH') {
                $KH = $ModelKhachHang->find_KHBySDT($_POST['sdt']);

                if ($KH != null) {
                    echo $KH->get_HoTen();
                    echo "\n";
                    echo $KH->get_MaKH();
                    echo "\n";
                    echo $KH->get_DiemTV();
                } else {
                    echo "error";
                }
            }
            if ($_POST['action'] == 'updateKM') {
                $KhuyenMai = new KhuyenMai();
                $KhuyenMai->set_MaKM($_POST['id']);
                $KhuyenMai->set_Code($_POST['code']);
                $KhuyenMai->set_TenKM($_POST['tenkm']);
                $KhuyenMai->set_ThoiGianBD(strtotime($_POST['ngaybd']));
                $KhuyenMai->set_ThoiGianKT(strtotime($_POST['ngaykt']));
                $KhuyenMai->set_SoLuong($_POST['soluong']);
                $KhuyenMai->set_PhanTramKM($_POST['tyle']);
                $KhuyenMai->set_TienHDToiThieu($_POST['toithieu']);
                $KhuyenMai->set_TienKMToiDa($_POST['toida']);

                if ($ModelKhuyenMai->update_KhuyenMai($KhuyenMai)) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            if ($_POST['action'] == 'addKM') {
                $KhuyenMai = new KhuyenMai();
                $KhuyenMai->set_MaKM($General->AutoGetID('khuyenmai', 'km', 'MaKM'));
                $KhuyenMai->set_Code($_POST['code']);
                $KhuyenMai->set_TenKM($_POST['tenkm']);
                $KhuyenMai->set_ThoiGianBD($_POST['ngaybd']);
                $KhuyenMai->set_ThoiGianKT($_POST['ngaykt']);
                $KhuyenMai->set_SoLuong($_POST['soluong']);
                $KhuyenMai->set_PhanTramKM($_POST['tyle']);
                $KhuyenMai->set_TienHDToiThieu($_POST['toithieu']);
                $KhuyenMai->set_TienKMToiDa($_POST['toida']);

                if ($ModelKhuyenMai->get_KhuyenMai($KhuyenMai->get_Code()) == null) {
                    if ($ModelKhuyenMai->add_KhuyenMai($KhuyenMai)) {
                        if (isset($_POST['khID'])) {
                            $KH = $ModelKhachHang->get_KhachHangDetails($_POST['khID']);
                            $KH->set_DiemTV($KH->get_DiemTV() - intval($_POST['point']));

                            if ($ModelKhachHang->update_KhachHang($KH)) {
                                echo "success";
                            } else {
                                echo "error";
                            }
                        } else {
                            echo "success";
                        }
                    } else {
                        echo "error";
                    }
                } else {
                    echo "exist";
                }
            }
            if ($_POST['action'] == 'deleteKM') {
                if ($ModelKhuyenMai->delete_KhuyenMai($_POST['id'])) {
                    echo "success";
                } else {
                    echo "exist";
                }
            }
        }
    }
}

$C_KhachHang = new C_KhachHang();
$C_KhachHang->invoke();
