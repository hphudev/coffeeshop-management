<?php
include_once '../models/M_PhanQuyen.php';
class ChucVu
{
    private $MaCV;
    private $TenCV;
    private $PhanQuyenList;
    private $MucTroCap;

    function __construct()
    {
        $this->MaCV;
        $this->TenCV;
        $this->MucTroCap;
        $this->PhanQuyenList = array();
    }

    public function clone($row)
    {
        $this->MaCV = $row['MaCV'];
        $this->TenCV = $row['TenCV'];
        $this->MucTroCap = $row['TroCap'];

        $ModelPhanQuyen = new Model_PhanQuyen();
        $this->PhanQuyenList = $ModelPhanQuyen->get_PhanQuyenByMaCV($this->MaCV);
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
    function set_PhanQuyenList($PhanQuyenList)
    {
        $this->PhanQuyenList = $PhanQuyenList;
    }
    function get_PhanQuyenList()
    {
        return $this->PhanQuyenList;
    }
}
