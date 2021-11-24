<?php
include 'E_LoaiMon.php';

class Model_LoaiMon
{
    public function __construct()
    {
    }

    public function get_AllLoaiMon()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM loai_mon';
        $result = $conn->query($sql);
        $LoaiMonList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $LoaiMon = new LoaiMon($row);
                array_push($LoaiMonList, $LoaiMon);
            }
            return $LoaiMonList;
        }
    }

    public function get_LoaiMonDetails($id)
    {
        // include '../configs/config.php';
        // $sql = 'SELECT * FROM donvitinh WHERE MaDVT="' . $id . '"';
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $LoaiMon = new LoaiMon($row);
        //         $conn->close();
        //         return $LoaiMon;
        //     }
        // }
    }

    public function add_LoaiMon($LM)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO loai_mon(MaLoaiMon, TenLoaiMon)
                VALUES ('" . $LM->get_MaLoaiMon() . "', '" . $LM->get_TenLoaiMon() . "')";
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

    public function update_LoaiMon($LM)
    {
        include '../configs/config.php';
        $sql = "UPDATE loai_mon
                SET TenLoaiMon='" . $LM->get_TenLoaiMon() . "' WHERE MaLoaiMon='" . $LM->get_MaLoaiMon() . "'";
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

    public function delete_LoaiMon($id)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM mon WHERE MaLoaiMon='" . $id . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
        {
            $sql = "DELETE FROM loai_mon WHERE MaLoaiMon='" . $id . "'";
            $result = $conn->query($sql);
            if ($result)
            {
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function generate_MaLoaiMon()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("loai_mon", "LM");
    }
}