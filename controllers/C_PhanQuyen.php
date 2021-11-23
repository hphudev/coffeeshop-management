<?php
include '../models/M_PhanQuyen.php';
class C_PhanQuyen
{
    public function invoke()
    {
        session_start();
        $ModelPhanQuyen =  new Model_PhanQuyen();
        if (isset($_GET['check'])) {
            $TenQuyen = $_GET['quyen'];
            if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], $TenQuyen)) {
                echo "true";
            } else {
                echo "false";
            }
        }

        if (isset($_POST['phanquyen'])) {
            if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], $_POST['phanquyen'])) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }
}

$C_PhanQuyen = new C_PhanQuyen();
$C_PhanQuyen->invoke();
