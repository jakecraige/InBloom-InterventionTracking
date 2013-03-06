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
				print '<img src="img/userp.png" style="width: 100%; text-align: center;">';
				print sprintf('<p style="text-align: center; text-size: 20px;"><abbr title="Click to view more"><a href="student.php?id=%s" style="color: #000; text-decorations: none;" rel="shadowbox;width=800px"> %s %s %s <small>%s</small></a></abbr><br>',$student->id, $student->name->firstName, $student->name->middleName, $student->name->lastSurname, $student->name->generationCodeSuffix);
				print '<a href="http://inbloom.hunterskrasek.com/educationupdates.html" rel="shadowbox;" class="btn btn-small btn-block">Live Feed</a>';				
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