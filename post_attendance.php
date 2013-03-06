<?php
session_start();
include_once 'settings.php';
include_once 'api.php';

$api = new API(BASE_API, $_SESSION['access_token'], $_SESSION['code']);
// echo $_SESSION['access_token'];

$studentId = $_POST['studentId'];
$schoolId = $_POST['schoolId'];
$attendance = $_POST['event'];
$today = date('Y-m-d');
$data = array(
	"studentId" => $studentId,
	"schoolId" => $schoolId,
	"entityType" => 'attendance',
	"schoolYearAttendance" => array(
		"schoolYear" => '2012-2013',
    	"attendanceEvent" => array(
      		"date" => $today,
      		"event" => $attendance
      		)
		)
);
$usePut = FALSE;
$usePush = FALSE;
$oldData = $api->execute(sprintf('students/%s/custom',$studentId));
// print_r($oldData);
if (sizeof($oldData) > 0 && strcmp($oldData->schoolYearAttendance->attendanceEvent->date, $today) == 0)
{
	$usePut = TRUE;
}
else
{
	$usePush = TRUE;
}

$post = $api->execute(sprintf('students/%s/custom',$studentId), $usePush, $usePut, $data);

$newData = $api->execute(sprintf('students/%s/custom',$studentId));
// echo "old data";
// echo print_r($oldData);
// echo "new";
// echo print_r($newData);
?>