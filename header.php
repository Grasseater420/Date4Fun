<?php

  function renderHead($titel) {

    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
          <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
          <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
          <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
          <title>" . $titel . "</title>";

  }

  function renderNavbar() {
      
      
      echo "<div class=\"container\">";

    include 'login.php';

    if (isset($_GET['mail'])) {
      $succes     = "Er is een mail met wachtwoord gestuurd!<br><br>
                    <button type=\"submit\" class=\"btn btn-default btn-lg\">Login</button>";
      $script     = "<script> $(document).ready(function(){ $('#loginModal').modal('show'); }); </script>";
    }

    if (isIngelogd() == false) {

        
      echo "<nav class=\"navbar navbar-inverse\">
              <div class=\"container-fluid\">
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
                      }
                      elseif (isset($succes)) {
                        echo $succes;
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
    else {
        
        
        if(isset($_SESSION['winkelwagen']))
        {
            $aantalInWinkelwagen  = count($_SESSION['winkelwagen']);
        }
 else {
     $aantalInWinkelwagen = 0;
     
 }
      echo "<nav class=\"navbar navbar-default\">
              <div class=\"container-fluid\">
                <ul class=\"nav navbar-nav\">
                  <li><a href=\"./profiel.php?id=" . $_SESSION['gebruikers_id'] . "\"><span class=\"glyphicon glyphicon-user\"></span> Mijn profiel</p></a></li>
                  <li><a href=\"./memberships.php\">Memberships</a></li>
                  <li><a href=\"./events.php\">Events</a></li>
                </ul>
                <ul class=\"nav navbar-nav navbar-right\">
                
                 <li><a href=\"./winkelwagen.php?overzicht\">        <button type=\"button\" class=\"btn btn-default btn-lg\">
          <span class=\"glyphicon glyphicon-shopping-cart\"></span> Winkelwagen ($aantalInWinkelwagen)
        </button></a></li>
                 
        <li> <a href=\"./logout.php\"> <button type=\"button\" class=\"btn btn-default btn-lg\">
          <span class=\"glyphicon glyphicon-log-out\"></span> Uitloggen
        </button></a></li>

 
                </ul>


              </div>
            </nav>";
    }
    ////
    // Onzin
    ////
    echo '<!-- Omdat elke site de Konami code moet hebben -->
          <script type="text/javascript">
          if ( window.addEventListener ) {
            var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];
            window.addEventListener("keydown", function(e) {
              if ( e.keyCode == konami[state] ) state++;
              else state = 0;
              if ( state == 10 )
              $(document).ready(function(){ $(\'#henkModal\').modal(\'show\'); });
            }, true);
          }
        </script>
        <!-- Bovenstaande script roept henkModal aan dus die bepalen we hier -->
        <div class="modal fade" id="henkModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content is door Jim gegenereerd -->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Henk is watching you!</h4>
              </div>
              <div class="modal-body text-center">';
                include 'echoHenk.php';
    echo      '</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ik begrijpt het..</button>
              </div>
            </div>

          </div>
        </div>';
    
    echo "</div>";
  }

  function renderJumbotron() {

    echo "<div class=\"container\">
            <div class=\"jumbotron\">
              <h1>Date4Fun<br><small>Logo</small></h1>
            </div>
          </div>";
  }

?>
