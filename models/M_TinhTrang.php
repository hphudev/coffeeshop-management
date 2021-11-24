<?php
include 'E_TinhTrang.php';

class Model_TinhTrang
{
    public function __construct()
    {
    }

    public function get_AllTinhTrang()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM tinhtrang';
        $result = $conn->query($sql);
        $TinhTrangList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TinhTrang = new TinhTrang($row);
                array_push($TinhTrangList, $TinhTrang);
            }
            return $TinhTrangList;
        }
    }

    public function get_TinhTrangDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM tinhtrang WHERE MaTT="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TinhTrang = new TinhTrang($row);
                $conn->close();
                return $TinhTrang;
            }
        }
    }

    public function add_TinhTrang($tt)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO tinhtrang (MaTT, TenTT)
                VALUES ('" . $tt->get_MaTinhTrang() . "', '" . $tt->get_TenTinhTrang() . "')";
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

    public function update_TinhTrang($tt)
    {
        include '../configs/config.php';
        $sql = "UPDATE tinhtrang
                SET TenTT='" . $tt->get_TenTinhTrang() . "' WHERE MaTT='" . $tt->get_MaTinhTrang() . "'";
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

    public function delete_TinhTrang($MaTT)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM nguyenvatlieu WHERE MaTinhTrang='" . $MaTT . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
        {
            $sql = "SELECT * FROM ct_phieukiem WHERE MaTT='" . $MaTT . "'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0)
            {
                $sql = "DELETE FROM tinhtrang WHERE MaTT='" . $MaTT . "'";
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

    public function generate_MaTT()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("tinhtrang", "TT");
    }
}
