<?php
include 'E_ChiTietHoaDon.php';
class HoaDon
{
    private $MaNV;
    private $MaKH;
    private $MaNVLap;
    private $NgayLap;
    private $NgayThanhToan;
    private $TongTienTT;
    private $TongTienKH;
    private $TienKhuyenMai;
    private $TienTraLai;
    private $GhiChu;
    private $ChiTietHoaDon;

    function __construct()
    {
        $this->MaNV =
            $this->MaKH =
            $this->MaNVLap =
            $this->NgayLap =
            $this->NgayThanhToan =
            $this->GhiChu = "";

        $this->TongTienTT =
            $this->TongTienKH =
            $this->TienKhuyenMai =
            $this->TienTraLai = 0;

        $this->ChiTietHoaDon = array();
    }

    function clone($row)
    {
        $this->MaNV = $row['MaNV'];
        $this->MaKH = $row['MaKH'];
        $this->MaNVLap = $row['MaNVLap'];
        $this->NgayLap = $row['NgayLap'];
        $this->NgayThanhToan = $row['NgayThanhToan'];
        $this->TongTienTT = $row['TongTienTT'];
        $this->TongTienKH = $row['TongTienKH'];
        $this->TienKhuyenMai = $row['TienKhuyenMai'];
        $this->TienTraLai = $row['TienTraLai'];
        $this->GhiChu = $row['GhiChu'];
        $this->ChiTietHoaDon = $row['ChiTietHoaDon'];
    }

    function get_MaNV()
    {
        return $this->MaNV;
    }
    function set_MaNV($MaNV)
    {
        $this->MaNV = $MaNV;
    }
    function get_MaKH()
    {
        return $this->MaKH;
    }
    function set_MaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    function get_MaNVLap()
    {
        return $this->MaNVLap;
    }
    function set_MaNVLap($MaNVLap)
    {
        $this->MaNVLap = $MaNVLap;
    }
    function get_NgayLap()
    {
        return $this->NgayLap;
    }
    function set_NgayLap($NgayLap)
    {
        $this->NgayLap = $NgayLap;
    }
    function get_NgayThanhToan()
    {
        return $this->NgayThanhToan;
    }
    function set_NgayThanhToan($NgayThanhToan)
    {
        $this->NgayThanhToan = $NgayThanhToan;
    }
    function get_TongTienTT()
    {
        return $this->TongTienTT;
    }
    function set_TongTienTT($TongTienTT)
    {
        $this->TongTienTT = $TongTienTT;
    }
    function set_TongTienKH($TongTienKH)
    {
        $this->TongTienKH = $TongTienKH;
    }
    function get_TongTienKH()
    {
        return $this->TongTienKH;
    }
    function set_TienKhuyenMai($TienKhuyenMai)
    {
        $this->TienKhuyenMai = $TienKhuyenMai;
    }
    function get_TienKhuyenMai()
    {
        return $this->TienKhuyenMai;
    }
    function set_TienTraLai($TienTraLai)
    {
        $this->TienTraLai = $TienTraLai;
    }
    function get_TienTraLai()
    {
        return $this->TienTraLai;
    }
    function set_GhiChu($GhiChu)
    {
        $this->GhiChu = $GhiChu;
    }
    function get_GhiChu()
    {
        return $this->GhiChu;
    }
    function set_ChiTietHoaDon($ChiTietHoaDon)
    {
        $this->ChiTietHoaDon = $ChiTietHoaDon;
    }
    function get_ChiTietHoaDon()
    {
        return $this->ChiTietHoaDon;
    }
}
