<?php
    include 'E_Mon.php';

    class Model_Mon
    {
        public function __construct()
        {
        }

        public function getAllItem()
        {
           include '../configs/config.php';
            $sql = 'SELECT * FROM mon';
            $result = $conn->query($sql);
            $itemList = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $item = new NhanVien($row);
                    array_push($ItemList, $item);
                }
                return $ItemList;
            }
        }

    }