<?php
include 'E_HoaDon.php';
include 'E_DatMon.php';
include 'E_ChiTietDatMon.php';

class Model_HoaDon
{
    public function __construct()
    {
    }

    public function get_DatMon($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM datmon WHERE MaDM="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $DatMon = new DatMon($row);
                $conn->close();
                return $DatMon;
            }
        }
    }
    public function get_DatMonDetails($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM ct_datmon WHERE MaDM="' . $id . '"';
        $result = $conn->query($sql);
        $CTDatMon = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($CTDatMon, new CT_DatMon($row));
            }
            return $CTDatMon;
        }
    }
    public function get_HoaDonByDatMon($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM ct_datmon WHERE MaDM="' . $id . '"';
        $result = $conn->query($sql);
        $CTHoaDon = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CTHD = new ChiTietHoaDon();
                $CTHD->set_MaMon($row['MaMon']);
                $CTHD->set_TenDonVi($row['TenDonVi']);
                $CTHD->set_SoLuong($row['SoLuong']);
                $CTHD->set_DonGia($row['DonGia']);
                $CTHD->set_ThanhTien(
                    $CTHD->get_DonGia() * $CTHD->get_SoLuong()
                );
                array_push($CTHoaDon, $CTHD);
            }
            return $CTHoaDon;
        }
    }

    public function add_HoaDon($HoaDon)
    {
        include '../configs/config.php';
        $sql =  "INSERT INTO `hoadon` (`MaHD`, `MaKH`, `MaNVLap`, `NgayLap`, `NgayThanhToan`, `TongTienThanhToan`, `TienKhachHang`, `TienTraLai`, `TienKhuyenMai`, `GhiChu`) VALUES 
            ('" . $HoaDon->get_MaHD() . "',
            '" . $HoaDon->get_MaKH() . "',
            '" . $HoaDon->get_MaNVLap() . "',
            '" . date('Y-m-d H:i:s', strtotime(date_format($HoaDon->get_NgayLap(), 'Y-m-d H:i:s')))  . "',
            '" . date('Y-m-d H:i:s', strtotime(date_format($HoaDon->get_NgayThanhToan(), 'Y-m-d H:i:s'))) . "',
            '" . $HoaDon->get_TongTienTT() . "',
            '" . $HoaDon->get_TongTienKH() . "',
            '" . $HoaDon->get_TienTraLai() . "',
            '" . $HoaDon->get_TienKhuyenMai() . "',
            '" . $HoaDon->get_GhiChu() . "')";
        if ($conn->query($sql) === TRUE) {
            return Model_HoaDon::add_CTHoaDon($HoaDon->get_ChiTietHoaDon(), $HoaDon->get_MaHD());
        } else {
            return false;
        }
    }

    public static function add_CTHoaDon($CTHoaDon, $MaHD)
    {
        include '../configs/config.php';
        $result = true;
        for ($i = 0; $i < count($CTHoaDon); $i++) {
            $sql =  "INSERT INTO `ct_hoadon`(`MaCTHD`, `MaHD`, `MaMon`, `SoLuong`, `TenDonVi`, `DonGia`, `ThanhTien`) VALUES 
            ('null',
            '" . $MaHD . "',
            '" . $CTHoaDon[$i]->get_MaMon() . "',
            '" . $CTHoaDon[$i]->get_SoLuong() . "',
            '" . $CTHoaDon[$i]->get_TenDonVi() . "',
            '" . $CTHoaDon[$i]->get_DonGia() . "',
            '" . $CTHoaDon[$i]->get_ThanhTien() . "')";
            if ($conn->query($sql) !== TRUE) {
                $result = false;
            }
        }
        return $result;
    }
}
