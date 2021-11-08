<?php
class NhaCungCap
{
    private $MaNCC;
    private $TenNCC;
    private $SDT;

    public function __construct($row)
    {
        $this->MaNCC = $row['MaNCC'];
        $this->TenNCC = $row['TenNCC'];
        $this->SDT = 0;
    }

    function set_MaNCC($MaNCC)
    {
        $this->MaNCC = $MaNCC;
    }
    function get_MaNCC()
    {
        return $this->MaNCC;
    }
    function set_TenNCC($TenNCC)
    {
        $this->TenNCC = $TenNCC;
    }
    function get_TenNCC()
    {
        return $this->TenNCC;
    }
    function set_SDT($SDT)
    {
        $this->SDT = $SDT;
    }
    function get_SDT()
    {
        return $this->SDT;
    }
}
