<?php
    $sections = createClassesArray();   
?>
<div class="span3">
  <ul class="sidebar-nav unstyled" style="position: fixed;">
    <?php
        foreach($sections as $section) {
            print '<div class="accordion-group">';
            print '<div class="accordion-heading">';
            print sprintf('<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"  href="#collapse%s">', $section->getId());
            print $section->getTitle();
    
            print '</a>';
            print '</div>';
            print sprintf('<div id="collapse%s" class="accordion-body collapse">',$section->getId());
            print '<div class="accordion-inner">';
            print '<ul class="unstyled">';
            print sprintf('<li><a href="students.php?sectionId=%s&schoolId=%s"><i class="icon-th"></i>Students</a></li>', $section->getId(), $section->getSchoolId());
            // print '<li><a href="#"><i class="icon-book"></i>Grades </a><span class="label label-important">NYI</span></li>';
            print sprintf('<li><a href="attendance.php?sectionId=%s&schoolId=%s"><i class="icon-user"></i>Attendance </a></li>',$section->getId(), $section->getSchoolId());// $section->id, $section->schoolId);
            print sprintf('<li><a href="participation.php?sectionId=%s&schoolId=%s"><i class="icon-check"></i>Participation </a></li>',$section->getId(), $section->getSchoolId());//$section->id, $section->schoolId);
            print '</ul>';
            print '</div>';
            print '</div>';
            print '</div>';
        }
		print '<div class="accordion-group">';
            print '<div class="accordion-heading">';
            print sprintf('<a class="accordion-toggle" data-parent="#accordion1"  href="#">', $section->getId());
            print 'Add Class';
    
            print '</a>';
            print '</div>';
			print '</div>';
			
    ?>
  </ul>
</div>