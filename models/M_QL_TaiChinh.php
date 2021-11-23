<?php 
    include_once "../models/M_Action_QL_TaiChinh.php";


    function financialInDay()   
    {
        $resultGood = Financial::getBillInDay(date('d'), date('m'), date('Y'));
        // echo json_encode($resultGood);
        $resultBad = Financial::getImportSlipInDay(date('d'), date('m'), date('Y'));
        $jsonResult = array();
        $jsonResult['thu'] = intval($resultGood);
        $jsonResult['chi'] = intval($resultBad);
        echo json_encode($jsonResult);
    }

    function financialOnMonth()
    {
        $Good = Financial::getBillOnMonthYear(date('m'), date('Y'));
        $Bad = Financial::getImportOnMonthYear(date('m'), date('Y'));
        // echo json_encode($Bad);
        $resultGood = array();
        $resultBad = array();
        if ($Good->num_rows > 0)
        {
            while ($row = $Good->fetch_assoc())
            {
                $resultGood[intval($row['ngay'])] = $row['TongTienThanhToan'];
            }
        }
        if ($Bad->num_rows > 0)
        {
            while ($row = $Bad->fetch_assoc())
            {
                $resultBad[intval($row['ngay'])] = $row['TienThanhToan'];
            }
        }
        $result = array($resultGood, $resultBad);
        echo json_encode($result);
    }

    function financialInWeek()
    {
        $dt = strtotime(date('Y-m-d'));
        $result = array();
        for ($i = 0; $i < 7; $i++)
        {
            $day = date('d', strtotime("-" . strval( intval(date('w') - 1 - $i)) . " day", $dt));
            $month = date('m', strtotime("-" . strval( intval(date('w') - 1 - $i)) . " day", $dt));
            $year = date('Y', strtotime("-" . strval( intval(date('w') - 1 - $i))  . " day", $dt));
            $resultGood = Financial::getBillInDay($day, $month, $year);
            $resultBad = Financial::getImportSlipInDay($day, $month, $year);
            sleep(0.2);
            $jsonResult = array();
            $jsonResult['thu'] = intval($resultGood);
            $jsonResult['chi'] = intval($resultBad);
            $result[] = $jsonResult;
        }
        echo json_encode($result);
    }

    function financialInYear()
    {
        $Good = Financial::getBillInYear(date('Y'));
        $Bad = Financial::getImportInYear(date('Y'));
        $resultGood = array();
        $resultBad = array();
        if ($Good->num_rows > 0)
        {
            while ($row = $Good->fetch_assoc())
            {
                $resultGood[intval($row['thang'])] = $row['TongTienThanhToan'];
            }
        }
        if ($Bad->num_rows > 0)
        {
            while ($row = $Bad->fetch_assoc())
            {
                $resultBad[intval($row['thang'])] = $row['TienThanhToan'];
            }
        }
        $result = array($resultGood, $resultBad);
        echo json_encode($result);
    }

    function financialInNumYear($num)
    {
        $dt = strtotime(date('Y-m-d'));
        $result = array();
        for ($i = $num - 1; $i >= 0; $i--)
        {
            $year = date('Y', strtotime("-" . strval($i) . " year", $dt));
            $resultGood = Financial::getBillInYears($year)->fetch_assoc()['TongTienThanhToan'];
            $resultBad = Financial::getImportInYears($year)->fetch_assoc()['TienThanhToan'];
            $result[] = array('nam'=>strval($year), 'thu'=>$resultGood, 'chi'=>$resultBad);
        }
        echo json_encode($result);
    }

    function financialAllYear()
    {
        $resultGood = array();
        $resultBad = array();
        $resultServer = Financial::getBillAllYear();
        if ($resultServer->num_rows > 0)
        {
            while ($row = $resultServer->fetch_assoc())
            {
                $resultGood[] = ['nam'=>$row['nam'], 'thu'=>$row['thu']];
            }
        }
        $resultServer = Financial::getImportAllYear();
        if ($resultServer->num_rows > 0)
        {
            while ($row = $resultServer->fetch_assoc())
            {
                $resultBad[] = ['nam'=>$row['nam'], 'chi'=>$row['chi']]; 
            }
        }
        $result = array($resultGood, $resultBad);
        echo json_encode($result);
    }

    function financialItemInDay()
    {
        $resultItem = Financial::getReportUseItemInDay(date('d'), date('m'), date('Y'));
        $result = array();
        if ($resultItem->num_rows > 0)
        {
            while ($row = $resultItem->fetch_assoc())
            {
                $result[] = ['TenMon'=>$row['TenMon'], 'SoLanDung'=>$row['SoLanDung']];
            }
        }
        echo json_encode($result);
    }

    function financialItemAllDay()
    {
        $resultItem = Financial::getReportUseItemAllDay();
        $result = array();
        if ($resultItem->num_rows > 0)
        {
            while ($row = $resultItem->fetch_assoc())
            {
                $result[] = ['TenMon'=>$row['TenMon'], 'SoLanDung'=>$row['SoLanDung']];
            }
        }
        echo json_encode($result);
    }

    if (isset($_POST['func']))
    {
        if (json_last_error() == JSON_ERROR_NONE)
        {
            $data = json_decode($_POST['func']);
            if ($data->name == 'financialInDay')
            {
                financialInDay(); 
            }
            if ($data->name == 'financialOnMonth')
            {
                financialOnMonth();
            }
            if ($data->name == 'financialInYear')
            {
                financialInYear();
            }
            if ($data->name == 'financialInWeek')
            {
                financialInWeek();
            }
            if ($data->name == 'financialInTenYear')
            {
                financialInNumYear(10);
            }
            if ($data->name == 'financialInTwentyYear')
            {
                financialInNumYear(20);
            }
            if ($data->name == 'financialAllYear')
            {
                financialAllYear();
            }
            if ($data->name == 'financialItemInDay')
            {
                financialItemInDay();
            }
            if ($data->name == 'financialItemAllDay')
            {
                financialItemAllDay();
            }
        }
    }
?>