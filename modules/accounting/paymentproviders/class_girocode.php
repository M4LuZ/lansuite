<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 //Build include path based on current file location, not from the first called script location onwards (causes problems with inclusion from different parts of the directory tree)
$BASEDIR = dirname(__FILE__).DIRECTORY_SEPARATOR;
require_once $BASEDIR.'../../../ext_scripts/phpqrcode/qrlib.php';

/**
 * Description of class_girocode
 *
 * @author MaLuZ
 */
class girocode {
    //put your code here
 private $QRCODE_DATA = array(
     'GC_SERVICE_TAG' => 'BCD',
     'GC_VERSION' => '002',
     'GC_ENCODING' => '2',
     'GC_TRANSFER_TYPE' =>'SCT',  
 );
 
 /*
  * @TODO: Read this from config
  */
  private $receiver_BIC='';
  private $receiver_name='';
  private $receiver_IBAN = '';
  private $payment_amount='EURX.XX';
  private $payment_reason='';
  private $payment_reference='';
  private $payment_usage='';
  private $user_information='';
    
  public  $girocode_string;
  
public function SetData($amount, $paymentstring){
$this->payment_amount = $amount;
$this->payment_usage = $paymentstring; 
}

  public function gen_GiroCode(){
      $_NEWLINE  = chr(13).chr(10); 
      //build string. 
      $this->girocode_string = implode($_NEWLINE, array_merge($this->QRCODE_DATA,array($this->receiver_BIC,$this->receiver_name,$this->receiver_IBAN,$this->payment_amount,$this->payment_reason,$this->payment_reference,$this->payment_usage,$this->user_information )));
      QRcode::png($this->girocode_string,NULL,QR_ECLEVEL_M,4,1,FALSE);
  }
}

