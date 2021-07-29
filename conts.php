<?php require "header.php"; 
    $ahmad = '{"name": "ahmad 240"}';
    $decoded = json_decode($ahmad);
?>
<body>
<script src="static/js/contrib.js"></script>
    <main>
        <div class="row">
            <div class="col s3">
                <?php require "menu.php"; ?>
            </div>
            <div class="col s9" id="main" style="margin-top: 30px;">
                <ul class="collection container">
                    <li class="collection-item avatar">
                    <img src="static/images/almnna.png" alt="" class="circle">
                    <span class="title" id="1"><?php echo $decoded->{'name'}; ?></span>
                    </p>
                    <a href="#" class="secondary-content"><i class="material-icons" style="font-family: materialize-icons">
                    grade</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</body>
<?php require "footer.php"; ?>
