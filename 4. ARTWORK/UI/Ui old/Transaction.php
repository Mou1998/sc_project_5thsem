<?php
	session_start();
	include ("dbcon.php");
	if (isset($_POST)) {
		$title=$_POST['title'];
		$id=$_POST['c_id'];

	}
	else{ ?>
            <script type="text/javascript"> 
            alert('Error in post'); 
            window.location.href = "Transaction.php";
            </script>; <?php
            exit();
	}
	$d=date("Y-m-d");
	$sql="INSERT INTO `transactions`(`t_date`, `c_id`) VALUES ('$d','$id')";
	
	if(mysqli_query($dbcon,$sql)){
		$sql="SELECT txn_id FROM transactions WHERE txn_id = ( SELECT MAX(txn_id) FROM transactions)";

		if($result=mysqli_query($dbcon,$sql)){
			if($txn_id=mysqli_fetch_array($result)["txn_id"]){

				$sql="UPDATE `artwork` SET `txn_id`='$txn_id' WHERE `title`='$title'";
				
				if(mysqli_query($dbcon,$sql)){

					
					$sql="SELECT price FROM artwork WHERE `title`='$title'";
					
					if($result=mysqli_query($dbcon,$sql)){
						if($price=mysqli_fetch_array($result)["price"]){
							
							$sql="UPDATE `customer` SET `total_spent`=`total_spent`+$price WHERE `id`='$id'";
							
							if(mysqli_query($dbcon,$sql)){ ?>
					            <script type="text/javascript"> 
					            alert('data insert successful'); 
					            window.location.href = "Transactionform.php";
					            </script>; <?php
					        }
					        else{ ?>
					            <script type="text/javascript"> 
					            alert('customer total spent not update'); 
					            window.location.href = "Transactionform.php";
					            </script>; <?php
					            exit();
					        }
					    }
					}
					else{ ?>
			            <script type="text/javascript"> 
			            alert('customer total spent not update'); 
			            window.location.href = "Transactionform.php";
			            </script>; <?php
			            exit();
			        }
				}
				else{ ?>
		            <script type="text/javascript"> 
		            alert('not update in Artwork Table'); 
		            window.location.href = "Transactionform.php";
		            </script>; <?php
		            exit();
				}
			}
		}
		else{ ?>
            <script type="text/javascript"> 
            alert('transaction id not fetch'); 
            window.location.href = "Transactionform.php";
            </script>; <?php
			exit();
		}
	}
	else{ ?>
        <script type="text/javascript"> 
        alert('Transaction not Complete'); 
        window.location.href = "Transactionform.php";
        </script>; <?php
        exit();
	}
?>