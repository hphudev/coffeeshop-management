<?php
include '../models/M_LoaiMon.php';
include '../models/M_DonViTinh.php';
include '../models/M_ChiTietMon.php';

$ModelLoaiMon = new Model_LoaiMon();
$LoaiMonList = $ModelLoaiMon->get_AllLoaiMon();
function getTenLM($LoaiMonList, $maLM)
{
    for ($i = 0; $i < count($LoaiMonList); $i++) {
        if ($LoaiMonList[$i]->get_MaLoaiMon() == $maLM) {
            return $LoaiMonList[$i]->get_TenLoaiMon();
        }
    }
}

$ModelDonViTinh = new Model_DonViTinh();
$DonViTinhList = $ModelDonViTinh->get_AllDonViTinh();
function getTenDVT($DonViTinhList, $maDVT)
{
    for ($i = 0; $i < count($DonViTinhList); $i++) {
        if ($DonViTinhList[$i]->get_MaDVT() == $maDVT) {
            return $DonViTinhList[$i]->get_TenDVT();
        }
    }
}

$ModelCTMon = new Model_ChiTietMon();
$AllCTMon = $ModelCTMon->getAllCTMon();

?>

<style>
    p {
        margin-bottom: 0 !important; 
    }

    .pd-8 {
        padding-left: 8px;
        padding-right: 8px;
    }

    .mt-24 {
        margin-top: 24px !important;
    }

    .flex-sp-bet {
        align-items: center;
        justify-content: space-between;
    }

    .col-group,
    .buttons-group,
    .fields-group,
    .flex-sp-bet {
        display: flex;
    }

    .fields-group {
        align-items: center;
        justify-content: space-evenly;
    }

    .col-group {
        align-items: center;
        flex-direction: column;
    }

    .line-break {
        width: 100%;
        height: 1px;
        background-color: #ccc;
    }

    .content-in-card,
    .sections-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .content-in-card {
        justify-content: flex-end;
    }

    .sections-container {
        width: 100%;
        height: auto;
        justify-content: center;
    }

    .input-label {
        width: 35%;
    }

    .input-value {
        width: 65%;
    }

    .full-w {
        width: 100%;
    }

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
    }
    /* mobile */
    @media (max-width: 739px) {
        .buttons-group {
            flex-direction: column;
        }

        .modal-width-sm {
            max-width: 90%;
            margin: auto;
        }

        .input-label {
            width: 35%;
        }

        .input-value {
            width: 64%;
        }   
    }
    /* tablet */
    @media (max-width: 1023px) {
        .hide-sm-md {
            display: none;
        }

        .below-menu-icon {
            margin-top: 40px;
            justify-content: center;
        }
    }
</style>

<head>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
</head>

