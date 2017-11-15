<?php 
	include_once 'curd_operations.php';
	function db_connect(){
		$connection = mysqli_connect("localhost", "root", "", "students_chart");
		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
			exit();
		}
		//print_r($connection);
		return $connection;
	}

	function execute_query($query, $link){
		if(!empty($link)){
			return mysqli_query($link, $query);
		}else{
			return mysqli_query(db_connect(), $query);
		}
	}

	function get_array_from_object($result){
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}

	function sanitize($input, $con){
		return mysqli_real_escape_string($con, $input);
	}

	function landing_page_session_check(){
        if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])){
            header('location:../login');
        }
    }    
    function login_page_session_check(){
        if(isset($_SESSION["user_id"])){
        	echo "I am in ";
            header('location:../home');
        }
    }

    function log_out(){
		session_destroy();   
	}

	function create_folder($folder_name){
		$path = "../files/$folder_name";
		$old = umask(000);
		if (!mkdir($path, 0777, true)) {
			umask($old);
		}else{
			
		}
	}

	
	function send_message($phone_number,$message){
        $url = 'http://greefitech.siegsms.in/PostSms.aspx';
        $fields_string ="";
        $fields = array( 'userid' =>urlencode('sigi'), 'pass'=>urlencode('sigi@123'), 'phone'=>urlencode($phone_number), 'msg'=>urlencode($message));
        //url-ify
        foreach($fields as $key=>$value){
            $fields_string .= $key.'='.$value.'&'; rtrim($fields_string,'&');
        }
        rtrim($fields_string,'&');
        $url_final = $url.'?'.$fields_string;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url_final);
        $result = curl_exec($ch);
        curl_close($ch);
    }
