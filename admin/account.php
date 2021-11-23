<button id="test" type="button" class="btn btn-primary">Open modal</button>

<div id="modalThanhToan"></div>

<script type="text/javascript">
    $(document).ready(function() {
        
        $("#test").click(function() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_HoaDon.php",
                data: {
                    action: "pay",
                    id: "dm001",
                },
                beforeSend: function() {},
                success: function(response) {
                    $("#modalThanhToan").html(response)
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        })
    })
</script>