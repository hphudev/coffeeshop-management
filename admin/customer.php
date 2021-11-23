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
        firstInit();

        function firstInit() {
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
            changeTab($(this))
            firstInit()
        })
        $('#btnHangTV').click(function() {
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
        })
        $('#btnDSKM').click(function() {
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
        })
    })
</script>