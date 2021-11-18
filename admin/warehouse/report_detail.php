<?php
include '../models/M_DonViTinh.php';
include '../models/M_NhanVien.php';
include '../models/M_TinhTrang.php';

$ArrMaNVL = array("");

$ModelNVL = new Model_NguyenVatLieu();
$NVLList = $ModelNVL->get_AllNguyenVatLieu();

$ModelNhanVien = new Model_NhanVien();
$NhanVienList = $ModelNhanVien->get_AllNhanVien();
function getTenNV($NhanVienList, $maNV)
{
    for ($i = 0; $i < count($NhanVienList); $i++) {
        if ($NhanVienList[$i]->get_MaNV() == $maNV) {
            return $NhanVienList[$i]->get_Ten();
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

$ModelNguyenVatLieu = new Model_NguyenVatLieu();
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

    .flex-sp-bet {
        align-items: center;
        justify-content: space-between;
    }

    .fields-group,
    .buttons-group,
    .flex-sp-bet {
        display: flex;
    }

    .fields-group {
        align-items: center;
        justify-content: space-evenly;
    }

    .line-break {
        width: 100%;
        height: 1px;
        background-color: #ccc;
    }

    .content-in-card,
    .sections-container,
    .detail-information {
        display: flex;
        flex-wrap: wrap;
    }

    .content-in-card {
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .sections-container {
        width: 100%;
        height: auto;
        align-items: center;
        justify-content: center;
    }

    .detail-information {
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .detail-information p{
        font-size: 16px;
    }

    .input-label {
        width: 35%;
    }

    .input-value {
        width: 65%;
    }   

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    #drdwn {
        max-height: 300px;
        overflow-y: auto;
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

<div class="container-fluid">
    <div class="sections-container">
        <!-- chi tiết phiếu kiểm -->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                        <h4 class="card-title">Chi tiết phiếu kiểm <strong class="pk-id"><?php echo $PhieuKiem->get_MaPK() ?></strong></h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <div class="detail-information" style="align-self: flex-start;">
                        <p class="pd-8 col-lg-12 col-xl-12">Nhân viên kiểm: <strong><?php echo getTenNV($NhanVienList, $PhieuKiem->get_MaNVKiem()) ?></strong></p>
                        <p class="pd-8 col-lg-12 col-xl-12">Nhân viên phụ kiểm: <strong><?php echo getTenNV($NhanVienList, $PhieuKiem->get_MaNVPK()) ?></strong></p>
                        <p class="pd-8 col-lg-12 col-xl-12">Ghi chú: <strong><?php echo $PhieuKiem->get_GhiChu() ?></strong></p>
                    </div>

                    <button class="btn btn-info btn-add" style="align-self: flex-end;" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm nguyên vật liệu
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>Mã NVL</th>
                                    <th class='text-center text-info'>Tên nguyên vật liệu</th>
                                    <th class='text-center text-info'>Đơn vị tính</th>
                                    <th class='text-center text-info'>SL báo cáo</th>
                                    <th class='text-center text-info'>SL thực tế</th>
                                    <th class='text-center text-info'>Tình trạng</th>
                                    <th class='text-center text-info'>Ghi chú</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã NVL</th>
                                    <th class='text-center'>Tên nguyên vật liệu</th>
                                    <th class='text-center'>Đơn vị tính</th>
                                    <th class='text-center'>SL báo cáo</th>
                                    <th class='text-center'>SL thực tế</th>
                                    <th class='text-center'>Tình trạng</th>
                                    <th class='text-center'>Ghi chú</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($CTPhieuKiem) {
                                    if (count($CTPhieuKiem) > 0) {
                                        // output data of each row
                                        for ($i = 0; $i < count($CTPhieuKiem); $i++)
                                        {
                                            array_push($ArrMaNVL, $CTPhieuKiem[$i]->get_MaNVL());
                                            $NguyenVatLieu = $ModelNguyenVatLieu->get_NguyenVatLieuDetails($CTPhieuKiem[$i]->get_MaNVL());
                                            echo "<tr role='row' class='odd'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center mater-id'>" . $CTPhieuKiem[$i]->get_MaNVL() . "</td>";
                                            echo "<td class='text-center mater-name'><strong>" . $NguyenVatLieu->get_TenNVL() . "</strong></td>";
                                            echo "<td class='text-center'>" . getTenDVT($DonViTinhList, $NguyenVatLieu->get_MaDVT()) . "</td>";
                                            echo "<td class='text-center mater-quantity-rp'><strong>" . $CTPhieuKiem[$i]->get_SLBaoCao() . "</strong></td>";
                                            echo "<td class='text-center mater-quantity-ck'><strong>" . $CTPhieuKiem[$i]->get_SLThucTe() . "</strong></td>";
                                            echo "<td class='text-center mater-stt'>" . getTenTT($TinhTrangList, $CTPhieuKiem[$i]->get_MaTT()) . "</td>";
                                            echo "<td class='text-center mater-note'>" . $CTPhieuKiem[$i]->get_GhiChu() . "</td>";
                                            echo '<td class="td-actions text-center">
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-edit" data-target="#myEditModal" data-toggle="modal">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-delete" data-target="#myDeleteModal" data-toggle="modal" data-placement="top" title="Xóa">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>';
                                            echo "</tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo "Dữ liệu trống!";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add modal -->
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
                    <div class="fields-group">
                        <p class="input-label text-left">Nguyên vật liệu: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="mater-val">Chọn ng.vật liệu</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drdwn">
                                <?php
                                if ($NVLList && count($NVLList) > 0) {
                                    for ($i = 0; $i < count($NVLList); $i++) {
                                        if (!in_array($NVLList[$i]->get_MaNVL(), $ArrMaNVL))
                                        {
                                            echo "<p class='dropdown-item mater-opt'>" . $NVLList[$i]->get_TenNVL(). "</p>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- white space -->
                <div class="form-group bmd-form-group">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
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

<!-- Edit modal -->
<div class="modal modal-width-sm fade" id="myEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Chỉnh sửa thông tin</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nguyên vật liệu: </p>
                        <div class="dropdown input-value">
                            <p id="mater-val-lb">TEMP</p>  
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng báo cáo: </p>
                        <input disabled id="quantity-report" type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng thực tế: </p>
                        <input id="quantity-check" type="number" class="form-control input-value" placeholder="Nhập số lượng">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Tình trạng: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="mater-sts-val">Chọn tình trạng</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($TinhTrangList && count($TinhTrangList) > 0) {
                                    for ($i = 0; $i < count($TinhTrangList); $i++) {
                                        echo "<p class='dropdown-item mater-sts-opt'>" . $TinhTrangList[$i]->get_TenTinhTrang(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ghi chú: </p>
                        <input id="note" type="text" class="form-control input-value" placeholder="Nhập ghi chú">
                    </div>
                </div>

                <!-- white space -->
                <div class="form-group bmd-form-group">
                    <br>
                    <br>
                    <br>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
            <button id="saveEditData" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
  </div>
</div>

<!-- delete nvl modal -->
<div class="modal modal-width-sm fade" id="myDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Xóa nguyên vật liệu</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <p class="text-left">Bạn có chắc muốn xóa nguyên vật liệu này khỏi phiếu kiểm? </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
            <button id="saveDeleteData" type="submit" class="btn btn-primary">Xóa</button>
        </div>
    </div>
  </div>
</div>

<script>
    var action_type = "";
    var obj_id = "";
    var quantity_delete = 0;
    $(document).ready(function() {
        //init datatables
        $('.datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        // add phiếu xuất
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text("Thêm nguyên vật liệu");

                $(".modal-title").text("Thêm nguyên vật liệu");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phiếu xuất
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val-lb").text($($(".mater-name").get(index)).text());
                $("#quantity-report").val($($(".mater-quantity-rp").get(index)).text());
                $("#quantity-check").val($($(".mater-quantity-ck").get(index)).text());
                if ($($(".mater-stt").get(index)).text() == "") {
                    $("#mater-sts-val").text("Chọn tình trạng");
                }
                else {
                    $("#mater-sts-val").text($($(".mater-stt").get(index)).text());
                }
                $("#note").val($($(".mater-note").get(index)).text());

                $(".modal-title").text("Chỉnh sửa thông tin");
                action_type = "edit";
                obj_id = $($(".mater-id").get(index)).text();
                console.log(obj_id);
            });
        })

        // xoá nvl
        $(".btn-delete").each(function(index) {
            $(this).on("click", function() {
                $(".modal-title").text("Xóa nguyên vật liệu");

                action_type = "delete";
                obj_id = $($(".mater-id").get(index)).text();
                console.log(obj_id);
            });
        })

        // dropdown nvl
        $(".mater-opt").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text($(this).text());
            });
        })

        // dropdown tình trạng
        $(".mater-sts-opt").each(function(index) {
            $(this).on("click", function() {
                $("#mater-sts-val").text($(this).text());
            });
        })
    });

    function checkInput() {
        if ($("#quantity-check").val() == "" || $("#mater-sts-val").text() == "Chọn tình trạng") {
            return false;
        }
        return true;
    }
</script>

<script type="text/javascript">
  	$(document).ready(function() {
  		$("#saveData").on("click", function() {
            var $this 		    = $(this);
            var $caption        = $this.html();

            // Ajax config
            $.ajax({
                type: "POST",
                url: '../controllers/C_CT_PhieuKiem.php',
                data: {
                    action: action_type,
                    pk_id: $(".pk-id").text(),
                    mater_name: $("#mater-val").text(),
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
                    $this.attr('disabled', false).html($caption);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
  		});

        $("#saveEditData").on("click", function() {
            if (checkInput()) {
                var $this 		    = $(this);
                var $caption        = $this.html();

                // Ajax config
                $.ajax({
                    type: "POST",
                    url: '../controllers/C_CT_PhieuKiem.php',
                    data: {
                        action: action_type,
                        pk_id: $(".pk-id").text(),
                        mater_id: obj_id,
                        mater_name: $("#mater-val").text(),
                        quantity_ck: $("#quantity-check").val(),
                        note: $("#note").val(),
                        status: $("#mater-sts-val").text()
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
                                'Thông tin đã được chỉnh sửa',
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
                //alert("Vui lòng kiểm tra lại dữ liệu!");
                Swal.fire(
                        'Thất bại!',
                        'Vui lòng kiểm tra lại dữ liệu!',
                        'error'
                )
            }
  		});

        $("#saveDeleteData").on("click", function() {
            var $this 		    = $(this);
            var $caption        = $this.html();

            // Ajax config
            $.ajax({
                type: "POST",
                url: '../controllers/C_CT_PhieuKiem.php',
                data: {
                    action: action_type,
                    pk_id: $(".pk-id").text(),
                    mater_id: obj_id,
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
                    $this.attr('disabled', false).html($caption);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
  		});
  	});
</script>