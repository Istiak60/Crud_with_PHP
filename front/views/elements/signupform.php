<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");






?>
<section>
		<div class="container row" >
			<div class="col-md-10">
				<div class="head .pl-1"style="border-bottom: 1px black solid;">
					<h3>REGISTER ACCOUNT</h3>
					<p>if you already have an account with us please login at the login page</p>
					<h3>YOUR PERSONAL DETAILS</h3>
				</div>

         <form method="post"  action="../../admin/Users/store.php">

		 <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">


                            </label>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="inputId" name="id" value="">
                            </div>
                        </div>
				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">Full Name</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="text" class="form-control" id="full_Name" name="full_name" placeholder="Full Name">
				  	</div>
				</div>

				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">User Name</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="text" class="form-control" id="user_Name" name="user_name" placeholder="Last Name">
				  	</div>
				</div>

				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">Email</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
				  	</div>
				</div>

				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">Password</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="password" class="form-control" id="password" name="password" placeholder="password">
				  	</div>
				</div>
				
				<div class="mb-3 mt-3 row">
					<div class="col-md-2">
  						<label for="exampleFormControlInput1" class="form-label">Picture</label>
				  	</div>
				  	<div class="col md-10">
  						<input type="file" class="form-control" id="inputFile" name="picture" placeholder="picture">
						
				  	</div>
				</div>








                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="password" class="form-label">Phone Number</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="phone_Number" name="phone_number">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Register</button>

			</div>
           </form>
			<div class="col-md-2">


			</div>


		</div>
	</section>