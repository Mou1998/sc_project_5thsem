<?php
	session_start();
	include("dbcon.php");
	$error=0;
	if(isset($_POST)){
		$c_name=$_POST['c_name'];
		$c_address=$_POST['c_address'];
		$c_groups=$_POST['c_groups'];
		$c_artists=$_POST['c_artists'];
		$group_array = explode ("," , $c_groups);
		$artist_array = explode ("," , $c_artists);
	}
	else{ ?>
		<script type="text/javascript"> 
	        alert('Customerform.html has some error when post'); 
	        window.location.href = "Customerform.html";
        </script>
        <?php exit();
	}
	$sql="INSERT INTO customer (c_name, c_address, total_spent) VALUES ('$c_name', '$c_address', '0')";
	if(mysqli_query($dbcon,$sql)){
		$sql="SELECT id FROM customer WHERE id = ( SELECT MAX(id) FROM customer)";
		if($result=mysqli_query($dbcon,$sql)){
			if($id=mysqli_fetch_array($result)["id"]){
				foreach ($group_array as $group) {
					$sql="INSERT INTO likegroups (c_id, g_name) VALUES ('$id', '$group')";
					if(!mysqli_query($dbcon,$sql)){ ?>
						<script type="text/javascript"> 
					        alert('insert likegroup problem at <?php echo $group ?>');
				        </script>
			<?php	
						$error++;
					}
				}
				foreach ($artist_array as $artist) {
					$sql="INSERT INTO prefers (a_name, c_id) VALUES ('$artist', '$id')";
					if(!mysqli_query($dbcon,$sql)){ ?>
						<script type="text/javascript"> 
					        alert('insert prefers problem at <?php echo $artist ?>');
				        </script>
			<?php		$error++;
					}
				}
			}
			else{ ?>
				<script type="text/javascript"> 
			        alert('cannot find id of customer');
		        </script>
	<?php		$error++;
			}
		}
		else{ ?>
			<script type="text/javascript"> 
		        alert('id query not run');
	        </script>
<?php		$error++;
		}
	}
	else{ ?>
		<script type="text/javascript"> 
	        alert('insert query not run');
        </script>
<?php	$error++;
	}
	if($error==0){ ?>
		<script type="text/javascript"> 
            alert("data successfully saved"); 
            window.location.href = "Customerform.html";
        </script>;
<?php
	}
	else{ ?>
		<script type="text/javascript"> 
            alert("data not fully insert successfully"); 
            window.location.href = "Customerform.html";
        </script>;
<?php
	}
?>