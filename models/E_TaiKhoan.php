<?php
class TaiKhoan
{
    private $MaTK;
    private $MatKhau;

    function __construct()
    {
        $this->MaTK =
            $this->MatKhau = null;
    }

    function clone($row)
    {
        $this->MaTK = $row['MaTK'];
        $this->MatKhau = $row['MatKhau'];
    }

    function set_MaTK($MaTK)
    {
        $this->MaTK = $MaTK;
    }
    function get_MaTK()
    {
        return $this->MaTK;
    }
    function set_MatKhau($MatKhau)
    {
        $this->MatKhau = $MatKhau;
    }
    function get_MatKhau()
    {
        return $this->MatKhau;
    }
}
