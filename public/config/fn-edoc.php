<?php

function GetTabSubMenu($id)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM admin_submenu WHERE menu_id = $id");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetEDocSubmenu($id,$y)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM edoc_detail WHERE submenu_id = $id and years = $y");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetEDocThird($id,$y)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM edoc_detail WHERE third_id = $id and years = $y");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetCountThird($id)
{
	global $conn;
	$stmt = $conn->prepare ("SELECT count(third_id) as counts FROM admin_menu_third WHERE submenu_id=$id");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$count_row = $row['counts'];
	return (int)$count_row;
	$stmt->closeCursor();	
}

function GetTabThirdMenu($id)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM admin_menu_third WHERE submenu_id = $id GROUP BY sort_id ASC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}


function GetGroupByYearSubMenu($id)
{
	global $conn;
	$content = array();
	$stmt = $conn->prepare ("SELECT id, years,menu_id,submenu_id,third_id FROM edoc_detail WHERE submenu_id=$id GROUP BY years ORDER BY years DESC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetGroupByYearThirdMenu($id)
{
	global $conn;
	$content = array();
	$stmt = $conn->prepare ("SELECT id, years,menu_id,submenu_id,third_id FROM edoc_detail WHERE third_id=$id GROUP BY years ORDER BY years DESC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}


/* --- -----------------------------------------------*/

function GetTabSidebar_Third($id)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM sidebar_third WHERE sb2_id = $id");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetCountSidebar_Four($id)
{
	global $conn;
	$stmt = $conn->prepare ("SELECT count(sb4_id) as counts FROM sidebar_four WHERE sb3_id=$id");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$count_row = $row['counts'];
	return (int)$count_row;
	$stmt->closeCursor();	
}



function GetTabSidebar_Four($id)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM sidebar_four WHERE sb3_id = $id");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetGroupByYearSb3($id)
{
	global $conn;
	$content = array();
	$stmt = $conn->prepare ("SELECT id, years,sb3_id FROM edoc_detail_2019 WHERE sb3_id=$id GROUP BY years ORDER BY years DESC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetEDocSb3($id,$y)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM edoc_detail_2019 WHERE sb3_id = $id and years = $y");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetGroupByYearSb4($id)
{
	global $conn;
	$content = array();
	$stmt = $conn->prepare ("SELECT years FROM edoc_detail_2019 WHERE sb4_id=$id GROUP BY years ORDER BY years DESC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}

function GetEDocFour($id,$y)
{
	global $conn;
	$content = array();
	
	$stmt = $conn->prepare ("SELECT * FROM edoc_detail_2019 WHERE sb4_id = $id and years = $y");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
                $content[]=$row;
			}
	$stmt->closeCursor();		
	return $content;
}
?>