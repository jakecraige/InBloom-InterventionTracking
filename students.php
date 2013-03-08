<?php 
session_start();
    require('includes.php');
	include 'header.php';

    $students = createStudentsArray(); 
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

				print '<div class="student span4 well well-small">';
				print '<img src="img/userp.png" style="width: 100%; text-align: center;">';
				print sprintf('<p style="text-align: center; text-size: 20px;"><abbr title="Click to view more"><a href="student.php?id=%s" style="color: #000; 
                                    text-decorations: none;" rel="shadowbox;width=800px"> %s %s %s</a></abbr><br>'
                                    ,$student->getId(), $student->getFirstName(), $student->getMiddleName(), $student->getLastSurname());
				print sprintf('<a href="http://inbloom.hunterskrasek.com/educationupdates.php?studentId=%s" rel="shadowbox;width=1000px" class="btn btn-small btn-block">Live Feed</a>', $student->getId());				
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