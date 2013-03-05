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

print "\t\t\t<div class='span3'>";
print "\t\t\t\t<ul class='sidebar-nav unstyled' style='position: fixed;>";

    foreach ($sections as $section) 
    {
      print "\t\t\t\t\t<div class='accordion-group'>\n";
      print "\t\t\t\t\t\t<div class='accordion-heading'>\n";
      print sprintf("\t\t\t\t\t\t\t<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion1'  href='#collapse%s'>\n",$section->id);
      print "\t\t\t\t\t\t\t\t" . $section->uniqueSectionCode . "\n";
      print "\t\t\t\t\t\t\t</a>\n";
      print "\t\t\t\t\t\t</div>\n";
      print sprintf("\t\t\t\t\t\t<div id='collapse%s' class='accordion-body collapse'>\n",$section->id);
      print "\t\t\t\t\t\t\t<div class='accordion-inner'>\n";
      print "\t\t\t\t\t\t\t\t<ul class='unstyled'>\n";
      print sprintf("\t\t\t\t\t\t\t\t\t<li><a href='students.php?sectionId=%s'><i class='icon-th'></i>Students</a></li>\n",$section->id);
      print "\t\t\t\t\t\t\t\t\t<li><a href='#'><i class='icon-book'></i>Grades </a><span class='label label-important'>NYI</span></li>\n";
      print "\t\t\t\t\t\t\t\t\t<li><a href='#''><i class='icon-user'></i> Attendance</a></li>\n";
      print "\t\t\t\t\t\t\t\t\t<li><a href='#''><i class='icon-check'></i> Participation</a></li>\n";
      print "\t\t\t\t\t\t\t\t</ul>\n";
      print "\t\t\t\t\t\t\t\t</div>\n";
      print "\t\t\t\t\t\t</div>\n";
      print "\t\t\t\t\t</div>\n";  
    }

print "\t\t\t\t</ul>";
print "\t\t\t</div>";
?>