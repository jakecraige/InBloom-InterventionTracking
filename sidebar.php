<?php
session_start();

//open connection
$ch = curl_init();

$url = 'https://api.sandbox.inbloom.org/api/rest/v1.1/home';
//$url = 'https://api.sandbox.slcedu.org/api/rest/system/session/check';

$token = $_SESSION['access_token'];
$code = $_SESSION['code'];

$auth = sprintf('Authorization: bearer %s', $token);
//echo $auth;

$headers = array(
  'Content-Type: application/vnd.slc+json',
  'Accept: application/vnd.slc+json',
  $auth);

curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

if (DISABLE_SSL_CHECKS == TRUE) {
// WARNING: this would prevent curl from detecting a 'man in the middle' attack
// See note in settings.php 
  curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
}

//execute post
$result = curl_exec($ch);
// echo $result;
$home = json_decode($result);

curl_close($ch);

$links = $home->links;
$sectionsURL = '';

foreach($links as $link) 
{
  if ($link->rel == 'getSections') {
    $sectionsURL = $link->href;
    break;
  }
}

$ch = curl_init();

$token = $_SESSION['access_token'];
$code = $_SESSION['code'];

$auth = sprintf('Authorization: bearer %s', $token);
//echo $auth;

$headers = array(
  'Content-Type: application/vnd.slc+json',
  'Accept: application/vnd.slc+json',
  $auth);

curl_setopt($ch, CURLOPT_URL, $sectionsURL); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

if (DISABLE_SSL_CHECKS == TRUE) {
// WARNING: this would prevent curl from detecting a 'man in the middle' attack
// See note in settings.php 
  curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
}

//execute post
$result = curl_exec($ch);
// echo $result;
$sections = json_decode($result);

curl_close($ch);
?>

<div class="span3">
  <ul class="sidebar-nav sidebar-nav-fixed unstyled">
    <?php
      foreach ($sections as $section) 
      {
        print '<div class="accordion-group">';
        print '<div class="accordion-heading">';
        print sprintf('<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"  href="#collapse%s">',$section->id);
        print $section->uniqueSectionCode;
        print '</a>';
        print '</div>';
        print sprintf('<div id="collapse%s" class="accordion-body collapse">',$section->id);
        print '<div class="accordion-inner">';
        print sprintf('<li><a href="students.php?sectionId=%s">Students</a></li>',$section->id);
        print '<li><a href="#">Grades</a><span class="label label-important">NYI</span></li>';
        print '<li><a href="#">Compare</a><span class="label label-important">NYI</span></li>';
        print '<li><a href="#">Graded Assignments</a><span class="label label-important">NYI</span></li>';
        print '</div>';
        print '</div>';
        print '</div>';  
      }
    ?>
  </ul>
</div>