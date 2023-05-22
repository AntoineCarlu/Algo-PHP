<?php session_start() ?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<?php include "./includes/head.inc.html"; ?> <!--Head-->
<body>
  <!--HEADER-->
  <?php include "./includes/header.inc.html"; ?> 

  <div class="row">
    <!--Nav Bar-->
    <?php include "./includes/ul.inc.php"; ?> 
    <!--SECTION-->
    <?php 
      if (isset($_GET['add'])) {
        include "./includes/form.inc.html";
      }
      else if (!empty($_SESSION)) {
        echo "<p>Données sauvergardées</p>";
      }
      else {
        echo "<a href='index.php?add'><button type='button' class='btn btn-primary'>Ajouter des données</button></a>";
        echo "<a href='index.php?addmore'><button type='button' class='btn btn-secondary'>Ajouter plus de données</button></a>";
      }
    ?>
  </div>

  <!--FOOTER-->
  <?php include "./includes/footer.inc.html"; ?>
</body>
</html>