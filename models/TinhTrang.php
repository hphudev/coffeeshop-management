<?php
class TinhTrang {
    private $MaTinhTrang;
    private $TenTinhTrang;

    public function __construct($row)
    {
        $this->MaTinhTrang = $row['MaTT'];
        $this->TenTinhTrang = $row['TenTT'];
    }

    function set_MaTinhTrang($ma) {
        $this->MaTinhTrang = $ma;
    }

    function get_MaTinhTrang() {
        return $this->MaTinhTrang;
    }

    function set_TenTinhTrang($ten) {
        $this->TenTinhTrang = $ten;
    }

    function get_TenTinhTrang() {
        return $this->TenTinhTrang;
    }
}
?>