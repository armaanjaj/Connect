<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php 
                    $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
                    $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['f_name']." ".$row['l_name'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
            </header>
            <div class="chat-box">
                <!-- Message here -->
            </div>
            <form action="" method="POST" class="typing-area" autocomplete="off">
                <input type="hidden" class="incoming_id"  name="incoming_id" value="<?php echo $user_id; ?>">
                <input type="text" name="message" class="input-field" placeholder="Message...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="JavaScript/chat.js"></script>
</body>
</html>