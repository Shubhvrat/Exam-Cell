<?php
 
session_start();

require 'connection.php';
if (!isset($_SESSION['appno'])) {

  header("Location: ./index.php");
  exit;
}
if (!isset($_SESSION['fname'])) {

  header("Location: ./index.php");
  exit;
}
if (!isset($_SESSION['lname'])) {

  header("Location: ./index.php");
  exit;
}
if (!isset($_SESSION['puniv'])) {

  header("Location: ./index.php");
  exit;
}
if (!isset($_SESSION['addr'])) {

  header("Location: ./index.php");
  exit;
}
if (!isset($_SESSION['email'])) {

  header("Location: ./index.php");
  exit;
}
if (!isset($_SESSION['phone'])) {

  header("Location: ./index.php");
  exit;
}

$appno = $_SESSION["appno"];
$fname1 = $_SESSION["fname"];
$lname1 = $_SESSION["lname"];
$puniv1 = $_SESSION["puniv"];
$addr1 = $_SESSION["addr"];
$email1 = $_SESSION["email"];
$phone1 = $_SESSION["phone"];

if(isset($_POST['delete']))
{
  $appno  = $_POST['appno'];
  $query = mysqli_query($conn , "delete from student_details where appno = $appno");
  if($query)
  {
    echo "<script>alert('Success')</script>";
    header('Location: index.php');
  }
  else
  {
    echo "Error";
  }
}

if(isset($_POST['search']))
{
  $appno = $_POST['appno'];
  $fname = $_POST['fname'];
  $text = " Application number ". $appno . "," . " Name " . $fname .",". " Previous University " . $puniv1;
  $fp = fopen('data.txt' , 'a+');
  
    if(fwrite($fp , $text))
    {
      echo "<script>alert('Application Submitted!!');</script>";
    }
fclose($fp);
}



if(isset($_POST['update']))
{
  $appno  = $_POST['appno'];
  $fname1 = $_POST['fname'];
  $lname1 = $_POST['lname'];
  $puniv1 = $_POST['puniv'];
  $addr1 = $_POST['addr'];
  $email1 = $_POST['email'];
  $phone1 = $_POST['phone'];
  $query = mysqli_query($conn , "update student_details set fname = '$fname1' , lname='$lname1' , puniv = '$puniv1', addr='$addr1' , email='$email1' , phone='$phone1' where appno = $appno");
  if($query)
  {
    echo "<script>alert('Success');</script>";
  }
  else
  {
    echo "Error";
  }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container p-5">
  <h1 class="display-2">Welcome <?php echo $fname1;?> &nbsp; &nbsp; &nbsp; &nbsp;<a href="./index.php"><svg style='color:blue;' class='padding-xs' xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
</svg></a></h1>
<hr>
<div class="card">
  <div class="card-body d-flex">
   <div class="mr-auto p-2">Registration </div>
    <div class="p-2"><button class='btn btn-success'>Completed</button></div>
  </div>
</div>

<div class="card">
  <div class="card-body d-flex">
   <div class="mr-auto p-2">Application Form</div>
    <div class="p-2"><button type='button' data-toggle="modal" data-target="#example" class='btn btn-danger'>Fill the application</button></div>

  </div>
</div>
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAH-MCA CET Application Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="./customException.php" method="post" enctype='multipart/form-data'>
        
      <div data-mdb-input-init class="form-outline">
        
          <label class="form-label" for="customFile" >10th Marksheet</label>
          <input type="file" class="form-control" id="customFile" name='filetu' id='filetu' required/><br><br><br>

          
          <label class="form-label" for="customFile">12 marksheet</label>
          <input type="file" class="form-control" id="customFile" name = 'filetu1' id='filetu1' required/><br><br>

          <button  class="btn btn-primary btn-block mb-4" name="sent">Login</button>

      </div>
</form>
      </div>

      <div class="modal-footer">
        
    
      </div>
    </div>
  </div>
</div>
<br><br>
<button type="button"  class="btn btn-primary mb-4" name="login" data-toggle="modal" data-target="#exampleUpdate">Update Application form</button>
<button type="button"  class="btn btn-danger mb-4" name="login" data-toggle="modal" data-target="#exampleUpdate1">Delete Application Form</button>

<div class="modal" id="exampleUpdate">
              <div class="modal-dialog modal-lg">
              <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">MAH-MCA-CET Registration</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-5">
  <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="appno" id="form6Example1" placeholder='Enter your Application number' class="form-control" value='<?php echo $appno;?>'  readonly/>
        <label class="form-label" for="form6Example1">Application number</label>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="fname" id="form6Example1" class="form-control" value='<?php echo $fname1;?>' required/>
        <label class="form-label" for="form6Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="lname" id="form6Example2" class="form-control" value='<?php echo $lname1; ?>' required/>
        <label class="form-label" for="form6Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="puniv" id="form6Example3" class="form-control" value='<?php echo $puniv1; ?>' required/>
    <label class="form-label" for="form6Example3">Previous university</label>
  </div>

  <!-- Text input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="addr" id="form6Example4" class="form-control" value='<?php echo $addr1; ?>' required/>
    <label class="form-label" for="form6Example4">Address</label>
  </div>

  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email" id="form6Example5" class="form-control" value='<?php echo $email1; ?>' required/>
    <label class="form-label" for="form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="phone" id="form6Example6" class="form-control" value='<?php echo $phone1; ?>' required/>
    <label class="form-label" for="form6Example6">Phone</label>
  </div>
   <label class="form-label" for="customFile" >10th Marksheet</label>
          <input type="file" class="form-control" id="customFile" name='filetu' id='filetu' required/><br><br><br>

          
          <label class="form-label" for="customFile">12 marksheet</label>
          <input type="file" class="form-control" id="customFile" name = 'filetu1' id='filetu1' required/><br><br>



  <!-- Submit button -->
  <button  class="btn btn-primary btn-block mb-4" name="search" value='search'>Submit Application Form</button>
  <button  class="btn btn-secondary btn-block mb-4" name="update" value='update'>Update Form</button>
</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleUpdate1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAH-MCA CET Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" METHOD="POST">
        
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="appno" id="form6Example1" class="form-control" required/>
        <label class="form-label" for="form6Example1">Application number</label>
        <button  class="btn btn-primary btn-block mb-4" name="delete">Delete</button>
      </div>
</form>
      </div>
      <div class="modal-footer">
        
    
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="appicationForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAH-MCA CET Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" METHOD="GET">
        <textarea class="form-control" id="textAreaExample1" rows="4"></textarea>  
        
</form>
      </div>
      <div class="modal-footer">
        
    
      </div>
    </div>
  </div>
</div>

</body>
</html>

