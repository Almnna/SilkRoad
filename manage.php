<?php require "header.php"; if(!empty($_SESSION)){
    if($_SESSION["username"] != "admin"){
        header("location: http://localhost/dashboard.php");
    }
}?>
<body>
	<main>
		<div class="row">
			<div class="col s3">
					<!-- navigation panel -->
				<?php require "menu.php"; ?>
			</div>
			<div class="col s9" id="main" style="margin-top: 5px;">
				<div class="card col pull-s1" style="border-radius: 15px; margin-left: -20px;">
					<a href="http://localhost/conts.php">
						<i class="material-icons" style="margin-left: 22px;font-size: 40px; color: var(--greeno); font-family: materialize-icons">person</i>
						<p>Contributors</p>
					</a>
				</div>
				<ul class="collection z-depth-1">
				<?php 
					open_connection();

					if($conn)
					{
						$sql = "select * from warehouse";

						if($result = $conn->query($sql)){
							if($result->num_rows > 0)
							{
								while($items = $result->fetch_assoc())
								{
									$img = $items["imagename"];
									$title = $items["title"];
									$id = $items['id'];
									$descr = $items['descr'];
									$delete_id = "http://localhost/delete.php?id=".$id;
									$card = "
										<li class='collection-item avatar'>
				        				<img src='static/pics/${img}' alt='img' class='circle'>
				        				<span class='title'>${title}</span>
				        				<p>${descr}<br>
				        				</p>
				        				<a href='${delete_id}' class='secondary-content'><i class='material-icons' style='font-family: materialize-icons; color: red;'>delete</i></a>
				    					</li>";

									echo $card;
									
								}
							}						
						}
					}

					close_connection();
				?>
				    
				</ul>
			</div>
		</div>
	</main>
</body>

<?php require "footer.php"; ?>