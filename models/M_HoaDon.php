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
}
