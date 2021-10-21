<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info</i>
                    </div>
                    <h2 class="card-title">Thông tin cá nhân</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Họ và tên
                                    </label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_HoTenDem() . '"'
                                                                            ?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Tên</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_Ten() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-5">
                                <div class="form-group">
                                    <label for="genderPicker">Giới tính</label>
                                    <select disabled class="form-control selectpicker" data-style="btn btn-link" id="genderPicker">
                                        <option>Nam</option>
                                        <option>Nữ</option>
                                        <option>Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">CMND/CCCD</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_CMND() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Số điện thoại</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_SDT() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Địa chỉ</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_DiaChi() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info</i>
                    </div>
                    <h2 class="card-title">Thông tin làm việc</h2>
                </div>
                <div class="card-body">
                    <form>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Mã nhân viên</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_MaNV() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Ngày vào làm</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_NgayVaoLam() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Vị trí/Công việc</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_DiaChi() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Lương</label>
                                    <input type="text" class="form-control" <?php
                                                                            echo 'value="' . $NhanVien->get_Luong() . '"'
                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>