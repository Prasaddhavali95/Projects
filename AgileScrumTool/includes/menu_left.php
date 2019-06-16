<!-- Contenedor -->
<ul id="accordion" class="accordion">
  <li>
    <div class="link">Project</div>
    <ul class="submenu">
      <li><a href="projectnew.php">New</a></li>
      <li><a href="projectlist.php">List</a></li>
    </ul>
  </li>
  <li>
    <div class="link"><i class="fa fa-code"></i>Story<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="storynew.php">New</a></li>
      <li><a href="storylist.php">List</a></li>
    </ul>
  </li>
  <li>
    <div class="link"><i class="fa fa-mobile"></i>Iteration<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="iterationnew.php">New</a></li>
      <li><a href="iterationlist.php">List</a></li>
    </ul>
  </li>
  <?php if($_SESSION['type'] == "main") { ?>
	  <li>
	    <div class="link"><i class="fa fa-globe"></i>Team<i class="fa fa-chevron-down"></i></div>
	    <ul class="submenu">
	     <li><a href="teamnew.php">New</a></li>
	      <li><a href="teamlist.php">List</a></li>
	    </ul>
	  </li>
  <?php } ?>
</ul>