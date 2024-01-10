<?php 
include './Backend/db/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color: #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
</style>
<body>
<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Parcel ID: <?php echo $_SESSION['Courier_ID'];?></h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Shipped By:</strong> <br>

                    <?php
                        if ($_SESSION['from_branch'] == 1) {
                            echo "Branch 1 Karachi | <i class='fa fa-phone'></i>+2 123 455 623";
                        }elseif ($_SESSION['from_branch'] == 2) {
                            echo "Branch 2 Mianwali | <i class='fa fa-phone'></i>+1234567489";
                        }elseif($_SESSION['from_branch'] == 3){
                            echo "Branch 3 Sialkot | <i class='fa fa-phone'></i>+ 1231313123";
                        }
                    ?>

                    </div>
                    <div class="col"> <strong>Delivered To:</strong> 
                    
                    <?php
                        if ($_SESSION['to_branch'] == 1) {
                            echo "<br> Branch 1 Karachi | <i class='fa fa-phone'></i>+2 123 455 623";
                        }elseif ($_SESSION['to_branch'] == 2) {
                            echo "<br> Branch 2 Mianwali | <i class='fa fa-phone'></i>+1234567489";
                        }elseif($_SESSION['to_branch'] == 3){
                            echo "<br> Branch 3 Sialkot | <i class='fa fa-phone'></i>+ 1231313123";
                        }
                    ?>

                    </div>
                    <div class="col"> <strong>Status:</strong> <br>

                    <?php 

                    if ($_SESSION['Courier_status'] == 1) {
                        echo "Shipped";
                    }elseif($_SESSION['Courier_status'] == 2){
                        echo "In Progress";
                    }elseif ($_SESSION['Courier_status'] == 3) {
                        echo "Delivered";
                    }

                    ?>

                    </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> <?php echo $_SESSION['track']?> </div>
                </div>
            </article>
            <br>
            <div class="d-flex justify-content-between">
            <button class="btn btn-warning" data-abc="true" id="go-back"><i class="fa fa-chevron-left"></i>Back</button>
            <button class="btn btn-warning" data-abc="true" id="Print"onclick="Print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </article>
</div>

<script>
document.getElementById("go-back").addEventListener("click", () => {
  history.back();
});

function Print() {
    window.print();
}

</script>

</body>
</html>