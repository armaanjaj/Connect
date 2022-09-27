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
        <section class="form login">
            <header>Connect</header>
            <form action="#">
                <div class="error-txt">This is an error message!</div>
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
            <div class="link">Not yet signed up? <a href="#">Signup now</a></div>
        </section>
    </div>

    <script src="../JavaScript/pass-show-hide.js"></script>
</body>
</html>