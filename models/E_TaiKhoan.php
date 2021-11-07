<?php
class TaiKhoan
{
    private $MaNV;
    private $MaTK;
    private $MatKhau;

    function __construct()
    {
        $this->MaNV =
            $this->MaTK =
            $this->MatKhau = null;
    }

    function clone($row)
    {
        $this->MaNV = $row['MaNV'];
        $this->MaTK = $row['MaTaiKhoan'];
        $this->MatKhau = $row['MatKhau'];
    }

    function set_MaNV($MaNV)
    {
        $this->MaNV = $MaNV;
    }
    function get_MaNV()
    {
        return $this->MaNV;
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
