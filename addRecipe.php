<?php
    include 'config.php';
    session_start();

    $sess_usr = $_SESSION['userid'];

    $category = $_POST['categoryID'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $description = $_POST['description'];

    $uploadedFile = '';
    $fileName = time().'_'.$_FILES['picture']['name'];
    $temporary = explode(".", $_FILES["picture"]["name"]);
    $sourcePath = $_FILES['picture']['tmp_name'];
    $targetPath = "users_img/".$fileName;

    if(move_uploaded_file($sourcePath, $targetPath)) {
        $uploadedFile = $fileName;

        $query = "INSERT INTO recipes(category_ID, user_ID, title, ingredients, description, picture)
            VALUES('$category', '$sess_usr', '$title', '$ingredients', '$description', '$uploadedFile')";

        mysqli_query($conn, $query);

        echo 0;
    }
    else {
        echo 1;
    }

    mysqli_close($conn);
?>