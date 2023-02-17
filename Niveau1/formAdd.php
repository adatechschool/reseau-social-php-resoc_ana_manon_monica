<?php session_start()
?>
 <?php include("connect.php"); ?>
<article>
                    <?php
                    /**
                     * TRAITEMENT DU FORMULAIRE
                     */
                    // Etape 1 : vérifier si on est en train d'afficher ou de traiter le formulaire
                    // si on recoit un champs email rempli il y a une chance que ce soit un traitement
                    $authorId = $_SESSION['connected_id'];
                    $enCoursDeTraitement = isset($_POST['content']);
                    if ($enCoursDeTraitement)
                    {
                        $new_content = $_POST['content'];
                        //$mysqli = new mysqli("localhost", "root", "root", "socialnetwork");
                        $new_content = $mysqli->real_escape_string($new_content);
                        $authorId = intval($mysqli->real_escape_string($authorId));
                       
                        // on crypte le mot de passe pour éviter d'exposer notre utilisatrice en cas d'intrusion dans nos systèmes
                   
                        // NB: md5 est pédagogique mais n'est pas recommandée pour une vraies sécurité
                        //Etape 5 : construction de la requete
                        $lInstructionSql = "INSERT INTO posts (id, user_id, content, created, parent_id) "
                        . "VALUES (NULL, "
                        . $authorId . ", "
                        . "'" . $new_content . "', "
                        . "NOW(), "
                        . "NULL);"
                        ;

                        // Etape 6: exécution de la requete
                        $ok = $mysqli->query($lInstructionSql);
                        if ( ! $ok)
                        {
                            echo "Le message n'a pas été envoyé : " . $mysqli->error;
                        } else
                        {
                            echo "Le message a bien été envoyé : " . $authorId;
                            //echo " <a href='login.php'>Connectez-vous.</a>";
                        }
                    }
                    ?>                     
                    <form action="formAdd.php" method="post">
                        <dl>
                            <dt><label for='text'>Message</label></dt>
                            <dd><input type='textarea' name='content'></dd>

                            <dt><label for='text'># Tags</label></dt>
                            <dd><input type='text' name='hashtag'></dd>
                        </dl>
                        <input type='submit' value="Publier">
                    </form>
                </article>
            </main>
