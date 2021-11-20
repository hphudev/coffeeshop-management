<?php
    include_once "../models/M_Action_BanHang.php";
    include_once "../models/M_Action_Blender.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
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
            if ($data->name == "saveOrder")
            {
                Model_Sale::saveOrder($data->data);
                // echo json_encode($data);
            }
            if ($data->name == "deleteOrder")
            {
                // echo json_encode($data->order);
                $detailOrder = Blender::get_detailOrder($data->MaDM);
                Model_Sale::deleteOrder($data->MaDM);
                Model_Sale::deleteDetailOrder($data->MaDM);
                for ($i = 0; $i < count($detailOrder); $i++)
                {
                    Model_Sale::deleteTopping($detailOrder[$i][0]->get_MaCTDM());
                }
            }
        }
    }    
?> 