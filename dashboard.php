<?php include('header.php'); 
include('./database/config.php');
//total Boxes
$box="SELECT `tot_stock` FROM `production_stock` WHERE `stock_name`='Boxes'";
$res=mysqli_query($conn,$box);
$totrow=mysqli_fetch_array($res);
//Row Material Preform
$preform="SELECT `good_stock` FROM `row_material_stock` WHERE `stock_name`='Preform'";
$res=mysqli_query($conn,$preform);
$preformrow=mysqli_fetch_array($res);
//Row Material Precap
$precap="SELECT `good_stock` FROM `row_material_stock` WHERE `stock_name`='Precap'";
$res=mysqli_query($conn,$precap);
$caprow=mysqli_fetch_array($res);
//Row Material Box
$box="SELECT `good_stock` FROM `row_material_stock` WHERE `stock_name`='Boxes'";
$res=mysqli_query($conn,$box);
$boxrow=mysqli_fetch_array($res);
//Row Material Labels
$labels="SELECT `good_stock` FROM `row_material_stock` WHERE `stock_name`='Labels'";
$res=mysqli_query($conn,$labels);
$labelrow=mysqli_fetch_array($res);

// Today Order
$date=date('Y-m-d');
$order="SELECT SUM(`no_box`) as todayorder FROM order_tbl WHERE `status` ='Processing' AND `delivery_date`='$date'";
$count=mysqli_query($conn,$order);
$row=mysqli_fetch_array($count);
// Completed Orders
$complete="SELECT SUM(`no_box`) as completeorder FROM order_tbl WHERE `status` ='Completed' AND `delivery_date`='$date'";
$co=mysqli_query($conn,$complete);
$comp=mysqli_fetch_array($co);
// total unpaid Payment
$txndate=date('d/m/Y');
$payment2=mysqli_query($conn,"SELECT sum(`unpaid_amt`) as `unpaid` FROM order_tbl WHERE `order_date`='$txndate'");
$unpaid=mysqli_fetch_array($payment2);
?>
<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->
	   <div class="card-header border-0" style="font-size: 16px;color: #b78604;">
              Details Of Agro Shopee
                </div>
      <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
          <div class=" card bg-pattern-primary ">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">26</h4>
                <span class="text-white">Zone</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-folder-o text-white"></i></div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-danger">
            <div class="card-body">
              <div class="media">
               <div class="media-body text-left">
                <h4 class="text-white">250</h4>
                <span class="text-white">Franchise</span>
              </div>
               <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="icon-wallet text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-success">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">1200</h4>
                <span class="text-white">Employee</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-check-square text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-warning">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">120</h4>
                <span class="text-white">Other</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-eye-slash text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
	<!---------Expenses And Balance Payment----->  
	<!-----
	<div class="card-header border-0" style="font-size: 16px;color: #b78604;">
             Todays Payment Details
                </div>
	    <div class="row">
         <div class="col-12 col-lg-7 col-xl-8">
           <div class="card gradient-blooker" style="background: #ffffff !important">
		     <div class="card-header bg-transparent  border-light">Todays Expenses
				 <div class="card-action">
				 <div class="dropdown">
				 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
				  <i class="icon-options topseller"></i>
				 </a>
				    <div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="javascript:void();">View All Expenses</a>
					 </div>
				  </div>
                 </div>
				</div>
              <div class="card-body">
                 <div class="row">
                   <div class="col-lg-12 col-xl-12">
		<?php
				   // total paid Payment
		$todayExp=mysqli_query($conn,"SELECT * FROM `expenses_tbl` WHERE `exp_date`='$txndate' ORDER BY `expenses_tbl`.`eid` DESC");
		while($result=mysqli_fetch_array($todayExp)){?>
			<p class="mt-3  topseller"><i class="fa fa-flag-checkered mr-1"></i><?php echo $result['reason'];?><span class="float-right"><?php echo "₹".$result['debit'];?></span></p>
                      <div class="progress" style="height: 7px;">
                          <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 55%"></div>
                        </div>
		<?php }
		?>
                   </div>
                 </div>
              </div>
            </div>
         </div>
