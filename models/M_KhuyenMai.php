<?php
include 'E_KhuyenMai.php';;


class Model_KhuyenMai
{
    public function __construct()
    {
    }
    public function get_AllKhuyenMai()
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM khuyenmai';
        $DSKM = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $KhuyenMai = new KhuyenMai();
                $KhuyenMai->clone($row);
                array_push($DSKM, $KhuyenMai);
            }
            return $DSKM;
        } else
            return null;
    }

    public function get_KhuyenMai($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM khuyenmai WHERE Code="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $KhuyenMai = new KhuyenMai();
                $KhuyenMai->clone($row);
                $conn->close();
                return $KhuyenMai;
            }
        } else
            return null;
    }

    public function update_KhuyenMai($KhuyenMai)
    {
        include '../configs/config.php';
        $sql = "UPDATE `khuyenmai` SET 
            `MaKM`='" . $KhuyenMai->get_MaKM() .  "',
            `Code`='" . $KhuyenMai->get_Code() .  "',
            `TenKM`='" . $KhuyenMai->get_TenKM() .  "',
            `ThoiGianBatDau`='" . date('Y-m-d', $KhuyenMai->get_ThoiGianBD()) .  "',
            `ThoiGianKetThuc`='" . date('Y-m-d', $KhuyenMai->get_ThoiGianKT()) .  "',
            `SoLuongPhatHanh`='" . $KhuyenMai->get_SoLuong() .  "',
            `PhanTramKM`='" . $KhuyenMai->get_PhanTramKM() .  "',
            `TienKMToiDa`='" . $KhuyenMai->get_TienKMToiDa() .  "',
            `TienHDToiThieu`='" . $KhuyenMai->get_TienHDToiThieu() .  "' 
            WHERE MaKM='" . $KhuyenMai->get_MaKM() . "'";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function add_KhuyenMai($KhuyenMai)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO `khuyenmai`(`MaKM`, `Code`, `TenKM`, `ThoiGianBatDau`, `ThoiGianKetThuc`, `SoLuongPhatHanh`, `PhanTramKM`, `TienKMToiDa`, `TienHDToiThieu`) VALUES 
            ('" . $KhuyenMai->get_MaKM() .  "',
            '" . $KhuyenMai->get_Code() .  "',
            '" . $KhuyenMai->get_TenKM() .  "',
            '" . $KhuyenMai->get_ThoiGianBD() .  "',
            '" . $KhuyenMai->get_ThoiGianKT() .  "',
            '" . $KhuyenMai->get_SoLuong() .  "',
            '" . $KhuyenMai->get_PhanTramKM() .  "',
            '" . $KhuyenMai->get_TienKMToiDa() .  "',
            '" . $KhuyenMai->get_TienHDToiThieu() .  "')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_KhuyenMai($id)
    {
        include '../configs/config.php';
        $sql = "DELETE FROM `khuyenmai` WHERE MaKM='" . $id . "'";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
