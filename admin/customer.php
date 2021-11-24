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
                            case 'khachhang2':
                                getTab('hangthanhvien')
                                break;
                            case 'khachhang4':
                                getTab('khuyenmai')
                                break;
                            case 'khachhang0':
                            default:
                                getTab('khachhang')
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
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: tab,
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
        }

        $('#btnDSKH').click(async function() {
            changeTab($(this))
            checkPhanQuyen('khachhang0')
        })

        $('#btnHangTV').click(async function() {
            changeTab($(this))
            checkPhanQuyen('khachhang2')
        })

        $('#btnDSKM').click(function() {
            changeTab($(this))
            checkPhanQuyen('khachhang4')
        })
        $('#btnDSKH').click()
    })
</script>