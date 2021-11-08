<?php
include '../models/M_NhanVien.php';

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
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO / PHIẾU KIỂM</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-material">Nguyên vật liệu</div>
            <div class="btn btn-receipt">Nhập kho</div>
            <div class="btn btn-export">Xuất kho</div>
            <div class="btn btn-success">Kiểm kho</div>
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
                        <h4 class="card-title">Phiếu kiểm</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm phiếu kiểm
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-success'>STT</th>
                                    <th class='text-center text-success'>Mã PK</th>
                                    <th class='text-center text-success'>Ngày lập</th>
                                    <th class='text-center text-success'>Nhân viên kiểm</th>
                                    <th class='text-center text-success'>Nhân viên phụ kiểm</th>
                                    <th class='text-center text-success'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã PK</th>
                                    <th class='text-center'>Ngày lập</th>
                                    <th class='text-center'>Nhân viên kiểm</th>
                                    <th class='text-center'>Nhân viên phụ kiểm</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php
                                if ($PhieuKiemList)
                                {
                                    if (count($PhieuKiemList) > 0) {
                                        // output data of each row
                                        for ($i = 0; $i < count($PhieuKiemList); $i++)
                                        {
                                            echo "<tr role='row' class='odd'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center pk-id'>" . $PhieuKiemList[$i]->get_MaPK() . "</td>";
                                            echo "<td class='text-center'>" . $PhieuKiemList[$i]->get_ThoiGian() . "</td>";
                                            echo "<td class='text-center main-staff'>" . getTenNV($NhanVienList, $PhieuKiemList[$i]->get_MaNVKiem()) . "</td>";
                                            echo "<td class='text-center sup-staff'>" . getTenNV($NhanVienList, $PhieuKiemList[$i]->get_MaNVPK()) . "</td>";
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

        <!-- hidden notes -->
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-none">
            <?php
            if ($PhieuKiemList)
            {
                if (count($PhieuKiemList) > 0) {
                    // output data of each row
                    for ($i = 0; $i < count($PhieuKiemList); $i++)
                    {
                        echo "<p class='note'>" . $PhieuKiemList[$i]->get_GhiChu() . "</p>";
                    }
                }
            }    
            ?>
        </div>
    </div>
</div>

<!-- Add phiếu nhập modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Thêm phiếu kiểm</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nhân viên kiểm: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="main-staff-val">Chọn nhân viên</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhanVienList && count($NhanVienList) > 0) {
                                    for ($i = 0; $i < count($NhanVienList); $i++) {
                                        echo "<p class='dropdown-item main-staff-opt'>" . $NhanVienList[$i]->get_Ten(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nhân viên phụ kiểm: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="sup-staff-val">Chọn nhân viên</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhanVienList && count($NhanVienList) > 0) {
                                    for ($i = 0; $i < count($NhanVienList); $i++) {
                                        echo "<p class='dropdown-item sup-staff-opt'>" . $NhanVienList[$i]->get_Ten(). "</p>";
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
                        <input id="note-val" type="text" class="form-control input-value" placeholder="Nhập ghi chú">
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

        //mở rộng
        $(".btn-expand").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&expand";
        });

        //nhập kho
        $(".btn-receipt").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&receipt";
        });

        //nvl
        $(".btn-export").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&export";
        });

        //nvl
        $(".btn-material").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse";
        });

        //Init dropdown in modal
        // dropdown nhân viên
        $(".main-staff-opt").each(function(index) {
            $(this).on("click", function() {
                $("#main-staff-val").text($($(".main-staff-opt").get(index)).text());
            });
        });

        // dropdown nhân viên
        $(".sup-staff-opt").each(function(index) {
            $(this).on("click", function() {
                $("#sup-staff-val").text($($(".sup-staff-opt").get(index)).text());
            });
        });

         //Add và edit phiếu xuất
        // view phiếu xuất detail
        $(".btn-view-detail").each(function(index) {
            $(this).on("click", function() {
                window.location.href = "../admin/index.php?page=werehouse&report&id=" + $($(".pk-id").get(index)).text();
            });
        })

        // add phiếu xuất
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#main-staff-val").text("Chọn nhân viên");
                $("#sup-staff-val").text("Chọn nhân viên");
                $("#note-val").val("");

                $(".modal-title").text("Thêm phiếu kiểm");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phiếu xuất
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                $("#main-staff-val").text($($(".main-staff").get(index)).text());
                $("#sup-staff-val").text($($(".sup-staff").get(index)).text());
                $("#note-val").val($($(".note").get(index)).text());

                $(".modal-title").text("Chỉnh sửa phiếu kiểm");
                action_type = "edit";
                obj_id = $($(".pk-id").get(index)).text();
            });
        })
    });

    function checkInput() {
        if ($("#main-staff-val").text() == "Chọn nhân viên" || $("#sup-staff-val").text() == "Chọn nhân viên"
            || $("#note-val").val() == "") {
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
                    url: '../controllers/C_PhieuKiem.php',
                    data: {
                        action: action_type,
                        pk_id: obj_id,
                        main_staff_name: $("#main-staff-val").text(),
                        sup_staff_name: $("#sup-staff-val").text(),
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