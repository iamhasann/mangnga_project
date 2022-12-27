<?php include "../connect/connect_db.php"; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ร้านขายสัตวเลี้ยง</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
        .topnav {
         position: relative;
         overflow: hidden;
         background-color: Red;
        }/**สีแทบเมนู */

        .topnav a {
         float: left;
         color: #fff;
         text-align: center;
         padding: 14px 16px;
         text-decoration: none;
         font-size: 17px;
        }

        .topnav a:hover {
         background-color: #fff;
         color: black;
        }/*ตอนกดแทบเมนู*/

        .topnav a.active {
        font-family: "Audiowide", sans-serif;  
        background-color: red;
        color: white;
        }/**สีแทบเมนูตรงกลาง */

       .topnav-centered a {
       float: none;
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
       }

       .topnav-right {
       float: right;
       }
  </style>
</head>
<body style=" background-color: #f8d7c1;">
  <body>
    <div class="row"><!-- open loco -->
        <div class="col-md-12" style=" background-color: white;">
            <img src="../admin/loco/locosan.jpg" style="width: 130px;"> 
        </div>
    </div><!-- close loco -->

    <section class="nav-bar">
        <!-- Top navigation -->
        <div class="topnav">

            <!-- Centered link -->
            <div class="topnav-centered">
                <a href="home.php" class="active"><h3>WELCOME</h3></a>
            </div>

            <!-- Left-aligned links (default) -->
            <a href="home.php">หน้าแรก</a>
            <a href="../other/cathot.php">กำลังฮิต</a>
            <a href="../other/catcute.php">สีสวยงาม</a>
            <a href="../other/cattuk.php">ราคาถูก</a>
 
            <!-- Right-aligned links -->
            <div class="topnav-right">
                <a href="#search">ค้นหา</a>
                <a href="#search">ช่วยเหลือ</a>
                <a href="#About">เกี่ยวกับ</a>
            </div>
        </div>
    </section>
    <br>
    
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <center><h2>สินค้ามาใหม่</h2>
            <div class="row">
                    <?php
                        try{
                            $sql_select= $conn->prepare("SELECT *  
                            FROM product_tb
                            LEFT JOIN product_type_tb
                            ON product_tb.product_type = product_type_tb.product_type_id 
                            /*where product_type_id='1'*/ 
                            order by product_id desc limit 2 ");
                            $sql_select->execute();//สั่งให้ sql_select ทำงาน
                            while($row_select = $sql_select->fetch(PDO::FETCH_ASSOC)){
                            //$row_select = จะเก็บข้อมูลที่ while วนเเต่ละรอบ
                    ?>
                    <div class="col-sm-6">
                        <div class="card" style="width:270px">
                            <img class="card-img-top" src="../admin/img/<?php echo $row_select['product_img']; ?>" alt="Card image" width="200" height="350">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row_select['product_name']; ?></h4>
                                <p class="card-text">สายพันธ์ : <?php echo $row_select['product_type_name']; ?></p>
                                <p class="card-text">   อายุ : <?php echo $row_select['product_age']; ?> ปี</p>
                                <a href="../other/ppp.php?id=<?php echo $row_select['product_id']; ?>" class="btn btn-danger"><?php echo $row_select['product_price']; ?> บาท</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                            }
                        }
                            catch(PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        //$conn = null;//เคลีย์ค่าในการดึงข้อมูล
 
                    ?>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../admin/img/british (4).jpg" class="d-block w-100" alt="..." width="250" height="550">
                    </div>
                    <div class="carousel-item">
                        <img src="../admin/img/kaumani (2).jpg" class="d-block w-100" alt="..." width="250" height="550">
                    </div>
                    <div class="carousel-item">
                        <img src="../admin/img/skod (4).jpg" class="d-block w-100" alt="..." width="250" height="550">
                    </div>
                    <div class="carousel-item">
                        <img src="../admin/img/wishiamas (2).jpg" class="d-block w-100" alt="..." width="250" height="550">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>

    <div class="container-fluid p-2 bg-danger text-white text-center">
        <h2>สินค้าที่มีอยู่ในสต็อก</h2>
    </div>

    <div class="container mt-5">
        <center><h3>สก๊อตติส</h3>
        <div class="row">

            <?php
                try{
                    $sql_select_skot= $conn->prepare("SELECT *  
                    FROM product_tb
                    LEFT JOIN product_type_tb
                    ON product_tb.product_type = product_type_tb.product_type_id 
                    where product_type_id='1' order by product_id desc limit 4 ");
                    $sql_select_skot->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select_skot = $sql_select_skot->fetch(PDO::FETCH_ASSOC)){
                        //$row_select = จะเก็บข้อมูลที่ while วนเเต่ละรอบ
            ?>

            <div class="col-sm-3">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="../admin/img/<?php echo $row_select_skot['product_img']; ?>" alt="Card image" width="250" height="400">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row_select_skot['product_name']; ?></h4>
                        <p class="card-text">สายพันธ์ : <?php echo $row_select_skot['product_type_name']; ?></p>
                        <p class="card-text">   อายุ : <?php echo $row_select_skot['product_age']; ?> ปี</p>
                        <a href="../other/ppp.php?id=<?php echo $row_select_skot['product_id']; ?>" class="btn btn-danger"><?php echo $row_select_skot['product_price']; ?> บาท</a>
                    </div>
                </div>
            </div>

            <?php 
                   }
                }
                    catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    }
                //$conn = null;//เคลีย์ค่าในการดึงข้อมูล
 
            ?>

        </div>
    </div>

<div class="container mt-5">
  <center><h3>อเมริกัน ชอร์ตแฮร์</h3>
  <div class="row">

  <?php
                try{
                    $sql_select_amay= $conn->prepare("SELECT *  
                    FROM product_tb
                    LEFT JOIN product_type_tb
                    ON product_tb.product_type = product_type_tb.product_type_id 
                    where product_type_id='2' order by product_id desc limit 4 ");
                    $sql_select_amay->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select_amay = $sql_select_amay->fetch(PDO::FETCH_ASSOC)){
                        //$row_select = จะเก็บข้อมูลที่ while วนเเต่ละรอบ
    ?>

    <div class="col-sm-3">
        <div class="card" style="width:300px">
            <img class="card-img-top" src="../admin/img/<?php echo $row_select_amay['product_img']; ?>" alt="Card image" width="250" height="400">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row_select_amay['product_name']; ?></h4>
                <p class="card-text">สายพันธ์ : <?php echo $row_select_amay['product_type_name']; ?></p>
                <p class="card-text">   อายุ : <?php echo $row_select_amay['product_age']; ?> ปี</p>
                <a href="../other/ppp.php?id=<?php echo $row_select_amay['product_id']; ?>" class="btn btn-danger"><?php echo $row_select_amay['product_price']; ?> บาท</a>
            </div>
        </div>
    </div>

    <?php 
                }
                    }
                    catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                //$conn = null;//เคลีย์ค่าในการดึงข้อมูล
 
    ?>

    </div>
</div>

<div class="container mt-5">
  <center><h3>บริติช ชอร์ตแฮร์</h3>
  <div class="row">

  <?php
                try{
                    $sql_select_britis= $conn->prepare("SELECT *  
                    FROM product_tb
                    LEFT JOIN product_type_tb
                    ON product_tb.product_type = product_type_tb.product_type_id 
                    where product_type_id='3' order by product_id desc limit 4 ");
                    $sql_select_britis->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select_britis = $sql_select_britis->fetch(PDO::FETCH_ASSOC)){
                        //$row_select = จะเก็บข้อมูลที่ while วนเเต่ละรอบ
    ?>

    <div class="col-sm-3">
        <div class="card" style="width:300px">
            <img class="card-img-top" src="../admin/img/<?php echo $row_select_britis['product_img']; ?>" alt="Card image" width="250" height="400">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row_select_britis['product_name']; ?></h4>
                <p class="card-text">สายพันธ์ : <?php echo $row_select_britis['product_type_name']; ?></p>
                <p class="card-text">   อายุ : <?php echo $row_select_britis['product_age']; ?> ปี</p>
                <a href="../other/ppp.php?id=<?php echo $row_select_britis['product_id']; ?>" class="btn btn-danger"><?php echo $row_select_britis['product_price']; ?> บาท</a>
            </div>
        </div>
    </div>

    <?php 
                }
                    }
                    catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                //$conn = null;//เคลีย์ค่าในการดึงข้อมูล
 
    ?>

    </div>
</div>

<div class="container mt-5">
  <center><h3>วิเชียรมาศ</h3>
  <div class="row">

  <?php
                try{
                    $sql_select_vichiamas= $conn->prepare("SELECT *  
                    FROM product_tb
                    LEFT JOIN product_type_tb
                    ON product_tb.product_type = product_type_tb.product_type_id 
                    where product_type_id='4' order by product_id desc limit 4 ");
                    $sql_select_vichiamas->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select_vichiamas = $sql_select_vichiamas->fetch(PDO::FETCH_ASSOC)){
                        //$row_select = จะเก็บข้อมูลที่ while วนเเต่ละรอบ
    ?>

    <div class="col-sm-3">
        <div class="card" style="width:300px">
            <img class="card-img-top" src="../admin/img/<?php echo $row_select_vichiamas['product_img']; ?>" alt="Card image" width="250" height="400">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row_select_vichiamas['product_name']; ?></h4>
                <p class="card-text">สายพันธ์ : <?php echo $row_select_vichiamas['product_type_name']; ?></p>
                <p class="card-text">   อายุ : <?php echo $row_select_vichiamas['product_age']; ?> ปี</p>
                <a href="../other/ppp.php?id=<?php echo $row_select_vichiamas['product_id']; ?>" class="btn btn-danger"><?php echo $row_select_vichiamas['product_price']; ?> บาท</a>
            </div>
        </div>
    </div>

    <?php 
                }
                    }
                    catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                //$conn = null;//เคลีย์ค่าในการดึงข้อมูล
 
    ?>

    </div>
</div>

<div class="container mt-5">
  <center><h3>ขาวมณี</h3>
  <div class="row">

  <?php
                try{
                    $sql_select_kau= $conn->prepare("SELECT *  
                    FROM product_tb
                    LEFT JOIN product_type_tb
                    ON product_tb.product_type = product_type_tb.product_type_id 
                    where product_type_id='5' order by product_id desc limit 4 ");
                    $sql_select_kau->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select_kau = $sql_select_kau->fetch(PDO::FETCH_ASSOC)){
                        //$row_select = จะเก็บข้อมูลที่ while วนเเต่ละรอบ
    ?>

    <div class="col-sm-3">
        <div class="card" style="width:300px">
            <img class="card-img-top" src="../admin/img/<?php echo $row_select_kau['product_img']; ?>" alt="Card image" width="250" height="400">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row_select_kau['product_name']; ?></h4>
                <p class="card-text">สายพันธ์ : <?php echo $row_select_kau['product_type_name']; ?></p>
                <p class="card-text">   อายุ : <?php echo $row_select_kau['product_age']; ?> ปี</p>
                <a href="../other/ppp.php?id=<?php echo $row_select_kau['product_id']; ?>" class="btn btn-danger"><?php echo $row_select_kau['product_price']; ?> บาท</a>
            </div>
        </div>
    </div>

    <?php 
                }
                    }
                    catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                $conn = null;//เคลีย์ค่าในการดึงข้อมูล
 
    ?>

    </div>
</div>
<br>
    <div class="row" ><!-- เริ่มต้น foter -->
        <div class="col-md-2" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p>ค้นหาร้านค้า</p>
            <p>สมัครเป็นสมาชิก</p>
            <p>ลงทะเบียนเพื่อรับข่าวสาร</p>
            </font>
        </div>
        <div class="col-md-2" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p>รับความช่วยเหลือ</p>
            <p>สถานะคำสั่งซื้อ</p>
            <p>การส่งมอบ</p>
            <p>การคืนสินค้า</p>
            <p>ทางเลือกการชำระเงิน</p>
            <p>ติดต่อเรา</p>
            </font>
        </div>
        <div class="col-md-2" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p>เกี่ยวกับ sanshop</p>
            <p>ข่าวสาร</p>
            <p>ร่วมงานกับเรา</p>
            <p>ร่วมลงทุนกับเรา</p>
            <p>ความยั่งยืน</p>
            </font>
        </div>  
        <div class="col-md-6" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p></p>
            </font>
        </div>  
    </div><!-- ปิด foter -->  
              
    <div class="row"><!-- เริ่มต้น foter -->
        <div class="col-md-1" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p>ไทย</p>
            </font>
        </div>
        <div class="col-md-5" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p>© 2022 sanshop, Inc. สงวนลิขสิทธิ์</p>
            </font>
        </div>
        <div class="col-md-1" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
            <p>คำแนะนำ</p>
            </font>
        </div>  
        <div class="col-md-1" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
                <p>เงื่อนไขการขาย</p>
            </font>
        </div> 
        <div class="col-md-2" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
                <p>ข้อกำหนดการใช้</p>
            </font>
        </div>    
        <div class="col-md-2" style="background-color: rgb(0, 0, 0)">
            <font color="#FFFFFF">
                <p>นโยบายความเป็นส่วนตัวของ sanshop</p>
            </font>
        </div> 
    </div> <!-- ปิด foter -->
  </body>
</body>
</html>
