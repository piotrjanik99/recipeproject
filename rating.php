<?php
  include_once 'config.php';
  session_start();

  if(!empty($_POST['recipeID']) && !empty($_POST['ratingNum'])) { 
    // Get posted data 
    $recipeID = $_POST['recipeID'];
    $ratingNum = $_POST['ratingNum'];
    $sess_usr = $_SESSION['userid'];

    // Check the user (already submitted the rating for the same post)
    $query = "SELECT rate FROM rates WHERE recipe_ID = '$recipeID' AND user_ID = '$sess_usr'"; 
    $result = $conn->query($query); 
     
    if($result->num_rows > 0) { 
        $status = 2; 
    }
    else { 
      // Insert rating data in the database 
      $query = "INSERT INTO rates (user_ID, recipe_ID, rate) VALUES ('$sess_usr', '$recipeID', '$ratingNum')"; 
      $insert = $conn->query($query); 
 
      $status = 1;
    } 
     
    // Fetch rating details from the database 
    $query = "SELECT COUNT(rate) as rating_num, FORMAT((SUM(rate) / COUNT(rate)), 1) as average_rating 
                FROM rates WHERE recipe_ID = $recipeID GROUP BY (recipe_ID)"; 
    $result = $conn->query($query); 
    $ratingData = $result->fetch_assoc(); 
     
    $response = array( 
        'data' => $ratingData, 
        'status' => $status 
    ); 
    
    // Return response in JSON format 
    echo json_encode($response);
  }
?>
