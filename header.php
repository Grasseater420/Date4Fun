<?php

  function renderNavbar() {

    echo "<nav class=\"navbar navbar-default\">
            <div class=\"container-fluid\">
              <ul class=\"nav navbar-nav\">
                <li><a href=\"./profiel.php\">Profiel</a></li>
                <li><a href=\"./memberships.php\">Memberships</a></li>
                <li><a href=\"./events.php\">Events</a></li>
              </ul>
              <ul class=\"nav navbar-nav navbar-right\">
                <li><a data-toggle=\"modal\" href=\"#myModal\">Login</a></li>
              </ul>
            </div>
          </nav>";

    echo "<div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                  <h4 class=\"modal-title\">Login</h4>
                </div>
                <div class=\"modal-body\" style=\"padding:40px 50px;\">
                  <form action=\"login.php\" method=\"POST\">
                    <div class=\"form-group\">
                      <label for=\"Gebruikersnaam\">Gebruikersnaam</label><br>
                      <input type=\"text\" maxlength=\"20\" placeholder=\"gebruikersnaam\" name=\"gebruikersnaam\" required>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"Wachtwoord\">Wachtwoord</label><br>
                      <input type=\"password\" maxlength=\"20\" placeholder=\"wachtwoord\" name=\"wachtwoord\" required>
                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>";
  }

  function renderJumbotron() {
    
    echo "<div class=\"container\">
            <div class=\"jumbotron\">
              <h1>Date4Provit<br><small>Logo</small></h1>
            </div>
          </div>";
  }

?>
