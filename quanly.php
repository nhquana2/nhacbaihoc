<?php 

    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }

	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "ztracngh_todo", "123Zxcvbnm", "ztracngh_todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {

		if (empty($_POST['task'])) {
			$errors = "Vùng này không được để trống!";
		}else{
			$task = $_POST['task'];
			$query = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $query);
			header('location: quanly.php');
		}
	}	

	// delete task
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM tasks WHERE task='$id'");
		header('location: quanly.php');
	}

	// select all tasks if page is visited or refreshed
	$tasks = mysqli_query($db, "SELECT * FROM tasks");

?>
<!DOCTYPE html>
<html>

<head>
	<title>Management - Nhắc bài học A11</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
		<h2 class="text-center mt-3">Management - Nhắc bài học A11</h2>
	

<div class="container">
	<form method="post" action="quanly.php">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<div class="form-group">
		<input type="text" name="task" class="form-control" placeholder="Nhập lời nhắc tại đây...">
		</div>
		<div class="col text-center">
		<button type="submit" name="submit" id="add_btn" class="btn btn-primary mb-2">Thêm lời nhắc</button>
		</div>
	</form>
	    </div>



<br>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>STT</th>
				<th>Lời nhắc</th>
				<th style="width: 50px;">Xoá</th>
			</tr>
		</thead>

		<tbody>
			<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="delete"> 
						<a href='quanly.php?del_task=<?php echo $row['task'] ?>'><button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times; &nbsp;</span>
</button></a> 
					</td>
				</tr>
			<?php $i++; } ?>	
		</tbody>
	</table>
	<div class="col text-center">
		<a href="logout.php" class="btn btn-info" role="button">Đăng xuất</a>
		</div>
  </div>
  <footer class="footer">
      <div class="container">
        <span class="text-muted" style="font-size:12px">© Nhắc bài học - Homework Reminder (Z-SMS). Powered by Hoang Quan</span> <br>
        <span class="text-muted" style="font-size:12px">Want to use this code for own purposes? Contact Facebook: /hoangquan857</span>
      </div>
    </footer>
</body>
</html>