<?php
class TaiKhoan
{
    private $TenTaiKhoan;
    private $MatKhau;

    function set_TenTaiKhoan($TenTaiKhoan)
    {
        $this->TenTaiKhoan = $TenTaiKhoan;
    }
    function get_TenTaiKhoan()
    {
        return $this->TenTaiKhoan;
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
