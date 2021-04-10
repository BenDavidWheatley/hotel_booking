<? session_start();?>

  <header>    
    <?php include('header.php') ?>
  </header>
  <br><br><br><br><br>
<?php
  if (isset($_POST["transHotel"])){
  ?> <p>This si a trans test</p> <?php
} else if (isset($_POST["gorgorothHotel"])){
    ?> <p>This si a gor test</p> <?php
}
?>
<br><br><br><br><br><br><br><br>
  <footer>
    <?php include("footer.php") ?>
  </footer>