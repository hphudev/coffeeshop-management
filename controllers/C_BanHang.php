<script type="text/javascript">

     $(document).ready(function () {
        $('#tbFindItem').keydown(function(event){
            console.log("ok");
            if (event.keyCode == 13)
            {
                    event.preventDefault();
                    return false;
            }
        });
    });

    

    function addNumItem(idItem)
    {
        // alert(idCard);
        let elementBadge = document.getElementById('badge' + idItem);
        let elementBtnMinus = document.getElementById('btnMinus' + idItem);
        if (elementBadge.classList.contains('d-none'))
        {
            elementBadge.classList.remove('d-none');
        }
        if (elementBtnMinus.classList.contains('d-none'))
        {
            elementBtnMinus.classList.remove('d-none');
        }
        elementBadge.innerHTML = Number(elementBadge.textContent) + 1;

        let value = {};
        value.id = idItem;
        value.name = "addItem";
        sendJSON(value, "post", "#");
        
    }

    function minusNumItem(idItem)
    {
        // alert(idCard);
        let elementBadge = document.getElementById('badge' + idItem);
        let elementBtnMinus = document.getElementById('btnMinus' + idItem);
        if (Number(elementBadge.textContent) > 0)
        {

            let value = {};
            value.id = idItem;
            value.name = "minusItem";
            sendJSON(value, "post", "#");
            elementBadge.innerHTML = Number(elementBadge.textContent) - 1;
        }
        if (elementBadge.textContent == '0')
        {
            // elementButton.classList.add('d-none');
            elementBtnMinus.classList.add('d-none');
            elementBadge.classList.add('d-none');
        }
    }

    function checkVisionBadge(idItem)
    {
        // alert("ko");
        let elementBadge = document.getElementById('badge' + idItem);
        let elementBtnMinus = document.getElementById('btnMinus' + idItem);
        if (Number(elementBadge.textContent) > 0)
        {
            elementBadge.classList.remove('d-none');
            elementBtnMinus.classList.remove('d-none');
        }
    }

    function reloadPage()
    {
        if (confirm("Bạn chưa lưu công việc? Bạn có muốn làm mới trang không?"))
        {
            // alert("ok");
            let func = {};
            func.name = "session_unset";
            sendJSON(func, "post", "#");
            location.reload();
        }
    }

    function sendJSON(value, method, link){
        $.ajax({
            method: method,
            url: link,
            data: {func: JSON.stringify(value)},
            success: function (res) {
                //console.log(res);
            }
        });
    }

    function showOptionTable($idItem)
    {
        let func = {};
        func.name = "showOption";
        func.id = $idItem;
        $.ajax({
            method: "POST",
            data: {func: JSON.stringify(func)},
            url: "../models/M_BanHang.php",
            success: function(response){
                console.log(response);
            },
        });
    }
</script>

<?php
    include '../models/M_BanHang.php';
    include '../models/M_General_CMD.php';

    if (1 == 2)
        die("Bạn không có quyền truy cập, ok?");
    
        class C_BanHang
    {
        public function __construct()
        {
        }
    }

    $modelSale->sortItemListByNumChoice();
    $itemList = $modelSale->getItemListFromLocal();
    include('../admin/sale.php');
    for ($i = 0; $i < count($itemList); $i++)
    {
        $num = $modelSale->getNumChoiceItem($itemList[$i]->get_MaMon());
        if ($num > 0)
            echo 
            '
                <script type="text/javascript">
                    checkVisionBadge(\''. $itemList[$i]->get_MaMon() .'\');
                </script>
            ';
    }
?>
