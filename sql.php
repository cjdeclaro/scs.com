<?php
	session_start();
	include 'db.php';
	date_default_timezone_set("Asia/Manila");

	//GENERATE TIME
	function getCurrentTime(){
		$today = date("Ymd-His"); //output format
		return $today; //Returns the current date and time
	}

	//CREATE FILE
	function createFile($filename, $message){
		$myfile = fopen("logs/".$filename.".txt", "w") or die("Unable to open file!");
		fwrite($myfile, $message);
		fclose($myfile);
	}

	//ADD STUDENT
	if(isset($_POST['btnaddstudent'])){

		$searchQuery = "SELECT studentnumber FROM `students` WHERE studentnumber = '".$_POST['studentnumber']."' OR LRN = '".$_POST['lrn']."'";
		$searchResult = getResult($searchQuery);

		if (mysqli_num_rows($searchResult) == 0){
			//ADD STUDENT
			$addQuery = "INSERT INTO `students`(`name`, `studentnumber`,`LRN`, `address`, `contactnumber`, `grade`, `section`, `adviser`, `bloodtype`, `parentsname`, `parentsnumber`, `allergens`)
			VALUES ('".$_POST['name']."','".$_POST['studentnumber']."','".$_POST['lrn']."','".$_POST['address']."','".$_POST['contactnumber']."','".$_POST['grade']."','".$_POST['section']."','".$_POST['adviser']."','".$_POST['bloodtype']."','".$_POST['parentsname']."','".$_POST['parentsnumber']."','".$_POST['allergens']."')";

			if(getResult($addQuery)){
				header('Location: students_info.php?id='.$_POST['studentnumber'].'&message=student_added');
			}else{
				header('Location: students.php?message=student_added_error');
				createFile(getCurrentTime(),"UNABLE TO ADD STUDENT INFO ROW WITH THE FOLLOWING QUERY: ".$searchQuery);
			}
		}
		else{
			header('Location: students.php?message=student_already_exist'); // show error
		}
	}

	//UPDATE STUDENT INFO
	if(isset($_POST['updateinfo'])){

		$updateQuery = "UPDATE `students` SET `address`='".$_POST['address']."',
		`contactnumber`='".$_POST['contactnumber']."',
		`grade`='".$_POST['grade']."',
		`section`='".$_POST['section']."',
		`adviser`='".$_POST['adviser']."',
		`bloodtype`='".$_POST['bloodtype']."',
		`parentsname`='".$_POST['parentsname']."',
		`parentsnumber`='".$_POST['parentsnumber']."',
		`allergens`='".$_POST['allergens']."'
		WHERE studentnumber = '".$_POST['updateinfo']."'";

		if(getResult($updateQuery)){
			header('Location: students_info.php?id='.$_POST['updateinfo'].'&message=student_updated');
		}else{
			header('Location: students_info.php?id='.$_POST['updateinfo'].'&message=error');
			createFile(getCurrentTime(),"UNABLE TO UPDATE STUDENT INFO ROW WITH THE FOLLOWING QUERY: ".$updateQuery);
		}
	}

	//ADD STUDENT MEDICAL
	if(isset($_POST['studentmedical'])){

		$searchQuery = "SELECT studentnumber FROM `students` WHERE studentnumber = '".$_POST['studentmedical']."'";
		$searchResult = getResult($searchQuery);

		if (mysqli_num_rows($searchResult) > 0){
			//ADD STUDENT
			$addQuery = "INSERT INTO `medical`(`studentnumber`, `date`, `time`, `age`, `weight`, `symptoms`, `diagnosis`, `medicationgiven`, `followupdate`,`timeout`,`clinician`)
			VALUES ('".$_POST['studentmedical']."','".$_POST['date']."','".$_POST['time']."','".$_POST['age']."','".$_POST['weight']."','".$_POST['symptoms']."', '".$_POST['diagnosis']."', '".$_POST['medicationgiven']."','".$_POST['followupdate']."','".$_POST['timeout']."','".$_SESSION['fname'].' '.$_SESSION['lname']."')";

			if(getResult($addQuery)){
				header('Location: students_info.php?id='.$_POST['studentmedical'].'&message=student_medical_added');
			}else{
				header('Location: students_info.php?id='.$_POST['studentmedical'].'&message=error');
				createFile(getCurrentTime(),"UNABLE TO ADD MEDICAL ROW WITH THE FOLLOWING QUERY: ".$addQuery);
			}
		}
		else{
			header('Location: students.php?message=student_doesnt_exist'); // show error
		}
	}

	//DELETE STUDENT
	if(isset($_POST['deleterecord'])){
		if($_POST['password']==$_SESSION['password']){

			$searchQuery = "SELECT studentnumber FROM `students` WHERE studentnumber = '".$_POST['deleterecord']."'";
			$searchResult = getResult($searchQuery);

			if (mysqli_num_rows($searchResult) > 0){
				//ADD STUDENT
				$deleteQuery_user = "DELETE FROM `students` WHERE studentnumber = '".$_POST['deleterecord']."'";
				$deleteQuery_medical = "DELETE FROM `medical` WHERE studentnumber = '".$_POST['deleterecord']."'";
				if(getResult($deleteQuery_user)&&getResult($deleteQuery_medical)){
					header('Location: students.php?message=student_deleted');
				}else{
					header('Location: students.php?message=student_deleted_error');
					createFile(getCurrentTime(),"UNABLE TO DELETE STUDENT ROW WITH THE FOLLOWING QUERY: ".$deleteQuery_user);
				}
			}
			else{
				header('Location: students.php?message=student_doesnt_exist'); // show error
			}
		}else{
			header('Location: students_info.php?id='.$_POST['deleterecord'].'&message=password_doesnt_match'); // show error
		}
	}

	//UPDATE ADMIN CREDENTIALS
	if(isset($_POST['update_credentials'])){

		if($_POST['old_username']==$_SESSION['username']&&$_POST['old_password']==$_SESSION['password']){
			if($_POST['new_password']==$_POST['confirm_new_password']){

				$updateQuery = "UPDATE `users` SET `username`='".$_POST['new_username']."',`password`='".$_POST['new_password']."' WHERE username='".$_POST['old_username']."'";

				if(getResult($updateQuery)){
					header('Location: account.php?message=success_update');
					$_SESSION['username']=$_POST['new_username'];
					$_SESSION['password']=$_POST['new_password'];
				}else{
					header('Location: account.php?message=error');
					createFile(getCurrentTime(),"UNABLE TO UPDATE ACCOUNT CREDENTIALS ROW WITH THE FOLLOWING QUERY: ".$updateQuery);
				}
			}else{
				header('Location: account.php?message=passwords_doesnt_match');
			}
		}else{
			header('Location: account.php?message=credentials_wrong');
		}
	}

	//ADD USER
	if(isset($_POST['newuser'])){

		$searchQuery = "SELECT username FROM `users` WHERE username = '".$_POST['username']."'";
		$searchResult = getResult($searchQuery);

		if (mysqli_num_rows($searchResult) == 0){
			if($_POST['mypassword']==$_SESSION['password']&&$_POST['myusername']==$_SESSION['username']){
				if($_POST['password']==$_POST['confirm_password']){
					//ADD STUDENT
					$addQuery = "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `usertype`)
					VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['username']."','".$_POST['password']."','admin')";

					if(getResult($addQuery)){
						header('Location: settings.php?message=user_added');
					}else{
						header('Location: settings.php?message=error');
						createFile(getCurrentTime(),"UNABLE TO ADD NEW USER ROW WITH THE FOLLOWING QUERY: ".$addQuery);
					}
				}else{
					header('Location: settings.php?message=passwords_doesnt_match'); // show error
				}
			}else{
				header('Location: settings.php?message=credentials_wrong'); // show error
			}
		}
		else{
			header('Location: settings.php?message=username_exist'); // show error
		}
	}

?>