<?php
    class DatMon{
        private $MaDM;
        private $SoBan;
        private $TongTien;
        private $TinhTrang;

        public function __construct($row)
        {
            $this->MaDM = $row['MaDM'];
            $this->SoBan = $row['SoBan'];
            $this->TongTien = $row['TongTien'];
            $this->TinhTrang = $row['TinhTrang'];
        }

        function set_MaDM($madm)
        {
            $this->MaDM = $madm;
        }

        function get_MaDM()
        {
            return $this->MaDM;
        }

        function set_SoBan($soban)
        {
            $this->SoBan = $soban;
        }

        function get_SoBan()
        {
            return $this->SoBan;
        }
        function set_TongTien($tongtien)
        {
            $this->MaDM = $tongtien;
        }

        function get_TongTien()
        {
            return $this->TongTien;
        }
        function set_TinhTrang($tinhtrang)
        {
            $this->TinhTrang = $tinhtrang;
        }

        function get_TinhTrang()
        {
            return $this->TinhTrang;
        }

        function toJson()
        {
            return array();
        }
    }
?>