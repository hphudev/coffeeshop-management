<?php
class DonViTinh {
    private $MaDVT;
    private $TenDVT;

    public function __construct($row)
    {
        $this->MaDVT = $row['MaDVT'];
        $this->TenDVT = $row['TenDVT'];
    }

    function set_MaDVT($ma) {
        $this->MaDVT = $ma;
    }

    function get_MaDVT() {
        return $this->MaDVT;
    }

    function set_TenDVT($ten) {
        $this->TenDVT = $ten;
    }

    function get_TenDVT() {
        return $this->TenDVT;
    }
}
?>