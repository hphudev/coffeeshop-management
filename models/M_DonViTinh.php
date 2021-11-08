<?php
include 'E_DonViTinh.php';

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

    public function add_DonViTinh($dvt)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO donvitinh(MaDVT, TenDVT)
                VALUES ('" . $dvt->get_MaDVT() . "', '" . $dvt->get_TenDVT() . "')";
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

    public function update_DonViTinh($dvt)
    {
        include '../configs/config.php';
        $sql = "UPDATE donvitinh
                SET TenDVT='" . $dvt->get_TenDVT() . "' WHERE MaDVT='" . $dvt->get_MaDVT() . "'";
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

    public function generate_MaDonViTinh()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("donvitinh", "dvt");
    }
}