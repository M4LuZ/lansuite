<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['auth'])){
    $paymentstring = 'U'. $_SESSION['auth']['userid'] . 'PA'. $_SESSION['party_user']['party_id']. 'PR'.$_SESSION['party_user']['price_id'] . ' - '. $_SESSION['party_user']['price_text']. ' - '. $_SESSION['auth']['username'];
    $amount = 'EUR'.$_SESSION['party_user']['price'];
    //Build include path based on current file location, not from the first called script location onwards (causes problems with inclusion from different parts of the directory tree)
    $BASEDIR = dirname(__FILE__).DIRECTORY_SEPARATOR;
    include_once $BASEDIR.'../modules/accounting/paymentproviders/class_girocode.php';
    $gr = new girocode();
    $gr->SetData($amount, $paymentstring);
    $gr->gen_GiroCode();
}
?>