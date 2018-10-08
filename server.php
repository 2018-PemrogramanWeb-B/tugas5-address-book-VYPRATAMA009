<?php
  session_start();
//menginialisasi
    $name = "";
	$address = "";
	$telephone ="";
	$id = 0;
	$statusedit = false;
// mengkoneksi ke datavase
$db = mysqli_connect('localhost', 'root', '', 'yes');
// jika tombo; save diklik
if (isset($_POST['save'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone'];


	$query = "INSERT INTO info(name, address, telephone) VALUES ('$name','$address','$telephone')";
	$_SESSION['message']="data tersimpan";
	mysqli_query($db, $query);

	header('location: index.php');//kembali ke laman index
}
  if (isset($_POST['update'])) { 
  	$id = mysqli_real_escape_string($db,$_POST['id']);
	$name = mysqli_real_escape_string($db,$_POST['name']);
	$address = mysqli_real_escape_string($db, $_POST['address']);
	$telephone = mysqli_real_escape_string($db,$_POST['telephone']);
    mysqli_query($db, "UPDATE info SET name ='$name', address = '$address', telephone ='$telephone' WHERE id=$id");
    $_SESSION['message']="data diupdate";
    header('location: index.php');//kembali ke laman inde*/

}  

  if (isset($_GET['del'])){
  	$id = $_GET['del'];
  	mysqli_query($db,"DELETE FROM info WHERE id=$id");
  	$_SESSION['message']="data dihapus";
   header('location: index.php');//kembali ke laman inde
  }


//menampilkan update record pada laman
  $results =mysqli_query($db, "SELECT * FROM info"); 


?>