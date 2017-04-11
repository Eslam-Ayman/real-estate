<?php 
  if($postData = json_decode(file_get_contents("php://input")))
  {
  	include '../model/register.php';
  

	$credentials['username'] = $postData->username;
	$credentials['email'] = $postData->email;
	$credentials['birthdate'] = $postData->birthDate;
	$credentials['phone'] = $postData->phone;
	$credentials['country'] = $postData->country;

	if($postData->submit == 'signup')
	{
		$credentials['password'] = $postData->password;
		$credentials['conf_password'] = $postData->password_confirmation;
		if($credentials['password'] == $credentials['conf_password'])
		{
			try 
			{
				$register = new register($credentials);
				$register->registerData();
				// session_start();
				// $_SESSION['message'] = 'Succefully : your account has registered :)';
				// $_SESSION['messageType'] = 'signup';
				// header('Location: ..#/signin');
				$responseData = array('registerState'=> true,'message' => 'Succefully : your account has registered :)');
				echo json_encode($responseData);
			} 
			catch (Exception $exc) 
			{
				/*session_start();
				$_SESSION['message'] = $exc->getMessage();
				header("Location: ..#/signup");*/
				$responseData = array('registerState'=> false,'message' => $exc->getMessage());
				echo json_encode($responseData);
			}
		}
		else
		{
			/*session_start();
			$_SESSION['message'] = "Your confirm_password not matched with password";
			header("Location: ..#/signup");*/
			$responseData = array('registerState'=> false,'message' => 'Your confirm_password not matched with password');
			echo json_encode($responseData);
		}
	}// end of sign up 

	elseif ($postData->submit == 'saveProfile')
	{
		session_start();
		$credentials['u_id'] = $_SESSION['u_id'];
		$credentials['password'] = $_SESSION['password'];
		//session_destroy();
		if(isset($_POST['password']))
		{
			if($_POST['password'] != $_POST['confirm_password'])
			{
				session_start();
				$_SESSION['message'] = "Your confirm_password not matched with password";
				$_SESSION['messageType'] = 'error';
				header("Location: ..#/Profile");
			}
			$credentials['password'] = $_POST['password'];
		}
		try 
		{
			
			$register = new register($credentials);
			$register->updateProfile();
			session_start();
			$_SESSION['message'] = 'Succefully : your account has updated :)';
			$_SESSION['messageType'] = 'success';
			header('Location: ..#/profile');
		} 
		catch (Exception $exc) 
		{
			session_start();
			$_SESSION['message'] = $exc->getMessage();
			$_SESSION['messageType'] = 'error';
			header("Location: ..#/profile");
		}
	}
  }
  else
  {
    header("Location: ..#/signup");
  }



 ?>