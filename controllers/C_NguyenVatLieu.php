<?php
include '../models/M_NguyenVatLieu.php';

class C_NguyenVatLieu
{
    public function invoke()
    {
        if (isset($_GET['expand'])) {
            // $MaNVL = $_GET['expand'];
            // $ModelNguyenVatLieu = new Model_NguyenVatLieu();
            // $NguyenVatLieu = $ModelNguyenVatLieu->get_NguyenVatLieuDetails($MaNVL);

            include_once('../admin/werehouse/expand.php');
        } else {
            $ModelNguyenVatLieu = new Model_NguyenVatLieu();
            $NguyenVatLieuList = $ModelNguyenVatLieu->get_AllNguyenVatLieu();

            include_once('../admin/werehouse.php');
        }
    }
}

$C_NguyenVatLieu = new C_NguyenVatLieu();
$C_NguyenVatLieu->invoke();