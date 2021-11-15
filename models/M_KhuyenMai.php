<?php
include 'E_KhuyenMai.php';;


class Model_KhuyenMai
{
    public function __construct()
    {
    }

    public function get_KhuyenMai($id)
    {
        include '../configs/config.php';
        $sql =  'SELECT * FROM khuyenmai WHERE MaKM="' . $id . '"';
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
}
