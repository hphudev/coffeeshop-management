<?php
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
}

class CT_HoaDon
{
    private $MaHD;
    private $MaMon;
    private $SoLuong;
    private $DonGia;
    private $ThanhTien;

    function set_MaHD($MaHD)
    {
        $this->MaHD = $MaHD;
    }
    function get_MaHD()
    {
        return $this->MaHD;
    }
    function set_MaMon($MaMon)
    {
        $this->MaMon = $MaMon;
    }
    function get_MaMon()
    {
        return $this->MaMon;
    }
    function set_SoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }
    function get_SoLuong()
    {
        return $this->SoLuong;
    }
    function set_DonGia($DonGia)
    {
        $this->DonGia = $DonGia;
    }
    function get_DonGia()
    {
        return $this->DonGia;
    }
    function set_ThanhTien($ThanhTien)
    {
        $this->ThanhTien = $ThanhTien;
    }
    function get_ThanhTien()
    {
        return $this->ThanhTien;
    }
}
