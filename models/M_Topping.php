<?php
    include 'E_Topping.php';

    class Model_Topping
    {
        public function __construct()
        {
        }

        public function getAllTopping()
        {
           include '../configs/config.php';
            $sql = "SELECT * FROM topping_lienket";
            $result = $conn->query($sql);
            $itemList = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $item = new Topping($row);
                    array_push($itemList, $item);
                }
                return $itemList;
            }
        }

        public function addTopping($MaMon, $toppingArr)
        {
            include '../configs/config.php';

            $sqlAdd = "";
            for ($i = 0; $i < count($toppingArr); $i++)
            {
                $sqlAdd .= "INSERT INTO
                                topping_lienket (MaMon, TenTopping)
                            VALUES
                                ('" . $MaMon . "', '" . $toppingArr[$i] ."');";
            }
            $result = $conn->multi_query($sqlAdd);
            
            if ($result)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function deleteTopping($MaMon)
        {
            include '../configs/config.php';

            $sql = "DELETE FROM
                            topping_lienket
                    WHERE
                            MaMon='" . $MaMon . "'";
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
    }
?>