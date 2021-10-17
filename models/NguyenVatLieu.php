<?php
class NguyenVatLieu {
    private $MaNVL;
    private $MaLoaiNVL;
    private $TenNVL;
    private $SoLuongTon;
    private $MaDVT;
    private $DonGiaNhap;
    private $MaNhaCungCap;
    private $MaTinhTrang;

    function set_MaNVL($ma) {
        $this->MaNVL = $ma;
    }

    function get_MaNVL() {
        return $this->MaNVL;
    }

    function set_MaLoaiNVL($ma) {
        $this->MaLoaiNVL = $ma;
    }

    function get_MaLoaiNVL() {
        return $this->MaLoaiNVL;
    }

    function set_TenNVL($ten) {
        $this->TenNVL = $ten;
    }

    function get_TenNVL() {
        return $this->TenNVL;
    }

    function set_SoLuongTon($sl) {
        $this->SoLuongTon = $sl;
    }

    function get_SoLuongTon() {
        return $this->SoLuongTon;
    }

    function set_MaDVT($ma) {
        $this->MaDVT = $ma;
    }

    function get_MaDVT() {
        return $this->MaDVT;
    }

    function set_DonGiaNhap($gia) {
        $this->DonGiaNhap = $gia;
    }

    function get_DonGiaNhap() {
        return $this->DonGiaNhap;
    }

    function set_MaNhaCungCap($ma) {
        $this->MaNhaCungCap = $ma;
    }

    function get_MaNhaCungCap() {
        return $this->MaNhaCungCap;
    }

    function set_MaTinhTrang($ma) {
        $this->MaTinhTrang = $ma;
    }

    function get_MaTinhTrang() {
        return $this->MaTinhTrang;
    }
}
?>