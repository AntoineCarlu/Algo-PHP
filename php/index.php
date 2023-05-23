<?php
session_start();
$table = $_SESSION['table'];
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<?php include "./includes/head.inc.html"; ?> <!--Head-->
<body>
  <div class="container-xlg">
    <!--HEADER-->
    <div class="col-md-12">
      <?php include "./includes/header.inc.html"; ?>
    </div> 

    <div class="row justify-content-center mt-5">
      <!--Nav Bar-->
      <nav class="col-md-2">
        <ul class="list-group row">
          <il><a href="index.php"><button type="button" class="btn btn-outline-secondary">HOME</button></a></il>
        <?php if (!empty($_SESSION)) {
          include "./includes/ul.inc.php";
        }
        ?>
        </ul>
      </nav>
      <!--SECTION-->
      <div class="col-md-10">
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
          echo "<h2 class='text-center mb-5'>Débogage</h2>";
          echo "<h3 class='fs-5'>===> Lecture du tableau à l'aide de la fonction print_r()</h3>";
          echo "<pre>";
          print_r($table);
          echo "</pre>";
        }
        //"index.php?concatenation" page
        else if (isset($_GET['concatenation'])) {
          echo "<h2 class='text-center mb-5'>Concaténation</h2>";
          echo "<h3 class='fs-5 mt-5'>===> Construction d'une phrase avec le contenu du tableau</h3>";
          echo "<p>". (($table['civility'] == 'man') ? "Mr ":"Mme "). $table['first-name']." ". $table['last-name']. "<br>
            J'ai ". $table['age']. " ans et je mesure ". $table['size']. "m</p>";
          echo "<h3 class='fs-5 mt-5'>===> Construction d'une phrase après MAJ du tableau</h3>";
          echo "<p>". (($table['civility'] == 'man') ? "Mr ":"Mme "). ucfirst($table['first-name'])." ". strtoupper($table['last-name']). "<br>
            J'ai ". $table['age']. " ans et je mesure ". $table['size']. "m</p>";
          echo "<h3 class='fs-5 mt-5'>===> Affichage d'une virgule à la place du point pour la taille</h3>";
          echo "<p>". (($table['civility'] == 'man') ? "Mr ":"Mme "). ucfirst($table['first-name'])." ". strtoupper($table['last-name']). "<br>
            J'ai ". $table['age']. " ans et je mesure ". str_replace('.', ',', $table['size']). "m</p>";
        }
        else if (isset($_GET['loop'])) {
          foreach ($table as $key => $value) {
            echo "à la ligne n°". ($key + 1). " correspond la clé \"$key\" et contient \"$value\"";
          }
        }
        //Default page
        else {
          echo "<a href='index.php?add'><button type='button' class='btn btn-primary'>Ajouter des données</button></a>";
          echo "<a href='index.php?addmore'><button type='button' class='btn btn-secondary'>Ajouter plus de données</button></a>";
        }
      ?>
      </div>
    </div>

    <!--FOOTER-->
    <div class="mt-5">
      <?php include "./includes/footer.inc.html"; ?>
    </div>
  </div>
</body>
</html>