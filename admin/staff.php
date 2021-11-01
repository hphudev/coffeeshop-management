<div class="container-fluid">
    <!-- <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h2 class="card-title">Danh sách chức vụ</h2>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="" class="table table-hover">
                                        <thead class="text-success">
                                            <th>Mã chức vụ</th>
                                            <th>Tên chức vụ</th>
                                            <th>Mức trợ cấp</th>
                                            <th class="text-right">Thao tác</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            for ($i = 0; $i < count($ChucVuList); $i++) {
                                                echo "<tr>";
                                                echo "<td>" . $ChucVuList[$i]->get_MaCV() . "</td>";
                                                echo "<td>" . $ChucVuList[$i]->get_TenCV() . "</td>";
                                                echo "<td>" . $ChucVuList[$i]->get_MucTroCap() . "</td>";

                                            ?>
                                                <td class="td-actions text-right">
                                                    <button <?php
                                                            echo 'id="' .  $ChucVuList[$i]->get_MaCV() . '"'
                                                            ?> type="button" rel="tooltip" class="btn btn-Edit-CV btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button <?php
                                                            echo 'id="' .  $ChucVuList[$i]->get_MaCV() . '"'
                                                            ?> id="" type="button" rel="tooltip" class="btn btn-Delete-CV btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa nhân viên">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>

                                            <?php
                                                echo "</tr>";
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
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h2 class="card-title">Chi tiết bảng phân quyền</h2>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <h4>
                            THỐNG KÊ
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Xem thông tin thống kê
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Tạo thống kê/báo cáo
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <h4>
                            NHÂN VIÊN
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Xem thông tin nhân viên
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Chỉnh sửa/thêm/xóa thông tin nhân viên
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Xem thông tin chức vụ/ bảng phân quyền
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            Chỉnh sửa/thêm/xóa thông tin chức vụ
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>
                            BÁN HÀNG
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Xem thông tin món
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Chỉnh sửa/thêm/xóa thông tin món
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Thực hiện order món
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Thực hiện báo cáo doanh thu theo món
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>
                            KHO
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Xem thông tin kho
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Tạo báo cáo kho
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h2 class="card-title">Danh sách nhân viên</h2>
                    <div>
                        <button id="btnAddNV" type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#addNVModel">
                            <i class="material-icons">add</i>
                            Thêm nhân viên
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tableNV" class="table table-hover ">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Họ tên đệm</th>
                                            <th>Tên</th>
                                            <th>Chức vụ</th>
                                            <th>Ngày vào làm</th>
                                            <th>Lương</th>
                                            <th class="text-right">Thao tác</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            for ($i = 0; $i < count($NhanVienList); $i++) {
                                                echo "<tr id='row" . $NhanVienList[$i]->get_MaNV() . "'>";
                                                echo "<td>" . $NhanVienList[$i]->get_MaNV() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_HoTenDem() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_Ten() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_ChucVu()->get_TenCV() . "</td>";
                                                echo "<td>" . date('d/m/Y', $NhanVienList[$i]->get_NgayVaoLam()) . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_Luong() . "</td>";

                                            ?>
                                                <td class="td-actions text-right">
                                                    <button <?php
                                                            echo 'id="' . $NhanVienList[$i]->get_MaNV() . '"'
                                                            ?> type="button" rel="tooltip" class="btn btn-View-NV btn-link btn-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="Thông tin chi tiết">
                                                        <i class="material-icons">person</i>
                                                    </button>
                                                    <button <?php
                                                            echo 'id="' . $NhanVienList[$i]->get_MaNV() . '"'
                                                            ?> type="button" rel="tooltip" class="btn btn-Edit-NV btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button <?php
                                                            echo 'id="' . $NhanVienList[$i]->get_MaNV() . '"'
                                                            ?> type="button" rel="tooltip" class="btn btn-Delete-NV btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa nhân viên">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>

                                            <?php
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <th>ID</th>
                                            <th>Họ tên đệm</th>
                                            <th>Tên</th>
                                            <th>Chức vụ</th>
                                            <th>Ngày vào làm</th>
                                            <th>Lương</th>
                                            <th class="text-right">Thao tác</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">info</i> Thông tin chức vụ
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                        <i class="material-icons">code</i> Chi tiết bảng phân quyền
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <div>
                                <button id="btnAddCV" type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#addCVModel">
                                    <i class="material-icons">add</i>
                                    Thêm chức vụ
                                </button>
                            </div>
                            <table id="tableType" class="table table-hover">
                                <thead class="text-primary">
                                    <th>Mã chức vụ</th>
                                    <th>Tên chức vụ</th>
                                    <th>Mức trợ cấp</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    <?php

                                    for ($i = 0; $i < count($ChucVuList); $i++) {
                                        echo "<tr>";
                                        echo "<td>" . $ChucVuList[$i]->get_MaCV() . "</td>";
                                        echo "<td>" . $ChucVuList[$i]->get_TenCV() . "</td>";
                                        echo "<td>" . $ChucVuList[$i]->get_MucTroCap() . "</td>";
                                    ?>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btnEditCV btn-link btn-warning btn-just-icon" data-placement="top" title="Chỉnh sửa thông tin" data-toggle="modal" data-target="#addCVModel">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </td>

                                    <?php
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Lựa chọn chức vụ</label>
                                            <select id="inputState" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php
                                                for ($i = 0; $i < count($ChucVuList); $i++) {
                                                    echo '<option';
                                                    echo ' value="' . $ChucVuList[$i]->get_TenCV();
                                                    echo '">' . $ChucVuList[$i]->get_TenCV() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>
                                            THỐNG KÊ
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Xem thông tin thống kê
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Tạo thống kê/báo cáo
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>
                                            NHÂN VIÊN
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Xem thông tin nhân viên
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Chỉnh sửa/thêm/xóa thông tin nhân viên
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Xem thông tin chức vụ/ bảng phân quyền
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" disabled>
                                                            Chỉnh sửa/thêm/xóa thông tin chức vụ
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>
                                            BÁN HÀNG
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Xem thông tin món
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Chỉnh sửa/thêm/xóa thông tin món
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Thực hiện báo cáo doanh thu theo món
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Thực hiện order món
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>
                                            KHO
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Xem thông tin kho
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            Tạo báo cáo kho
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal NhanVien -->
    <div class="modal fade bd-example-modal-lg" id="addNVModel" tabindex="-1" role="dialog" aria-labelledby="addNVModel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNVModel">Thêm nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h2 class="card-title">Thông tin cá nhân</h2>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Họ và tên đệm
                                            </label>
                                            <input id="inputHoTenDem" type="text" class="form-control personal_info">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Tên</label>
                                            <input id="inputTen" type="text" class="form-control personal_info">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">CMND/CCCD</label>
                                            <input id="inputCMND" type="text" class="form-control personal_info">
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Số điện thoại</label>
                                            <input id="inputSDT" type="number" class="form-control personal_info">
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Ngày sinh</label>
                                            <input id="inputNgaySinh" type="datetime-local" class="form-control personal_info" value="<?php
                                                                                                                                        $now = new DateTime('now');
                                                                                                                                        echo $now->format("Y-m-d\TH:i")
                                                                                                                                        ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-5">
                                        <div class="form-group">
                                            <label for="genderPicker">Giới tính</label>
                                            <select id="inputGioiTinh" class="form-control personal_info selectpicker" data-style="btn btn-link">
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">
                                                Địa chỉ
                                            </label>
                                            <input id="inputDiaChi" type="text" class="form-control personal_info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h2 class="card-title">Thông tin làm việc</h2>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">
                                                Mã nhân viên
                                            </label>
                                            <input id="inputMaNV" type="text" class="form-control personal_info" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="genderPicker">
                                                Vị trí công việc
                                            </label>
                                            <select id="inputChucVu" class="form-control personal_info selectpicker" data-style="btn btn-link">
                                                <?php
                                                for ($i = 0; $i < count($ChucVuList); $i++) {
                                                    echo "<option>" . $ChucVuList[$i]->get_TenCV() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Ngày vào làm</label>
                                            <input id="inputNgVaoLam" type="datetime-local" class="form-control personal_info" value="<?php
                                                                                                                                        $now = new DateTime('now');
                                                                                                                                        echo $now->format("Y-m-d\TH:i")
                                                                                                                                        ?>">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Lương</label>
                                            <input id="inputLuong" type="number" class="form-control personal_info">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Tên tài khoản cung cấp cho nhân viên</label>
                                            <input id="inputTaiKhoan" type="text" class="form-control personal_info">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Mật khẩu tài khoản</label>
                                            <input id="inputMatKhau" type="password" class="form-control personal_info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button id="btnConfirmAddNV" type="button" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ChucVu -->
    <div class="modal fade bd-example-modal-lg" id="addCVModel" tabindex="-1" role="dialog" aria-labelledby="addNVModel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addNVModel">Thêm chức vụ</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h2 class="card-title">Thông tin chức vụ</h2>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Mã chức vụ
                                            </label>
                                            <input id="inputMaChucVu" value=" " type="text" class="form-control chucvu_info" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Tên chức vụ
                                            </label>
                                            <input id="inputTenChucVu" value=" " type="text" class="form-control chucvu_info">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Mức trợ cấp (VNĐ)</label>
                                            <input id="inputMucTroCap" value=" " type="text" class="form-control chucvu_info">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button id="btnConfirmAddCV" type="button" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var tableNV = $('#tableNV').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $(".btn-View-NV").click(function() {
            var nvID = $(this).attr('id')
            window.location.href = "../admin/index.php?page=staff&id=" + nvID;
        });

        $(".btn-Delete-NV").click(function() {
            Swal.fire({
                title: 'Xóa nhân viên?',
                text: "Bạn không thể hoàn tác thao tác này, tiếp tục?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    var nvID = $(this).attr('id')
                    var xmlhttp = new XMLHttpRequest();
                    var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + nvID + "&delete";
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText == 'success') {
                                Swal.fire(
                                    'Đã xóa!',
                                    'Nhân viên đã được xóa khỏi hệ thống',
                                    'success'
                                )
                                $('#row' + nvID).remove();
                            } else {
                                Swal.fire(
                                    'Thất bại!',
                                    'Đã xảy ra lỗi. Vui lòng thử lại',
                                    'error'
                                )
                            }
                        }
                    };

                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }
            })
        });

        $('#btnConfirmAddNV').click(function() {
            if (checkNVInfomation()) {
                var xmlhttp = new XMLHttpRequest();
                var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + $('#inputMaNV').val() + '&add' +
                    "&HoTenDem=" + $('#inputHoTenDem').val() +
                    "&Ten=" + $('#inputTen').val() +
                    "&CMND=" + $('#inputCMND').val() +
                    "&NgaySinh=" + $('#inputNgaySinh').val() +
                    "&GioiTinh=" + $('#inputGioiTinh').val() +
                    "&SDT=" + $('#inputSDT').val() +
                    "&DiaChi=" + $('#inputDiaChi').val() +
                    "&MaNV=" + $('#inputMaNV').val() +
                    "&NgayVaoLam=" + $('#inputNgVaoLam').val() +
                    "&ChucVu=" + $('#inputChucVu').val() +
                    "&Luong=" + $('#inputLuong').val() +
                    "&TaiKhoan=" + $('#c').val() +
                    "&MatKhau=" + $('#inputMatKhau').val();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'success') {
                            Swal.fire(
                                'Thành công!',
                                'Thông tin nhân viên đã được thêm',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Thất bại!',
                                'Đã xảy ra lỗi. Vui lòng thử lại',
                                'error'
                            )
                        }
                    }
                };

                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        });

        function checkNVInfomation() {
            if ($('#inputHoTenDem').val() == "" ||
                $('#inputTen').val() == "" ||
                $('#inputCMND').val() == "" ||
                $('#inputNgaySinh').val() == "" ||
                $('#inputGioiTinh').val() == "" ||
                $('#inputSDT').val() == "" ||
                $('#inputDiaChi').val() == "" ||
                $('#inputMaNV').val() == "" ||
                $('#inputNgVaoLam').val() == "" ||
                $('#inputChucVu').val() == "" ||
                $('#inputLuong').val() == "" ||
                $('#inputTaiKhoan').val() == "" ||
                $('#inputMa').val() == "") {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đầy đủ thông tin',
                    'error'
                )
                return false;
            };
            if (!check)
                if (!checkNgaySinh()) {
                    Swal.fire(
                        'Thất bại!',
                        'Nhân viên phải đủ 18 tuổi. Vui lòng kiểm tra lại',
                        'error'
                    )
                    return false;
                }
            if (!checkSDT()) {
                Swal.fire(
                    'Thất bại!',
                    'Số điện thoại không đúng định dạng. Vui lòng kiểm tra lại',
                    'error'
                )
                return false;
            }
        }

        function checkSDT() {
            const regex = /(84|0[3|5|7|8|9])+([0-9]{8})/
            return regex.test(String($('#inputSDT').val()));
        }

        function checkNgaySinh() {
            var dob = new Date(Date.parse($('#inputNgaySinh').val()))
            const today = new Date()

            var age = today.getFullYear() - dob.getFullYear()
            if (age < 18)
                return false
            if (age > 18)
                return true
            if (age == 18) {
                var month = today.getMonth() - dob.getMonth();
                if (month < 0)
                    return false
                if (month > 0)
                    return true
                if (month == 18) {
                    var day = today.getDay() - dob.getDay();
                    if (day < 0)
                        return false
                    if (day > 0)
                        return true
                }
            }
        }

        var tableType = $('#tableType').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $('#btnAddCV').click(function() {
            $('#inputMaChucVu').attr('value', '')
            $('#inputTenChucVu').attr('value', '')
            $('#inputMucTroCap').attr('value', '')
        })

        $(".btnEditCV").click(function() {
            var $row = $(this).closest('tr')
            var $columns = $row.find('td');
            $('#btnConfirmAddCV').addClass('edit')
            $('#inputMaChucVu').attr('value', $columns[0].innerHTML)
            $('#inputTenChucVu').attr('value', $columns[1].innerHTML)
            $('#inputMucTroCap').attr('value', $columns[2].innerHTML)
        });

        $(".btn-Delete-CV").click(function() {
            Swal.fire({
                title: 'Xóa nhân viên?',
                text: "Bạn không thể hoàn tác thao tác này, tiếp tục?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    var nvID = $(this).attr('id')
                    var xmlhttp = new XMLHttpRequest();
                    var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + nvID + "&delete";
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText == 'success') {
                                Swal.fire(
                                    'Đã xóa!',
                                    'Nhân viên đã được xóa khỏi hệ thống',
                                    'success'
                                )
                                $('#row' + nvID).remove();
                            } else {
                                Swal.fire(
                                    'Thất bại!',
                                    'Đã xảy ra lỗi. Vui lòng thử lại',
                                    'error'
                                )
                            }
                        }
                    };

                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }
            })
        });

        $('#btnConfirmAddCV').click(function() {
            if ($(this).hasClass('edit')) {
                alert("Edit")
            } else {
                alert("Add")
                checkCVInfomation()
            }
        });

        function checkCVInfomation() {
            if ($('#inputMaChucVu').val() == " " ||
                $('#inputTenChucVu').val() == " " ||
                $('#inputMucTroCap').val() == " ") {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đầy đủ thông tin',
                    'error'
                )
            } else if (!checkMucTroCap()) {

            } else {
                checkTenChucVu()
            }
        }

        function checkTenChucVu() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?check=" + $('#inputTenChucVu').val();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'exist') {
                        Swal.fire(
                            'Thất bại!',
                            'Đã tồn tại chức vụ trong hệ thống, vui lòng kiểm tra lại!',
                            'error'
                        )
                    } else {
                        addChucVu()
                    }
                }
            };

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function checkMucTroCap() {
            var TroCap = $('#inputNgaySinh').val();
            if (TroCap < 0) {
                Swal.fire(
                    'Thất bại!',
                    'Mức trợ cấp không thể là số âm, vui lòng kiểm tra lại',
                    'error'
                )
                return false
            } else
                return true
        }

        function addChucVu() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?add" +
                "&TenCV=" + $('#inputTenChucVu').val() +
                "&TroCap=" + $('#inputMucTroCap').val();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'success') {
                        Swal.fire(
                            'Thành công!',
                            'Thông tin nhân viên đã được thêm',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Thất bại!',
                            'Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                    }
                }
            };

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
    });
</script>