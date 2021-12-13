<?php
include '../models/M_NhaCungCap.php';

class C_NhaCungCap
{
    public function invoke()
    {
        if (isset($_POST['action']))
        {
            $ModelNCC = new Model_NhaCungCap();

            //Define action
            if ($_POST['action'] == "add-supplier")
            {
                $data = array(
                    "MaNCC"=>$ModelNCC->generate_MaNCC(),
                    "TenNCC"=>$_POST['name'],
                    "SDT"=>$_POST['phone']
                );
                
                $NCC = new NhaCungCap($data);
                if ($ModelNCC->add_NhaCungCap($NCC) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "edit-supplier")
            {
                $data = array(
                    "MaNCC"=>$_POST['id'],
                    "TenNCC"=>$_POST['name'],
                    "SDT"=>$_POST['phone']
                );
                
                $NCC = new NhaCungCap($data);
                if ($ModelNCC->update_NhaCungCap($NCC) == 1)
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
                if ($ModelNCC->delete_NCC($_POST['supplier_id']) == 1)
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

$C_NhaCungCap = new C_NhaCungCap();
$C_NhaCungCap->invoke();
?>