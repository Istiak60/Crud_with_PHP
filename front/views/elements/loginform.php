<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");



        
?>
<section>
   <div class="container">
	   <div class="row">
		   <div class="col-md-6">
			   <h4>ACCOUNT LOGIN</h4>
			   <h6>NEW CUSTOMER</h6>
			   <p>Register Account</p>

			   <p>By creating an account you will be able to shop faster, be up to date on an order's status, and
				   keep
				   track of the orders you have previously made.</p>
			   <button type="submit" class="btn btn-danger">CONTINUE</button>
		   </div>
		   <div class="col-md-6">
			   <div class="head mt-5">
				   <h5>RETURNIG CUSTOMER</h5>
				   <p>I am a returning customer</p>
			   </div>
			   <form method="post"  action="../../admin/Users/loginprocessor.php">
				  
			   <div class="mb-3 mt-3">
				   <label for="exampleFormControlInput1" class="form-label">Email Address</label>
				   <input type="email" class="form-control" id="email" name="email">
			   </div>
			   <div class="mb-3 mt-3">
				   <label for="exampleFormControlInput1" class="form-label">Password</label>
				   <input type="password" class="form-control" id="password" name="password">
			   </div>
			   <button type="submit" class="btn btn-success">LOGIN</button>
			   </form>
		   </div>
	   </div>
   </div>
</section>