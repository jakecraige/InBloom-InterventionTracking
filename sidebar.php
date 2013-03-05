<!-- <div class="span3">
 <ul class="sidebar-nav sidebar-nav-fixed unstyled">
   <li class="active"><a href="/">Home</a></li>
   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"  href="#collapseOne" >
       <i class="icon-chevron-right"></i>Students
     </a>
   </div>
   <div id="collapseOne" class="accordion-body collapse">
    <div class="accordion-inner">
      <li><a href="#comparestudents">Progress</a></li>
      <li><a href="#comparestudents">Grades</a></li>
      <li><a href="#comparestudents">Compare</a></li>
      <li><a href="#comparestudents">Graded Assignments</a></li>
    </div>
  </div>
</div>  
<div class="accordion-group">
  <div class="accordion-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion2"  href= "#collapseTwo" >
     <i class="icon-chevron-right"></i> Classroom Management
   </a>
 </div>
 <div id="collapseTwo" class="accordion-body collapse">
  <div class="accordion-inner">
    <li><a href="#Campaigns">Attendance</a></li>
    <li><a href="#Leads">Enter Grades</a></li>
    <li><a href="#Accounts">Discipline</a></li>
  </div>
</div>
</div>  
<div class="accordion-group">
  <div class="accordion-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion3"  href= "#collapseThree" >
      <i class="icon-chevron-right"></i>Communication
    </a>
  </div>
  <div id="collapseThree" class="accordion-body collapse">
    <div class="accordion-inner">
      <li><a href="#tasks">Comment on Assignments</a></li>
      <li><a href="#depttasks">History</a></li>
      <li><a href="#cotasks">Schedule a Conference</a></li>
    </div>
  </div>
</div>  
</div> 
</div> -->
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
        print '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"  href="#collapse'.$section->id.'">';
        print $section->uniqueSectionCode;
        print '</a>';
        print '</div>';
        print '<div id="collapse'.$section->id.'" class="accordion-body collapse">';
        print '<div class="accordion-inner">';
        print '<li><a href="#">Students</a></li>';
        print '<li><a href="#">Grades</a></li>';
        print '<li><a href="#">Compare</a></li>';
        print '<li><a href="#">Graded Assignments</a></li>';
        print '</div>';
        print '</div>';
        print '</div>';  
      }
    ?>
  </ul>
</div>