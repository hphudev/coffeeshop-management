<?php
class Topping {
    private $MaMon;
    private $MaTopping;

    function set_MaMon($ma) {
        $this->$MaMon = $ma;
    }

    function get_MaMon() {
        return $this->$MaMon;
    }

    function set_MaTopping($ma) {
        $this->$MaTopping = $ma;
    }

    function get_MaTopping() {
        return $this->$MaTopping;
    }
}
?>