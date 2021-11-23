<?php
include '../models/M_DonViTinh.php';
include '../models/M_NhanVien.php';

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
        align-items: center;
        justify-content: flex-end;
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
        <!-- chi tiết phiếu nhập -->
        <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                        <h4 class="card-title">Chi tiết phiếu xuất <strong class="px-id"><?php echo $PhieuXuat->get_MaPX() ?></strong></h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <div class="detail-information">
                        <p class="pd-8 col-lg-6 col-xl-6">Nhân viên xuất: <strong><?php echo getTenNV($NhanVienList, $PhieuXuat->get_MaNVXuat()) ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Nhân viên nhận: <strong><?php echo getTenNV($NhanVienList, $PhieuXuat->get_MaNVNhan()) ?></strong></p>
                        <p class="pd-8 col-lg-12 col-xl-12">Ghi chú: <strong><?php echo $PhieuXuat->get_GhiChu() ?></strong></p>
                    </div>

                    <button class="btn btn-info btn-add" data-toggle="modal" data-target="#myModal">
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
                                    <th class='text-center text-info'>Số lượng</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã NVL</th>
                                    <th class='text-center'>Tên nguyên vật liệu</th>
                                    <th class='text-center'>Đơn vị tính</th>
                                    <th class='text-center'>Số lượng</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($CTPhieuXuat) {
                                    if (count($CTPhieuXuat) > 0) {
                                        // output data of each row
                                        for ($i = 0; $i < count($CTPhieuXuat); $i++)
                                        {
                                            $NguyenVatLieu = $ModelNguyenVatLieu->get_NguyenVatLieuDetails($CTPhieuXuat[$i]->get_MaNVL());
                                            echo "<tr role='row' class='odd'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center mater-id'>" . $CTPhieuXuat[$i]->get_MaNVL() . "</td>";
                                            echo "<td class='text-center mater-name'>" . $NguyenVatLieu->get_TenNVL() . "</td>";
                                            echo "<td class='text-center'>" . getTenDVT($DonViTinhList, $NguyenVatLieu->get_MaDVT()) . "</td>";
                                            echo "<td class='text-center mater-quantity'>" . $CTPhieuXuat[$i]->get_SoLuong() . "</td>";
                                            echo '<td class="td-actions text-center">
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-edit" data-target="#myModal" data-toggle="modal">
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

<!-- Add/ edit modal -->
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
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  id="drdwn">
                                <?php
                                if ($NVLList && count($NVLList) > 0) {
                                    for ($i = 0; $i < count($NVLList); $i++) {
                                        echo "<p class='dropdown-item mater-opt'>" . $NVLList[$i]->get_TenNVL(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng tồn: </p>
                        <input disabled id="quantity-stock" type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng xuất: </p>
                        <input id="quantity-val" type="number" class="form-control input-value" placeholder="Số lượng">
                    </div>
                </div>

                <div class="form-group bmd-form-group d-none d-sm-none d-md-none d-lg-none d-xl-none">
                    <div class="fields-group align-items-center">
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="quantity-data">12</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  id="drdwn">
                                <?php
                                if ($NVLList && count($NVLList) > 0) {
                                    for ($i = 0; $i < count($NVLList); $i++) {
                                        echo "<p class='dropdown-item quantity-opt'>" . $NVLList[$i]->get_SoLuongTon(). "</p>";
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
            <p class="text-left">Bạn có chắc muốn xóa nguyên vật liệu này khỏi phiếu xuất? </p>
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
                $("#mater-val").text("Tên nguyên vật liệu");
                $("#quantity-val").val("");
                $("#quantity-stock").val("");

                $(".modal-title").text("Thêm nguyên vật liệu");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phiếu xuất
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text($($(".mater-name").get(index)).text());
                getMaterStockQuantity();
                $("#quantity-val").val($($(".mater-quantity").get(index)).text());
                $("#unitprice-val").val($($(".mater-unitprice").get(index)).text());

                $(".modal-title").text("Chỉnh sửa nguyên vật liệu");
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
                quantity_delete = $($(".mater-quantity").get(index)).text();
                console.log(obj_id);
            });
        })

        // dropdown nvl
        $(".mater-opt").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text($(this).text());
                $("#quantity-stock").val($($(".quantity-opt").get(index)).text());
            });
        })
    });

    function getMaterStockQuantity() {
        $(".mater-opt").each(function(index) {
            if ($(this).text() == $("#mater-val").text()) {
                $("#quantity-stock").val($($(".quantity-opt").get(index)).text());
            }
        })
    }

    function checkInput() {
        if ($("#mater-val").text() == "Tên nguyên vật liệu" || $("#quantity-val").val() == "") {
            return false;
        }
        else {
            if (!checkValidQuantity()) {
                return false;
            }
            return true;
        }
        return true;
    }

    function checkValidQuantity() {
        if (parseInt($("#quantity-val").val()) > parseInt($("#quantity-stock").val()) ||
            parseInt($("#quantity-val").val()) < 1 || parseInt($("#quantity-stock").val()) == 0) {
                console.log($("#quantity-val").val());
                console.log($("#quantity-stock").val());
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
                    url: '../controllers/C_CT_PhieuXuat.php',
                    data: {
                        action: action_type,
                        px_id: $(".px-id").text(),
                        mater_id: obj_id,
                        mater_name: $("#mater-val").text(),
                        quantity: $("#quantity-val").val(),
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
                if (!checkValidQuantity()) {
                    Swal.fire(
                        'Thất bại!',
                        'Có vấn đề với số lượng!',
                        'error'
                    )
                    // $(".alert").addClass("open");
                }
                else {
                    Swal.fire(
                        'Thất bại!',
                        'Vui lòng nhập đủ dữ liệu!',
                        'error'
                    )
                }
            }
  		});

        $("#saveDeleteData").on("click", function() {
            var $this 		    = $(this);
            var $caption        = $this.html();

            // Ajax config
            $.ajax({
                type: "POST",
                url: '../controllers/C_CT_PhieuXuat.php',
                data: {
                    action: action_type,
                    px_id: $(".px-id").text(),
                    mater_id: obj_id,
                    quantity: quantity_delete,
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
  		});
  	});
</script>