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

    <!-- CUSTOM CSS 2 -->
    <link rel="stylesheet" href="css/custom_recipe.css">

    <!-- CSS for rating -->
    <link rel="stylesheet" href="css/rating.css">
        
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
        <h1></h1>
      </div>
    </div>

    <?php
      include 'config.php';

      $idrecipe = $_GET['id'];

      $sql = "SELECT * FROM recipes, users WHERE recipe_ID = $idrecipe AND recipes.user_ID = users.user_ID";
      $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='left'><br/>";
                echo "  <div class='container'>";
                echo "    <img class='image' src='users_img/",$row['picture'],"'<br>";
                echo "  </div>";
                echo "  <div class='date'>";
                echo "    Data dodania: ".substr($row['creation_date'], 0, -7)."<br>";
                echo "    Dodano przez: ",$row['username'],"<br><br>";
                echo "  </div>";
                echo "</div>";
                echo "<div class='right'>";
                echo "  <br><div class='tytul'>",$row['title'],"<hr></div><br>";
                echo "  Składniki: <ul><li>".str_replace(",", "</li><li>", $row['ingredients'])."</li></ul><hr>";
                echo "  <div class='opis'> Opis przygotowania: <br><br>".nl2br(str_replace(".", "<br>", $row['description']),$row['description'])."<hr></div><br>";
                echo "</div>";
              }
            }
      ?>

      <?php
        include_once 'config.php'; 
        
        $recipeID = $_GET['id']; 
        
        // Fetch the recipe and rating info from database 
        $query = "SELECT p.*, COUNT(r.rate) as rating_num, FORMAT((SUM(r.rate) / COUNT(r.rate)), 1) as average_rating 
                    FROM recipes as p LEFT JOIN rates as r ON r.recipe_ID = p.recipe_ID 
                      WHERE p.recipe_ID = '$recipeID' GROUP BY (r.recipe_ID)";

        $result = $conn->query($query); 
        $postData = $result->fetch_assoc(); 
      ?>

      <div class="rating">

        <div class="rate">
            <input type="radio" id="star5" name="rating" value="5" <?php echo ($postData['average_rating'] >= 5)?'checked="checked"':''; ?>>
            <label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4" <?php echo ($postData['average_rating'] >= 4)?'checked="checked"':''; ?>>
            <label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3" <?php echo ($postData['average_rating'] >= 3)?'checked="checked"':''; ?>>
            <label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2" <?php echo ($postData['average_rating'] >= 2)?'checked="checked"':''; ?>>
            <label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1" <?php echo ($postData['average_rating'] >= 1)?'checked="checked"':''; ?>>
            <label for="star1"></label>
        </div>

        <div class="overall-rating">
            (Średnia Ocena <span id="avgrat"><?php echo $postData['average_rating']; ?></span>
            z <span id="totalrat"><?php echo $postData['rating_num']; ?></span> ocen)</span>
        </div>

        <div class="alert alert-danger col-md-3" id="errorUserRate" style="display:none;"></div>
        <div class="alert alert-success col-md-3" id="SuccessUserRate" style="display:none;"></div>
        
      </div>

      <footer class="bg-dark text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-3">
          © 2021 Copyright: Janik Piotr, Midura Patryk, Ziółkowski Maciej
        </div>
      </footer>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="http://demos.codexworld.com/includes/js/bootstrap.js"></script>

    <!-- Custom jQuery -->
    <script src="js/customJQuery.js"></script>
    <script src="js/jQueryForUsers.js"></script>

    <script>
      $('.rate input').click(function() {
        var recipeID = <?php echo $postData['recipe_ID']; ?>;
        var ratingNum = $(this).val();
        var dataString = 'recipeID=' + recipeID + '&ratingNum=' + ratingNum;
    
        $.ajax({
          url: 'rating.php',
          method: 'POST',
          data: dataString,
          dataType: 'json',
          success : function(resp) {
            if(resp.status == 1) {
              $('#avgrat').text(resp.data.average_rating);
              $('#totalrat').text(resp.data.rating_num);
              $("#SuccessUserRate").fadeIn();
              $("#SuccessUserRate").text('Dziękujemy! Wystawiłeś ocenę ' + ratingNum + ' dla przepisu "<?php echo $postData['title']; ?>"');
              $("#SuccessUserRate").delay(4000).fadeOut();
            }
            else if(resp.status == 2) {
              $("#errorUserRate").fadeIn();
              $("#errorUserRate").text('Już wystawiłeś ocenę dla przepisu "<?php echo $postData['title']; ?>"');
              $("#errorUserRate").delay(4000).fadeOut();
            }
            
            $(".rate input").each(function() {
              if($(this).val() <= parseInt(resp.data.average_rating)) {
                $(this).attr('checked', 'checked');
              }
              else {
                $(this).prop("checked", false);
              }
            });
          }
        });
      });
    </script>
  </body>
</html>
