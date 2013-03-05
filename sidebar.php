<?php

$home = $api->execute('home');
$links = $home->links;

$sectionsURL = '';

foreach($links as $link) 
{
  if ($link->rel == 'getSections') {
    $sectionsURL = $link->href;
    break;
  }
}

$sectionsURL = explode(BASE_API, $sectionsURL);
$sectionsURL = substr($sectionsURL[1], 1);

$sections = $api->execute($sectionsURL);

?>
<div class="span3">
  <ul class="sidebar-nav unstyled" style="position: fixed;">
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
        print '<li><a href="#">Grades </a><span class="label label-important">NYI</span></li>';
        print '<li><a href="#">Compare </a><span class="label label-important">NYI</span></li>';
        print '<li><a href="#">Graded Assignments </a><span class="label label-important">NYI</span></li>';
        print '</div>';
        print '</div>';
        print '</div>';  
      }
    ?>
  </ul>
</div>