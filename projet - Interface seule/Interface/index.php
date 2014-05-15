<!DOCTYPE html>
<html lang="fr">
<head>
<title>PROJET-NFA021</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen"> 
</head>


    <body>
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
                      <li class="active"> <a href="index.php">Accueil</a> </li> 
                      <li> <a href="tests.php">Tests</a> </li> 
                      <li> <a href="statistiques.php">Statistique</a> </li>
                      <li> <a href="historique.php">Historique</a> </li>
                      <li> <a href="contact.php">Contact</a> </li>
                 </ul>

                 <form class="navbar-form pull-right">
                     <span style=color:#999;>Se connecter</span>
                         <input type="text" style="width:130px" class="input-small" placeholder="Nom d'utilisateur">
                         <input type="text" style="width:130px" class="input-small" placeholder="Mot de Passe">
                         <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Connexion</button><br>

                          <!-- Lien Mot de passe oublié -->
                          <div style=text-align:right;color:#999; ><a href="motdepasse.php" style=text-decoration:none;> Nom utilisateur ou mot de passe oublie ?</a></div>
                          <!-- _________________________-->
                   </form>
              </div>
            </nav>
          <!--_________________________________________HEADER NAVIGATION FIN_________________________________________-->

          <!----------------------------------------------------------------------------------------------------------------------->



          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <article class="row">
                
                <div class="col-lg-12">
                    <div class="thumbnail" style=float:left;>
                        <img src="img/calcules.jpg" width="230px;" alt="" style=float:left;>
                          <h3>&nbsp Zenon...  ou bien... Zenon Modulo  ?</h3>
                          <p>Bienvenue sur cette petite application qui vous permettra notament de comparer et de determiner lequel de ces deux outils est le plus efficace, pour ce faire nous vous invitons des a present a vous inscrire ci-dessous afin d'effectuer tres simplement vos tests. </br>
                          </br>L'equipe NFA21</p>
                    </div>
                </div>
            </article>
          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" FIN _____________________-->


          <!--_____________________SECTION FORMULAIRE D'INSCRIPTION LIGNE DE "12" DEBUT____________________ -->
          <section class="row">
              <div class="col-lg-12">
          
                  <form class="form-horizontal">
                       <fieldset>
                            <legend style=text-align:center;>Inscription</legend>
                            <!--_________________________________________________-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Sexe">Sexe</label>
                                   <div class="col-md-4"> 
                                        <label class="radio-inline" for="Sexe-0">
                                           <input type="radio" name="Sexe" id="Sexe-0" value="homme" checked="checked">
                                            Homme
                                        </label> 
                                        <label class="radio-inline" for="Sexe-1">
                                           <input type="radio" name="Sexe" id="Sexe-1" value="femme">
                                            Femme
                                        </label>
                                  </div>
                            </div>
                            <!--_________________________________________________-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nom">Nom</label>  
                                    <div class="col-md-4">
                                         <input id="nom" name="nom" type="text" placeholder="Delahaye" class="form-control input-md">
                                   </div>
                           </div>
                            <!--_________________________________________________-->
                           <div class="form-group">
                               <label class="col-md-4 control-label" for="prenom">Prenom</label>  
                                    <div class="col-md-4">
                                         <input id="prenom" name="prenom" type="text" placeholder="David" class="form-control input-md">
                                    </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                                <label class="col-md-4 control-label" for="nom_utilisateur">Nom d'utilisateur</label>  
                                    <div class="col-md-4">
                                         <input id="nom_utilisateur" name="nom_utilisateur" type="text" placeholder="Delahaye" class="form-control input-md">
                                    </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="adresse_mail">Adresse mail</label>  
                                    <div class="col-md-4">
                                         <input id="adresse_mail" name="adresse_mail" type="text" placeholder="d.delahaye@idf.pleiad.net" class="form-control input-md">
                                    </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="mot_de_passe">Mot de passe</label>
                                    <div class="col-md-4">
                                         <input id="mot_de_passe" name="mot_de_passe" type="password" placeholder="**********" class="form-control input-md">                  
                                   </div>
                           </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="conf_mot_passe">Confirmation du mot de passe</label>
                                     <div class="col-md-4">
                                          <input id="conf_mot_passe" name="conf_mot_passe" type="password" placeholder="**********" class="form-control input-md">                   
                                     </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="inscription"></label>
                                     <div class="col-md-4">
                                           <button id="inscription" name="inscription" class="btn btn-primary">Inscription</button>
                                     </div>
                          </div>

                     </fieldset>
                   </form>
        </div>
      </section>
                <!--_____________________SECTION FORMULAIRE D'INSCRIPTION LIGNE DE "12" DEBUT____________________ -->


            <!------------------------------------------------------------------------------------------------------------------------>

<!--_____________________FOOTER SIMPLE LIGNE DE "12" DEBUT____________________ -->
      <footer class="row">
           <div class="col-md-12" style=text-align:center;>
               <div class="navbar navbar-inverse navbar-fixed-bottom" style=height:10px;>   
              
               </div>
           </div>
      </footer>
<!--_____________________FOOTER SIMPLE LIGNE DE "12" FIN____________________ -->


        </div>



<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>   