<?php 
	
	if($postData = json_decode(file_get_contents("php://input")))
	{
		include '../model/login.php';
		$email = $postData->email;
		$password = $postData->password;

		$login = new login($email,$password);
		//echo $log->__construct($email,$password); // bad practice
		if($login->data[1])
		{
			/*session_start();
			$_SESSION['u_id'] = $login->data[0];
			$_SESSION['username'] = $login->data[1];
			$_SESSION['email'] = $login->data[2];
			$_SESSION['password'] = $login->data[3];
			$_SESSION['birth-date'] = $login->data[4];
			$_SESSION['phone'] = $login->data[5];
			$_SESSION['country'] = $login->data[6];*/

			// header("Location: ../assets/inner.php#mustDo");

			$responseData = array('state' => true,'id' => $login->data[0],'username' => $login->data[1],'email' => $login->data[2],
			'password' => $login->data[3],'birthDate' => $login->data[4],'phone' => $login->data[5],'country' => $login->data[6] );
			echo json_encode($responseData);
		}
		else
		{
			/*session_start();
			$_SESSION['message'] = "Sorry : yor cerdentials are wrong :(";
			$_SESSION['messageType'] = "signin";
			header('Location: ..#/signin');*/
			$responseData = array('state' => false);
			echo json_encode($responseData);
		}
	}

	else
	{
		header('Location: ../#/signin');
	}

 ?>