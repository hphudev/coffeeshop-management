<?php
include '../models/M_PhieuXuat.php';

class C_PhieuXuat
{
    public function invoke()
    {
        if (isset($_GET['export']))
        {
            if (!isset($_GET['id']))
            {
                $ModelPhieuXuat = new Model_PhieuXuat();
                $PhieuXuatList = $ModelPhieuXuat->get_AllPhieuXuat();

                include_once('../admin/warehouse/export.php');
            }
            else
            {
                $ModelPhieuXuat = new Model_PhieuXuat();
                $PhieuXuat = $ModelPhieuXuat->get_PhieuXuatDetails($_GET['id']);
                $ModelCTPhieuXuat = new Model_CT_PhieuXuat();
                $CTPhieuXuat = $ModelCTPhieuXuat->get_CT_PhieuXuatDetails($_GET['id']);

                include_once('../admin/warehouse/export_detail.php');
            }
        }
        elseif (isset($_GET['receipt']))
        {
            include 'C_PhieuNhap.php';
        }
        if (isset($_POST['action']))
        {
            $ModelPhieuXuat = new Model_PhieuXuat();

            if ($_POST['action'] == "add" && isset($_POST['wh_staff_name']) && isset($_POST['iss_staff_name'])
                && isset($_POST['note'])) 
            {
                include '../models/M_NhanVien.php';

                $ModelNhanVien = new Model_NhanVien();
                $NhanVienList = $ModelNhanVien->get_AllNhanVien();
                function getMaNV($NhanVienList, $tenNV)
                {
                    for ($i = 0; $i < count($NhanVienList); $i++) {
                        if ($NhanVienList[$i]->get_Ten() == $tenNV) {
                            return $NhanVienList[$i]->get_MaNV();
                        }
                    }
                }

                $mysql_date_now = date("Y-m-d H:m:s");

                $data = array(
                    "MaPX"=>$ModelPhieuXuat->generate_MaPhieuXuat(),
                    "MaNVXuat"=>getMaNV($NhanVienList, $_POST['wh_staff_name']),
                    "MaNVNhan"=>getMaNV($NhanVienList, $_POST['iss_staff_name']),
                    "NgayLap"=>$mysql_date_now,
                    "GhiChu"=>$_POST['note']
                );
                
                $PX = new PhieuXuat($data);
                if ($ModelPhieuXuat->add_PhieuXuat($PX) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            if ($_POST['action'] == "edit" && isset($_POST['wh_staff_name']) && isset($_POST['iss_staff_name'])
                && isset($_POST['note']) && isset($_POST['px_id'])) 
            {
                include '../models/M_NhanVien.php';

                $ModelNhanVien = new Model_NhanVien();
                $NhanVienList = $ModelNhanVien->get_AllNhanVien();
                function getMaNV($NhanVienList, $tenNV)
                {
                    for ($i = 0; $i < count($NhanVienList); $i++) {
                        if ($NhanVienList[$i]->get_Ten() == $tenNV) {
                            return $NhanVienList[$i]->get_MaNV();
                        }
                    }
                }

                $mysql_date_now = date("Y-m-d H:m:s");

                $data = array(
                    "MaPX"=>$_POST['px_id'],
                    "MaNVXuat"=>getMaNV($NhanVienList, $_POST['wh_staff_name']),
                    "MaNVNhan"=>getMaNV($NhanVienList, $_POST['iss_staff_name']),
                    "NgayLap"=>$mysql_date_now,
                    "GhiChu"=>$_POST['note']
                );
                
                $PX = new PhieuXuat($data);
                if ($ModelPhieuXuat->update_PhieuXuat($PX) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
        }
    }
}

$C_PhieuXuat = new C_PhieuXuat();
$C_PhieuXuat->invoke();
?>