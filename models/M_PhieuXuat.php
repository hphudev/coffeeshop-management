<?php
include 'E_PhieuXuatKho.php';

class Model_PhieuXuat
{
    public function __construct()
    {
    }

    public function get_AllPhieuXuat()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM phieuxuat';
        $result = $conn->query($sql);
        $PhieuXuatList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $PhieuXuat = new PhieuXuat($row);
                array_push($PhieuXuatList, $PhieuXuat);
            }
            return $PhieuXuatList;
        }
    }

    public function get_PhieuXuatDetails($id)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM phieuxuat WHERE MaPX='" . $id . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $PhieuXuat = new PhieuXuat($row);
            return $PhieuXuat;
        }
    }

    public function add_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO phieuxuat (MaPX, NgayLap, MaNVXuat, MaNVNhan, GhiChu)
                VALUES ('" . $px->get_MaPX() . "', '" . $px->get_NgayLap() . "', '" . $px->get_MaNVXuat() . "', '" .
                $px->get_MaNVNhan() . "', '" . $px->get_GhiChu() . "')";
        $result = $conn->query($sql);
        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function update_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "UPDATE phieuxuat 
                SET MaNVXuat='" . $px->get_MaNVXuat() . "', MaNVNhan='" . $px->get_MaNVNhan() .
                "', GhiChu='" . $px->get_GhiChu() . "'" . " WHERE MaPX='" . $px->get_MaPX() . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function generate_MaPhieuXuat()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("phieuxuat", "px");
    }
}

class Model_CT_PhieuXuat
{
    public function __construct()
    {
    }

    public function get_AllCT_PhieuXuat()
    {
        // include '../configs/config.php';
        // $sql = 'SELECT * FROM ct_phieunhap';
        // $result = $conn->query($sql);
        // $PhieuNhapList = array();
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $PhieuNhap = new PhieuNhap($row);
        //         array_push($PhieuNhapList, $PhieuNhap);
        //     }
        //     return $PhieuNhapList;
        // }
    }

    public function get_CT_PhieuXuatDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM ct_phieuxuat WHERE MaPX="' . $id . '"';
        $result = $conn->query($sql);
        $CTPhieuXuatArr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CTPhieuXuat = new CT_PhieuXuat($row);
                array_push($CTPhieuXuatArr, $CTPhieuXuat);
            }
            
            return $CTPhieuXuatArr;
        }
    }

    public function add_CT_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO ct_phieuxuat (MaPX, MaNVL, SoLuong)
                VALUES ('" . $px->get_MaPX() . "', '" . $px->get_MaNVL() . "', " . $px->get_SoLuong() . ")";
        $result = $conn->query($sql);
        if ($result)
        {
            $sqlUpdateNVL = "UPDATE nguyenvatlieu
                            SET SoLuongTon=(SELECT SoLuongTon
                                            FROM nguyenvatlieu
                                            WHERE MaNVL='" . $px->get_MaNVL() . "') - " . $px->get_SoLuong() .
                            " WHERE MaNVL='" . $px->get_MaNVL() . "'";
            $updateNVL = $conn->query($sqlUpdateNVL);
            if ($updateNVL)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    public function update_CT_PhieuXuat($px)
    {
        // include '../configs/config.php';
        // $old_material_total_price = 0;
        // $old_quantity = 0;
        // //get old receipt total amount
        // $sqlOldCTPN = "SELECT * 
        //             FROM ct_phieunhap
        //             WHERE MaPN='" . $px->get_MaPN() . "' AND MaNVL='" . $px->get_MaNVL() . "'";
        // $result = $conn->query($sqlOldCTPN);
        // if ($result->num_rows > 0)
        // {
        //     $data = mysqli_fetch_assoc($result);
        //     $oldCTPN = new CT_PhieuNhap($data);
        //     $old_material_total_price = $oldCTPN->get_SoLuong() * $oldCTPN->get_DonGiaNhap();
        //     $old_quantity = $oldCTPN->get_SoLuong();
        // }

        // //update CTPN
        // $material_total_price = $px->get_SoLuong() * $px->get_DonGiaNhap();
        // $sql = "UPDATE ct_phieunhap
        //         SET SoLuong=" . $px->get_SoLuong() . ", DonGia=" . $px->get_DonGiaNhap() .
        //         " WHERE MaPN='" . $px->get_MaPN() . "' AND MaNVL='" . $px->get_MaNVL() . "'";
        // $result = $conn->query($sql);
        // if ($result)
        // {
        //     //update PN
        //     $sql2 = "UPDATE phieunhap
        //             SET TongTien=(SELECT TongTien
        //                           FROM phieunhap
        //                           WHERE MaPN='" . $px->get_MaPN() . "') + " . $material_total_price . " - " . $old_material_total_price .
        //             " WHERE MaPN='" . $px->get_MaPN() . "'";
        //     //update NVL
        //     $sqlUpdateNVL = "UPDATE nguyenvatlieu
        //                     SET SoLuongTon=(SELECT SoLuongTon
        //                                     FROM nguyenvatlieu
        //                                     WHERE MaNVL='" . $px->get_MaNVL() . "') + " . $px->get_SoLuong() . " - " . $old_quantity .
        //                     " WHERE MaNVL='" . $px->get_MaNVL() . "'";
        //     $updatePN = $conn->query($sql2);
        //     $updateNVL = $conn->query($sqlUpdateNVL);
        //     if ($updatePN && $updateNVL)
        //     {
        //         return 1;
        //     }
        //     else
        //     {
        //         return 0;
        //     }
        // }
        // else
        // {
        //     return 0;
        // }
    }

    public function delete_CT_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "DELETE FROM ct_phieuxuat WHERE MaPX='" . $px->get_MaPX() . "' AND MaNVL='" . $px->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            $sqlUpdateNVL = "UPDATE nguyenvatlieu
                            SET SoLuongTon=(SELECT SoLuongTon
                                            FROM nguyenvatlieu
                                            WHERE MaNVL='" . $px->get_MaNVL() . "') + " . $px->get_SoLuong() .
                            " WHERE MaNVL='" . $px->get_MaNVL() . "'";
            $updateNVL = $conn->query($sqlUpdateNVL);
            if ($updateNVL)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }
}
?>