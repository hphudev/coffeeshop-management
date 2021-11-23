<?php
include 'E_NhaCungCap.php';

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

    public function delete_NCC($MaNCC)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM nguyenvatlieu WHERE MaNCC='" . $MaNCC . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
        {
            $sql = "SELECT * FROM phieunhap WHERE MaNCC='" . $MaNCC . "'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0)
            {
                $sql = "DELETE FROM nhacungcap WHERE MaNCC='" . $MaNCC . "'";
                $result = $conn->query($sql);
                if ($result)
                {
                    return 1;
                }
                return 0;
            }
            return 0;
        }
        return 0;
    }

    public function generate_MaNCC()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("nhacungcap", "ncc");
    }
}