<?php
	include_once 'includes.php';

	$studentId = $_POST['studentId'];
	$schoolId = $_POST['schoolId'];
	$classId = $_POST['classId'];
	$event = $_POST['event'];
	/* Update attendance table with value here. 
		First need to check if there is already an attendance record for the student on this day and class/school
		if there is, update it, if not, create a new entry. Will need to update attendance file to pull current
		date attendance records as well */
	//echo "$studentId, $sectionId, $schoolId, $event";
	$record = new Attendance($studentId, $classId, $schoolId, $event);
	if($entry = $record->checkEntryExists()) {
		$record->updateAttendance($event, $entry);
	}
	else {
		$record->addAttendance();
	}

?>