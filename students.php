<?php
session_start();


$ch = curl_init();

$url = sprintf('https://api.sandbox.inbloom.org/api/rest/v1.1/sections/%s/studentSectionAssociations/students', $_GET['sectionId']);

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
curl_setopt($ch, CURLOPT_POST, FALSE);
curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

if (DISABLE_SSL_CHECKS == TRUE) {
// WARNING: this would prevent curl from detecting a 'man in the middle' attack
// See note in settings.php 
  curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
}


//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

$students = json_decode($result);
?>
<?php include 'header.php'; ?>
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