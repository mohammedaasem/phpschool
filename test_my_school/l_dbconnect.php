?php
	/*
	define('DB_SERVER', '103.250.185.243');
	define('DB_USERNAME', 'mcagu_mcagulam');
	define('DB_PASSWORD', 'Mohammed@321');
	define('DB_DATABASE', 'mcagulam_myschool');
	*/
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'test_my_school');
	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error());
	if($db){
		echo "Success";
	}

?>