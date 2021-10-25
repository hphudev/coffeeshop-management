<?php
include 'NguyenVatLieu.php';

class Model_NguyenVatLieu
{
    public function __construct()
    {
    }

    public function get_AllNguyenVatLieu()
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nguyenvatlieu';
        $result = $conn->query($sql);
        $NguyenVatLieuList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NguyenVatLieu = new NguyenVatLieu($row);
                array_push($NguyenVatLieuList, $NguyenVatLieu);
            }
            return $NguyenVatLieuList;
        }
    }

    public function get_NguyenVatLieuDetails($id)
    {
        include '../configs/config.php';
        $sql = 'SELECT * FROM nguyenvatlieu WHERE MaNVL="' . $id . '"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $NguyenVatLieu = new NguyenVatLieu($row);
                $conn->close();
                return $NguyenVatLieu;
            }
        }
    }

    public function add_NguyenVatLieu($nvl)
    {
        include '../configs/config.php';
        $sql = "INSERT INTO
                nguyenvatlieu (MaNVL, MaLoaiNVL, TenNVL, SoLuongTon, MaDVT, DonGiaNhap, MaNCC, MaTinhTrang)
                VALUES ('" . $nvl->get_MaNVL() . "', '" . $nvl->get_MaLoaiNVL() . "', '" . $nvl->get_TenNVL().
                "', '" . $nvl->get_SoLuongTon() . "', '" . $nvl->get_MaDVT() . "', '" . $nvl->get_DonGiaNhap().
                "', '" . $nvl->get_MaNhaCungCap() . "', '" . $nvl->get_MaTinhTrang() . "')";
        $result = $conn->query($sql);
        if ($result) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function update_NguyenVatLieu($nvl)
    {
        include '../configs/config.php';
        $sql = "UPDATE nguyenvatlieu SET MaLoaiNVL='" . $nvl->get_MaLoaiNVL() . "', TenNVL='" . $nvl->get_TenNVL().
                "', SoLuongTon=" . $nvl->get_SoLuongTon() . ", MaDVT='" . $nvl->get_MaDVT() .
                "', DonGiaNhap=" . $nvl->get_DonGiaNhap(). ", MaNCC='" . $nvl->get_MaNhaCungCap() .
                "', MaTinhTrang='" . $nvl->get_MaTinhTrang() . "' WHERE MaNVL='" . $nvl->get_MaNVL() . "'";
        $result = $conn->query($sql);
        if ($result) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function generate_MaNVL()
    {
        $num = count($this->get_AllNguyenVatLieu()) + 1;
        $newId = "nvl" . $num;
        return $newId;
    }
}

if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['unit']) && isset($_POST['quantity']) && isset($_POST['id']) &&
    isset($_POST['unitprice']) && isset($_POST['supplier']) && isset($_POST['status']) && isset($_POST['action']))
{
    include 'M_DonViTinh.php';
    include 'M_LoaiNguyenVatLieu.php';
    include 'M_NhaCungCap.php';
    include 'M_TinhTrang.php';
    $modelNVL = new Model_NguyenVatLieu();

    $ModelDonViTinh = new Model_DonViTinh();
    $DonViTinhList = $ModelDonViTinh->get_AllDonViTinh();
    function getMaDVT($DonViTinhList, $tenDVT)
    {
        for ($i = 0; $i < count($DonViTinhList); $i++) {
            if ($DonViTinhList[$i]->get_TenDVT() == $tenDVT) {
                return $DonViTinhList[$i]->get_MaDVT();
            }
        }
    }

    $ModelLoaiNguyenVatLieu = new Model_LoaiNguyenVatLieu();
    $LoaiNguyenVatLieuList = $ModelLoaiNguyenVatLieu->get_AllLoaiNguyenVatLieu();
    function getMaLoaiNVL($LoaiNguyenVatLieuList, $tenLNVL)
    {
        for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
            if ($LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL() == $tenLNVL) {
                return $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL();
            }
        }
    }

    $ModelNhaCungCap = new Model_NhaCungCap();
    $NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();
    function getMaNCC($NhaCungCapList, $tenNCC)
    {
        for ($i = 0; $i < count($NhaCungCapList); $i++) {
            if ($NhaCungCapList[$i]->get_TenNCC() == $tenNCC) {
                return $NhaCungCapList[$i]->get_MaNCC();
            }
        }
    }

    $ModelTinhTrang = new Model_TinhTrang();
    $TinhTrangList = $ModelTinhTrang->get_AllTinhTrang();
    function getMaTT($TinhTrangList, $tenTT)
    {
        for ($i = 0; $i < count($TinhTrangList); $i++) {
            if ($TinhTrangList[$i]->get_TenTinhTrang() == $tenTT) {
                return $TinhTrangList[$i]->get_MaTinhTrang();
            }
        }
    }

    //Define action
    if ($_POST['action'] == "add")
    {
        $data = array(
            "MaNVL"=>$modelNVL->generate_MaNVL(),
            "MaLoaiNVL"=>getMaLoaiNVL($LoaiNguyenVatLieuList, $_POST['type']),
            "TenNVL"=>$_POST['name'],
            "SoLuongTon"=>$_POST['quantity'],
            "MaDVT"=>getMaDVT($DonViTinhList, $_POST['unit']),
            "DonGiaNhap"=>$_POST['unitprice'],
            "MaNCC"=>getMaNCC($NhaCungCapList, $_POST['supplier']),
            "MaTinhTrang"=>getMaTT($TinhTrangList, $_POST['status'])
        );
        
        $NVL = new NguyenVatLieu($data);
        if ($modelNVL->add_NguyenVatLieu($NVL) == 1)
        {
            $arr = array('success'=>'1');
            echo json_encode($arr);
        }
        else
        {
            echo json_encode(array('success' =>'0'));
        }
    }
    elseif ($_POST['action'] == "edit")
    {
        $data = array(
            "MaNVL"=>$_POST['id'],
            "MaLoaiNVL"=>getMaLoaiNVL($LoaiNguyenVatLieuList, $_POST['type']),
            "TenNVL"=>$_POST['name'],
            "SoLuongTon"=>$_POST['quantity'],
            "MaDVT"=>getMaDVT($DonViTinhList, $_POST['unit']),
            "DonGiaNhap"=>$_POST['unitprice'],
            "MaNCC"=>getMaNCC($NhaCungCapList, $_POST['supplier']),
            "MaTinhTrang"=>getMaTT($TinhTrangList, $_POST['status'])
        );
        
        $NVL = new NguyenVatLieu($data);
        if ($modelNVL->update_NguyenVatLieu($NVL) == 1)
        {
            $arr = array('success'=>'1');
            echo json_encode($arr);
        } 
        else
        {
            echo json_encode(array('success' =>'0'));
        }
    }
} else {
    //echo json_encode(array('success' =>'0'));
}