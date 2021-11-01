<?php
include '../models/M_PhieuNhap.php';

class C_PhieuNhap
{
    public function invoke()
    {
        if (isset($_GET['receipt']))
        {
            if (!isset($_GET['id']))
            {
                $ModelPhieuNhap = new Model_PhieuNhap();
                $PhieuNhapList = $ModelPhieuNhap->get_AllPhieuNhap();

                include_once('../admin/warehouse/receipt.php');
            }
            else
            {
                $ModelPhieuNhap = new Model_PhieuNhap();
                $PhieuNhap = $ModelPhieuNhap->get_PhieuNhapDetails($_GET['id']);
                $ModelCTPhieuNhap = new Model_CT_PhieuNhap();
                $CTPhieuNhap = $ModelCTPhieuNhap->get_CT_PhieuNhapDetails($_GET['id']);

                include_once('../admin/warehouse/receipt_detail.php');
            }
        }
        elseif (isset($_GET['export']))
        {
            include 'C_PhieuXuat.php';
        }
        if (isset($_POST['action']))
        {
            $ModelPhieuNhap = new Model_PhieuNhap();

            if ($_POST['action'] == "add")
            {
                if (isset($_POST['staff_name']) && isset($_POST['shipper'])
                    && isset($_POST['supplier_name']) && isset($_POST['pay_amount'])
                    && isset($_POST['debt_amount']) && isset($_POST['note']))
                {
                    include '../models/M_NhaCungCap.php';
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

                    $ModelNhaCungCap = new Model_NhaCungCap();
                    $NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();
                    function getMaNCC($NhaCungCapList, $tenNCC)
                    {
                        for ($i = 0; $i < count($NhaCungCapList); $i++) {
                            if ($NhaCungCapList[$i]->get_TenNCC() == $tenNCC) {
                                return $NhaCungCapList[$i]->get_MaNCC();
                            }
                        }
                    }

                    $mysql_date_now = date("Y-m-d H:m:s");

                    $data = array(
                        "MaPN"=>$ModelPhieuNhap->generate_MaPhieuNhap(),
                        "MaNVNhap"=>getMaNV($NhanVienList, $_POST['staff_name']),
                        "MaNCC"=>getMaNCC($NhaCungCapList, $_POST['supplier_name']),
                        "NgayLap"=>$mysql_date_now,
                        "TongTien"=>0,
                        "TenNguoiGiao"=>$_POST['shipper'],
                        "TienThanhToan"=>$_POST['pay_amount'],
                        "TienNo"=>$_POST['debt_amount'],
                        "GhiChu"=>$_POST['note']
                    );
                    
                    $PN = new PhieuNhap($data);
                    if ($ModelPhieuNhap->add_PhieuNhap($PN) == 1)
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
            else
            {
                if ($_POST['action'] == "edit" && isset($_POST['staff_name']) && isset($_POST['shipper'])
                    && isset($_POST['supplier_name']) && isset($_POST['pay_amount'])
                    && isset($_POST['debt_amount']) && isset($_POST['note']) && isset($_POST['pn_id']))
                {
                    include '../models/M_NhaCungCap.php';
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

                    $ModelNhaCungCap = new Model_NhaCungCap();
                    $NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();
                    function getMaNCC($NhaCungCapList, $tenNCC)
                    {
                        for ($i = 0; $i < count($NhaCungCapList); $i++) {
                            if ($NhaCungCapList[$i]->get_TenNCC() == $tenNCC) {
                                return $NhaCungCapList[$i]->get_MaNCC();
                            }
                        }
                    }


                    $data = array(
                        "MaPN"=>$_POST['pn_id'],
                        "MaNVNhap"=>getMaNV($NhanVienList, $_POST['staff_name']),
                        "MaNCC"=>getMaNCC($NhaCungCapList, $_POST['supplier_name']),
                        "NgayLap"=>"",
                        "TongTien"=>0,
                        "TenNguoiGiao"=>$_POST['shipper'],
                        "TienThanhToan"=>$_POST['pay_amount'],
                        "TienNo"=>$_POST['debt_amount'],
                        "GhiChu"=>$_POST['note']
                    );
                    
                    $PN = new PhieuNhap($data);
                    if ($ModelPhieuNhap->update_PhieuNhap($PN) == 1)
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
}

$C_PhieuNhap = new C_PhieuNhap();
$C_PhieuNhap->invoke();
?>