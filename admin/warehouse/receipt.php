<?php
include '../models/M_NhanVien.php';
include '../models/M_NhaCungCap.php';

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

<div class="container">
    <div class="flex-sp-bet below-menu-icon col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO / PHIẾU NHẬP</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-material">Nguyên vật liệu</div>
            <div class="btn btn-success">Nhập kho</div>
            <div class="btn btn-export">Xuất kho</div>
            <div class="btn btn-report">Kiểm kho</div>
            <div class="btn btn-expand">Mở rộng</div>
        </div>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <!-- phiếu nhập -->
        <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                    <div class="card-text">
                        <h4 class="card-title">Phiếu nhập</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm phiếu nhập
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-success'>STT</th>
                                    <th class='text-center text-success'>Mã PN</th>
                                    <th class='text-center text-success'>Ngày lập</th>
                                    <th class='text-center text-success'>Nhà cung cấp</th>
                                    <th class='text-center text-success'>Tổng tiền</th>
                                    <th class='text-center text-success'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã PN</th>
                                    <th class='text-center'>Ngày lập</th>
                                    <th class='text-center'>Nhà cung cấp</th>
                                    <th class='text-center'>Tổng tiền</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php
                               if ($PhieuNhapList)
                               {
                                    if (count($PhieuNhapList) > 0) {
                                        // output data of each row
                                        for ($i = 0; $i < count($PhieuNhapList); $i++)
                                        {
                                            echo "<tr role='row' class='odd'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center pn-id'>" . $PhieuNhapList[$i]->get_MaPN() . "</td>";
                                            echo "<td class='text-center'>" . $PhieuNhapList[$i]->get_NgayLap() . "</td>";
                                            echo "<td class='text-center supplier'>" . getTenNCC($NhaCungCapList, $PhieuNhapList[$i]->get_MaNCC()) . "</td>";
                                            echo "<td class='text-center total-amount'>" . $PhieuNhapList[$i]->get_TongTien() . "</td>";
                                            echo '<td class="td-actions text-center">
                                                    <button type="button" rel="tooltip" class="btn btn-info btn-view-detail" data-target="#myModal" data-toggle="modal">
                                                        <i class="material-icons">info</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-edit" data-target="#myModal" data-toggle="modal">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa">
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

        <!-- chi tiết phiếu nhập -->
        <!-- <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                        <h4 class="card-title">Chi tiết phiếu nhập <strong class="pn-id-view"></strong></h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <div class="detail-information">
                        <p class="pd-8 col-lg-6 col-xl-6">Nhân viên nhập: <strong class="staff-name">Mai Công Danh</strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Tên người giao: <strong class="shipper-name-view">Shipper</strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Nhà cung cấp: <strong class="supplier-name-view">Vinamilk Inc</strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Tổng tiền: <strong class="total-amount-view">8000000</strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Tiền thanh toán: <strong class="pay-amount-view">8000000</strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Tiền nợ: <strong class="debt-amount-view">0</strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Ghi chú: <strong class="note-view">Giao hàng trễ</strong></p>
                    </div>

                    <button class="btn btn-info btn-add-mater-type" data-toggle="modal" data-target="#myModal">
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
                                    <th class='text-center text-info'>Đơn giá</th>
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
                                    <th class='text-center'>Đơn giá</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- hidden table lưu thông tin phiếu nhập -->
        <table class="d-none d-sm-none d-md-none d-lg-none d-xl-none">
            <tbody>
                <?php
                if ($PhieuNhapList)
                {
                    if (count($PhieuNhapList) > 0) {
                        // output data of each row
                        for ($i = 0; $i < count($PhieuNhapList); $i++)
                        {
                            echo "<td class='staff-name-src'>" . getTenNV($NhanVienList, $PhieuNhapList[$i]->get_MaNVNhap()) . "</td>";
                            echo "<td class='shipper-name-src'>" . $PhieuNhapList[$i]->get_TenNguoiGiao() . "</td>";
                            echo "<td class='pay-amount-src'>" . $PhieuNhapList[$i]->get_TienThanhToan() . "</td>";
                            echo "<td class='debt-amount-src'>" . $PhieuNhapList[$i]->get_TienNo() . "</td>";
                            echo "<td class='note-src'>" . $PhieuNhapList[$i]->get_GhiChu() . "</td>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add phiếu nhập modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Thêm phiếu nhập</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nhân viên nhập: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="staff-val">Chọn nhân viên</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                for ($i = 0; $i < count($NhanVienList); $i++) {
                                    echo "<p class='dropdown-item staff-opt'>" . $NhanVienList[$i]->get_Ten(). "</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nhà cung cấp: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="supplier-val">Chọn NCC</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                for ($i = 0; $i < count($NhaCungCapList); $i++) {
                                    echo "<p class='dropdown-item supplier-opt'>" . $NhaCungCapList[$i]->get_TenNCC(). "</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tên người giao: </p>
                        <input id="shipper-val" type="text" class="form-control input-value" placeholder="Tên người giao">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tổng tiền: </p>
                        <input id="total-amount-val" disabled type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tiền thanh toán: </p>
                        <input id="pay-amount-val" type="number" class="form-control input-value" placeholder="Tiền thanh toán">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Tiền nợ: </p>
                        <input id="debt-amount-val" type="number" class="form-control input-value" placeholder="Tiền nợ">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ghi chú: </p>
                        <input id="note-val" type="text" class="form-control input-value" placeholder="Ghi chú">
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
    var action_type = "";
    var obj_id = "";
    $(document).ready(function() {
        //init datatables
        $('.datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        //Buttons các mục của kho
        //nguyên vật liệu
        $(".btn-material").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse";
        });

        //mở rộng
        $(".btn-expand").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&expand";
        });

        //mở rộng
        $(".btn-export").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&export";
        });


        //Add và edit phiếu nhập
        // view phiếu nhập detail
        $(".btn-view-detail").each(function(index) {
            $(this).on("click", function() {
                window.location.href = "../admin/index.php?page=werehouse&receipt&id=" + $($(".pn-id").get(index)).text();
            });
        })

        // add phiếu nhập
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#staff-val").text("Chọn nhân viên");
                $("#supplier-val").text("Chọn NCC");
                $("#shipper-val").val("");
                $("#total-amount-val").val("");
                $("#pay-amount-val").val("");
                $("#debt-amount-val").val("");
                $("#note-val").val("");

                $(".modal-title").text("Thêm phiếu nhập");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phiếu nhập
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                $("#staff-val").text($($(".staff-name-src").get(index)).text());
                $("#supplier-val").text($($(".supplier").get(index)).text());
                $("#shipper-val").val($($(".shipper-name-src").get(index)).text());
                $("#total-amount-val").val($($(".total-amount").get(index)).text());
                $("#pay-amount-val").val($($(".pay-amount-src").get(index)).text());
                $("#debt-amount-val").val($($(".debt-amount-src").get(index)).text());
                $("#note-val").val($($(".note-src").get(index)).text());

                $(".modal-title").text("Chỉnh sửa phiếu nhập");
                action_type = "edit";
                obj_id = $($(".pn-id").get(index)).text();
            });
        })


        //Init dropdown in modal
        // dropdown nhân viên
        $(".staff-opt").each(function(index) {
            $(this).on("click", function() {
                $("#staff-val").text($($(".staff-opt").get(index)).text());
            });
        });

        // dropdown ncc
        $(".supplier-opt").each(function(index) {
            $(this).on("click", function() {
                $("#supplier-val").text($($(".supplier-opt").get(index)).text());
            });
        });
    });

    function checkInput() {
        if ($("#staff-val").text() == "Chọn nhân viên" || $("#supplier-val").text() == "Chọn NCC" ||
            $("#shipper-val").val() == "" || $("#total-amount-val").val() == "" || $("#pay-amount-val").val() == "" ||
            $("#debt-amount-val").val() == "" || $("#note-val").val() == "") {
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
                    url: '../controllers/C_PhieuNhap.php',
                    data: {
                        action: action_type,
                        pn_id: obj_id,
                        staff_name: $("#staff-val").text(),
                        supplier_name: $("#supplier-val").text(),
                        shipper: $("#shipper-val").val(),
                        //total_amount: $("#total-amount-val").val(),
                        pay_amount: $("#pay-amount-val").val(),
                        debt_amount: $("#debt-amount-val").val(),
                        note: $("#note-val").val()
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
</script>