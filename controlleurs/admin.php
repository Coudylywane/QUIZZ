<?php 
echo("liste de question");
 if (!est_admin()) header("localhost:".WEB_ROUTE.'?controlleurs=security&view=connection');

 if ($_SERVER['REQUEST_METHOD']=='GET') {
     if (isset($_GET['view'])) {
        if ($_GET['view']=='liste.question') {
            require(ROUTE_DIR.'views/security/liste.question.html.php');
           }
     }else {
         require_once(ROUTE_DIR.'views/security/connexion.html.php');
     }
 }


?>