<?php 
// total paid Payment
$payment=mysqli_query($conn,"SELECT sum(`paid_now`) as `paid` FROM  `payment_tbl` WHERE `txn_date`='$txndate'");
$paid=mysqli_fetch_array($payment);
//todays  Expenses 
$sql1="SELECT sum(`debit`) as `expense` FROM `expenses_tbl` WHERE `exp_date`='$txndate'";
$exp1=mysqli_query($conn,$sql1);
$exp=mysqli_fetch_array($exp1);
//Today balance 
$sql2="SELECT `balance_amt` FROM `balance_tbl` WHERE `balancedate`='$txndate'";
$bal1=mysqli_query($conn,$sql2);
$balance=mysqli_fetch_array($bal1);
?>
         <div class="col-12 col-lg-5 col-xl-4">
            <div class="card" style="background: linear-gradient(45deg, #616958, #a8c388)!important;">
            <div class="card-body">
              <a href="processing-order.php"><div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">
				<?php if($paid['paid']!=""){echo "₹".$paid['paid'];}else{echo "₹0";} ?>
				</h4>
                <span class="text-white">Todays Payment</span>
              </div>
			  <div class="align-self-center w-circle-icon rounded bg-contrast">
                <i class="fa fa-inr text-white"></i></div>
            </div></a>
            </div>
          </div>
          <div class="card" style="background: linear-gradient(45deg, #7d7c76, #ecb462)!important;">
            <div class="card-body">
              <a href="completed-orders.php"> <div class="media">
			  <div class="media-body text-left">
                <h4 class="text-white">
				<?php if($exp['expense']!=""){echo "₹".$exp['expense'];}else{echo "₹0";} ?>
				</h4>
                <span class="text-white">Today Expenses</span>
              </div>
               <div class="align-self-center w-circle-icon rounded bg-contrast">
                <i class="fa fa-exchange text-white"></i></div>
            </div></a>
            </div>
          </div>
          <div class="card" style="background: linear-gradient(45deg, #736e6e, #e6aeae)!important;">
            <div class="card-body">
               <a href="pending-orders.php"><div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">
				<?php if($balance['balance_amt']!=""){echo "₹".$balance['balance_amt'];}else{echo "₹0";} ?>
				</h4>
                <span class="text-white">Available Balance</span>
              </div>
			  <div class="align-self-center w-circle-icon rounded bg-contrast">
                <i class="fa fa-shopping-basket text-white"></i></div>
            </div></a>
            </div>
          </div>

         </div>
      </div><!--End Row-->
	<!--End Expenses & Balance-->  
     <!---- <div class="row">
        <div class="col-lg-12">
          <div class="card bg-table">
		  <div class="card-header bg-transparent border-0">
                Recent Processing Orders
				<div class="card-action">
				 <div class="dropdown">
				 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
				  <i class="icon-options"></i>
				 </a>
				    <div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="processing-order.php">View All Orders</a>
					 </div>
				  </div>
                 </div>
                </div>
               <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                  <thead>
                   <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Mobile No</th>
                        <th>No. Boxes</th>
						<th>Total Amount</th>
                        <th>Paid</th>
						<th>Delivery Date</th>
						<th>View Details</th>
                    </tr>
                   </thead>
                   <tbody>
				<?php 
                   $query="SELECT order_tbl.*, customer_tbl.customer_name FROM order_tbl INNER JOIN customer_tbl ON order_tbl.cust_id=customer_tbl.cust_id WHERE order_tbl.status='Processing' ORDER BY `order_tbl`.`id` DESC limit 5";
                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){?>
        			<tr>
                			<td><?php echo $row['order_id']; ?></td>
                			<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['mobile']; ?></td>
                			<td><?php echo $row['no_box']; ?></td>
							<td>₹<?php echo $row['total_amt']; ?></td>
							<td>₹<?php echo $row['paid_amt']; ?></td>
							<td><?php echo $row['delivery_date']; ?></td>
							<td><button type="button" value="<?php echo $row['order_id']; ?>" class="btn btn-info btn-sm btn-round waves-effect waves-light m-1" onclick="viewOrder(this.value)">View</button></td>
                		</tr>
				<?php } ?>   
                </tbody>
                 </table>
               </div>
          </div>
        </div>
      </div><!--End Row-->
        <!---<div class="row">
        <div class="col-lg-12">
          <div class="card bg-table">
		  <div class="card-header bg-transparent border-0">
                Water Jar Recent Bookings
				<div class="card-action">
				 <div class="dropdown">
				 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
				  <i class="icon-options"></i>
				 </a>
				    <div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="all-jar-booking.php">View All Booking</a>
					 </div>
				  </div>
                 </div>
                </div>
               <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                  <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>Customer Name</th>
                        <th>Mobile No</th>
                        <th>City/Village</th>
                        <th>No. Jar</th>
						<th>Total Amount</th>
                        <th>Paid</th>
                        <th>Unpaid</th>
						<th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                $query="SELECT * FROM jar_booking1 WHERE `status`='Processing' AND (`delivery_date` >= NOW() AND `delivery_date` < NOW() + INTERVAL 60 DAY) ORDER BY `jar_booking1`.`delivery_date` ASC";
                

                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){?>
        			<tr>
                			<td><?php echo $row['booking_id']; ?></td>
                			<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
                			<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['no_jar']; ?></td>
							<td>₹ <?php echo $row['totamt']; ?></td>
							<td>₹ <?php echo $row['advance_paid']; ?></td>
							<td>₹ <?php echo $row['remaining']; ?></td>
							<td><?php echo date("d/m/Y", strtotime($row['delivery_date'])); ?></td>
                	</tr>
				<?php } ?>   
                </tbody>
                 </table>
               </div>
          </div>
        </div>>
      </div><!--End Row-->
   <!----<div class="card-header border-0" style="font-size: 16px;color: #b78604;">
              Row Materials In Stock
                </div>
      <div class="row mt-3">
            <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-success">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $preformrow['good_stock']; ?></h4>
                <span class="text-white">Available Preform</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-hourglass-o text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class=" card bg-pattern-primary ">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $caprow['good_stock']; ?></h4>
                <span class="text-white">Available Precap</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-retweet text-white"></i></div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-warning">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $boxrow['good_stock']; ?></h4>
                <span class="text-white">Available Boxes</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-object-group text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-danger">
            <div class="card-body">
              <div class="media">
               <div class="media-body text-left">
                <h4 class="text-white"><?php echo $labelrow['good_stock']; ?></h4>
                <span class="text-white">Total Labels</span>
              </div>
               <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="fa fa-flag text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
     <!--- <div class="row">
         <div class="col-12 col-lg-7 col-xl-8">
           <div class="card gradient-blooker" style="background: #ffffff !important">
		     <div class="card-header bg-transparent  border-light">Top Selling Customers
				 <div class="card-action">
				 <div class="dropdown">
				 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
				  <i class="icon-options topseller"></i>
				 </a>
				    <div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="javascript:void();">Action</a>
						<a class="dropdown-item" href="javascript:void();">Another action</a>
						<a class="dropdown-item" href="javascript:void();">Something else here</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:void();">Separated link</a>
					 </div>
				  </div>
                 </div>
				</div>
              <div class="card-body">
                 <div class="row">
                   <div class="col-lg-12 col-xl-12">
                     <p class="topseller"><i class="fa fa-flag-checkered mr-1"></i> Hotel Mahendra <span class="float-right">70%</span></p>
                     <div class="progress" style="height: 7px;">
                          <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 70%"></div>
                      </div>

                      <p class="mt-3  topseller"><i class="fa fa-flag-checkered mr-1"></i> Silver Palace <span class="float-right">65%</span></p>
                      <div class="progress" style="height: 7px;">
                          <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 65%"></div>
                      </div>

                      <p class="mt-3  topseller"><i class="fa fa-flag-checkered mr-1"></i> Tanarika Resort <span class="float-right">60%</span></p>
                      <div class="progress" style="height: 7px;">
                          <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 60%"></div>
                        </div>

                      <p class="mt-3  topseller"><i class="fa fa-flag-checkered mr-1"></i> Manasi Hotel <span class="float-right">55%</span></p>
                      <div class="progress" style="height: 7px;">
                          <div class="progress-bar bg-dark progress-bar-striped" role="progressbar" style="width: 55%"></div>
                        </div>

                      <p class="mt-3  topseller"><i class="fa fa-flag-checkered mr-1"></i> Meridian Planza <span class="float-right">50%</span></p>
                      <div class="progress" style="height: 7px;">
                          <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 50%"></div>
                        </div>

                   </div>
                 </div>
              </div>
            </div>
         </div>
