<?php
class TinhTrang {
    private $MaTinhTrang;
    private $TenTinhTrang;

    function set_MaTinhTrang($ma) {
        $this->$MaTinhTrang = $ma;
    }

    function get_MaTinhTrang() {
        return $this->$MaTinhTrang;
    }

    function set_TenTinhTrang($ten) {
        $this->$TenTinhTrang = $ten;
    }

    function get_TenTinhTrang() {
        return $this->$TenTinhTrang;
    }
}
?>