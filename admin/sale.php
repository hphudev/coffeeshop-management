
<!-- region 1 - danh sách điều khiển -->
<div>
    <div class="container-fluid mt3">
        <div class="row row-header">
            <button type="button" class="col btn btn-warning" data-toggle="modal" data-target="#bill" onclick="showBill();">Xem ORDER</button>
            <button type="button" class="col btn btn-info">
                Thông báo <span class="badge badge-danger ml-2" style="font-size: 13px;">4</span>
            </button>
            <button id="btnReloadBill" type="button" class="col btn btn-danger" onclick="reloadPage();">Làm mới Bill</button>
            <button id="btnReloadPage" type="button" class="col btn btn-primary" onclick="location.reload();">Tải lại trang</button>
        </div>
    </div class="container mt3">
    <form action="">
        <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">search</i>
                    </span>
                </div>
                <input id="tbFindItem" class="form-control"  type="text" value = "" style="">
        </div>
    </form>
</div>

<!--#region 2 - danh sách món -->
<div class="row menu" style="width: fit-content;">
<?php
    for ($i = 0; $i < count($itemList); $i++)
    {
        
        // https://thecoffeevn.com/wp-content/uploads/2019/06/cach-nhan-biet-ca-phe-nguyen-chat-vs-don-phu-gia.jpg
        $idItem = $itemList[$i]->get_MaMon();
        // if ($i % 3 == 0)
        ?>
        <div id= <?php echo '"' . $itemList[$i]->get_MaMon() . '"'?> class="col item">
            <div class="card align-items-top justify-content-center" style="width: 250px; padding: 0px; border-radius: 10px">
                <img class="card-img-left" src="data:image/jpeg;base64,<?php echo base64_encode($itemList[$i]->get_HinhAnh())?>" alt="Card image" style="width: 100%; height: 150px; border-radius: 10px 10px 0 0;")>
                <div class="card-body d-flex flex-column align-items-top justify-content-top"> 
                    <?php
                        echo '
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <h class="card-title" style="font-weight: 500; font-size: 20px">' . $itemList[$i]->get_TenMon() . '</h>
                                    </div>
                                    <div class="col" style="text-align: right">
                                        <span class="material-icons text-info"">
                                            info
                                        </span>
                                    </div>
                                </div>
                            </div>';
                        // echo '
                        //     <div class="row">
                        //         <div class="col">
                        //             <p class="card-text" style="width: 100%"> Mô tả: ' . $itemList[$i]->get_MoTa() . 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                        //         </div>
                        //     </div>';
                        // echo '<p class="card-text"> Mô tả: ' . $itemList[$i]->get_MoTa() . '</p>';
                    ?>
                    <div style="text-align: center;">
                        <button id="btnMinus<?php echo $idItem ?>" type="button" class=" btn btn-danger btn-circle d-none  pt-2 pb-2 pl-3 pr-3" onclick="oneItemOff('<?php echo $idItem?>')">
                            <span class="material-icons">
                                remove
                            </span>
                        </button>
                        <span id="badge<?php echo $idItem ?>" class="badge badge-light d-none" style="font-size: 13px; width:60px; height: 25px; border: 1px solid orange">0</span>
                        <button id="btnAdd<?php echo $idItem ?>" type="button" class="btn btn-success pt-2 pb-2 pl-3 pr-3" onclick="oneMoreItem('<?php echo $idItem?>')">
                            <span class="material-icons" style="">
                                add
                            </span>
                        </button>
                    </div>
                    <button id="btnShowOptionItemList<?php echo $idItem?>" class="btn btn-info d-none" style="min-width:200px; bolder-radius: 30px 30px 0 0;" data-toggle="modal" data-target="#optionModal" onclick="showOptionTable('<?php echo $idItem?>');">Tùy chọn</button>
                    <button id="btnAddItemToBill<?php echo $idItem?>" class="btn btn-warning d-none" style="min-width: 200px;" data-toggle="modal" data-target="" onclick="addItemToBill('<?php echo $idItem ?>')">Thêm vào BILL</button>
                </div>
            </div>
        </div>
    <?php }?>
</div>
  

<!-- region 3 - bảng tùy chọn-->
<!-- <button class="btn btn-round" data-toggle="modal" data-target="#bill">
    Login<i class="material-icons">assignment</i>

</button> -->

