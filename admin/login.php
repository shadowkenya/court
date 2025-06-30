
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Admin Login</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
         .home-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: #333;
            text-decoration: none;
         }
         .home-icon:hover {
            color: #007bff;
         }
      </style>
   </head>
   <body>
      <!-- Home icon link -->
      <a href="../home.php" class="home-icon" title="Return to Home">
         <i class="fas fa-home"></i>
      </a>

      <div class="content">
         <div class="text">
            Admin Login 
         </div>
     <form action="dashboard.php" method="POST">
            <div class="field">
               <input type="text" required>
               <span class="fas fa-user"></span>
               <label>Email or Phone</label>
            </div>
            <div class="field">
               <input type="password" required>
               <span class="fas fa-lock"></span>
               <label>Password</label>
            </div>
            <div class="forgot-pass">
               <a href="forgot-password.php">Forgot Password?</a>
            </div>
            <button>Login</button>
         </form>
      </div>
   </body>
</html> 