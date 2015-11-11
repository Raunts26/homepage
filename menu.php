<ul class="nav navbar-nav">
<?php if($page_file != "home.php") { ?>
<li><a href="home.php">Avaleht</a></li>
<?php } else { ?>
<li class="active"><a href="home.php">Avaleht</a></li>
<?php } ?>

<?php if($page_file != "jobs.php") { ?>
<li><a href="jobs.php">Tööpakkumised</a></li>
<?php } else { ?>
<li class="active"><a href="jobs.php">Tööpakkumised</a></li>
<?php } ?>

<?php if($page_file != "data.php") { ?>
<li><a href="data.php">Lisa uus</a></li>
<?php } else { ?>
<li class="active"><a href="data.php">Lisa uus</a></li>
<?php } ?>

<?php if($page_file != "joblaw.php") { ?>
<li><a href="joblaw.php">Tööõigusseadused</a></li>
<?php } else { ?>
<li class="active"><a href="joblaw.php">Tööõigusseadused</a></li>
<?php } ?>

<?php if($page_file != "about.php") { ?>
<li><a href="about.php">Meist</a></li>
<?php } else { ?>
<li class="active"><a href="about.php">Meist</a></li>
<?php } ?>

<?php if($page_file != "contact.php") { ?>
<li><a href="contact.php">Kontakt</a></li>
<?php } else { ?>
<li class="active"><a href="contact.php">Kontakt</a></li>
<?php } ?>
</ul>