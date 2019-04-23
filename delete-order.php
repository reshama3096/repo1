<?php
include('./database/config.php');
$orderid = mysqli_real_escape_string($conn,$_GET['orderid']);
$prevpaid = mysqli_real_escape_string($conn,$_GET['paid']);
$prevunpaid = mysqli_real_escape_string($conn,$_GET['unpaid']);
$custid = mysqli_real_escape_string($conn,$_GET['custid']);
$date=date('d/m/Y');

$sql="DELETE FROM `order_tbl` WHERE `order_id`='$orderid' AND `cust_id`='$custid'";
if (mysqli_query($conn,$sql)) {
	$unpaid="UPDATE `customer_tbl` SET `pending_payment`=`pending_payment`-'$prevunpaid' WHERE `cust_id`='$custid'";
	mysqli_query($conn,$unpaid);
	        $delete="DELETE FROM `payment_tbl` WHERE `order_id`='$orderid' AND `cust_id`='$custid'";
	        if(mysqli_query($conn,$delete)){
	       $res=mysqli_query($conn,"select * from `balance_tbl` where `balancedate`='$date'");
		   $rows=mysqli_num_rows($res);
			if($rows==1){
				mysqli_query($conn,"UPDATE `balance_tbl` SET `balance_amt`=`balance_amt`-'$prevpaid' WHERE `balancedate`='$date'");
			}
	        }
			echo"<script>alert('Order Deleted Succssfully Thank You !..!');
			window.location.href='all-orders.php';		
			</script>
			";	
	    }
mysqli_close($conn);
?>


