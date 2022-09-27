<?php
    session_start();
    include_once "config.php";

    $f_name = mysqli_real_escape_string($con, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($con, $_POST['l_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($f_name) && !empty($l_name) && !empty($email) && !empty($password)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if email is valid

            // check if email already exists in the database
            $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");

            if(mysqli_num_rows($sql) > 0){ // if email already exists
                echo "$email aready exists!";
            }
            else{
                // check user uploaded the image
                if(isset($_FILES['profile_picture'])){ // if file is uploaded
                    $img_name = $_FILES['profile_picture']['name']; // get name of file user uploaded
                    $img_type = $_FILES['profile_picture']['type'];
                    $tmp_name = $_FILES['profile_picture']['tmp_name']; // this temporary name is used to save/move file in our folder

                    // get the extension of the file
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        
                        $types = ["image/jpeg", "image/jpg", "image/png"];

                        if(in_array($img_type, $types) === true){
                        
                            $time = time();
                            // Move user uploaded image to out folder
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ // if image is moved successfully
                                $status = "Active now";
                                $random_id = rand(time(), 10000000); 

                                // insert user's data into table
                                $sql2 = mysqli_query($con, "INSERT INTO users (unique_id, f_name, l_name, email, password, img, status) VALUES ({$random_id}, '{$f_name}', '{$l_name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                                if($sql2){ // if query is successful
                                    $sql3 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3) > 0){
                                        $row = mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file
                                        echo "success";
                                    }
                                    else{
                                        echo "Something went wrong!";
                                    }
                                }
                                else{
                                    echo "Something went wrong!";
                                }
                            }
                        }
                        else{
                            echo "Please select image ending with *.png, *.jpg, *.jpeg";
                        }
                    }
                    else{
                        echo "Please select image ending with *.png, *.jpg, *.jpeg";
                    }
                }
                else{
                    echo "Please upload image!";
                }
            }
        }
        else{
            echo "$email is not a valid email!";
        }
    }
    else{
        echo "All input fields are required!";
    }
?>