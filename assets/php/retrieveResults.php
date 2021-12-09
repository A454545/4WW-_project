<?php
	session_start();

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

	// connection
	include 'pdoConnect.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['submitSearch'])) {
            if (!empty($_POST['search'])){
                $pattern = "/[0-9]/";
                $enteredSearch = test_input($_POST['search']);
                if (!preg_match($numbers, $varname)){
                    // get user info
					$query = "SELECT * FROM listing WHERE address LIKE %:searchName% ";
					$stmt = $pdo->prepare($query);
					$stmt-> bindParam(':searchName', $enteredSearch);
					$stmt->execute();

                    if ($stmt->rowCount() != 0) {
						$record = $stmt->fetch(PDO::FETCH_ASSOC);
						$_SESSION['search'] = $record['address'];
						$_SESSION['longitude'] = $record['dlate'];
						$_SESSION['latitude'] = $record['dlong'];
						
						$pdo = null; // close the connection
                    }
                $url = "http://localhost/html/4WW3_project/index.php";
                header('location: ' . $url);
                }
            $url = "http://localhost/html/4WW3_project/index.php";
            header('location: ' . $url);
            }
        $url = "http://localhost/html/4WW3_project/index.php";
        header('location: ' . $url);
        }
    $url = "http://localhost/html/4WW3_project/index.php";
    header('location: ' . $url);
    }
?>