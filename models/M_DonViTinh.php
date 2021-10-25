<?php
include 'DonViTinh.php';

class Model_DonViTinh
{
    public function __construct()
    {
    }

    public function get_AllDonViTinh()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM donvitinh';
        $result = $conn->query($sql);
        $DonViTinhList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $DonViTinh = new DonViTinh($row);
                array_push($DonViTinhList, $DonViTinh);
            }
            return $DonViTinhList;
        }
    }

    public function get_DonViTinhDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM donvitinh WHERE MaDVT="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $DonViTinh = new DonViTinh($row);
                $conn->close();
                return $DonViTinh;
            }
        }
    }
}
