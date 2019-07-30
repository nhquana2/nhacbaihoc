<?php
    session_start();
    echo isset($_SESSION['login']);
    if(isset($_SESSION['login'])) {
      header('LOCATION:quanly.php'); die();
    }
?>
<!DOCTYPE html>
<html>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login - Nhắc bài học A11</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   </head>
<body>
  <div class="container">
    <h3 class="text-center mt-3">Login - Nhắc bài học A11</h3>
    <?php
      if(isset($_POST['submit'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'demo'){
          $_SESSION['login'] = true; header('LOCATION:quanly.php'); die();
        } {
          echo "<div class='alert alert-danger'>Sai tên đăng nhập hoặc mật khẩu!</div>";
        }

      }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="pwd">Mật khẩu:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
      </div>
      <div class="col-md-12 text-center"> 
      <button type="submit" name="submit" class="btn btn-primary ">Đăng nhập</button>
      </div>
    </form>
    <br>
     <div class="alert alert-warning text-center">
    <strong>Lưu ý!</strong> Trang này chỉ dành cho người quản trị. <br> Trở lại nhấn <a href="index.php" class="alert-link">vào đây</a>
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