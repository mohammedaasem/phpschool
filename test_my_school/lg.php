<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//$roll_number = $_GET['roll_number'];
		//$password = $_GET['password'];
		
		$roll_number = isset($_POST['roll_number']) ? mysqli_real_escape_string($conn,$_POST['roll_number']) : "";
		$password = isset($_POST['password']) ? mysqli_real_escape_string($conn,$_POST['password']) : "";
		$table = "student";
		
		require_once 'dbconnect.php';
		//$query = "select * from ".$table." where 'roll_number='".$roll_number."' and 'password='".$password."'";
		#$query = "SELECT * FROM `student` WHERE `roll_number`=11 and `password`='976761'";
		//$query ="select * from `tbl_user` where roll_number='".$roll_number."' AND password='".$password."'";
		//$query = "select * from ".$table." ";
		
		$result = mysqli_query($db,$query);
		
		if(mysqli_num_rows($result)==1)
		{
			$data = mysqli_fetch_array($result);
			$response['name'] = $data['name'];
			$response['father_name'] = $data['father_name'];
			$response['mother_name'] = $data['mother_name'];
			//$response['gender'] = $data['gender'];
			$response['dob'] = $data['dob'];
			$response['blood_group'] = $data['blood_group'];
			$response['adhaar_number'] = $data['adhaar_number'];
			$response['contact_number'] = $data['contact_number'];
			$response['address'] = $data['address'];
			$response['registration_number'] = $data['registration_number'];
			$response['class'] = $data['class'];
			$response['division'] = $data['division'];
			$response['roll_number'] = $data['roll_number'];
			$response['success'] = "200";
			mysqli_close($db);
			die(print_r(json_encode($response),true));
		}
		else
		{
			$response['success'] = "201";
			$response['message'] = "Username / Password is wrong!";
			mysqli_close($db);
			die(print_r(json_encode($response),true));		
		}
	}
?>