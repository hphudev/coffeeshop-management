<?php
if (!@include("../models/E_Mon.php"))
    include_once '../models/E_Mon.php';

class Model_Mon
{
    public function __construct()
    {
    }

    public function getAllItem()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM mon ORDER BY TinhTrang DESC';
        $result = $conn->query($sql);
        $itemList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = new Mon($row);
                array_push($itemList, $item);
            }
            return $itemList;
        }
        return $ItemList;
    }

    public function get_NameById($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT TenMon FROM mon WHERE MaMon="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['TenMon'];
            }
        }
    }

    public function addMon($mon, $sizeArr, $priceArr, $toppingArr)
    {
        include '../configs/config.php';
        include 'M_ChiTietMon.php';
        include 'M_Topping.php';

        $ModelCTMon = new Model_ChiTietMon();
        $ModelTopping = new Model_Topping();

        $sql = "INSERT INTO
                        mon (MaMon, TenMon, MaLoaiMon, SoLuong, MaDVT, HinhAnh, MoTa, GhiChu, SoLanDung, NgayThem, NgayChinhSuaLanCuoi, TinhTrang)
                VALUES
                    ('" . $mon->get_MaMon() . "', '" . $mon->get_TenMon() . "', '" . $mon->get_MaLoaiMon() . "', " .
            $mon->get_SoLuong() . ", '" . $mon->get_MaDVT() . "', '" . $mon->get_HinhAnh() . "', '" .
            $mon->get_MoTa() . "', '" . $mon->get_GhiChu() . "', 0, '" . $mon->get_NgayThem() . "', '" .
            $mon->get_NgayChinhSuaLanCuoi() . "', 'true')";
        $result = $conn->query($sql);
        if ($result) {
            if ($ModelCTMon->addChiTietMon($mon->get_MaMon(), $sizeArr, $priceArr) == 1) {
                if (!$toppingArr || count($toppingArr) < 1) {
                    return 1;
                }
                if ($ModelTopping->addTopping($mon->get_MaMon(), $toppingArr) == 1) {
                    return 1;
                }
                return 0;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function addQuantityMon($maMon, $quantity)
    {
        include '../configs/config.php';

        $sql = "UPDATE
                        mon
                    SET
                        SoLuong=" . $quantity . " WHERE MaMon='" . $maMon . "'";
        $result = $conn->query($sql);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateMon($mon, $sizeArr, $priceArr, $toppingArr)
    {
        include '../configs/config.php';
        include 'M_ChiTietMon.php';
        include 'M_Topping.php';

        $ModelCTMon = new Model_ChiTietMon();
        $ModelTopping = new Model_Topping();

        if ($mon->get_HinhAnh() != '') {
            $sql = "UPDATE
                        mon
                    SET
                        TenMon='" . $mon->get_TenMon() . "', MaLoaiMon='" . $mon->get_MaLoaiMon() .
                "', MaDVT='" . $mon->get_MaDVT() . "', HinhAnh='" . $mon->get_HinhAnh() . "', MoTa='" .
                $mon->get_MoTa() . "', GhiChu='" . $mon->get_GhiChu() . "', NgayChinhSuaLanCuoi='" .
                $mon->get_NgayChinhSuaLanCuoi() . "', TinhTrang='" . $mon->get_TinhTrang() . "' WHERE MaMon='" . $mon->get_MaMon() . "'";
        } else {
            $sql = "UPDATE
                        mon
                    SET
                        TenMon='" . $mon->get_TenMon() . "', MaLoaiMon='" . $mon->get_MaLoaiMon() .
                "', MaDVT='" . $mon->get_MaDVT() . "', MoTa='" .
                $mon->get_MoTa() . "', GhiChu='" . $mon->get_GhiChu() . "', NgayChinhSuaLanCuoi='" .
                $mon->get_NgayChinhSuaLanCuoi() . "', TinhTrang='" . $mon->get_TinhTrang() . "' WHERE MaMon='" . $mon->get_MaMon() . "'";
        }

        $result = $conn->query($sql);
        if ($result) {
            if (count($sizeArr) == 0) {
                if ($ModelCTMon->deleteChiTietMon($mon->get_MaMon()) == 1) {
                    if (count($toppingArr) == 0) {
                        if ($ModelTopping->deleteTopping($mon->get_MaMon()) == 1) {
                            return 1;
                        }
                    } else {
                        if ($ModelTopping->deleteTopping($mon->get_MaMon()) == 1) {
                            if ($ModelTopping->addTopping($mon->get_MaMon(), $toppingArr) == 1) {
                                return 1;
                            }
                        }
                    }
                }
            } else {
                if ($ModelCTMon->deleteChiTietMon($mon->get_MaMon()) == 1) {
                    if ($ModelCTMon->addChiTietMon($mon->get_MaMon(), $sizeArr, $priceArr) == 1) {
                        if (count($toppingArr) == 0) {
                            if ($ModelTopping->deleteTopping($mon->get_MaMon()) == 1) {
                                return 1;
                            }
                        } else {
                            if ($ModelTopping->deleteTopping($mon->get_MaMon()) == 1) {
                                if ($ModelTopping->addTopping($mon->get_MaMon(), $toppingArr) == 1) {
                                    return 1;
                                }
                            }
                        }
                    }
                }
            }
            return 0;
        } else {
            return 0;
        }
    }

    public function generate_MaMon()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->getIDNum("mon", "MON", "MaMon");
    }

    public function update_SellAmount($MaMon, $SL)
    {
        $amount = 0;
        $amount_left = 0;
        include '../configs/config.php';
        $sql = 'SELECT SoLanDung, SoLuong FROM mon WHERE MaMon="' . $MaMon . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $amount = intval($row['SoLanDung']);
                $amount_left = intval($row['SoLuong']);
            }
        } else {
            $amount = 0;
        }
        $amount += $SL;
        $amount_left -= $SL;
        $sql = 'UPDATE `mon` SET ' .
            'SoLanDung="' . $amount . '", ' .
            'SoLuong="' . $amount_left . '" ' .
            'WHERE MaMon="' . $MaMon . '"';
        $result = $conn->query($sql);
    }
}
