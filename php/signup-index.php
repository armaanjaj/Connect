<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=l.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Connect</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Connect</header>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="f_name" placeholder="First name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="l_name" placeholder="Last name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email address</label>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Profile picture</label>
                    <input type="file" name="profile_picture" accept="image/png, image/jpeg, image/jpg" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue">
                </div>
            </form>
            <div class="link">Already signed up? <a href="#">Login now</a></div>
        </section>
    </div>

    <script src="../JavaScript/pass-show-hide.js"></script>
    <script src="../JavaScript/signup.js"></script>
</body>
</html>