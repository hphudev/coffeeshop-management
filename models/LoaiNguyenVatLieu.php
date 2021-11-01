<?php
class LoaiNguyenVatLieu {
    private $MaLoaiNVL;
    private $TenLoaiNVL;

    public function __construct($row)
    {
        $this->MaLoaiNVL = $row['MaLoaiNVL'];
        $this->TenLoaiNVL = $row['TenLoaiNVL'];
    }

    function set_MaLoaiNVL($ma) {
        $this->MaLoaiNVL = $ma;
    }

    function get_MaLoaiNVL() {
        return $this->MaLoaiNVL;
    }

    function set_TenLoaiNVL($ten) {
        $this->TenLoaiNVL = $ten;
    }

    function get_TenLoaiNVL() {
        return $this->TenLoaiNVL;
    }
}
?>