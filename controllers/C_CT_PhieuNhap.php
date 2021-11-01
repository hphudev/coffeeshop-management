<?php
include '../models/M_PhieuNhap.php';
include '../models/M_NguyenVatLieu.php';

class C_CT_PhieuNhap
{
    public function invoke()
    {
        if (isset($_POST['action']))
        {
            $ModelCTPhieuNhap = new Model_CT_PhieuNhap();
            $ModelNVL = new Model_NguyenVatLieu();
            $NVLList = $ModelNVL->get_AllNguyenVatLieu();
            function getMaNVL($NVLList, $ten)
            {
                for ($i = 0; $i < count($NVLList); $i++) {
                    if ($NVLList[$i]->get_TenNVL() == $ten) {
                        return $NVLList[$i]->get_MaNVL();
                    }
                }
            } 

            //Define action
            if ($_POST['action'] == "add" && isset($_POST['pn_id']) && isset($_POST['mater_name'])
                && isset($_POST['quantity']) && isset($_POST['unitprice']))
            {
                $data = array(
                    "MaPN"=>$_POST['pn_id'],
                    "MaNVL"=>getMaNVL($NVLList, $_POST['mater_name']),
                    "SoLuong"=>$_POST['quantity'],
                    "DonGia"=>$_POST['unitprice']
                );

                $CTPN = new CT_PhieuNhap($data);
                
                if ($ModelCTPhieuNhap->add_CT_PhieuNhap($CTPN) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "edit" && isset($_POST['mater_id']) && isset($_POST['pn_id'])
                && isset($_POST['quantity']) && isset($_POST['unitprice']))
            {
                $data = array(
                    "MaPN"=>$_POST['pn_id'],
                    "MaNVL"=>$_POST['mater_id'],
                    "SoLuong"=>$_POST['quantity'],
                    "DonGia"=>$_POST['unitprice']
                );

                $CTPN = new CT_PhieuNhap($data);
                
                if ($ModelCTPhieuNhap->update_CT_PhieuNhap($CTPN) == 1)
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
            //echo json_encode(array('success' =>'0'));
        }
    }
}

$C_CTPhieuNhap = new C_CT_PhieuNhap();
$C_CTPhieuNhap->invoke();
?>