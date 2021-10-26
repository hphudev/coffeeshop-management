<?php
include 'LoaiNguyenVatLieu.php';

class Model_LoaiNguyenVatLieu
{
    public function __construct()
    {
    }

    public function get_AllLoaiNguyenVatLieu()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM loai_nguyenvatlieu';
        $result = $conn->query($sql);
        $LoaiNguyenVatLieuList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $LoaiNguyenVatLieu = new LoaiNguyenVatLieu($row);
                array_push($LoaiNguyenVatLieuList, $LoaiNguyenVatLieu);
            }
            return $LoaiNguyenVatLieuList;
        }
    }

    public function get_LoaiNguyenVatLieuDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM loai_nguyenvatlieu WHERE MaLoaiNVL="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $LoaiNguyenVatLieu = new LoaiNguyenVatLieu($row);
                $conn->close();
                return $LoaiNguyenVatLieu;
            }
        }
    }

    public function add_LoaiNguyenVatLieu($nvl)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO loai_nguyenvatlieu (MaLoaiNVL, TenLoaiNVL)
                VALUES ('" . $nvl->get_MaLoaiNVL() . "', '" . $nvl->get_TenLoaiNVL() . "')";
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

    public function update_LoaiNguyenVatLieu($nvl)
    {
        include '../configs/config.php';
        $sql = "UPDATE loai_nguyenvatlieu
                SET TenLoaiNVL='" . $nvl->get_TenLoaiNVL() . "' WHERE MaLoaiNVL='" . $nvl->get_MaLoaiNVL() . "'";
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

    public function generate_MaLoaiNVL()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("loai_nguyenvatlieu", "lnvl");
    }
}

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
} else {
    //echo json_encode(array('success' =>'0'));
}
