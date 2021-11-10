<script type="text/javascript">

    
    function checkSameName(valueA, valueB)
    {
        valueA = valueA.toLowerCase();
        valueB = valueB.toLowerCase();
        let valueASplit = valueA.split(" ");
        //let valueBSplit = valueB.split(" ");
        let check = false;
        if (valueB.length <= valueASplit.length)
        {
            check = true;
            for (let i = 0; i < valueB.length; i++)
                if (!valueASplit[i].includes(valueB[i]))
                {
                    //console.log(decodeURIComponent(escape(valueASplit[i])) + " " + valueB[i]);
                    check = false;
                    break;
                }
        }
        console.log(valueA.includes(valueB) || check);
        return (valueA.includes(valueB) || check);
    }

     $(document).ready(function () {

        $('[name="orderType"]').on('change', function(){
            if ($(this).val() === "yes")
            {
                console.log("yes");
                $("#tableNumber").collapse('show');
            }
            else
                $("#tableNumber").collapse('hide');

        });
        $('#tbFindItem').keydown(function(event){
            console.log("ok");
            if (event.keyCode == 13)
            {
                    event.preventDefault();
                    return false;
            }
        });

        $('#tbFindItem').on('input',function(e){
            let value = $('#tbFindItem').val();
            let itemList = $('.item');
            // console.log(value);
            for (let i = 0; i < itemList.length; i++)
            {
                let func = {};
                func.name = 'getItemName';
                func.id = itemList[i].getAttribute('id');
                $.ajax({
                    type: "POST",
                    url: "../models/M_BanHang.php",
                    data: {func: JSON.stringify(func)},
                    success: function (response) {
                        let name = JSON.parse(response);
                        if (value == '')
                        {
                            $('#'+ itemList[i].getAttribute('id')).removeClass('d-none');
                            return;
                        }
                        if (!checkSameName(name.toString(), value.toString()))
                        {
                            $('#' + itemList[i].getAttribute('id')).addClass('d-none');
                        }
                        else
                            $('#'+ itemList[i].getAttribute('id')).removeClass('d-none');
                    }
                });
            }
        });
    });

    function saveWork()
    {
        let idItem = sessionStorage.getItem("idItemOptionTable");
        let idItemSession = 'order' + idItem;
        let labelSize = document.getElementsByClassName("label-size");
        let oSize = document.getElementsByClassName("o-size");
        let labelTopping = document.getElementsByClassName("label-topping");
        let oTopping = document.getElementsByClassName("o-topping");
        let value = JSON.parse(sessionStorage.getItem(idItemSession));
        let infoDetailItem = JSON.parse(sessionStorage.getItem('infoDetail' + idItem));
        console.log('osize ' + oSize.length);
        for (let i = 0; i < oSize.length; i++)
        {
            if (oSize[i].checked)
            {
                value.size = labelSize[i].textContent;
                value.price = infoDetailItem[0][i].DonGia;
            }
        }
        value.toppingList = [];
        for (let i = 0; i < oTopping.length; i++)
        {
            if (oTopping[i].checked)
            {
                value.toppingList.push(labelTopping[i].textContent);
            }
        }
        console.log(value);
        console.log(sessionStorage.getItem(idItemSession));
        sessionStorage.setItem(idItemSession, JSON.stringify(value));
        console.log(sessionStorage.getItem(idItemSession));
    }

    function saveWorkOnEditOptionItem(index)
    {
        console.log(index);
        //let idItem = sessionStorage.getItem("idItemOptionTable");
        //let idItemSession = 'order' + idItem;
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        let labelSize = document.getElementsByClassName("label-size");
        let oSize = document.getElementsByClassName("o-size");
        let labelTopping = document.getElementsByClassName("label-topping");
        let oTopping = document.getElementsByClassName("o-topping");
        //let value = JSON.parse(sessionStorage.getItem(idItemSession));
        let infoDetailItem = JSON.parse(sessionStorage.getItem('infoDetail' + bill[index].id));
        console.log('osize' + oSize.length);
        for (let i = 0; i < oSize.length; i++)
        {
            if (oSize[i].checked)
            {
                bill[index].size = labelSize[i].textContent;
                bill[index].price = infoDetailItem[0][i].DonGia;
            }
        }
        bill[index].toppingList = [];
        for (let i = 0; i < oTopping.length; i++)
        {
            if (oTopping[i].checked)    
            {
                bill[index].toppingList.push(labelTopping[i].textContent);
            }
        }
        sessionStorage.setItem('bill', JSON.stringify(bill));
        //console.log(value);
        // console.log(sessionStorage.getItem(idItemSession));
        // sessionStorage.setItem(idItemSession, JSON.stringify(value));
        // console.log(sessionStorage.getItem(idItemSession));
    }

    function oneMoreItem(idItem)
    {
        // alert(idCard);
        let idItemSession = 'order' + idItem;
        let idBadge = 'badge' + idItem;
        let idBtnMinus = 'btnMinus' + idItem;
        let idBtnAddItemToBill = 'btnAddItemToBill' + idItem;
        let idBtnShowOptionItemList = 'btnShowOptionItemList' + idItem;

        let elementBadge = document.getElementById(idBadge);
        let elementBtnMinus = document.getElementById(idBtnMinus);
        let elementBtnAddItemToBill = document.getElementById(idBtnAddItemToBill);
        let elementBtnShowOptionItemList = document.getElementById(idBtnShowOptionItemList);
        console.log(elementBtnAddItemToBill.id);

        if (elementBadge.classList.contains('d-none'))
        {
            elementBadge.classList.remove('d-none');
        }
        if (elementBtnMinus.classList.contains('d-none'))
        {
            elementBtnMinus.classList.remove('d-none');
        }
        if (elementBtnAddItemToBill.classList.contains('d-none'))
        {
            elementBtnAddItemToBill.classList.remove('d-none');
        }
        if (elementBtnShowOptionItemList.classList.contains('d-none'))
        {
            elementBtnShowOptionItemList.classList.remove('d-none');
        }
        if (sessionStorage.getItem(idItemSession) === null)
        {
            let value = {};
            value.id = idItem;
            value.num = 1;
            value.name = "";
            value.size = "";
            value.price = 0;
            value.toppingList = new Array();
            // console.log(value);
            sessionStorage.setItem(idItemSession, JSON.stringify(value));
            // console.log(JSON.stringify(value)); 

        }
        else
        {
            let value = JSON.parse(sessionStorage.getItem(idItemSession));
            value.num++;
            sessionStorage.setItem(idItemSession, JSON.stringify(value));
        }
        
        // console.log(sessionStorage.getItem(idItemSession)); 
        // if ( sessionStorage.getItem(idBadge) === null)
        //     sessionStorage.setItem(idBadge, 0);
        // else
        //     sessionStorage.setItem(idBadge, Number(sessionStorage.getItem(idBadge)) + 1);
        elementBadge.innerHTML = JSON.parse(sessionStorage.getItem(idItemSession)).num; 
    }

    function oneItemOff(idItem)
    {
        // alert(idCard);
        let idItemSession = 'order' + idItem;
        let idBadge = 'badge' + idItem;
        let idBtn = 'btnMinus' + idItem;
        let idBtnAddItemToBill = 'btnAddItemToBill' + idItem;
        let idBtnShowOptionItemList = 'btnShowOptionItemList' + idItem;

        let elementBadge = document.getElementById(idBadge);
        let elementBtnMinus = document.getElementById(idBtn);
        let elementBtnAddItemToBill = document.getElementById(idBtnAddItemToBill);
        let elementBtnShowOptionItemList = document.getElementById(idBtnShowOptionItemList);
        if (Number(elementBadge.textContent) > 0)
        {
            // sessionStorage.setItem(idBadge, Number(sessionStorage.getItem(idBadge)) - 1);
            let value = JSON.parse(sessionStorage.getItem(idItemSession));
            value.num--;
            sessionStorage.setItem(idItemSession, JSON.stringify(value));
            elementBadge.innerHTML = value.num;
        }
        if (elementBadge.textContent == '0')
        {
            elementBtnMinus.classList.add('d-none');
            elementBadge.classList.add('d-none');
            elementBtnAddItemToBill.classList.add('d-none');
            elementBtnShowOptionItemList.classList.add('d-none');
            if (!(sessionStorage.getItem('order' + idItem) === null))
            {
                sessionStorage.removeItem('order' + idItem);
            }

        }
        console.log((sessionStorage.getItem('order' + idItem) === null));

    }

    function checkVisionBadge(idItem)
    {
        //sessionStorage.clear();
        let idItemSession = 'order' + idItem;
        let idBadge = 'badge' + idItem;
        let idBtn = 'btnMinus' + idItem;
        let idBtnAddItemToBill = 'btnAddItemToBill' + idItem;
        let idBtnShowOptionItemList = 'btnShowOptionItemList' + idItem;

        let elementBadge = document.getElementById(idBadge);
        let elementBtnMinus = document.getElementById(idBtn);
        let elementBtnAddItemToBill = document.getElementById(idBtnAddItemToBill);
        let elementBtnShowOptionItemList = document.getElementById(idBtnShowOptionItemList);

        // if (sessionStorage.getItem(idBadge) === null)
        // {
        //     sessionStorage.setItem(idBadge, 0);
        // }

        // elementBadge.innerHTML = sessionStorage.getItem(idBadge);
        //console.log('ccccc' + (sessionStorage.getItem(idItemSession) === null));
        if (!(sessionStorage.getItem(idItemSession) === null))
        {
            let value = JSON.parse(sessionStorage.getItem(idItemSession));
            elementBadge.innerHTML = value.num;
        }
        else
            elementBadge.innerHTML = '0';

        if (Number(elementBadge.textContent) > 0)
        {
            elementBadge.classList.remove('d-none');
            elementBtnMinus.classList.remove('d-none');
            elementBtnAddItemToBill.classList.remove('d-none');
            elementBtnShowOptionItemList.classList.remove('d-none');
        }
    }

    function reloadPage()
    {
        if (confirm("Bạn chưa lưu công việc? Bạn có muốn làm mới trang không?"))
        {
            sessionStorage.clear();
            setTimeout(() => {
                location.reload();
            }, 300); 
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

    function insertCheckStateInOptionSize(value, data)
    {
        if (data === null)
            return "";
        data = JSON.parse(data);
        if (value == data.size)
            return "checked";
        else
            return "";
    }

    function insertCheckStateInOptionTopping(value, data)
    {
        if (data === null)
            return "";
        data = JSON.parse(data);
        for (let i = 0; i < data.toppingList.length; i++)
        {
            if (value == data.toppingList[i])
                return "checked";
        }
        return "";
    }

    function showOptionTable($idItem)
    {
        //console.log("okll");
        let func = {};
        func.name = "showItemOptionsTable";
        func.id = $idItem;
        func.data = sessionStorage.getItem('order' + $idItem);
        sessionStorage.setItem('idItemOptionTable', $idItem);
        $.ajax({
            method: "POST",
            data: {func: JSON.stringify(func)},
            url: "../models/M_BanHang.php",
            success: function(response){
                sessionStorage.setItem('infoDetail' + $idItem, response);
                $res = JSON.parse(response);
                console.log($res);
                document.getElementById('optionSize').innerHTML = "";
                for (let i = 0; i < $res[0].length; i++)
                {
                    $html = '<div class="form-check form-check-radio">' +
                                '<label class="form-check-label text-dark label-size">' + 
                                    '<input class="form-check-input o-size" type="radio" name="exampleRadio" value="option1" ' + insertCheckStateInOptionSize($res[0][i].TenKichThuoc, sessionStorage.getItem('order' + $idItem)) +'/>' +
                                    $res[0][i].TenKichThuoc +
                                    '<span class="circle">' +
                                        '<span class="check"></span>' +
                                    '</span>' +
                                '</label>' +
                            '</div>';
                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild)
                    {
                        document.getElementById('optionSize').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('optionTopping').innerHTML = "";
                for (let i = 0; i < $res[1].length; i++)
                {
                    $html = '<div class="form-check">' +
                                '<label class="form-check-label text-dark label-topping">' + 
                                    '<input class="form-check-input o-topping" type="checkbox" value="" ' + insertCheckStateInOptionTopping($res[1][i].TenTopping, sessionStorage.getItem('order' + $idItem)) +'/>' + 
                                    $res[1][i].TenTopping + 
                                    '<span class="form-check-sign">' + 
                                        '<span class="check"></span>' + 
                                    '</span>' + 
                                '</label>' + 
                            '</div>';
                            
                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild)
                    {
                        document.getElementById('optionTopping').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('AddOption').removeAttribute('onclick');
                let tmp = saveWork();
                document.getElementById('AddOption').setAttribute('onclick', "saveWork();");
            }
        });
    }

    function showOptionTableForListOrder(index)
    {
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        $data = bill[index];
        console.log($data);
        let func = {};
        func.name = "showItemOptionsTable";
        func.id = $data.id;
        //func.data = sessionStorage.getItem('order' + $idItem);
        sessionStorage.setItem('idItemOptionTable', $data.id);
        $.ajax({
            method: "POST",
            data: {func: JSON.stringify(func)},
            url: "../models/M_BanHang.php",
            success: function(response){
                sessionStorage.setItem('infoDetail' + $data.id, response);
                $res = JSON.parse(response);
                console.log($res);
                console.log('vào');
                //$dataParse = JSON.parse($data);
                document.getElementById('optionSize').innerHTML = "";
                for (let i = 0; i < $res[0].length; i++)
                {
                    $html = '<div class="form-check form-check-radio">' +
                                '<label class="form-check-label text-dark label-size">' + 
                                    '<input class="form-check-input o-size" type="radio" name="exampleRadio" value="option1" ' + insertCheckStateInOptionSize($res[0][i].TenKichThuoc, JSON.stringify($data)) +'/>' +
                                    $res[0][i].TenKichThuoc +
                                    '<span class="circle">' +
                                        '<span class="check"></span>' +
                                    '</span>' +
                                '</label>' +
                            '</div>';
                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild)
                    {
                        document.getElementById('optionSize').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('optionTopping').innerHTML = "";
                for (let i = 0; i < $res[1].length; i++)
                {
                    $html = '<div class="form-check">' +
                                '<label class="form-check-label text-dark label-topping">' + 
                                    '<input class="form-check-input o-topping" type="checkbox" value="" ' + insertCheckStateInOptionTopping($res[1][i].TenTopping, JSON.stringify($data)) +'/>' + 
                                    $res[1][i].TenTopping + 
                                    '<span class="form-check-sign">' + 
                                        '<span class="check"></span>' + 
                                    '</span>' + 
                                '</label>' + 
                            '</div>';
                            
                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild)
                    {
                        document.getElementById('optionTopping').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('AddOption').removeAttribute('onclick');
                document.getElementById('AddOption').setAttribute('onclick', "saveWorkOnEditOptionItem(" + index +");");
            }
        });
    }

    function addItemToBill($idItem)
    {
        // if (sessionStorage.getItem('Bill') === null)
        // {
        //     sessionStorage.setItem('Bill', new Array());
        // }
        // let tmp = sessionStorage.getItem('Bill');

        // sessionStorage.setItem('Bill', tmp);
        // console.log(sessionStorage.getItem('Bill'));
        if (sessionStorage.getItem('bill') === null)
        {
            let bill = [];
            sessionStorage.setItem('bill', JSON.stringify(bill));
        }
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        let value = JSON.parse(sessionStorage.getItem('order' + $idItem));
        bill.push(value);
        sessionStorage.setItem('bill', JSON.stringify(bill));
        sessionStorage.removeItem('order' + $idItem);
        location.reload();
        // console.log(JSON.parse(sessionStorage.getItem('bill')));    
        // console.log(sessionStorage.getItem('order' + $idItem));
    }

    function convertNumToStringHaveDot($num)
    {
        $num = $num.toString();
        let res = "";
        let count = 0;
        for (let i = $num.length - 1; i >= 0 ; i--)
        {
            count++;
            if (count == 3)
            {
                count = 0;
                if (i > 0)
                    res = "." + $num[i] + res; 
                else
                    res = $num[i] + res;
            }
            else
            {
                res = $num[i] + res;
            }
        }
        return res;
    }

    function editAddItem(serial)
    {
        //console.log(serialBill);
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        bill[serial].num++;
        let elementBill = document.getElementById('bill_' + serial.toString());
        elementBill.getElementsByClassName('card-title')[0].innerHTML = bill[serial].name + ' (' + convertNumToStringHaveDot(bill[serial].price * bill[serial].num) + ' vnđ)';
        elementBill.getElementsByClassName('card-description')[0].innerHTML = 'Số lượng: ' + '<span class="text-info">' + bill[serial].num + '</span>' + '; Size: ' + '<span class="text-info">' +  bill[serial].size + '</span>' +'; Topping: ' + '<span class="text-info">' + bill[serial].toppingList + '</span>';
        bill = JSON.stringify(bill);
        sessionStorage.setItem('bill', bill);
    }

    function editMinusItem(serial)
    {
        //console.log(serialBill);
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        if (bill[serial].num == 1)
        {
            if (!confirm("Bạn có muốn hủy món " + bill[serial].name + " hay không?"))
            {
                return;
            }
        }
        //console.log("vao");
        bill[serial].num--;
        if (bill[serial].num == 0)
        {
            document.getElementsByClassName('row-bill_' + serial.toString())[0].remove();
            bill.splice(serial, 1);
            bill = JSON.stringify(bill);
            sessionStorage.setItem('bill', bill);
            return;
        }
        let elementBill = document.getElementById('bill_' + serial.toString());
        elementBill.getElementsByClassName('card-title')[0].innerHTML = bill[serial].name + ' (' + convertNumToStringHaveDot(bill[serial].price * bill[serial].num) + ' vnđ)';
        elementBill.getElementsByClassName('card-description')[0].innerHTML = 'Số lượng: ' + '<span class="text-info">' + bill[serial].num + '</span>' + '; Size: ' + '<span class="text-info">' +  bill[serial].size + '</span>' +'; Topping: ' + '<span class="text-info">' + bill[serial].toppingList + '</span>';
        console.log(bill);
        bill = JSON.stringify(bill);
        sessionStorage.setItem('bill', bill);
    }


    function editDeleteItem(index)
    {
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        if (!confirm("Bạn có muốn hủy món " + bill[index].name + " hay không?"))
        {
            return;
        }
        document.getElementsByClassName('row-bill_' + index.toString())[0].remove();
        bill.splice(index, 1);
        bill = JSON.stringify(bill);
        sessionStorage.setItem('bill', bill);
    }

    function showBill()
    {
        document.getElementById('contentOrder').innerHTML = "";
        if (sessionStorage.getItem('bill') === null)
            return;
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        console.log(bill);
        let elementContentBill = document.getElementById('contentOrder');
        for (let i = 0; i < bill.length; i++)
        {
            let func = {};
            func.name = "getItemName";
            func.id = bill[i].id;
            $.ajax({
                type: "POST",
                url: "../models/M_BanHang.php",
                data: {func: JSON.stringify(func)},
                success: function (response) {
                    bill[i].name = JSON.parse(response);
                    sessionStorage.setItem('bill', JSON.stringify(bill));
                    //let stringBill = JSON.stringify(bill[i]).toString();
                    console.log(JSON.stringify(bill[i]));
                    let html = '<div class="row row-bill_' + i.toString() + '">' + 
                                    '<div class="card card-pricing bg-dark mr-3 ml-3 pl-3 pr-3">' + 
                                            '<div class="card-body" id="bill_' + i.toString() +'">' +
                                                '<div class="card-icon">' +
                                                    '<i class="material-icons">business</i>' +
                                                '</div>' +
                                                '<h3 class="card-title">' + bill[i].name + ' (' + convertNumToStringHaveDot(bill[i].price * bill[i].num) + ' vnđ)' + '</h3>' + 
                                                '<p class="card-description">' + 
                                                    'Số lượng: ' + '<span class="text-info">' + bill[i].num + '</span>' + '; Size: ' + '<span class="text-info">' +  bill[i].size + '</span>' +'; Topping: ' + '<span class="text-info">' + bill[i].toppingList + '</span>' + 
                                                '</p>' +
                                                "<a href='#pablo' class='btn btn-white btn-round text-dark mr-1' onclick='editDeleteItem(" + i +")'>XÓA</a>" +
                                                "<a href='#pablo' class='btn btn-info btn-round text-white mr-1' data-toggle='modal' data-target='#optionModal' onclick='showOptionTableForListOrder(" + i + ");'>TÙY CHỌN</a>" + //mã hóa json truyền vào hàm trong js sẽ chuyển thành object
                                                "<a href='#pablo' class='btn btn-danger btn-round text-white mr-1' onclick='editMinusItem(" + i + ")'>GIẢM</a>" +
                                                "<a href='#pablo' class='btn btn-success btn-round text-white mr-1' onclick='editAddItem(" + i + ")'>TĂNG</a>" +
                                            '</div>' +
                                    '</div>' +
                                '</div>';
            let newcontent = document.createElement('div');
            newcontent.innerHTML = html;
            while (newcontent.firstChild)
            {
                elementContentBill.appendChild(newcontent.firstChild);
            }
                }
            });     
        }
    }
</script>

<?php
    include_once '../models/M_BanHang.php';
    //include '../models/M_General_CMD.php';

    if (1 == 2)
        die("Bạn không có quyền truy cập, ok?");

    //$modelSale->sortItemListByNumChoice();
    $itemList = Model_Sale::getItemListFromServer();
    echo
    '  
        <script type="text/javascript">
            sessionStorage.setItem("itemList", ' . json_encode($itemList) .')
        </script>
    ';
    include('../admin/sale.php');
    for ($i = 0; $i < count($itemList); $i++)
    {
        echo 
        '
            <script type="text/javascript">
                checkVisionBadge(\''. $itemList[$i]->get_MaMon() .'\');
            </script>
        ';
    }
?>
