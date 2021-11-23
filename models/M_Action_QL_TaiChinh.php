<?php
    class Financial{
        static public function getImportSlipInDay($day, $month, $year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TienThanhToan) as TienThanhToan FROM phieunhap WHERE DAY(phieunhap.NgayLap) = '" . $day ."' and MONTH(phieunhap.NgayLap) = '" . $month . "'  and YEAR(phieunhap.NgayLap) = '" . $year ."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
                return $result->fetch_assoc()['TienThanhToan'];
            else
                return 0;
        }

        static public function getBillInDay($day, $month, $year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TongTienThanhToan) as TongTienThanhToan FROM hoadon where DAY(hoadon.NgayThanhToan) = '" . $day ."'and  MONTH(hoadon.NgayThanhToan) = '" . $month . "'  and YEAR(hoadon.NgayThanhToan) = '" . $year ."'";
            // echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
                return $result->fetch_assoc()['TongTienThanhToan'];
            else 
                return 0;
        }

        static public function getImportOnMonthYear($month, $year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TienThanhToan) as TienThanhToan, DAY(phieunhap.NgayLap) as ngay FROM phieunhap WHERE MONTH(phieunhap.NgayLap) = '" . $month . "'  and YEAR(phieunhap.NgayLap) = '" . $year ."' GROUP BY TienThanhToan";
            // echo $sql;
            $result = $conn->query($sql);
            return $result;
        }

        static public function getBillOnMonthYear($month, $year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TongTienThanhToan) as TongTienThanhToan, DAY(hoadon.NgayLap) as ngay FROM hoadon where MONTH(hoadon.NgayThanhToan) = '" . $month . "'  and YEAR(hoadon.NgayThanhToan) = '" . $year ."' GROUP BY TongTienThanhToan";
            $result = $conn->query($sql);
            return $result;
        }

        static public function getBillInYear($year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TongTienThanhToan) as TongTienThanhToan, MONTH(hoadon.NgayThanhToan) as thang FROM hoadon where YEAR(hoadon.NgayThanhToan) = '" . $year ."'";
            $result = $conn->query($sql);
            return $result;
        
        
        }
        static public function getImportInYear($year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TienThanhToan) as TienThanhToan, MONTH(phieunhap.NgayLap) as thang FROM phieunhap where YEAR(phieunhap.NgayLap) = '" . $year ."'";
            $result = $conn->query($sql);
            return $result;
        
        }

        static public function getBillInYears($year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TongTienThanhToan) as TongTienThanhToan FROM hoadon where YEAR(hoadon.NgayThanhToan) = '" . $year ."'";
            $result = $conn->query($sql);
            return $result;
        
        
        }
        static public function getImportInYears($year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(TienThanhToan) as TienThanhToan FROM phieunhap where YEAR(phieunhap.NgayLap) = '" . $year ."'";
            $result = $conn->query($sql);
            return $result;
        
        }

        static public function getBillAllYear()
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(hoadon.TongTienThanhToan) as thu, YEAR(hoadon.NgayThanhToan) as nam FROM hoadon GROUP BY nam ORDER BY nam ASC";
            $result = $conn->query($sql);
            return $result;
        }

        static public function getImportAllYear()
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(phieunhap.TienThanhToan) as chi, YEAR(phieunhap.NgayLap) as nam FROM phieunhap GROUP BY nam ORDER BY nam ASC";
            $result = $conn->query($sql);
            return $result;
        }

        static public function getReportAllYear()
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(hoadon.TongTienThanhToan) as thu, sum(phieunhap.TienThanhToan) as chi, YEAR(hoadon.NgayThanhToan) as nam FROM phieunhap, hoadon WHERE YEAR(phieunhap.NgayLap) = YEAR(hoadon.NgayThanhToan) GROUP BY YEAR(hoadon.NgayThanhToan)";
            echo $sql;
            $result = $conn->query($sql);
            return $result;
        }

        static public function getReportUseItemInDay($day, $month, $year)
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT sum(ct_hoadon.SoLuong) as SoLanDung, TenMon, ct_hoadon.MaMon FROM ct_hoadon, hoadon, mon WHERE DAY(NgayThanhToan) = '" . $day . "' and MONTH(NgayThanhToan) = '" . $month ."' and YEAR(NgayThanhToan) = '" . $year ."' and hoadon.MaHD = ct_hoadon.MaHD and ct_hoadon.MaMon = mon.MaMon GROUP BY ct_hoadon.MaMon";
            // echo $sql;
            $result = $conn->query($sql);
            return $result;
        }

        static public function getReportUseItemAllDay()
        {
            if (!@include('../configs/config.php'))
                include_once('../configs/config.php');
            $sql = "SELECT TenMon, SoLanDung FROM mon";
            $result = $conn->query($sql);
            return $result;
        }

        
    }
?>