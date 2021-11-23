<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="font-weight-bold page_title">
                QUẢN LÝ KHÁCH HÀNG
            </div>
        </div>

    </div>
</div>

<hr />
<div class="row">
    <div class="col-md-12">
        <button id="btnDSKM" type="button" class="btn btn-default float-right">Khuyến mãi</button>
        <button id="btnHangTV" type="button" class="btn btn-default float-right">Hạng thành viên</button>
        <button id="btnDSKH" type="button" class="btn btn-info float-right">Khách hàng</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 khachhang_content">

    </div>
</div>
</div>

<script>
    $(document).ready(function() {

        async function checkQuanQuyen(PhanQuyen) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_PhanQuyen.php",
                data: {
                    phanquyen: PhanQuyen,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    if (response == "true") {
                        return true;
                    } else {
                        return false;
                    }
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function changeTab(clicked) {
            if (!clicked.hasClass('btn-info')) {
                var activeTab = $('.btn-info')
                activeTab.removeClass('btn-info')
                activeTab.addClass('btn-default')

                clicked.addClass('btn-info')
                clicked.removeClass('btn-default')
            }
        }

        $('#btnDSKH').click(function() {
            if (checkQuanQuyen('khachhang0')) {
                changeTab($(this))
                $.ajax({
                    type: "POST",
                    url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                    data: {
                        action: 'khachhang',
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $('.khachhang_content').html(response)
                    },
                    complete: function() {},
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                })
            } else {
                Swal.fire(
                    "Thất bại!",
                    "Bạn không có quyền truy cập mục này!",
                    "warning"
                )
            }
        })
        $('#btnHangTV').click(function() {
            if (checkQuanQuyen('khachhang1')) {
                changeTab($(this))
                $.ajax({
                    type: "POST",
                    url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                    data: {
                        action: 'hangthanhvien',
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $('.khachhang_content').html(response)
                    },
                    complete: function() {},
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                })
            } else {
                Swal.fire(
                    "Thất bại!",
                    "Bạn không có quyền truy cập mục này!",
                    "warning"
                )
            }

        })
        $('#btnDSKM').click(function() {
            if (checkQuanQuyen('khachhang2')) {
                changeTab($(this))
                $.ajax({
                    type: "POST",
                    url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                    data: {
                        action: 'khuyenmai',
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $('.khachhang_content').html(response)
                    },
                    complete: function() {},
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                })
            } else {
                Swal.fire(
                    "Thất bại!",
                    "Bạn không có quyền truy cập mục này!",
                    "warning"
                )
            }

        })
        $('#btnDSKH').click()
    })
</script>