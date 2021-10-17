<?php
class Mon {
    private $MaMon;
    private $MaLoaiMon;
    private $MaTinhTrang;
    private $MaNVL;
    private $MaDVT;
    private $TenMon;
    private $HinhAnh;
    private $DonGia;
    private $NgayThem;
    private $MaKTM;
    private $MoTa;
    private $GhiChu;
    private $NgayChinhSuaLanCuoi;


    function set_MaMon($ma) {
        $this->MaMon = $ma;
    }

    function get_MaMon() {
        return $this->MaMon;
    }

    function set_MaLoaiMon($ma) {
        $this->MaLoaiMon = $ma;
    }

    function get_MaLoaiMon() {
        return $this->MaLoaiMon;
    }

    function set_MaTinhTrang($ma) {
        $this->MaTinhTrang = $ma;
    }

    function get_MaTinhTrang() {
        return $this->MaTinhTrang;
    }

    function set_MaNVL($ma) {
        $this->MaNVL = $ma;
    }

    function get_MaNVL() {
        return $this->MaNVL;
    }

    function set_MaDVT($ma) {
        $this->MaDVT = $ma;
    }

    function get_MaDVT() {
        return $this->MaDVT;
    }

    function set_TenMon($ten) {
        $this->TenMon = $ten;
    }

    function get_TenMon() {
        return $this->TenMon;
    }

    function set_HinhAnh($anh) {
        $this->HinhAnh = $anh;
    }

    function get_HinhAnh() {
        return $this->HinhAnh;
    }

    function set_DonGia($gia) {
        $this->DonGia = $gia;
    }

    function get_DonGia() {
        return $this->DonGia;
    }

    function set_NgayThem($ngay) {
        $this->NgayThem = $ngay;
    }

    function get_NgayThem() {
        return $this->NgayThem;
    }

    function set_NgayChinhSuaLanCuoi($ngay) {
        $this->NgayChinhSuaLanCuoi = $ngay;
    }

    function get_NgayChinhSuaLanCuoi() {
        return $this->NgayChinhSuaLanCuoi;
    }

    function set_MaKTM($ma) {
        $this->MaKTM = $ma;
    }

    function get_MaKTM() {
        return $this->MaKTM;
    }

    function set_MoTa($mt) {
        $this->MoTa = $mt;
    }

    function get_MoTa() {
        return $this->MoTa;
    }

    function set_GhiChu($note) {
        $this->GhiChu = $note;
    }

    function get_GhiChu() {
        return $this->GhiChu;
    }
}
?>