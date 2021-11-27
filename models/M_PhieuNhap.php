<?php
include 'E_PhieuNhap.php';

class Model_PhieuNhap
{
    public function __construct()
    {
    }

    public function get_AllPhieuNhap()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM phieunhap';
        $result = $conn->query($sql);
        $PhieuNhapList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $PhieuNhap = new PhieuNhap($row);
                array_push($PhieuNhapList, $PhieuNhap);
            }
            return $PhieuNhapList;
        }
    }

    public function get_PhieuNhapDetails($id)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM phieunhap WHERE MaPN='" . $id . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $PhieuNhap = new PhieuNhap($row);
            return $PhieuNhap;
        }
    }

    public function add_PhieuNhap($pn)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO phieunhap (MaPN, MaNVNhap, MaNCC, NgayLap, TongTien, TenNguoiGiao, TienThanhToan, TienNo, GhiChu)
                VALUES ('" . $pn->get_MaPN() . "', '" . $pn->get_MaNVNhap() . "', '" . $pn->get_MaNCC() . "', '" .
                $pn->get_NgayLap() . "', " . $pn->get_TongTien() . ", '" . $pn->get_TenNguoiGiao() . "', " . 
                $pn->get_TienThanhToan() . ", " . $pn->get_TienNo() . ", '" . $pn->get_GhiChu() ."')";
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

    public function update_PhieuNhap($pn)
    {
        include '../configs/config.php';
        $sql = "UPDATE phieunhap
                SET MaNVNhap='" . $pn->get_MaNVNhap() . "', MaNCC='" . $pn->get_MaNCC() .
                "', TenNguoiGiao='" . $pn->get_TenNguoiGiao() . "', " .
                "TienThanhToan=" . $pn->get_TienThanhToan() . ",  TienNo=" . $pn->get_TienNo() . ", GhiChu='" .
                $pn->get_GhiChu() . "'" . " WHERE MaPN='" . $pn->get_MaPN() . "'";
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

    public function generate_MaPhieuNhap()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->getIDNum("phieunhap", "PN", "MaPN");
    }
}

class Model_CT_PhieuNhap
{
    public function __construct()
    {
    }

    public function get_AllCT_PhieuNhap()
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

