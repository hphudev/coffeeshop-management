<?php
class KhuyenMai {
    private $MaKM;
    private $TenKM;
    private $ThoiGianBD;
    private $ThoiGianKT;
    private $SoLuong;

    function set_MaKM($ma) {
        $this->MaKM = $ma;
    }

    function get_MaKM() {
        return $this->MaKM;
    }

    function set_TenKM($ten) {
        $this->TenKM = $ten;
    }

    function get_TenKM() {
        return $this->TenKM;
    }

    function set_ThoiGianBD($time) {
        $this->ThoiGianBD = $time;
    }

    function get_ThoiGianBD() {
        return $this->ThoiGianBD;
    }

    function set_ThoiGianKT($time) {
        $this->ThoiGianKT = $time;
    }

    function get_ThoiGianKT() {
        return $this->ThoiGianKT;
    }

    function set_SoLuong($sl) {
        $this->SoLuong = $sl;
    }

    function get_SoLuong() {
        return $this->SoLuong;
    }
}

class ChiTietKhuyenMai_PhanTram {
    private $MaKM;
    private $MaCTKM;
    private $PhanTramKM;
    private $TienKMToiDa;
    private $TienKMToiThieu;
    private $TienHDToiThieu;    

    function set_MaKM($ma) {
        $this->MaKM = $ma;
    }

    function get_MaKM() {
        return $this->MaKM;
    }

    function set_MaCTKM($ten) {
        $this->MaCTKM = $ten;
    }

    function get_MaCTKM() {
        return $this->MaCTKM;
    }

    function set_PhanTramKM($per) {
        $this->PhanTramKM = $per;
    }

    function get_PhanTramKM() {
        return $this->PhanTramKM;
    }

    function set_TienKMToiDa($amount) {
        $this->TienKMToiDa = $amount;
    }

    function get_TienKMToiDa() {
        return $this->TienKMToiDa;
    }

    function set_TienKMToiThieu($sl) {
        $this->TienKMToiThieu = $sl;
    }

    function get_TienKMToiThieu() {
        return $this->TienKMToiThieu;
    }

    function set_TienHDToiThieu($sl) {
        $this->TienHDToiThieu = $sl;
    }

    function get_TienHDToiThieu() {
        return $this->TienHDToiThieu;
    }
}

class ChiTietKhuyenMai_Mon {
    private $MaKM;
    private $MaMon;
    private $SoLuong;
    private $TienHDToiThieu;    

    function set_MaKM($ma) {
        $this->MaKM = $ma;
    }

    function get_MaKM() {
        return $this->MaKM;
    }

    function set_MaMon($ten) {
        $this->MaMon = $ten;
    }

    function get_MaMon() {
        return $this->MaMon;
    }

    function set_TienHDToiThieu($sl) {
        $this->TienHDToiThieu = $sl;
    }

    function get_TienHDToiThieu() {
        return $this->TienHDToiThieu;
    }

    function set_SoLuong($sl) {
        $this->SoLuong = $sl;
    }

    function get_SoLuong() {
        return $this->SoLuong;
    }
}
?>