<?php 
    include_once "../models/M_Action_Blender.php";
    include_once "../models/M_Action_BanHang.php";
    
    function convertOrdersToArrayAss($orders)
    {
        $result = array('MaDM' => $orders->get_MaDM(), 'TinhTrang' => $orders->get_TinhTrang(), 'SoBan' => $orders->get_SoBan());
        return $result;
    }

    function convertDetailOrdersToArrayAss($detailOrders)
    {
        $result = array('MaCTDM' => $detailOrders->get_MaCTDM(), 'TenMon' => Model_Sale::getItemName($detailOrders->get_MaMon()), 'TenDonVi' => $detailOrders->get_TenDonVi(), 'SoLuong' => $detailOrders->get_SoLuong());
        return $result;
    
    }

    if (isset($_POST['func']))
    {
        $data = json_decode($_POST['func']);
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($data->name == "updateStateOrder")
            {
                echo Blender::updateStateOrder($data->id, $data->state);
            }
            if ($data->name == "getOrders")
            {
                
                $orders = Blender::get_Order();
                // echo json_encode($orders);
                $result = array();
                for ($i = 0; $i < count($orders); $i++)
                {
                    $result[$i][0] = convertOrdersToArrayAss($orders[$i][0]);
                    for ($j = 0; $j < count($orders[$i][1]); $j++)
                    {
                        $result[$i][1][$j][0] = convertDetailOrdersToArrayAss($orders[$i][1][$j][0]);
                        // $result[$i][1][$j][1] = $orders[$i][1][$j][1];
                        $topping = '';
                        for ($k = 0; $k < count($orders[$i][1][$j][1]); $k++)
                        {
                            $topping .= strval($orders[$i][1][$j][1][$k]);
                            if ($k < count($orders[$i][1][$j][1]) - 1)
                                $topping .= ", ";
                        }
                        $result[$i][1][$j][1] = strval($topping);
                    }
                }
                echo json_encode($result);
            }
        }
    }
?>