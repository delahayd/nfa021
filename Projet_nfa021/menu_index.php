  <div class="container">

        <!--_________________________________________HEADER NAVIGATION DEBUT_________________________________________-->
            <nav class="navbar navbar-inverse navbar-static-top">
               <div class="navbar-header" style=height:110px>   
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>

               <a class="navbar-brand" href="index.php"><img src="img/cnam.png" height="70%">&nbsp &nbsp &nbspPROJET NFA021</a>
              </div>
              <div class="collapse navbar-collapse">
                   <ul class="nav navbar-nav">
                      <li> <a href="index.php">Accueil</a> </li> 
                      <li> <a href="tests.php">Tests</a> </li> 
                      <li> <a href="statistiques.php">Statistique</a> </li>
                      <li> <a href="historique.php">Historique</a> </li>
                      <li> <a href="contact.php">Contact</a> </li>
                 </ul>

			
                 <form class="navbar-form pull-right" method = "post" name = "identification" action = "index.php">
                     <span style=color:#999;>Se connecter</span>
					 
					 <input type="text" name = "pseudo_connexion" class="input-small"  style="width:130px" placeholder="Utilisateur">
				     <input type="password" name = "password" class="input-small"  style="width:130px" placeholder="mot de passe">  <!-- ne pas faire apparaitre le mdp en clair -->
                     <button type="submit" value = "Connexion" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Connexion</button><br>
						
                     <!-- Lien Mot de passe oublié -->
                     <div style=text-align:right;color:#999; ><a href="motdepasse.php" style=text-decoration:none;> Nom utilisateur ou mot de passe oublie ?</a></div>
                     <!-- _________________________-->
                </form>
              </div>
            </nav>
          <!--_________________________________________HEADER NAVIGATION FIN_________________________________________-->

          <!----------------------------------------------------------------------------------------------------------------------->