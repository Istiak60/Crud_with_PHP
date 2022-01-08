<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\User;
// $_id =$_GET['id'];
$_user= new User();
// $_user->login($_id);




// if($_SERVER['REQUEST_METHOD']== "POST")
// {
//   //somthing was posted
//   $email = $_POST['email'];
//   $password = $_POST['password'];
//     if(!empty($email)&&!empty($password)  &&  !is_numeric($email))
//     {
		
// 	}


        
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
			   <form method="post"  action="../../admin/Users/login.php">			   <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">


                            </label>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="inputId" name="id" value="">
                            </div>
                        </div>
			   <div class="mb-3 mt-3">
				   <label for="exampleFormControlInput1" class="form-label">Email Address</label>
				   <input type="text" class="form-control" id="email" name="email">
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