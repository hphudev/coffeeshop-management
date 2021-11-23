<?php
include 'E_PhieuXuatKho.php';

class Model_PhieuXuat
{
    public function __construct()
    {
    }

    public function get_AllPhieuXuat()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM phieuxuat';
        $result = $conn->query($sql);
        $PhieuXuatList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $PhieuXuat = new PhieuXuat($row);
                array_push($PhieuXuatList, $PhieuXuat);
            }
            return $PhieuXuatList;
        }
    }

    public function get_PhieuXuatDetails($id)
    {
        include '../configs/config.php';
        $sql = "SELECT * FROM phieuxuat WHERE MaPX='" . $id . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $PhieuXuat = new PhieuXuat($row);
            return $PhieuXuat;
        }
    }

    public function add_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO phieuxuat (MaPX, NgayLap, MaNVXuat, MaNVNhan, GhiChu)
                VALUES ('" . $px->get_MaPX() . "', '" . $px->get_NgayLap() . "', '" . $px->get_MaNVXuat() . "', '" .
                $px->get_MaNVNhan() . "', '" . $px->get_GhiChu() . "')";
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

    public function update_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "UPDATE phieuxuat 
                SET MaNVXuat='" . $px->get_MaNVXuat() . "', MaNVNhan='" . $px->get_MaNVNhan() .
                "', GhiChu='" . $px->get_GhiChu() . "'" . " WHERE MaPX='" . $px->get_MaPX() . "'";
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

    public function delete_PhieuXuat($id)
    {
        include '../configs/config.php';
        $successCount = 0;
        $ModelCTPhieuXuat = new Model_CT_PhieuXuat();
        $ListCTPhieuXuat = $ModelCTPhieuXuat->get_CT_PhieuXuatDetails($id);

        for ($i = 0; $i < count($ListCTPhieuXuat); $i++)
        {
            $data = array(
                "MaPX"=>$ListCTPhieuXuat[$i]->get_MaPX(),
                "MaNVL"=>$ListCTPhieuXuat[$i]->get_MaNVL(),
                "SoLuong"=>0,
            );
    
            $CTPX = new CT_PhieuXuat($data);
            
            if ($ModelCTPhieuXuat->update_CT_PhieuXuat($CTPX) == 1)
            {
                $successCount++;
            }
        }

        $sql = "DELETE FROM ct_phieuxuat WHERE MaPX='" . $id . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            $sql = "DELETE FROM phieuxuat WHERE MaPX='" . $id . "'";
            $result = $conn->query($sql);
            if ($result)
            {
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function generate_MaPhieuXuat()
    {
        include 'M_General_CMD.php';
        $general_cmd = new General_CMD();
        return $general_cmd->AutoGetID("phieuxuat", "px");
    }
}

class Model_CT_PhieuXuat
{
    public function __construct()
    {
    }

    public function get_AllCT_PhieuXuat()
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

    public function get_CT_PhieuXuatDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM ct_phieuxuat WHERE MaPX="' . $id . '"';
        $result = $conn->query($sql);
        $CTPhieuXuatArr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CTPhieuXuat = new CT_PhieuXuat($row);
                array_push($CTPhieuXuatArr, $CTPhieuXuat);
            }
            
            return $CTPhieuXuatArr;
        }
    }

    public function add_CT_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO ct_phieuxuat (MaPX, MaNVL, SoLuong)
                VALUES ('" . $px->get_MaPX() . "', '" . $px->get_MaNVL() . "', " . $px->get_SoLuong() . ")";
        $result = $conn->query($sql);
        if ($result)
        {
            $sqlUpdateNVL = "UPDATE nguyenvatlieu
                            SET SoLuongTon=(SELECT SoLuongTon
                                            FROM nguyenvatlieu
                                            WHERE MaNVL='" . $px->get_MaNVL() . "') - " . $px->get_SoLuong() .
                            " WHERE MaNVL='" . $px->get_MaNVL() . "'";
            $updateNVL = $conn->query($sqlUpdateNVL);
            if ($updateNVL)
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

    public function update_CT_PhieuXuat($px)
    {
        include '../configs/config.php';
        $old_quantity = 0;
        //Get old quantity
        $sql = "SELECT * FROM ct_phieuxuat " .
                " WHERE MaPX='" . $px->get_MaPX() . "' AND MaNVL='" . $px->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            $data = mysqli_fetch_assoc($result);
            $CTPX = new CT_PhieuXuat($data);
            $old_quantity = $CTPX->get_SoLuong();
        } else {
            return 0;
        }

        //update CTPX
        $sql = "UPDATE ct_phieuxuat
                SET SoLuong=" . $px->get_SoLuong() .
                " WHERE MaPX='" . $px->get_MaPX() . "' AND MaNVL='" . $px->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            $old_quantity = $px->get_SoLuong() - $old_quantity;
            $sql = "UPDATE nguyenvatlieu
                    SET SoLuongTon=SoLuongTon - " . $old_quantity .
                    " WHERE MaNVL='" . $px->get_MaNVL() . "'";
            $result = $conn->query($sql);
            if ($result) {
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function delete_CT_PhieuXuat($px)
    {
        include '../configs/config.php';
        $sql = "DELETE FROM ct_phieuxuat WHERE MaPX='" . $px->get_MaPX() . "' AND MaNVL='" . $px->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result)
        {
            $sqlUpdateNVL = "UPDATE nguyenvatlieu
                            SET SoLuongTon=(SELECT SoLuongTon
                                            FROM nguyenvatlieu
                                            WHERE MaNVL='" . $px->get_MaNVL() . "') + " . $px->get_SoLuong() .
                            " WHERE MaNVL='" . $px->get_MaNVL() . "'";
            $updateNVL = $conn->query($sqlUpdateNVL);
            if ($updateNVL)
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
}
?>