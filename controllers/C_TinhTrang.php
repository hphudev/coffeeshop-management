<?php
include '../models/M_TinhTrang.php';

class C_TinhTrang
{
    public function invoke()
    {
        if (isset($_POST['action']))
        {
            $ModelTT = new Model_TinhTrang();

            //Define action
            if ($_POST['action'] == "add-sts")
            {
                $data = array(
                    "MaTT"=>$ModelTT->generate_MaTT(),
                    "TenTT"=>$_POST['name']
                );
                
                $TT = new TinhTrang($data);
                if ($ModelTT->add_TinhTrang($TT) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "edit-sts")
            {
                $data = array(
                    "MaTT"=>$_POST['id'],
                    "TenTT"=>$_POST['name']
                );
                
                $TT = new TinhTrang($data);
                if ($ModelTT->update_TinhTrang($TT) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "delete")
            {
                if ($ModelTT->delete_TinhTrang($_POST['sts_id']) == 1)
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

$C_TinhTrang = new C_TinhTrang();
$C_TinhTrang->invoke();
?>