

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionaire Client</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <article id="formulaire">
            <h1>Formulaire Client</h1>

            <!-- Partie top du formulaire client -->
            <div id="info_client">
                <form action="index.php" method="post">
                    <table>
                        <tr>
                            <td>Nom</td>
                            <td><input type="text" name="nom"></td>
                            <td>Prenom</td>
                            <td><input type="text" name="prenom"></td>
                        </tr>

                        <tr>
                            <td>Tel</td>
                            <td><input type="text" name="tel"></td>
                            <td>Adresse</td>
                            <td><input type="text" name="adresse"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Envoyer"></td>
                        </tr>

                
                    </table>
                </form>

                 
            </div>

            <!-- Partie bottom du formulaire client -->
            <div id="formulaire_commande">
                <form action="index.php" method="post">
                    <table>
                        <tr>
                            <td class="table_commande_left"> <strong>N° pizza</strong>  </td>
                            <td><strong>Commande</strong></td>
                        </tr>

                        <tr>
                            <td class="table_commande_left"> <input type="text" name="pizza"> </td>
                            <td rowspan="3" colspan="2"> 

                                <div id="space2">
                                    <ul>
                                        <li>1x Saulcy</li>
                                        <li>1x Poulet</li>
                                        <li>1x Mergez</li>
                                        <li>Paiment : CB</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="table_commande_left"> 
                                <div id="space">
                                   
                                </div> 
                            </td>
                        </tr>

                        <tr>
                            <td class="table_commande_left">
                                <button id="btn_espece">Espèce</button>
                                <button id="btn_cb">CB</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="table_commande_left">Prix HT </td>

                            <!--<td> <button id="btn_ajouter" type="submit"> <span>Ajouter</span></button> </td>-->
                            <td> <input id="btn_ajouter" type="submit" value="Ajouter"></td>
                        </tr>
                        <tr>
                            <td class="table_commande_left">TVA</td>

                            <td>
                                <button id="btn_supprimer"> <span>Supprimer</span></button>
                                <button id="btn_effacer"> <span>Effacer tout</span></button>

                            </td>
                        </tr>
    
                        <tr>
                            <td class="table_commande_left"> <strong> Prix TTC </strong>  </td>
                        </tr>

                        
                    </table>
                </form>
            </div>
           
    
        </article>
            




        <article id="affichage">                <!-- AFFICHAGE CLIENT-->
            <h1>Affichage client</h1>

            <?php 

            // Récup des informations dans le formulaire partie client

            if(isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['tel']) &&  isset($_POST['adresse']) ){

                require('db.php');

                $nom        = ($_POST['nom']);
                $prenom     = ($_POST['prenom']);
                

             // insert les clients dans la BDD   
                $req = $db->prepare('SELECT * FROM client   WHERE prenom = ?
                                                            AND nom = ? ');
                $req->execute(array($prenom, $nom));

                while($data = $req->fetch() ){
                    echo "  <table >
                                <tr>
                                    <td>
                                        <strong>Nom :</strong>      $data[nom]  
                                    </td>
                                    <td>
                                        <strong>Prenom :</strong>   $data[prenom]  
                                    </td>
                                    <td>
                                        <strong>Tel  :</strong>     0$data[tel]  
                                    </td>
                                    <td>
                                        <strong>Adresse :</strong>  $data[adresse]  
                                    </td>
                                </tr>
                            </table>";

                }   

            }

            ?>

        </article>


        <article id="commande">                 <!-- COMMANDE -->
            <h1>Commandes</h1>

        </article>
    </section>


    


</body>
</html>