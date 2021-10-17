<?php
class PhieuXuat {
    private $MaPX;
    private $NgayLap;
    private $MaNhanVienXuat;
    private $GhiChu;
    private $MaNhanVienNhan;

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

    function set_MaNhanVienXuat($ma) {
        $this->MaNhanVienXuat = $ma;
    }

    function get_MaNhanVienXuat() {
        return $this->MaNhanVienXuat;
    }

    function set_MaNhanVienNhan($ma) {
        $this->MaNhanVienNhan = $ma;
    }

    function get_MaNhanVienNhan() {
        return $this->MaNhanVienNhan;
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
    private $MaNguyenVatLieu;
    private $SoLuong;

    function set_MaPX($ma) {
        $this->MaPX = $ma;
    }

    function get_MaPX() {
        return $this->MaPX;
    }

    function set_MaNguyenVatLieu($ma) {
        $this->MaNguyenVatLieu = $ma;
    }

    function get_MaNguyenVatLieu() {
        return $this->MaNguyenVatLieu;
    }

    function set_SoLuong($sl) {
        $this->SoLuong = $sl;
    }

    function get_SoLuong() {
        return $this->SoLuong;
    }
}
?>