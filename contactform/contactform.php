<?php
	require_once 'DBOperations.php';
	$db_operation = new DBOperation();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = json_decode(file_get_contents("php://input"));
		
		if(!empty($data->site)){
			$sql = "INSERT INTO crm_contact(names, emails, subject, message, site,created_date) VALUES ('$data->names','$data->emails','$data->subject','$data->message','$data->site',CURDATE())";
			$result = $db_operation->insert($sql);
			$response = json_decode($result);
			$response->message = 'Submitted successfully';
			
			if($response->success == 'failure'){
				$response->message = 'Sorry, An error occurred';
			}
			echo json_encode($response);
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	  echo "Newtech API Running"; 
	}