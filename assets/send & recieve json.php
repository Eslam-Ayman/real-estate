<?php 
if($request = json_decode(file_get_contents("php://input")))
	{

// $postdata = file_get_contents("php://input");
// $request = json_decode($postdata);

/*$soso = $request;->email;
$pass = $request->password;*/

        if($request->email =='eslam@yahoo.com')
        {
$json = array('name' => 'hello '. $request->email,'age'=> $request->password );
 echo json_encode($json);
         
        }
        else
        {
         $json = array('name' => 'sorry '.$request->email,'age'=> $request->password );

         
 echo json_encode($json);
        }
      }
 ?>