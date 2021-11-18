<?php 
  session_start();

    if(!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
  <head>
    <title>Title</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom_login.css">

    <!-- Custom CSS 2 -->
    <link rel="stylesheet" href="css/custom_recipes.css">

    <!-- GOOGLE FONT-->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    </style>
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

    <div class="header2">
      <div class="flex-overlay3">
        <h1>ŚNIADANIA</h1>
      </div>
    </div>

    <div class="recipes">

      <ul id='mgal_show' class='mgal'>

        <?php
          include 'config.php';

          $sql = "SELECT * FROM recipes WHERE category_ID = '1'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<li>";
              echo "<div class='container'>";
              echo "<a href='recipe.php?id=",$row['recipe_ID'],"' style='text-decoration: none'>";
              echo "<img class='image' src='users_img/",$row['picture'],"'></a>";
              echo "</div>";
              echo "<span class='title'>";
              echo $row['title'];
              echo "</span>";
              echo "</li>";
            }
          }
        ?>

      </ul>       
          
    </div>
    
    <footer class="bg-dark text-center text-white">
      <!-- Copyright -->
      <div class="text-center p-3">
        © 2021 Copyright: Janik Piotr, Midura Patryk, Ziółkowski Maciej
      </div>
    </footer>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom jQuery -->
    <script src="js/customJQuery.js"></script>
  </body>
</html>