<div class="container-fluid">
    <div class="flex-sp-bet below-menu-icon col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>Quản lý món</strong></h3>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <!-- danh sách món -->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                    <div class="card-text">
                        <h4 class="card-title">MENU MÓN</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm Món
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-success'>STT</th>
                                    <th class='text-center text-success'>Mã món</th>
                                    <th class='text-center text-success'>Hình ảnh</th>
                                    <th class='text-center text-success'>Tên món</th>
                                    <th class='text-center text-success'>Loại món</th>
                                    <th class='text-center text-success'>Số lượng</th>
                                    <th class='text-center text-success'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã món</th>
                                    <th class='text-center'>Hình ảnh</th>
                                    <th class='text-center'>Tên món</th>
                                    <th class='text-center'>Loại món</th>
                                    <th class='text-center'>Số lượng</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($MonList && count($MonList) > 0)
                                {
                                    for ($i = 0; $i < count($MonList); $i++)
                                    {
                                        echo "<tr role='row' class='odd'>";
                                        echo "<td class='text-center'>". ($i + 1) ."</td>";
                                        echo "<td class='text-center m-id'>". $MonList[$i]->get_MaMon() ."</td>";
                                        echo "<td class='text-center'><img class='img' src='data:image/jpeg;base64,". base64_encode($MonList[$i]->get_HinhAnh()) ."' alt='Món' style='min-width:80px; max-width:100px; min-height: 80px; max-height: 80px; border-radius: 6px;'</td>";
                                        echo "<td class='text-center name'><strong>". $MonList[$i]->get_TenMon() ."</strong></td>";//https://file.hstatic.net/200000286789/article/cafe-sua-1280x1000-be0b_0132690fe1e740ce8ece2e1526322851_1024x1024.jpg
                                        echo "<td class='text-center type-name'>". getTenLM($LoaiMonList, $MonList[$i]->get_MaLoaiMon()) ."</td>";
                                        echo "<td class='text-center quantity'>". $MonList[$i]->get_SoLuong() ."</td>";
                                        echo '<td class="td-actions text-center">
                                                <button type="button" rel="tooltip" class="btn btn-info btn-view-detail" data-target="#myModal" data-toggle="modal">
                                                    <i class="material-icons">info</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-success btn-edit-data" data-target="#myModal" data-toggle="modal">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-warning btn-add-quantity" data-target="#addQuantityModal" data-toggle="modal">
                                                    <i class="material-icons">add</i>
                                                </button>
                                            </td>';
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- hidden information -->
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-none">
            <?php
            if ($MonList && count($MonList) > 0)
            {
                for ($i = 0; $i < count($MonList); $i++)
                {
                    echo "<p class='unit'>". getTenDVT($DonViTinhList, $MonList[$i]->get_MaDVT()) ."</p>";
                    echo "<p class='description'>". $MonList[$i]->get_MoTa() ."</p>";
                    echo "<p class='note'>". $MonList[$i]->get_GhiChu() ."</p>";
                    echo "<p class='add-date-info'>". $MonList[$i]->get_NgayThem() ."</p>";
                    echo "<p class='last-mod-date-info'>". $MonList[$i]->get_NgayChinhSuaLanCuoi() ."</p>";
                }
            }
            ?>
        </div>

        <!-- hidden chi tiết món -->
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-none">
            <?php
            if ($AllCTMon && count($AllCTMon) > 0)
            {
                for ($i = 0; $i < count($AllCTMon); $i++)
                {
                    echo "<p class='m-id-ct'>". $AllCTMon[$i]->get_MaMon() ."</p>";
                    echo "<p class='size-ct'>". $AllCTMon[$i]->get_TenKichThuoc() ."</p>";
                    echo "<p class='price-ct'>". $AllCTMon[$i]->get_DonGia() ."</p>";
                }
            }
            ?>
        </div>

        <!-- hidden check quyền -->
        <?php
            if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], "mon1")) {
                echo "<p id='quyen' class='d-none d-sm-none d-md-none d-lg-none d-xl-none'>mon1</p>";
            } else {
                echo "<p id='quyen' class='d-none d-sm-none d-md-none d-lg-none d-xl-none'>mon0</p>";
            }
        ?>
    </div>
</div>

