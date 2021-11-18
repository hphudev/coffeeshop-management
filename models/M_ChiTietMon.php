<?php
    include 'E_ChiTietMon.php';

    class Model_ChiTietMon
    {
        public function __construct()
        {
        }

        public function getAllCTMon()
        {
           include '../configs/config.php';
            $sql = "SELECT * FROM ct_mon";
            $result = $conn->query($sql);
            $itemList = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $item = new ChiTietMon($row);
                    array_push($itemList, $item);
                }
                return $itemList;
            }
        }

        public function addChiTietMon($MaMon, $sizeArr, $priceArr)
        {
            include '../configs/config.php';

            $sqlAdd = "";
            for ($i = 0; $i < count($sizeArr); $i++)
            {
                $sqlAdd .= "INSERT INTO
                                ct_mon (MaMon, TenKichThuoc, DonGia)
                            VALUES
                                ('" . $MaMon . "', '" . $sizeArr[$i] . "', " . $priceArr[$i] .");";
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

        public function deleteChiTietMon($MaMon)
        {
            include '../configs/config.php';

            $sql = "DELETE FROM
                            ct_mon
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