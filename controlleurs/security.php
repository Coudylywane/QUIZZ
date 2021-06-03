<?php 



if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='connexion') {
        require(ROUTE_DIR.'views/security/connexion.html.php');
       }elseif($_GET['view']=='inscription') {
        require(ROUTE_DIR.'views/security/inscription.html.php');
       }elseif($_GET['view']=='deconnexion') {
        require(ROUTE_DIR.'views/security/connexion.html.php');
       }
    }else {
        require(ROUTE_DIR.'views/security/connexion.html.php');
    }
}elseif ($_SERVER['REQUEST_METHOD']=='POST')  {
    if (isset($_POST['action'])) {
       if ($_POST['action']=='connexion') {
           connexion($_POST['login'],$_POST['password']);
       }elseif ($_POST['action']=='inscription') {
         inscription($_POST['data']);
       }
    }
}


function connexion(string $login,string $password):void{
    $arrayError=array();
     validation_login($login,'login',$arrayError);
     validation_password($password,'password',$arrayError);

     if (form_valid($arrayError)) {
        // appel du model
        $user = find_login_password($login , $password);
        if (count($user)==0) {
          $arrayError['erreurConnexion']="login ou password incorrect ";
          $_SESSION['arrayError']= $arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=security&view=connexion');
        }else{
            $_SESSION['userConnect']=$user;
            if ($user['role']=='ROLE_ADMIN') {
                header('location:'.WEB_ROUTE.'?controlleurs=admin&view=liste.question');
            }elseif ($user['role']== 'ROLE_JOUEUR') {
             header('location:'.WEB_ROUTE.'?controlleurs=admin&view=jeu');
            }
        }
     }else {
         $_SESSION['arrayError']=$arrayError;
         header('location:'.WEB_ROUTE.'?controlleurs=security&view=connexion');
     }
}

function inscription(array $data):void{
    $arrayError=array();
    extract($data);
     validation_login($login,'login',$arrayError);
     validation_password($password,'password',$arrayError);
     valid_nom($nom,'nom',$arrayError);
     valid_prenom($prenom,'prenom',$arrayError);
     valid_date($age,'age',$arrayError);

     if (form_valid($arrayError)) {
        // appel du model
        $user = find_login_password($login , $password);
        if (count($user)==0) {
          $arrayError['erreurConnexion']="login ou password incorrect ";
          $_SESSION['arrayError']= $arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=security&view=connexion');
        }else{
            $_SESSION['userConnect']=$user;
            if ($user['role']=='ROLE_ADMIN') {
                header('location:'.WEB_ROUTE.'?controlleurs=admin&view=liste.question');
            }elseif ($user['role']== 'ROLE_JOUEUR') {
             header('location:'.WEB_ROUTE.'?controlleurs=admin&view=jeu');
            }
        }
     }else {
         $_SESSION['arrayError']=$arrayError;
         header('location:'.WEB_ROUTE.'?controlleurs=security&view=inscription');
}
}

function deconnexion():void{
    unset ($_SESSION['userConnect']);
}

?>