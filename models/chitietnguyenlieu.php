<?php
class ChiTietNguyenLieu {
    private $MaNVL;
    private $MaMon;
    private $SoLuongNVL;

    function set_MaNVL($ma) {
        $this->MaNVL = $ma;
    }

    function get_MaNVL() {
        return $this->MaNVL;
    }

    function set_MaMon($ma) {
        $this->MaMon = $ma;
    }

    function get_MaMon() {
        return $this->MaMon;
    }

    function set_SoLuongNVL($sl) {
        $this->SoLuongNVL = $sl;
    }

    function get_SoLuongNVL() {
        return $this->SoLuongNVL;
    }
}
?>