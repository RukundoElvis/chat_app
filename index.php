<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chat App by Rukundo</title>
  <link rel="shortcut icon" href="assets/img/chat.jpg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Chat App by Rukundo</header>
      <form action="sign-up.php" enctype="multipart/form-data">
        <div class="error-txt">This is an error message!</div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="Enter first name" required />
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Enter last name" required />
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email address" required />
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Create a password" required />
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" required />
        </div>
        <div class="field button">
          <input type="submit" value="Continue to Chat" />
        </div>
      </form>
      <div class="link">
        Already have an account? <a href="#">Login Now</a>
      </div>
    </section>
  </div>

  <script src="assets/js/pass-show-hide.js"></script>
  <script src="assets/js/sign-up.js"></script>

</body>

</html>