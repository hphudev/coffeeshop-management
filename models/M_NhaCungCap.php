<?php
include 'NhaCungCap.php';

class Model_NhaCungCap
{
    public function __construct()
    {
    }

    public function get_AllNhaCungCap()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nhacungcap';
        $result = $conn->query($sql);
        $NhaCungCapList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NhaCungCap = new NhaCungCap($row);
                array_push($NhaCungCapList, $NhaCungCap);
            }
            return $NhaCungCapList;
        }
    }

    public function get_NhaCungCapDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nhacungcap WHERE MaNCC="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NhaCungCap = new NhaCungCap($row);
                $conn->close();
                return $NhaCungCap;
            }
        }
    }

    public function add_NhaCungCap($ncc)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO nhacungcap (MaNCC, TenNCC)
                VALUES ('" . $ncc->get_MaNCC() . "', '" . $ncc->get_TenNCC() . "')";
        $result = $conn->query($sql);
        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function update_NhaCungCap($ncc)
    {
        include '../configs/config.php';
        $sql = "UPDATE nhacungcap
                SET TenNCC='" . $ncc->get_TenNCC() . "' WHERE MaNCC='" . $ncc->get_MaNCC() . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function generate_MaNCC()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("nhacungcap", "ncc");
    }
}

if (isset($_POST['name']) && isset($_POST['action']))
{
    $ModelNCC = new Model_NhaCungCap();

    //Define action
    if ($_POST['action'] == "add-supplier")
    {
        $data = array(
            "MaNCC"=>$ModelNCC->generate_MaNCC(),
            "TenNCC"=>$_POST['name']
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
            "TenNCC"=>$_POST['name']
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
} else {
    //echo json_encode(array('success' =>'0'));
}