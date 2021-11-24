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

    .col-group,
    .buttons-group,
    .fields-group,
    .flex-sp-bet {
        display: flex;
    }

    .fields-group {
        align-items: center;
        justify-content: space-evenly;
    }

    .col-group {
        align-items: center;
        flex-direction: column;
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

    .full-w {
        width: 100%;
    }

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
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
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>Quản lý món</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-default btn-menu">MENU</div>
            <div class="btn btn-success">Loại món</div>
        </div>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                    <div class="card-text">
                        <h4 class="card-title">Loại món</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add-type" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm loại món
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-success'>STT</th>
                                    <th class='text-center text-success'>Mã loại món</th>
                                    <th class='text-center text-success'>Tên loại món</th>
                                    <th class='text-center text-success'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã loại món</th>
                                    <th class='text-center'>Tên loại món</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($LoaiMonList && count($LoaiMonList) > 0) {
                                    // output data of each row
                                    for ($i = 0; $i < count($LoaiMonList); $i++) {
                                        echo "<tr role='row' class='odd'>";
                                        echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                        echo "<td class='text-center type-id'>" . $LoaiMonList[$i]->get_MaLoaiMon() . "</td>";
                                        echo "<td class='text-center type-name'>" . $LoaiMonList[$i]->get_TenLoaiMon() . "</td>";
                                        echo '<td class="td-actions text-center">
                                                <button type="button" rel="tooltip" class="btn btn-success btn-edit-type" data-target="#myModal" data-toggle="modal">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-delete-type">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>';
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Dữ liệu trống!";
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

<!-- Add/edit modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Thêm loại món</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Tên loại món: </p>
                        <input name="name" id="obj-name-val" class="form-control input-value"
                            required type="text" placeholder="Nhập tên"
                        >
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
    });

    //Nút tab menu
    $(".btn-menu").on("click", function() {
        window.location.href = "../admin/index.php?page=table";
    });

    //add đvt
    $(".btn-add-type").on("click", function() {
        action_type = "add-type";
        $(".modal-title").text("Thêm loại món");
        $("#obj-name-val").val("");
    });

    //edit đvt
    $(".btn-edit-type").each(function(index) {
        $(this).on("click", function() {
            obj_id = $($(".type-id").get(index)).text();
            action_type = "edit-type";
            $(".modal-title").text("Chỉnh sửa loại món");
            $("#obj-name-val").val($($(".type-name").get(index)).text());
        });
    });

    //Nút xóa
    $(".btn-delete-type").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'Xóa loại món',
                text: 'Thao tác này sẽ xóa loại món và không thể hoàn tác. Bạn vẫn muốn tiếp tục?',
                showDenyButton: true,
                confirmButtonText: 'Hủy',
                denyButtonText: `Xóa`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                } else if (result.isDenied) {
                    action_type = "delete-type";
                    obj_id = $($(".type-id").get(index)).text();
                    
                    // Ajax config
                    $.ajax({
                        type: "POST",
                        url: '../controllers/C_Mon.php',
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
                                    'Thành công!',
                                    'Đã xóa loại món',
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
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });
</script>

<script type="text/javascript">
  	$(document).ready(function() {
  		$("#saveData").on("click", function() {
            if ($("#obj-name-val").val() != "") {
                var $this 		    = $(this);
                var $caption        = $this.html();

                // Ajax config
                $.ajax({
                    type: "POST",
                    url: '../controllers/C_Mon.php',
                    data: {
                        action: action_type,
                        type_id: obj_id,
                        type_name: $("#obj-name-val").val()
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
                    'Vui lòng nhập dữ liệu!',
                    'error'
                )
                // $(".alert").addClass("open");
            }
  		});
  	});
</script>