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
            return $NhanVienList[$i]->get_HoTenDem() . " " . $NhanVienList[$i]->get_Ten();
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
        <!-- chi ti???t phi???u ki???m -->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                        <h4 class="card-title">Chi ti???t phi???u ki???m <strong class="pk-id"><?php echo $PhieuKiem->get_MaPK() ?></strong></h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <div class="detail-information" style="align-self: flex-start;">
                        <p class="pd-8 col-lg-12 col-xl-12">Nh??n vi??n ki???m: <strong><?php echo getTenNV($NhanVienList, $PhieuKiem->get_MaNVKiem()) ?></strong></p>
                        <p class="pd-8 col-lg-12 col-xl-12">Nh??n vi??n ph??? ki???m: <strong><?php echo getTenNV($NhanVienList, $PhieuKiem->get_MaNVPK()) ?></strong></p>
                        <p class="pd-8 col-lg-12 col-xl-12">Ghi ch??: <strong><?php echo $PhieuKiem->get_GhiChu() ?></strong></p>
                    </div>

                    <button class="btn btn-info btn-add" style="align-self: flex-end;" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m nguy??n v???t li???u
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>M?? NVL</th>
                                    <th class='text-center text-info'>T??n nguy??n v???t li???u</th>
                                    <th class='text-center text-info'>????n v??? t??nh</th>
                                    <th class='text-center text-info'>SL b??o c??o</th>
                                    <th class='text-center text-info'>SL th???c t???</th>
                                    <th class='text-center text-info'>T??nh tr???ng</th>
                                    <th class='text-center text-info'>Ghi ch??</th>
                                    <th class='text-center text-info'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th class='text-center'>STT</th>
                                    <th class='text-center'>M?? NVL</th>
                                    <th class='text-center'>T??n nguy??n v???t li???u</th>
                                    <th class='text-center'>????n v??? t??nh</th>
                                    <th class='text-center'>SL b??o c??o</th>
                                    <th class='text-center'>SL th???c t???</th>
                                    <th class='text-center'>T??nh tr???ng</th>
                                    <th class='text-center'>Ghi ch??</th>
                                    <th class='text-center'>Thao t??c</th>
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
                                            echo "<tr role='row' class='odd' id='" . $CTPhieuKiem[$i]->get_MaNVL() . "'>";
                                            echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center mater-id'>" . $CTPhieuKiem[$i]->get_MaNVL() . "</td>";
                                            echo "<td class='text-center mater-name'><strong>" . $NguyenVatLieu->get_TenNVL() . "</strong></td>";
                                            echo "<td class='text-center'>" . getTenDVT($DonViTinhList, $NguyenVatLieu->get_MaDVT()) . "</td>";
                                            echo "<td class='text-center mater-quantity-rp'><strong>" . $CTPhieuKiem[$i]->get_SLBaoCao() . "</strong></td>";
                                            echo "<td class='text-center mater-quantity-ck'><strong>" . $CTPhieuKiem[$i]->get_SLThucTe() . "</strong></td>";
                                            echo "<td class='text-center mater-stt'>" . getTenTT($TinhTrangList, $CTPhieuKiem[$i]->get_MaTT()) . "</td>";
                                            echo "<td class='text-center mater-note'>" . $CTPhieuKiem[$i]->get_GhiChu() . "</td>";
                                            echo '<td class="td-actions text-center">
                                                    <button type="button" id="' . $CTPhieuKiem[$i]->get_MaNVL() . '" rel="tooltip" class="btn btn-success btn-edit" data-target="#myEditModal" data-toggle="modal">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" id="' . $CTPhieuKiem[$i]->get_MaNVL() . '" rel="tooltip" class="btn btn-danger btn-delete" data-target="#myDeleteModal" data-toggle="modal">
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
    </div>
</div>

<!-- Add modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Th??m nguy??n v???t li???u</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nguy??n v???t li???u: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="mater-val">Ch???n ng.v???t li???u</span>
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
            <button type="button" class="btn" data-dismiss="modal">????ng</button>
            <button id="saveData" type="submit" class="btn btn-primary">L??u</button>
        </div>
    </div>
  </div>
</div>

