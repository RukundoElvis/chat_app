<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // Let us check if user email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //if email is valid
        // let us check that email already exists in database or not
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email='{$email}'");
        if (mysqli_num_rows($sql) > 0) { //if email already exists in database
            echo "$email already exists!";
        }
    }

    //Let us check if user upload or not
    if (isset($_FILES['image'])) { //if file is uploaded
        $img_name = $_FILES['image']['name']; //Getting user uploaded image.
        $tmp_name = $_FILES['image']['tmp_name']; //This is the temporary file name

        //Let us explode image and get the file extension
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode); //Get the file extension

        $extensions = ["jpeg", "jpg", "png"]; // These are the only valid extensions
        if (in_array($img_ext, $extensions) === true) { //If the user uploaded extension is listed in the array above.
            $time = time(); //Get current timestamp
            $new_img_name = $time . $img_name; //This ensures that if a user uploads more than one image at the same time, the images are saved using different timestamp even if they have the same name.

            if (move_uploaded_file($tmp_name, "tmp user img/$new_img_name")) { //If the user's uploaded image moves to the folder successfully
                $status = "Active Now"; //When a user signs up, their status changes to active now.
                $random_id = rand(time(), 10000000); //Here, we are creating a random id for the user.

                //Let us insert all user data inside the table
                $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                if ($sql2) { //If all these data values are inserted correctly
                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if (mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "Success";
                    }
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else {
                echo "Please select an image with a valid extension (jpeg, jpg, png)";
            }
        } else {
            echo "Please upload your profile picture";
        }
    } else {
        echo "Invalid email format!";
    }
} else {
    echo "All fields are required!";
}
?>