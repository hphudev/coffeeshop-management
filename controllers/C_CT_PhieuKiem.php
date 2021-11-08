<?php
include '../models/M_PhieuKiem.php';
include '../models/M_NguyenVatLieu.php';
include '../models/M_TinhTrang.php';

class C_CT_PhieuKiem
{
    public function invoke()
    {
        if (isset($_POST['action']))
        {
            $ModelCTPhieuKiem = new Model_CT_PhieuKiem();
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

            $ModelTT = new Model_TinhTrang();
            $TTList = $ModelTT->get_AllTinhTrang();
            function getMaTT($TTList, $ten)
            {
                for ($i = 0; $i < count($TTList); $i++) {
                    if ($TTList[$i]->get_TenTinhTrang() == $ten) {
                        return $TTList[$i]->get_MaTinhTrang();
                    }
                }
            }

            //Define action
            if ($_POST['action'] == "add" && isset($_POST['pk_id']) && isset($_POST['mater_name']))
            {
                $MaNVL = getMaNVL($NVLList, $_POST['mater_name']);

                function getSoLuongNVL($NVLList, $MaNVL)
                {
                    for ($i = 0; $i < count($NVLList); $i++) {
                        if ($NVLList[$i]->get_MaNVL() == $MaNVL) {
                            return $NVLList[$i]->get_SoLuongTon();
                        }
                    }
                } 

                $data = array(
                    "MaPK"=>$_POST['pk_id'],
                    "MaNVL"=>$MaNVL,
                    "SoLuongBaoCao"=>getSoLuongNVL($NVLList, $MaNVL),
                    "SoLuongThucTe"=>0,
                    "MaTT"=>'',
                    "GhiChu"=>''
                );

                $CTPK = new CT_PhieuKiem($data);
                
                if ($ModelCTPhieuKiem->add_CT_PhieuKiem($CTPK) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            if ($_POST['action'] == "edit" && isset($_POST['mater_id']) && isset($_POST['pk_id'])
                && isset($_POST['quantity_ck']) && isset($_POST['note']) && isset($_POST['status']))
            {


                $data = array(
                    "MaPK"=>$_POST['pk_id'],
                    "MaNVL"=>$_POST['mater_id'],
                    "SoLuongBaoCao"=>0,
                    "SoLuongThucTe"=>$_POST['quantity_ck'],
                    "MaTT"=>getMaTT($TTList, $_POST['status']),
                    "GhiChu"=>$_POST['note']
                );

                $CTPK = new CT_PhieuKiem($data);
                
                if ($ModelCTPhieuKiem->update_CT_PhieuKiem($CTPK) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            if ($_POST['action'] == "delete" && isset($_POST['mater_id']) && isset($_POST['pk_id']))
            {

                $ModelCTPK = new Model_CT_PhieuKiem();
                $CTPK = $ModelCTPK->delete_CT_PhieuKiem($_POST['pk_id'], $_POST['mater_id']);
                
                if ($CTPK == 1)
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

$C_CTPhieuKiem = new C_CT_PhieuKiem();
$C_CTPhieuKiem->invoke();
?>