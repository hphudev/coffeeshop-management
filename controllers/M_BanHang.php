<?php
    include 'E_Mon.php';
    include 'E_ChiTietMon.php';
    include "E_Topping.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    class Model_Sale
    {   
        public static function getItemListFromServer()
        {
            include '../configs/config.php';
            $sql = 'SELECT * FROM mon';
            $result = $conn->query($sql);
            $itemList = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $item = new Mon($row);
                    array_push($itemList, $item);
                }
            }
            return $itemList;
        }

        public static function getItemName($idItem)
        {
            include '../configs/config.php';
            $sql = "SELECT * FROM mon WHERE MaMon = '" . $idItem . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['TenMon'];
            }
            return null;
        }

        public static function getDeltailItemFromServer($idItem)
        {
            include '../configs/config.php';
            $sql = "SELECT * FROM ct_mon where MaMon = '" . $idItem . "'";
            $result = $conn->query($sql);
            $detailItemList = [];
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $detailItem = new ChiTietMon($row);
                    array_push($detailItemList,$detailItem);
                }
            }
            return $detailItemList;
        }

        public static function getToppingListFromServer($idItem)
        {
            include '../configs/config.php';
            $sql = "SELECT * FROM topping_lienket where MaMon = '" . $idItem ."'";
            $result = $conn->query($sql);
            $toppingList = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
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
    }

    if (isset($_POST['func']))
    {
        $data = json_decode($_POST['func']);
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($data->name == "session_unset")
                session_unset();
            if ($data->name == "showItemOptionsTable")
            {
                Model_Sale::showItemOptionsTable($data->id);
            }    
            if ($data->name == "getItemName")
            {
                $name = Model_Sale::getItemName($data->id);
                echo json_encode($name);
            }
        }
    }    
?> 