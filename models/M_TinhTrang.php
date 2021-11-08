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
}
