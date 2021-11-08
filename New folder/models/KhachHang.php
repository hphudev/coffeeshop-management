<?php
class KhachHang
{
    private $MaKH;
    private $MaLoaiTV;
    private $HoTen;
    private $SDT;
    private $DiaChi;
    private $DiemTV;
    private $TongChi;

    function set_MaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    function get_MaKH()
    {
        return $this->MaKH;
    }
    function set_MaLoaiTV($MaLoaiTV)
    {
        $this->MaLoaiTV = $MaLoaiTV;
    }
    function get_MaLoaiTV()
    {
        return $this->MaLoaiTV;
    }
    function set_HoTen($HoTen)
    {
        $this->HoTen = $HoTen;
    }
    function get_HoTen()
    {
        return $this->HoTen;
    }
    function set_SDT($SDT)
    {
        $this->SDT = $SDT;
    }
    function get_SDT()
    {
        return $this->SDT;
    }
    function set_DiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }
    function get_DiaChi()
    {
        return $this->DiaChi;
    }
    function set_DiemTV($DiemTV)
    {
        $this->DiemTV = $DiemTV;
    }
    function get_DiemTV()
    {
        return $this->DiemTV;
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

class LoaiTV
{
    private $MaLoaiTV;
    private $TenLoaiTV;
    private $DiemLenHang;
    private $TyLeTichDiem;
    private $HangTV;

    function set_MaLoaiTV($MaLoaiTV)
    {
        $this->MaLoaiTV = $MaLoaiTV;
    }
    function get_MaLoaiTV()
    {
        return $this->MaLoaiTV;
    }
    function set_TenLoaiTV($TenLoaiTV)
    {
        $this->TenLoaiTV = $TenLoaiTV;
    }
    function get_TenLoaiTV()
    {
        return $this->TenLoaiTV;
    }
    function set_DiemLenHang($DiemLenHang)
    {
        $this->DiemLenHang = $DiemLenHang;
    }
    function get_DiemLenHang()
    {
        return $this->DiemLenHang;
    }
    function set_TyLeTichDiem($TyLeTichDiem)
    {
        $this->TyLeTichDiem = $TyLeTichDiem;
    }
    function get_TyLeTichDiem()
    {
        return $this->TyLeTichDiem;
    }
    function set_HangTV($HangTV)
    {
        $this->HangTV = $HangTV;
    }
    function get_HangTV()
    {
        return $this->HangTV;
    }
}
