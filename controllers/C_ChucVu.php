<?php
include_once '../models/M_ChucVu.php';
include_once '../models/M_General_CMD.php';

class C_ChucVu
{
    public function invoke()
    {
        $ModelChucVu = new Model_ChucVu();
        $ModelPhanQuyen =  new Model_PhanQuyen();
        $ModelGeneral = new General_CMD();

        if (isset($_GET['add'])) {
            $ChucVu = new ChucVu();
            $ChucVu->set_MaCV($ModelGeneral->AutoGetID('chucvu', 'cv'));
            $ChucVu->set_TenCV($_GET['TenCV']);
            $ChucVu->set_MucTroCap($_GET['TroCap']);
            $result = $ModelChucVu->add_ChucVu($ChucVu);

            if ($result == 1) {
                echo 'success';
            } else {
                echo 'error';
            }
        }

        if (isset($_GET['phanquyen'])) {
            $PhanQuyenList = $ModelPhanQuyen->get_PhanQuyenByMaCV($_GET['phanquyen']);

            if ($PhanQuyenList != null) {
                foreach ($PhanQuyenList as $PhanQuyen) {
                    echo $PhanQuyen->get_TenQuyen() . '</br>';
                }
            } else {
                echo '';
            }
        }

        if (isset($_GET['update'])) {
            $ChucVu = new ChucVu();
            $ChucVu->set_MaCV($_GET['update']);
            $ChucVu->set_TenCV($_GET['TenCV']);
            $ChucVu->set_MucTroCap($_GET['TroCap']);
            $result = $ModelChucVu->update_ChucVu($ChucVu);

            if ($result == 1) {
                echo 'success';
            } else {
                echo 'error';
            }
        }

        if (isset($_GET['delete'])) {
            $result = $ModelChucVu->delete_ChucVu($_GET['delete']);

            if ($result == 1) {
                echo 'success';
            } else {
                echo 'error';
            }
        }

        if (isset($_GET['check'])) {
            $ChucVu = $ModelChucVu->get_ChucVuByName($_GET['check']);

            if ($ChucVu != null) {
                echo 'exist';
            } else echo 'success';
        }

        if (isset($_GET['updatePQ'])) {
            $hasError = false;
            $ChucVuID = $_GET['id'];
            $QuyenList = explode("-", $_GET['updatePQ']);

            if ($ModelPhanQuyen->reset_PQ($ChucVuID) == true) {
                foreach ($QuyenList as $Quyen) {

                    $PhanQuyen = new PhanQuyen();
                    $PhanQuyen->set_MaCV($ChucVuID);
                    $PhanQuyen->set_TenQuyen($Quyen);

                    if ($PhanQuyen->get_TenQuyen() != "")
                        if ($ModelPhanQuyen->update_PQ($PhanQuyen) == false) {
                            $hasError = true;
                        }
                }
                if ($hasError) {
                    echo 'error';
                } else {
                    echo 'success';
                }
            } else {
                echo 'error';
            }
        }
    }
}

$C_ChucVu = new C_ChucVu();
$C_ChucVu->invoke();
