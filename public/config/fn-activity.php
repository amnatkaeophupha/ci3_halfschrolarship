<?php

function GetActivitySite($limit) {	
	
	global $conn;
	$content = array();

	$site_id = SITE_ID;
	
	$stmt = $conn->prepare ("SELECT * FROM activity WHERE active = 1 AND cfg_site_id=$site_id ORDER BY dates DESC LIMIT $limit");
	$stmt->execute();		
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;		
}

function GetActivityPostedBy($user_id) {	
	
	global $conn;
	
	$stmt = $conn->prepare ("SELECT name FROM users WHERE user_id='$user_id'");
	$stmt->execute();		
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();		
	return $row;		
}

function GetActivityPagination($start_record,$limit){
	
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM activity WHERE active = 1 AND cfg_site_id =".SITE_ID." ORDER BY dates DESC LIMIT $start_record , $limit");
	$stmt->execute();	
	
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
          $content[]=$row;
		}
	
	   $stmt->closeCursor();		
	return $content;		
	
}

function GetCountTotalActivitySite(){
	
	global $conn;
	
	$total = $conn->query("SELECT count(1) FROM activity WHERE active = 1 AND cfg_site_id =".SITE_ID)->fetchColumn(); 
	return $total;	
}

function GetActivityAcId($id) 
{	
	global $conn;
	
	$stmt = $conn->prepare ("SELECT * FROM activity WHERE active = 1 AND ac_id='$id'");
	$stmt->execute();		
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();		
	return $row;		
}

function GetActiveGalleryAcId($id) {
    global $conn;
    $content=array();
    
    $stmt = $conn->prepare ("SELECT * FROM activity_gallery WHERE ac_id = '$id'");
	$stmt->execute();		
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
    $content[]=$row;
    }
    $stmt->closeCursor();		
	return $content;
}


function GetActivitySubDepartment($cfg_subsite_id,$limit) {	
	
	global $conn;
	$content = array();

	$site_id = SITE_ID;
	
	$stmt = $conn->prepare ("SELECT * FROM activity WHERE subactive = 1 AND cfg_site_id = $site_id and cfg_subsite_id = $cfg_subsite_id ORDER BY dates DESC LIMIT $limit");
	$stmt->execute();		
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;		
}
?>