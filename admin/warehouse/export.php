<?php
include '../models/M_NhanVien.php';

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
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO / PHI???U XU???T</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-material">Nguy??n v???t li???u</div>
            <div class="btn btn-receipt">Nh???p kho</div>
            <div class="btn btn-success">Xu???t kho</div>
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
                        <h4 class="card-title">Phi???u xu???t</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Th??m phi???u xu???t
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <!-- <th class='text-center text-success'>STT</th> -->
                                    <th class='text-center text-success'>M?? PX</th>
                                    <th class='text-center text-success'>Ng??y l???p</th>
                                    <th class='text-center text-success'>Nh??n vi??n xu???t</th>
                                    <th class='text-center text-success'>Nh??n vi??n nh???n</th>
                                    <th class='text-center text-success'>Thao t??c</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th class='text-center'>STT</th> -->
                                    <th class='text-center'>M?? PX</th>
                                    <th class='text-center'>Ng??y l???p</th>
                                    <th class='text-center'>Nh??n vi??n xu???t</th>
                                    <th class='text-center'>Nh??n vi??n nh???n</th>
                                    <th class='text-center'>Thao t??c</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php
                                if ($PhieuXuatList)
                                {
                                    if (count($PhieuXuatList) > 0) {
                                        // output data of each row
                                        for ($i = 0; $i < count($PhieuXuatList); $i++)
                                        {
                                            echo "<tr role='row' class='odd' id='" . $PhieuXuatList[$i]->get_MaPX() . "'>";
                                            // echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                            echo "<td class='text-center px-id'>" . $PhieuXuatList[$i]->get_MaPX() . "</td>";
                                            echo "<td class='text-center'>" . $PhieuXuatList[$i]->get_NgayLap() . "</td>";
                                            echo "<td class='text-center wh-staff'>" . getTenNV($NhanVienList, $PhieuXuatList[$i]->get_MaNVXuat()) . "</td>";
                                            echo "<td class='text-center iss-staff'>" . getTenNV($NhanVienList, $PhieuXuatList[$i]->get_MaNVNhan()) . "</td>";
                                            echo '<td class="td-actions text-center">
                                                    <button type="button" id="' . $PhieuXuatList[$i]->get_MaPX() . '" rel="tooltip" class="btn btn-info btn-view-detail" data-target="" data-toggle="modal">
                                                        <i class="material-icons">info</i>
                                                    </button>
                                                    <button type="button" id="' . $PhieuXuatList[$i]->get_MaPX() . '" rel="tooltip" class="btn btn-success btn-edit" data-target="#myModal" data-toggle="modal">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" id="' . $PhieuXuatList[$i]->get_MaPX() . '" rel="tooltip" class="btn btn-danger btn-delete-ep">
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

        <!-- hidden notes -->
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-none">
            <?php
            if ($PhieuXuatList)
            {
                if (count($PhieuXuatList) > 0) {
                    // output data of each row
                    for ($i = 0; $i < count($PhieuXuatList); $i++)
                    {
                        echo "<p class='note' id='" . $PhieuXuatList[$i]->get_MaPX() . "'>" . $PhieuXuatList[$i]->get_GhiChu() . "</p>";
                    }
                }
            }    
            ?>
        </div>
    </div>
</div>

<!-- Add phi???u nh???p modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Th??m phi???u xu???t</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nh??n vi??n xu???t: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="wh-staff-val">Ch???n nh??n vi??n</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhanVienList && count($NhanVienList) > 0) {
                                    for ($i = 0; $i < count($NhanVienList); $i++) {
                                        echo "<p class='dropdown-item wh-staff-opt'>" . $NhanVienList[$i]->get_HoTenDem() . " " . $NhanVienList[$i]->get_Ten(). "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Nh??n vi??n nh???n: </p>
                        <div class="dropdown input-value">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="iss-staff-val">Ch???n nh??n vi??n</span>
                            </button>   
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if ($NhanVienList && count($NhanVienList) > 0) {
                                    for ($i = 0; $i < count($NhanVienList); $i++) {
                                        echo "<p class='dropdown-item iss-staff-opt'>" . $NhanVienList[$i]->get_HoTenDem() . " " . $NhanVienList[$i]->get_Ten(). "</p>";
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
                        <input id="note-val" type="text" class="form-control input-value" placeholder="Nh???p ghi ch??">
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

        //m??? r???ng
        $(".btn-expand").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&expand";
        });

        //nh???p kho
        $(".btn-receipt").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&receipt";
        });

        //nvl
        $(".btn-material").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse";
        });

        //ki???m kho
        $(".btn-report").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&report";
        });

        //Init dropdown in modal
        // dropdown nh??n vi??n
        $(".wh-staff-opt").each(function(index) {
            $(this).on("click", function() {
                $("#wh-staff-val").text($($(".wh-staff-opt").get(index)).text());
            });
        });

        // dropdown ncc
        $(".iss-staff-opt").each(function(index) {
            $(this).on("click", function() {
                $("#iss-staff-val").text($($(".iss-staff-opt").get(index)).text());
            });
        });

         //Add v?? edit phi???u xu???t
        // view phi???u xu???t detail
        $(".btn-view-detail").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                window.location.href = "../admin/index.php?page=werehouse&export&id=" + $row.attr('id');
            });
        })

        // add phi???u xu???t
        $(".btn-add").each(function(index) {
            $(this).on("click", function() {
                $("#wh-staff-val").text("Ch???n nh??n vi??n");
                $("#iss-staff-val").text("Ch???n nh??n vi??n");
                $("#note-val").val("");

                $(".modal-title").text("Th??m phi???u xu???t");
                action_type = "add";
                obj_id = "";
            });
        })

        // edit phi???u xu???t
        $(".btn-edit").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                action_type = "edit";
                obj_id = $row.attr('id');

                $("#wh-staff-val").text($row.find(".wh-staff").text());
                $("#iss-staff-val").text($row.find(".iss-staff").text());
                $("#note-val").val($($(".note").get(getHiddenNoteIndex())).text());

                $(".modal-title").text("Ch???nh s???a phi???u xu???t");
            });
        })

        //N??t x??a phi???u xu???t
        $(".btn-delete-ep").each(function(index) {
            $(this).on("click", function() {
                Swal.fire({
                    title: 'X??a phi???u xu???t',
                    text: 'Thao t??c n??y s??? x??a phi???u xu???t, chi ti???t phi???u xu???t v?? kh??ng th??? ho??n t??c. B???n v???n mu???n ti???p t???c?',
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
                            url: '../controllers/C_PhieuXuat.php',
                            data: {
                                action: action_type,
                                px_id: obj_id,
                            },
                            beforeSend: function () {
                                
                            },
                            success: function (response) {
                                var jsonData = JSON.parse(response);

                                if (jsonData.success == "1")
                                {
                                    Swal.fire(
                                        'Th??nh c??ng!',
                                        '???? x??a phi???u xu???t',
                                        'success'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
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
    });

    function getHiddenNoteIndex() {
        for (let i = 0; i < $(".note").length; i++)
        {
            if ($($(".note").get(i)).attr('id') == obj_id) {
                return i;
            }
        }
        return -1;
    }

    function updateRowData() {
        var index = 0;
        for (let i = 0; i < $(".btn-edit").length; i++)
        {
            if ($($(".btn-edit").get(i)).attr('id') == obj_id) {
                index = i;
                break;
            }
        }

        var $row = $($(".btn-edit").get(index)).closest('tr');

        $row.find('.wh-staff').text($("#wh-staff-val").text());
        $row.find(".iss-staff").text($("#iss-staff-val").text());
        $($(".note").get(getHiddenNoteIndex())).text($("#note-val").val());
    }

    function checkInput() {
        if ($("#wh-staff-val").text() == "Ch???n nh??n vi??n" || $("#iss-staff-val").text() == "Ch???n nh??n vi??n"
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
                    url: '../controllers/C_PhieuXuat.php',
                    data: {
                        action: action_type,
                        px_id: obj_id,
                        wh_staff_name: $("#wh-staff-val").text(),
                        iss_staff_name: $("#iss-staff-val").text(),
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