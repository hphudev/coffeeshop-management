<?php
    class ChiTietHoaDon{
        private $MaCTHD;
        private $MaHD;
        private $MaMon;
        private $SoLuong;
        private $TenDonVi;
        private $DonGia;
        private $ThanhTien;

        public function __construct($row)
        {
            $this->MaCTHD = $row['MaCTHD'];
            $this->MaHD = $row['MaHD'];
            $this->MaMon = $row['MaMon'];
            $this->SoLuong = $row['SoLuong'];
            $this->TenDonVi = $row['TenDonVi'];
            $this->DonGia = $row['DonGia'];
            $this->ThanhTien = $row['ThanhTien'];
        }

        function set_MaCTHD($macthd)
        {
            $this->MaCTHD = $macthd;
        }

        function get_MaCTHD()
        {
            return $this->MaCTHD;
        }
        function set_MaHD($mahd)
        {
            $this->MaHD = $mahd;
        }

        function get_MaHD()
        {
            return $this->MaHD;
        }
        function set_MaMon($mamon)
        {
            $this->MaMon = $mamon;
        }

        function get_MaMon()
        {
            return $this->MaMon;
        }
        function set_SoLuong($soluong)
        {
            $this->SoLuong = $soluong;
        }

        function get_SoLuong()
        {
            return $this->SoLuong;
        }
        function set_TenDonVi($tendonvi)
        {
            $this->TenDonVi = $tendonvi;
        }

        function get_TenDonVi()
        {
            return $this->TenDonVi;
        }
        function set_DonGia($dongia)
        {
            $this->DonGia = $dongia;
        }

        function get_DonGia()
        {
            return $this->DonGia;
        }
        function set_ThanhTien($thanhtien)
        {
            $this->ThanhTien = $thanhtien;
        }

        function get_ThanhTien()
        {
            return $this->ThanhTien;
        }
    }
?>