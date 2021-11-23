<?php
include 'E_LoaiNguyenVatLieu.php';

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

    public function delete_LoaiNVL($MaLoaiNVL)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM nguyenvatlieu WHERE MaLoaiNVL='" . $MaLoaiNVL . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
        {
            $sql = "DELETE FROM loai_nguyenvatlieu WHERE MaLoaiNVL='" . $MaLoaiNVL . "'";
            $result = $conn->query($sql);
            if ($result)
            {
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function generate_MaLoaiNVL()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("loai_nguyenvatlieu", "lnvl");
    }
}