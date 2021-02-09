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
                                        <strong>Nom :</strong>  $data[nom]  
                                    </td>
                                    <td>
                                        <strong>Prenom :</strong>  $data[prenom]  
                                    </td>
                                    <td>
                                        <strong>Tel  :</strong>  $data[tel]  
                                    </td>
                                    <td>
                                        <strong>Adresse :</strong>  $data[adresse]  
                                    </td>
                                </tr>
                            </table>";

                }   

            }

            ?>