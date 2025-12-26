<?php
function GetContentSite($limit) {	
	
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM content WHERE active = 1 AND cfg_site_id =".SITE_ID." ORDER BY date_added DESC LIMIT $limit");
	$stmt->execute();		
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;		
}

function GetTableContentTypeId($id)
{
	global $conn;
	$stmt = $conn->prepare ("SELECT * FROM content_type WHERE active = 1 and cfg_site_id = ".SITE_ID." and ctid = $id");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$item = $row['ctname'];
	return $item;
	$stmt->closeCursor();	
}

function GetCountTypeContentAll()
{
	global $conn;
	$stmt = $conn->prepare ("SELECT count(ctid) as counts FROM content_type WHERE active = 1 and cfg_site_id = ".SITE_ID);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$count_row = $row['counts'];
	return (int)$count_row;
	$stmt->closeCursor();	
}

function GetJoinTableActiveContent()
{
	global $conn;
	$sql = "SELECT
				content_type.ctid AS ctid,
				content_type.active AS active_ctid,
				content.cid AS cid,
				content.active AS active_cid,
				content_type.cfg_site_id AS cfg_site_id 
			FROM
				( content_type JOIN content ) 
			WHERE
				( content_type.ctid = content.ctid ) 
				AND content_type.active = 1 
				AND content.active = 1 
				AND content.cfg_site_id = ".SITE_ID." 
			ORDER BY
				cid DESC";
	$stmt = $conn->prepare ($sql);

	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$active_ctid = $row['ctid'];
	return (int)$active_ctid;
	$stmt->closeCursor();	
}

function GetTableTypeContentAll() 
{	
	global $conn;
	$Items = array();
	
	$stmt = $conn->prepare ("SELECT * FROM content_type WHERE active = 1 and cfg_site_id = ".SITE_ID." ORDER BY ctposition ASC");
	
	$stmt->execute();		

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $Items[]=$row;

			}
	   $stmt->closeCursor();
	   		
	return $Items;		
}


function GetTableContentId($get_ctid,$limit) 
{	
	global $conn;
	$LatestContentSiteIdArray = array();
			
	if($cfg_site_id=='all') $site_condition = "";
	else $site_condition = "AND cfg_site_id = ".SITE_ID." and ctid = '$get_ctid'";
	
	$stmt_content = $conn->prepare ("SELECT * FROM content WHERE active = 1 $site_condition ORDER BY date_added DESC LIMIT $limit");
	
	$stmt_content->execute();
	
	while ($row = $stmt_content->fetch(PDO::FETCH_ASSOC))
		{
          $LatestContentSiteIdArray[]=$row;
		}
	
	   $stmt_content->closeCursor();		
	return $LatestContentSiteIdArray;		
}


function GetTableContentPagination($get_ctid,$start_record,$perpage) 
{	
	
	global $conn;
	$LatestContentSiteIdArray = array();
			
	if($cfg_site_id=='all') $site_condition = "";
	else $site_condition = "AND cfg_site_id =".SITE_ID."  and ctid = '$get_ctid'";
	
	$stmt_content = $conn->prepare ("SELECT * FROM content WHERE active = 1 $site_condition ORDER BY cid DESC LIMIT $start_record , $perpage");
	
	$stmt_content->execute();
	
	while ($row = $stmt_content->fetch(PDO::FETCH_ASSOC))
		{
          $LatestContentSiteIdArray[]=$row;
		}
	
	   $stmt_content->closeCursor();		
	return $LatestContentSiteIdArray;		
}



?>