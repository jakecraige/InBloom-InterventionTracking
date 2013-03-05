<?php
session_start();
include_once 'settings.php';
include_once 'api.php';

$api = new API(BASE_API, $_SESSION['access_token'], $_SESSION['code']);

$student = $api->execute(sprintf('students/%s', $_GET['id']));

print '<div class="student" style="background: #fff; height: 100%;">';
print '<img src="img/userp.png" class="pull-left" style="width: 45%;">';
print '<p class="pull-right">';
print $student->name->firstName;
print '</p>';
print '</div>'

?>