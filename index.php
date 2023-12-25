<?php
require 'connection.php';
session_start();
if(isset($_POST['submit']))
{
  $appno  = $_POST['appno'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $puniv = $_POST['puniv'];
  $addr = $_POST['addr'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  
  $extra = mysqli_query($conn , "select * from student_details where appno = $appno");
  if(mysqli_num_rows($extra)>0)
  {
    echo "<script>alert('Student with this application already reistered! Login for further details')</script>";
  }
  else
  {
    $query = "insert into student_details values($appno , '$fname' , '$lname','$puniv' , '$addr' , '$email' , $phone)";
    mysqli_query($conn , $query);
    echo "<script>alert('Regestered Successfully!Now you can Login to complete registration')</script>";
  }
}



if(isset($_POST['login']))
{
  $appno  = $_POST['appno'];
  $res = mysqli_query($conn , "select * from student_details where appno = $appno");
  $row = mysqli_fetch_assoc($res);
  if(mysqli_num_rows($res) > 0)
  {
    if($appno == $row["appno"])
    {
      $_SESSION['appno'] = $row["appno"];
      $_SESSION["fname"] = $row["fname"];
      $_SESSION["lname"] = $row["lname"];
      $_SESSION['puniv'] = $row["puniv"];
      $_SESSION['addr'] = $row['addr'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['phone'] = $row['phone'];
      header("Location: ./loginpage.php");


    }
    

  }
  else
  {
    echo "<script>alert('User Not register')</script>";
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
        <h1 class="display-2">Welcome to exam cell</h1>

        <hr>

        <!-- Used Alert box to display examination details and helps used to register and login -->
        <div class="main-contect">
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">CET 2023</h4><br><br>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Click here to register</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Login</button>
              
              <p class="mb-0"></p>
            


            </div>
        </div>

        <!--Content for JEE Exam main-->
        <div class="main-contect">
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading">JOINT ENTRANCE EXAM(MAIN) 2023</h4><br><br>
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Click here to register </button>-->&nbsp;&nbsp;<span style="color:gray;">registration opens soon</span> 
              
              <p class="mb-0"></p>
            


            </div>
        </div>

        <!--Content for JEE Exam main-->
        <div class="main-contect">
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">JOINT ENTRANCE EXAM (ADVANCED) 2023</h4><br><br>
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Click here to register</button> -->
              &nbsp;&nbsp;<span style="color:gray;">registration opens soon</span> 

              
              <p class="mb-0"></p>
            


            </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAH-MCA CET Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" method="post">
        
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="appno" id="form6Example1" class="form-control" required/>
        <label class="form-label" for="form6Example1">Application number</label>
        <button  class="btn btn-primary btn-block mb-4" name="login">Login</button>
      </div>
</form>
      </div>
      <div class="modal-footer">
        
    
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAH-MCA CET Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" method="post">
        
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="appno" id="form6Example1" class="form-control" required/>
        <label class="form-label" for="form6Example1">Application number</label>
        
      </div>
</form>
      </div>
      <div class="modal-footer">
        
    
      </div>
    </div>
  </div>
</div>
















        <!--Modal for Registration of MAH-MCA CET-->
        <div class="modal" id="myModal">
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
        <input type="text" name="appno" id="form6Example1" placeholder='Enter your Application number' class="form-control" required/>
        <label class="form-label" for="form6Example1">Application number</label>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="fname" id="form6Example1" class="form-control" required/>
        <label class="form-label" for="form6Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="lname" id="form6Example2" class="form-control" required/>
        <label class="form-label" for="form6Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="puniv" id="form6Example3" class="form-control" required/>
    <label class="form-label" for="form6Example3">Previous university</label>
  </div>

  <!-- Text input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="addr" id="form6Example4" class="form-control" required/>
    <label class="form-label" for="form6Example4">Address</label>
  </div>

  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email" id="form6Example5" class="form-control" required/>
    <label class="form-label" for="form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="phone" id="form6Example6" class="form-control" required/>
    <label class="form-label" for="form6Example6">Phone</label>
  </div>

  <!-- Submit button -->
  <button  class="btn btn-primary btn-block mb-4" name="submit" value='register'>Register for CET</button>
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

</body>
</html>