<?php
include '../models/M_DonViTinh.php';
include '../models/M_LoaiNguyenVatLieu.php';
include '../models/M_NhaCungCap.php';
include '../models/M_TinhTrang.php';

// $ModelDonViTinh = new Model_DonViTinh();
// $DonViTinhList = $ModelDonViTinh->get_AllDonViTinh();

// function getTenDVT($DonViTinhList, $maDVT)
// {
//     for ($i = 0; $i < count($DonViTinhList); $i++) {
//         if ($DonViTinhList[$i]->get_MaDVT() == $maDVT) {
//             return $DonViTinhList[$i]->get_TenDVT();
//         }
//     }
// }

// $ModelLoaiNguyenVatLieu = new Model_LoaiNguyenVatLieu();
// $LoaiNguyenVatLieuList = $ModelLoaiNguyenVatLieu->get_AllLoaiNguyenVatLieu();

// function getTenLoaiNVL($LoaiNguyenVatLieuList, $maLNVL)
// {
//     for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
//         if ($LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() == $maLNVL) {
//             return $LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL();
//         }
//     }
// }

// $ModelNhaCungCap = new Model_NhaCungCap();
// $NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();

// function getTenNCC($NhaCungCapList, $maNCC)
// {
//     for ($i = 0; $i < count($NhaCungCapList); $i++) {
//         if ($NhaCungCapList[$i]->get_MaNCC() == $maNCC) {
//             return $NhaCungCapList[$i]->get_TenNCC();
//         }
//     }
// }

// $ModelTinhTrang = new Model_TinhTrang();
// $TinhTrangList = $ModelTinhTrang->get_AllTinhTrang();

// function getTenTT($TinhTrangList, $maTT)
// {
//     for ($i = 0; $i < count($TinhTrangList); $i++) {
//         if ($TinhTrangList[$i]->get_MaTinhTrang() == $maTT) {
//             return $TinhTrangList[$i]->get_TenTinhTrang();
//         }
//     }
// }
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

    .content-in-card {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .sections-container {
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
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

    .scroll {
        overflow: scroll;
    }

    /* mobile */
    @media (max-width: 739px) {
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

<div class="container">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3><strong>KHO / MỞ RỘNG</strong></h3>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <!-- đơn vị tính -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h4 class="card-title">Đơn vị tính</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-info btn-add-material" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm NVL
                    </button>

                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>Mã NVL</th>
                                    <th class='text-center text-info'>Tên nguyên vật liệu</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã NVL</th>
                                    <th class='text-center'>Tên nguyên vật liệu</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- loại nguyên vật liệu -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h4 class="card-title">Đơn vị tính</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-info btn-add-material" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm NVL
                    </button>

                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>Mã NVL</th>
                                    <th class='text-center text-info'>Tên nguyên vật liệu</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã NVL</th>
                                    <th class='text-center'>Tên nguyên vật liệu</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- nhà cung cấp -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h4 class="card-title">Đơn vị tính</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-info btn-add-material" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm NVL
                    </button>

                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>Mã NVL</th>
                                    <th class='text-center text-info'>Tên nguyên vật liệu</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã NVL</th>
                                    <th class='text-center'>Tên nguyên vật liệu</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add material modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><strong>Thêm nguyên vật liệu</strong></h5>
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
                                for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
                                    echo "<p class='dropdown-item mater-type-opt'>" . $LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL(). "</p>";
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
                                for ($i = 0; $i < count($DonViTinhList); $i++) {
                                    echo "<p class='dropdown-item mater-unit-opt'>" . $DonViTinhList[$i]->get_TenDVT(). "</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng: </p>
                        <input id="material-quantity-val" type="number" class="form-control input-value" placeholder="Nhập số lượng">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Đơn giá nhập: </p>
                        <input id="material-unitprice-val" type="number" class="form-control input-value" placeholder="Đơn giá nhập">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Nhà cung cấp: </p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="material-supplier-val">Chọn NCC</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                for ($i = 0; $i < count($NhaCungCapList); $i++) {
                                    echo "<p class='dropdown-item mater-supplier-opt'>" . $NhaCungCapList[$i]->get_TenNCC(). "</p>";
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
                                for ($i = 0; $i < count($TinhTrangList); $i++) {
                                    echo "<p class='dropdown-item mater-status-opt'>" . $TinhTrangList[$i]->get_TenTinhTrang(). "</p>";
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

<!-- <script>
    var submit_type = "";
    var nvl_id = "";
    $(document).ready(function() {
        //init datatables
        $('#datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        //add nvl
        $(".btn-add-material").on("click", function() {
            submit_type = "add";
            $(".modal-title").text("Thêm nguyên vật liệu");
            $("#material-name-val").val("");
            $("#material-type-val").text("Chọn loại");
            $("#material-unit-val").text("Chọn ĐVT");
            $("#material-quantity-val").val("");
            $("#material-unitprice-val").val("");
            $("#material-supplier-val").text("Chọn NCC");
            $("#material-status-val").text("Chọn tình trạng");
        });

        //edit thông tin nvl
        $(".btn-edit-data").each(function(index) {
            $(this).on("click", function() {
                nvl_id = $($(".material-id").get(index)).text();
                console.log(nvl_id);

                submit_type = "edit";
                $(".modal-title").text("Chỉnh sửa nguyên vật liệu");
                $("#material-name-val").val($($(".material-name").get(index)).text());
                $("#material-type-val").text($($(".material-type").get(index)).text());
                $("#material-unit-val").text($($(".material-unit").get(index)).text());
                $("#material-quantity-val").val($($(".material-quantity").get(index)).text());
                $("#material-unitprice-val").val($($(".material-unitprice").get(index)).text());
                $("#material-supplier-val").text($($(".material-supplier").get(index)).text());
                $("#material-status-val").text($($(".material-status").get(index)).text());
            });
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

    function checkInput() {
        if ($("#material-name-val").val() == "" ||  $("#material-type-val").text() == "Chọn loại" ||
            $("#material-unit-val").text() == "Chọn ĐVT" ||
            $("#material-quantity-val").val() == "" ||
            $("#material-unitprice-val").val() == "" || 
            $("#material-supplier-val").text() == "Chọn NCC" ||
            $("#material-status-val").text() == "Chọn tình trạng") {
                console.log($("#material-name-val").val());
                console.log($("#material-type-val").text());
                console.log($("#material-unit-val").text());
                console.log($("#material-quantity-val").val());
                console.log($("#material-unitprice-val").val());
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
                    url: "../models/M_NguyenVatLieu.php",
                    data: {
                        action: submit_type,
                        id: nvl_id,
                        name: $("#material-name-val").val(),
                        type: $("#material-type-val").text(),
                        unit: $("#material-unit-val").text(),
                        quantity: $("#material-quantity-val").val(),
                        unitprice: $("#material-unitprice-val").val(),
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
                            if(!alert($(".modal-title").text() + ' thành công!')) {
                                window.location.reload();
                            }
                        }
                        else {
                            alert('Thao tác thất bại!');
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
                alert('Vui lòng nhập đủ dữ liệu!');
                // $(".alert").addClass("open");
            }
  		});
  	});
</script> -->