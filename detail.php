<?php require "header.php"; ?>

<body>
    <main>
        <div class="row">
            <div class="col s3">
                <?php require "menu.php"; ?>
            </div>
            <div class="col s9" id="main" style="margin-top: 5px;">
                <?php 
                    open_connection();
                    if($conn)
                    {
                        $id = $_GET["id"];
                        $sql = "select * from warehouse where id=${id}";

                        if($res = $conn->query($sql))
                        {
                            $item_details = $res->fetch_assoc();
                        }
                    }
                    close_connection();
                ?>
                <div class="row">
                    <div class="col s7 push-s4"><span class="flow-text"></span>            
                    <table>
                        <thead>
                        <tr>
                            <th style="font-family: DotGothic;">Name</th>
                            <td style="font-family: DotGothic;"><?php echo $item_details["title"]; ?></td>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th style="font-family: DotGothic;">Category</th>
                            <td style="font-family: DotGothic;"><?php echo $item_details["category"]; ?></td>
                        </tr>
                        <tr>
                            <th style="font-family: DotGothic;">Quantity</th>
                            <td style="font-family: DotGothic;"><?php if($item_details["quantity"] == "None"){echo "1";}else{
                                echo $item_details["quantity"].$item_details["unit"];
                            }?></td>
                        </tr>
                        <tr>
                            <th style="font-family: DotGothic;">Price</th>
                            <td style="font-family: DotGothic; color: var(--greeno);"><?php echo $item_details["price"].'₿'; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col s5 pull-s7"><span class="flow-text"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col s12 pull-s5">
                                    <div class="card z-depth-5" style="border-radius: 30px;">
                                        <div class="card-image" style="height: 280px;">
                                            <?php $image = "static/pics/".$item_details['imagename'];?>
                                            <img src='<?php echo"${image}";?>'/>
                                            <div class="card-content">
                                                <p>
                                                    <a class="btn col s4 " style="font-family: DotGothic; background-color: red;" href="#">
                                                        <i class="material-icons" style="font-family: materialize-icons">report</i>
                                                    </a>
                                                </p>
                                                <p>
                                                    <a class="btn col s7" style="margin-left: 4px;font-family: DotGothic; background-color: var(--greeno);" href="#">
                                                        <i class="material-icons" style="font-family: materialize-icons">add_shopping_cart</i>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col s12 pull-s1">
                        <div class="card valign-wrapper z-depth-5" style="border-radius: 30px;">
                            <div class="card-content">
                                <h3 style="font-family: DotGothic;">Description:-</h3>
                                <p style="margin: 30px; font-family: DotGothic; font-size: 20px;">
                                    <?php echo $item_details["descr"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<?php require "footer.php"; ?>