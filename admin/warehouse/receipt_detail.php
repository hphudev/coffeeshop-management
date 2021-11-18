<?php
include '../models/M_DonViTinh.php';
include '../models/M_NhaCungCap.php';
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
                        <h4 class="card-title">Chi tiết phiếu nhập <strong class="pn-id"><?php echo $PhieuNhap->get_MaPN() ?></strong></h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <div class="detail-information">
                        <p class="pd-8 col-lg-6 col-xl-6">Nhân viên nhập: <strong><?php echo getTenNV($NhanVienList, $PhieuNhap->get_MaNVNhap()) ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Tên người giao: <strong><?php echo $PhieuNhap->get_TenNguoiGiao() ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Nhà cung cấp: <strong><?php echo getTenNCC($NhaCungCapList, $PhieuNhap->get_MaNCC()) ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6 money">Tổng tiền: <strong><?php echo $PhieuNhap->get_TongTien() ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6 money">Tiền thanh toán: <strong><?php echo $PhieuNhap->get_TienThanhToan() ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6 money">Tiền nợ: <strong><?php echo $PhieuNhap->get_TienNo() ?></strong></p>
                        <p class="pd-8 col-lg-6 col-xl-6">Ghi chú: <strong><?php echo $PhieuNhap->get_GhiChu() ?></strong></p>
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
                                <?php
                                if ($CTPhieuNhap) {
                                    if (count($CTPhieuNhap) > 0) {
                                        // output data of each row
                                        for ($i = 0; $i < count($CTPhieuNhap); $i++)
                                        {
                                            $NguyenVatLieu = $ModelNguyenVatLieu->get_NguyenVatLieuDetails($CTPhieuNhap[$i]->get_MaNVL());
                                            echo "<tr role='row' class='odd'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center mater-id'>" . $CTPhieuNhap[$i]->get_MaNVL() . "</td>";
                                            echo "<td class='text-center mater-name'>" . $NguyenVatLieu->get_TenNVL() . "</td>";
                                            echo "<td class='text-center'>" . getTenDVT($DonViTinhList, $NguyenVatLieu->get_MaDVT()) . "</td>";
                                            echo "<td class='text-center mater-quantity'>" . $CTPhieuNhap[$i]->get_SoLuong() . "</td>";
                                            echo "<td class='text-center mater-unitprice'>" . $CTPhieuNhap[$i]->get_DonGiaNhap() . "</td>";
                                            echo '<td class="td-actions text-center">
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
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  id="drdwn">
                                <?php
                                if ($NVLList && count($NVLList) > 0) {
                                    for ($i = 0; $i < count($NVLList); $i++) {
                                        if ($NVLList[$i]->get_MaNhaCungCap() == $PhieuNhap->get_MaNCC()) {
                                            echo "<p class='dropdown-item mater-opt'>" . $NVLList[$i]->get_TenNVL(). "</p>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Số lượng: </p>
                        <input id="quantity-val" type="number" class="form-control input-value" placeholder="Số lượng">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Đơn giá nhập: </p>
                        <input id="unitprice-val" type="number" class="form-control input-value" placeholder="Đơn giá nhập">
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


        // add phiếu nhập
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text("Tên nguyên vật liệu");
                $("#quantity-val").val("");
                $("#unitprice-val").val("");

                $(".modal-title").text("Thêm nguyên vật liệu");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phiếu nhập
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text($($(".mater-name").get(index)).text());
                $("#quantity-val").val($($(".mater-quantity").get(index)).text());
                $("#unitprice-val").val($($(".mater-unitprice").get(index)).text());

                $(".modal-title").text("Chỉnh sửa nguyên vật liệu");
                action_type = "edit";
                obj_id = $($(".mater-id").get(index)).text();
                console.log(obj_id);
            });
        })

        // dropdown nvl
        $(".mater-opt").each(function(index) {
            $(this).on("click", function() {
                if (action_type != "edit") {
                    $("#mater-val").text($(this).text());
                }
            });
        })
    });

    $.fn.digits = function() { 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        });
    }

    $(".money").digits();

    function checkInput() {
        if ($("#mater-val").text() == "Tên nguyên vật liệu" || $("#quantity-val").val() == "" ||
            $("#unitprice-val").val() == "") {
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
                    url: '../controllers/C_CT_PhieuNhap.php',
                    data: {
                        action: action_type,
                        pn_id: $(".pn-id").text(),
                        mater_id: obj_id,
                        mater_name: $("#mater-val").text(),
                        quantity: $("#quantity-val").val(),
                        unitprice: $("#unitprice-val").val()
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