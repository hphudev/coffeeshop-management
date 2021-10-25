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
}
