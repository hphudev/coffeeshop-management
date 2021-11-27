<?php
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

    public function addMon($mon, $sizeArr, $priceArr)
    {
        include '../configs/config.php';
        include 'M_ChiTietMon.php';

        $ModelCTMon = new Model_ChiTietMon();

        $sql = "INSERT INTO
                        mon (MaMon, TenMon, MaLoaiMon, SoLuong, MaDVT, HinhAnh, MoTa, GhiChu, NgayThem, NgayChinhSuaLanCuoi, TinhTrang)
                    VALUES
                        ('" . $mon->get_MaMon() . "', '" . $mon->get_TenMon() . "', '" . $mon->get_MaLoaiMon() . "', " .
            $mon->get_SoLuong() . ", '" . $mon->get_MaDVT() . "', '" . $mon->get_HinhAnh() . "', '" .
            $mon->get_MoTa() . "', '" . $mon->get_GhiChu() . "', '" . $mon->get_NgayThem() . "', '" .
            $mon->get_NgayChinhSuaLanCuoi() . "', 'true')";
        $result = $conn->query($sql);
        if ($result) {
            if ($ModelCTMon->addChiTietMon($mon->get_MaMon(), $sizeArr, $priceArr) == 1) {
                return 1;
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

    public function updateMon($mon, $sizeArr, $priceArr)
    {
        include '../configs/config.php';
        include 'M_ChiTietMon.php';

        $ModelCTMon = new Model_ChiTietMon();

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
                return 1;
            } else {
                if ($ModelCTMon->deleteChiTietMon($mon->get_MaMon()) == 1) {
                    if ($ModelCTMon->addChiTietMon($mon->get_MaMon(), $sizeArr, $priceArr) == 1) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    return 0;
                }
            }
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
}