<!-- Edit modal -->
<div class="modal modal-width-sm fade" id="myEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Ch???nh s???a th??ng tin</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nguy??n v???t li???u: </p>
                        <div class="dropdown input-value">
                            <p id="mater-val-lb">TEMP</p>  
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">S??? l?????ng b??o c??o: </p>
                        <input disabled id="quantity-report" type="number" class="form-control input-value" placeholder="0">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group align-items-center">
                        <p class="input-label text-left">S??? l?????ng th???c t???: </p>
                        <input id="quantity-check" type="number" class="form-control input-value" placeholder="Nh???p s??? l?????ng">
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">T??nh tr???ng: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="mater-sts-val">Ch???n t??nh tr???ng</span>
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
                        <p class="input-label text-left">Ghi ch??: </p>
                        <input id="note" type="text" class="form-control input-value" placeholder="Nh???p ghi ch??">
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
            <button type="button" class="btn" data-dismiss="modal">????ng</button>
            <button id="saveEditData" type="submit" class="btn btn-primary">L??u</button>
        </div>
    </div>
  </div>
</div>

<!-- delete nvl modal -->
<div class="modal modal-width-sm fade" id="myDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">X??a nguy??n v???t li???u</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <p class="text-left">B???n c?? ch???c mu???n x??a nguy??n v???t li???u n??y kh???i phi???u ki???m? </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">????ng</button>
            <button id="saveDeleteData" type="submit" class="btn btn-primary">X??a</button>
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

        // add phi???u xu???t
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text("Th??m nguy??n v???t li???u");

                $(".modal-title").text("Th??m nguy??n v???t li???u");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phi???u xu???t
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                action_type = "edit";

                $("#mater-val-lb").text($row.find(".mater-name").text());
                $("#quantity-report").val($row.find(".mater-quantity-rp").text());
                $("#quantity-check").val($row.find(".mater-quantity-ck").text());
                if ($row.find(".mater-stt").text() == "") {
                    $("#mater-sts-val").text("Ch???n t??nh tr???ng");
                }
                else {
                    $("#mater-sts-val").text($row.find(".mater-stt").text());
                }
                $("#note").val($row.find(".mater-note").text());

                $(".modal-title").text("Ch???nh s???a th??ng tin");
            });
        })

        // xo?? nvl
        $(".btn-delete").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                $(".modal-title").text("X??a nguy??n v???t li???u");

                action_type = "delete";
            });
        })

        // dropdown nvl
        $(".mater-opt").each(function(index) {
            $(this).on("click", function() {
                $("#mater-val").text($(this).text());
            });
        })

        // dropdown t??nh tr???ng
        $(".mater-sts-opt").each(function(index) {
            $(this).on("click", function() {
                $("#mater-sts-val").text($(this).text());
            });
        })
    });

    function getRowIndex() {
        for (let i = 0; i < $(".btn-edit").length; i++)
        {
            if ($($(".btn-edit").get(i)).attr('id') == obj_id) {
                return i;
            }
        }
        return -1;
    }

    function removeRow() {
        var $row = $($(".btn-edit").get(getRowIndex())).closest('tr');
        $row.remove();
    }

    function updateRowData() {
        var $row = $($(".btn-edit").get(getRowIndex())).closest('tr');

        $row.find('.mater-quantity-ck').text($("#quantity-check").val());
        if ($("#mater-sts-val").text() != "Ch???n t??nh tr???ng")
            $row.find(".mater-stt").text($("#mater-sts-val").text());
        $row.find(".mater-note").text($("#note").val());
    }

    function checkInput() {
        if ($("#quantity-check").val() == "" || parseInt($("#quantity-check").val()) < 0) {
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
                    $this.attr('disabled', true).html("??ang x??? l??...");
                },
                success: function (response) {
                    console.log(response);
                    var jsonData = JSON.parse(response);

                    if (jsonData.success == "1")
                    {
                        Swal.fire(
                                'Th??nh c??ng!',
                                '???? x??a nguy??n v???t li???u',
                                'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
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
                        $this.attr('disabled', true).html("??ang x??? l??...");
                    },
                    success: function (response) {
                        console.log(response);
                        var jsonData = JSON.parse(response);

                        if (jsonData.success == "1")
                        {
                            Swal.fire(
                                'Th??nh c??ng!',
                                'Th??ng tin ???? ???????c ch???nh s???a',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    $('#myEditModal').modal('hide');
                                    updateRowData();
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
                //alert("Vui l??ng ki???m tra l???i d??? li???u!");
                Swal.fire(
                        'Th???t b???i!',
                        'Vui l??ng ki???m tra l???i d??? li???u!',
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
                    $this.attr('disabled', true).html("??ang x??? l??...");
                },
                success: function (response) {
                    console.log(response);
                    var jsonData = JSON.parse(response);

                    if (jsonData.success == "1")
                    {
                        Swal.fire(
                                'Th??nh c??ng!',
                                '???? x??a nguy??n v???t li???u',
                                'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                $('#myDeleteModal').modal('hide');
                                removeRow();
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
  		});
  	});
</script>