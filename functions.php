<?php

	
if(isset($_SESSION["username"])) {
	
	    require("db/db.php");
    	 $user = $_SESSION['username'];
		 $query    = "SELECT * FROM `users_nbd` WHERE username='$user'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
			
			while($row = $result->fetch_assoc()) {
				
				$fname = $row['fname'];
				$lname = $row['lname'];
				$desg = $row['desg'];
				$email = $row['email'];
				  function get_session_user_fname($fname){
				 return $fname;
				  }
				  function get_session_user_lname($lname){
				 return $lname;
				  }
				  function get_session_user_desg($desg){
					  return $desg;
				  }
				  function get_session_user_email($email){
					  return $email;
				  }		  
		    }
	  }
	
}

function get_users_list(){
        require("db/db.php");
	    $query    = "SELECT * FROM `users_nbd` order by `id`";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
	    while($row = $result->fetch_assoc()) {
		 $fname = $row['fname'];
		 $lname = $row['lname'];
		 $usernames = $row['username'];
		return $fname.'&nbsp;'.$lname;
	}
}


function get_completed_project_count(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `done`='1' AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;
}

function get_completed_project_count_mgmt(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `done`='1' AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
		return trim($rows);
}




function get_progress_project_count(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE (`done`='0' OR `done`='2') AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;
}
function get_progress_project_count_mgmt(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE (`done`='0' OR `done`='2') AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
		return trim($rows);
}







function get_start_project_count(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `done`='3' AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;
}

function get_start_project_count_mgmt(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `done`='3' AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
		return trim($rows);
}





function get_hold_project_count(){
         require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `done`='4' AND `del`='0'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;
}


function get_delayed_project(){
     require("db/db.php");
	 $date = date('Y-m-d');
	 $query = "SELECT * FROM `project_nbd` WHERE (`del`='0' AND `end_date`<= '$date' AND `done`<>'1' AND `done`<>'4')";
	 $query = mysqli_query($con, $query) or die(mysqli_query($con));
	 $rows = mysqli_num_rows($query);
      return trim($rows);




}







function get_inhouse_count(){
        require("db/db.php");  
	    $query    = "SELECT * FROM `project_nbd` WHERE `src`='In house'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;

}

function get_inhouse_count_mgmt(){
        require("db/db.php");  
	    $query    = "SELECT * FROM `project_nbd` WHERE `src`='In house'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		return $rows;
}
function get_outsrc_count(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `src`='Outsource'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;
}



function get_outsrc_count_mgmt(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `src`='Outsource'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		return $rows;
}


function get_global_count_mgmt(){
        require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `src`='Global'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		return $rows;
}





function get_project_count(){
         require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `del`<>'1'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;

}

function get_project_count_mgmt(){
         require("db/db.php");
	    $query    = "SELECT * FROM `project_nbd` WHERE `del`<>'1'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		return trim($rows);

}




 function count_project_alert(){
	 
	  require("db/db.php");
	    $current_date = date('Y-m-d');
		//9 and 5 5 < 9
	    $query    = "SELECT * FROM `project_nbd` WHERE `end_date` <= '".$current_date."' AND (`done` = 0 OR `done` = 2) AND `del`<>'1'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
		if(strlen((string)$rows) == 1){
		  $rows = "0".$rows;
		}
		return $rows;
	 			
 }

	function new_date($date){
		
		$date = date("d M, Y", strtotime($date));
		return $date;
	}
	
	
	function get_user_fname($user_name){
		require('../db/db.php');
		$query = "SELECT * FROM `users_nbd` WHERE `username`='$user_name'";
	    $query = mysqli_query($con, $query) or die(mysqli_error($con));
	    $count_rows = mysqli_num_rows($query);
		if($count_rows == 1){
	          while($row = $query->fetch_assoc()) {
				  $fname = $row['fname'];
		return $fname;
			  }
		} 
	}
	
	function get_user_lname($user_name){
		require('../db/db.php');
		$query = "SELECT * FROM `users_nbd` WHERE `username`='$user_name'";
	    $query = mysqli_query($con, $query) or die(mysqli_error($con));
	    $count_rows = mysqli_num_rows($query);
		if($count_rows == 1){
	          while($row = $query->fetch_assoc()) {
				  $lname = $row['lname'];
		return $lname;
			  }
		} 
	}

    function get_low_priority_count(){ 
	 require('db/db.php');	
     $query = "SELECT * FROM `project_nbd` WHERE `priority`='low'";
	 $query_low = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_low = mysqli_num_rows($query_low);
	 return $query_low;
	}	
    function get_medium_priority_count(){  
			require('db/db.php');
		 $query = "SELECT * FROM `project_nbd` WHERE `priority`='medium'";
	 $query_medium = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_medium = mysqli_num_rows($query_medium);
	 return $query_medium;	 	
	}
	
	function get_high_priority_count(){
			require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `priority`='high'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
	}
	
	function userlist_for_barchart(){
	   require('db/db.php');
	   $query = "SELECT * FROM `users_nbd`";
	   $query = mysqli_query($con, $query) or die(mysqli_error($con));
	   while($row = $query->fetch_assoc()) {
	      $fname = $row['fname'];
		  $fname = json_encode($fname);
		   return $fname;
	   }
	
	
	}
	
	
	
	

function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

    function get_ip() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}

date_default_timezone_set('Asia/Calcutta');

// Then call the date functions
$date = date('Y-m-d');
  
  
  //functions for new category chart
  function get_switchgear_count(){
     require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Switchgear'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
	}
  
  
  function get_personal_healthcare_count(){
	  
	   require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Personal Health Care'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
	  
	  
  }
  
  
  function get_wire_cable_count(){
	    require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Wires & Cables'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
	  
	  
  }
  
    
  function get_appliances_count(){
	 require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Appliances'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
	  
	  
  }
  
  function get_vital_health_care_count(){
	  require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Vital Health Care'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;  
  }
  
  function get_online_ups_count(){
	  
	 require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Online UPS'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;  
	  
  }
  
  function get_offline_ups_count(){
	  require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Offline UPS'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
	  
	  
  }
  
  function get_accessories_count(){
      require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Accessories'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high;
         
  }
  
  
  function get_solar_count(){
	  require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND cat_two='Solar'";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high; 
  }
  
  
  function get_sub_cat_data($type, $cat_two){
	  
	   require('db/db.php');
     $query = "SELECT * FROM `project_nbd` WHERE `del`='0' AND (`done`='2' OR `done`='0') AND (`category`='$type' AND `cat_two`='$cat_two')";
	 $query_high = mysqli_query($con, $query) or die(mysqli_error($con));
	 $query_high = mysqli_num_rows($query_high);	
	 return $query_high; 
	  
	  
  }
  
  
  

?> 