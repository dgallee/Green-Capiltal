<?php
if(isset($_POST['submit'])) {
  $target_dir = "images/"; // set the directory where you want to store the uploaded images
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

}
  ?>