<?php
include 'E_PhieuKiemKho.php';

class Model_PhieuKiem
{
    public function __construct()
    {
    }

    public function get_AllPhieuKiem()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM phieukiem';
        $result = $conn->query($sql);
        $PhieuKiemList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $PhieuKiem = new PhieuKiemKho($row);
                array_push($PhieuKiemList, $PhieuKiem);
            }
            return $PhieuKiemList;
        }
    }

    public function get_PhieuKiemDetails($id)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM phieukiem WHERE MaPK='" . $id . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $PhieuKiem = new PhieuKiemKho($row);
            return $PhieuKiem;
        }
    }

    public function add_PhieuKiem($px)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO phieukiem (MaPK, MaNVKiem, MaNVPhuKiem, NgayLap, GhiChu)
                VALUES ('" . $px->get_MaPK() . "', '" . $px->get_MaNVKiem() . "', '" . $px->get_MaNVPK() . "', '" .
                $px->get_ThoiGian() . "', '" . $px->get_GhiChu() . "')";
        $result = $conn->query($sql);
        if ($result)
        {
            $ModelCTPK = new Model_CT_PhieuKiem();

            if ($ModelCTPK->addAll_CT_PhieuKiem($px->get_MaPK()) == 1)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    public function update_PhieuKiem($px)
    {
        include '../configs/config.php';
        $sql = "UPDATE phieukiem 
                SET MaNVKiem='" . $px->get_MaNVKiem() . "', MaNVPhuKiem='" . $px->get_MaNVPK() .
                "', GhiChu='" . $px->get_GhiChu() . "'" . " WHERE MaPK='" . $px->get_MaPK() . "'";
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

    public function delete_PhieuKiem($id) {
        include '../configs/config.php';
        $sql = 'DELETE FROM phieukiem WHERE MaPK="' . $id . '"';
        $result = $conn->query($sql);
        
        if ($result) {
            $sql = "DELETE FROM ct_phieukiem WHERE MaPK='" . $id . "'";
            $result = $conn->query($sql);
            if ($result) {
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function generate_MaPhieuKiem()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("phieukiem", "pk");
    }
}

class Model_CT_PhieuKiem
{
    public function __construct()
    {
    }

    public function get_AllCT_PhieuKiem()
    {
        // include '../configs/config.php';
        // $sql = 'SELECT * FROM ct_phieunhap';
        // $result = $conn->query($sql);
        // $PhieuNhapList = array();
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $PhieuNhap = new PhieuNhap($row);
        //         array_push($PhieuNhapList, $PhieuNhap);
        //     }
        //     return $PhieuNhapList;
        // }
    }

    public function get_CT_PhieuKiemDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM ct_phieukiem WHERE MaPK="' . $id . '"';
        $result = $conn->query($sql);
        $CTPhieuKiemArr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CTPhieuKiem = new CT_PhieuKiem($row);
                array_push($CTPhieuKiemArr, $CTPhieuKiem);
            }
            
            return $CTPhieuKiemArr;
        }
    }

    public function addAll_CT_PhieuKiem($MaPK)
    {
        include '../configs/config.php';
        include '../models/M_NguyenVatLieu.php';
        $sqlAdd = "";
        $ModelNVL = new Model_NguyenVatLieu();
        $NVLList = $ModelNVL->get_AllNguyenVatLieu();

        for ($i = 0; $i < count($NVLList); $i++)
        {
            $sqlAdd .=
            "INSERT INTO ct_phieukiem (MaPK, MaNVL, SoLuongBaoCao, SoLuongThucTe, MaTT, GhiChu)
            VALUES ('" . $MaPK . "', '" . $NVLList[$i]->get_MaNVL() . "', " . $NVLList[$i]->get_SoLuongTon() . ", "
            . $NVLList[$i]->get_SoLuongTon() . ", '', ''); ";
        }
        $resultInitCTPK = $conn->multi_query($sqlAdd);

        if ($resultInitCTPK)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function add_CT_PhieuKiem($CTPK)
    {
        include '../configs/config.php';

        $sqlAdd =
            "INSERT INTO ct_phieukiem (MaPK, MaNVL, SoLuongBaoCao, SoLuongThucTe, MaTT, GhiChu)
            VALUES ('" . $CTPK->get_MaPK() . "', '" . $CTPK->get_MaNVL() . "', " . $CTPK->get_SLBaoCao() . ", "
            . $CTPK->get_SLThucTe() . ", '', '')";

        $resultInitCTPK = $conn->query($sqlAdd);

        if ($resultInitCTPK)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function update_CT_PhieuKiem($pk)
    {
        include '../configs/config.php';

        $sqlAdd = "UPDATE ct_phieukiem SET SoLuongThucTe='" . $pk->get_SLThucTe() . "', MaTT='" . $pk->get_MaTT() . 
        "', GhiChu='" . $pk->get_GhiChu() . "' WHERE MaPK='". $pk->get_MaPK() . "' AND MaNVL='" . $pk->get_MaNVL() . "'";

        $resultInitCTPK = $conn->query($sqlAdd);

        if ($resultInitCTPK)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function delete_CT_PhieuKiem($MaPK, $MaNVL)
    {
        include '../configs/config.php';
        $sql = 'DELETE FROM ct_phieukiem WHERE MaPK="' . $MaPK . '" AND MaNVL="' . $MaNVL . '"';
        $result = $conn->query($sql);
        
        if ($result) {
            return 1;
        }
        return 0;
    }
}
?>