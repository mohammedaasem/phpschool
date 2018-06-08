<?php
require('connection.php');

if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$user_type = $_POST['user_type'];
		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['dob'];
		$blood_group = $_POST['blood_group'];
		$adhaar_number = $_POST['adhaar_number'];
		$contact_number = $_POST['contact_number'];
		$father_contact_number = $_POST['father_contact_number'];
		$cast = $_POST['cast'];
		$religion = $_POST['religion'];
		$state = $_POST['state'];
		$nationality = $_POST['nationality'];
		$address = $_POST['address'];
		$registration_number = $_POST['registration_number'];
		$class = "n/a";
		$division = "n/a";
		$roll_number = "n/a";
		$admission_date = $_POST['joining_date'];
		$password = $_POST['password'];
		$profile = $_POST['image'];
		$path = "user_dp/$name.jpg";
		$special_subject=$_POST['subject'];
		$experience=$_POST['experience'];
		$qualification=$_POST['qualification'];
	
		
		require_once('connection.php');
		

		$check="SELECT * FROM tbl_user WHERE roll_no = '$_POST[roll_number]' or adhaar_no = '$_POST[adhaar_number]' ";

		$rs = mysqli_query($check);

		$data = mysqli_fetch_array($rs, MYSQLI_NUM);
		if($data[0] > 1)
			{
				$response['success'] = "001";
				$response['message'] = "User is already registered !";
			}
		else
		{				
			$sql = "INSERT INTO tbl_user (user_type,name,father_name,mother_name,gender,dob,class,roll_no,contact_no,father_contact_no,blood_Group,address,admission_date,cast,religion,state,nationality,adhaar_no,password,profile,special_subject,experience,qualification) VALUES ('$user_type','$name','$father_name','$mother_name','$gender','$date_of_birth','$class','$roll_number','$contact_number','$father_contact_number','$blood_group','$address','$admission_date','$cast','$religion','$state','$nationality','$adhaar_number','$password','$path','$special_subject','$experience','$qualification')";				
			if(mysqli_query($conn,$sql))
				{
					$profile = str_replace('data:image/png;base64,', '', $profile);	
					$profile = str_replace(' ', '+', $profile);
					file_put_contents($path,base64_decode($profile));
					
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