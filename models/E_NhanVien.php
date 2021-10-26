<?php
// include '../models/ChucVu.php';
class NhanVien
{
    private $MaNV;
    private $HoTenDem;
    private $Ten;
    private $NgaySinh;
    private $GioiTinh;
    private $CMND;
    private $SDT;
    private $DiaChi;
    private $NgayVaoLam;
    private $MaCV;
    private $Luong;

    public function __construct($row)
    {
        $this->MaNV = $row['MaNV'];
        $this->HoTenDem = $row['HoTen'];
        $this->Ten = $row['HoTen'];
        $this->NgaySinh = $row['NgaySinh'];
        $this->GioiTinh = $row['GioiTinh'];
        $this->CMND = $row['CMND'];
        $this->DiaChi = $row['DiaChi'];
        $this->NgayVaoLam = $row['NgayVaoLam'];
        $this->MaCV = $row['MaCV'];
        $this->Luong = $row['Luong'];
    }

    function set_MaNV($MaNV)
    {
        $this->MaNV = $MaNV;
    }
    function get_MaNV()
    {
        return $this->MaNV;
    }
    function set_HoTenDem($HoTenDem)
    {
        $this->HoTenDem = $HoTenDem;
    }
    function get_HoTenDem()
    {
        return $this->HoTenDem;
    }
    function set_Ten($Ten)
    {
        $this->Ten = $Ten;
    }
    function get_Ten()
    {
        return $this->Ten;
    }
    function set_NgaySinh($NgaySinh)
    {
        $this->NgaySinh = $NgaySinh;
    }
    function get_NgaySinh()
    {
        return $this->NgaySinh;
    }
    function set_GioiTinh($GioiTinh)
    {
        $this->GioiTinh = $GioiTinh;
    }
    function get_GioiTinh()
    {
        return $this->GioiTinh;
    }
    function set_CMND($CMND)
    {
        $this->CMND = $CMND;
    }
    function get_CMND()
    {
        return $this->CMND;
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
    function set_NgayVaoLam($NgayVaoLam)
    {
        $this->NgayVaoLam = $NgayVaoLam;
    }
    function get_NgayVaoLam()
    {
        return $this->NgayVaoLam;
    }
    function set_MaCV($MaCV)
    {
        $this->MaCV = $MaCV;
    }
    function get_MaCV()
    {
        return $this->MaCV;
    }
    function set_Luong($Luong)
    {
        $this->Luong = $Luong;
    }
    function get_Luong()
    {
        return $this->Luong;
    }
}