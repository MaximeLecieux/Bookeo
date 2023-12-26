<?php
require_once _ROOTPATH_.'\templates\header.php';
?>

<h1><?=$book->getTitle();?></h1>
<p><?=$book->getDescription();?></p>


<?php
require_once _ROOTPATH_.'\templates\footer.php';
?>

