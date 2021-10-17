<?php
class BaoCao {
    private $MaBC;
    private $NgayBaoCao;
    private $NgayBatDau;
    private $NgayKetThuc;
    private $TongSoLuong;
    private $TongThu;

    function set_MaBC($ma) {
        $this->$MaBC = $ma;
    }

    function get_MaBC() {
        return $this->$MaBC;
    }

    function set_NgayBaoCao($ngay) {
        $this->$NgayBaoCao = $ngay;
    }

    function get_NgayBaoCao() {
        return $this->$NgayBaoCao;
    }

    function set_NgayBatDau($ngay) {
        $this->$NgayBatDau = $ngay;
    }

    function get_NgayBatDau() {
        return $this->$NgayBatDau;
    }

    function set_NgayKetThuc($ngay) {
        $this->$NgayKetThuc = $ngay;
    }

    function get_NgayKetThuc() {
        return $this->$NgayKetThuc;
    }

    function set_TongSoLuong($tong) {
        $this->$TongSoLuong = $tong;
    }

    function get_TongSoLuong() {
        return $this->$TongSoLuong;
    }

    function set_TongThu($tong) {
        $this->$TongThu = $tong;
    }

    function get_TongThu() {
        return $this->$TongThu;
    }
}

class ChiTietBaoCao {
    private $MaBC;
    private $MaMon;
    private $DonGia;
    private $TongSoLuong;
    private $ThanhTien;

    function set_MaBC($ma) {
        $this->$MaBC = $ma;
    }

    function get_MaBC() {
        return $this->$MaBC;
    }

    function set_MaMon($ma) {
        $this->$MaMon = $ma;
    }

    function get_MaMon() {
        return $this->$MaMon;
    }

    function set_DonGia($gia) {
        $this->$DonGia = $gia;
    }

    function get_DonGia() {
        return $this->$DonGia;
    }

    function set_TongSoLuong($tong) {
        $this->$TongSoLuong = $tong;
    }

    function get_TongSoLuong() {
        return $this->$TongSoLuong;
    }

    function set_ThanhTien($tong) {
        $this->$ThanhTien = $tong;
    }

    function get_ThanhTien() {
        return $this->$ThanhTien;
    }
}
?>