<?php
class Mon {
    private $MaMon;
    private $MaLoaiMon;
    private $SoLuong;
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
    private $TinhTrang;
    private $SoLanDung;

    public function __construct($row){
        $this->set_MaMon($row['MaMon']);
        $this->set_TenMon($row['TenMon']);
        $this->set_MaLoaiMon($row['MaLoaiMon']);
        $this->set_SoLuong($row['SoLuong']);
        $this->set_MaDVT($row['MaDVT']);
        $this->set_HinhAnh($row['HinhAnh']);
        $this->set_MoTa($row['MoTa']);
        $this->set_GhiChu($row['GhiChu']);
        $this->set_NgayThem($row['NgayThem']);
        $this->set_NgayChinhSuaLanCuoi($row['NgayChinhSuaLanCuoi']);
        $this->set_TinhTrang($row['TinhTrang']);
        $this->set_SoLanDung($row['SoLanDung']);
    }

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

    function set_SoLuong($soluong) {
        $this->SoLuong = $soluong;
    }

    function get_SoLuong() {
        return $this->SoLuong;
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

    function set_TinhTrang($TinhTrang)
    {
        $this->TinhTrang = $TinhTrang;
    }

    function get_TinhTrang()
    {
        return $this->TinhTrang;
    }

    function set_SoLanDung($SoLanDung)
    {
        $this->SoLanDung = $SoLanDung;
    }

    function get_SoLanDung()
    {
        return $this->SoLanDung;
    }
}
?>