<?php

class KhachHang
{
    private $MaKH;
    private $LoaiTV;
    private $HoTen;
    private $SDT;
    private $GioiTinh;
    private $DiemTV;
    private $TongChi;
    private $NgayDK;

    function __construct()
    {
        $this->MaKH =
            $this->HoTen =
            $this->SDT =
            $this->GioiTinh = "";

        $this->DiemTV =
            $this->TongChi =  0;


        $this->NgayDK = 0;

        $this->LoaiTV = new LoaiTV();
    }
    function clone($row)
    {
        $this->MaKH = $row['MaKH'];
        $this->HoTen = $row['HoTen'];
        $this->GioiTinh = $row['GioiTinh'];
        $this->SDT = $row['SDT'];
        $this->DiemTV = $row['DiemTV'];
        $this->TongChi = $row['TongChi'];
        $this->NgayDK = strtotime($row['NgayDangKy']);

        $ModelKhachHang = new Model_KhachHang();
        $this->LoaiTV = $ModelKhachHang->get_LoaiTV($row['MaLoaiTV']);
    }
    function set_MaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    function get_MaKH()
    {
        return $this->MaKH;
    }
    function set_LoaiTV($LoaiTV)
    {
        $this->LoaiTV = $LoaiTV;
    }
    function get_LoaiTV()
    {
        return $this->LoaiTV;
    }
    function set_HoTen($HoTen)
    {
        $this->HoTen = $HoTen;
    }
    function get_HoTen()
    {
        return $this->HoTen;
    }
    function set_GioiTinh($GioiTinh)
    {
        $this->GioiTinh = $GioiTinh;
    }
    function get_GioiTinh()
    {
        return $this->GioiTinh;
    }
    function set_SDT($SDT)
    {
        $this->SDT = $SDT;
    }
    function get_SDT()
    {
        return $this->SDT;
    }
    function set_NgayDK($NgayDK)
    {
        $this->NgayDK = $NgayDK;
    }
    function get_NgayDK()
    {
        return $this->NgayDK;
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

    function __construct()
    {
        $this->MaLoaiTV =
            $this->TenLoaiTV = "";
        $this->DiemLenHang =
            $this->TyLeTichDiem =
            $this->HangTV = 0;
    }

    function clone($row)
    {
        $this->MaLoaiTV = $row['MaLoaiTV'];
        $this->TenLoaiTV = $row['TenLoaiTV'];
        $this->DiemLenHang = $row['DiemLenHang'];
        $this->TyLeTichDiem = $row['TiLeTichLuy'];
        $this->HangTV = $row['HangThanhVien'];
    }

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
