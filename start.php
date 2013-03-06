<?php 
session_start();
include 'header.php'; 
?>
<div class="container-fluid" style="margin-top: 5%;">
  <div class="row-fluid">
    <?php include 'sidebar.php'; ?>
    <div class="span9">
		<div class="hero-unit">
			<?php
				$current_time = date(G); 
				// echo $current_time;
				$timeOfDay = "";
				if ($current_time >= 0 && $current_time <= 12) 
				{
					$timeOfDay = "Good Morning, ";
				}
				else if($current_time >= 12 && $current_time <= 17)
				{
					$timeOfDay = "Good Afternoon, ";
				}
				else if($current_time >= 17 && $current_time <= 23)
				{
					$timeOfDay = "Good Evening, ";
				}
				else
				{
					$timeOfDay = "Welcome Back, ";
				}
			?>
	        <h1><?php print $timeOfDay . $json->full_name?></h1>
	        <p>Preventing failure through communication.</p>
      	</div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>