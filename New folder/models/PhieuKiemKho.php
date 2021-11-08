<?php
class PhieuKiemKho
{
    private $MaPK;
    private $MaNVKiem;
    private $MaNVDK;
    private $GhiChu;
    private $ThoiGian;

    function set_MaPK($MaPK)
    {
        $this->MaPK = $MaPK;
    }
    function get_MaPK()
    {
        return $this->MaPK;
    }
    function set_MaNVKiem($MaNVKiem)
    {
        $this->MaNVKiem = $MaNVKiem;
    }
    function get_MaNVKiem()
    {
        return $this->MaNVKiem;
    }
    function set_MaNVDK($MaNVDK)
    {
        $this->MaNVDK = $MaNVDK;
    }
    function get_MaNVDK()
    {
        return $this->MaNVDK;
    }
    function set_GhiChu($GhiChu)
    {
        $this->GhiChu = $GhiChu;
    }
    function get_GhiChu()
    {
        return $this->GhiChu;
    }
    function set_ThoiGian($ThoiGian)
    {
        $this->ThoiGian = $ThoiGian;
    }
    function get_ThoiGian()
    {
        return $this->ThoiGian;
    }
}

class CT_PhieuKiem
{
    private $MaPK;
    private $MaNVL;
    private $GhiChu;
    private $MaTT;
    private $SLBaoCao;
    private $SLThucTe;

    function set_MaPK($MaPK)
    {
        $this->MaPK = $MaPK;
    }
    function get_MaPK()
    {
        return $this->MaPK;
    }
    function set_MaNVL($MaNVL)
    {
        $this->MaNVL = $MaNVL;
    }
    function get_MaNVL()
    {
        return $this->MaNVL;
    }
    function set_GhiChu($GhiChu)
    {
        $this->GhiChu = $GhiChu;
    }
    function get_GhiChu()
    {
        return $this->GhiChu;
    }
    function set_MaTT($MaTT)
    {
        $this->MaTT = $MaTT;
    }
    function get_MaTT()
    {
        return $this->MaTT;
    }
    function set_SLBaoCao($SLBaoCao)
    {
        $this->SLBaoCao = $SLBaoCao;
    }
    function get_SLBaoCao()
    {
        return $this->SLBaoCao;
    }
    function set_SLThucTe($SLThucTe)
    {
        $this->SLThucTe = $SLThucTe;
    }
    function get_SLThucTe()
    {
        return $this->SLThucTe;
    }
}
