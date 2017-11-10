<?php
	require_once 'class/user.php';

$user = new User('mysql:host=localhost;dbname=test','root','');



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

  <div style="margin-top: 75px;" class="container">
  <h2>Hotel Customers</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>

<?php $customers = $user->UserData(); ?>
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
