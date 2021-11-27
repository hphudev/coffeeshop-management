<script type="text/javascript">
    function checkSameName(valueA, valueB) {
        valueA = valueA.toLowerCase();
        valueB = valueB.toLowerCase();
        let valueASplit = valueA.split(" ");
        //let valueBSplit = valueB.split(" ");
        let check = false;
        if (valueB.length <= valueASplit.length) {
            check = true;
            for (let i = 0; i < valueB.length; i++)
                if (!valueASplit[i].includes(valueB[i])) {
                    //console.log(decodeURIComponent(escape(valueASplit[i])) + " " + valueB[i]);
                    check = false;
                    break;
                }
        }
        console.log(valueA.includes(valueB) || check);
        return (valueA.includes(valueB) || check);
    }

    $(document).ready(function() {

        $('[name="orderType"]').on('change', function() {
            if ($(this).val() === "yes") {
                console.log("yes");
                $("#tableNumber").collapse('show');
            } else
                $("#tableNumber").collapse('hide');

        });
        $('#tbFindItem').keydown(function(event) {
            console.log("ok");
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        $('#tbFindItem').on('input', function(e) {
            // console.log("vào");
            let value = $('#tbFindItem').val();
            let itemList = $('.item');
            // console.log(value);
            for (let i = 0; i < itemList.length; i++) {
                let func = {};
                func.name = 'getItemName';
                func.id = itemList[i].getAttribute('id');
                $.ajax({
                    type: "POST",
                    url: "../models/M_BanHang.php",
                    data: {
                        func: JSON.stringify(func)
                    },
                    success: function(response) {
                        let name = JSON.parse(response);
                        if (value == '') {
                            $('#' + itemList[i].getAttribute('id')).removeClass('d-none');
                            return;
                        }
                        if (!checkSameName(name.toString(), value.toString())) {
                            $('#' + itemList[i].getAttribute('id')).addClass('d-none');
                        } else
                            $('#' + itemList[i].getAttribute('id')).removeClass('d-none');
                    }
                });
            }
        });
    });

    function payOrder() {
        // if (sessionStorage`)
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        if (bill === null || bill.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Order không có món',
                showConfirmButton: true,
                timer: 2000
            });
            return;
        } else
            Swal.fire({
                icon: 'info',
                title: 'Đang thanh toán',
                text: 'Hệ thống đang gửi order lên nhà bếp và in phiếu thanh toán',
                showConfirmButton: false,
                allowOutsideClick: false
                // timer: 800
            });
        Swal.showLoading();
        setTimeout(() => {
            let func = {};
            // func.id = "MON001";
            func.name = "saveOrder";
            func.data = JSON.parse(sessionStorage.getItem('bill'));
            console.log(func);
            $.ajax({
                type: "POST",
                data: {
                    func: JSON.stringify(func)
                },
                url: "../models/M_BanHang.php",
                // dataType: "json",
                timeout: 5000,
                success: function(response) {
                    Swal.close();
                    //console.log(response);
                    sessionStorage.removeItem('bill');
                    $("#bill").modal('hide');
                    // Swal.fire({
                    //     title: response
                    // })
                    $.ajax({
                        type: "POST",
                        url: "/coffeeshopmanagement/controllers/C_HoaDon.php",
                        data: {
                            action: "pay",
                            id: response,
                        },
                        beforeSend: function() {},
                        success: function(response) {
                            //alert(response)
                            $("#modalThanhToan").html(response)
                        },
                        complete: function() {},
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    })
                    // if (true)
                    // {
                    //     Swal.fire({
                    //         title: 'Thanh toán thành công',
                    //         icon: 'success',
                    //         showConfirmButton: false,
                    //         timer: 700
                    //     });
                    // }
                    // else
                    // {
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'Không thể thanh toán',
                    //         text: 'Hệ thống gặp sự cố! Vui lòng liên hệ nhà phát hành!', 
                    //         showConfirmButton: true,
                    //         timer: 3000 
                    //     });
                    // }

                },
                error: function(xmlhttprequest, textstatus, message) {
                    if (textstatus === "timeout") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Thời gian phản hồi quá lâu',
                            text: 'Không thể thanh toán vì có sự cố máy chủ',
                            showConfirmButton: true,
                            timer: 3000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Không thể thanh toán',
                            text: 'Hệ thống gặp sự cố! Vui lòng liên hệ nhà phát hành!',
                            showConfirmButton: true,
                            timer: 3000
                        });
                    }
                }
            });
            // func = {};
            // func.name = "getItemName";
            // func.id = "MON001";
            // $.ajax({
            //     type: "POST",
            //     url: "../models/M_BanHang.php",
            //     data: {func: JSON.stringify(func)},
            //     success: function (response) {
            //         console.log(response);
            //     }
            // });
        }, 1200);

    }

    function saveWork() {
        let idItem = sessionStorage.getItem("idItemOptionTable");
        let idItemSession = 'order' + idItem;
        let labelSize = document.getElementsByClassName("label-size");
        let oSize = document.getElementsByClassName("o-size");
        let labelTopping = document.getElementsByClassName("label-topping");
        let oTopping = document.getElementsByClassName("o-topping");
        let value = JSON.parse(sessionStorage.getItem(idItemSession));
        let infoDetailItem = JSON.parse(sessionStorage.getItem('infoDetail' + idItem));
        console.log('osize ' + oSize.length);
        // console.log(value);  
        for (let i = 0; i < oSize.length; i++) {
            if (oSize[i].checked) {
                value.size = labelSize[i].textContent;
                value.price = infoDetailItem[0][i].DonGia;
            }
        }
        value.toppingList = [];
        for (let i = 0; i < oTopping.length; i++) {
            if (oTopping[i].checked) {
                value.toppingList.push(labelTopping[i].textContent);
            }
        }
        console.log(value);
        console.log(infoDetailItem);
        console.log(sessionStorage.getItem(idItemSession));
        sessionStorage.setItem(idItemSession, JSON.stringify(value));
        console.log(sessionStorage.getItem(idItemSession));
    }

    function saveWorkOnEditOptionItem(index) {
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
        for (let i = 0; i < oSize.length; i++) {
            if (oSize[i].checked) {
                bill[index].size = labelSize[i].textContent;
                bill[index].price = infoDetailItem[0][i].DonGia;
            }
        }
        bill[index].toppingList = [];
        for (let i = 0; i < oTopping.length; i++) {
            if (oTopping[i].checked) {
                bill[index].toppingList.push(labelTopping[i].textContent);
            }
        }
        sessionStorage.setItem('bill', JSON.stringify(bill));
        let elementBill = document.getElementById('bill_' + index.toString());
        let elementChild = elementBill.getElementsByClassName('des');
        // console.log(elementChild);
        elementChild[0].innerHTML = bill[index].size;
        elementChild[2].innerHTML = bill[index].price;
        // elementChild[1].innerHTML = bill[serial].num;
        elementChild[4].innerHTML = bill[index].toppingList;
        // console.log(elementChild[3].textContent);
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '',
            showConfirmButton: false,
            timer: 700
        }).then(() => {
            // location.reload();
            console.log("ok");
        });
        elementChild[3].innerHTML = convertNumToStringHaveDot(bill[index].price * bill[index].num);
        //console.log(value);
        // console.log(sessionStorage.getItem(idItemSession));
        // sessionStorage.setItem(idItemSession, JSON.stringify(value));
        // console.log(sessionStorage.getItem(idItemSession));
    }

    function oneMoreItem(idItem) {
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

        if (elementBadge.classList.contains('d-none')) {
            elementBadge.classList.remove('d-none');
        }
        if (elementBtnMinus.classList.contains('d-none')) {
            elementBtnMinus.classList.remove('d-none');
        }
        if (elementBtnAddItemToBill.classList.contains('d-none')) {
            elementBtnAddItemToBill.classList.remove('d-none');
        }
        if (elementBtnShowOptionItemList.classList.contains('d-none')) {
            elementBtnShowOptionItemList.classList.remove('d-none');
        }
        if (sessionStorage.getItem(idItemSession) === null) {
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

        } else {
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
        showOptionTable(idItem);
        setTimeout(() => {
            saveWork();
        }, 500);
    }

    function oneItemOff(idItem) {
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
        if (Number(elementBadge.textContent) > 0) {
            // sessionStorage.setItem(idBadge, Number(sessionStorage.getItem(idBadge)) - 1);
            let value = JSON.parse(sessionStorage.getItem(idItemSession));
            value.num--;
            sessionStorage.setItem(idItemSession, JSON.stringify(value));
            elementBadge.innerHTML = value.num;
        }
        if (elementBadge.textContent == '0') {
            elementBtnMinus.classList.add('d-none');
            elementBadge.classList.add('d-none');
            elementBtnAddItemToBill.classList.add('d-none');
            elementBtnShowOptionItemList.classList.add('d-none');
            if (!(sessionStorage.getItem('order' + idItem) === null)) {
                sessionStorage.removeItem('order' + idItem);
            }

        }
        console.log((sessionStorage.getItem('order' + idItem) === null));

    }

    function checkVisionBadge(idItem) {
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
        if (!(sessionStorage.getItem(idItemSession) === null)) {
            let value = JSON.parse(sessionStorage.getItem(idItemSession));
            elementBadge.innerHTML = value.num;
        } else
            elementBadge.innerHTML = '0';

        if (Number(elementBadge.textContent) > 0) {
            elementBadge.classList.remove('d-none');
            elementBtnMinus.classList.remove('d-none');
            elementBtnAddItemToBill.classList.remove('d-none');
            elementBtnShowOptionItemList.classList.remove('d-none');
        }
    }

    function reloadPage() {
        if (confirm("Bạn chưa lưu công việc? Bạn có muốn làm mới trang không?")) {
            sessionStorage.clear();
            Swal.fire({
                position: 'center',
                icon: 'success',
                timer: 900,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        }
    }

    function sendJSON(value, method, link) {
        $.ajax({
            method: method,
            url: link,
            data: {
                func: JSON.stringify(value)
            },
            success: function(res) {
                //console.log(res);
            }
        });
    }

    function insertCheckStateInOptionSize(value, data) {
        if (data === null)
            return "";
        data = JSON.parse(data);
        if (value == data.size)
            return "checked";
        else
            return "";
    }

    function insertCheckStateInOptionTopping(value, data) {
        if (data === null)
            return "";
        data = JSON.parse(data);
        for (let i = 0; i < data.toppingList.length; i++) {
            if (value == data.toppingList[i])
                return "checked";
        }
        return "";
    }

    function showOptionTable($idItem) {
        //console.log("okll");
        let func = {};
        func.name = "showItemOptionsTable";
        func.id = $idItem;
        func.data = sessionStorage.getItem('order' + $idItem);
        sessionStorage.setItem('idItemOptionTable', $idItem);
        console.log("data: " + JSON.stringify(func));
        $.ajax({
            method: "POST",
            data: {
                func: JSON.stringify(func)
            },
            url: "../models/M_BanHang.php",
            success: function(response) {
                console.log("response: " + response);
                sessionStorage.setItem('infoDetail' + $idItem, response);
                $res = JSON.parse(response);
                console.log($res);
                document.getElementById('optionSize').innerHTML = "";
                let check = false;
                for (let i = 0; i < $res[0].length; i++) {
                    if (insertCheckStateInOptionSize($res[0][i].TenKichThuoc, sessionStorage.getItem('order' + $idItem)) == "checked") {
                        check = true;
                    }
                }
                console.log('show' + check.toString() + $res[0].length.toString());
                for (let i = 0; i < $res[0].length; i++) {
                    if (i == 0 && check == false) {
                        $html = '<div class="form-check form-check-radio">' +
                            '<label class="form-check-label text-dark label-size">' +
                            '<input class="form-check-input o-size" type="radio" name="exampleRadio" value="option1" checked/>' +
                            $res[0][i].TenKichThuoc +
                            '<span class="circle">' +
                            '<span class="check"></span>' +
                            '</span>' +
                            '</label>' +
                            '</div>';
                    } else {
                        $html = '<div class="form-check form-check-radio">' +
                            '<label class="form-check-label text-dark label-size">' +
                            '<input class="form-check-input o-size" type="radio" name="exampleRadio" value="option1" ' + insertCheckStateInOptionSize($res[0][i].TenKichThuoc, sessionStorage.getItem('order' + $idItem)) + '/>' +
                            $res[0][i].TenKichThuoc +
                            '<span class="circle">' +
                            '<span class="check"></span>' +
                            '</span>' +
                            '</label>' +
                            '</div>';
                    }

                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild) {
                        document.getElementById('optionSize').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('optionTopping').innerHTML = "";
                for (let i = 0; i < $res[1].length; i++) {
                    $html = '<div class="form-check">' +
                        '<label class="form-check-label text-dark label-topping">' +
                        '<input class="form-check-input o-topping" type="checkbox" value="" ' + insertCheckStateInOptionTopping($res[1][i].TenTopping, sessionStorage.getItem('order' + $idItem)) + '/>' +
                        $res[1][i].TenTopping +
                        '<span class="form-check-sign">' +
                        '<span class="check"></span>' +
                        '</span>' +
                        '</label>' +
                        '</div>';

                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild) {
                        document.getElementById('optionTopping').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('AddOption').removeAttribute('onclick');
                // let tmp = saveWork();
                document.getElementById('AddOption').setAttribute('onclick', "saveWork();");
            }
        });
    }

    function showOptionTableForListOrder(index) {
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
            data: {
                func: JSON.stringify(func)
            },
            url: "../models/M_BanHang.php",
            success: function(response) {
                sessionStorage.setItem('infoDetail' + $data.id, response);
                $res = JSON.parse(response);
                console.log($res);
                console.log('vào');
                //$dataParse = JSON.parse($data);
                document.getElementById('optionSize').innerHTML = "";
                for (let i = 0; i < $res[0].length; i++) {
                    $html = '<div class="form-check form-check-radio">' +
                        '<label class="form-check-label text-dark label-size">' +
                        '<input class="form-check-input o-size" type="radio" name="exampleRadio" value="option1" ' + insertCheckStateInOptionSize($res[0][i].TenKichThuoc, JSON.stringify($data)) + '/>' +
                        $res[0][i].TenKichThuoc +
                        '<span class="circle">' +
                        '<span class="check"></span>' +
                        '</span>' +
                        '</label>' +
                        '</div>';
                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild) {
                        document.getElementById('optionSize').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('optionTopping').innerHTML = "";
                for (let i = 0; i < $res[1].length; i++) {
                    $html = '<div class="form-check">' +
                        '<label class="form-check-label text-dark label-topping">' +
                        '<input class="form-check-input o-topping" type="checkbox" value="" ' + insertCheckStateInOptionTopping($res[1][i].TenTopping, JSON.stringify($data)) + '/>' +
                        $res[1][i].TenTopping +
                        '<span class="form-check-sign">' +
                        '<span class="check"></span>' +
                        '</span>' +
                        '</label>' +
                        '</div>';

                    let newcontent = document.createElement('div');
                    newcontent.innerHTML = $html;
                    while (newcontent.firstChild) {
                        document.getElementById('optionTopping').appendChild(newcontent.firstChild);
                    }
                }
                document.getElementById('AddOption').removeAttribute('onclick');
                document.getElementById('AddOption').setAttribute('onclick', "saveWorkOnEditOptionItem(" + index + ");");
            }
        });
    }

    function addItemToBill($idItem) {
        // if (sessionStorage.getItem('Bill') === null)
        // {
        //     sessionStorage.setItem('Bill', new Array());
        // }
        // let tmp = sessionStorage.getItem('Bill');

        // sessionStorage.setItem('Bill', tmp);
        // console.log(sessionStorage.getItem('Bill'));
        if (sessionStorage.getItem('bill') === null) {
            let bill = [];
            sessionStorage.setItem('bill', JSON.stringify(bill));
        }
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        let value = JSON.parse(sessionStorage.getItem('order' + $idItem));
        bill.push(value);
        sessionStorage.setItem('bill', JSON.stringify(bill));
        sessionStorage.removeItem('order' + $idItem);
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '',
            showConfirmButton: false,
            timer: 700
        }).then(() => {
            location.reload();
        });
        // setTimeout(() => {
        // }, 1000);
        // console.log(JSON.parse(sessionStorage.getItem('bill')));    
        // console.log(sessionStorage.getItem('order' + $idItem));
    }

    function convertNumToStringHaveDot($num) {
        $num = $num.toString();
        let res = "";
        let count = 0;
        for (let i = $num.length - 1; i >= 0; i--) {
            count++;
            if (count == 3) {
                count = 0;
                if (i > 0)
                    res = "." + $num[i] + res;
                else
                    res = $num[i] + res;
            } else {
                res = $num[i] + res;
            }
        }
        return res;
    }

    function editAddItem(serial) {
        //console.log(serialBill);
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        bill[serial].num++;
        let elementBill = document.getElementById('bill_' + serial.toString());
        let elementChild = elementBill.getElementsByClassName('des');
        // console.log(elementChild);
        // elementChild[0].innerHTML = bill[serial].size
        elementChild[1].innerHTML = bill[serial].num;
        // elementChild[2].innerHTML = bill[serial].price;
        // elementChild[3].innerHTML = bill[serial].toppingList;
        elementChild[3].innerHTML = convertNumToStringHaveDot(bill[serial].price * bill[serial].num);
        // elementBill.getElementsByClassName('card-description')[0].innerHTML = 'Số lượng: ' + '<span class="text-info">' + bill[serial].num + '</span>' + '; Size: ' + '<span class="text-info">' +  bill[serial].size + '</span>' +'; Topping: ' + '<span class="text-info">' + bill[serial].toppingList + '</span>';
        bill = JSON.stringify(bill);
        sessionStorage.setItem('bill', bill);
    }

    function editMinusItem(serial) {
        //console.log(serialBill);
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        if (bill[serial].num == 1) {
            if (!confirm("Bạn có muốn hủy món " + bill[serial].name + " hay không?")) {
                return;
            }
        }
        //console.log("vao");
        bill[serial].num--;
        if (bill[serial].num == 0) {
            document.getElementsByClassName('row-bill_' + serial.toString())[0].remove();
            bill.splice(serial, 1);
            bill = JSON.stringify(bill);
            sessionStorage.setItem('bill', bill);
            return;
        }
        let elementBill = document.getElementById('bill_' + serial.toString());
        let elementChild = elementBill.getElementsByClassName('des');
        // console.log(elementChild);
        // elementChild[0].innerHTML = bill[serial].size
        elementChild[1].innerHTML = bill[serial].num;
        // elementChild[2].innerHTML = bill[serial].price;
        // elementChild[3].innerHTML = bill[serial].toppingList;
        elementChild[3].innerHTML = convertNumToStringHaveDot(bill[serial].price * bill[serial].num);
        bill = JSON.stringify(bill);
        sessionStorage.setItem('bill', bill);
    }


    function editDeleteItem(index) {
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        if (!confirm("Bạn có muốn hủy món " + bill[index].name + " hay không?")) {
            return;
        }
        let element = document.getElementById('bill_' + index.toString());
        element.remove();
        bill.splice(index, 1);
        bill = JSON.stringify(bill);
        sessionStorage.setItem('bill', bill);
        Swal.fire({
            position: 'center',
            icon: 'success',
            showConfirmButton: false,
            timer: 700
        });
        showBill();
    }

    function showBill() {
        document.getElementById('contentOrder').innerHTML = "";
        if (sessionStorage.getItem('bill') === null)
            return;
        let bill = JSON.parse(sessionStorage.getItem('bill'));
        console.log(bill);
        let elementContentBill = document.getElementById('contentOrder');
        elementContentBill.innerHTML = "";
        let html = '';
        // let html = '<table class="table" style=" overflow: scroll;">' +
        //                             '<thead >' +
        //                                 '<tr >' +
        //                                     '<th scope="col" style="font-weight: 500;">STT</th>' +
        //                                     '<th scope="col" style="font-weight: 500;">Tên món</th>' +
        //                                     '<th scope="col" style="font-weight: 500;">Kích thước</th>' +
        //                                     '<th scope="col" style="font-weight: 500;">Số lượng</th>' +
        //                                     '<th scope="col" style="font-weight: 500;">Đơn giá</th>' +
        //                                     '<th scope="col" style="font-weight: 500;">Topping</th>' +
        //                                     '<th scope="col" style="font-weight: 500;">Thành tiền</th>' +
        //                                 '</tr>' +
        //                             '</thead>' +
        //                             '<tbody>';
        for (let i = 0; i < bill.length; i++) {
            console.log(html);
            let func = {};
            func.name = "getItemName";
            func.id = bill[i].id;
            $.ajax({
                type: "POST",
                url: "../models/M_BanHang.php",
                data: {
                    func: JSON.stringify(func)
                },
                success: function(response) {
                    setTimeout(() => {
                        bill[i].name = JSON.parse(response);
                        sessionStorage.setItem('bill', JSON.stringify(bill));
                        //let stringBill = JSON.stringify(bill[i]).toString();
                        console.log(bill[i].size);
                        html =
                            '<tr id="bill_' + i.toString() + '" style=" overflow: scroll;">' +
                            '<th cope="row">' + (Number(i) + 1) + '</th>' +
                            '<td> <p style="width: 150px">' + bill[i].name + 'aaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbb</p></td>' +
                            '<td> <p class="des" style="width: 50px">' + bill[i].size + '</p></td>' +
                            '<td> <p class="des" style="width: 20px">' + bill[i].num + '</p></td>' +
                            '<td> <p class="des" style="width: 50px">' + bill[i].price + '</p></td>' +
                            '<td> <p class="des" style="width: 50px">' + bill[i].num * bill[i].price + '</p></td>' +
                            '<td> <p class="des" style="width: 200px">' + bill[i].toppingList + '</p></td>' +
                            '<td style="width: 70px">' +
                            "<a style='width: 70px; font-size: 10px; padding: 10px' href='#pablo' class='btn btn-info btn-round text-white mr-1' data-toggle='modal' data-target='#optionModal' onclick='showOptionTableForListOrder(" + i + ");'>TÙY CHỌN</a>" +
                            '</td>' +
                            '<td style="width: 70px">' +
                            "<a style='width: 70px; font-size: 10px; padding: 10px' href='#pablo' class='btn btn-warning btn-round text-white mr-1' onclick='editMinusItem(" + i + ")'>GIẢM</a>" +
                            '</td>' +
                            '<td style="width: 70px">' +
                            "<a style='width: 70px; font-size: 10px; padding: 10px' href='#pablo' class='btn btn-success btn-round text-white mr-1' onclick='editAddItem(" + i + ")'>TĂNG</a>" +
                            '</td>' +
                            '<td style="width: 70px">' +
                            "<a style='width: 70px; font-size: 10px; padding: 10px' href='#pablo' class='btn btn-danger btn-round text-white mr-1' onclick='editDeleteItem(" + i + ")'>XÓA</a>" +
                            '</td>' +
                            '</tr>';
                        elementContentBill.innerHTML += html;
                    }, 350);

                    // console.log(html);
                    // let html = '<div class="row row-bill_' + i.toString() + '">' + 
                    //                 '<div class="card card-pricing bg-dark mr-3 ml-3 pl-3 pr-3">' + 
                    //                         '<div class="card-body" id="bill_' + i.toString() +'">' +
                    //                             '<div class="card-icon">' +
                    //                                 '<i class="material-icons">business</i>' +
                    //                             '</div>' +
                    //                             '<h3 class="card-title">' + bill[i].name + ' (' + convertNumToStringHaveDot(bill[i].price * bill[i].num) + ' vnđ)' + '</h3>' + 
                    //                             '<p class="card-description">' + 
                    //                                 'Số lượng: ' + '<span class="text-info">' + bill[i].num + '</span>' + '; Size: ' + '<span class="text-info">' +  bill[i].size + '</span>' +'; Topping: ' + '<span class="text-info">' + bill[i].toppingList + '</span>' + 
                    //                             '</p>' +
                    //                             "<a href='#pablo' class='btn btn-white btn-round text-dark mr-1' onclick='editDeleteItem(" + i +")'>XÓA</a>" +
                    //                             "<a href='#pablo' class='btn btn-info btn-round text-white mr-1' data-toggle='modal' data-target='#optionModal' onclick='showOptionTableForListOrder(" + i + ");'>TÙY CHỌN</a>" + //mã hóa json truyền vào hàm trong js sẽ chuyển thành object
                    //                             "<a href='#pablo' class='btn btn-danger btn-round text-white mr-1' onclick='editMinusItem(" + i + ")'>GIẢM</a>" +
                    //                             "<a href='#pablo' class='btn btn-success btn-round text-white mr-1' onclick='editAddItem(" + i + ")'>TĂNG</a>" +
                    //                         '</div>' +
                    //                 '</div>' +
                    //             '</div>';
                    // let newcontent = document.createElement('div');
                    // newcontent.innerHTML = html;
                    // while (newcontent.firstChild)
                    // {
                    //     elementContentBill.appendChild(newcontent.firstChild);
                    // }
                }
            });
        }
        console.log(html);

    }

    function deleteOrder(MaDM) {
        let func = {};
        func.name = 'deleteOrder';
        func.MaDM = MaDM;
        // console.log(order.toString());
        $.ajax({
            type: "POST",
            url: "../models/M_BanHang.php",
            data: {
                func: JSON.stringify(func)
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Đang cập nhật tình trạng phục vụ',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 750
                });
                Swal.showLoading();
                loadBlender('');
            }
        });
    }

    $(document).ready(function() {
        $('#tbFindOrder').on('input', function() {
            loadBlender($(this).val());
        });
    });

    var timerOrder = setInterval(() => {
        // console.log($('#tbFindOrder').val() == '');
        if (!$('#billBlender').is(':visible') || ($('#badgeOrderFinish').text() == '0')) {
            // console.log('vào');
            loadBlender('');
        }
    }, 1000);

    function loadBlender(stringToFind) {
        let func = {};
        func.name = 'getOrders';
        $.ajax({
            type: "POST",
            url: "../models/M_Blender.php",
            data: {
                func: JSON.stringify(func)
            },
            success: function(response) {
                let data = JSON.parse(response);
                // console.log(JSON.parse(response));    
                document.getElementById('blenderCustomer').innerHTML = '';
                let countOrderFinish = 0;
                for (let i = 0; i < data.length; i++) {
                    if (stringToFind != '' && !checkSameName(data[i][0]['SoBan'], stringToFind))
                        continue;
                    if (data[i][0]['TinhTrang'] != 'phuc vu')
                        continue;
                    countOrderFinish++;
                    let html = '<div id="row' + data[i][0]['MaDM'] + '" class="row blenderOrders" style="margin: 0">' +
                        '<div id="accordion' + data[i][0]['MaDM'] + '" role="tablist">' +
                        '<div class="card card-collapse" style="width: 70vw; text-align: center;">' +
                        '<div class="card-header bg-light border-primary" style=" background-color: white" role="tab" id="heading">' +
                        '<h5 class="mb-0" style="font-size: 20px; font-weight: 500;">' +
                        '<a id="title" data-toggle="collapse" href="#collapse' + data[i][0]['MaDM'] + '" aria-expanded="true" aria-controls="collapse" style="display: flex; color: black">' +
                        'Order <br>' + data[i][0]['SoBan'] +
                        '<i class="material-icons">keyboard_arrow_down</i>' +
                        '<div style="display: flex; margin-left: 80%; ">' +
                        '<button type="button" rel="tooltip" class="btn btn-simple btn-warning" style=" font-weight: 700; background-color: white; color: black" onclick="deleteOrder(\'' + data[i][0]['MaDM'] + '\')"> ' +
                        'PHỤC VỤ' +
                        '<i class="material-icons">person</i>' +
                        '</button>' +
                        '</div>' +
                        '</a>' +
                        '</h5>' +
                        '</div>' +
                        '<div id="collapse' + data[i][0]['MaDM'] + '" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion' + data[i][0]['MaDM'] + '" style="text-align: center;">' +
                        '<div class="card-body">' +
                        '<table class="table">' +
                        '<thead>' +
                        '<tr>' +
                        '<th class="text-center" style="font-weight: 500;">STT</th>' +
                        '<th style="width: 300px; font-weight: 500;">Tên món</th>' +
                        '<th style="width: 300px; font-weight: 500;">Số lượng</th>' +
                        '<th style="width: 300px; font-weight: 500;">Kích cỡ</th>' +
                        '<th style="max-width: 100px; font-weight: 500;">Topping</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody id="content">';
                    for (let j = 0; j < data[i][1].length; j++) {
                        html +=
                            '<tr>' +
                            '<td class="text-center" style="width: 50px;">' + (j + 1) + '</td>' +
                            '<td>' + data[i][1][j][0]['TenMon'] + '</td>' +
                            '<td>' + data[i][1][j][0]['SoLuong'] + '</td>' +
                            '<td>' + data[i][1][j][0]['TenDonVi'] + '</td>' +
                            '<td style="max-width: 400px;">' +
                            data[i][1][j][1] +
                            '</td>' +
                            '</tr>'
                    }
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                    document.getElementById('blenderCustomer').innerHTML += html;
                }
                document.getElementById('badgeOrderFinish').innerHTML = countOrderFinish;
                return true;
            },
            error(jq, text, err) {
                return false;
            }
        });
    }
</script>

<?php
include_once '../models/M_BanHang.php';
include_once '../models/M_Blender.php';
//include '../models/M_General_CMD.php';

if (1 == 2)
    die("Bạn không có quyền truy cập, ok?");

//$modelSale->sortItemListByNumChoice();
$itemList = Model_Sale::getItemListFromServer();
echo
'  
        <script type="text/javascript">
            sessionStorage.setItem("itemList", ' . json_encode($itemList) . ')
        </script>
    ';
include('../admin/sale.php');
for ($i = 0; $i < count($itemList); $i++) {
    echo
    '
            <script type="text/javascript">
                checkVisionBadge(\'' . $itemList[$i]->get_MaMon() . '\');
            </script>
        ';
}
?>