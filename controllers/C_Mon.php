<?php
include_once '../models/M_Mon.php';
include_once '../models/M_ChucVu.php';

class C_Mon
{
    public function invoke()
    {
        $ModelPhanQuyen = new Model_PhanQuyen();

        if (isset($_GET['item-type']))
        {
            include '../models/M_LoaiMon.php';

            $ModelLoaiMon = new Model_LoaiMon();
            $LoaiMonList = $ModelLoaiMon->get_AllLoaiMon();
            function getMaLM($LoaiMonList, $tenLM)
            {
                for ($i = 0; $i < count($LoaiMonList); $i++) {
                    if ($LoaiMonList[$i]->get_TenLoaiMon() == $tenLM) {
                        return $LoaiMonList[$i]->get_MaLoaiMon();
                    }
                }
            }

            include_once '../admin/menu/item-type.php';
        }
        elseif (isset($_POST['action']))
        {
            include '../models/M_LoaiMon.php';
            $ModelLoaiMon = new Model_LoaiMon();
            $LoaiMonList = $ModelLoaiMon->get_AllLoaiMon();
            function getMaLM($LoaiMonList, $tenLM)
            {
                for ($i = 0; $i < count($LoaiMonList); $i++) {
                    if ($LoaiMonList[$i]->get_TenLoaiMon() == $tenLM) {
                        return $LoaiMonList[$i]->get_MaLoaiMon();
                    }
                }
            }

            //Món
            if ($_POST['action']=="add" && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['unit'])
                && isset($_POST['description']) && isset($_POST['note']) && isset($_POST['size']) && isset($_POST['price'])
                && isset($_POST['topping']))
            {
                //Validate image file
                try {
                    // Undefined | Multiple Files | $_FILES Corruption Attack
                    // If this request falls under any of them, treat it invalid.
                    if (
                        !isset($_FILES['file']['error']) ||
                        is_array($_FILES['file']['error'])
                    ) {
                        throw new RuntimeException('Không xác định được ảnh!');
                    }
                
                    // Check $_FILES['upfile']['error'] value.
                    switch ($_FILES['file']['error']) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            throw new RuntimeException('Không có ảnh đính kèm!');
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            throw new RuntimeException('Dung lượng ảnh quá lớn!');
                        default:
                            throw new RuntimeException('Lỗi không xác định!');
                    }
                
                    // You should also check filesize here.
                    if ($_FILES['file']['size'] > 1000000) {
                        throw new RuntimeException('Dung lượng ảnh quá lớn!');
                    }
                
                    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                    // Check MIME Type by yourself.
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    if (false === $ext = array_search(
                        $finfo->file($_FILES['file']['tmp_name']),
                        array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                        ),
                        true
                    )) {
                        throw new RuntimeException('Sai định dạng file ảnh!');
                    }
                
                    // You should name it uniquely.
                    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
                    // On this example, obtain safe unique name from its binary data.
                    // if (!move_uploaded_file(
                    //     $_FILES['file']['tmp_name'],
                    //     sprintf('../assets/img/mon_images/%s.%s',
                    //         sha1_file($_FILES['file']['tmp_name']),
                    //         $ext
                    //     )
                    // )) {
                    //     throw new RuntimeException('Failed to move uploaded file.');
                    // }
                
                } catch (RuntimeException $e) {
                    // echo json_encode(array('success'=>'0', 'err'=>$e->getMessage()));
                }

                //Process init data to store to db
                include '../models/M_DonViTinh.php';

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

                $ModelMon = new Model_Mon();
                
                $mysql_date_now = date("Y-m-d");

                $data = array(
                    "MaMon"=>$ModelMon->generate_MaMon(),
                    "TenMon"=>$_POST['name'],
                    "MaLoaiMon"=>getMaLM($LoaiMonList, $_POST['type']),
                    "SoLuong"=>0,
                    "MaDVT"=>getMaDVT($DonViTinhList, $_POST['unit']),
                    "HinhAnh"=>addslashes(file_get_contents($_FILES['file']['tmp_name'])),
                    "MoTa"=>$_POST['description'],
                    "GhiChu"=>$_POST['note'],
                    "NgayThem"=>$mysql_date_now,
                    "NgayChinhSuaLanCuoi"=>$mysql_date_now,
                    "TinhTrang"=>'true',
                    "SoLanDung"=>0
                );
                
