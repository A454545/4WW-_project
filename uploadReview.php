<?php
	session_start();
	
	// variables to track
	$uploadOK = 1; 
	$_SESSION['submissionStatus'] = "false";
	
	// variables to be inserted 
	$reviewName = "";       // name
	$location = "";        // locationID
	$review = "";    // content
	$rlat = "";        // dlat
	$rlong = "";       // dlong
	// $imagePath = $keyName;      // image
	// $imageURL = $pathInS3;       // imageURL
	$score = "";      // rating
	$reviewerID = $_SESSION['userid'];;      // reviewerID
	$reviewerName = $_SESSION['userfullname'];  //reviewerName
	
	// when form is submitted , includes server side validation
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo 'Done';
		if (isset($_POST['submit'])) {
			echo 'Done';
			if (isset($_POST['reviewname']) && isset($_POST['description']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['rate']) ) {
				echo 'Doneisset';
				if (!empty($_POST['reviewname']) && !empty($_POST['description']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['rate']) ) {
					echo 'Done2';
					$reviewName = $_POST['reviewname'];
					$review = $_POST['description'];
					$rlat = $_POST['latitude'];
					$rlong = $_POST['longitude'];
					$score = $_POST['rate'];
					if (!empty($_POST['locationID'])) {
						echo $_POST['locationID'];
						$location = $_POST['locationID'];
					}
					
					
					// start querying
					include 'assets/php/pdoConnect.php';
					
					// check if the entered pic has same name as another
					// $checkQuery = "SELECT * FROM listing WHERE imagePath = :path";
					// $check = $pdo->prepare($checkQuery);
					// $check->bindParam(':path', $imagePath);
					// $check->execute();
					
					// if (isset($_FILES["picture"]) && $check->rowCount() == 0) {
						// Add it to S3 once the form is submitted 
						// echo 'Done3';
						// try {
							// echo 'Done4';
							// Uploaded:
							// $file = $_FILES["picture"]['tmp_name'];

							// $s3->putObject(
								// array(
									// 'Bucket'=>$bucketName,
									// 'Key' =>  $keyName,
									// 'SourceFile' => $file,
									// 'StorageClass' => 'REDUCED_REDUNDANCY'
								// )
							// );
							// $uploadOK = 1;
							// echo 'Done5';

						// } catch (S3Exception $e) {
							// die('Error:' . $e->getMessage());
						// } catch (Exception $e) {
							// die('Error:' . $e->getMessage());
						// }
					// } else {
						// $_SESSION['submissionStatus'] = "picture";
						// $url = "http://localhost/4ww3_project/submit.php";
						// header('location: ' . $url);
					// }
					
					
					echo 'Done6';
					// check if the entered listing is already in database
					$checkQuery = "SELECT * FROM listing WHERE dlat = :elat AND dlong = :elong";
					$check = $pdo->prepare($checkQuery);
					$check->bindParam(':elat', $rlat);
					$check->bindParam(':elong', $rlong);
					$check->execute();
					echo 'Done7';
					if ($check->rowCount() == 0) {
						echo 'Done8';
						// close connection
						$pdo = null;
						$_SESSION['submissionStatus'] = "exist";
						$url = "http://localhost/4ww3_project/submit.php";
						header('location: ' . $url);
					}
					
					// insert record when pic uploaded
					if ($uploadOK == 1) {
						echo 'Done9';
						$insert = "INSERT INTO review (name, content, dlat, dlong, locationID, rating, reviewerID, reviewerName)
						VALUES (:name, :content, :dlat, :dlong, :locationID, :rating, :reviewerID, :reviewerName)";
						$newList = $pdo->prepare($insert);
						$newList->bindParam(':name', $reviewName);
						$newList->bindParam(':content', $review);
						$newList->bindParam(':dlat', $rlat);
						$newList->bindParam(':dlong', $rlong);
						$newList->bindParam(':locationID', $location);
						$newList->bindParam(':rating', $score);
						$newList->bindParam(':reviewerID', $reviewerID);
						$newList->bindParam(':reviewerName', $reviewerName);
						if ($newList->execute() === true) { // if inserted
							echo 'Done10';
							// close connection
							$pdo = null;
							$_SESSION['submissionStatus'] = "true";
							$url = "http://localhost/4ww3_project/submit.php";
							header('location: ' . $url);
						} else {
							// close connection
							$pdo = null;
							$_SESSION['submissionStatus'] = "false";
							$url = "http://localhost/4ww3_project/submit.php";
							header('location: ' . $url);
						}
					} else {
						$pdo = null;
						$_SESSION['submissionStatus'] = "picture";
						$url = "http://localhost/4ww3_project/submit.php";
						header('location: ' . $url);
					}
				} else {
					$_SESSION['submissionStatus'] = "empty";
					$url = "http://localhost/4ww3_project/submit.php";
					header('location: ' . $url);
				}
			} else {
				$_SESSION['submissionStatus'] = "empty";
				$url = "http://localhost/4ww3_project/submit.php";
				header('location: ' . $url);
			}
		} else {
			$_SESSION['submissionStatus'] = "submit";
			$url = "http://localhost/4ww3_project/submit.php";
			header('location: ' . $url);
		}
	} else {
		$_SESSION['submissionStatus'] = "form";
		$url = "http://localhost/4ww3_project/submit.php";
		header('location: ' . $url);
	}
		

	echo 'Done';
?>
?>