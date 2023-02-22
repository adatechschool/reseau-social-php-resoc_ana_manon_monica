<?php
include("header.php");
unset($_SESSION['connected_id']);
?>
<div id="wrapper" >
             <main>
                <article>
                    <h2>Vous avez été correctement déconnecté du site!</h2>
                    <?php
                    
                    $enCoursDeTraitement = isset($_POST['email']);
                    if ($enCoursDeTraitement)
                    ?>                     
                   
                    <p>
                        Se reconnecter ?
                        <a href='login.php'>Reconnectez-vous.</a>
                    </p>

                </article>
            </main>
        </div>