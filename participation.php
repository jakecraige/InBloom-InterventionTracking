<?php 
session_start();
include 'header.php';

$students = createStudentsArray($_GET['schoolId']);
?>
<div class="container-fluid" style="margin-top: 5%;">
  <div class="row-fluid">
    <?php include 'sidebar.php'; ?>
    <div class="span9">
		<?php
			$count = 0;
			foreach ($students as $student) 
			{
				if($count == 0)
				{
					print '<div class="row">';
				}

				$count++;

				print sprintf('<div id="%s" class="studentP span2 well well-small nuetral">', $student->getId());
				print '<img src="img/userp.png" style="width: 100%; text-align: center;">';
				print sprintf('<p id="%s" style="text-align: center; font-size: 12px;">%s %s', $_GET['schoolId'], $student->getFirstName(), $student->getLastSurname());		
				print '</p>';
				print '<button class="down btn btn-small pull-left"><i class="icon icon-minus"></i></button>';
				print '<button class="up btn btn-small pull-right"><i class="icon icon-plus"></i></button>';
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