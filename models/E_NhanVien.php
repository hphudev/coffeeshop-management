<?php
include_once '../models/M_ChucVu.php';
include '../models/M_TaiKhoan.php';
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
    private $ChucVu;
    private $Luong;
    private $TaiKhoan;

    public function __construct()
    {
        $this->MaNV =
            $this->HoTenDem =
            $this->Ten =
            $this->NgaySinh =
            $this->GioiTinh =
            $this->CMND =
            $this->SDT =
            $this->DiaChi =
            $this->NgayVaoLam =
            $this->Luong = null;
        $this->TaiKhoan = new TaiKhoan();
        $this->ChucVu = new ChucVu();
    }

    public function clone($row)
    {
        $this->MaNV = $row['MaNV'];
        $names = explode(' ', $row['HoTen']);
        $this->Ten = array_pop($names);
        $this->HoTenDem =  implode(" ", $names);
        $this->NgaySinh =  strtotime($row['NgaySinh']);
        $this->GioiTinh = $row['GioiTinh'];
        $this->CMND = $row['CMND'];
        $this->SDT = $row['SDT'];
        $this->DiaChi = $row['DiaChi'];
        $this->NgayVaoLam = strtotime($row['NgayVaoLam']);
        $this->Luong = $row['Luong'];

        $Model_ChucVu = new Model_ChucVu();
        $this->ChucVu = $Model_ChucVu->get_ChucVuDetails($row['MaCV']);
        $Model_TaiKhoan = new Model_TaiKhoan();
        $this->TaiKhoan = $Model_TaiKhoan->get_TaiKhoanDetails($row['MaNV']);
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
    function set_ChucVu($ChucVu)
    {
        $this->ChucVu = $ChucVu;
    }
    function get_ChucVu()
    {
        return $this->ChucVu;
    }
    function set_Luong($Luong)
    {
        $this->Luong = $Luong;
    }
    function get_Luong()
    {
        return $this->Luong;
    }
    function set_TaiKhoan($TaiKhoan)
    {
        $this->TaiKhoan = $TaiKhoan;
    }
    function get_TaiKhoan()
    {
        return $this->TaiKhoan;
    }
}
