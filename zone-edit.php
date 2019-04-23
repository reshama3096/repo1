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
						<option value="Maharashtra">Maharashtra</option>
                        <option value="Gujrat">Gujrat</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="UttarPradesh">UttarPradesh</option>
                        <option value="Bihar">Bihar</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Tamilnandu">Tamilnandu</option>
						<option value="Odisa">Odisa</option>
						<option value="Punjab">Punjab</option>
						<option value="Hariyana">Hariyana</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="West Bengal">West Bengal</option>
						<option value="Chhatisgad">Chhatisgad</option>
                    </select>
                  </div>
                  <label for="input-15" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-4">
                  <select class="form-control" id="city" name="city" required>
                        <option selected><?php echo $city; ?></option>
						<option value="Mumbai">Mumbai</option>
                        <option value="Pune">Pune</option>
                        <option value="Nashik">Nashik</option>
                        <option value="Aurangabad">Aurangabad</option>
                        <option value="Jalgaon">Jalgaon</option>
						<option value="Baramati">Baramati</option>
                        <option value="Kolhapur">Kolhapur</option>
                        <option value="Satara">Satara</option>
                        <option value="Sangali">Sangali</option>
                        <option value="Nagpur">Nagpur</option>
						<option value="Yavatmal">Yavatmal</option>
                        <option value="Wardha">Wardha</option>
                        <option value="Dhule">Dhule</option>
                        <option value="Chandrapur">Chandrapur</option>
                        <option value="Gadchiroli">Gadchiroli</option>
						<option value="Akola">Akola</option>
                        <option value="Amaravati">Amaravati</option>
                        <option value="Buldhana">Buldhana</option>
                        <option value="Nandurbar">Nandurbar</option>
                        <option value="Ahmadnagar">Ahmadnagar</option>
                    </select>
                  </div>
                </div>
		<div class="form-group row">
		  <label for="owner" class="col-sm-2 col-form-label">Owner Name</label>
		  <div class="col-sm-4">
		   <input type="text" class="form-control" id="owner" name="owner" value="<?php echo $owner_name;?>">
		  </div>
		  <label for="ownmobile" class="col-sm-2 col-form-label">Mobile No</label>
		  <div class="col-sm-4">
			<input type="number" class="form-control" id="ownmobile" name="ownmobile" value="<?php echo $mobile; ?>">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="pancard" class="col-sm-2 col-form-label">Pancard No</label>
		  <div class="col-sm-4">
		   <input type="text" class="form-control" id="pancard" name="pancard" value="<?php echo $pancard; ?>">
		  </div>
		  <label for="aadhar" class="col-sm-2 col-form-label">Aadhar Card</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $aadhar;?>">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="address" class="col-sm-2 col-form-label">Details Address</label>
		  <div class="col-sm-10">
			<textarea class="form-control" rows="4" id="address" name="address"><?php echo $address; ?></textarea>
		  </div>
		</div>
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-users"></i>
                  Contact Details
                </h4>
                <div class="form-group row">
                  <label for="coperson" class="col-sm-2 col-form-label">Contact Person Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="coperson" name="coperson" value="<?php echo $co_person; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="comobile" class="col-sm-2 col-form-label">Mobile No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="comobile" name="comobile" value="<?php echo $co_mobile; ?>">
                  </div>
                  <label for="coalmob" class="col-sm-2 col-form-label">Alternative Mobile</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="coalmob" name="coalmob" value="<?php echo $co_almobile; ?>">
                  </div>
                </div>
				<div class="form-group row">
                  <label for="coemail" class="col-sm-2 col-form-label">Email id</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="coemail" name="coemail" value="<?php echo $co_email; ?>">            
				 </div>
                  <label for="landline" class="col-sm-2 col-form-label">Landline</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="landline" name="landline" value="<?php echo $landline; ?>">                        
				 </div>
                </div>
				
			<!---<h4 class="form-header text-uppercase">
                <i class="fa fa-user"></i>
				Employment Details
                </h4>

                <div class="form-group row">
                  <label for="input-14" class="col-sm-2 col-form-label">Designation</label>
                  <div class="col-sm-3">
                   <select class="form-control" id="designation" name="designation" >
                        <option selected disabled>Select Designation</option>
						<option value="Branch Manager">Sales Manager</option>
                        <option value="Reginal Manager">Reginal Manager</option>
                        <option value="Sales Officer">Sales Officer</option>
                        <option value="Executive">Executive</option>
                        <option value="Branch Manager">Branch Manager</option>
						<option value="Office Boy">Office Boy</option>
						<option value="Accountant">Accountant</option>
                    </select>
                  </div>
                  <label for="input-15" class="col-sm-2 col-form-label">Employee Name</label>
                  <div class="col-sm-4">
                  <select class="form-control" name="empname" id="empname">
                        <option selected disabled>Select Employee</option>
						<option>Lokesh Sonawane</option>
                        <option>Pradip More</option>
                        <option>Kalpesh Gaikwad</option>
                        <option>Nilima Wadhal</option>
                        <option>Vishal Londhe</option>
						<option>Reshma Mahajan</option>
                    </select>
                  </div>
                </div>
				<div class="form-group row">
                  <label for="input-14" class="col-sm-2 col-form-label">Employee Id</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="empid">
                  </div>
                  <label for="input-15" class="col-sm-2 col-form-label">Mobile No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="empmobile">
                  </div>
				   <div class="col-sm-1">
                   	 <button type="button" class=" btn btn-info form-control" id="add"> Add</button>
                  </div>
                </div>
				
			<div class="table-responsive">
			<div class="card-header form-footer"><i class="fa fa-table"></i>Employee Assignment</div>
				<table class="table table-bordered" id="datatable">
					<tr>
						<th>X</th>
						<th>Employee id</th>
						<th>Employee Name</th>
						<th>Mobile</th>
						<th>Designation</th>
					</tr>
					  <input type="hidden" name="empcount" id="empcount" value="0" readonly>   
					<div class="form-footer">
						<button type="button" id="removerow"class="btn btn-danger pull-right"><i class="fa fa-remove"></i></button>
					</div>
				</table>
			</div>
			<br><br>
			---->
				<h4 class="form-header text-uppercase">
                <i class="fa fa-university"></i>
                 Bank Details
                </h4>
                <div class="form-group row">
                  <label for="bankname" class="col-sm-2 col-form-label">Bank Name</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="bankname" name="bankname" value="<?php echo $bank_name; ?>">
                  </div>
                  <label for="accountno" class="col-sm-2 col-form-label">Account No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="accountno" name="accountno" value="<?php echo $account_no; ?>">
                  </div>
                </div>
				<div class="form-group row">
                  <label for="branchname" class="col-sm-2 col-form-label">Branch Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="branchname" name="branchname" value="<?php echo $branch_name; ?>">
                  </div>
                  <label for="ifsccode" class="col-sm-2 col-form-label">IFSC Code</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="ifsccode" name="ifsccode" value="<?php echo $ifsc_code; ?>">
                  </div>
                </div>
                <div class="form-footer">
                    <button type="submit" name="saveZone" id="saveZone" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Update</button>
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
  <div class="modal fade" id="zoneAlert">
                  <div class="modal-dialog">
                    <div class="modal-content animated flipInX">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-user-o"></i>Zone Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  
                       <p>Zone Updated Successfully !!!<br>Thank You !!!<span id="sql"></span> </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onClick="javaScript:window.history.back();" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                      </div>
                    </div>
                  </div>
                </div>
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
    <script>
      $('#default-datepicker').datepicker({
        todayHighlight: true,
        autoclose: true
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      $('#inline-datepicker').datepicker({
         todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({
       });

    </script>
    <!--Multi Select Js-->
    <script src="assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
    <script src="assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		var count=0;
        $("#add").click(function(){
			count++;
			var empid = $("#empid").val();
            var empname = $("#empname").val();
            var empmobile = $("#empmobile").val();
			var designation = $("#designation").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' class='form-control' name='empid"+count+"' value='"+empid+"' readonly></td><td><input type='text' class='form-control' name='empname"+count+"' value='"+empname+"' readonly></td><td><input type='text' class='form-control' name='empmobile"+count+"' value='"+empmobile+"' readonly></td><td><input type='text' class='form-control' name='designation"+count+"' value='"+designation+"' readonly></td></tr>";
            $("table tbody").append(markup);
			$("#empcount").val(count);
			$("#empid").val("");
            $("#empname").val("");
            $("#empmobile").val("");
			$("#designation").val("");
        });
        // Find and remove selected table rows
        $("#removerow").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
 });
</script>
<script>
$(document).ready(function(){
        $('#zoneForm').on('submit', function (e) {
           $('#saveZone').attr("disabled", true);
          e.preventDefault();
		
          $.ajax({
            type: 'post',
            url: './database/zone-update.php',
            data: $('#zoneForm').serialize(),
            success: function (data) {
			  if(data==1){
			  $('#saveZone').attr("disabled", false);
			  
			  $("#zoneAlert").modal('show');
			  }
			  else{
				  alert("Please Check Something is going wrong");
			  }
           }
         });
		return false;
        });
      });

</script>	

	</body>
</html>
