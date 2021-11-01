<?php
class ChiTietMon {
    private $MaMon;
    private $TenKichThuoc;
    private $DonGia;
    public function __construct($row)
    {
        $this->MaMon = $row['MaMon'];
        $this->TenKichThuoc = $row['TenKichThuoc'];
        $this->DonGia = $row['DonGia'];
    }

    function set_MaMon($ma) {
        $this->MaMon = $ma;
    }

    function get_MaMon() {
        return $this->MaMon;
    }

    function set_TenKichThuoc($TenKichThuoc) {
        $this->TenKichThuoc = $TenKichThuoc;
    }

    function get_TenKichThuoc() {
        return $this->TenKichThuoc;
    }

    function set_DonGia($DonGia) {
        $this->DonGia = $DonGia;
    }

    function get_DonGia() {
        return $this->DonGia;
    }
}
?>