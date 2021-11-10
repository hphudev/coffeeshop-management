<?php
    class Topping_DM{
        private $MaTDM;
        private $MaCTDM;
        private $TenTopping;
        public function __construct($row)
        {
            $this->MaTDM = $row['MaTDM'];
            $this->MaTDM = $row['MaCTDM'];
            $this->TenTopping = $row['TenTopping'];
        }

        function set_MaTDM($matdm)
        {
            $this->MaTDM = $matdm;
        }

        function get_MaDM()
        {
            return $this->MaTDM;
        }
        function set_MaCTDM($mactdm)
        {
            $this->MaCTDM = $mactdm;
        }

        function get_MaCTDM()
        {
            return $this->MaCTDM;
        }
        function set_TenTopping($tentopping)
        {
            $this->TenTopping = $tentopping;
        }

        function get_TenTopping()
        {
            return $this->TenTopping;
        }
    }
?>