<?php
session_start();
if (!empty($_SESSION)) {$table = $_SESSION['table'];}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include "./includes/head.inc.html"; ?>

<body>
  <div class="container-xlg">
    <!--HEADER-->
    <div class="col-md-12">
      <?php include "./includes/header.inc.html"; ?>
    </div> 

    <!--Content-->
    <div class="row justify-content-center mt-5">
      <!--Nav Bar-->
      <nav class="col-md-2">
        <ul class="list-unstyled list-group mb-4">
          <a class="btn btn-outline-secondary" href="index.php">HOME</a>
        <?php if (!empty($_SESSION)) {
          include "./includes/ul.inc.php";
        }
        ?>
        </ul>
      </nav>
      <!--SECTION-->
      <section class="col-md-9">
        <?php 
          //Include form when on page ?add
          if (isset($_GET['add'])) {
            echo "<h2 class='text-center mb-3'>Ajouter des données</h2>";
            include "./includes/form.inc.html";
              echo "<!--Submit button--> <button type='submit' name='submitForm' class='btn btn-primary'>Enregistrer les données</button> </form>";
          }
          //Define variable "table" when submit form
          else if (isset($_POST['submitForm'])) {
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $age = $_POST['age'];
            $size = $_POST['size'];
            if (!empty($_POST['civility'])) {$civility = $_POST['civility'];} else {$civility = "";}
            

            if (empty($firstName&&$lastName&&$age&&$size&&$civility)) {
              echo "<p class='p-3 mb-2 bg-danger text-red text-center'>Veuillez remplir tout le formulaire</p>";
              echo "<a class='btn btn-primary' href='index.php?add'>Réessayer</a>";
            }
            else if (!empty($firstName&&$lastName&&$age&&$size&&$civility)) {
              $table = array(
                'first-name' => $firstName,
                'last-name' => $lastName,
                'age' => $age,
                'size' => $size,
                'civility' => $civility,
              );
              $_SESSION['table'] = $table;
                //Alert that the data is defined
                echo "<p class='p-3 mb-2 bg-success text-green text-center'>Données sauvergardées</p>";
            }
          }
          //Include second form when on page ?addmore
          else if (isset($_GET['addmore'])) {
            echo "<h2 class='text-center mb-3'>Ajouter plus de données</h2>";
            echo "<div class='row justify-content-center'>";
              echo "<div class='card col-md-7 mx-auto my-1 py-3'>";
                include "./includes/form.inc.html";
              echo "</div>";
              include "./includes/form2.inc.php";
                echo "<!--Submit button--> <button type='submit' name='submitForm2' class='btn btn-primary'>Enregistrer les données</button> </form>";
          }
          else if (isset($_POST['submitForm2'])) {
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $age = $_POST['age'];
            $size = $_POST['size'];
            if (!empty($_POST['civility'])) {$civility = $_POST['civility'];} else {$civility = "";}
            if (!empty($_POST['html'])) {$html = $_POST['html'];} else {$html = "";}
            if (!empty($_POST['css'])) {$css = $_POST['css'];} else {$css = "";}
            if (!empty($_POST['javascript'])) {$javascript = $_POST['javascript'];} else {$javascript = "";}
            if (!empty($_POST['php'])) {$php = $_POST['php'];} else {$php = "";}
            if (!empty($_POST['mysql'])) {$mysql = $_POST['mysql'];} else {$mysql = "";}
            if (!empty($_POST['bootstrap'])) {$bootstrap = $_POST['bootstrap'];} else {$bootstrap = "";}
            if (!empty($_POST['symfony'])) {$symfony = $_POST['symfony'];} else {$symfony = "";}
            if (!empty($_POST['react'])) {$react = $_POST['react'];} else {$react = "";}
            $color = $_POST['color'];
            $birthday = $_POST['birthday'];

            if (empty($firstName&&$lastName&&$age&&$size&&$civility&&$birthday)) {
              echo "<p class='p-3 mb-2 bg-danger text-red text-center'>Veuillez remplir tout le formulaire</p>";
              echo "<a class='btn btn-primary' href='index.php?addmore'>Réessayer</a>";
            }
            else if (!empty($firstName&&$lastName&&$age&&$size&&$civility&&$birthday)) {
              $table = array(
                'first-name' => $firstName,
                'last-name' => $lastName,
                'age' => $age,
                'size' => $size,
                'civility' => $civility,
                'html' => $html,
                'css' => $css,
                'javascript' => $javascript,
                'php' => $php,
                'mysql' => $mysql,
                'bootstrap' => $bootstrap,
                'symfony' => $symfony,
                'react' => $react,
                'color' => $color,
                'birthday' => $birthday,
              );
              $_SESSION['table'] = $table;
                //Alert that the data is defined
                echo "<p class='p-3 mb-2 bg-success text-green text-center'>Données sauvergardées</p>";
            }
          }
          //"index.php?debugging" page
          else if (isset($_GET['debugging']) && !empty($_SESSION)) {
            echo "<h2 class='text-center mb-5'>Débogage</h2>";
            echo "<h3 class='fs-5'>===> Lecture du tableau à l'aide de la fonction print_r()</h3>";
            echo "<pre>";
            print_r($table);
            echo "</pre>";
          }
          //"index.php?concatenation" page
          else if (isset($_GET['concatenation']) && !empty($_SESSION)) {
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
          //"index.php?loop" page
          else if (isset($_GET['loop']) && !empty($_SESSION)) {
            echo "<h2 class='text-center mb-5'>Boucle</h2>";
            echo "<h3 class='fs-5 mt-5'>===> Lecture du tableau à l'aide d'une boucle foreach</h3>";
            $counter = 0;
            foreach ($table as $key => $value) {
              echo "à la ligne n°". $counter++. " correspond la clé \"$key\" et contient \"$value\"<br>";
            }
          }
          //"index.php?function" page
          else if (isset($_GET['function']) && !empty($_SESSION)) {
            echo "<h2 class='text-center mb-5'>Fonction</h2>";
            echo "<h3 class='fs-5 mt-5'>===> J'utilise ma fonction readTable()</h3>";
            function readTable($table) {
              $counter = 0;
              foreach ($table as $key => $value) {
                echo "à la ligne n°". $counter++. " correspond la clé \"$key\" et contient \"$value\"<br>";
              }
            }
            readTable($table);
          }
          //"index.php?del" page to delete session and datas
          else if (isset($_GET['del']) && !empty($_SESSION)) {
            $_SESSION = array();
            session_destroy();
            echo "<p class='p-3 mb-2 bg-success text-green text-center'>Données supprimées</p>";
          }
          //Default/Home page
          else {
            echo "<a href='index.php?add'><button type='button' class='btn btn-primary mx-1'>Ajouter des données</button></a>";
            echo "<a href='index.php?addmore'><button type='button' class='btn btn-secondary'>Ajouter plus de données</button></a>";
          }
        ?>
      </section>
    </div>

    <!--FOOTER-->
    <div class="mt-5">
      <?php include "./includes/footer.inc.html"; ?>
    </div>
  </div>
</body>
</html>