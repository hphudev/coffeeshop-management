<?php
class PhanQuyen
{
    private $MaCV;
    private $TenQuyen;

    function __construct()
    {
        $this->MaCV =
            $this->TenQuyen = "";
    }

    function clone($row)
    {
        $this->MaCV = $row['MaCV'];
        $this->TenQuyen = $row['TenQuyen'];
    }
    function set_MaCV($MaCV)
    {
        $this->MaCV = $MaCV;
    }
    function get_MaCV()
    {
        return $this->MaCV;
    }
    function set_TenQuyen($TenQuyen)
    {
        $this->TenQuyen = $TenQuyen;
    }
    function get_TenQuyen()
    {
        return $this->TenQuyen;
    }
}