<!-- Information modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Thông tin món</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tên món: </p>
                        <input id="name-val" type="text" class="form-control input-value" placeholder="Nhập tên món">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Hình ảnh: </p>
                        <div class="col-group input-value">
                            <img id="img-val" class="full-w" src="https://file.hstatic.net/200000286789/article/cafe-sua-1280x1000-be0b_0132690fe1e740ce8ece2e1526322851_1024x1024.jpg" style="border-radius: 6px;"/>
                            
                            <div class="img-picker fileinput fileinput-new full-w text-center" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                <div>
                                    <span class="btn btn-primary btn-file"><span class="fileinput-new"><span class="material-icons">image</span> Chọn ảnh</span>
                                    <span class="fileinput-exists">Thay đổi</span><input id="photo" type="file" name="file"></span>
                                </div>
                            </div>
                        </div>
                        <!-- <img id="img-val" class="input-value" src="https://file.hstatic.net/200000286789/article/cafe-sua-1280x1000-be0b_0132690fe1e740ce8ece2e1526322851_1024x1024.jpg" style="border-radius: 6px;"/>
                        
                        <div class="img-picker fileinput fileinput-new input-value text-center" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-primary btn-file"><span class="fileinput-new"><span class="material-icons">image</span> Chọn ảnh</span>
                                <span class="fileinput-exists">Thay đổi</span><input id="photo" type="file" name="file"></span>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Loại món: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="type-val">Chọn loại món</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($LoaiMonList && count($LoaiMonList) > 0)
                                {
                                    for ($i = 0; $i < count($LoaiMonList); $i++)
                                    {
                                        echo "<p class='dropdown-item type-opt'>" . $LoaiMonList[$i]->get_TenLoaiMon(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Kích thước và giá: </p>
                        <table class="table input-value" id="sizeTable">
                            <thead>
                                <tr role="row">
                                    <th class='text-center'><strong>Size</strong></th>
                                    <th class='text-center'><strong>Đơn giá</strong></th>
                                    <th class='text-center'></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- <tr>
                                    <td class='text-center'>S</td>
                                    <td class='text-center'>20000</td>
                                </tr>

                                <tr>
                                    <td class='text-center'>S</td>
                                    <td class='text-center'>20000</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group bmd-form-group add-size-box">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left"></p>
                        <div class="sections-container input-value">
                            <div class="fields-group">
                                <input id="size-val" style="width: 100px;" class="form-control" type="text" placeholder="Kích thước">
                                <p>&nbsp &nbsp &nbsp &nbsp</p>
                                <input id="price-val" style="width: 100px;" class="form-control" type="number" placeholder="Đơn giá">
                            </div>
                            
                            <div id="btnAddSizeRow" class="btn btn-info">
                                <span class="material-icons">add</span>
                                Thêm size
                            </div>
                            <div id="btnRemoveAllRow" class="btn btn-danger" >
                                <span class="material-icons">playlist_remove</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Đơn vị tính: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="unit-val">Chọn ĐVT</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($DonViTinhList && count($DonViTinhList) > 0)
                                {
                                    for ($i = 0; $i < count($DonViTinhList); $i++)
                                    {
                                        echo "<p class='dropdown-item unit-opt'>" . $DonViTinhList[$i]->get_TenDVT(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Mô tả: </p>
                        <input id="description-val" type="text" class="form-control input-value" placeholder="Nhập mô tả">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ghi chú: </p>
                        <input id="note-val" type="text" class="form-control input-value" placeholder="Nhập ghi chú">
                    </div>
                </div>

                <div class="form-group bmd-form-group add-date-div">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ngày thêm: </p>
                        <p id="add-date" class="input-value text-left">null</p>
                    </div>
                </div>

                <div class="form-group bmd-form-group last-mod-date-div">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ngày chỉnh sửa cuối: </p>
                        <p id="last-mod-date" class="input-value text-left">null</p>
                    </div>
                </div>

                <!-- white space -->
                <!-- <div class="form-group bmd-form-group">
                    <br>
                    <br>
                    <br>
                    <br>
                </div> -->
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
            <button id="saveData" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
  </div>
</div>

<!-- Add quantity modal -->
<div class="modal modal-width-sm fade" id="addQuantityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong id="add-quantity-title">Thêm số lượng</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="text-right">Cộng thêm: </p>
                        <input id="quantity-val" type="number" class="form-control" placeholder="Nhập số lượng" style="width: 30%;">
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
            <button id="saveAddData" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
  </div>
</div>

<script>
    var mon_id = "";
    var action = "";
    var add_quantity_index = 0;
    var add_quantity = 0;
    var sizeRowArr = [];
    var priceRowArr = [];
    $(document).ready(function() {
        //init datatables
        $('.datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $('.fileinput').fileinput();

        $("#btnRemoveAllRow").addClass("disabledbutton");
    });

    //Nút xem thông tin
    $(".btn-view-detail").each(function(index) {
        $(this).on("click", function(e) {
            if (checkQuyenMon()) {
                $("#img-val").show();
                $(".img-picker").hide();
                $(".add-size-box").hide();

                mon_id = $($(".m-id").get(index)).text();
                $("#name-val").val($($(".name").get(index)).text());
                $("#img-val").attr('src', $($(".img").get(index)).attr('src'));
                $("#type-val").text($($(".type-name").get(index)).text());
                $("#unit-val").text($($(".unit").get(index)).text());
                $("#description-val").val($($(".description").get(index)).text());
                $("#note-val").val($($(".note").get(index)).text());
                $("#add-date").text($($(".add-date-info").get(index)).text());
                $("#last-mod-date").text($($(".last-mod-date-info").get(index)).text());
                $(".add-date-div").show();
                $(".last-mod-date-div").show();

                $("#sizeTable > tbody").empty();
                initSizeAndPriceTable();

                $(".modal-title").text("Thông tin món");
                $("#saveData").hide();
            } else {
                e.stopPropagation();
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });
    });

    //Nút edit thông tin
    $(".btn-edit-data").each(function(index) {
        $(this).on("click", function(e) {
            if (checkQuyenMon()) {
                $("#img-val").hide();
                $(".img-picker").show();
                $(".add-size-box").show();
                $("#btnRemoveAllRow").removeClass("disabledbutton");

                mon_id = $($(".m-id").get(index)).text();
                $("#name-val").val($($(".name").get(index)).text());
                $("#img-val").attr('src', $($(".img").get(index)).attr('src'));
                $("#type-val").text($($(".type-name").get(index)).text());
                $("#unit-val").text($($(".unit").get(index)).text());
                $("#description-val").val($($(".description").get(index)).text());
                $("#note-val").val($($(".note").get(index)).text());
                $("#add-date").text($($(".add-date-info").get(index)).text());
                $("#last-mod-date").text($($(".last-mod-date-info").get(index)).text());
                $(".add-date-div").show();
                $(".last-mod-date-div").show();

                $("#sizeTable > tbody").empty();
                initSizeAndPriceTable();

                action = "edit";
                $(".modal-title").text("Chỉnh sửa thông tin món");
                $("#saveData").show();
            } else {
                e.stopPropagation();
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });
    });

    //Nút thêm món
    $(".btn-add").each(function(index) {
        $(this).on("click", function(e) {
            if (checkQuyenMon()) {
                $("#img-val").hide();
                $(".img-picker").show();
                $(".add-size-box").show();

                $("#name-val").val("");
                $("#type-val").text("Chọn loại món");
                $("#unit-val").text("Chọn ĐVT");
                $("#description-val").val("");
                $("#note-val").val("");
                $(".add-date-div").hide();
                $(".last-mod-date-div").hide();
                $(".sizeRow").remove();

                action = "add";
                $(".modal-title").text("Thêm món");
                $("#saveData").show();

                sizeRowArr = [];
                priceRowArr = [];
            } else {
                e.stopPropagation();
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });
    });

    //Nút thêm số lượng
    $(".btn-add-quantity").each(function(index) {
        $(this).on("click", function(e) {
            if (checkQuyenMon()) {
                $('#add-quantity-title').text("Thêm số lượng > " + $($(".name").get(index)).text());
                $('#quantity-val').val('');
                mon_id = $($(".m-id").get(index)).text();
                add_quantity_index = index;
            } else {
                e.stopPropagation();
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });
    });

    //Dropdown loại món
    $(".type-opt").each(function(index) {
        $(this).on("click", function() {
            $("#type-val").text($(this).text());
        });
    });

    //Dropdown ĐVT
    $(".unit-opt").each(function(index) {
        $(this).on("click", function() {
            $("#unit-val").text($(this).text());
        });
    });

    //Hàm khởi tạo bảng size và giá
    function initSizeAndPriceTable() {
        var arrSize = [];
        var arrPrice = [];
        for (var i = 0; i < $(".m-id-ct").length; i++) {
            if ($($(".m-id-ct").get(i)).text() == mon_id) {
                arrSize.push($($(".size-ct").get(i)).text());
                arrPrice.push($($(".price-ct").get(i)).text());

                sizeRowArr.push($($(".size-ct").get(i)).text());
                priceRowArr.push($($(".price-ct").get(i)).text());
            }
        }

        for (var i = 0; i < arrSize.length; i++) {
            var crit = "<tr class='sizeRow'>" +
                "<td class='text-center'>" + arrSize[i] + "</td>" +
                "<td class='text-center'>" + arrPrice[i] + "</td></tr>";

            $("#sizeTable > tbody:last-child").append(crit);
        }
    }

    //Hàm check input lúc add row size và giá
    function checkSizeRowInput() {
        var size = $("#size-val").val();
        var price = $("#price-val").val();

        if (size == "" || price == "" || parseInt(price) < 0) {
            return false;
        }
        else {
            if (sizeRowArr.includes(size)) {
                return false;
            }
        }

        return true;
    }

    //Hàm add row vào modal
    function addRowToSizeTable(size, price) {
        var crit = "<tr class='sizeRow'>" +
                "<td class='text-center'>" + size + "</td>" +
                "<td class='text-center money'>" + price + "</td>" +
                "</tr>";

        $("#sizeTable > tbody:last-child").append(crit);

        if (sizeRowArr.length == 1) {
            $("#btnRemoveAllRow").removeClass("disabledbutton");
        }
    }

    //Event add row button click
    $("#btnAddSizeRow").on("click", function() {
        if (checkSizeRowInput()) {
            sizeRowArr.push($("#size-val").val());
            priceRowArr.push($("#price-val").val());

            addRowToSizeTable($("#size-val").val(), $("#price-val").val());

            $("#size-val").val("");
            $("#price-val").val("");
        }
        else {
            Swal.fire(
                'Cảnh báo!',
                'Vui lòng kiểm tra lại dữ liệu nhập!',
                'warning'
            )
        }
    });

    //Nút xóa row trong modal lúc add
    $("#btnRemoveAllRow").on("click", function() {
        Swal.fire({
            title: 'Xóa size - giá',
            text: 'Thao tác này sẽ xóa tất cả hàng. Bạn vẫn muốn tiếp tục?',
            showDenyButton: true,
            confirmButtonText: 'Hủy',
            denyButtonText: `Xóa`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                
            } else if (result.isDenied) {
                $("#sizeTable .sizeRow").remove();
                sizeRowArr = []; 
                priceRowArr = [];
                $("#btnRemoveAllRow").addClass("disabledbutton");
            }
        })
    });

    //Add row size on enter
    $('#price-val').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            $("#btnAddSizeRow").click();
            $("#size-val").focus();
        }
    });

    //Hàm thêm phẩy cho tiền
    $.fn.digits = function() { 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        });
    }

    $(".money").digits();

    function checkQuyenMon() {
        if ($("#quyen").text()==="mon1") {
            return true;
        }
        return false;
    }

    function checkInput() {
        if (action=="add") {
            if ($("#name-val").val() == "" || $("#type-val").text() == "Chọn loại món" ||
                $("#unit-val").text() == "Chọn ĐVT" || $("#description-val").val() == "" ||
                sizeRowArr.length < 1 || document.getElementById("photo").value == "") {
                    return false;
            }
        } else {
            if ($("#name-val").val() == "" || $("#type-val").text() == "Chọn loại món" ||
                $("#unit-val").text() == "Chọn ĐVT" || $("#description-val").val() == "") {
                    return false;
            }
        }
        return true;
    }

    function checkAddQuantityInput() {
        if ($("#quantity-val").val() == "" || parseInt($("#quantity-val").val()) <= 0) {
                return false;
        }
        return true;
    }
</script>

<script type="text/javascript">
  	$(document).ready(function() {
  		$("#saveData").on("click", function() {
            if (checkInput()) {
                var $this 		    = $(this);
                var $caption        = $this.html();
                var formData        = new FormData();

                formData.append('action', action);
                formData.append('id', mon_id);
                formData.append('name', $("#name-val").val());
                formData.append('type', $("#type-val").text());
                formData.append('unit', $("#unit-val").text());
                formData.append('description', $("#description-val").val());
                formData.append('note', $("#note-val").val());
                if (document.getElementById("photo").value != "") {
                    formData.append('file', $('input[type=file]')[0].files[0]);
                }
                formData.append('size', JSON.stringify(sizeRowArr));
                formData.append('price', JSON.stringify(priceRowArr));

                // Ajax config
                $.ajax({
                    type: "POST",
                    url: "../controllers/C_Mon.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $this.attr('disabled', true).html("Đang xử lý...");
                    },
                    success: function (response) {
                        console.log(response);
                        var jsonData = JSON.parse(response);
    
                        if (jsonData.success == "1")
                        {
                            Swal.fire(
                                'Thành công!',
                                'Thao tác thành công!',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        }
                        else {
                            Swal.fire(
                                'Thất bại!',
                                'Vui lòng kiểm tra lại!',
                                'error'
                            )
                        }
                    },
                    complete: function() {
                        $this.attr('disabled', false).html($caption);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
            else {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đủ dữ liệu!',
                    'error'
                )
                // $(".alert").addClass("open");
            }
  		});

        //Add số lượng
        $("#saveAddData").on("click", function() {
            if (checkAddQuantityInput()) {
                var $this 		    = $(this);
                var $caption        = $this.html();
                add_quantity = parseInt($("#quantity-val").val()) + parseInt($($(".quantity").get(add_quantity_index)).text());

                // Ajax config
                $.ajax({
                    type: "POST",
                    url: "../controllers/C_Mon.php",
                    data: {
                        action: "add_quantity",
                        mon_id: mon_id,
                        quantity: add_quantity
                    },
                    beforeSend: function () {
                        $this.attr('disabled', true).html("Đang xử lý...");
                    },
                    success: function (response) {
                        console.log(response);
                        var jsonData = JSON.parse(response);
    
                        if (jsonData.success == "1")
                        {
                            Swal.fire(
                                'Thành công!',
                                'Thao tác thành công!',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    $('#addQuantityModal').modal('hide');
                                    $($(".quantity").get(add_quantity_index)).text(add_quantity.toString());
                                }
                            })
                        }
                        else {
                            Swal.fire(
                                'Thất bại!',
                                'Vui lòng kiểm tra lại!',
                                'error'
                            )
                        }
                    },
                    complete: function() {
                        $this.attr('disabled', false).html($caption);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
            else {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng kiểm tra lại dữ liệu nhập!',
                    'error'
                )
                // $(".alert").addClass("open");
            }
  		});
  	});
</script>