                $Mon = new Mon($data);
                if ($ModelMon->addMon($Mon, json_decode($_POST['size']), json_decode($_POST['price']), json_decode($_POST['topping'])) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action']=="edit" && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['unit'])
                && isset($_POST['description']) && isset($_POST['note']) && isset($_POST['size']) && isset($_POST['price'])
                && isset($_POST['id']) && isset($_POST['status']) && isset($_POST['topping']))
            {
                if (isset($_FILES['file']['error']))
                {
                    //Validate image file
                    try {
                        // Undefined | Multiple Files | $_FILES Corruption Attack
                        // If this request falls under any of them, treat it invalid.
                        if (
                            !isset($_FILES['file']['error']) ||
                            is_array($_FILES['file']['error'])
                        ) {
                            throw new RuntimeException('Không xác định được ảnh!');
                        }
                    
                        // Check $_FILES['upfile']['error'] value.
                        switch ($_FILES['file']['error']) {
                            case UPLOAD_ERR_OK:
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                throw new RuntimeException('Không có ảnh đính kèm!');
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                throw new RuntimeException('Dung lượng ảnh quá lớn!');
                            default:
                                throw new RuntimeException('Lỗi không xác định!');
                        }
                    
                        // You should also check filesize here.
                        if ($_FILES['file']['size'] > 1000000) {
                            throw new RuntimeException('Dung lượng ảnh quá lớn!');
                        }
                    
                        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                        // Check MIME Type by yourself.
                        $finfo = new finfo(FILEINFO_MIME_TYPE);
                        if (false === $ext = array_search(
                            $finfo->file($_FILES['file']['tmp_name']),
                            array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                            ),
                            true
                        )) {
                            throw new RuntimeException('Sai định dạng file ảnh!');
                        }
                    } catch (RuntimeException $e) {
                        
                    }
                }

                //Process init data to store to db
                include '../models/M_DonViTinh.php';

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

                $ModelMon = new Model_Mon();
                
                $mysql_date_now = date("Y-m-d");

                $data = array(
                    "MaMon"=>$_POST['id'],
                    "TenMon"=>$_POST['name'],
                    "MaLoaiMon"=>getMaLM($LoaiMonList, $_POST['type']),
                    "SoLuong"=>0,
                    "MaDVT"=>getMaDVT($DonViTinhList, $_POST['unit']),
                    "HinhAnh"=>isset($_FILES['file']['error']) ? addslashes(file_get_contents($_FILES['file']['tmp_name'])) : '',
                    "MoTa"=>$_POST['description'],
                    "GhiChu"=>$_POST['note'],
                    "NgayThem"=>$mysql_date_now,
                    "NgayChinhSuaLanCuoi"=>$mysql_date_now,
                    "SoLanDung"=>0,
                    "TinhTrang" => $_POST['status'] 
                );

                $Mon = new Mon($data);
                if ($ModelMon->updateMon($Mon, json_decode($_POST['size']), json_decode($_POST['price']), json_decode($_POST['topping'])) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action']=='add_quantity' && isset($_POST['quantity']) && isset($_POST['mon_id'])) 
            {
                $ModelMon = new Model_Mon();

                if ($ModelMon->addQuantityMon($_POST['mon_id'], $_POST['quantity']) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            //Loại món
            elseif ($_POST['action']=='add-type')
            {
                $data = array(
                    "MaLoaiMon"=>$ModelLoaiMon->generate_MaLoaiMon(),
                    "TenLoaiMon"=>$_POST['type_name'],
                );
                
                $LM = new LoaiMon($data);

                if ($ModelLoaiMon->add_LoaiMon($LM) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action']=='edit-type')
            {
                $data = array(
                    "MaLoaiMon"=>$_POST['type_id'],
                    "TenLoaiMon"=>$_POST['type_name'],
                );
                
                $LM = new LoaiMon($data);

                if ($ModelLoaiMon->update_LoaiMon($LM) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($_POST['action']=='delete-type')
            {
                if ($ModelLoaiMon->delete_LoaiMon($_POST['type_id']) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                }
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
        }
        else
        {
            if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], "mon0")) {
                $ModelMon = new Model_Mon();
                $MonList = $ModelMon->getAllItem();

                include_once('../admin/menu/menu.php');
            }
            else {
                echo "<script>" .
                    "Swal.fire(
                        'Thất bại!',
                        'Bạn không có quyền truy cập mục này!',
                        'error'
                    );" .
                    "</script>";
            }
        }
    }
}

$C_Mon = new C_Mon();
$C_Mon->invoke();
?>