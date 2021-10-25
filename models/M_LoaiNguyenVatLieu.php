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
}
