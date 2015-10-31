<?php

require_once('Model/ModelPDO.php');   // ModelPDO class to access to DB

function verifyUser($email, $password) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get user profile
    $sth = $dbo->prepare("SELECT user_name FROM kf_user WHERE user_name = ? AND user_passw = ?");
    // Set email and password parameters
    $sth->execute(array($email, $password));
    $return = $sth->fetchAll();

    if (count($return) > 0)
            return true;
    return false;
}

