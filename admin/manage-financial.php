<div class="container-fluid">
    <h3 style="font-weight: 400;">QUẢN LÝ TÀI CHÍNH</h3>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <h5 style="font-weight: 400;">Thống kê trong ngày</h5>
            <canvas id="myChartPie" style="max-width: 250px; max-height: 250px">
            </canvas>
        </div>
        <div class="col-md-8">
            <canvas id="myChartItem" style="max-width: 100%; max-height: 300px">
            </canvas>
        </div>
    </div>
    <hr>
    <h5 style="font-weight: 400;">Thống kê doanh thu toàn diện</h5>
    <div class="row pl-5 pr-5">
        <div class="btn-group">
            <button type="button" style="height: fit-content;" class="btn btn-danger dropdown-toggle fs-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Thống kê theo
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="reportInYear();">Trong năm</a>
                <a class="dropdown-item" href="#" onclick="reportInMonth();">Trong tháng</a>
                <a class="dropdown-item" href="#" onclick="reportInWeek();">Trong tuần</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="reportInTenYear();">Trong 10 năm</a>
                <a class="dropdown-item" href="#" onclick="reportInTwentyYear()">Trong 20 năm</a>
                <a class="dropdown-item" href="#" onclick="reportAllYear();">Tất cả các năm</a>
            </div>
        </div>
        <canvas id="myChart" style="width: 1000px; ">
        </canvas>
    </div>    
    <hr>
    <h5 style="font-weight: 400;">Báo cáo sử dụng món toàn diện</h5>
    <div class="row pl-5 pr-5 pb-5">
        <!-- <div class="btn-group">
            <button type="button" style="height: fit-content;" class="btn btn-danger dropdown-toggle fs-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Thống kê theo
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Trong năm</a>
                <a class="dropdown-item" href="#">Trong tháng</a>
                <a class="dropdown-item" href="#">Trong tuần</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Trong 10 năm</a>
                <a class="dropdown-item" href="#">Trong 20 năm</a>
                <a class="dropdown-item" href="#">Tất cả các năm</a>
            </div>
        </div> -->
        <canvas id="myChartItemAll">
        </canvas>
    </div>    
</div>