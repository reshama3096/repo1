<?php include('header.php');
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Add New Employee</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Agroshopee</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Employee Registration</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
	      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form id="newemployee" method="POST">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-users"></i>
                  Employee Details
                </h4>
                <div class="form-group row">
                  <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="firstname" name="firstname">
                  </div>
                  <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="lastname" name="lastname">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="father" class="col-sm-2 col-form-label">Fathers Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="father" name="father">
                  </div>
                  <label for="bloodgroup" class="col-sm-2 col-form-label">Blood Group</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="bloodgroup" name="bloodgroup">
                  </div>
                </div>
				<div class="form-group row">
                  <label for="input-12" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-4">
					<div class="form-check icheck-info form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
					  <label class="form-check-label" for="male">Male</label>
					</div>
					<div class="form-check icheck-info form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
					  <label class="form-check-label" for="female">Female</label>
					</div>                  
				 </div>
                  <label for="input-12" class="col-sm-2 col-form-label">Marital Status</label>
                  <div class="col-sm-4">
					<div class="form-check icheck-info form-check-inline">
					  <input class="form-check-input" type="radio" name="maritalstatus" id="married" value="Married">
					  <label class="form-check-label" for="married">Married</label>
					</div>
					<div class="form-check icheck-info form-check-inline">
					  <input class="form-check-input" type="radio" name="maritalstatus" id="unmarried" value="Unmarried">
					  <label class="form-check-label" for="unmarried">Unmarried</label>
					</div>                  
				 </div>
                </div>
				<div class="form-group row">
				<label for="role" class="col-sm-2 col-form-label">Date Of Birth</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="default-datepicker" name="dob">
                  </div>
                  <label for="mobileno" class="col-sm-2 col-form-label">Mobile No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="mobile" name="mobile">
					<span id="errmsg"></span>
                  </div>
                </div>
				<div class="form-group row">
                 <label for="email" class="col-sm-2 col-form-label">Email Id</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                  <div class="col-sm-4">
                    <select class="form-control" id="designation" name="designation" required>
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
                </div>
                <h4 class="form-header text-uppercase">
                <i class="fa fa-address-card"></i>
                  Address Information
                </h4>

                <div class="form-group row">
                  <label for="state" class="col-sm-2 col-form-label">State</label>
                  <div class="col-sm-4">
					 <select class="form-control" id="state" name="state" required>
                        <option selected disabled>Select State</option>
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
                  <label for="district" class="col-sm-2 col-form-label">District</label>
                  <div class="col-sm-4">
                  <select class="form-control" id="district" name="district" required>
                        <option selected disabled>Select District</option>
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
                  <label for="taluka" class="col-sm-2 col-form-label">Taluka</label>
                  <div class="col-sm-4">
                   <select class="form-control" id="taluka" name="taluka" required>
                         <option selected disabled>Select Taluka</option>
                        <option value="Raver">Raver</option>
                        <option value="Jalgaon">Jalgaon</option>
                        <option value="Bhusawal">Bhusawal</option>
                        <option value="Jamner">Jamner</option>
						<option value="Yawal">Yawal</option>
                        <option value="Muktainagar">Muktainagar</option>
                        <option value="Bodwad">Bodwad</option>
                        <option value="Bhadgaon">Bhadgaon</option>
						 <option value="Pachora">Pachora</option>
                        <option value="Chopda">Chopda</option>
                        <option value="Chalisgaon">Chalisgaon</option>
                        <option value="Dharangaon">Dharangaon</option>

                    </select>
                  </div>
                  <label for="input-15" class="col-sm-2 col-form-label">Town/Village</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="village" name="village">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-17" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="address" name="address"></textarea>
                  </div>
                </div>
				
			<h4 class="form-header text-uppercase">
                <i class="fa fa-graduation-cap"></i>
				Educational Qualification
                </h4>

                <div class="form-group row">
                  <label for="post" class="col-sm-2 col-form-label">Highest Qualification</label>
                  <div class="col-sm-4">
                   <select class="form-control" id="post" name="post" required>
                        <option selected disabled>Select Qualification</option>
						<option>10th</option>
                        <option>12th</option>
                        <option>Graduate</option>
                        <option>Post-graduate</option>
                        <option>Diploma</option>
						<option>ITI</option>
						<option>Other</option>
                    </select>
                  </div>
                  <label for="stream" class="col-sm-2 col-form-label">Stream</label>
                  <div class="col-sm-4">
                  <select class="form-control" id="stream" name="stream" required>
                        <option selected disabled>Select Stream</option>
						<option value="BSC">BSC</option>
                        <option value="BA">BA</option>
                        <option value="BCOM">BCOM</option>
                        <option value="BE/B.Tech">BE/B.Tech</option>
                        <option value="B.Pharm">B.Pharm</option>
						<option value="MSc">MSc</option>
                        <option value="MA">MA</option>
                        <option value="MCom">MCom</option>
                        <option value="ME/M.Tech">ME/M.Tech</option>
                        <option value="MBA">MBA</option>
						<option value="BBA">BBA</option>
                        <option value="BCA">BCA</option>
                        <option value="MCA">MCA</option>
                    </select>
                  </div>
                </div>
				<div class="form-group row">
                  <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="subject" name="subject">
                  </div>
                  <label for="marks" class="col-sm-2 col-form-label">Marks</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="marks" name="marks">
                  </div>
                </div>
				
				<h4 class="form-header text-uppercase">
                <i class="fa fa-credit-card"></i>
                 Salary Details
                </h4>
				<div class="form-group row">
                  <label for="joiningdate" class="col-sm-2 col-form-label">Joining Date</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="inline-datepicker" name="joiningdate">
                  </div>
                  <label for="package" class="col-sm-2 col-form-label">Package Offer</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="package" name="package">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="basic" class="col-sm-2 col-form-label">Basic</label>
                  <div class="col-sm-4">
					<input type="number" class="form-control" id="basic" name="basic">
                  </div>
                  <label for="pf" class="col-sm-2 col-form-label">PF</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="pf" name="pf">
                  </div>
                </div>
				<div class="form-group row">
                  <label for="otherexp" class="col-sm-2 col-form-label">Other Expenses</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="otherexp" name="otherexp">
                  </div>
                  <label for="totalgross" class="col-sm-2 col-form-label">Total Gross</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="totalgross" name="totalgross">
                  </div>
                </div>
				
				<h4 class="form-header text-uppercase">
                <i class="fa fa-university"></i>
                 Bank Details
                </h4>

                <div class="form-group row">
                  <label for="bankname" class="col-sm-2 col-form-label">Bank Name</label>
                  <div class="col-sm-4">
					<input type="text" class="form-control" id="bankname" name="bankname">
                  </div>
                  <label for="accountno" class="col-sm-2 col-form-label">Account No</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="accountno" name="accountno">
                  <span id="accountErr"></span>
				  </div>
                </div>
				<div class="form-group row">
                  <label for="branchname" class="col-sm-2 col-form-label">Branch Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="branchname" name="branchname">
                  </div>
                  <label for="ifsccode" class="col-sm-2 col-form-label">IFSC Code</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="ifsccode" name="ifsccode">
                  </div>
                </div>
                <div class="form-footer">
                    <button type="button" name="cancel" class="btn btn-dander pull-right"> <i class="fa fa-times"></i>CANCEL</button>
                    <button type="submit" name="saveEmp" id="saveEmp" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> SAVE</button>

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
  <div class="modal fade" id="formsubmit">
                  <div class="modal-dialog">
                    <div class="modal-content animated flipInX">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-user-o"></i>Employee Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  
                       <p>Employee Registration Done Successfully !!!<br>Please Note Employee Id No :<span id="employee_id" style="color: #00c2ff;font-size: 20px;font-weight: bold;font-family: cursive;"></span></p>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
<script>
$(document).ready(function(){
        $('#newemployee').on('submit', function (e) {
           $('#saveEmp').attr("disabled", true);
          e.preventDefault();
		
          $.ajax({
            type: 'post',
            url: './database/new-employee-save.php',
            data: $('#newemployee').serialize(),
            success: function (data) {
			  if(data!=""){
				$('#saveEmp').attr("disabled", false);
			  $('#employee_id').html(data);			  
			  $("#formsubmit").modal('show');
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
	<script type='text/javascript'>//<![CDATA[,
		$(document).ready(function () {
		  //called when key is pressed in textbox
		  $("#mobile,#accountno").keypress(function (e) {
			 //if the letter is not digit then display error and don't type anything
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				$("#errmsg").html("Enter Valid Digits Only").show().fadeOut(5000);
				$('#errmsg').css('color', 'red');
				return false;
			}
		   });
		});
</script>
	</body>
</html>
