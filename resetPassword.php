<?php
    include 'config.php';
    session_start();

    /*if(isset($_POST['resetUserPass'])) {
        $email = $_POST['emailReset'];
        $newPass = $_POST['passwordReset'];
        $newPassMD5 = md5($newPass);
        
        $email_check = "SELECT * FROM users WHERE email='$email'";
        $res_e = mysqli_query($conn, $email_check);

        if(mysqli_num_rows($res_e) == 1) {
                $query = "UPDATE users SET password='$newPassMD5' WHERE email='$email'";
                $query_run = mysqli_query($conn, $query);
                $_SESSION['status'] = "Hasło zostało pomyślnie zmienione!";
                $_SESSION['status_code'] = "success";
                header('Location: index.php');
                exit();
        }
        else {
            $_SESSION['status'] = "Niepoprawny adres e-mail";
            $_SESSION['status_code'] = "error";
            header('Location: index.php');
            exit();
        }
    }*/

    $email = filter_var($_POST['emailReset1'], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
    $hashNewPass = password_hash($_POST['passwordReset1'], PASSWORD_BCRYPT);

    $email_check = "SELECT * FROM users WHERE email='$email'";
    $res_e = mysqli_query($conn, $email_check);

    if(mysqli_num_rows($res_e) == 1) {
        echo 0;
        $query = "UPDATE users SET password='$hashNewPass' WHERE email='$email'";
        $query_run = mysqli_query($conn, $query);
    }
    else {
        echo 1;
    }

    mysqli_close($conn);
?>
