<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Connect</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email address</label>
                    <input type="email" name="email" placeholder="Email Address">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="JavaScript/pass-show-hide.js"></script>
    <script src="JavaScript/login.js"></script>
</body>
</html>