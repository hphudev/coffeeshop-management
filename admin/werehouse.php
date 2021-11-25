<?php
include '../models/M_DonViTinh.php';
include '../models/M_LoaiNguyenVatLieu.php';
include '../models/M_NhaCungCap.php';
include '../models/M_TinhTrang.php';

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

$ModelLoaiNguyenVatLieu = new Model_LoaiNguyenVatLieu();
$LoaiNguyenVatLieuList = $ModelLoaiNguyenVatLieu->get_AllLoaiNguyenVatLieu();
function getTenLoaiNVL($LoaiNguyenVatLieuList, $maLNVL)
{
    for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
        if ($LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() == $maLNVL) {
            return $LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL();
        }
    }
}

$ModelNhaCungCap = new Model_NhaCungCap();
$NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();
function getTenNCC($NhaCungCapList, $maNCC)
{
    for ($i = 0; $i < count($NhaCungCapList); $i++) {
        if ($NhaCungCapList[$i]->get_MaNCC() == $maNCC) {
            return $NhaCungCapList[$i]->get_TenNCC();
        }
    }
}

$ModelTinhTrang = new Model_TinhTrang();
$TinhTrangList = $ModelTinhTrang->get_AllTinhTrang();
function getTenTT($TinhTrangList, $maTT)
{
    for ($i = 0; $i < count($TinhTrangList); $i++) {
        if ($TinhTrangList[$i]->get_MaTinhTrang() == $maTT) {
            return $TinhTrangList[$i]->get_TenTinhTrang();
        }
    }
}
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

    .centerlize {
        text-align: center;
        align-items: center;
        justify-content: center;
    }

    .line-break {
        width: 100%;
        height: 1px;
        background-color: #ccc;
    }

    .flex-sp-bet {
        align-items: center;
        justify-content: space-between;
    }

    .flex-sp-bet,
    .buttons-group,
    .fields-group,
    .content {
        display: flex;
    }

    .align-right {
        align-self: flex-end;
    }

    .content {
        width: 100%;
        height: max-content;
    }

    .border-box {
        width: 100%;
        height: max-content;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    .summary {
        padding-top: 12px;
        padding-bottom: 12px;
    }

    .data-box {
        padding: 12px;
        flex-direction: column;
    }

    .input-label {
        width: 30%;
        justify-content: left;
    }

    .input-value {
        width: 69%;
        justify-content: left;
    }   

    .dropdown-item {
        cursor: default;
    }

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    /* .alert {
        display: none;
    }

    .open {
        display: block;
        position: absolute;
        top: 0;
        z-index: 2050;
    } */

    /* mobile */
    @media (max-width: 739px) {
        .buttons-group {
            flex-direction: column;
        }

        .modal-width-sm {
            max-width: 90%;
            margin: auto;
        }

        .align-right {
            align-self: center;
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

<div class="container-fluid">
    <div class="below-menu-icon flex-sp-bet col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-success">Nguyên vật liệu</div>
            <div class="btn btn-import">Nhập kho</div>
            <div class="btn btn-export">Xuất kho</div>
            <div class="btn btn-report">Kiểm kho</div>
            <div class="btn btn-expand">Mở rộng</div>
        </div>
    </div>

    <div class="line-break"></div>

    <!-- <div class="content mt-24">
        <div class="summary border-box flex-sp-bet">
            <?php
                if ($NguyenVatLieuList && count($NguyenVatLieuList) > 0) {
                    echo '<p class="pd-8 centerlize">Tổng số lượng nguyên vật liệu: <strong>'. count($NguyenVatLieuList) . '</strong></p>';
                    echo '<p class="pd-8 centerlize">Tổng số loại nguyên vật liệu: <strong>'. count($LoaiNguyenVatLieuList) . '</strong></p>';
                    echo '<p class="pd-8 centerlize">Tổng số lượng nguyên vật liệu: <strong>'. count($NguyenVatLieuList) . '</strong></p>';
                }
            ?>
        </div>
    </div> -->

    <div class="data-box border-box flex-sp-bet mt-24">
        <div class="buttons-group align-right">
            <button class="btn btn-info btn-add-material" data-toggle="modal" data-target="#myModal">
                <i class="material-icons">add</i>
                Thêm NVL
            </button>
        </div>

        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                <thead>
                    <tr role="row">
                        <th class='text-center text-info'>STT</th>
                        <th class='text-center text-info'>Mã</th>
                        <th class='text-center text-info'>Tên nguyên vật liệu</th>
                        <th class='text-center text-info'>Loại NVL</th>
                        <th class='text-center text-info'>Đơn vị tính</th>
                        <th class='text-center text-info'>Số lượng</th>
                        <th class='text-center text-info'>Đơn giá nhập</th>
                        <th class='text-center text-info'>Nhà cung cấp</th>
                        <th class='text-center text-info'>Tình trạng</th>
                        <th class='text-center text-info'>Thao tác</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class='text-center'>STT</th>
                        <th class='text-center'>Mã</th>
                        <th class='text-center'>Tên nguyên vật liệu</th>
                        <th class='text-center'>Loại NVL</th>
                        <th class='text-center'>Đơn vị tính</th>
                        <th class='text-center'>Số lượng</th>
                        <th class='text-center'>Đơn giá nhập</th>
                        <th class='text-center'>Nhà cung cấp</th>
                        <th class='text-center'>Tình trạng</th>
                        <th class='text-center'>Thao tác</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if ($NguyenVatLieuList) {
                        if (count($NguyenVatLieuList) > 0) {
                        // output data of each row
                        for ($i = 0; $i < count($NguyenVatLieuList); $i++) {
                            echo "<tr role='row' class='odd' id='" . $NguyenVatLieuList[$i]->get_MaNVL() . "'>";
                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                            echo "<td class='text-center material-id'>" . $NguyenVatLieuList[$i]->get_MaNVL() . "</td>";
                            echo "<td class='text-center material-name'><strong>" . $NguyenVatLieuList[$i]->get_TenNVL() . "</strong></td>";
                            echo "<td class='text-center material-type'>" . getTenLoaiNVL($LoaiNguyenVatLieuList, $NguyenVatLieuList[$i]->get_MaLoaiNVL()) . "</td>";
                            echo "<td class='text-center material-unit'>" . getTenDVT($DonViTinhList, $NguyenVatLieuList[$i]->get_MaDVT()) . "</td>";
                            echo "<td class='text-center material-quantity'>" . $NguyenVatLieuList[$i]->get_SoLuongTon() . "</td>";
                            echo "<td class='text-center material-unitprice money'>" . $NguyenVatLieuList[$i]->get_DonGiaNhap() . "</td>";
                            echo "<td class='text-center material-supplier'>" . getTenNCC($NhaCungCapList, $NguyenVatLieuList[$i]->get_MaNhaCungCap()) . "</td>";
                            echo "<td class='text-center material-status'>" . getTenTT($TinhTrangList, $NguyenVatLieuList[$i]->get_MaTinhTrang()) . "</td>";
                            echo '<td class="td-actions text-center">
                                    <button type="button" id="' . $NguyenVatLieuList[$i]->get_MaNVL() . '" rel="tooltip" class="btn btn-success btn-edit-data" data-target="#myModal" data-toggle="modal">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" id="' . $NguyenVatLieuList[$i]->get_MaNVL() . '" rel="tooltip" class="btn btn-danger btn-delete-mater">
                                        <i class="material-icons">close</i>
                                    </button>
                                </td>';
                            echo "</tr>";
                        }
                        } else {
                            echo "Dữ liệu trống!";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- hidden check quyền -->
    <?php
        if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], "kho1")) {
            echo "<p id='quyen' class='d-none d-sm-none d-md-none d-lg-none d-xl-none'>kho1</p>";
        } else {
            echo "<p id='quyen' class='d-none d-sm-none d-md-none d-lg-none d-xl-none'>kho0</p>";
        }
    ?>
</div>

<!-- Add material modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Thêm nguyên vật liệu</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tên NVL: </p>
                        <input name="name" id="material-name-val" class="form-control input-value"
                            required type="text" placeholder="Nhập tên nguyên vật liệu"
                        >
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Loại NVL: </p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="material-type-val">Chọn loại</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($LoaiNguyenVatLieuList && count($LoaiNguyenVatLieuList) > 0) {
                                    for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
                                        echo "<p class='dropdown-item mater-type-opt'>" . $LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Đơn vị tính: </p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="material-unit-val">Chọn ĐVT</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($DonViTinhList && count($DonViTinhList) > 0) {
                                    for ($i = 0; $i < count($DonViTinhList); $i++) {
                                        echo "<p class='dropdown-item mater-unit-opt'>" . $DonViTinhList[$i]->get_TenDVT(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng: </p>
                        <input disabled id="material-quantity-val" type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Đơn giá nhập: </p>
                        <input disabled id="material-unitprice-val" type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div> -->

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Nhà cung cấp: </p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="material-supplier-val">Chọn NCC</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhaCungCapList && count($NhaCungCapList) > 0) {
                                    for ($i = 0; $i < count($NhaCungCapList); $i++) {
                                        echo "<p class='dropdown-item mater-supplier-opt'>" . $NhaCungCapList[$i]->get_TenNCC(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tình trạng: </p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="material-status-val">Chọn tình trạng</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($TinhTrangList && count($TinhTrangList) > 0) {
                                    for ($i = 0; $i < count($TinhTrangList); $i++) {
                                        echo "<p class='dropdown-item mater-status-opt'>" . $TinhTrangList[$i]->get_TenTinhTrang(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
            <button id="saveData" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
  </div>
</div>

<script>
    var submit_type = "";
    var nvl_id = "";
    $(document).ready(function() {
        //init datatables
        $('#datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        //mở rộng
        $(".btn-expand").on("click", function() {
            if (checkQuyenKho()) {
                window.location.href = "../admin/index.php?page=werehouse&expand";
            } else {
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });

        //nhập kho
        $(".btn-import").on("click", function() {
            if (checkQuyenKho()) {
                window.location.href = "../admin/index.php?page=werehouse&receipt";
            } else {
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });

        //xuất kho
        $(".btn-export").on("click", function() {
            if (checkQuyenKho()) {
                window.location.href = "../admin/index.php?page=werehouse&export";
            } else {
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });

        //kiểm kho
        $(".btn-report").on("click", function() {
            if (checkQuyenKho()) {
                window.location.href = "../admin/index.php?page=werehouse&report";
            } else {
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });

        //add nvl
        $(".btn-add-material").on("click", function(e) {
            if (checkQuyenKho()) {
                submit_type = "add-material";
                $(".modal-title").text("Thêm nguyên vật liệu");
                $("#material-name-val").val("");
                $("#material-type-val").text("Chọn loại");
                $("#material-unit-val").text("Chọn ĐVT");
                //$("#material-quantity-val").val("");
                //$("#material-unitprice-val").val("");
                $("#material-supplier-val").text("Chọn NCC");
                $("#material-status-val").text("Chọn tình trạng");
            } else {
                e.stopPropagation();
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện thao tác này!',
                    'error'
                )
            }
        });

        //edit thông tin nvl
        $(".btn-edit-data").each(function(index) {
            $(this).on("click", function(e) {
                if (checkQuyenKho()) {
                    var $row = $(this).closest('tr');
                    nvl_id = $row.attr('id');

                    submit_type = "edit-material";
                    $(".modal-title").text("Chỉnh sửa nguyên vật liệu");
                    $("#material-name-val").val($row.find('.material-name').text());
                    $("#material-type-val").text($row.find(".material-type").text());
                    $("#material-unit-val").text($row.find(".material-unit").text());
                    $("#material-supplier-val").text($row.find(".material-supplier").text());
                    $("#material-status-val").text($row.find(".material-status").text());
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

        //Nút xóa ng.vật liệu
        $(".btn-delete-mater").each(function(index) {
            $(this).on("click", function() {
                Swal.fire({
                    title: 'Xóa nguyên vật liệu',
                    text: 'Thao tác này sẽ xóa nguyên vật liệu và không thể hoàn tác. Bạn vẫn muốn tiếp tục?',
                    showDenyButton: true,
                    confirmButtonText: 'Hủy',
                    denyButtonText: `Xóa`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                    } else if (result.isDenied) {
                        var $row = $(this).closest('tr');
                        obj_id = $row.attr('id');
                        action_type = "delete";
                        
                        // Ajax config
                        $.ajax({
                            type: "POST",
                            url: '../controllers/C_NguyenVatLieu.php',
                            data: {
                                action: action_type,
                                mater_id: obj_id,
                            },
                            beforeSend: function () {
                                
                            },
                            success: function (response) {
                                var jsonData = JSON.parse(response);

                                if (jsonData.success == "1")
                                {
                                    Swal.fire(
                                        'Thành công!',
                                        'Đã xóa nguyên vật liệu',
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
                            
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });
                    }
                })
            })
        });

        //dropdowns in add modal
        //Loại NVL
        $(".mater-type-opt").each(function(index) {
            $(this).on("click", function() {
                $("#material-type-val").text($(this).text());
                console.log($("#material-type-val").text());
            });
        });
        //Đơn vị tính
        $(".mater-unit-opt").each(function(index) {
            $(this).on("click", function() {
                $("#material-unit-val").text($(this).text());
                console.log($("#material-unit-val").text());
            });
        });
        //Nhà cung cấp
        $(".mater-supplier-opt").each(function(index) {
            $(this).on("click", function() {
                $("#material-supplier-val").text($(this).text());
                console.log($("#material-supplier-val").text());
            });
        });
        //Tình trạng
        $(".mater-status-opt").each(function(index) {
            $(this).on("click", function() {
                $("#material-status-val").text($(this).text());
                console.log($("#material-status-val").text());
            });
        });
    });

    $.fn.digits = function() { 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        });
    }

    $(".money").digits();

    $(".material-quantity").digits();

    function checkQuyenKho() {
        if ($("#quyen").text()==="kho1") {
            return true;
        }
        return false;
    }

    function checkInput() {
        if ($("#material-name-val").val() == "" ||  $("#material-type-val").text() == "Chọn loại" ||
            $("#material-unit-val").text() == "Chọn ĐVT" ||
            $("#material-supplier-val").text() == "Chọn NCC" ||
            $("#material-status-val").text() == "Chọn tình trạng") {
                console.log($("#material-name-val").val());
                console.log($("#material-type-val").text());
                console.log($("#material-unit-val").text());
                console.log($("#material-supplier-val").text());
                console.log($("#material-status-val").text());
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

                // Ajax config
                $.ajax({
                    type: "POST",
                    url: "../controllers/C_NguyenVatLieu.php",
                    data: {
                        action: submit_type,
                        id: nvl_id,
                        name: $("#material-name-val").val(),
                        type: $("#material-type-val").text(),
                        unit: $("#material-unit-val").text(),
                        // quantity: $("#material-quantity-val").val(),
                        // unitprice: $("#material-unitprice-val").val(),
                        supplier: $("#material-supplier-val").text(),
                        status: $("#material-status-val").text()
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
  	});
</script>
