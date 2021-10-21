<?php
include '../models/ChucVu.php';
$limit = 10;
$page = 0;
$cvArray = array();
for ($i = 1; $i <= 30; $i++) {
    $cv = new ChucVu();
    $cv->set_MaCV("CV0" . $i);
    $cv->set_TenCV("Phục vụ");
    $cv->set_MucTroCap("200.000đ");
    array_push($cvArray, $cv);
}
?>

<div class="container-fluid">
    <div class="row">
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
                                    <table id="tableType" class="table table-hover">
                                        <thead class="text-success">
                                            <th>Mã chức vụ</th>
                                            <th>Tên chức vụ</th>
                                            <th>Mức trợ cấp</th>
                                            <th class="text-right">Thao tác</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            for ($i = $page; $i < 5; $i++) {
                                                echo "<tr>";
                                                echo "<td>" . $cvArray[$i]->get_MaCV() . "</td>";
                                                echo "<td>" . $cvArray[$i]->get_TenCV() . "</td>";
                                                echo "<td>" . $cvArray[$i]->get_MucTroCap() . "</td>";

                                            ?>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa nhân viên">
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
                        <div class="row"></div>
                        <div class="row"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h2 class="card-title">Danh sách nhân viên</h2>
                    <div>
                        <button id="btnAddNV" type="button" rel="tooltip" class="btn btn-success">
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
                                                echo "<tr>";
                                                echo "<td>" . $NhanVienList[$i]->get_MaNV() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_HoTenDem() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_Ten() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_MaCV() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_NgayVaoLam() . "</td>";
                                                echo "<td>" . $NhanVienList[$i]->get_Luong() . "</td>";

                                            ?>
                                                <td class="td-actions text-right">
                                                    <button <?php
                                                            echo 'id = "' . $NhanVienList[$i]->get_MaNV() . '"'
                                                            ?> type="button" rel="tooltip" class="btn btn-View btn-link btn-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="Thông tin chi tiết">
                                                        <i class="material-icons">person</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa nhân viên">
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
</div>

<script>
    $(document).ready(function() {
        var tableNV = $('#tableNV').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });
        var tableType = $('#tableType').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });
        $(".btn-View").click(function() {
            var nvID = $(this).attr('id')
            window.location.href = "../admin/index.php?page=staff&id=" + nvID;
        });
    });
</script>