<?php
class KichThuocMon {
    private $MaKTM;
    private $TenBangKT;

    function set_MaKTM($ma) {
        $this->$MaKTM = $ma;
    }

    function get_MaKTM() {
        return $this->$MaKTM;
    }

    function set_TenBangKT($ten) {
        $this->$TenBangKT = $ten;
    }

    function get_TenBangKT() {
        return $this->$TenBangKT;
    }
}

class ChiTietKichThuocMon {
    private $MaKTM;
    private $TenDonVi;

    function set_MaKTM($ma) {
        $this->$MaKTM = $ma;
    }

    function get_MaKTM() {
        return $this->$MaKTM;
    }

    function set_TenDonVi($ten) {
        $this->$TenDonVi = $ten;
    }

    function get_TenDonVi() {
        return $this->$TenDonVi;
    }
}
?>