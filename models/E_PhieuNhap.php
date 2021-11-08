<?php
class PhieuNhap
{
    private $MaPN;
    private $MaNVNhap;
    private $MaNCC;
    private $NgayLap;
    private $TongTien;
    private $TenNguoiGiao;
    private $TienThanhToan;
    private $TienNo;
    private $GhiChu;

    public function __construct($row)
    {
        $this->MaPN = $row['MaPN'];
        $this->MaNVNhap = $row['MaNVNhap'];
        $this->MaNCC = $row['MaNCC'];
        $this->NgayLap = $row['NgayLap'];
        $this->TongTien = $row['TongTien'];
        $this->TenNguoiGiao = $row['TenNguoiGiao'];
        $this->TienThanhToan = $row['TienThanhToan'];
        $this->TienNo = $row['TienNo'];
        $this->GhiChu = $row['GhiChu'];
    }

    function set_MaPN($MaPN)
    {
        $this->MaPN = $MaPN;
    }
    function get_MaPN()
    {
        return $this->MaPN;
    }
    function set_MaNVNhap($MaNVNhap)
    {
        $this->MaNVNhap = $MaNVNhap;
    }
    function get_MaNVNhap()
    {
        return $this->MaNVNhap;
    }
    function set_MaNCC($MaNCC)
    {
        $this->MaNCC = $MaNCC;
    }
    function get_MaNCC()
    {
        return $this->MaNCC;
    }
    function set_NgayLap($NgayLap)
    {
        $this->NgayLap = $NgayLap;
    }
    function get_NgayLap()
    {
        return $this->NgayLap;
    }
    function set_TongTien($TongTien)
    {
        $this->TongTien = $TongTien;
    }
    function get_TongTien()
    {
        return $this->TongTien;
    }
    function set_TenNguoiGiao($TenNguoiGiao)
    {
        $this->TenNguoiGiao = $TenNguoiGiao;
    }
    function get_TenNguoiGiao()
    {
        return $this->TenNguoiGiao;
    }
    function set_TienThanhToan($TienThanhToan)
    {
        $this->TienThanhToan = $TienThanhToan;
    }
    function get_TienThanhToan()
    {
        return $this->TienThanhToan;
    }
    function set_TienNo($TienNo)
    {
        $this->TienNo = $TienNo;
    }
    function get_TienNo()
    {
        return $this->TienNo;
    }
    function set_GhiChu($GhiChu)
    {
        $this->GhiChu = $GhiChu;
    }
    function get_GhiChu()
    {
        return $this->GhiChu;
    }
}

class CT_PhieuNhap
{
    private $MaPN;
    private $MaNVL;
    private $DonGiaNhap;
    private $SoLuong;

    public function __construct($row)
    {
        $this->MaPN = $row['MaPN'];
        $this->MaNVL = $row['MaNVL'];
        $this->DonGiaNhap = $row['DonGia'];
        $this->SoLuong = $row['SoLuong'];
    }

    function set_MaPN($MaPN)
    {
        $this->MaPN = $MaPN;
    }
    function get_MaPN()
    {
        return $this->MaPN;
    }
    function set_MaNVL($MaNVL)
    {
        $this->MaNVL = $MaNVL;
    }
    function get_MaNVL()
    {
        return $this->MaNVL;
    }
    function set_DonGiaNhap($DonGiaNhap)
    {
        $this->DonGiaNhap = $DonGiaNhap;
    }
    function get_DonGiaNhap()
    {
        return $this->DonGiaNhap;
    }
    function set_SoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }
    function get_SoLuong()
    {
        return $this->SoLuong;
    }
}
