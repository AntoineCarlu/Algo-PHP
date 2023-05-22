<?php
session_start();
$table = $_SESSION['table'];
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<?php include "./includes/head.inc.html"; ?> <!--Head-->
<body>
  <!--HEADER-->
  <?php include "./includes/header.inc.html"; ?> 

  <div class="row">
    <!--Nav Bar-->
    <nav>
      <ul>
        <il><a href="index.php"><button type="button" class="btn btn-outline-secondary">HOME</button></a></il>
      <?php if (!empty($_SESSION)) {
        include "./includes/ul.inc.php";
      }
      ?>
      </ul>
    </nav>
    <!--SECTION-->
    <?php 
      //Include form when on page ?add
      if (isset($_GET['add'])) {
        include "./includes/form.inc.html";
      }
      //Define variable "table" when submit form
      else if (isset($_POST['submitForm'])) {
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $age = $_POST['age'];
        $size = $_POST['size'];
        $civility = $_POST['civility'];

        $table = array(
          'first-name' => $firstName,
          'last-name' => $lastName,
          'age' => $age,
          'size' => $size,
          'civility' => $civility,
        );
        $_SESSION['table'] = $table;
          //Alert that the data is defined
          echo "<p>Données sauvergardées</p>";
      }
      //"index.php?debugging" page
      else if (isset($_GET['debugging'])) {
        echo "<p>===> Lecture du tableau à l'aide de la fonction print_r()</p>";
        echo "<pre>";
        print_r($table);
        echo "</pre>";
      }
      //Default page
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