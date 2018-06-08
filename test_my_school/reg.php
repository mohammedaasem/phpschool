<?php
require('l_dbconnect.php');

if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$blood_group = $_POST['blood_group'];
		$adhaar_number = $_POST['adhaar_number'];
		$contact_number = $_POST['contact_number'];
		$address = $_POST['address'];
		$registration_number = $_POST['registration_number'];
		$class = $_POST['class'];
		$division = $_POST['division'];
		$roll_number = $_POST['roll_number'];
		$admission_date = $_POST['admission_date'];
		$password = $_POST['password'];
		$image = $_POST['image'];
		$path = "user_dp/$name.jpg";
		require_once('l_dbconnect.php');

		$check="SELECT * FROM student WHERE roll_number = '$_POST[roll_number]' or adhaar_number = '$_POST[adhaar_number]' ";

		$rs = mysqli_query($check);

		$data = mysqli_fetch_array($rs, MYSQLI_NUM);
		if($data[0] > 1)
			{
				$response['success'] = "001";
				$response['message'] = "User is already registered !";
			}
		else
		{				
			$sql = "INSERT INTO student (name,father_name,mother_name,gender,date_of_birth,blood_group,adhaar_number,contact_number,address,registration_number,class,division,roll_number,admission_date,password,image) VALUES('$name','$father_name','$mother_name','$gender','$date_of_birth','$blood_group','$adhaar_number','$contact_number','$address','$registration_number','$class','$division','$roll_number','$admission_date','$password','$path')";				
			if(mysqli_query($db,$sql))
				{
					$image = str_replace('data:image/png;base64,', '', $image);	
					$image = str_replace(' ', '+', $image);
					file_put_contents($path,base64_decode($image));
					
					echo 'Registration done successfully.';
				}
				else
				{
					echo 'oops! Please try again!';
				}
		} 
}
else
{
	echo 'error';
}
?>