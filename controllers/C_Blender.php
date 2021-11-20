<script type="text/javascript">
    setInterval(() => {
        let elementOrderBlenders = document.getElementsByClassName('blenderOrders');
        if (elementOrderBlenders.length == 0)
            location.reload();
    }, 3000);

    function updateStateOrder(idOrder, state)
    {
        let func = {};
        func.name = 'updateStateOrder';
        func.id = idOrder.toString();
        func.state = state.toString();
        $.ajax({
            type: "POST",
            url: "../models/M_Blender.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log("Da cap nhat thanh cong" + response.toString());
                
                if (state == 'da tiep nhan')
                {
                    document.getElementById('btnState' + idOrder).setAttribute('disabled', '');
                    document.getElementById('btnState' + idOrder).textContent = "Đã tiếp nhận";
                    document.getElementById('btnState' + idOrder).style.cursor = 'not-allowed';
                    document.getElementById('btnCall' + idOrder).removeAttribute('disabled');
                    document.getElementById('btnCall' + idOrder).style.cursor = 'pointer';
                }
                if (state == 'phuc vu')
                {
                    document.getElementById('row' + idOrder).remove();
                }
                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: (state == 'da tiep nhan') ? 'Đã tiếp nhận' : 'Đã gọi phục vụ',
                    timer: 1500,
                    allowOutsideClick: false
                });
                Swal.showLoading();
            }
        });

        
    }

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
            $('#tbFindOrder').on('input', function(e){
                let elementRowBlender = document.getElementsByClassName('blenderOrders');
                for (let i = 0; i < elementRowBlender.length; i++)
                {
                    console.log('rowDM' + $(this).val() + "--" + elementRowBlender[i].getAttribute('id'));
                    if (!checkSameName(elementRowBlender[i].getAttribute('id'), 'rowDM' + $(this).val()))
                    {
                        if ($(this).val() == '')
                            elementRowBlender[i].classList.remove('d-none');
                        else
                            elementRowBlender[i].classList.add('d-none');
                    }
                    else
                    {
                        elementRowBlender[i].classList.remove('d-none');
                    }
                }
            });
        });

</script>
<?php 
    include_once "../models/M_Blender.php";
    $bills = Blender::get_Order();
    //echo '<script> console.log(' . json_encode($bill) . ') </script>';
    //echo $bill[0][0]->get_TongTien(); 
    include_once "../admin/blender.php";    
?>