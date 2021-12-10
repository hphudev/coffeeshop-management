<?php
class KhuyenMai
{
    private $MaKM;
    private $Code;
    private $TenKM;
    private $ThoiGianBD;
    private $ThoiGianKT;
    private $SoLuong;
    private $SoLuongConLai;
    private $PhanTramKM;
    private $TienKMToiDa;
    private $TienHDToiThieu;

    function __construct()
    {
        $this->MaKM =
            $this->Code =
            $this->TenKM = "";

        $this->SoLuong =
            $this->SoLuongConLai =
            $this->PhanTramKM =
            $this->TienKMToiDa =
            $this->TienHDToiThieu = 0;

        $this->ThoiGianBD =
            $this->ThoiGianKT = 0;
    }

    function clone($row)
    {
        $this->MaKM = $row['MaKM'];
        $this->Code = $row['Code'];
        $this->TenKM = $row['TenKM'];
        $this->ThoiGianBD = strtotime($row['ThoiGianBatDau']);
        $this->ThoiGianKT = strtotime($row['ThoiGianKetThuc']);
        $this->SoLuong = $row['SoLuongPhatHanh'];
        $this->SoLuongConLai = $row['SoLuongConLai'];
        $this->PhanTramKM = $row['PhanTramKM'];
        $this->TienKMToiDa = $row['TienKMToiDa'];
        $this->TienHDToiThieu = $row['TienHDToiThieu'];
    }

    function set_MaKM($MaKM)
    {
        $this->MaKM = $MaKM;
    }

    function get_MaKM()
    {
        return $this->MaKM;
    }

    function set_Code($Code)
    {
        $this->Code = $Code;
    }

    function get_Code()
    {
        return $this->Code;
    }

    function set_TenKM($ten)
    {
        $this->TenKM = $ten;
    }

    function get_TenKM()
    {
        return $this->TenKM;
    }

    function set_ThoiGianBD($time)
    {
        $this->ThoiGianBD = $time;
    }

    function get_ThoiGianBD()
    {
        return $this->ThoiGianBD;
    }

    function set_ThoiGianKT($time)
    {
        $this->ThoiGianKT = $time;
    }

    function get_ThoiGianKT()
    {
        return $this->ThoiGianKT;
    }

    function set_SoLuong($sl)
    {
        $this->SoLuong = $sl;
    }

    function get_SoLuong()
    {
        return $this->SoLuong;
    }

    function set_SoLuongConLai($sl)
    {
        $this->SoLuongConLai = $sl;
    }

    function get_SoLuongConLai()
    {
        return $this->SoLuongConLai;
    }

    function set_PhanTramKM($per)
    {
        $this->PhanTramKM = $per;
    }

    function get_PhanTramKM()
    {
        return $this->PhanTramKM;
    }

    function set_TienKMToiDa($amount)
    {
        $this->TienKMToiDa = $amount;
    }

    function get_TienKMToiDa()
    {
        return $this->TienKMToiDa;
    }

    function set_TienHDToiThieu($sl)
    {
        $this->TienHDToiThieu = $sl;
    }

    function get_TienHDToiThieu()
    {
        return $this->TienHDToiThieu;
    }
}

class ChiTietKhuyenMai_PhanTram
{
    private $MaKM;
    private $MaCTKM;
    private $PhanTramKM;
    private $TienKMToiDa;
    private $TienKMToiThieu;
    private $TienHDToiThieu;

    function set_MaKM($ma)
    {
        $this->MaKM = $ma;
    }

    function get_MaKM()
    {
        return $this->MaKM;
    }

    function set_MaCTKM($ten)
    {
        $this->MaCTKM = $ten;
    }

    function get_MaCTKM()
    {
        return $this->MaCTKM;
    }

    function set_PhanTramKM($per)
    {
        $this->PhanTramKM = $per;
    }

    function get_PhanTramKM()
    {
        return $this->PhanTramKM;
    }

    function set_TienKMToiDa($amount)
    {
        $this->TienKMToiDa = $amount;
    }

    function get_TienKMToiDa()
    {
        return $this->TienKMToiDa;
    }

    function set_TienKMToiThieu($sl)
    {
        $this->TienKMToiThieu = $sl;
    }

    function get_TienKMToiThieu()
    {
        return $this->TienKMToiThieu;
    }

    function set_TienHDToiThieu($sl)
    {
        $this->TienHDToiThieu = $sl;
    }

    function get_TienHDToiThieu()
    {
        return $this->TienHDToiThieu;
    }
}

class ChiTietKhuyenMai_Mon
{
    private $MaKM;
    private $MaMon;
    private $SoLuong;
    private $TienHDToiThieu;

    function set_MaKM($ma)
    {
        $this->MaKM = $ma;
    }

    function get_MaKM()
    {
        return $this->MaKM;
    }

    function set_MaMon($ten)
    {
        $this->MaMon = $ten;
    }

    function get_MaMon()
    {
        return $this->MaMon;
    }

    function set_TienHDToiThieu($sl)
    {
        $this->TienHDToiThieu = $sl;
    }

    function get_TienHDToiThieu()
    {
        return $this->TienHDToiThieu;
    }

    function set_SoLuong($sl)
    {
        $this->SoLuong = $sl;
    }

    function get_SoLuong()
    {
        return $this->SoLuong;
    }
}
