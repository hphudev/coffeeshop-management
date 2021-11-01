<?php
class ChucVu
{
    private $MaCV;
    private $TenCV;
    private $MucTroCap;

    function __construct()
    {
        $this->MaCV;
        $this->TenCV;
        $this->MucTroCap;
    }

    public function clone($row)
    {
        $this->MaCV = $row['MaCV'];
        $this->TenCV = $row['TenCV'];
        $this->MucTroCap = $row['TroCap'];
    }

    function set_MaCV($MaCV)
    {
        $this->MaCV = $MaCV;
    }
    function get_MaCV()
    {
        return $this->MaCV;
    }
    function set_TenCV($TenCV)
    {
        $this->TenCV = $TenCV;
    }
    function get_TenCV()
    {
        return $this->TenCV;
    }
    function set_MucTroCap($MucTroCap)
    {
        $this->MucTroCap = $MucTroCap;
    }
    function get_MucTroCap()
    {
        return $this->MucTroCap;
    }
}
