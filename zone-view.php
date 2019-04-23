<?php include('header.php');
include('./database/config.php');
if(isset($_GET['zone_id'])){
	$zone_id=$_GET['zone_id'];
$sql=" SELECT * FROM `zone_tbl` WHERE `zone_id`='$zone_id'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
	$state=$row['state'];
	$city=$row['city'];
	$owner_name=$row['owner_name'];
	$mobile=$row['mobile'];
	$aadhar=$row['aadhar'];
	$pancard=$row['pancard'];
	$address=$row['address'];
	$co_person=$row['co_person'];
	$co_mobile=$row['co_mobile'];
	$co_almobile=$row['co_almobile'];
	$co_email=$row['co_email'];
	$landline=$row['landline'];
	$bank_name=$row['bank_name'];
	$account_no=$row['account_no'];
	$ifsc_code=$row['ifsc_code'];
	$branch_name=$row['branch_name'];
	
}
}
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Edit Zone</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Agroshopee</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Zone Edit Form</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
	      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form id="zoneForm" method="POST">
			  
			   <h4 class="form-header text-uppercase">
                <i class="fa fa-address-card"></i>
                 Zone Details
                </h4>
			<div class="form-group row">
				<label for="input-14" class="col-sm-2 col-form-label">Zone Id</label>
				<div class="col-sm-10">
				   <input type="text" class="form-control" id="zone_id" name="zone_id" value="<?php echo $zone_id;?>" readonly>
				 </div>
			</div>
                <div class="form-group row">
                  <label for="input-14" class="col-sm-2 col-form-label">State</label>
                  <div class="col-sm-4">
					<select class="form-control" id="state" name="state" required>
                        <option selected><?php echo $state; ?></option>
                    </select>
                  </div>
                  <label for="input-15" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-4">
                  <select class="form-control" id="city" name="city" required>
                        <option selected><?php echo $city; ?></option>
                    </select>
                  </div>
                </div>
		<div class="form-group row">
		  <label for="owner" class="col-sm-2 col-form-label">Owner Name</label>
		  <div class="col-sm-4">
		   <input type="text" class="form-control" id="owner" name="owner" readonly value="<?php echo $owner_name;?>">
		  </div>
		  <label for="ownmobile" class="col-sm-2 col-form-label">Mobile No</label>
		  <div class="col-sm-4">
			<input type="number" class="form-control" id="ownmobile" readonly name="ownmobile" value="<?php echo $mobile; ?>">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="pancard" class="col-sm-2 col-form-label">Pancard No</label>
		  <div class="col-sm-4">
		   <input type="text" class="form-control" id="pancard" readonly name="pancard" value="<?php echo $pancard; ?>">
		  </div>
		  <label for="aadhar" class="col-sm-2 col-form-label">Aadhar Card</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" id="aadhar" readonly name="aadhar" value="<?php echo $aadhar;?>">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="address" class="col-sm-2 col-form-label">Details Address</label>
		  <div class="col-sm-10">
			<textarea class="form-control" rows="4" id="address" readonly name="address"><?php echo $address; ?></textarea>
		  </div>
		</div>
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-users"></i>
                  Contact Details
                </h4>
                <div class="form-group row">
                  <label for="coperson" class="col-sm-2 col-form-label">Contact Person Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="coperson" readonly name="coperson" value="<?php echo $co_person; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="comobile" class="col-sm-2 col-form-label">Mobile No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="comobile" readonly name="comobile" value="<?php echo $co_mobile; ?>">
                  </div>
                  <label for="coalmob" class="col-sm-2 col-form-label">Alternative Mobile</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="coalmob"  readonly name="coalmob" value="<?php echo $co_almobile; ?>">
                  </div>
                </div>
				<div class="form-group row">
                  <label for="coemail" class="col-sm-2 col-form-label">Email id</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="coemail" readonly name="coemail" value="<?php echo $co_email; ?>">            
				 </div>
                  <label for="landline" class="col-sm-2 col-form-label">Landline</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="landline" readonly name="landline" value="<?php echo $landline; ?>">                        
				 </div>
                </div>
				
		<h4 class="form-header text-uppercase">
                <i class="fa fa-user"></i>
				Employment Details
                </h4>
			<div class="table-responsive">
			<div class="card-header form-footer"><i class="fa fa-table"></i>Employee Assignment</div>
				<table class="table table-bordered" id="datatable">
					<tr>
						<th>Employee id</th>
						<th>Employee Name</th>
						<th>Mobile</th>
						<th>Designation</th>
						<th>City</th>
					</tr>
					<?php 
                   $query="SELECT employee_tbl.employee_id,employee_tbl.fname,employee_tbl.lname,employee_tbl.mobile,employee_tbl.district,employee_tbl.designation FROM employee_tbl INNER JOIN employment_assign ON employee_tbl.employee_id=employment_assign.employee_id WHERE employment_assign.assign_to='$zone_id'";
				 $res=mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($res)){?>	
					  <tr>
						<td><?php echo $row['employee_id']; ?></td>
						<td><?php echo $row['fname']." ".$row['lname']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
						<td><?php echo $row['designation']; ?></td>
						<td><?php echo $row['district']; ?></td>
					  </tr>
				   <?php } ?>
				</table>
			</div>
			<br><br>
		
				<h4 class="form-header text-uppercase">
                <i class="fa fa-university"></i>
                 Bank Details
                </h4>
                <div class="form-group row">
                  <label for="bankname" class="col-sm-2 col-form-label">Bank Name</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="bankname" readonly name="bankname" value="<?php echo $bank_name; ?>">
                  </div>
                  <label for="accountno" class="col-sm-2 col-form-label">Account No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="accountno" readonly name="accountno" value="<?php echo $account_no; ?>">
                  </div>
                </div>
				<div class="form-group row">
                  <label for="branchname" class="col-sm-2 col-form-label">Branch Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="branchname" readonly name="branchname" value="<?php echo $branch_name; ?>">
                  </div>
                  <label for="ifsccode" class="col-sm-2 col-form-label">IFSC Code</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="ifsccode" readonly name="ifsccode" value="<?php echo $ifsc_code; ?>">
                  </div>
                </div>
                <div class="form-footer">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->
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
  <script src="assets/js/customfunction.js"></script>
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

  <!--Bootstrap Touchspin Js-->
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js"></script>

    <!--Select Plugins Js-->
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <!--Inputtags Js-->
    <script src="assets/plugins/inputtags/js/bootstrap-tagsinput.js"></script>

    <!--Bootstrap Datepicker Js-->
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   
    <!--Multi Select Js-->
    <script src="assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
    <script src="assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>

	</body>
</html>
