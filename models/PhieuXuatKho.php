<?php
class PhieuXuat {
    private $MaPX;
    private $NgayLap;
    private $MaNVXuat;
    private $GhiChu;
    private $MaNVNhan;

    public function __construct($row)
    {
        $this->MaPX = $row['MaPX'];
        $this->NgayLap = $row['NgayLap'];
        $this->MaNVXuat = $row['MaNVXuat'];
        $this->GhiChu = $row['GhiChu'];
        $this->MaNVNhan = $row['MaNVNhan'];
    }

    function set_MaPX($ma) {
        $this->MaPX = $ma;
    }

    function get_MaPX() {
        return $this->MaPX;
    }

    function set_NgayLap($ngay) {
        $this->NgayLap = $ngay;
    }

    function get_NgayLap() {
        return $this->NgayLap;
    }

    function set_MaNVXuat($ma) {
        $this->MaNVXuat = $ma;
    }

    function get_MaNVXuat() {
        return $this->MaNVXuat;
    }

    function set_MaNVNhan($ma) {
        $this->MaNVNhan = $ma;
    }

    function get_MaNVNhan() {
        return $this->MaNVNhan;
    }

    function set_GhiChu($note) {
        $this->GhiChu = $note;
    }

    function get_GhiChu() {
        return $this->GhiChu;
    }
}

class ChiTietPhieuXuat {
    private $MaPX;
    private $MaNVL;
    private $SoLuong;

    function set_MaPX($ma) {
        $this->MaPX = $ma;
    }

    function get_MaPX() {
        return $this->MaPX;
    }

    function set_MaNVL($ma) {
        $this->MaNVL = $ma;
    }

    function get_MaNVL() {
        return $this->MaNVL;
    }

    function set_SoLuong($sl) {
        $this->SoLuong = $sl;
    }

    function get_SoLuong() {
        return $this->SoLuong;
    }
}
?>