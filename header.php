<?php

  function renderNavbar() {


    include('config.php');
    include('functions_gebruikersessie.php');

    if (!empty($_POST)) {
      $gebruiker  = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
      $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
      $query      = "SELECT * FROM gebruikers WHERE gebruikersnaam ='" . $_POST["gebruikersnaam"] ."'AND wachtwoord='" . $_POST["wachtwoord"] ."'";
      $result     = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

      if (mysqli_num_rows($result) > 0) {

        $_SESSION["gebruiker"] = $gebruiker;

        while ($row = mysqli_fetch_assoc($result)) {
          $isAdmin = $row['admin'];
        }

        if ($isAdmin == true) {
          echo "Je bent Admin";
          exit();
        }
        else {
          $query    = "SELECT gebruiker_id FROM `gebruikers` WHERE gebruikersnaam = '".$gebruiker."'";
          $result   = mysqli_query($db, $query);
          $row      = mysqli_fetch_array($result);
          $total    = $row[0];

          logInSessieGebruiker($total);

          header("Location:profiel.php?id=".$total."");
          exit();
        }

      }
      else {
        // die(header("Location:header.php?poging=fout"));
        $error_msg = "<div class=\"loginModal\">
                        De combinatie van gebruikersnaam en wachtwoord is <b>onjuist</b>.<br><br>
                      </div>";
        $script =  "<script> $(document).ready(function(){ $('#loginModal').modal('show'); }); </script>";
      }

    }
    else {
      // header("Location:loginForm.php");
    }

    echo "<nav class=\"navbar navbar-default\">
            <div class=\"container-fluid\">
              <ul class=\"nav navbar-nav\">
                <li><a href=\"./profiel.php\">Profiel</a></li>
                <li><a href=\"./memberships.php\">Memberships</a></li>
                <li><a href=\"./events.php\">Events</a></li>
              </ul>
              <ul class=\"nav navbar-nav navbar-right\">
                <li><a data-toggle=\"modal\" href=\"#loginModal\">Login</a></li>
              </ul>
            </div>
          </nav>";

    echo "<div class=\"modal fade\" id=\"loginModal\" role=\"dialog\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                  <h4 class=\"modal-title\">Login</h4>
                </div>
                <div class=\"modal-body\" style=\"padding:40px 50px;\">
                  <form action=\"\" method=\"POST\">
                    <div class=\"form-group\">
                      <label for=\"Gebruikersnaam\">Gebruikersnaam</label><br>
                      <input type=\"text\" class=\"form-control\" maxlength=\"20\" placeholder=\"gebruikersnaam\" name=\"gebruikersnaam\" required>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"Wachtwoord\">Wachtwoord</label><br>
                      <input type=\"password\" class=\"form-control\" maxlength=\"20\" placeholder=\"wachtwoord\" name=\"wachtwoord\" required>
                    </div>";

                    if(isset($error_msg)) {
                      echo $error_msg;
                      echo "<button type=\"submit\" class=\"btn btn-default\">Login</button>
                      <a class=\"btn btn-default\" href=\"./registreren.php\">Registreren</a>";
                    }
                    else {
                      echo "<button type=\"submit\" class=\"btn btn-default\">Login</button>";
                    }

    echo         "</form>
                </div>
              </div>
            </div>
          </div>";

      if(isset($script)) {
        echo $script;
      }

  }

  function renderJumbotron() {

    echo "<div class=\"container\">
            <div class=\"jumbotron\">
              <h1>Date4Fun<br><small>Logo</small></h1>
            </div>
          </div>";
  }

?>

<?php if(isset($script)){ echo $script; } ?>
