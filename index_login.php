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

    <!-- GOOGLE FONT-->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    </style>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

    <div class="header">

      <!-- Sweet Alert JS -->
      <script src="js/sweetalert.min.js"></script>

      <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
          ?>

          <script>
            swal({
              title: "<?php echo $_SESSION['status']; ?>",
              icon: "<?php echo $_SESSION['status_code']; ?>",
              button: "OK",
            });
          </script>

          <?php
          unset($_SESSION['status']);
        }
      ?>

      <nav class="navbar navbar-expand-sm navbar-dark bg-light">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <form class="form-inline my-2 my-lg-0 ml-auto">
            <button data-toggle="modal" data-target="#userPanel" class="btn btn-dark" type="button" onclick="location.href = 'logout.php';">Wyloguj się</button>
          </form>
        </div>
      </nav>

      <div class="flex-overlay">
        <div class="d-flex flex-column text-center">
          <div class="d-grid gap-2 d-md-block">

            <div class="alert alert-danger" id="errorAddRecipe" style="display:none;"></div>
            <div class="alert alert-success" id="SuccessAddRecipe" style="display:none;"></div>

            <button id="recipeAdd" type="button" style="display: none;" class="btn btn-dark">Dodaj przepis</button>
            <button id="recipes" type="button" class="btn btn-dark">Sprawdź swoje przepisy</button>

            <form action="" method="POST" id="addRecipeUserForm" enctype="multipart/form-data">
              
              <br>
              <select class="form-control" name="categoryID" id="categoryID" required>
                <option value="">--Wybierz kategorię--</option>
                <option value="1">Śniadanie</option>
                <option value="2">Obiad</option>
                <option value="3">Kolacja</option>
              </select>
              <br>

              <input name="title" id="title" placeholder="Tytuł" maxlength="25" required><br/><br/>
              <textarea name="ingredients" id="ingredients" rows="5" cols="50" placeholder="Składniki (wpisz po przecinku wraz z jednostką miary)" required></textarea><br/><br/>
              <textarea name="description" id="description" rows="5" cols="50" placeholder="Opis wykonania (np. Krok 1 (ENTER) Twój opis. (Pamiętaj o kropce na końcu tekstu!))" required></textarea><br/><br/>
              <label for="img">Wybierz zdjęcie:</label>
              <input type="file" name="picture" id="picture" accept="image/*" required><br/><br/>
              <input class="btn btn-dark" name="btnUserRecipeAdd" type="submit" value="Dodaj">

            </form> 

            <div class="userRecipes" id="userRecipes" style="display: none; width: 1000px;">
        <div class="userBreakfast"><b>ŚNIADANIA</b><br>
        <?php
          include 'config.php';

          $sess_usr = $_SESSION['userid'];

          $sql = "SELECT * FROM recipes WHERE category_ID = '1' AND user_ID ='$sess_usr'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              
              echo "<button style='margin-top: 10px;' class='btn btn-dark'>";
              echo "<a href='recipe.php?id=",$row['recipe_ID'],"' style='text-decoration: none; color: white;'>";
              echo $row['title'];
              echo "</a></button><br>";
              
            }
          }
        ?>
        </div>
        <div class="userDinner"><b>OBIADY</b><br>
        <?php
          include 'config.php';

          $sess_usr = $_SESSION['userid'];

          $sql = "SELECT * FROM recipes WHERE category_ID = '2' AND user_ID ='$sess_usr'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              
              echo "<button style='margin-top: 10px;' class='btn btn-dark'>";
              echo "<a href='recipe.php?id=",$row['recipe_ID'],"' style='text-decoration: none; color: white;'>";
              echo $row['title'];
              echo "</a></button><br>";
              
            }
          }
        ?>
        </div>
        <div class="userSupper"><b>KOLACJE</b><br>
        <?php
          include 'config.php';

          $sess_usr = $_SESSION['userid'];

          $sql = "SELECT * FROM recipes WHERE category_ID = '3' AND user_ID ='$sess_usr'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              
              echo "<button style='margin-top: 10px;' class='btn btn-dark'>";
              echo "<a href='recipe.php?id=",$row['recipe_ID'],"' style='text-decoration: none; color: white;'>";
              echo $row['title'];
              echo "</a></button><br>";
              
            }
          }
        ?>
        </div>
      </div>

          </div>
        </div>
      </div>

    </div>

    <div class="produkty" id="produkty">
      <ul id="mgal_show" class="mgal">
        <li>
          <a href="#breakfast" data-toggle="modal" data-target="#loginForm">
            <div class="container">
            <a href="breakfast.php" style="text-decoration: none"><img class="image" src="img/breakfast.jpg">
              <div class="middle">		  
                <div class="text">Śniadanie</div></a>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="#dinner" data-toggle="modal" data-target="#loginForm">
            <div class="container">
            <a href="dinner.php" style="text-decoration: none"><img class="image" src="img/obiad2.jpg">
			          <div class="middle">
				          <div class="text">Obiad</div></a>
			          </div>		
            </div>
		      </a>
        </li>
        <li>
          <a href="#supper" data-toggle="modal" data-target="#loginForm">
            <div class="container">
            <a href="supper.php" style="text-decoration: none"><img class="image" src="img/kolacja.jpg">
		            <div class="middle">
			            <div class="text">Kolacja</div></a>
			          </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
    
    <div class="container-fluid px-2 px-md-4 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-md-10 col-lg-9 col-xl-8">
              <div class="card card-main border-0 text-center">
                  
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                          <div class="carousel-item">
                              <div class="card border-0 card-0">
                                  <div class="card profile py-3 px-4">
                                    <div class="text-center"><img src="https://yt3.ggpht.com/ytc/AAUvwnhSeGCbeHJD09S7X-Qo8yuQKJqYdHa85OqkBDzSmg=s900-c-k-c0x00ffffff-no-rj" class="img-fluid profile-pic"> </div>
                                  </div> <img class="img-fluid open-quotes" src="https://i.imgur.com/Hp91vdT.png" width="20" height="20">
                                  <p class="content mb-0">Przepisy na każdą okazję, bardzo dobre doświadczenia z korzystania ze strony<br/><i>~Gordon Ramsay</i></p> <img class="img-fluid close-quotes ml-auto" src="https://i.imgur.com/iPcHyJK.png" width="20" height="20">
                              </div>
                          </div>
                          <div class="carousel-item active">
                              <div class="card border-0 card-0">
                                  <div class="card profile py-3 px-4">
                                      <div class="text-center"> <img src="https://cdn.jamieoliver.com/library/images/Jamie-Social.jpg" class="img-fluid profile-pic"> </div>
                                  </div> <img class="img-fluid open-quotes" src="https://i.imgur.com/Hp91vdT.png" width="20" height="20">
                                  <p class="content mb-0">Solidne źródło codziennych przepisów, jeżeli chcesz gotować efektywnie,</br> polecam tę stronę<br/><i>~Jamie Oliver</i></p> <img class="img-fluid close-quotes ml-auto" src="https://i.imgur.com/iPcHyJK.png" width="20" height="20">
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="card border-0 card-0">
                                  <div class="card profile py-3 px-4">
                                    <div class="text-center"> <img src="img/BobbyFlay.jpg" class="img-fluid profile-pic"> </div>
                                  </div> <img class="img-fluid open-quotes" src="https://i.imgur.com/Hp91vdT.png" width="20" height="20">
                                  <p class="content mb-0">Najlepsze przepisy z całego świata,<br/> bardzo pozytywna baza użytkowników z przepisami na każdą sytuację<br/><i>~Bobby Flay</i></p> <img class="img-fluid close-quotes ml-auto" src="https://i.imgur.com/iPcHyJK.png" width="20" height="20">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="contact-form">
      <section id="contact">
        <div class="social">
          <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="https://twitter.com/home" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <div class="contact-box">
          <div class="c-heading">
            <h1>Napisz do nas!</h1>
          </div>
          <div class="c-inputs">
            <input type="text" placeholder="imię">
            <input type="email" placeholder="e-mail">
            <textarea name="message" placeholder="Napisz wiadomość..."></textarea>
            <button onclick="location.href='mailto:admin@recipeproject.pl';">Wyślij</button>
          </div>
        </div>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2562.988525931643!2d22.01339121593302!3d50.030310825429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473cfaf83c5a9833%3A0x432f7dd9b86f7a01!2sUniwersytet%20Rzeszowski!5e0!3m2!1spl!2spl!4v1617036199279!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </section>
    </div>

    <footer class="bg-dark text-center text-white">
      <!-- Copyright -->
      <div class="text-center p-3">
        © 2021 Copyright: Janik Piotr, Midura Patryk, Ziółkowski Maciej
      </div>
    </footer>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom jQuery -->
    <script src="js/customJQuery.js"></script>
    <script src="js/jQueryForUsers.js"></script>
  </body>
</html>
