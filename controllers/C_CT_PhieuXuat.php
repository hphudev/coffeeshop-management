<?php
include '../models/M_PhieuXuat.php';
include '../models/M_NguyenVatLieu.php';

class C_CT_PhieuXuat
{
    public function invoke()
    {
        if (isset($_POST['action']))
        {
            $ModelCTPhieuXuat = new Model_CT_PhieuXuat();
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
            if ($_POST['action'] == "add" && isset($_POST['px_id']) && isset($_POST['mater_name'])
                && isset($_POST['quantity']))
            {
                $data = array(
                    "MaPX"=>$_POST['px_id'],
                    "MaNVL"=>getMaNVL($NVLList, $_POST['mater_name']),
                    "SoLuong"=>$_POST['quantity']
                );

                $CTPX = new CT_PhieuXuat($data);
                
                if ($ModelCTPhieuXuat->add_CT_PhieuXuat($CTPX) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "edit" && isset($_POST['mater_id']) && isset($_POST['px_id'])
                && isset($_POST['quantity']))
            {
                $data = array(
                    "MaPX"=>$_POST['px_id'],
                    "MaNVL"=>$_POST['mater_id'],
                    "SoLuong"=>$_POST['quantity'],
                );

                $CTPX = new CT_PhieuXuat($data);
                
                if ($ModelCTPhieuXuat->update_CT_PhieuXuat($CTPX) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "delete" && isset($_POST['mater_id']) && isset($_POST['px_id'])
                && isset($_POST['quantity']))
            {
                $data = array(
                    "MaPX"=>$_POST['px_id'],
                    "MaNVL"=>$_POST['mater_id'],
                    "SoLuong"=>$_POST['quantity']
                );

                $CTPX = new CT_PhieuXuat($data);
                
                if ($ModelCTPhieuXuat->delete_CT_PhieuXuat($CTPX) == 1)
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

$C_CTPhieuXuat = new C_CT_PhieuXuat();
$C_CTPhieuXuat->invoke();
?>