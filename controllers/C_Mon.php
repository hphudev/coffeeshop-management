<?php
include '../models/M_Mon.php';

class C_Mon
{
    public function invoke()
    {
        if (isset($_POST['action']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['unit'])
            && isset($_POST['description']) && isset($_POST['note']) && isset($_POST['size']) && isset($_POST['price']))
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
            include '../models/M_LoaiMon.php';

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
            );
            
            $Mon = new Mon($data);
            if ($ModelMon->addMon($Mon, json_decode($_POST['size']), json_decode($_POST['price'])) == 1)
            {
                $arr = array('success'=>'1');
                echo json_encode($arr);
            }
            else
            {
                echo json_encode(array('success' =>'0'));
            }
        }
        elseif (isset($_POST['action']) && $_POST['action']=='add_quantity' && isset($_POST['quantity']) &&
                isset($_POST['mon_id'])) 
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
        else
        {
            $ModelMon = new Model_Mon();
            $MonList = $ModelMon->getAllItem();

            include_once('../admin/menu.php');
        }
    }
}

$C_Mon = new C_Mon();
$C_Mon->invoke();
?>