<?php
include_once 'E_Mon.php';
include_once 'E_ChiTietMon.php';
include_once "E_Topping.php";

class Model_Sale
{
    public static function getItemListFromServer()
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT * FROM mon WHERE TinhTrang = 'true'";
        $result = $conn->query($sql);
        $itemList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = new Mon($row);
                array_push($itemList, $item);
            }
        }
        return $itemList;
    }

    public static function getItemName($idItem)
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT * FROM mon WHERE MaMon = '" . $idItem . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['TenMon'];
        }
        return null;
    }

    public static function getDeltailItemFromServer($idItem)
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT * FROM ct_mon where MaMon = '" . $idItem . "'";
        $result = $conn->query($sql);
        $detailItemList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $detailItem = new ChiTietMon($row);
                array_push($detailItemList, $detailItem);
            }
        }
        return $detailItemList;
    }

    public static function getToppingListFromServer($idItem)
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT * FROM topping_lienket where MaMon = '" . $idItem . "'";
        $result = $conn->query($sql);
        $toppingList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $topping = new Topping($row);
                array_push($toppingList, $topping);
            }
        }
        return $toppingList;
    }

    public static function showItemOptionsTable($idItem)
    {
        include_once("M_General_CMD.php");
        $value = array();
        $detailItemArray = Model_Sale::getDeltailItemFromServer($idItem);
        $detailItemArray = General_CMD::convertToAssociateArray_DetailItemListObject($detailItemArray);
        $value[] = $detailItemArray;
        $toppingArray = Model_Sale::getToppingListFromServer($idItem);
        $toppingArray = General_CMD::convertToAssociateArray_ToppingListObject($toppingArray);
        $value[] = $toppingArray;
        echo json_encode($value);
    }

    public static function insertOrder($data)
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT max(soban) as maxNum from datmon";
        $result = $conn->query($sql);
        $soBan = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soBan = $row['maxNum'] + 1;
                // echo json_encode($row);
            }
        }
        $totalOrder = 0;
        for ($i = 0; $i < count($data); $i++) {
            $totalOrder += intval($data[$i]->price) * intval($data[$i]->num);
        }
        $sql = "INSERT INTO datmon value(" . "'DM" . strval($soBan) . "', " . $soBan . ", " . $totalOrder . ", 'da gui')";
        $result = $conn->query($sql);
        if ($result == true) {
            $tmp = "DM" . strval($soBan);
            return $tmp;
        } else {
            return null;
        }
        // return $result;
    }

    public static function insertToppingOrder($data, $mactdm)
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT * FROM topping_dm";
        $result = $conn->query($sql);
        $numTDM = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $matdm = $row['MaTDM'];
                $tmp = explode("TDM", $matdm);
                // return json_encode($tmp);
                $numTDM = max($numTDM, $tmp[1]);
            }
        }
        for ($i = 0; $i < count($data); $i++) {
            $numTDM++;
            $sql = "INSERT INTO topping_dm value(" . "'TDM" . strval($numTDM) . "', '" . $mactdm . "', '" .  strval($data[$i]) . "')";
            $result = $conn->query($sql);
            sleep(0.3);
        }

        return $result;
    }

    public static function insertDetailOrder($data, $madm)
    {
        if (!@include("../configs/config.php")) {
            include_once("../configs/config.php");
        }
        $sql = "SELECT * FROM ct_datmon";
        $result = $conn->query($sql);
        $numCTDM = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mactdm = $row['MaCTDM'];
                $tmp = explode("CTDM", $mactdm);
                $numCTDM = max($numCTDM, $tmp[1]);
            }
        }
        for ($i = 0; $i < count($data); $i++) {
            $numCTDM++;
            $sql = "INSERT INTO ct_datmon value(" . "'CTDM" . strval($numCTDM) . "', '" . $madm . "', '" . $data[$i]->id . "', '" . $data[$i]->size . "', " . $data[$i]->num . ", " . $data[$i]->price . ")";
            $result = $conn->query($sql);
            Model_Sale::insertToppingOrder($data[$i]->toppingList, "CTDM" . strval($numCTDM));
            sleep(0.5);
        }

        return $result;
    }


    public static function saveOrder($data)
    {
        // echo json_encode(Model_Sale::insertDetailOrder($data, "asd"));
        $madm = Model_Sale::insertOrder($data);
        // echo json_encode($madm);
        if (isset($madm)) {
            Model_Sale::insertDetailOrder($data, $madm);
            echo $madm;
        } else
            echo false;
    }

    public static function deleteOrder($MaDM)
    {
        if (!@include("../configs/config.php"))
            include_once("../configs/config.php");
        $sql = "DELETE FROM datmon WHERE MaDM = '" . $MaDM . "'";
        $result = $conn->query($sql);
        return $result;
    }

    public static function deleteDetailOrder($MaDM)
    {
        if (!@include("../configs/config.php"))
            include_once("../configs/config.php");
        $sql = "DELETE FROM ct_datmon WHERE MaDM = '" . $MaDM . "'";
        $result = $conn->query($sql);
        return $result;
    }

    public static function deleteTopping($MaCTDM)
    {
        if (!@include("../configs/config.php"))
            include_once("../configs/config.php");
        $sql = "DELETE FROM topping_dm WHERE MaCTDM = '" . $MaCTDM . "'";
        $result = $conn->query($sql);
        return $result;
    }

    public static function deleteOrderFail()
    {
        if (!@include("../configs/config.php"))
            include_once("../configs/config.php");
        $sql = "SELECT * FROM datmon WHERE TinhTrang = 'da gui'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                Model_Sale::deleteOrder($row['MaDM']);
                Model_Sale::deleteDetailOrder($row['MaDM']);
                Model_Sale::deleteTopping($row['MaDM']);
            }
        }
        // $result = $conn->query($sql);
        return $result;
    }

    public static function finishOrder($MaDM)
    {
        if (!@include("../configs/config.php"))
            include_once("../configs/config.php");
        $sql = "UPDATE FROM topping_dm WHERE MaCTDM = '" . $MaDM . "'";
        $result = $conn->query($sql);
        return $result;
    }
}
