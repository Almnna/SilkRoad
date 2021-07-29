<?php
    require 'globals.php';

    $q = $_GET['q'];
    if(!empty($q))
    {
        open_connection();
    
        if($conn)
        {
            $sql = "select * from warehouse where title like '%$q%'";
            if($res = $conn->query($sql))
            {
                if($res->num_rows > 0)
                {
                    while($items = $res->fetch_assoc())
                    {
                        $id = $items["id"];
                        $title = $items["title"];
                        $price = $items["price"];
                        $image = "static/pics/".$items["imagename"];				
                        $card = "
                            <div class='col s3'>
                                <div class='card hoverable'>
                                    <div class='card-image'>
                                        <img src='${image}' width='280px' height='280px'/>
                                        <span class='card-title' style='margin-bottom: 5px;'>
                                            <span style='background-color: var(--greeno);'>${title} </span>
                                        </span>
                                    </div>
                                    <div class='card-action'>
                                    <span class='col s3 new badge' style='font-family: DotGothic; font-size: 15px; margin-top: -45px; margin-left: -15px;'>${price}₿</span>
                                        <a href='http://localhost/detail.php?id=${id}' class='btn' style='font-family: DotGothic; background-color: var(--greeno); width: 193px; height: 40px;'>
                                        Add To Cart <i class='material-icons' style='font-family: materialize-icons'>add_shopping_cart</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ";
                        echo $card;
                    }
                }		
            }
        }
    
    
        close_connection();
    }else{
        open_connection();
    
        if($conn)
        {
            $sql = "select * from warehouse";
            if($res = $conn->query($sql))
            {
                if($res->num_rows > 0)
                {
                    while($items = $res->fetch_assoc())
                    {
                        $id = $items["id"];
                        $title = $items["title"];
                        $price = $items["price"];
                        $image = "static/pics/".$items["imagename"];				
                        $card = "
                            <div class='col s3'>
                                <div class='card hoverable'>
                                    <div class='card-image'>
                                        <img src='${image}' width='280px' height='280px'/>
                                        <span class='card-title' style='margin-bottom: 5px;'>
                                            <span style='background-color: var(--greeno);'>${title} </span>
                                        </span>
                                    </div>
                                    <div class='card-action'>
                                    <span class='col s3 new badge' style='font-family: DotGothic; font-size: 15px; margin-top: -45px; margin-left: -15px;'>${price}₿</span>
                                        <a href='http://localhost/detail.php?id=${id}' class='btn' style='font-family: DotGothic; background-color: var(--greeno); width: 193px; height: 40px;'>
                                        Add To Cart <i class='material-icons' style='font-family: materialize-icons'>add_shopping_cart</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ";
                        echo $card;
                    }
                }		
            }
        }
    
    
        close_connection();
    }





?>