    public function get_CT_PhieuNhapDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM ct_phieunhap WHERE MaPN="' . $id . '"';
        $result = $conn->query($sql);
        $CTPhieuNhapArr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CTPhieuNhap = new CT_PhieuNhap($row);
                array_push($CTPhieuNhapArr, $CTPhieuNhap);
            }
            
            return $CTPhieuNhapArr;
        }
    }

    public function add_CT_PhieuNhap($pn)
    {
        include '../configs/config.php';
        $material_total_price = $pn->get_SoLuong() * $pn->get_DonGiaNhap();
        $sql = "INSERT INTO ct_phieunhap (MaPN, MaNVL, SoLuong, DonGia)
                VALUES ('" . $pn->get_MaPN() . "', '" . $pn->get_MaNVL() . "', " . $pn->get_SoLuong() . ", " .
                $pn->get_DonGiaNhap() .")";
        $result = $conn->query($sql);
        if ($result)
        {
            $sqlUpdatePN = "UPDATE phieunhap
                            SET TongTien=(SELECT TongTien
                                        FROM phieunhap
                                        WHERE MaPN='" . $pn->get_MaPN() . "') + " . $material_total_price . 
                            " WHERE MaPN='" . $pn->get_MaPN() . "'";
            $sqlUpdateNVL = "UPDATE nguyenvatlieu
                            SET SoLuongTon=(SELECT SoLuongTon
                                            FROM nguyenvatlieu
                                            WHERE MaNVL='" . $pn->get_MaNVL() . "') + " . $pn->get_SoLuong() .
                            " WHERE MaNVL='" . $pn->get_MaNVL() . "'";
            $sqlupdateDonGiaNVL = "UPDATE
                                        `nguyenvatlieu` nvl
                                    SET
                                        `DonGiaNhap` =" . $pn->get_DonGiaNhap() . " " . 
                                    "WHERE
                                        MaNVL = '" . $pn->get_MaNVL() . "' AND NOT EXISTS(
                                        SELECT
                                            *
                                        FROM
                                            `phieunhap` pn
                                        WHERE
                                            NgayLap > (SELECT NgayLap FROM `phieunhap` WHERE MaPN='" . $pn->get_MaPN() . "')
                                            AND EXISTS(
                                                        SELECT
                                                            *
                                                        FROM
                                                            `ct_phieunhap` ct
                                                        WHERE
                                                            ct.MaPN = pn.MaPN AND ct.MaNVL=nvl.MaNVL
                                                    )
                                    )";
            $updatePN = $conn->query($sqlUpdatePN);
            $updateNVL = $conn->query($sqlUpdateNVL);
            $updateDonGia = $conn->query($sqlupdateDonGiaNVL);
            if ($updatePN && $updateNVL && $updateDonGia)
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

    public function update_CT_PhieuNhap($pn)
    {
        include '../configs/config.php';
        $old_material_total_price = 0;
        $old_quantity = 0;
        //get old receipt total amount
        $sqlOldCTPN = "SELECT * 
                    FROM ct_phieunhap
                    WHERE MaPN='" . $pn->get_MaPN() . "' AND MaNVL='" . $pn->get_MaNVL() . "'";
        $result = $conn->query($sqlOldCTPN);
        if ($result->num_rows > 0)
        {
            $data = mysqli_fetch_assoc($result);
            $oldCTPN = new CT_PhieuNhap($data);
            $old_material_total_price = $oldCTPN->get_SoLuong() * $oldCTPN->get_DonGiaNhap();
            $old_quantity = $oldCTPN->get_SoLuong();
        }

        //update CTPN
        $material_total_price = $pn->get_SoLuong() * $pn->get_DonGiaNhap();
        $sql = "UPDATE ct_phieunhap
                SET SoLuong=" . $pn->get_SoLuong() . ", DonGia=" . $pn->get_DonGiaNhap() .
                " WHERE MaPN='" . $pn->get_MaPN() . "' AND MaNVL='" . $pn->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            //update PN
            $sql2 = "UPDATE phieunhap
                    SET TongTien=(SELECT TongTien
                                  FROM phieunhap
                                  WHERE MaPN='" . $pn->get_MaPN() . "') + " . $material_total_price . " - " . $old_material_total_price .
                    " WHERE MaPN='" . $pn->get_MaPN() . "'";
            //update NVL
            $sqlUpdateNVL = "UPDATE nguyenvatlieu
                            SET SoLuongTon=(SELECT SoLuongTon
                                            FROM nguyenvatlieu
                                            WHERE MaNVL='" . $pn->get_MaNVL() . "') + " . $pn->get_SoLuong() . " - " . $old_quantity .
                            " WHERE MaNVL='" . $pn->get_MaNVL() . "'";

            $sqlupdateDonGiaNVL = "UPDATE
                                        `nguyenvatlieu` nvl
                                    SET
                                        `DonGiaNhap` =" . $pn->get_DonGiaNhap() . " " . 
                                    "WHERE
                                        MaNVL = '" . $pn->get_MaNVL() . "' AND NOT EXISTS(
                                        SELECT
                                            *
                                        FROM
                                            `phieunhap` pn
                                        WHERE
                                            NgayLap > (SELECT NgayLap FROM `phieunhap` WHERE MaPN='" . $pn->get_MaPN() . "')
                                            AND EXISTS(
                                                        SELECT
                                                            *
                                                        FROM
                                                            `ct_phieunhap` ct
                                                        WHERE
                                                            ct.MaPN = pn.MaPN AND ct.MaNVL=nvl.MaNVL
                                                    )
                                    )";
            $updatePN = $conn->query($sql2);
            $updateNVL = $conn->query($sqlUpdateNVL);
            $updateDonGia = $conn->query($sqlupdateDonGiaNVL);
            if ($updatePN && $updateNVL && $updateDonGia)
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