<?php
session_start();
include_once 'settings.php';
include_once 'api.php';

$api = new API(BASE_API, $_SESSION['access_token'], $_SESSION['code']);

$student = $api->execute(sprintf('students/%s', $_GET['id']));

print '<div class="student">';
print '<img src="http://placehold.it/100" class="pull-left">';
print '<p class="pull-right">';
print $student->name->firstName;
print '</p>';
print '</div>'

?>