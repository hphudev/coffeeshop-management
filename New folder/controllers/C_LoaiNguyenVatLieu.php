<?php
include '../models/M_LoaiNguyenVatLieu.php';

class C_LoaiNguyenVatLieu
{
    public function invoke()
    {
        if (isset($_POST['name']) && isset($_POST['action']))
        {
            $ModelLoaiNVL = new Model_LoaiNguyenVatLieu();

            //Define action
            if ($_POST['action'] == "add-type")
            {
                $data = array(
                    "MaLoaiNVL"=>$ModelLoaiNVL->generate_MaLoaiNVL(),
                    "TenLoaiNVL"=>$_POST['name']
                );
                
                $LoaiNVL = new LoaiNguyenVatLieu($data);
                if ($ModelLoaiNVL->add_LoaiNguyenVatLieu($LoaiNVL) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "edit-type")
            {
                $data = array(
                    "MaLoaiNVL"=>$_POST['id'],
                    "TenLoaiNVL"=>$_POST['name']
                );
                
                $LoaiNVL = new LoaiNguyenVatLieu($data);
                if ($ModelLoaiNVL->update_LoaiNguyenVatLieu($LoaiNVL) == 1)
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

$C_LoaiNguyenVatLieu = new C_LoaiNguyenVatLieu();
$C_LoaiNguyenVatLieu->invoke();
?>