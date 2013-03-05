<?php 
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
					echo '<div class="row">';
				}

				$count++;

				echo '<div class="span4 well well-small">';
				echo sprintf('<p><strong>Name:</strong> %s %s %s <small>%s</small><br>',$student->name->firstName, $student->name->middleName, $student->name->lastSurname, $student->name->generationCodeSuffix);
				echo sprintf('<strong>Address: </strong><address>%s</address>', $student->address);
				echo sprintf('<strong>Email: </strong><address>%s</address></p>', $student->electronicMail->emailAddress);
				echo '</div>';

				if($count == 3)
				{
					echo '</div>';
					$count = 0;
				}
			}

			if($count != 0)
			{
				echo '</div>';
			}
		?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>