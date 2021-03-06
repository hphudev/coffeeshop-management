<?php
include '../models/M_DonViTinh.php';
include '../models/M_LoaiNguyenVatLieu.php';
include '../models/M_NhaCungCap.php';
include '../models/M_TinhTrang.php';

$ModelDonViTinh = new Model_DonViTinh();
$DonViTinhList = $ModelDonViTinh->get_AllDonViTinh();

$ModelLoaiNguyenVatLieu = new Model_LoaiNguyenVatLieu();
$LoaiNguyenVatLieuList = $ModelLoaiNguyenVatLieu->get_AllLoaiNguyenVatLieu();

$ModelNhaCungCap = new Model_NhaCungCap();
$NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();

$ModelTinhTrang = new Model_TinhTrang();
$TinhTrangList = $ModelTinhTrang->get_AllTinhTrang();
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

    .buttons-group,
    .fields-group,
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
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO / M??? R???NG</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-material">Nguy??n v???t li???u</div>
            <div class="btn btn-import">Nh???p kho</div>
            <div class="btn btn-export">Xu???t kho</div>
            <div class="btn btn-report">Ki???m kho</div>
            <div class="btn btn-success">M??? r???ng</div>
        </div>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <!-- ????n v??? t??nh -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                    <div class="card-text">
                        <h4 class="card-title">????n v??? t??nh</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add-unit" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m ??VT
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <!-- <th class='text-center text-success'>STT</th> -->
                                    <th class='text-center text-success'>M?? ??VT</th>
                                    <th class='text-center text-success'>T??n ????n v??? t??nh</th>
                                    <th class='text-center text-success'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th class='text-center'>STT</th> -->
                                    <th class='text-center'>M?? ??VT</th>
                                    <th class='text-center'>T??n ????n v??? t??nh</th>
                                    <th class='text-center'>Thao t??c</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($DonViTinhList && count($DonViTinhList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($DonViTinhList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $DonViTinhList[$i]->get_MaDVT() . "'>";
                                    // echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center unit-id'>" . $DonViTinhList[$i]->get_MaDVT() . "</td>";
                                    echo "<td class='text-center unit-name'>" . $DonViTinhList[$i]->get_TenDVT() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $DonViTinhList[$i]->get_MaDVT() . '" rel="tooltip" class="btn btn-success btn-edit-unit" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $DonViTinhList[$i]->get_MaDVT() . '" rel="tooltip" class="btn btn-danger btn-delete-unit">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                echo "D??? li???u tr???ng!";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- lo???i nguy??n v???t li???u -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                        <h4 class="card-title">Lo???i nguy??n v???t li???u</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-info btn-add-mater-type" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m lo???i NVL
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>M?? lo???i</th>
                                    <th class='text-center text-info'>T??n lo???i NVL</th>
                                    <th class='text-center text-info'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>M?? lo???i</th>
                                    <th class='text-center'>T??n lo???i NVL</th>
                                    <th class='text-center'>Thao t??c</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($LoaiNguyenVatLieuList && count($LoaiNguyenVatLieuList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . "'>";
                                    echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center type-id'>" . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . "</td>";
                                    echo "<td class='text-center type-name'>" . $LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . '" rel="tooltip" class="btn btn-success btn-edit-type" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . '" rel="tooltip" class="btn btn-danger btn-delete-mater-type">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                    echo "D??? li???u tr???ng!";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- t??nh tr???ng -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-warning">
                    <div class="card-text">
                        <h4 class="card-title">T??nh tr???ng</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-warning btn-add-sts" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m t. tr???ng
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-warning'>STT</th>
                                    <th class='text-center text-warning'>M?? t??nh tr???ng</th>
                                    <th class='text-center text-warning'>T??n t??nh tr???ng</th>
                                    <th class='text-center text-warning'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>M?? t??nh tr???ng</th>
                                    <th class='text-center'>T??n t??nh tr???ng</th>
                                    <th class='text-center'>Thao t??c</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($TinhTrangList && count($TinhTrangList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($TinhTrangList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $TinhTrangList[$i]->get_MaTinhTrang() . "'>";
                                    echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center sts-id'>" . $TinhTrangList[$i]->get_MaTinhTrang() . "</td>";
                                    echo "<td class='text-center sts-name'>" . $TinhTrangList[$i]->get_TenTinhTrang() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $TinhTrangList[$i]->get_MaTinhTrang() . '" rel="tooltip" class="btn btn-success btn-edit-sts" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $TinhTrangList[$i]->get_MaTinhTrang() . '" rel="tooltip" class="btn btn-danger btn-delete-sts">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                echo "D??? li???u tr???ng!";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- nh?? cung c???p -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h4 class="card-title">Nh?? cung c???p</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-primary btn-add-supplier" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m NCC
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesSupplier" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-primary'>STT</th>
                                    <th class='text-center text-primary'>M?? NCC</th>
                                    <th class='text-center text-primary'>T??n nh?? cung c???p</th>
                                    <th class='text-center text-primary'>S??? ??i???n tho???i</th>
                                    <th class='text-center text-primary'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>M?? NCC</th>
                                    <th class='text-center'>T??n nh?? cung c???p</th>
                                    <th class='text-center'>S??? ??i???n tho???i</th>
                                    <th class='text-center'>Thao t??c</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($NhaCungCapList && count($NhaCungCapList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($NhaCungCapList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $NhaCungCapList[$i]->get_MaNCC() . "'>";
                                    echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center supplier-id'>" . $NhaCungCapList[$i]->get_MaNCC() . "</td>";
                                    echo "<td class='text-center supplier-name'>" . $NhaCungCapList[$i]->get_TenNCC() . "</td>";
                                    echo "<td class='text-center supplier-phone'>" . $NhaCungCapList[$i]->get_SDT() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $NhaCungCapList[$i]->get_MaNCC() . '" rel="tooltip" class="btn btn-success btn-edit-supplier" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $NhaCungCapList[$i]->get_MaNCC() . '" rel="tooltip" class="btn btn-danger btn-delete-supplier">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                echo "D??? li???u tr???ng!";
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

<!-- Add ????n v??? t??nh/ lo???i NVL/ ncc modal -->
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
                        <p class="input-label text-left">T??n NVL: </p>
                        <input name="name" id="obj-name-val" class="form-control input-value"
                            required type="text" placeholder="Nh???p t??n"
                        >
                    </div>
                </div>

                <div class="form-group bmd-form-group phone-box" hidden>
                    <div class="fields-group">
                        <p class="input-label text-left">S??? ??i???n tho???i: </p>
                        <input name="name" id="obj-phone-val" class="form-control input-value"
                            required type="number" placeholder="Nh???p s??? ??i???n tho???i"
                        >
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
    var object = "";
    var path = "";
    var action_type = "";
    var obj_id = "";
    $(document).ready(function() {
        //init datatables
        $('.datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        //nguy??n v???t li???u
        $(".btn-material").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse";
        });

        //nh???p kho
        $(".btn-import").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&receipt";
        });

        //xu???t kho
        $(".btn-export").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&export";
        });

        //ki???m kho
        $(".btn-report").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&report";
        });

        //add ??vt
        $(".btn-add-unit").on("click", function() {
            object = "unit";
            action_type = "add-unit";
            path = "../controllers/C_DonViTinh.php";
            $(".input-label").text("T??n ????n v??? t??nh:");
            $(".modal-title").text("Th??m ????n v??? t??nh");
            $(".phone-box").attr("hidden", true);
            $("#obj-name-val").val("");
        });

        //add lo???i nvl
        $(".btn-add-mater-type").on("click", function() {
            object = "material type";
            action_type = "add-type";
            path = "../controllers/C_LoaiNguyenVatLieu.php";
            $(".input-label").text("T??n lo???i ng. v???t li???u:");
            $(".modal-title").text("Th??m lo???i nguy??n v???t li???u");
            $(".phone-box").attr("hidden", true);
            $("#obj-name-val").val("");
        });

        //add t??nh tr???ng
        $(".btn-add-sts").on("click", function() {
            object = "status";
            action_type = "add-sts";
            path = "../controllers/C_TinhTrang.php";
            $(".input-label").text("T??n t??nh tr???ng:");
            $(".modal-title").text("Th??m t??nh tr???ng");
            $(".phone-box").attr("hidden", true);
            $("#obj-name-val").val("");
        });

        //add ncc
        $(".btn-add-supplier").on("click", function() {
            object = "supplier";
            action_type = "add-supplier";
            path = "../controllers/C_NhaCungCap.php";
            $(".input-label").text("T??n nh?? cung c???p:");
            $(".phone-box .input-label").text("S??? ??i???n tho???i:");
            $(".modal-title").text("Th??m nh?? cung c???p");
            $(".phone-box").removeAttr("hidden");
            $("#obj-name-val").val("");
            $("#obj-phone-val").val("");
        });

        //edit ??vt
        $(".btn-edit-unit").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "unit";
                action_type = "edit-unit";
                path = "../controllers/C_DonViTinh.php";

                $(".input-label").text("T??n ????n v??? t??nh:");
                $(".modal-title").text("Ch???nh s???a ????n v??? t??nh");
                $("#obj-name-val").val($row.find(".unit-name").text());
                $(".phone-box").attr("hidden", true);
            });
        });

        //edit lo???i nvl
        $(".btn-edit-type").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "material type";
                action_type = "edit-type";
                path = "../controllers/C_LoaiNguyenVatLieu.php";

                $(".input-label").text("T??n lo???i ng. v???t li???u:");
                $(".modal-title").text("Ch???nh s???a lo???i nguy??n v???t li???u");
                $("#obj-name-val").val($row.find(".type-name").text());
                $(".phone-box").attr("hidden", true);
            });
        });

        //edit t??nh tr???ng
        $(".btn-edit-sts").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "status";
                action_type = "edit-sts";
                path = "../controllers/C_TinhTrang.php";

                $(".input-label").text("T??n t??nh tr???ng:");
                $(".modal-title").text("Ch???nh s???a t??nh tr???ng");
                $("#obj-name-val").val($row.find(".sts-name").text());
                $(".phone-box").attr("hidden", true);
            });
        });

        //edit ncc
        $(".btn-edit-supplier").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "supplier";
                action_type = "edit-supplier";
                path = "../controllers/C_NhaCungCap.php";

                $(".input-label").text("T??n nh?? cung c???p:");
                $(".phone-box .input-label").text("S??? ??i???n tho???i:");
                $(".modal-title").text("Ch???nh s???a nh?? cung c???p");
                $("#obj-name-val").val($row.find(".supplier-name").text());
                $("#obj-phone-val").val($row.find(".supplier-phone").text());
                $(".phone-box").removeAttr("hidden");
            });
        });
    });

    function updateRowData() {
        var length = 0;
        var index = 0;

        if (action_type == "edit-unit") {
            length = $(".btn-edit-unit").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-unit").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-unit").get(index)).closest('tr');
            $row.find('.unit-name').text($("#obj-name-val").val());
        }
        if (action_type == "edit-type") {
            length = $(".btn-edit-type").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-type").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-type").get(index)).closest('tr');
            $row.find('.type-name').text($("#obj-name-val").val());
        }
        if (action_type == "edit-sts") {
            length = $(".btn-edit-sts").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-sts").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-sts").get(index)).closest('tr');
            $row.find('.sts-name').text($("#obj-name-val").val());
        }
        if (action_type == "edit-supplier") {
            length = $(".btn-edit-supplier").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-supplier").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-supplier").get(index)).closest('tr');
            $row.find('.supplier-name').text($("#obj-name-val").val());
            $row.find('.supplier-phone').text($("#obj-phone-val").val());
        }
    }

    //N??t x??a ????n v??? t??nh
    $(".btn-delete-unit").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'X??a ????n v??? t??nh',
                text: 'Thao t??c n??y s??? x??a ????n v??? t??nh v?? kh??ng th??? ho??n t??c. B???n v???n mu???n ti???p t???c?',
                showDenyButton: true,
                confirmButtonText: 'H???y',
                denyButtonText: `X??a`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                } else if (result.isDenied) {
                    var $row = $(this).closest('tr');
                    action_type = "delete";
                    obj_id = $row.attr('id');
                    
                    // Ajax config
                    $.ajax({
                        type: "POST",
                        url: '../controllers/C_DonViTinh.php',
                        data: {
                            action: action_type,
                            unit_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Th??nh c??ng!',
                                    '???? x??a ????n v??? t??nh',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //location.reload();
                                        $row.remove();
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
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    //N??t x??a nh?? cung c???p
    $(".btn-delete-supplier").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'X??a nh?? cung c???p',
                text: 'Thao t??c n??y s??? x??a nh?? cung c???p v?? kh??ng th??? ho??n t??c. B???n v???n mu???n ti???p t???c?',
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
                        url: '../controllers/C_NhaCungCap.php',
                        data: {
                            action: action_type,
                            supplier_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Th??nh c??ng!',
                                    '???? x??a nh?? cung c???p',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //location.reload();
                                        $row.remove();
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
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    //N??t x??a lo???i ng.v???t li???u
    $(".btn-delete-mater-type").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'X??a lo???i nguy??n v???t li???u',
                text: 'Thao t??c n??y s??? x??a lo???i nguy??n v???t li???u v?? kh??ng th??? ho??n t??c. B???n v???n mu???n ti???p t???c?',
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
                        url: '../controllers/C_LoaiNguyenVatLieu.php',
                        data: {
                            action: action_type,
                            type_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Th??nh c??ng!',
                                    '???? x??a lo???i nguy??n v???t li???u',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //location.reload();
                                        $row.remove();
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
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    //N??t x??a t??nh tr???ng
    $(".btn-delete-sts").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'X??a t??nh tr???ng',
                text: 'Thao t??c n??y s??? x??a t??nh tr???ng v?? kh??ng th??? ho??n t??c. B???n v???n mu???n ti???p t???c?',
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
                        url: '../controllers/C_TinhTrang.php',
                        data: {
                            action: action_type,
                            sts_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Th??nh c??ng!',
                                    '???? x??a t??nh tr???ng',
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
                                    'Vui l??ng ki???m tra l???i!',
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

    function checkSDT(sdt) {
        const regex = /(84|0[3|5|7|8|9])+([0-9]{8})/
        return regex.test(String(sdt));
    }

    function checkInput() {
        if ($("#obj-name-val").val() == "") {
            Swal.fire(
                'Th???t b???i!',
                'Vui l??ng nh???p ????? d??? li???u!',
                'warning'
            )
            return false;
        }
        else {
            if ($("#obj-phone-val").val() != '')
            {
                if (!checkSDT($("#obj-phone-val").val())) {
                    Swal.fire(
                        'Th???t b???i!',
                        'S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng!',
                        'warning'
                    )
                    return false;
                }
            }
            
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
                    url: path,
                    data: {
                        action: action_type,
                        id: obj_id,
                        name: $("#obj-name-val").val(),
                        phone: $("#obj-phone-val").val()
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
                                    if (action_type.includes("edit")) {
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
            // else {
            //     Swal.fire(
            //         'Th???t b???i!',
            //         'Vui l??ng nh???p ????? d??? li???u!',
            //         'error'
            //     )
            //     // $(".alert").addClass("open");
            // }
  		});
  	});
</script>