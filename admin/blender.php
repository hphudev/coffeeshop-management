
<div class="container-fluid" style="position: relative; top: -8%">
    <div class="bg-light" style="position: fixed;  z-index: 999; width: 1200px; border-radius: 5px">
        <button type="button" class="col btn" style="font-size: 20px; font-weight: 500; background-color: #343a40;">
            PHIẾU ORDER<span class="badge badge-danger ml-2" style="font-size: 25px;">
            <?php
                $dem = 0;
                for ($i = 0; $i < count($bills); $i++)
                    if ($bills[$i][0]->get_TinhTrang() != 'phuc vu')
                        $dem++;
                echo $dem;
            ?>
        </span>
        </button>
        <div class="mb-3 ml-3">
            <label for="exampleFormControlInput1" class="form-label bg-danger" style="color: white; border-radius: 5px; width: 10%; text-align: center">Tìm kiếm Order</label>
            <input id="tbFindOrder" type="number" class="form-control" style="border: 1px solid red ;background-image: linear-gradient(0, rgba(255, 153, 255 , 0.8), rgba(153, 255, 255, 0.5)); border-radius: 5px; color: black; font-weight: 500; padding-left: 10px; font-size: 20px; width: 20%" placeholder="Nhập số thứ tự Order">
        </div>
    </div>
    <div style="padding-top: 150px; margin-left: 15px">
        <?php 
            for ($i = 0; $i < count($bills); $i++)
            {
                if ($bills[$i][0]->get_TinhTrang() == 'phuc vu')
                    continue;
        ?>  
            <div id="row<?php echo $bills[$i][0]->get_MaDM() ?>" class="row blenderOrders" style="width:max-content;">
                <div id="accordion<?php echo $bills[$i][0]->get_MaDM() ?>" role="tablist">
                    <div class="card card-collapse" style="width: 1200px;">
                        <div class="card-header" style="background-color:tomato;" role="tab" id="heading<?php echo $bills[$i][0]->get_MaDM()?>">
                            <h5 class="mb-0" style="font-size: 20px; font-weight: 500;">
                                <a id="title<?php echo $bills[$i][0]->get_MaDM() ?>" class="text-light" data-toggle="collapse" href="#collapse<?php echo $bills[$i][0]->get_MaDM()?>" aria-expanded="true" aria-controls="collapse<?php echo $bills[$i][0]->get_MaDM()?>" style="display: flex;">
                                    Order <br> <?php echo $bills[$i][0]->get_SoBan() ?>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    <div style="display: flex; margin-left: 65%; ">
                                        <button id="btnState<?php echo $bills[$i][0]->get_MaDM() ?>" type="button" rel="tooltip" class="btn btn-success btn-simple" style="font-weight: 700; margin-right: 5px; <?php echo ($bills[$i][0]->get_TinhTrang() == 'da tiep nhan') ? 'cursor: not-allowed;' : 'cursor: pointer;' ?> " onclick="updateStateOrder('<?php echo $bills[$i][0]->get_MaDM() ?>', 'da tiep nhan')" <?php echo ($bills[$i][0]->get_TinhTrang() == 'da tiep nhan') ? 'disabled' : '' ?>>
                                            <?php echo ($bills[$i][0]->get_TinhTrang() == 'da gui') ? 
                                                'TIẾP NHẬN 
                                                <i class="material-icons">
                                                    volunteer_activism
                                                </i>' : 'ĐÃ TIẾP NHẬN' 
                                            ?>
                                        </button>
                                        <button id="btnCall<?php echo $bills[$i][0]->get_MaDM() ?>" type="button" rel="tooltip" class="btn btn-simple" style=" font-weight: 700;  <?php echo ($bills[$i][0]->get_TinhTrang() == 'da gui') ? 'cursor: not-allowed;' : 'cursor: pointer;' ?> background-color: white; color: black" onclick="updateStateOrder('<?php echo $bills[$i][0]->get_MaDM() ?>', 'phuc vu')" <?php echo ($bills[$i][0]->get_TinhTrang() == 'da gui') ? 'disabled' : '' ?>>
                                            GỌI PHỤC VỤ
                                            <i class="material-icons">person</i>
                                        </button>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse<?php echo $bills[$i][0]->get_MaDM()?>" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion<?php echo $bills[$i][0]->get_MaDM() ?>">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="font-weight: 500;">STT</th>
                                            <th style="width: 300px; font-weight: 500;">Tên món</th>
                                            <th style="width: 300px; font-weight: 500;">Số lượng</th>
                                            <th style="width: 300px; font-weight: 500;">Kích cỡ</th>
                                            <th style="max-width: 100px; font-weight: 500;">Topping</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content<?php echo $bills[$i][0]->get_MaDM() ?>">
                                        <?php 
                                            for($j = 0; $j < count($bills[$i][1]); $j++)
                                            {
                                        ?>
                                        <tr>
                                            <td class="text-center" style="width: 50px;"><?php echo $j + 1 ?></td>
                                            <td><?php echo Model_Sale::getItemName($bills[$i][1][$j][0]->get_MaMon()) ?></td>
                                            <td><?php echo $bills[$i][1][$j][0]->get_SoLuong() ?></td>
                                            <td><?php echo $bills[$i][1][$j][0]->get_TenDonVi() ?></td>
                                            <td style="max-width: 400px;">
                                                <?php
                                                    $tmp = count($bills[$i][1][$j][1]);
                                                    if ($tmp == 0)
                                                        echo 'Không có';
                                                    for ($k = 0; $k < $tmp; $k++)
                                                    {
                                                        echo $bills[$i][1][$j][1][$k];
                                                        if ($k < $tmp - 1)
                                                            echo ', ';
                                                    }
                                                ?> 
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            }
        ?>
    </div>   
</div>