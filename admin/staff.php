<div class="container-fluid">
    <?php
    if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], "nhansu0")) {
        include_once '../admin/staff/nhanvien.php';
    }
    ?>
    <?php
    if ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], "nhansu2")) {
        include_once '../admin/staff/chucvu.php';
    }
    ?>
</div>