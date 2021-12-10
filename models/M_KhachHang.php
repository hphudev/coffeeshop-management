<?php
include 'E_KhachHang.php';

class Model_KhachHang
{
    public function __construct()
    {
    }

    public function get_AllKhachHang()
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM khachhang';
        $result = $conn->query($sql);
        $DSKhachHang = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $KhachHang = new KhachHang();
                $KhachHang->clone($row);
                array_push($DSKhachHang, $KhachHang);
            }
            return $DSKhachHang;
        }
        return null;
    }
    public function get_KhachHangDetails($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM khachhang WHERE MaKH="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $KhachHang = new KhachHang();
                $KhachHang->clone($row);
                return $KhachHang;
            }
        }
        return null;
    }
    public function add_KhachHang($KhachHang)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO `khachhang`(`MaKH`, `HoTen`, `SDT`, `GioiTinh`, `MaLoaiTV`, `DiemTV`, `NgayDangKy`, `TongChi`) VALUES 
            ('" . $KhachHang->get_MaKH() . "',
            '" . $KhachHang->get_HoTen() . "',
            '" . $KhachHang->get_SDT() . "',
            '" . $KhachHang->get_GioiTinh() . "',
            '" . $KhachHang->get_LoaiTV()->get_MaLoaiTV() . "',
            '" . $KhachHang->get_DiemTV() . "',
            '" . $KhachHang->get_NgayDK() . "',
            '" . $KhachHang->get_TongChi() . "')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_KhachHang($id)
    {
        include '../configs/config.php';
        $sql = 'DELETE FROM khachhang WHERE MaKH="' . $id . '"';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function update_KhachHang($KhachHang)
    {
        include '../configs/config.php';
        $sql = 'UPDATE khachhang SET '
            . 'HoTen="' . $KhachHang->get_HoTen() . '", '
            . 'SDT="' .  $KhachHang->get_SDT() . '", '
            . 'GioiTinh="' .  $KhachHang->get_GioiTinh() . '", '
            . 'MaLoaiTV="' .  $KhachHang->get_LoaiTV()->get_MaLoaiTV() . '", '
            . 'DiemTV="' .  $KhachHang->get_DiemTV() . '", '
            . 'NgayDangKy="' .  $KhachHang->get_NgayDK() . '",'
            . 'TongChi="' .  $KhachHang->get_TongChi() . '" '
            . 'WHERE MaKH="' . $KhachHang->get_MaKH() . '" ';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function update_KhachHangPoint($KhachHang)
    {
        include '../configs/config.php';
        $sql = 'UPDATE khachhang SET '
            . 'MaLoaiTV="' .  $KhachHang->get_LoaiTV()->get_MaLoaiTV() . '", '
            . 'DiemTV="' .  $KhachHang->get_DiemTV() . '", '
            . 'TongChi="' .  $KhachHang->get_TongChi() . '" '
            . 'WHERE MaKH="' . $KhachHang->get_MaKH() . '" ';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public static function get_AllHangTV()
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM loaithanhvien';
        $result = $conn->query($sql);
        $DSHangTV = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $HangTV = new LoaiTV();
                $HangTV->clone($row);
                array_push($DSHangTV, $HangTV);
            }
            return $DSHangTV;
        }
        return null;
    }
    public function get_LoaiTVByName($name)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM loaithanhvien WHERE TenLoaiTV="' . $name . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $LoaiTV = new LoaiTV();
                $LoaiTV->clone($row);
                return $LoaiTV;
            }
        }
        return null;
    }
    public function get_LoaiTV($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM loaithanhvien WHERE MaLoaiTV="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $LoaiTV = new LoaiTV();
                $LoaiTV->clone($row);
                return $LoaiTV;
            }
        }
        return null;
    }
    public function add_LoaiTV($LoaiTV)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO `loaithanhvien`(`MaLoaiTV`, `TenLoaiTV`, `TiLeTichLuy`, `DiemLenHang`, `HangThanhVien`) VALUES 
            ('" . $LoaiTV->get_MaLoaiTV() . "',
            '" . $LoaiTV->get_TenLoaiTV() . "',
            '" . $LoaiTV->get_TyLeTichDiem() . "',
            '" . $LoaiTV->get_DiemLenHang() . "',
            '" . $LoaiTV->get_HangTV() . "')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function update_LoaiTV($LoaiTV)
    {
        include '../configs/config.php';
        $sql = 'UPDATE loaithanhvien SET '
            . 'TenLoaiTV="' . $LoaiTV->get_TenLoaiTV() . '", '
            . 'TiLeTichLuy="' .  $LoaiTV->get_TyLeTichDiem() . '", '
            . 'DiemLenHang="' .  $LoaiTV->get_DiemLenHang() . '", '
            . 'HangThanhVien="' .  $LoaiTV->get_HangTV() . '"'
            . 'WHERE MaLoaiTV="' . $LoaiTV->get_MaLoaiTV() . '" ';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_LoaiTV($id)
    {
        include '../configs/config.php';
        $sql = 'DELETE FROM loaithanhvien WHERE MaLoaiTV="' . $id . '"';
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function updateHTVPosition()
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM loaithanhvien ORDER BY DiemLenHang DESC';
        $result = $conn->query($sql);
        $DSHangTV = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $HangTV = new LoaiTV();
                $HangTV->clone($row);
                array_push($DSHangTV, $HangTV);
            }
            $i = 1;
            foreach ($DSHangTV as $HangTV) {
                $HangTV->set_HangTV($i);
                $this->update_LoaiTV($HangTV);
                $i++;
            }
            return true;
        }
        return null;
    }
    public function find_KHBySDT($SDT)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM khachhang WHERE SDT="' . $SDT . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $KhachHang = new KhachHang();
                $KhachHang->clone($row);
                return $KhachHang;
            }
        }
        return null;
    }
    public function update_HangThanhVien($KhachHang)
    {
        $rankUp = $KhachHang->get_LoaiTV();
        include '../configs/config.php';
        $sql =  'SELECT * FROM loaithanhvien ORDER BY DiemLenHang ASC';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $HangTV = new LoaiTV();
                $HangTV->clone($row);
                if ($HangTV->get_DiemLenHang() <= $KhachHang->get_TongChi()) {
                    $rankUp = $HangTV->get_MaLoaiTV();
                }
            }
        }
        $KhachHang->get_LoaiTV()->set_MaLoaiTV($rankUp);
        $ModelKhachHang = new Model_KhachHang();
        return $ModelKhachHang->update_KhachHangPoint($KhachHang);
    }
}
