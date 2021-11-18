<?php
  session_start();
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
    <link rel="stylesheet" href="css/custom.css">

    <!-- GOOGLE FONT-->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    </style>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

    <div class="header">

      <div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-title text-center">
                <h4>Login</h4>
                
                <div class="alert alert-danger" id="msgLogin" style="display:none;"></div>
                <div class="alert alert-success" id="msgsuccessReg" style="display:none;"></div>

              </div>
              <div class="d-flex flex-column text-center">

                <form action="" method="POST" id="lgForm">

                  <div class="form-group">
                    <input type="email" class="form-control" id="emailLogin" name="emailLogin" required="required" placeholder="E-mail...">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" required="required" placeholder="Hasło...">
                  </div>

                  <button name="loginUser" id="submitLogin" type="submit" class="btn btn-info btn-block btn-round">Zaloguj się</button>

                </form>

              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <div class="signup-section">Nie posiadasz jeszcze konta? <a id="reg" data-toggle="modal" data-target="#registerForm" class="text-info"> Zarejestruj się</a>.<br><br>
                Zapomniałeś hasła? <a id="lostPass" data-toggle="modal" data-target="#resetPasswordModal" class="text-info"> Zresetuj hasło</a>.
              </div>
            </div>
          </div> 
        </div>
      </div>

      <div class="modal fade" id="registerForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-title text-center">
                <h4>Rejestracja</h4>

                <div class="alert alert-danger" id="msgReg" style="display:none;"></div>

              </div>
              <div class="d-flex flex-column text-center">

                <form action="" method="POST" id="regForm">
                
                  <div class="form-group">
                    <input type="text" class="form-control" name="usernameReg" id="usernameReg" required="required" placeholder="Nazwa użytkownika...">
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control" name="emailReg" id="emailReg" required="required" placeholder="E-mail...">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" name="passwordReg" id="passwordReg" required="required" placeholder="Hasło...">
                  </div>

                  <button name="registerNewUser" id="regBtn" type="submit" class="btn btn-info btn-block btn-round">Zarejestruj się</button>
                
                </form>

              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Masz już konto? <a id="accountExist" data-toggle="modal" data-target="#loginForm" class="text-info"> Zaloguj się</a>.</div>
              </div>
          </div> 
        </div>
      </div>

      <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-title text-center">
                <h4>Reset Hasła</h4>

                <div class="alert alert-danger" id="msgReset" style="display:none;"></div>

              </div>
              <div class="d-flex flex-column text-center">

                <form action="" method="POST" id="resetForm">

                  <div class="form-group">
                    <input type="email" class="form-control" name="emailReset" id="emailReset" required="required" placeholder="E-mail...">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" name="passwordReset" id="passwordReset" required="required" placeholder="Nowe hasło...">
                  </div>

                  <button name="resetUserPass" id="resetBtn" type="submit" class="btn btn-info btn-block btn-round">Potwierdź</button>
                
                </form>

              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section"><a id="backtoLogin" data-toggle="modal" data-target="#loginForm" class="text-info"> Powrót do logowania</a>.</div>
              </div>
          </div> 
        </div>
      </div>

      <nav class="navbar navbar-expand-sm navbar-dark bg-light">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <form class="form-inline my-2 my-lg-0 ml-auto">
            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#loginForm">Zaloguj się</button>
          </form>
        </div>
      </nav>
        
      <div class="flex-overlay">
         <h1><img src="img/logo.png"></a></h1>
      </div>

    </div>

    <div class="produkty" id="produkty">
      <ul id="mgal_show" class="mgal">
        <li>
          <a href="#breakfast" data-toggle="modal" data-target="#loginForm">
            <div class="container">
              <img class="image" src="img/breakfast.jpg">
              <div class="middle">		  
                <div class="text">Śniadanie</div>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="#dinner" data-toggle="modal" data-target="#loginForm">
            <div class="container">
              <img class="image" src="img/obiad2.jpg">
			          <div class="middle">
				          <div class="text">Obiad</div>
			          </div>		
            </div>
		      </a>
        </li>
        <li>
          <a href="#supper" data-toggle="modal" data-target="#loginForm">
            <div class="container">
              <img class="image" src="img/kolacja.jpg">
		            <div class="middle">
			            <div class="text">Kolacja</div>
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
  </body>
</html>
