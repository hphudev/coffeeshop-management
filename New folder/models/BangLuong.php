<?php
class BangLuong
{
    private $MaBangLuong;
    private $TenBangLuong;
    private $NgayLap;
    private $TongChi;

    function set_MaBangLuong($MaBangLuong)
    {
        $this->MaBangLuong = $MaBangLuong;
    }
    function get_MaBangLuong()
    {
        return $this->MaBangLuong;
    }
    function set_TenBangLuong($TenBangLuong)
    {
        $this->TenBangLuong = $TenBangLuong;
    }
    function get_TenBangLuong()
    {
        return $this->TenBangLuong;
    }
    function set_NgayLap($NgayLap)
    {
        $this->NgayLap = $NgayLap;
    }
    function get_NgayLap()
    {
        return $this->NgayLap;
    }
    function set_TongChi($TongChi)
    {
        $this->TongChi = $TongChi;
    }
    function get_TongChi()
    {
        return $this->TongChi;
    }
}

class CT_BangLuong
{
    private $MaBangLuong;
    private $MaNV;
    private $TroCap;
    private $TienThuong;
    private $TienPhat;
    private $ThucNhan;

    function set_MaBangLuong($MaBangLuong)
    {
        $this->MaBangLuong = $MaBangLuong;
    }
    function get_MaBangLuong()
    {
        return $this->MaBangLuong;
    }
    function set_MaNV($MaNV)
    {
        $this->MaNV = $MaNV;
    }
    function get_MaNV()
    {
        return $this->MaNV;
    }
    function set_TroCap($TroCap)
    {
        $this->TroCap = $TroCap;
    }
    function get_TroCap()
    {
        return $this->TroCap;
    }
    function set_TienThuong($TienThuong)
    {
        $this->TienThuong = $TienThuong;
    }
    function get_TienThuong()
    {
        return $this->TienThuong;
    }
    function set_TienPhat($TienPhat)
    {
        $this->TienPhat = $TienPhat;
    }
    function get_TienPhat()
    {
        return $this->TienPhat;
    }
    function set_ThucNhan($ThucNhan)
    {
        $this->ThucNhan = $ThucNhan;
    }
    function get_ThucNhan()
    {
        return $this->ThucNhan;
    }
}
