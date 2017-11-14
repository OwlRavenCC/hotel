<?php
	require_once 'class/user.php';

$user = new User('mysql:host=localhost;dbname=******','******','******');

if(isset($_POST['sub'])){

$user->registration($_POST['name'], $_POST['lastname'], $_POST['gender'], $_POST['dob'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['phone'], $_POST['email']);

}


 ?>

 <!doctype html>
 <html lang="en" class="no-js">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
 	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->

 	<title>Hotel Registration</title>
 </head>
 <body >

   <?php require_once("inc/navbar.php") ?>

  <div class="container" style="margin-top: 75px;">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <?php //submit to self ?>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input name="name" type="text" placeholder="Enter First Name Here.." required class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input name="lastname" type="text" placeholder="Enter Last Name Here.." required class="form-control">
							</div>

						</div>
            <div class="row">
              <div class="col-sm-6 form-group">
								<label>Gender</label>
								<select name="gender"  required class="form-control">
                  <option val="male">Male </option>
                  <option val="female">Female </option>
                  <option val="unknown">Prefer not to answer </option>
                </select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Date of birth</label>
								<input name="dob" type="date" placeholder="Enter First Name Here.." required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" placeholder="Enter Address Here.." rows="3" required class="form-control"></textarea>
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input name="city" type="text" placeholder="Enter City Name Here.." required class="form-control">
							</div>
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input name="state" type="text" placeholder="Enter State Name Here.." required class="form-control">
							</div>
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input name="zip" type="text" placeholder="Enter Zip Code Here.." required class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Phone Number</label>
								<input name="phone" type="text" placeholder="604-123-4567"  class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>eMail</label>
								<input name="email" type="email" placeholder="hello@example.com" class="form-control">
							</div>
						</div>

            <div class="row">
							<div class="col-sm-6 form-group">
								<label>Category</label>
								<select name="cat" required class="form-control">
                  <option value="interior">Interior </option>
                  <option value="balcony">Balcony </option>
                  <option value="suite">Suite </option>
                </select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Room Number</label>
								<input required type="number" placeholder="1234" class="form-control">
							</div>
						</div>

					<button name='sub' type="submit" class="btn btn-lg btn-info">Submit</button>

          <?php $user->printMsg(); ?>
					</div>
				</form>
				</div>
	</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
