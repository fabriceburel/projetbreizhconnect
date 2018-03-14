<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!-- meta pour l'adaptabilité pour des mobiles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="assets/lib/materialize/dist/css/materialize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/searchStyle.css">
        <title>Projet</title>
    </head>
    <body>
        <header id="header">
            <div  class="row" id="heading">
                <!--En tete du site -->
                <div class="col offset-l3 l5"><h1>BZHConnect</h1></div>
                <div class="col offset-l1 l3 row" id="button-header">
                    <h2><a href="#modalConnexion" data-toggle="modal" class="col l12 waves-effect waves-light btn modal-trigger connexion">CONNEXION</a></h2>
                    <!-- Modal Structure -->
                    <div id="modalConnexion" class="modal">
                        <div class="modal-content">
                            <h3>CONNEXION</h3>
                        </div>
                        <form action="connexion.php" method="POST"  class="connexion">            
                            <!-- Création de l'emplacement Pseudo -->
                            <div class="input-field l4">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="username" class="grey darken-4 white-text" id="username" value="">
                                <label for="username">Entrez votre pseudo : </label>
                            </div>
                            <!-- Création de l'emplacement du mdp -->
                            <div class="input-field l4">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" name="password" class="grey darken-4 white-text" id="password" value="">
                                <label for="password">Mot de passe : </label>
                            </div>        
                            <!-- Ajout du bouton pour envoyer la requête -->
                            <div class="input-field l4 center-align">  
                                <button name="subscribe" class="btn btn-large waves-effect waves-light grey darken-4" id="submitConnexion">Me connecter<i class="material-icons right">send</i></button>
                            </div>
                            <!-- Ajout du bouton pour annuler l'inscritpion -->
                            <div class="input-field l4 center-align">
                                <button name="undo" aria-hidden="true" class="btn waves-effect waves-dark grey darken-4"><a class="white-text" href="index.php">Annuler ma connexion</a></button>
                            </div>
                        </form>
                    </div>
                    <h2><a href="subscribe.php" class="col l12 waves-effect waves-light btn inscription valign-wrapper">INSCRIPTION</a></h2>
                </div>
            </div>
            <nav>
                <div class="nav-wrapper" id="navbar">
                    <a href="#" data-activates="navbarMobile" class="button-collapse"><i class="material-icons">menu MENU</i></a>
                    <ul class="left hide-on-med-and-down">
                        <li class="navbar "><a href="tchat.php" title="Communiquer avec ma communautée">Communiquer</a></li>
                        <li class="navbar"><a href="#photos" title="partager des photos avec un ou plusieurs amis">Echange de fichier</a></li>
                        <li class="navbar "><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                        <li class="navbar "><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                        <li class="navbar "><a href="community.php" title="Ma communauté">Ma communauté</a></li>
                    </ul>
                    <ul class="side-nav navbar" id="navbarMobile">
                        <li><a href="tchat.php" title="Communiquer avec ma communautée">Communiquer</a></li>
                        <li><a href="#photos" title="partager des photos avec un ou plusieurs amis">Echange de fichier</a></li>
                        <li><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                        <li><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                        <li><a href="profile.php" title="Ma communauté">Ma communauté</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="row">
            <div class="container">
                <!-- h3 pas nécessaire tant que la fenetre modal n'est pas réactivée -->
                <!-- <h3 class="col l12 center-align">Vérifier et modifier vos informations avant validation de l'inscription</h3> -->
                <div class="row">
                    <div class="col s12 m10 offset-l2 l8 center-block">
                        <!-- Création du formulaire d'inscription-->
                        <form action="#" method="POST" enctype="multipart/form-data" class="subscribe row">
                            <h2 class="col s12 l12 center-align">Inscription</h2>
                            <!-- Création de l'emplacement du nom -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="lastname" class="white-text" id="lastname" required value="">
                                    <label for="lastname">Nom : <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- Création de l'emplacement du prénom -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="firstname" class="white-text" id="firstname" required value="">
                                    <label for="firstname">Prénom : <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- Création de l'emplacement Pseudo -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="username" class="white-text" id="username" required value="">
                                    <label for="username">Choisissez un pseudo : <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- Création de l'emplacement Date de naissance -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">perm_contact_calendar</i>
                                    <input type="text" name="birthdate" class="datepicker white-text" id="birthdate" required value="">
                                    <label for="birthdate">Votre Date de naissance: <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- Création de l'emplacement du mail -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">contact_mail</i>
                                    <input type="email" name="mail" class="white-text" id="mail" required value="">
                                    <label for="email">Votre Email : <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- création de la liste deroulante permettant de choisir son pays -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="fa fa-globe prefix" aria-hidden="true"></i>
                                    <select name="country"  class="white-text country" required>
                                        <option>Sélectionner votre pays</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Afrique du sud</option>
                                        <option value="3">Albanie</option>
                                        <option value="4">Algérie</option>
                                        <option value="5">Allemagne</option>
                                        <option value="6">Andorre</option>
                                        <option value="7">Angleterre</option>
                                        <option value="8">Angola</option>
                                        <option value="9">Anguilla</option>
                                        <option value="10">Antarctique</option>
                                        <option value="11">Antigua et Barbuda</option>
                                        <option value="12">Antilles néerlandaises</option>
                                        <option value="13">Arabie saoudite</option>
                                        <option value="14">Argentine</option>
                                        <option value="15">Arménie</option>
                                        <option value="16">Aruba</option>
                                        <option value="17">Australie</option>
                                        <option value="18">Autriche</option>
                                        <option value="19">Azerbaïdjan</option>
                                        <option value="20">Bahamas</option>
                                        <option value="21">Bahrain</option>
                                        <option value="22">Bangladesh</option>
                                        <option value="23">Belgique</option>
                                        <option value="24">Belize</option>
                                        <option value="25">Benin</option>
                                        <option value="26">Bermudes</option>
                                        <option value="27">Bhoutan</option>
                                        <option value="28">Biélorussie</option>
                                        <option value="29">Bolivie</option>
                                        <option value="30">Bosnie-Herzégovine</option>
                                        <option value="31">Botswana</option>
                                        <option value="32">Bouvet</option>
                                        <option value="33">Brésil</option>
                                        <option value="34">Brunei</option>
                                        <option value="35">Bulgarie</option>
                                        <option value="36">Burkina Faso</option>
                                        <option value="37">Burundi</option>
                                        <option value="38">Cambodge</option>
                                        <option value="39">Cameroun</option>
                                        <option value="40">Canada</option>
                                        <option value="41">Cap Vert</option>
                                        <option value="42">Cayman</option>
                                        <option value="43">Chili</option>
                                        <option value="44">Chine</option>
                                        <option value="45">Christmas</option>
                                        <option value="46">Chypre</option>
                                        <option value="47">Cocos</option>
                                        <option value="48">Colombie</option>
                                        <option value="49">Comores</option>
                                        <option value="50">Congo</option>
                                        <option value="51">Cook</option>
                                        <option value="52">Corée du Nord</option>
                                        <option value="53">Corée du Sud</option>
                                        <option value="54">Costa Rica</option>
                                        <option value="55">Côte d'Ivoire</option>
                                        <option value="56">Croatie</option>
                                        <option value="57">Cuba</option>
                                        <option value="58">Danemark</option>
                                        <option value="59">Djibouti</option>
                                        <option value="60">Dominique</option>
                                        <option value="61">Egypte</option>
                                        <option value="62">El Salvador</option>
                                        <option value="63">Emirats arabes unis</option>
                                        <option value="64">Equateur</option>
                                        <option value="65">Erythrée</option>
                                        <option value="66">Espagne</option>
                                        <option value="67">Estonie</option>
                                        <option value="68">Etats-Unis</option>
                                        <option value="69">Ethiopie</option>
                                        <option value="70">Falkland</option>
                                        <option value="71">Féroé</option>
                                        <option value="72">Fidji</option>
                                        <option value="73">Finlande</option>
                                        <option value="74">France</option>
                                        <option value="75">Gabon</option>
                                        <option value="76">Gambie</option>
                                        <option value="77">Géorgie</option>
                                        <option value="78">Ghana</option>
                                        <option value="79">Gibraltar</option>
                                        <option value="80">Grèce</option>
                                        <option value="81">Grenade</option>
                                        <option value="82">Groenland</option>
                                        <option value="83">Guadeloupe</option>
                                        <option value="84">Guam</option>
                                        <option value="85">Guatemala</option>
                                        <option value="86">Guinée</option>
                                        <option value="87">Guinée Equatoriale</option>
                                        <option value="88">Guinée-Bissau</option>
                                        <option value="89">Guyane</option>
                                        <option value="90">Guyane française</option>
                                        <option value="91">Haïti</option>
                                        <option value="92">Honduras</option>
                                        <option value="93">Hongrie</option>
                                        <option value="94">Inde</option>
                                        <option value="95">Indonésie</option>
                                        <option value="96">Irak</option>
                                        <option value="97">Iran</option>
                                        <option value="98">Irlande</option>
                                        <option value="99">Islande</option>
                                        <option value="100">Israël</option>
                                        <option value="101">Italie</option>
                                        <option value="102">Jamaïque</option>
                                        <option value="103">Japon</option>
                                        <option value="104">Jordanie</option>
                                        <option value="105">Kazakhstan</option>
                                        <option value="106">Kenya</option>
                                        <option value="107">Kirghizistan</option>
                                        <option value="108">Kiribati</option>
                                        <option value="109">Koweit</option>
                                        <option value="110">La Barbad</option>
                                        <option value="111">Laos</option>
                                        <option value="112">Lesotho</option>
                                        <option value="113">Lettonie</option>
                                        <option value="114">Liban</option>
                                        <option value="115">Libéria</option>
                                        <option value="116">Libye</option>
                                        <option value="117">Liechtenstein</option>
                                        <option value="118">Lithuanie</option>
                                        <option value="119">Luxembourg</option>
                                        <option value="120">Macau</option>
                                        <option value="121">Macédoine</option>
                                        <option value="122">Madagascar</option>
                                        <option value="123">Malaisie</option>
                                        <option value="124">Malawi</option>
                                        <option value="125">Maldives</option>
                                        <option value="126">Mali</option>
                                        <option value="127">Malte</option>
                                        <option value="128">Mariannes du Nord</option>
                                        <option value="129">Maroc</option>
                                        <option value="130">Marshall</option>
                                        <option value="131">Martinique</option>
                                        <option value="132">Maurice</option>
                                        <option value="133">Mauritanie</option>
                                        <option value="134">Mayotte</option>
                                        <option value="135">Mexique</option>
                                        <option value="136">Micronésie</option>
                                        <option value="137">Moldavie</option>
                                        <option value="138">Monaco</option>
                                        <option value="139">Mongolie</option>
                                        <option value="140">Montserrat</option>
                                        <option value="141">Mozambique</option>
                                        <option value="142">Myanmar</option>
                                        <option value="143">Namibie</option>
                                        <option value="144">Nauru</option>
                                        <option value="145">Nepal</option>
                                        <option value="146">Nicaragua</option>
                                        <option value="147">Niger</option>
                                        <option value="148">Nigeria</option>
                                        <option value="149">Niue</option>
                                        <option value="150">Norfolk</option>
                                        <option value="151">Norvège</option>
                                        <option value="152">Nouvelle Calédonie</option>
                                        <option value="153">Nouvelle-Zélande</option>
                                        <option value="154">Oman</option>
                                        <option value="155">Ouganda</option>
                                        <option value="156">Ouzbékistan</option>
                                        <option value="157">Pakistan</option>
                                        <option value="158">Palau</option>
                                        <option value="159">Panama</option>
                                        <option value="160">Papouasie-Nouvelle-Guinée</option>
                                        <option value="161">Paraguay</option>
                                        <option value="162">Pays-Bas</option>
                                        <option value="163">Pérou</option>
                                        <option value="164">Philippines</option>
                                        <option value="165">Pitcairn</option>
                                        <option value="166">Pologne</option>
                                        <option value="167">Polynésie française</option>
                                        <option value="168">Porto Rico</option>
                                        <option value="169">Portugal</option>
                                        <option value="170">Qatar</option>
                                        <option value="171">République centrafricaine</option>
                                        <option value="172">République Dominicaine</option>
                                        <option value="173">République tchèque</option>
                                        <option value="174">Réunion</option>
                                        <option value="175">Roumanie</option>
                                        <option value="176">Royaume-Uni</option>
                                        <option value="177">Russie</option>
                                        <option value="178">Rwanda</option>
                                        <option value="179">Sahara Occidental</option>
                                        <option value="180">Saint Pierre et Miquelon</option>
                                        <option value="181">Saint Vincent et les Grenadine</option>
                                        <option value="182">Saint-Kitts et Nevis</option>
                                        <option value="183">Saint-Marin</option>
                                        <option value="184">Sainte Hélène</option>
                                        <option value="185">Sainte Lucie</option>
                                        <option value="186">Samoa</option>
                                        <option value="187">Sénégal</option>
                                        <option value="188">Seychelles</option>
                                        <option value="189">Sierra Leone</option>
                                        <option value="190">Singapour</option>
                                        <option value="191">Slovaquie</option>
                                        <option value="192">Slovénie</option>
                                        <option value="193">Somalie</option>
                                        <option value="194">Soudan</option>
                                        <option value="195">Sri Lanka</option>
                                        <option value="196">Suède</option>
                                        <option value="197">Suisse</option>
                                        <option value="198">Suriname</option>
                                        <option value="199">Syrie</option>
                                        <option value="200">Tadjikistan</option>
                                        <option value="201">Taiwan</option>
                                        <option value="202">Tanzanie</option>
                                        <option value="203">Tchad</option>
                                        <option value="204">Thailande</option>
                                        <option value="205">Timor</option>
                                        <option value="206">Togo</option>
                                        <option value="207">Tokelau</option>
                                        <option value="208">Tonga</option>
                                        <option value="209">Trinité et Tobago</option>
                                        <option value="210">Tunisie</option>
                                        <option value="211">Turkménistan</option>
                                        <option value="212">Turquie</option>
                                        <option value="213">Tuvalu</option>
                                        <option value="214">Ukraine</option>
                                        <option value="215">Uruguay</option>
                                        <option value="216">Vanuatu</option>
                                        <option value="217">Vatican</option>
                                        <option value="218">Venezuela</option>
                                        <option value="219">Vierges</option>
                                        <option value="220">Vietnam</option>
                                        <option value="221">Wallis et Futuna</option>
                                        <option value="222">Yemen</option>
                                        <option value="223">Yougoslavie</option>
                                        <option value="224">Zaïre</option>
                                        <option value="225">Zambie</option>
                                        <option value="226">Zimbabwe</option>

                                    </select>
                                    <label class="localisation" for="country">Séléctionnez votre pays : <p class="textError"></p></label>
                                </div>   
                            </div>
                            <div class="col s8 l8">
                                <div class="input-field region">
                                    <i class="fa fa-globe prefix" aria-hidden="true"></i>
                                    <select name="region" class="white-text">
                                        <option>Sélectionnez votre région</option>
                                        <option value="28">Alsace</option>
                                        <option value="29">Aquitaine</option>
                                        <option value="30">Auvergne</option>
                                        <option value="31">Basse-Normandie</option>
                                        <option value="32">Bourgogne</option>
                                        <option value="33">Bretagne</option>
                                        <option value="34">Centre</option>
                                        <option value="35">Champagne-Ardenne</option>
                                        <option value="36">Corse</option>
                                        <option value="37">Franche-Comté</option>
                                        <option value="38">Haute-Normandie</option>
                                        <option value="39">Île-de-France</option>
                                        <option value="40">Languedoc-Roussillon</option>
                                        <option value="41">Limousin</option>
                                        <option value="42">Lorraine</option>
                                        <option value="43">Midi-Pyrénées</option>
                                        <option value="44">Nord-Pas-de-Calais</option>
                                        <option value="45">Pays de la Loire</option>
                                        <option value="46">Picardie</option>
                                        <option value="47">Poitou-Charentes</option>
                                        <option value="48">Provence-Alpes-Côte d'Azur</option>
                                        <option value="49">Rhône-Alpes</option>
                                        <option value="50">Guadeloupe</option>
                                        <option value="51">Guyane</option>
                                        <option value="52">La Réunion</option>
                                        <option value="53">Martinique</option>
                                        <option value="54">Mayotte</option>

                                    </select>
                                    <label class="localisation" for="region">Région : <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- Création de l'emplacement du mdp -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input type="password" name="passwordUser" class="white-text" id="passwordUser" required value="">
                                    <label for="passwordUser">Mot de passe avec caractère spéciaux et chiffres : <p class="textError"></p></label>
                                </div>
                            </div>
                            <!-- Création de l'emplacement de la vérification -->
                            <div class="col s8 l8">
                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_key</i>              
                                    <input type="password" name="passwordCheck" class="white-text" id="passwordCheck" required value="">
                                    <label for="passwordCheck">Répétez votre mot de passe : </label>
                                </div>  
                            </div>
                            <!-- Possibilité d'ajouter une photo de profil -->
                            <div class="col s8 l8">
                                <div class="file-field input-field">              
                                    <div class="btn grey darken-4 white-text">                
                                        <span>Votre Photo <i class="material-icons right">cloud_upload</i></span>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                                        <input type="file" name="avatar">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                        <img src="assets/img/apercuimage.jpg" alt="apercu image">
                                        <p class="textError"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Ajout du bouton pour envoyer la requête -->
                            <div class="col s8 l8">
                                <div class="input-field center-align">  
                                    <button name="subscribe" class="btn btn-large waves-effect waves-light grey darken-4">Valider votre insciption <i class="material-icons right">send</i></button>
                                </div>
                                <!-- Ajout du bouton pour annuler l'inscritpion -->
                                <div class="input-field center-align">
                                    <button name="undo" aria-hidden="true" class="btn waves-effect waves-dark grey darken-4">Annuler l'inscription</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <footer>
<div id="footer">
    <div class="row">
        <div class="col offset-l1 l6"><p><span class="hidden-sm hidden-xs couleurblanche">Contact</span><a href="mailto:burelfabrice35@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a></p></div>
    </div>
</div>
</footer> -->
        <script type="text/javascript" src="assets/lib/jquery.min/index.js"></script>
        <script type="text/javascript" src="assets/lib/materialize/dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="assets/js/scriptDatepicker.js"></script>
        <script>
            $('.modal').modal();
            $(document).ready(function () {
                console.log($('.input-field->input').val());
                $('select').material_select();
                $(".button-collapse").sideNav();
                $('.modal').modal();
                //permet d'afficher la liste déroulante des régions lorsque le pays france est sélectionné dans la page inscription
                if ($('select.country').val() == 74) {
                    $('.region').show();
                } else {
                    $('.region').hide();
                }
                $('select.country').change(function () {
                    if ($('select.country').val() == 74) {
                        $('.region').show();
                    } else {
                        $('.region').hide();
                    }
                });
            });
        </script>
        <script type="text/javascript" src="assets/js/buttonConnectOff.js"></script>
        <script type="text/javascript" src="assets/js/profileAjax.js"></script>
    </body>
</html>
