<?php
    require('settings.php');
	require('class.student.php');

	if($student = new Student(1)) {
		echo 'Created student<br>';
	}
	echo $student->getFirstName;
?>