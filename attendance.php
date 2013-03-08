<?php 
	include 'header.php';

	$students = createStudentsArray();
?>
<div class="container-fluid" style="margin-top: 5%;">
  <div class="row-fluid">
    <?php include 'sidebar.php'; ?>
    <div class="span9">
    	<div class="row">
    		<div clss="span12">
			    <div class="dropdown pull-right">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance Settings <i class="icon-cog"></i></a>
				  <ul class="dropdown-menu nav nav-list" role="menu" aria-labelledby="dLabel">
				  	<li class="nav-header">Sort</li>
				    <li><a tabindex="-1" href="#">A - Z </a></li>
				    <li><a tabindex="-1" href="#">Z - A </a></li>
				    <li class="divider"></li>
				    <li class="nav-header">Presets</li>
				    <li><a tabindex="-1" href="#" onclick="markAllPresent()">Present </a></li>
				    <li><a tabindex="-1" href="#" id="absent" onclick="markAllAbsent()">Absent </a></li>
				  </ul>
				</div>
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

				print sprintf('<div id="%s" class="student span2 well well-small here">', $student->getId());
				print '<img src="img/userp.png" style="width: 100%; text-align: center;">';
				print sprintf('<p id="%s" style="text-align: center; font-size: 12px;">%s %s', $_GET['schoolId'], $student->getFirstName, $student->getLastSurname());				
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