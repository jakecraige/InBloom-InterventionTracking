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
        print '<ul class="unstyled">';
        print sprintf('<li><a href="students.php?sectionId=%s"><i class="icon-th"></i>Students</a></li>',$section->id);
        print '<li><a href="#"><i class="icon-book"></i>Grades </a><span class="label label-important">NYI</span></li>';
        print '<li><a href="#"><i class="icon-user"></i>Attendance </a><span class="label label-important">NYI</span></li>';
        print '<li><a href="#"><i class="icon-check"></i>Participation </a><span class="label label-important">NYI</span></li>';
        print '</ul>';
        print '</div>';
        print '</div>';
        print '</div>';  
      }
    ?>
  </ul>
</div>