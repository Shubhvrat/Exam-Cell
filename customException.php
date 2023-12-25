<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $file_size10 = $_FILES['filetu']['size'];
  $file_size12 = $_FILES['filetu1']['size'];
}


class CustomException extends Exception
{
  public function errmsg()
  {
    $alert = $this->getMessage();
    echo "<script>alert('$alert');</script>";
    
  }
}
try{
    $fileLimit = 1;


  if($fileLimit < ($file_size10 /1024)/1024 || $fileLimit < ($file_size12/1024)/1024)

  {
    throw new CustomException("File Size exceeded");

  }
 
}
catch(CustomException $e)
{
    $e->errmsg();
}
?>