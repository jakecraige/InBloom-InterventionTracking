<?php 
session_start();
	include 'header.php';

	$students = $api->execute(sprintf('sections/%s/studentSectionAssociations/students', $_GET['sectionId']));
?>
<div class="container-fluid" style="margin-top: 5%;">
  <div class="row-fluid">
    <?php include 'sidebar.php'; ?>
    <div class="span9">
    	<div class="row">
    		<div clss="span12">
    			<ul class="nav pull-left" id="attendanceSort">
    				<li><i class="icon-sort-up icon-large"><a href="#">A-Z</a></i></li>
    				<li><i class="icon-sort-down icon-large"><a href="#">Z-A</a></i></li>
    			</ul>
    			<ul class="nav pull-right" id="attendanceSettings">
    				<li><i class="icon-ok icon-large"></i><a href="#">Present</a></li>
    				<li><i class="icon-exclamation-sign icon-large"></i><a href="#">Absent</a></li>
			    </ul>
    		</div>
    	</div>
		<?php
			$count = 0;
			foreach ($students as $student) 
			{
				if($count == 0)
				{
					print '<div class="row">';
				}

				$count++;

				print '<div class="span2 well well-small">';
				print '<img src="img/userp.png" style="width: 100%; text-align: center;">';
				print sprintf('<p style="text-align: center; font-size: 12px;">%s %s', $student->name->firstName, $student->name->lastSurname);				
				print '</p>';
				print '</div>';

				if($count == 6)
				{
					print '</div>';
					$count = 0;
				}
			}

			if($count != 0)
			{
				print '</div>';
			}
		?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>