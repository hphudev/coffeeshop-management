<div>
    <form action="">
        <div class="container-fluid mt3" style="width=100vw;">
            <div class="row row-header">
                <button type="button" class="col btn btn-warning">Lập Bill</button>
                <button type="button" class="col btn btn-info">Xem Bill</button>
                <button type="button" class="col btn btn-danger">làm mới</button>
            </div>
        </div class="container mt3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">search</i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Tìm kiếm món">
            </div>
        </div>
        <div class="row">
            <?php
                for ($i = 0; $i < 10; $i++)
                {
                    ?>
                    <div class="col">
                    <div class="card" style="min-width:150px; max-width:300px">
                        <img class="card-img-top" src="https://thecoffeevn.com/wp-content/uploads/2019/06/cach-nhan-biet-ca-phe-nguyen-chat-vs-don-phu-gia.jpg" alt="Card image" style="min-width:200px; max-width:300px">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some example text. Some example text.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    </div>
            <?php
                }
            
            ?>
        </div>
                
        
    </form>
</div>