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

    public function add_LoaiMon($dvt)
    {
        // include '../configs/config.php';
        // $sql = "INSERT INTO donvitinh(MaDVT, TenDVT)
        //         VALUES ('" . $dvt->get_MaDVT() . "', '" . $dvt->get_TenDVT() . "')";
        // $result = $conn->query($sql);
        // if ($result)
        // {
        //     return 1;
        // }
        // else
        // {
        //     return 0;
        // }
    }

    public function update_LoaiMon($dvt)
    {
        // include '../configs/config.php';
        // $sql = "UPDATE donvitinh
        //         SET TenDVT='" . $dvt->get_TenDVT() . "' WHERE MaDVT='" . $dvt->get_MaDVT() . "'";
        // $result = $conn->query($sql);
        // if ($result)
        // {
        //     return 1;
        // }
        // else
        // {
        //     return 0;
        // }
    }

    public function generate_MaLoaiMon()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("loai_mon", "LM");
    }
}