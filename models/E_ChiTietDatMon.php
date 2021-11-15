<?php
    class ChiTietDatMon{
        private $MaDM;
        private $MaMon;
        private $TenDonVi;
        private $SoLuong;
        private $DonGia;

        public function __construct($row)
        {
            $this->MaDM = $row['MaDM'];
            $this->MaMon = $row['MaMon'];
            $this->TenDonVi = $row['TenDonVi'];
            $this->SoLuong = $row['SoLuong'];
            $this->DonGia = $row['DonGia'];
        }

        function set_MaDM($madm)
        {
            $this->MaDM = $madm;
        }

        function get_MaDM()
        {
            return $this->MaDM;
        }

        function set_MaMon($mamon)
        {
            $this->MaMon = $mamon;
        }

        function get_MaMon()
        {
            return $this->MaMon;
        }
        function set_TenDonVi($tendonvi)
        {
            $this->TenDonVi = $tendonvi;
        }

        function get_TenDonVi()
        {
            return $this->TenDonVi;
        }

        function set_SoLuong($soluong)
        {
            $this->SoLuong = $soluong;
        }

        function get_SoLuong()
        {
            return $this->SoLuong;
        }

        function set_DonGia($dongia)
        {
            $this->DonGia = $dongia;
        }

        function get_DonGia()
        {
            return $this->DonGia;
        }
    }
?>