<?php 
//Processing Orders
$query1="SELECT COUNT(*) as `order` FROM order_tbl WHERE`status`='Processing'";
$res1=mysqli_query($conn,$query1);
$porder=mysqli_fetch_array($res1);
//Completed Orders
$query2="SELECT COUNT(*) as `order` FROM order_tbl WHERE`status`='Completed'";
$res2=mysqli_query($conn,$query2);
$corder=mysqli_fetch_array($res2);
//Pending Orders
$query3="SELECT COUNT(*) as `order` FROM order_tbl WHERE`status`='Pending'";
$res3=mysqli_query($conn,$query3);
$penorder=mysqli_fetch_array($res3);

?>
         <div class="col-12 col-lg-5 col-xl-4">
            <div class="card gradient-shifter">
            <div class="card-body">
              <a href="processing-order.php"><div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $porder['order']; ?></h4>
                <span class="text-white">Processing Orders</span>
              </div>
			  <div class="align-self-center w-circle-icon rounded bg-contrast">
                <i class="fa fa-eye text-white"></i></div>
            </div></a>
            </div>
          </div>
          <div class="card gradient-meridian">
            <div class="card-body">
              <a href="completed-orders.php"> <div class="media">
			  <div class="media-body text-left">
                <h4 class="text-white"><?php echo $corder['order']; ?></h4>
                <span class="text-white">Completed Orders</span>
              </div>
               <div class="align-self-center w-circle-icon rounded bg-contrast">
                <i class="fa fa-check-square-o text-white"></i></div>
            </div></a>
            </div>
          </div>
          <div class="card gradient-ibiza">
            <div class="card-body">
               <a href="pending-orders.php"><div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $penorder['order']; ?></h4>
                <span class="text-white">Pending Orders</span>
              </div>
			  <div class="align-self-center w-circle-icon rounded bg-contrast">
                <i class="fa fa-exclamation-triangle text-white"></i></div>
            </div></a>
            </div>
          </div>

         </div>
      </div><!--End Row-->
  <!--End Dashboard Content-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<?php include('footer.php') ?>
	<!--End footer-->
   
  </div><!--End wrapper-->
<div class="modal fade" id="viewDetails">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
					  <div class="modal-body">
						<div class="card-body">
                  <!-- Main content -->
						<section class="invoice" id="orderDetails">
					    </section><!-- /.content -->
						</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                      </div>
                    </div>
                  </div>
                </div>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
  <!-- Vector map JavaScript -->
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Chart js -->
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Index js -->
  <script src="assets/js/index.js"></script>
  <script>
function viewOrder(val) {
$.ajax({
type: "POST",
url: "./database/get_order_details.php",
data:'pro_order_id='+val,
success: function(data){
 $("#orderDetails").html(data);
 $("#viewDetails").modal('show');
	}
});      
}
</script>
</body>
</html>
