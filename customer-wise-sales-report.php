<?php include('header.php');
include('./database/config.php');
?>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Customer-Wise Sales Report</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Date-wise Sales Report</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
		<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form id="salesreport" method="POST" action="customer-wise-sales-report.php">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
           Customer-Wise Sales Reports
                </h4>
                <div class="form-group row">
                      <div class="col-sm-3">
                          </div>
						   <div class="col-sm-3">
						   <label for="input-3">From Date</label>
						<input type="date" class="form-control" value=""  id="fromdate" name="fromdate">
						  </div>
						   <div class="col-sm-3">
						   <label for="input-3">To Date</label>
						<input type="date" class="form-control" value=""  id="todate" name="todate">
						  </div>
						   <div class="col-sm-3">
                          </div>
						</div>
						<br>
                        <div class="form-group row">
                           <div class="col-sm-5">
                          </div>
                           <div class="col-sm-2">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> View</button>
                          </div>
                           <div class="col-sm-5">
                          </div>
                        </div>
					</form>
				</div>
          </div>
        </div>
      </div><!--End Row-->
	  <?php
			// get sales record
			if(isset($_POST["fromdate"]) && isset($_POST["todate"]))
		{?>
	   <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Customer Wise Sales</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
				<thead>
					<tr>
						<th>Date</th>
						<th>Customer Name</th>
						<th>City</th>
						<th>Mobile</th>
						<th>Box</th>
						<th>Total Amt</th>
						<th>Paid Amt</th>
						<th>Unpaid Amt</th>
					</tr>
				</thead>
				 <tbody>
				<?php
				  $fromdate = $_POST["fromdate"];
				  $todate=$_POST["todate"];
$query =mysqli_query($conn,"

SELECT DATE(order_tbl.`delivery_date`) AS date,order_tbl.`no_box`,order_tbl.total_amt,order_tbl.paid_amt,order_tbl.unpaid_amt,customer_tbl.customer_name,customer_tbl.village,customer_tbl.mobile_no FROM order_tbl INNER JOIN customer_tbl ON order_tbl.cust_id=customer_tbl.cust_id WHERE `delivery_date` BETWEEN '$fromdate' AND '$todate'");
				$rowcount=mysqli_num_rows($query);
				if($rowcount>0){
				$totBox=0;
				$totAmt=0;
				$totPaid=0;
				$totUnpaid=0;
				 while($row=mysqli_fetch_array($query)){
				 $totBox=$totBox+ $row['no_box'];
				 $totAmt=$totAmt+$row['total_amt'];
				 $totPaid=$totPaid+$row['paid_amt'];
				 $totUnpaid=$totUnpaid+$row['unpaid_amt'];
				 ?>
					<tr>
						<td><?php $date = date("d/m/Y", strtotime($row['date'])); echo $date; ?></td>
						<td><?php echo $row['customer_name']; ?></td>
						<td><?php echo $row['village']; ?></td>
						<td><?php echo $row['mobile_no']; ?></td>
						<td><?php echo $row['no_box']; ?></td>
						<td>₹<?php echo $row['total_amt']; ?></td>
						<td>₹<?php echo $row['paid_amt']; ?></td>
						<td>₹<?php echo $row['unpaid_amt']; ?></td>
					</tr>
					<?php }?>
					</tbody>
					<tr>
					    <th colspan="4" style="text-align: right;font-size: 22px;">Total</th>
					    <td><?php echo $totBox; ?></td>
					    <td>₹<?php echo $totAmt; ?></td>
					    <td>₹<?php echo $totPaid; ?></td>
					    <td>₹<?php echo $totUnpaid; ?></td>
					</tr>
					<?php }
					else{
					echo "<h4>No Record Found Please Check Data Which You Provide </h4>";
					}
					}
					?>
					
				
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->
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
  <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>	
 <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'print']
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );
  
</script>
</body>
</html>
