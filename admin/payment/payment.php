<style>
    .modal {
        padding: 0 !important;
    }

    .modal .modal-dialog {
        width: 100%;
        max-width: none;
        height: 100%;
        margin: auto;
    }

    .modal .modal-content {
        width: 100%;
        height: 100%;
        border: 0;
        border-radius: 0;
    }

    .modal .modal-body {
        overflow-y: auto;
    }

    .predict-money-container {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 10px;
        border: 1px solid #cccccc;
        border-radius: 15px;
    }

    .btn-default {
        text-align: center !important;
        max-width: 100px !important;
        font-size: 14px !important;
        color: #111111 !important;
        background-color: rgba(0, 0, 0, 0.1) !important;
        border: 1px solid rgba(0, 0, 0, 0.5) !important;
        border-radius: 15px !important;
    }

    .my-auto {
        margin-top: auto;
        margin-bottom: auto;
    }

    .my-auto>h4 {
        margin-bottom: 0 !important;
    }

    .form-control {
        font-size: 18px;
        display: inline-block !important;
    }

    .promotion,
    .guest {
        cursor: pointer;
    }

    #section-to-print {
        display: none;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        body {
            margin: 0mm 0mm 0mm 0mm;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

<div class="modal fade" id="thanhtoanModel" role="dialog" aria-labelledby="thanhtoanModel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">THANH TOÁN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container-fluid">
                <div class="row">
                    <div class="col-md-9 p-5">
                        <h3>THÔNG TIN HÓA ĐƠN</h3>
                        <table id="tableNV" class="table table-hover ">
                            <thead class="text-primary">
                                <th>Số thứ tự</th>
                                <th>Tên món</th>
                                <th>Tùy chọn</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($DatMonDetails); $i++) {
                                    echo "<tr>";
                                    echo "<td>" . ($i + 1) . "</td>";
                                    echo "<td>" . $ModelMon->get_NameById($DatMonDetails[$i]->get_MaMon()) . "</td>";
                                    echo "<td>" . $DatMonDetails[$i]->get_TenDonVi() . "</td>";
                                    echo "<td>" . $DatMonDetails[$i]->get_DonGia() . "</td>";
                                    echo "<td>" . $DatMonDetails[$i]->get_SoLuong() . "</td>";
                                    echo "<td>" . $DatMonDetails[$i]->get_SoLuong() * $DatMonDetails[$i]->get_DonGia() . "</td>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <th>Số thứ tự</th>
                                <th>Tên món</th>
                                <th>Tùy chọn</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-3 container-fluid p-5">
                        <h3>THÔNG TIN THÊM</h3>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h4>
                                    Ngày thanh toán
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 id="date" class="font-weight-bold">
                                    <?php
                                    echo date_format(new DateTime('now'), "d/m/Y G:i")
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h4>
                                    Nhân viên thu ngân
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 class="font-weight-bold">
                                    <?php
                                    echo $NhanVienThuNgan->get_HoTenDem() . " " . $NhanVienThuNgan->get_Ten();
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <h4>
                                    Khách hàng
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <i class="material-icons guest">help</i>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 id="customer" class="font-weight-bold">
                                    Danh
                                </h4>
                            </div>
                        </div>
                        <hr />
                        <h3>THÔNG TIN THANH TOÁN</h3>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h4>
                                    Tổng tiền hàng
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 id="total" class="font-weight-bold">
                                    <?php
                                    echo $DatMon->get_TongTien();
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <h4>
                                    Khuyến mãi
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <i class="material-icons promotion">help</i>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 id="discount" class="font-weight-bold">
                                    0
                                </h4>
                            </div>
                        </div>
                        <div class="row mt-3 align-items-center">
                            <div class="col-md-6">
                                <h4>
                                    Khách cần trả
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 id="pay" class="font-weight-bold">
                                    <?php
                                    echo $DatMon->get_TongTien();
                                    ?>
                                </h4>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 my-auto">
                                <h4>
                                    Khách thanh toán
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <input id="payed" class="form-control text-right font-weight-bold" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-3 predict-money-container">
                            <div class="col-md-4"><button type="button" class="btn btn-default"> 20.000</button></div>
                            <div class="col-md-4"><button type="button" class="btn btn-default"> 50.000</button></div>
                            <div class="col-md-4"><button type="button" class="btn btn-default">100.000</button></div>
                            <div class="col-md-4"><button type="button" class="btn btn-default">200.000</button></div>
                            <div class="col-md-4"><button type="button" class="btn btn-default">500.000</button></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6 ">
                                <h4>
                                    Tiền thừa trả khách
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h4 id="excess" class="font-weight-bold">
                                    0 VNĐ
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="confirmPay" type="button" class="btn btn-success">Thanh toán</button>
            </div>
        </div>
    </div>
</div>

<div id="section-to-print">

</div>

<script>
    $(document).ready(function() {
        $("#thanhtoanModel").modal('show')
        var items = $(".predict-money-container")
        var total = $("#total")
        var total_v = Number($("#total").html())
        var excess = $("#excess")
        var excess_v = 0;
        var discount = $("#discount")
        var discount_v = 0
        var pay = $("#pay")
        var pay_v = total_v - discount_v
        var payed = $('#payed')
        var payed_v = 0
        var buttons = "";
        var promotion = ""
        initSuggesMoney()
        items.html(buttons)
        pay.html(toMoney(pay_v))
        total.html(toMoney(total_v))
        calculateExcess()

        function initSuggesMoney() {
            buttons += '<div class="col-md-4">' +
                '<button type="button" class="btn btn-default">' +
                toMoney(pay_v) +
                '</button>' +
                '</div>'
            if (total_v < 20000) {
                buttons += '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-default">' +
                    toMoney(20000) +
                    '</button>' +
                    '</div>'
            }
            if (total_v < 50000) {
                buttons += '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-default">' +
                    toMoney(200000) +
                    '</button>' +
                    '</div>'
            }
            if (total_v < 100000) {
                buttons += '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-default">' +
                    toMoney(100000) +
                    '</button>' +
                    '</div>'
            }
            if (total_v < 200000) {
                buttons += '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-default">' +
                    toMoney(200000) +
                    '</button>' +
                    '</div>'
            }
            if (total_v < 500000) {
                buttons += '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-default">' +
                    toMoney(500000) +
                    '</button>' +
                    '</div>'
            }
        }

        function calculateExcess() {
            excess_v = payed_v - pay_v
            excess.html(toMoney(excess_v))
        }

        function toMoney(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function toInt(s) {
            return parseFloat(s.replace(/,/g, ''))
        }

        function updateDiscount(amount) {
            discount_v = toInt(amount)
            discount.html(toMoney(discount_v))
            pay_v = total_v - discount_v;
            pay.html(toMoney(pay_v))
            calculateExcess()
        }

        function checkPromotion(promotionCode) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_HoaDon.php",
                data: {
                    action: "khuyenmai",
                    id: promotionCode,
                },
                beforeSend: function() {},
                success: function(response) {
                    var title = "";
                    if (response == "error") {
                        title = `Mã giảm giá không hợp lệ!`
                    } else if (response == "expired") {
                        title = `Mã giảm giá đã hết hạn!`
                    } else if (response == "runout") {
                        title = `Mã giảm giá đã hết lượt sử dụng`
                    } else {
                        title = `Áp dụng thành công!`
                        updateDiscount(response)
                    }
                    Swal.fire({
                        title: title,
                    })
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function checkGuest(guestNumber) {
            // Check Khach hang info here
        }

        function checkBillInfo() {
            if (excess_v < 0) {
                Swal.fire(
                    'Thất bại',
                    'Khách hàng chưa thanh toán đủ tiền',
                    'error'
                )
            } else {
                addBill()
            }
        }

        function addBill() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_HoaDon.php",
                data: {
                    action: 'hoadon',
                    date: $('#date').val(),
                    customer: 'kh001',
                    discount: discount_v,
                    pay: pay_v,
                    payed: payed_v,
                    excess: excess_v,
                },
                beforeSend: function() {},
                success: function(response) {
                    $('#section-to-print').html(response)
                    window.print()
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        $(".btn-default").click(function() {
            payed_v = toInt($(this).html())
            payed.val(toMoney(payed_v))
            calculateExcess()
        })

        payed.on('input', function() {
            if ($(this).val() == "") {
                $(this).val("0")
            }
            payed_v = toInt($(this).val())
            payed.val(toMoney(payed_v))
            calculateExcess()
        })

        $(".promotion").click(function() {
            Swal.fire({
                title: 'Nhập thông tin khuyến mãi',
                text: 'Mã khuyến mãi hoặc giá tiền giảm (VNĐ)',
                input: 'text',
                showCancelButton: true,
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Áp dụng',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    if (isNaN(result.value))
                        checkPromotion(result.value)
                    else
                        updateDiscount(result.value)
                }
            })
        })

        $('.guest').click(function() {
            Swal.fire({
                title: 'Nhập thông tin khách hàng',
                text: 'Số điện thoại',
                input: 'text',
                showCancelButton: true,
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Áp dụng',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    checkGuest(result.value)
                }
            })
        })

        $("#confirmPay").click(function() {
            checkBillInfo();
        })
    })
</script>