<?php
include '../models/M_PhieuKiem.php';

class C_PhieuKiem
{
    public function invoke()
    {
        if (isset($_GET['report']))
        {
            if (!isset($_GET['id']))
            {
                $ModelPhieuKiem = new Model_PhieuKiem();
                $PhieuKiemList = $ModelPhieuKiem->get_AllPhieuKiem();

                include_once('../admin/warehouse/report.php');
            }
            else
            {
                $ModelPhieuKiem = new Model_PhieuKiem();
                $PhieuKiem = $ModelPhieuKiem->get_PhieuKiemDetails($_GET['id']);
                $ModelCTPhieuKiem = new Model_CT_PhieuKiem();
                $CTPhieuKiem = $ModelCTPhieuKiem->get_CT_PhieuKiemDetails($_GET['id']);

                include_once('../admin/warehouse/report_detail.php');
            }
        }
        if (isset($_POST['action']))
        {
            $ModelPhieuKiem = new Model_PhieuKiem();

            if ($_POST['action'] == "add" && isset($_POST['main_staff_name']) && isset($_POST['sup_staff_name'])
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
                    "MaPK"=>$ModelPhieuKiem->generate_MaPhieuKiem(),
                    "MaNVKiem"=>getMaNV($NhanVienList, $_POST['main_staff_name']),
                    "MaNVPhuKiem"=>getMaNV($NhanVienList, $_POST['sup_staff_name']),
                    "NgayLap"=>$mysql_date_now,
                    "GhiChu"=>$_POST['note']
                );
                
                $PK = new PhieuKiemKho($data);
                if ($ModelPhieuKiem->add_PhieuKiem($PK) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            if ($_POST['action'] == "edit" && isset($_POST['main_staff_name']) && isset($_POST['sup_staff_name'])
                && isset($_POST['note']) && isset($_POST['pk_id'])) 
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
                    "MaPK"=>$_POST['pk_id'],
                    "MaNVKiem"=>getMaNV($NhanVienList, $_POST['main_staff_name']),
                    "MaNVPhuKiem"=>getMaNV($NhanVienList, $_POST['sup_staff_name']),
                    "NgayLap"=>$mysql_date_now,
                    "GhiChu"=>$_POST['note']
                );
                
                $PX = new PhieuKiemKho($data);
                if ($ModelPhieuKiem->update_PhieuKiem($PX) == 1)
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

$C_PhieuKiem = new C_PhieuKiem();
$C_PhieuKiem->invoke();
?>