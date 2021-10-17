<?php
class LoaiMon {
    private $MaLoaiMon;
    private $TenLoaiMon;

    function set_MaLoaiMon($ma) {
        $this->MaLoaiMon = $ma;
    }

    function get_MaLoaiMon() {
        return $this->MaLoaiMon;
    }

    function set_TenLoaiMon($ten) {
        $this->TenLoaiMon = $ten;
    }

    function get_TenLoaiMon() {
        return $this->TenLoaiMon;
    }
}
?>