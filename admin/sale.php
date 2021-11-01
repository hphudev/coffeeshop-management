
<!-- region 1 - danh sách điều khiển -->
<div>
    <div class="container-fluid mt3">
        <div class="row row-header">
            <button type="button" class="col btn btn-warning">Lập Bill</button>
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
                <input id="tbFindItem"  type="text" class="form-control" placeholder="Tìm kiếm món">
        </div>
    </form>
</div>

<!--#region 2 - danh sách món -->
<div class="row menu">
    <?php
        for ($i = 0; $i < count($itemList); $i++)
        {
            $idItem = $itemList[$i]->get_MaMon();
            ?>
            <div id= <?php echo '"' . $itemList[$i]->get_MaMon() . '"'?> class="col">
            <div class="card" style="min-width:150px; max-width:300px">
                <img class="card-img-top" src="https://thecoffeevn.com/wp-content/uploads/2019/06/cach-nhan-biet-ca-phe-nguyen-chat-vs-don-phu-gia.jpg" alt="Card image" style="min-width:200px; max-width:300px")>
                <div class="card-body">
                    <?php
                        echo '<h3 class="card-title mt-1">' . $itemList[$i]->get_TenMon() . '</h3>';
                        echo '<p class="card-text">' . $itemList[$i]->get_MoTa() . '</p>';
                    ?>
                    <div class="d-flex justify-content-around">
                        <button id="btnMinus<?php echo $idItem ?>" type="button" class=" btn btn-danger d-none" onclick="minusNumItem('<?php echo $idItem?>')">
                            <span class="material-icons">
                                remove
                            </span>
                        </button>
                        <button id="btnAdd<?php echo $idItem ?>" type="button" class="btn btn-success" onclick="addNumItem('<?php echo $idItem?>')">
                            <span class="material-icons">
                                add
                            </span>
                            <span id="badge<?php echo $idItem ?>" class="badge badge-danger ml-4 d-none" style="font-size: 13px;">
                                <?php 
                                    echo $modelSale->getNumChoiceItem($idItem) ;
                                ?>
                            </span>
                        </button>
                        
                    </div>
                    <button class="btn btn-info btn-round" style="width: 100%;" data-toggle="modal" data-target="#optionModal" onclick="showOptionTable('<?php echo $idItem?>');">Tùy chọn</button>
                </div>
            </div>
            </div>
    <?php
        }
    ?>
</div>   

<!-- region 3 - bảng tùy chọn-->
<button class="btn btn-round" data-toggle="modal" data-target="#loginModal">
    Login<i class="material-icons">assignment</i>

</button>
<div class="modal fade" id="optionModal" tabindex="-1" role="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-info text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                    <h4 class="card-title">Bảng tùy chọn</h4>
                  </div>
                </div>
                <div class="modal-body">
                        <h5>Tùy chọn kích thước</h5>
                        <div class="optionSize">
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
                        <div class="optionTopping">
                            <div class="form-check">
                                <label class="form-check-label o-topping">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    Trân châu đen/trắng
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-body">
    <h5>Popover in a modal</h5>
    <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
    <hr>
    <h5>Tooltips in a modal</h5>
    <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p>
</div>