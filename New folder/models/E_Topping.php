<?php
class Topping {
    private $MaMon;
    private $TenTopping;

    public function __construct($row)
    {
        $this->MaMon = $row['MaMon'];
        $this->TenTopping = $row['TenTopping'];
    }
    
    function set_MaMon($ma) {
        $this->MaMon = $ma;
    }

    function get_MaMon() {
        return $this->MaMon;
    }

    function set_TenTopping($TenTopping) {
        $this->TenTopping = $TenTopping;
    }

    function get_TenTopping() {
        return $this->TenTopping;
    }
}
?>