<div class="modal fade modal-dialog-scrollable" id="bill" tabindex="-1" role="">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 95vw; left: 50%; top:50%; transform: translateX(-50%)">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-danger text-center w-100">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                    <h4 class="card-title">ORDER</h4>
                  </div>
                </div>
                <div class="modal-body" style="width: 100%">
                    <!-- <div class="row ml-3">
                        <h5>Hình thức order</h5>
                        <div class="ml-4">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="orderType" id="orderTypeHome" value="no" checked>
                                        Mang về
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div >
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="orderType" id="orderTypeTable" value="yes"> 
                                            Tại bàn
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="collapseOne ml-3 collapse hide" id="tableNumber">
                                    <div>
                                        <input id="" class="form-control"  type="text" value = "" placeholder="Nhập số bàn">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> -->
                    <table class="table" style=" overflow: scroll;">
                        <thead>
                            <tr>
                                <th scope="col" style="font-weight: 500; width: 50px">STT</th>
                                <th scope="col" style="font-weight: 500; width: 150px">Tên món</th>
                                <th scope="col" style="font-weight: 500; width: 80px">Kích thước</th>
                                <th scope="col" style="font-weight: 500; width: 70px">Số lượng</th>
                                <th scope="col" style="font-weight: 500; width: 70px">Đơn giá</th>
                                <th scope="col" style="font-weight: 500; width: 80px">Thành tiền</th>
                                <th scope="col" style="font-weight: 500; width: 200px">Topping</th>
                                <th scope="col" style="font-weight: 500; width: 50px">Tùy chọn</th>
                                <th scope="col" style="font-weight: 500; width: 50px">Giảm</th>
                                <th scope="col" style="font-weight: 500; width: 50px">Tăng</th>
                                <th scope="col" style="font-weight: 500; width: 50px">Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="contentOrder" style="overflow-x: hidden;">
                        </tbody>
                    </table>
                    <!-- <div  style="width: 100%;">
                        
                        <div class="row">
                                <div class="card card-pricing bg-dark mr-3 ml-3 pl-3 pr-3">
                                        <div class="card-body">
                                            <div class="card-icon">
                                                <i class="material-icons">business</i>
                                            </div>
                                            <h3 class="card-title">Trà sữa (50000 vnđ)</h3>
                                            <p class="card-description">
                                                SL: 5; Size: M; Topping: A, B, C
                                            </p>
                                            <a href="#pablo" class="btn btn-white btn-round text-danger">XÓA</a>
                                            <a href="#pablo" class="btn btn-white btn-round text-dark">THAY ĐỔI</a>
                                        </div>
                                </div>
                        </div>
                            <div class="row">
                                <div class="card card-pricing bg-dark mr-3 ml-3 pl-3 pr-3">
                                        <div class="card-body">
                                            <div class="card-icon">
                                                <i class="material-icons">business</i>
                                            </div>
                                            <h3 class="card-title">Trà sữa (50000 vnđ)</h3>
                                            <p class="card-description">
                                                SL: 5; Size: M; Topping: A, B, C
                                            </p>
                                            <a href="#pablo" class="btn btn-white btn-round text-danger">XÓA</a>
                                            <a href="#pablo" class="btn btn-white btn-round text-dark">THAY ĐỔI</a>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card card-pricing bg-dark mr-3 ml-3 pl-3 pr-3">
                                        <div class="card-body">
                                            <div class="card-icon">
                                                <i class="material-icons">business</i>
                                            </div>
                                            <h3 class="card-title">Trà sữa (50000 vnđ)</h3>
                                            <p class="card-description">
                                                SL: 5; Size: M; Topping: A, B, C
                                            </p>
                                            <a href="#pablo" class="btn btn-white btn-round text-danger">XÓA</a>
                                            <a href="#pablo" class="btn btn-info btn-round text-white">TÙY CHỌN</a>
                                            <a href="#pablo" class="btn btn-danger btn-round text-white">GIẢM</a>
                                            <a href="#pablo" class="btn btn-success btn-round text-white">TĂNG</a>
                                        </div>
                                </div>
                            </div>
                    </div> -->
                </div>
                <div class="modal-footer justify-content-center">
                    <a id="SendToBill" class="btn btn-danger btn-link btn-wd btn-lg" onclick="" data-toggle="modal" data-target="#optionModal">THANH TOÁN</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade" id="optionModal" tabindex="-1" role="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-info text-center w-100">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                    <h4 class="card-title">Bảng tùy chọn</h4>
                  </div>
                </div>
                <div class="modal-body">
                        <h5>Tùy chọn kích thước</h5>
                        <div id="optionSize">
                            <div id="sizeTenKichThuoc" class="form-check form-check-radio">
                                <label class="form-check-label o-size">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" />
                                    Size M
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    
                    <hr> 
                        <h5 >Tùy chọn Topping</h5>
                        <div id="optionTopping">
                            <div class="form-check">
                                <label class="form-check-label o-topping">
                                    <input class="form-check-input" type="checkbox" value=""/>
                                    Trân châu đen/trắng
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a id="AddOption" class="btn btn-success btn-link btn-wd btn-lg" data-toggle="modal" data-target="#optionModal">Xong</a>
                </div>
            </div>
        </div>
    </div>
</div>