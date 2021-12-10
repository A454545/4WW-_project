<?php
	session_start();
    
    $_SESSION['chosenID'] = $_POST['chosenID'];
	// Open connection
	include 'pdoConnect.php';

    $query = "SELECT name, reviewerName, created, cast(rating as int) as rating, content FROM `review` WHERE review.locationID = " . $_SESSION['chosenID'];
    $stmt = $pdo->prepare($query);
    //$stmt-> bindParam(':locationVar', $_SESSION['chosenID']);
    $stmt->execute();

    if ($stmt->rowCount() != 0) {
        $i = 0;
        $reviewResults = array();
        foreach ($stmt as $row) {                                        
            $columns = array($row['reviewerName'],  $row['name'], $row['created'], $row['rating'], $row['content']);
            $row = "reviewResult_" . $i;
            $reviewResults[$row] = $columns;
            $i = $i + 1;
        }
        $_SESSION['reviewResults'] = $reviewResults;
    }
    
    $pdo = null; // Close connection
    
    //print($_SESSION["reviewRating_"]);
    $url = "http://3.130.249.183/individualResult.php";
    header('location: ' . $url);

?>