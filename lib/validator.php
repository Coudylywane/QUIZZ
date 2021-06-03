<?php 

// fonction de validation
function est_vide(string $valeur): bool {
    return empty($valeur);
}

function est_entier($valeur): bool {
   // $entier = (int) $valeur;
    return is_numeric($valeur);
}

function est_superieur(int $valeur): bool {
    return $valeur > VAL;
}

function verif_taille(string $valeur): bool {
    return strlen($valeur) <= 19;
}


function verif_taille1(string $valeur): bool {
    return strlen($valeur) <= 25;
}

function est_mail($valeur):bool{
    if (filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
        return true;
      } else {
        return false;
      }
}

function form_valid($arrayError):bool{
    if (count($arrayError)==0) {
        return true;
    }
    return false;
}

function validation_login($valeur, string $key,&$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le login est obligatoire";
    }elseif (!est_mail($valeur)) {
        $arrayError[$key] = "le login doit etre un email (exemple123@gmail.com)";
    }
        
}

function validation_password($valeur,string $key,&$arrayError,$min=6,$max=10){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le password est obligatoire";
    }elseif ((strlen($valeur)<$min)||(strlen($valeur)>$max)) {
        $arrayError[$key] = "le password doit etre entre $min et $max";
    }
        
}

function valid_nom($valeur, string $key,&$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le nom est obligatoire ";
    }
}

function valid_prenom($valeur, string $key,&$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le prenom est obligatoire ";
    }
}

function valid_date($valeur, string $key,&$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "la date de naissance est obligatoire ";
    }
}







?>


