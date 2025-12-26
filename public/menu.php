<!-- Categories Links Starts -->
<h3 class="side-heading" style="font-family: 'Chakra Petch', sans-serif;">ข้อมูลทั่วไป</h3>
<div class="list-group">
    <a href="supply/?page=intro&subpage=chart" class="list-group-item">
        <i class="fa fa-chevron-right"></i>
        โครงสร้างองค์กร
    </a>
    <a href="?page=supply&subpage=staff" class="list-group-item">
        <i class="fa fa-chevron-right"></i>
        บุคลากร
    </a>
    <a href="../subdivition/?page=supply&subpage=activity" class="list-group-item">
        <i class="fa fa-chevron-right"></i>
        กิจกรรม
    </a>
</div>

<h3 class="side-heading" style="font-family: 'Chakra Petch', sans-serif;">สาระสำคัญ</h3>
<div class="list-group">
<?php
	$stmt_menu = $conn->query("SELECT * FROM sidebar_two WHERE sb1_id=4 and active is Null order by postition asc");
	$stmt_menu->execute();
	while ($row = $stmt_menu->fetch(PDO::FETCH_ASSOC))
	{
?>
    <a href="?page=supply&subpage=e_doc&id=<?=$row['sb2_id']?>" class="list-group-item">
        <i class="fa fa-chevron-right"></i>
        <?=$row['title']?>
    </a>
<?php
	}
	$stmt->closeCursor();
?>

</div>
<!-- Categories Links Ends -->
