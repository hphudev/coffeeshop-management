<?php
include '../models/M_NhanVien.php';
include '../models/M_NhaCungCap.php';

$ModelNhanVien = new Model_NhanVien();
$NhanVienList = $ModelNhanVien->get_AllNhanVien();
function getTenNV($NhanVienList, $maNV)
{
    for ($i = 0; $i < count($NhanVienList); $i++) {
        if ($NhanVienList[$i]->get_MaNV() == $maNV) {
            return $NhanVienList[$i]->get_HoTenDem() . " " . $NhanVienList[$i]->get_Ten();
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

<div class="container-fluid">
    <div class="flex-sp-bet below-menu-icon col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO / PHI???U NH???P</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-material">Nguy??n v???t li???u</div>
            <div class="btn btn-success">Nh???p kho</div>
            <div class="btn btn-export">Xu???t kho</div>
            <div class="btn btn-report">Ki???m kho</div>
            <div class="btn btn-expand">M??? r???ng</div>
        </div>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <!-- phi???u nh???p -->
        <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                    <div class="card-text">
                        <h4 class="card-title">Phi???u nh???p</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m phi???u nh???p
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-success'>STT</th>
                                    <th class='text-center text-success'>M?? PN</th>
                                    <th class='text-center text-success'>Ng??y l???p</th>
                                    <th class='text-center text-success'>Nh?? cung c???p</th>
                                    <th class='text-center text-success'>T???ng ti???n</th>
                                    <th class='text-center text-success'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>M?? PN</th>
                                    <th class='text-center'>Ng??y l???p</th>
                                    <th class='text-center'>Nh?? cung c???p</th>
                                    <th class='text-center'>T???ng ti???n</th>
                                    <th class='text-center'>Thao t??c</th>
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
                                            echo "<tr role='row' class='odd' id='" . $PhieuNhapList[$i]->get_MaPN() . "'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center pn-id'>" . $PhieuNhapList[$i]->get_MaPN() . "</td>";
                                            echo "<td class='text-center'>" . $PhieuNhapList[$i]->get_NgayLap() . "</td>";
                                            echo "<td class='text-center supplier'>" . getTenNCC($NhaCungCapList, $PhieuNhapList[$i]->get_MaNCC()) . "</td>";
                                            echo "<td class='text-center total-amount money'>" . $PhieuNhapList[$i]->get_TongTien() . "</td>";
                                            echo '<td class="td-actions text-center">
                                                    <button type="button" id="' . $PhieuNhapList[$i]->get_MaPN() . '" rel="tooltip" class="btn btn-info btn-view-detail" data-target="" data-toggle="modal">
                                                        <i class="material-icons">info</i>
                                                    </button>
                                                    <button type="button" id="' . $PhieuNhapList[$i]->get_MaPN() . '" rel="tooltip" class="btn btn-success btn-edit" data-target="#myModal" data-toggle="modal">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" id="' . $PhieuNhapList[$i]->get_MaPN() . '" rel="tooltip" class="btn btn-danger btn-delete">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>';
                                            echo "</tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo "D??? li???u tr???ng!";
                                    }
                                }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- hidden table l??u th??ng tin phi???u nh???p -->
        <table class="d-none d-sm-none d-md-none d-lg-none d-xl-none">
            <tbody>
                <?php
                if ($PhieuNhapList)
                {
                    if (count($PhieuNhapList) > 0) {
                        // output data of each row
                        for ($i = 0; $i < count($PhieuNhapList); $i++)
                        {
                            echo "<tr class='hidden-info' id='". $PhieuNhapList[$i]->get_MaPN() ."'>";
                            echo "<td class='staff-name-src'>" . getTenNV($NhanVienList, $PhieuNhapList[$i]->get_MaNVNhap()) . "</td>";
                            echo "<td class='shipper-name-src'>" . $PhieuNhapList[$i]->get_TenNguoiGiao() . "</td>";
                            echo "<td class='total-amount'>" . $PhieuNhapList[$i]->get_TongTien() . "</td>";
                            echo "<td class='pay-amount-src'>" . $PhieuNhapList[$i]->get_TienThanhToan() . "</td>";
                            echo "<td class='debt-amount-src'>" . $PhieuNhapList[$i]->get_TienNo() . "</td>";
                            echo "<td class='note-src'>" . $PhieuNhapList[$i]->get_GhiChu() . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add phi???u nh???p modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Th??m phi???u nh???p</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nh??n vi??n nh???p: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="staff-val">Ch???n nh??n vi??n</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhanVienList && count($NhanVienList) > 0) {
                                    for ($i = 0; $i < count($NhanVienList); $i++) {
                                        echo "<p class='dropdown-item staff-opt'>" . $NhanVienList[$i]->get_HoTenDem() . " " . $NhanVienList[$i]->get_Ten(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nh?? cung c???p: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="supplier-val">Ch???n NCC</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhaCungCapList && count($NhaCungCapList) > 0) {
                                    for ($i = 0; $i < count($NhaCungCapList); $i++) {
                                        echo "<p class='dropdown-item supplier-opt'>" . $NhaCungCapList[$i]->get_TenNCC(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">T??n ng?????i giao: </p>
                        <input id="shipper-val" type="text" class="form-control input-value" placeholder="T??n ng?????i giao">
                    </div>
                </div>

                <!-- <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">T???ng ti???n: </p>
                        <input id="total-amount-val" disabled type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div> -->

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ti???n thanh to??n: </p>
                        <input id="pay-amount-val" type="number" class="form-control input-value" placeholder="Ti???n thanh to??n">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ti???n n???: </p>
                        <input id="debt-amount-val" type="number" class="form-control input-value" placeholder="Ti???n n???">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">Ghi ch??: </p>
                        <input id="note-val" type="text" class="form-control input-value" placeholder="Ghi ch??">
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">????ng</button>
            <button id="saveData" type="submit" class="btn btn-primary">L??u</button>
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

        //Buttons c??c m???c c???a kho
        //nguy??n v???t li???u
        $(".btn-material").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse";
        });

        //m??? r???ng
        $(".btn-expand").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&expand";
        });

        //xu???t kho
        $(".btn-export").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&export";
        });

        //ki???m kho
        $(".btn-report").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&report";
        });

        //Add v?? edit phi???u nh???p
        // view phi???u nh???p detail
        $(".btn-view-detail").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                window.location.href = "../admin/index.php?page=werehouse&receipt&id=" + $row.attr('id');
            });
        })

        // add phi???u nh???p
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#staff-val").text("Ch???n nh??n vi??n");
                $("#supplier-val").text("Ch???n NCC");
                $("#shipper-val").val("");
                $("#total-amount-val").val("");
                $("#pay-amount-val").val("");
                $("#debt-amount-val").val("");
                $("#note-val").val("");

                $(".modal-title").text("Th??m phi???u nh???p");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phi???u nh???p
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                action_type = "edit";
                obj_id = $row.attr('id');
                var hidden_index = getHiddenRowIndex();

                $("#staff-val").text($($(".staff-name-src").get(hidden_index)).text());
                $("#supplier-val").text($row.find(".supplier").text());
                $("#shipper-val").val($($(".shipper-name-src").get(hidden_index)).text());
                $("#total-amount-val").val($($(".total-amount").get(hidden_index)).text());
                $("#pay-amount-val").val($($(".pay-amount-src").get(hidden_index)).text());
                $("#debt-amount-val").val($($(".debt-amount-src").get(hidden_index)).text());
                $("#note-val").val($($(".note-src").get(hidden_index)).text());

                $(".modal-title").text("Ch???nh s???a phi???u nh???p");
            });
        })

        //N??t x??a phi???u nh???p
        $(".btn-delete").each(function(index) {
            $(this).on("click", function() {
                Swal.fire({
                    title: 'X??a phi???u nh???p',
                    text: 'Thao t??c n??y s??? x??a phi???u nh???p v?? kh??ng th??? ho??n t??c. B???n v???n mu???n ti???p t???c?',
                    showDenyButton: true,
                    confirmButtonText: 'H???y',
                    denyButtonText: `X??a`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                    } else if (result.isDenied) {
                        var $row = $(this).closest('tr');
                        obj_id = $row.attr('id');
                        action_type = "delete";
                        
                        // Ajax config
                        $.ajax({
                            type: "POST",
                            url: '../controllers/C_PhieuNhap.php',
                            data: {
                                action: action_type,
                                pn_id: obj_id,
                            },
                            beforeSend: function () {
                                
                            },
                            success: function (response) {
                                var jsonData = JSON.parse(response);

                                if (jsonData.success == "1")
                                {
                                    Swal.fire(
                                        'Th??nh c??ng!',
                                        '???? x??a phi???u nh???p',
                                        'success'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
                                            // location.reload();
                                            $row.remove();
                                        }
                                    })
                                }
                                else {
                                    Swal.fire(
                                        'Th???t b???i!',
                                        'Phi???u nh???p kh??ng r???ng. Vui l??ng ki???m tra l???i!',
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

        //Init dropdown in modal
        // dropdown nh??n vi??n
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

    function getHiddenRowIndex() {
        for (let i = 0; i < $(".hidden-info").length; i++)
        {
            if ($($(".hidden-info").get(i)).attr('id') == obj_id) {
                return i;
            }
        }
        return -1;
    }

    function getRowIndex() {
        for (let i = 0; i < $(".btn-edit").length; i++)
        {
            if ($($(".btn-edit").get(i)).attr('id') == obj_id) {
                return i;
            }
        }
        return -1;
    }

    function updateRowData() {
        var $row = $($(".btn-edit").get(getRowIndex())).closest('tr');
        var $hidden_row = $($(".hidden-info").get(getHiddenRowIndex()));

        $row.find('.supplier').text($("#supplier-val").text());
        $hidden_row.find('.staff-name-src').text($("#staff-val").text());
        $hidden_row.find('.shipper-name-src').text($("#shipper-val").val());
        $hidden_row.find('.pay-amount-src').text($("#pay-amount-val").val());
        $hidden_row.find('.debt-amount-src').text($("#debt-amount-val").val());
        $hidden_row.find('.note-src').text($("#note-val").val());
    }

    $.fn.digits = function() { 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        });
    }

    $(".money").digits();

    function checkInput() {
        if ($("#staff-val").text() == "Ch???n nh??n vi??n" || $("#supplier-val").text() == "Ch???n NCC" ||
            $("#shipper-val").val() == "" || $("#pay-amount-val").val() == "" || parseInt($("#pay-amount-val").val()) < 0 ||
            $("#debt-amount-val").val() == "" || $("#note-val").val() == "" || parseInt($("#debt-amount-val").val()) < 0) {
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
                        $this.attr('disabled', true).html("??ang x??? l??...");
                    },
                    success: function (response) {
                        console.log(response);
                        var jsonData = JSON.parse(response);
    
                        if (jsonData.success == "1")
                        {
                            Swal.fire(
                                'Th??nh c??ng!',
                                'Thao t??c th??nh c??ng!',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    if (action_type == "edit") {
                                        $('#myModal').modal('hide');
                                        updateRowData();
                                    }
                                    else location.reload();
                                }
                            })
                        }
                        else {
                            Swal.fire(
                                'Th???t b???i!',
                                'Vui l??ng ki???m tra l???i!',
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
                    'Th???t b???i!',
                    'Vui l??ng nh???p ????? d??? li???u!',
                    'error'
                )
                // $(".alert").addClass("open");
            }
  		});
  	});
</script>