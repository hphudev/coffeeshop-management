function toMoney(amount) {
    return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function toInt(s) {
    return parseFloat(s.replace(/,/g, ''))
}

function checkPhanQuyen(PhanQuyen, Callback) {
    $.ajax({
        type: "POST",
        url: "/coffeeshopmanagement/controllers/C_PhanQuyen.php",
        data: {
            phanquyen: PhanQuyen,
        },
        beforeSend: function() {

        },
        success: function(response) {
            // alert(response)
            if (response == "true") {
                Callback()
            } else {
                Swal.fire(
                    "Thất bại!",
                    "Bạn không có quyền truy cập mục này!",
                    "warning"
                )
            }
        },
        complete: function() {},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    })
}

function checkPhanQuyenNoAlert(PhanQuyen, Callback) {
    $.ajax({
        type: "POST",
        url: "/coffeeshopmanagement/controllers/C_PhanQuyen.php",
        data: {
            phanquyen: PhanQuyen,
        },
        beforeSend: function() {

        },
        success: function(response) {
            // alert(response)
            if (response == "true") {
                Callback()
            }
        },
        complete: function() {},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    })
}

function checkSDT(sdt) {
    const regex = /(84|0[3|5|7|8|9])+([0-9]{8})/
    return regex.test(String(sdt));
}

function checkNgaySinh(ngaysinh) {
    var dob = new Date(Date.parse(ngaysinh))
    var ageDifMs = Date.now() - dob.getTime()
    var ageDate = new Date(ageDifMs)
    if (Math.abs(ageDate.getUTCFullYear() - 1970) >= 18)
        return true
    else
        return false
}

function checkNgayVaoLam(ngayvaolam, ngaysinh) {
    var dow = new Date(Date.parse(ngayvaolam))
    var dob = new Date(Date.parse(ngaysinh))

    var workDifMs = dow.getTime() - dob.getTime()

    if (dow > new Date())
        return false

    var workDate = new Date(workDifMs)

    if (Math.abs(workDate.getUTCFullYear() - 1970) >= 18)
        return true
    else
        return false
}
