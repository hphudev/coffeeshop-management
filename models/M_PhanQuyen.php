<?php
include 'E_PhanQuyen.php';
class Model_PhanQuyen
{
    public function __construct()
    {
    }
    public function get_PhanQuyenByMaCV($id)
    {
        $PhanQuyenList = array();
        include '../configs/config.php';
        $sql = 'SELECT * FROM quyen WHERE MaCV="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $PhanQuyen = new PhanQuyen();
                $PhanQuyen->clone($row);
                array_push($PhanQuyenList, $PhanQuyen);
            }
            return $PhanQuyenList;
        } else
            return null;
    }
    public function reset_PQ($id)
    {
        include '../configs/config.php';
        $sql = 'DELETE FROM `quyen` WHERE MaCV="' . $id . '"';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function update_PQ($PhanQuyen)
    {
        include '../configs/config.php';
        $sql = 'INSERT INTO `quyen`(`MaCV`, `TenQuyen`) VALUES 
            ("' . $PhanQuyen->get_MaCV() . '",' .
            '"' . $PhanQuyen->get_TenQuyen() . '")';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function check_PhanQuyenType($id, $type)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM quyen WHERE MaCV="' . $id . '" AND TenQuyen LIKE "' . $type . '%"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else
            return false;
    }
    public function check_PhanQuyen($id, $TenQuyen)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM quyen WHERE MaCV="' . $id . '" AND TenQuyen="' . $TenQuyen . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else
            return false;
    }
}
