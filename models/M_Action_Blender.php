<?php 
    include_once "../models/E_DatMon.php";
    include_once "../models/E_ChiTietDatMon.php";
    include_once "../models/E_Topping_DM.php";
    class Blender
    {
        static public function get_toppingdm($mactdm)
        {
            if (!@include("../configs/config.php"))
                include_once("../configs/config.php");
            $sql = "SELECT * FROM topping_dm WHERE MaCTDM = '" . $mactdm . "'";
            $result = $conn->query($sql);
            $toppingList = array();
            // echo $result->num_rows . " " . $mactdm . " ";
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $topping = new Topping_DM($row);
                    array_push($toppingList ,$topping->get_TenTopping());
                }
            }
            // echo count($toppingList[0]) . "--";
            return $toppingList;
        }

        static public function get_detailOrder($idOrder)
        {
            if (!@include("../configs/config.php"))
                include_once("../configs/config.php");
            $sql = "SELECT * FROM ct_datmon WHERE MaDM = '" . $idOrder . "'";
            $result = $conn->query($sql);
            $detailOrder = array();
            // echo $result->num_rows;
            $n = 0;
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $detailOrder[$n][0] = new ChiTietDatMon($row);
                    $detailOrder[$n][1] = Blender::get_toppingdm($detailOrder[$n][0]->get_MaCTDM());
                    $n++;
                }
            }
            return $detailOrder;
        }

        static public function get_Order()
        {
            if (!@include("../configs/config.php"))
                include_once("../configs/config.php");
            $sql = 'SELECT * FROM datmon';
            $result = $conn->query($sql);
            $orders = array();
            $n = 0;
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $orders[$n] = array();
                    $orders[$n][0] =  new DatMon($row);
                    $n++;
                }
            }
            for ($i = 0; $i < $n; $i++)
            {
                // echo json_encode($orders[$i][0]->get_MaDM());
                $orders[$i][1] = Blender::get_detailOrder($orders[$i][0]->get_MaDM()); 
                // echo json_encode($orders[$i][1][0]->get_MaDM());
            }
            return $orders;
        }

        static public function updateStateOrder($idOrder, $state)
        {
            if (!@include("../configs/config.php"))
                include("../configs/config.php");
            $sql = "UPDATE datmon SET TinhTrang = '" . $state . "' WHERE MaDM = '" . $idOrder . "'";
            $result = $conn->query($sql);
            return $result;
        }
    }
?>