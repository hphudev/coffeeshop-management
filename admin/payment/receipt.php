<div class="container receipt">
    <!-- Thong tin quan -->
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center font-weight-bold">
                CoffeeShop
            </h3>
            <p class="text-center font-weight-bold">
                01 Lê Trị Trung, KP 1B, An Phú, Thuận An, Bình Dương
            </p>
            <p class="text-center font-weight-bold">
                SĐT: 0909123456 - 0909456123
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <hr />
        </div>
    </div>
    <!-- Thong tin hoa don -->
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center font-weight-bold">
                        THÔNG TIN HÓA ĐƠN
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Mã hóa đơn
                </div>
                <div class="col-md-6">
                    <?php
                    echo $HoaDon->get_MaHD();
                    ?>
                </div>
                <div class="col-md-6">
                    Ngày thanh toán:
                </div>
                <div class="col-md-6">
                    <?php
                    echo date_format($HoaDon->get_NgayThanhToan(), 'Y-m-d H:i:s');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Nhân viên:
                </div>
                <div class="col-md-6">
                    <?php
                    echo $NhanVienThuNgan->get_HoTenDem() . " " . $NhanVienThuNgan->get_Ten();
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Khách hàng:
                </div>
                <div class="col-md-6">
                    <?php
                    echo $KH->get_HoTen()
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Số thứ tự
                </div>
                <div class="col-md-6">
                    <?php
                    echo $SoThuTu
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Chi tiet hoa don -->
    <div class="row">
        <div class="col-md-6">
            <table id="tableNV" class="table table-hover ">
                <thead>
                    <th>Món</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($HoaDon->get_ChiTietHoaDon() as $CTHD) {
                        echo "<tr>";
                        echo "<td>" . $ModelMon->get_NameById($CTHD->get_MaMon()) . " " . $CTHD->get_TenDonVi() . "</td>";
                        echo "<td>" . $CTHD->get_SoLuong() . "</td>";
                        echo "<td>" . $CTHD->get_DonGia() . "</td>";
                        echo "<td>" . $CTHD->get_ThanhTien() . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Tong hop -->
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    Thành tiền
                </div>
                <div class="col-md-6 font-weight-bold">
                    <?php
                    echo $HoaDon->get_TongTienTT();
                    ?> VNĐ
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Khuyến mãi
                </div>
                <div class="col-md-6 font-weight-bold">
                    <?php
                    echo $HoaDon->get_TienKhuyenMai();
                    ?> VNĐ
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Tiền khách đưa
                </div>
                <div class="col-md-6 font-weight-bold">
                    <?php
                    echo $HoaDon->get_TongTienKH();
                    ?> VNĐ
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Tiền trả khách
                </div>
                <div class="col-md-6 font-weight-bold">
                    <?php
                    echo $HoaDon->get_TienTraLai();
                    ?> VNĐ
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">
                CẢM ƠN VÀ HẸN GẶP LAI!
            </h3>
        </div>
    </div>
</div>