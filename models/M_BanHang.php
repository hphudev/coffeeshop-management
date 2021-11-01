<?php
    include 'E_Mon.php';
    include 'E_ChiTietMon.php';
    include "E_Topping.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    class Model_Sale
    {   
        private $itemListModel;
        private $numChoiceItemListModel = array();
        
        public function __construct()
        {
            $this->itemListModel = Model_Sale::getItemListFromServer();
            $this->numChoiceItemListModel = array();
            print_r($_SESSION);
            for ($i = 0; $i < count($this->itemListModel); $i++)
            {
                $id = $this->itemListModel[$i]->get_MaMon();
                if (!isset($_SESSION[$id]))
                {
                    $_SESSION[$id] = 0;
                    print_r($_SESSION[$id]);
                    echo '<br/>';
                }
                $this->numChoiceItemListModel[$id] = $_SESSION[$id];
            }
            print_r($_SESSION);

        }

        function getNumChoiceItemList()
        {
            return $this->numChoiceItemListModel;
        }

        function getNumChoiceItem($idItem)
        {
            return  $this->numChoiceItemListModel[$idItem];
        }

        function getItemListFromLocal()
        {
            return $this->itemListModel;
        }

        function increaseItemChoice($idItem)
        {
            // print_r($_SESSION);
            $this->sortItemListByNumChoice();
            $this->numChoiceItemListModel[$idItem]++;
            $_SESSION[$idItem] = $this->numChoiceItemListModel[$idItem];
        }

        function decreaseItemChoice($idItem)
        {
            $this->numChoiceItemListModel[$idItem]--;
            $_SESSION[$idItem] = $this->numChoiceItemListModel[$idItem];

        }

        function refreshItemChoiceList()
        {
            unset($numChoiceItemListModel);
            for ($i = 0; $i < count($this->itemListModel); $i++)
            {
                $_SESSION[$this->itemListModel[$i]->get_MaMon()] = 0;
                $numChoiceItemListModel[$this->itemListModel[$i]->get_MaMon()] = 0;
            }
        }

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

        public static function getDeltailItemFromServer($idItem)
        {
            include '../configs/config.php';
            $sql = "SELECT * FROM ct_mon where MaMON = '" . $idItem . "'";
            $result = $conn->query($sql);
            $detailItem;
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc(); 
                $detailItem = new ChiTietMon($row);
            }
            return $detailItem;
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

        function sortItemListByNumChoice()
        {
            for ($i = 0; $i < count($this->itemListModel); $i++)
                for ($j = $i + 1; $j < count($this->itemListModel); $j++)
                    if ($this->numChoiceItemListModel[$this->itemListModel[$i]->get_MaMon()] < $this->numChoiceItemListModel[$this->itemListModel[$j]->get_MaMon()])
                    {
                        $tmp = $this->itemListModel[$i];
                        $this->itemListModel[$i] = $this->itemListModel[$j];
                        $this->itemListModel[$j] = $tmp;
                    }
        }

        public static function showOption($idItem)
        {
            self::getDeltailItemFromServer($idItem);
            self::getToppingListFromServer($idItem);
        }
    }
    $modelSale = new Model_Sale();

    if (isset($_POST['func']))
    {
        $emp1 = json_decode($_POST['func']);
        if (json_last_error() == JSON_ERROR_NONE)
        {
            //$_POST['res'] = "ok";
            if ($emp1->name == "addItem")
                $modelSale->increaseItemChoice($emp1->id);
            if ($emp1->name == "minusItem")
                $modelSale->decreaseItemChoice($emp1->id);
            if ($emp1->name == "session_unset")
                session_unset();
            if ($emp1->name == "showOption")    
                $modelSale->showOption($emp1->id);
        }
    }    
?> 