<?php
session_start();
include_once 'settings.php';
include_once 'api.php';

$api = new API(BASE_API, $_SESSION['access_token'], $_SESSION['code']);

$student = $api->execute(sprintf('students/%s', $_GET['id']));

print '<html>';
print '<head>';
print sprintf('<title>Student - %s %s</title>', $student->name->firstName, $student->name->lastSurname);
print '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">';
print '<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>';
print '<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>';
print '</head>';
print '<body>';
print '<div class="row" style="padding-top: 2%;">';
print '<div class="span3 offset1 well well-small">';
print '<img src="img/userp.png">';
print '</div>';
print '<div class="span2">';
print '<p>';
print sprintf('<strong>Full Name:</strong> %s %s %s <small>%s</small>', $student->name->firstName, ($student->name->middleName != null ? $student->name->middleName : ''), $student->name->lastSurname, ($student->name->generationCodeSuffix != null ? $student->name->generationCodeSuffix : ''));
print '</p>';
print '</div>';
print '</div>';
print '</div>';
print '</body>';
print '</html>';

?>