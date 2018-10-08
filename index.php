<?php include('server.php'); 
//ambil data yang diedit

  if (isset($_GET['edit'])){
  	$id = $_GET['edit'];
    $statusedit = true;
    $rec = mysqli_query($db,"SELECT * FROM info WHERE id=$id");
  	$record = mysqli_fetch_array($rec);
  	
  	$name = $record['name'];
  	$address = $record['address'];
    $telephone = $record['telephone'];
    $id= $record['id'];
  }?>



 

<!DOCTYPE html>
<html>
<head>
	<title>Membuat , mengupdate, mendelete database php & mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="notif">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	<table>
	<thread>
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Kontak</th>
			<th colspan="2">Aksi</th>
		</tr>
	</thread>
<tbody>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['address']; ?></td>
	<td><?php echo $row['telephone']; ?></td>
	<td>
	    <a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>"  >Edit</a>
	</td>
	<td>
		<a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>" >Hapus</a>
	</td>
</tr>
	<?php }?>

</tbody>	
</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Nama</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Alamat</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Kontak</label>
			<input type="text" name="telephone" value="<?php echo $telephone; ?>">
		</div>
		<div class="input-group">
			<?php if ($statusedit == false): ?>
	<button class="btn" type="submit" name="save"  >Save</button>
<?php else: ?>
	<button class="btn" type="submit" name="update" >Update</button>
<?php endif ?>
			</div>
	</form>
		</body>
</html>