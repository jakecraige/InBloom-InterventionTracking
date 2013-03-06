<?php 
session_start();
include 'header.php';

// function lastNameSortAsc($a, $b)
// {
// 	if ($a->name->lastSurname < $b->name->lastSurname) {
// 		return -1;
// 	} else if ($a->name->lastSurname > $b->name->lastSurname) {
// 		return 1;
// 	} else {
// 		return 0;
// 	}
// 	// $aLast = $a->name->lastSurname;
// 	// $bLast = $b->name->lastSurname;

// 	// return strcasecmp($aLast, $bLast);
// }

$students = $api->execute(sprintf('sections/%s/studentSectionAssociations/students', $_GET['sectionId']));
// $studentsSorted = array();

// echo print_r($_SESSION);

// if($_SESSION['sort'] == 'asc' || $_SESSION['sort'] == null)
// {
// 	echo "In the sort asc";
// 	$studentsSorted = usort($students, 'lastNameSortAsc');	
// }
// else
// {
// 	echo "In the else";
// 	$studentsSorted = usort($students, 'lastNameSortAsc');	
// }
?>
<div class="container-fluid" style="margin-top: 5%;">
  <div class="row-fluid">
    <?php include 'sidebar.php'; ?>
    <div class="span9">
    	<div class="row">
    		<div clss="span12">
<!--     			<ul class="nav pull-left" class="inline">
    				<li><i class="icon-sort-up icon-large"><a href="#">A-Z</a></i></li>
    				<li><i class="icon-sort-down icon-large"><a href="#">Z-A</a></i></li>
    			</ul>
    			<ul class="nav pull-right" class="inline">
    				<li><i class="icon-ok icon-large"></i><a href="#">Present</a></li>
    				<li><i class="icon-exclamation-sign icon-large"></i><a href="#">Absent</a></li>
			    </ul> -->
			    <div class="dropdown pull-right">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance Settings <i class="icon-cog"></i></a>
				  <ul class="dropdown-menu nav nav-list" role="menu" aria-labelledby="dLabel">
				  	<li class="nav-header">Sort</li>
				    <li><a tabindex="-1" href="#">A - Z </a></li>
				    <li><a tabindex="-1" href="#">Z - A </a></li>
				    <li class="divider"></li>
				    <li class="nav-header">Presets</li>
				    <li><a tabindex="-1" href="#">Present </a></li>
				    <li><a tabindex="-1" href="#">Absent </a></li>
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

				print sprintf('<div id="%s" class="student span2 well well-small here">', $student->id);
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