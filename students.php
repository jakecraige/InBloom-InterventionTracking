<?php 
session_start();
	include 'header.php';

	$students = $api->execute(sprintf('sections/%s/studentSectionAssociations/students', $_GET['sectionId']));
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

				print '<div class="span4 well well-small">';
				print '<img src="http://placehold.it/80" style="width: 100%; text-align: center;">';
				print sprintf('<p style="text-align: center;"><strong>Name:</strong> %s %s %s <small>%s</small><br>',$student->name->firstName, $student->name->middleName, $student->name->lastSurname, $student->name->generationCodeSuffix);
				print '<a href="http://inbloom.hunterskrasek.com/educationupdates.html" rel="shadowbox;width=600px" class="btn btn-small">Live Feed</a>';
				print '</p>';
				print '</div>';

				if($count == 3)
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