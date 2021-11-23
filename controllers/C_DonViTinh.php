<?php
include '../models/M_DonViTinh.php';

class C_DonViTinh
{
    public function invoke()
    {
        if (isset($_POST['action']))
        {
            $ModelDonViTinh = new Model_DonViTinh();

            //Define action
            if ($_POST['action'] == "add-unit")
            {
                $data = array(
                    "MaDVT"=>$ModelDonViTinh->generate_MaDonViTinh(),
                    "TenDVT"=>$_POST['name']
                );
                
                $DVT = new DonViTinh($data);
                if ($ModelDonViTinh->add_DonViTinh($DVT) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action'] == "edit-unit")
            {
                $data = array(
                    "MaDVT"=>$_POST['id'],
                    "TenDVT"=>$_POST['name']
                );
                
                $DVT = new DonViTinh($data);
                if ($ModelDonViTinh->update_DonViTinh($DVT) == 1)
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
                if ($ModelDonViTinh->delete_DonViTinh($_POST['unit_id']) == 1)
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

$C_DonViTinh = new C_DonViTinh();
$C_DonViTinh->invoke();
?>