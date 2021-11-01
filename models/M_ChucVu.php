<?php
include 'E_ChucVu.php';
class Model_ChucVu
{
    public function __construct()
    {
    }

    public function get__AllChucVu()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM chucvu';
        $result = $conn->query($sql);
        $ChucVuList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ChucVu = new ChucVu();
                $ChucVu->clone($row);
                array_push($ChucVuList, $ChucVu);
            }
            $conn->close();
            return $ChucVuList;
        }
    }

    public function get_ChucVuDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM chucvu WHERE MaCV="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ChucVu = new ChucVu();
                $ChucVu->clone($row);
                $conn->close();
                return $ChucVu;
            }
        }
    }

    public function get_ChucVuByName($name)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM chucvu WHERE TenCV="' . $name . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ChucVu = new ChucVu();
                $ChucVu->clone($row);
                $conn->close();
                return $ChucVu;
            }
        }
    }

    public function add_ChucVu($ChucVu)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO `chucvu`(`TenCV`, `TroCap`) 
                VALUES 
                ('" . $ChucVu->get_TenCV() . "',
                '" . $ChucVu->get_MucTroCap() . "')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
