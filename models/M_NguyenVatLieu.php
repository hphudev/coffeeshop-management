<?php
include 'E_NguyenVatLieu.php';

class Model_NguyenVatLieu
{
    public function __construct()
    {
    }

    public function get_AllNguyenVatLieu()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nguyenvatlieu';
        $result = $conn->query($sql);
        $NguyenVatLieuList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NguyenVatLieu = new NguyenVatLieu($row);
                array_push($NguyenVatLieuList, $NguyenVatLieu);
            }
            return $NguyenVatLieuList;
        }
    }

    public function get_NguyenVatLieuDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nguyenvatlieu WHERE MaNVL="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NguyenVatLieu = new NguyenVatLieu($row);
                $conn->close();
                return $NguyenVatLieu;
            }
        }
    }

    public function add_NguyenVatLieu($nvl)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO
                nguyenvatlieu (MaNVL, MaLoaiNVL, TenNVL, SoLuongTon, MaDVT, DonGiaNhap, MaNCC, MaTinhTrang)
                VALUES ('" . $nvl->get_MaNVL() . "', '" . $nvl->get_MaLoaiNVL() . "', '" . $nvl->get_TenNVL().
                "', '" . $nvl->get_SoLuongTon() . "', '" . $nvl->get_MaDVT() . "', '" . $nvl->get_DonGiaNhap().
                "', '" . $nvl->get_MaNhaCungCap() . "', '" . $nvl->get_MaTinhTrang() . "')";
        $result = $conn->query($sql);
        if ($result) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function update_NguyenVatLieu($nvl)
    {
        include '../configs/config.php';
        $sql = "UPDATE nguyenvatlieu SET MaLoaiNVL='" . $nvl->get_MaLoaiNVL() . "', TenNVL='" . $nvl->get_TenNVL().
                "', SoLuongTon=" . $nvl->get_SoLuongTon() . ", MaDVT='" . $nvl->get_MaDVT() .
                "', DonGiaNhap=" . $nvl->get_DonGiaNhap(). ", MaNCC='" . $nvl->get_MaNhaCungCap() .
                "', MaTinhTrang='" . $nvl->get_MaTinhTrang() . "' WHERE MaNVL='" . $nvl->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function generate_MaNVL()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("nguyenvatlieu", "nvl");
    }
}