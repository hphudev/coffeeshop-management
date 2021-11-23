<?php 
    class CT_BaoCao_SD{
        private $MaBC;
        private $MaMon;
        private $DonGia;
        private $TongSoLuong;
        private $ThanhTien;

        public function __construct($row)
        {
            $MaBC = $row['MaBC'];
            $MaMon = $row['MaMon'];
            $DonGia = $row['DonGia'];
            $TongSoLuong = $row['TongSoLuong'];
            $ThanhTien = $row['ThanhTien'];
        }

        function set_MaBC($MaBC)
        {
            $this->MaBC = $MaBC;
        }

        function get_MaBC()
        {
            return $this->MaBC;
        }

        function set_MaMon($MaMon)
        {
            $this->MaMon = $MaMon;
        }

        function get_MaMon()
        {
            return $this->MaMon;
        }

        function set_MaDonGia($DonGia)
        {
            $this->DonGia = $DonGia;
        }

        function get_DonGia()
        {
            return $this->DonGia;
        }

        function set_TongSoLuong($TongSoLuong)
        {
            $this->TongSoLuong = $TongSoLuong;
        }

        function get_TongSoLuong()
        {
            return $this->TongSoLuong;
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
?>