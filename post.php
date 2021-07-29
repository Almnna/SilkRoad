<?php require "header.php"; ?>



<?php

    if(isset($_POST["post"]))
    {
        $item_type = $_POST["category"];
        $item_title = $_POST["title"];
        $item_title = strtolower($item_title);
        $item_price = $_POST["price"];
        if(isset($_POST["quantity"]))
        {
            $item_quantity = $_POST["quantity"];
        }else{
            $item_quantity = "None";
        }
        $filename = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"];     
        $folder = "static/pics/".$filename; 
        $item_unit = $_POST["unit"];
        $item_desc = $_POST["desc"];
        // echo $item_type, " ", $item_title, " ", $item_price, " ", $item_quantity, " ", 
        // $filename, " ", $tempname, " ", $folder, " ", $item_unit, " ", $item_desc;
        open_connection();
        if($conn)
        {
            $sql = "insert into warehouse(category, title, price, quantity, imagename, unit, descr) 
            values('$item_type', '$item_title', '$item_price', '$item_quantity', '$filename', '$item_unit', '$item_desc')";

            if($conn->query($sql))
            {
                if (move_uploaded_file($tempname, $folder))
                { 
                    //$msg = "Image uploaded successfully"; 
                    $item_title = $item_title." is posted successfully!";
                    setcookie("new_item", $item_title, time() + (4));
                    //echo $msg;
                    header("Location: http://localhost/post.php");
                }else{ 
                    //$msg = "Failed to upload image"; 
                    $item_title = "something went wrong ".$item_title." is not posted!!";
                    setcookie("not_new_item", $item_title, time() + (5));
                    //echo $msg;
                    header("Location: http://localhost/post.php");
                } 
            }else{
                echo $conn->connect_error;
            }
        }
        close_connection();
    }

?>


<body>
	<main>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col s3">
                        <!-- navigation panel -->
                    <?php require "menu.php"; ?>
                </div>

                <div class="card col s9" id="main" style="padding: 10px; margin-top: 10px; background-color: white; border-radius: 20px;">
                    <div class="container" >
                        <!-- Type selector -->
                        <div style="margin-top: 20px; background-color: var(--greyo);">
                            <input class="col s3" style="font-family: GothDotGothic;" type="text" value="Choose iTem Type >>" disabled/>
                            <p class="col s3">
                                <input name="category" type="radio" id="drugs" value="drugs"/>
                                <label for="drugs" style="font-family: GothDotGothic;" checked>Drugs</label>
                            </p>
                            <p class="col s3">
                                <input name="category" type="radio" id="art" value="art" checked/>
                                <label for="art" style="font-family: GothDotGothic;">Art</label>
                            </p>
                            <p class="col s3">
                                <input name="category" type="radio" id="jewel" value="jewel" />
                                <label for="jewel" style="font-family: GothDotGothic;">Jewellery</label>
                            </p>
                            <p class="col s3">
                                <input name="category" type="radio" id="electronic" value="electronic" />
                                <label for="electronic" style="font-family: GothDotGothic;">Electronics</label>
                            </p>
                            <p class="col s3">
                                <input name="category" type="radio" id="books" value="books" />
                                <label for="books" style="font-family: GothDotGothic;">Books</label>
                            </p>
                            <p class="col s3">
                                <input name="category" type="radio" id="organs" value="organs"/>
                                <label for="organs" style="font-family: GothDotGothic;">Human Organs</label>
                            </p>
                        </div>

                        <!-- item title -->
                        <div style="margin-top: 20px; margin-bottom: 20px;">
                            <input class="col s7" type="text" style="font-family: GothDotGothic;" name="title" placeholder="Title" />
                            <!-- item price in bitcoin -->
                            <input class="col s5 push-s1" style="font-family: GothDotGothic;" type="number" name="price" placeholder="BitCoinPrice"/>
                        </div>

                        <!-- item image -->
                        <div>
                            <label for="img" style="font-family: GothDotGothic;">Upload Image Of The iTem</label>
                            <input class="btn btn-large" style="margin-left: 22px; border-radius: 10px; background-color: var(--greeno);
                            font-family: GothDotGothic;" type="file" name="image" id="img" />
                        </div>

                        <!-- item quantity  & unit -->    
                        <div style="margin-top: 30px;">
                            <input class="col s3" style="font-family: GothDotGothic;" type="number" name="quantity" id="quantity" placeholder="Quantity"/>
                            <p class="col s3">
                                <input name="unit" type="radio" id="kg" value="kg"/>
                                <label for="kg" style="font-family: GothDotGothic;">Kilogram</label>
                            </p>
                            <p class="col s3">
                                <input name="unit" type="radio" id="g" value="g" checked/>
                                <label for="g" style="font-family: GothDotGothic;">Gram</label>
                            </p>
                            <p class="col s3">
                                <input name="unit" type="radio" id="mg" value="mg"/>
                                <label for="mg" style="font-family: GothDotGothic;">Milligram</label>
                            </p>
                            <p class="col s3">
                                <input name="unit" type="radio" id="Qnone" value="None"/>
                                <label for="Qnone" style="font-family: GothDotGothic;">None</label>
                            </p>
                        </div>

                        <!-- item description -->
                        <textarea id="desc" style="margin-top: 25px; font-family: GothDotGothic;" name="desc" cols="30" rows="15">
                        </textarea>
                        <label class="col s3 pull-s2" style="margin-top: -30px;" for="desc">Add Description</label>

                        <!-- submit button -->
                        <input class="col s6 offset-s3 btn btn-large" name="post" type="submit" value="Submit"
                        style="font-family: GothDotGothic; margin-bottom: 10px; border-radius: 10px; 
                        background-color: var(--greeno); margin-top: 20px;" />
                    </div>
                </div>
            </div>
        </form>
	</main>
    <script src="static/js/post.js"></script>
</body>

<?php require "footer.php"; ?>