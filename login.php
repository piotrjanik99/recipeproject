<?php
    include 'config.php';
    session_start();

    /*if (isset($_POST['loginUser'])) {
        $email = $_POST['emailLogin'];
        $password = $_POST['passwordLogin'];
        $passMD5 = md5($password);
        
        $query = "SELECT * FROM users WHERE email='$email' AND password='$passMD5'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['status'] = "Zalogowano pomyślnie!";
            $_SESSION['status_code'] = "success";
            header('Location: index_login.php');
            exit();
        }
        else {
            $_SESSION['status'] = "Niepoprawny e-mail lub hasło!";
            $_SESSION['status_code'] = "error";
            header('Location: index.php');
            exit();
        }
    }*/
    
    $email = filter_var($_POST['emailLogin1'], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
    $password = filter_var($_POST['passwordLogin1'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $results = mysqli_query($conn, "SELECT password FROM users WHERE email='$email'");

    $userid = mysqli_query($conn, "SELECT user_ID FROM users WHERE email='$email'");
    $useridData = $userid->fetch_array()[0] ?? '';

    if (mysqli_num_rows($results) == 1) {
        $data = $results->fetch_array();
        if(password_verify($password, $data['password'])) {
            echo 0;
            $_SESSION['userid'] = $useridData;
            $_SESSION['loggedin'] = true;
            $_SESSION['status'] = "Zalogowano pomyślnie!";
            $_SESSION['status_code'] = "success";
        }
        else {
            echo 1;
        }
    }
    else {
        echo 2;
    }

	mysqli_close($conn);
?>
