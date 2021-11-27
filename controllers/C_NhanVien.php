<?php
include_once '../models/M_NhanVien.php';
include_once '../models/M_ChucVu.php';
include_once '../models/M_General_CMD.php';


class C_NhanVien
{
    public function invoke()
    {
        $ModelNhanVien = new Model_NhanVien();
        $ModelChucVu = new Model_ChucVu();
        $ChucVuList = $ModelChucVu->get__AllChucVu();
        $ModelPhanQuyen = new Model_PhanQuyen();
        $General = new General_CMD();

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'staff' && !isset($_GET['id'])) {
                include_once '../admin/staff.php';
            }
        }

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'nhanvien') {
                $NhanVienList = $ModelNhanVien->get_AllNhanVien();
                include_once '../admin/staff/nhanvien.php';
            }
            if ($_POST['action'] == 'chucvu') {
                include_once '../admin/staff/chucvu.php';
            }
            if ($_POST['action'] == 'bangphanquyen') {
                include_once '../admin/staff/phanquyen.php';
            }
        }

        if (isset($_GET['id'])) {
            $NhanVienID = $_GET['id'];
            $NhanVien = $ModelNhanVien->get_NhanVienDetails($NhanVienID);

            if (isset($_GET['update'])) {
                $NhanVien->set_HoTenDem($_GET['HoTenDem']);
                $NhanVien->set_Ten($_GET['Ten']);
                $NhanVien->set_CMND($_GET['CMND']);
                $NhanVien->set_NgaySinh(strtotime($_GET['NgaySinh']));
                $NhanVien->set_GioiTinh($_GET['GioiTinh']);
                $NhanVien->set_SDT($_GET['SDT']);
                $NhanVien->set_DiaChi($_GET['DiaChi']);

                $ModelNhanVien = new Model_NhanVien();
                $result = $ModelNhanVien->update_NhanVienDetails($NhanVien);

                if ($result == 1) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else if (isset($_GET['updatework'])) {
                $NhanVien->set_NgayVaoLam(strtotime($_GET['NgayVaoLam']));
                $NhanVien->set_Luong($_GET['Luong']);
                $NhanVien->get_TaiKhoan()->set_MaTK($_GET['TaiKhoan']);
                $NhanVien->get_TaiKhoan()->set_MatKhau($_GET['MatKhau']);
                $NhanVien->set_ChucVu($ModelChucVu->get_ChucVuByName($_GET['ChucVu']));

                $result = $ModelNhanVien->update_NhanVienDetails($NhanVien);

                if ($result == 1) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else if (isset($_GET['add'])) {
                $NhanVien = new NhanVien();

                $NhanVien->set_MaNV($General->getIDNum('nhanvien', 'nv', 'MaNV'));
                $NhanVien->set_HoTenDem($_GET['HoTenDem']);
                $NhanVien->set_Ten($_GET['Ten']);
                $NhanVien->set_CMND($_GET['CMND']);
                $NhanVien->set_NgaySinh(strtotime($_GET['NgaySinh']));
                $NhanVien->set_GioiTinh($_GET['GioiTinh']);
                $NhanVien->set_SDT($_GET['SDT']);
                $NhanVien->set_DiaChi($_GET['DiaChi']);
                $NhanVien->set_NgayVaoLam(strtotime($_GET['NgayVaoLam']));
                $NhanVien->set_Luong($_GET['Luong']);
                $NhanVien->get_TaiKhoan()->set_MaTK($_GET['TaiKhoan']);
                $NhanVien->get_TaiKhoan()->set_MatKhau($_GET['MatKhau']);
                $NhanVien->set_ChucVu($ModelChucVu->get_ChucVuByName($_GET['ChucVu']));

                $result = $ModelNhanVien->add_NhanVien($NhanVien);

                if ($result == true) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else if (isset($_GET['delete'])) {
                $result = $ModelNhanVien->delete_NhanVien($NhanVien->get_MaNV());

                if ($result == 1) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                include_once '../admin/staff/info.php';
            }
        }
    }
}

$C_NhanVien = new C_NhanVien();
$C_NhanVien->invoke();
