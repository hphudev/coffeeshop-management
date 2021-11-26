<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="font-weight-bold page_title">
                QUẢN LÝ NHÂN SỰ
            </div>
        </div>

    </div>
</div>

<hr />
<div class="row">
    <div class="col-md-12">
        <button id="btnBangPQ" type="button" class="btn btn-info float-right">Bảng phân quyền</button>
        <button id="btnDSCV" type="button" class="btn btn-default float-right">Danh sách chức vụ</button>
        <button id="btnDSNV" type="button" class="btn btn-default float-right">Danh sách nhân viên</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 nhansu_content">

    </div>
</div>

<script>
    $(document).ready(function() {

        function changeTab(clicked) {
            if (!clicked.hasClass('btn-info')) {
                var activeTab = $('.btn-info')
                activeTab.removeClass('btn-info')
                activeTab.addClass('btn-default')

                clicked.addClass('btn-info')
                clicked.removeClass('btn-default')
            }
        }

        function checkPhanQuyen(PhanQuyen) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_PhanQuyen.php",
                data: {
                    phanquyen: PhanQuyen,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // alert(response)
                    if (response == "true") {
                        switch (PhanQuyen) {
                            case 'nhansu2':
                                getTab('chucvu')
                                break;
                            case 'nhansu4':
                                getTab('bangphanquyen')
                                break;
                            case 'nhansu0':
                            default:
                                getTab('nhanvien')
                                break;
                        }
                    } else {
                        Swal.fire(
                            "Thất bại!",
                            "Bạn không có quyền truy cập mục này!",
                            "warning"
                        )
                    }
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
            return result
        }

        function getTab(tab) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_NhanVien.php",
                data: {
                    action: tab,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $('.nhansu_content').html(response)
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        $('#btnDSNV').click(function() {
            changeTab($(this))
            checkPhanQuyen('nhansu0')
        })

        $('#btnDSCV').click(async function() {
            changeTab($(this))
            checkPhanQuyen('nhansu2')
        })

        $('#btnBangPQ').click(function() {
            changeTab($(this))
            checkPhanQuyen('nhansu4')
        })
        $('#btnDSNV').click()
    })
</script>