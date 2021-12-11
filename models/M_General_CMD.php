<?php
class General_CMD
{
    public function __construct()
    {
    }
    public static function countRowInTable($table)
    {
        include('../configs/config.php');
        $sql = 'SELECT count(*) as total FROM ' . strval($table);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //echo '<script> alert("ok"); </script>';
            $data = mysqli_fetch_assoc($result);
            return $data['total'] + 1;
        }
        return 0;
    }

    // public static function AutoGetID($table, $prefix)
    // {
    //     $num = General_CMD::countRowInTable($table);
    //     return (string)$prefix . strval($num);
    // }

    public static function AutoGetID($table, $prefix, $primaryKey)
    {
        $num = General_CMD::countRowInTable($table);
        return (string)$prefix . strval($num);
    }

    public static function getIDNum($table, $prefix, $primaryKey)
    {
        include('../configs/config.php');
        $sql = 'SELECT ' . $primaryKey . ', LENGTH(' . $primaryKey . ') FROM ' . $table .
            ' ORDER BY LENGTH(' . $primaryKey . ') DESC, ' . $primaryKey . " DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = mysqli_fetch_assoc($result);
            return  $prefix . (intval(explode($prefix, $data[$primaryKey])[1]) + 1);
        } else {
            return $prefix . "1";
        }
    }

    public static function convertToAssociateArray_DetailItemObject($data)
    {
        $res = array('MaMon' => $data->get_MaMon(), 'TenKichThuoc' => $data->get_TenKichThuoc(), 'DonGia' => $data->get_DonGia());
        return $res;
    }

    public static function convertToAssociateArray_ToppingObject($data)
    {
        $res = array('MaMon' => $data->get_MaMon(), 'TenTopping' => $data->get_TenTopping());
        return $res;
    }

    public static function convertToAssociateArray_DetailItemListObject($data)
    {
        $res = array();
        for ($i = 0; $i < count($data); $i++) {
            $tmp = General_CMD::convertToAssociateArray_DetailItemObject($data[$i]);
            array_push($res, $tmp);
        }
        return $res;
    }

    public static function convertToAssociateArray_ToppingListObject($data)
    {
        $res = array();
        for ($i = 0; $i < count($data); $i++) {
            $tmp = General_CMD::convertToAssociateArray_ToppingObject($data[$i]);
            array_push($res, $tmp);
        }
        return $res;
    }

    public static function checkRight($maQuyen)
    {
        $modelPQ = new Model_PhanQuyen();
        return $modelPQ->check_PhanQuyen($_SESSION['maCV'], $maQuyen);
    }
}
