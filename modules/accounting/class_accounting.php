<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_accounting
 *
 * @author MaLuZ
 */
class accounting {
    //put your code here
    
    public function GetUserTransactions($userid){
        //list all transaction 
    }
    public function GetUserBalance($userid){
        /** 
         * @param type $Transaction get the current user balance.
         * Returns the current users account balance. 
         * DON'T USE THIS BEFORE RUNNING A TRANSACTION. 
         * Things could change between check and update!
         */
    }

    public function AddTransaction($Transaction){
        //lock entry, check balance, run transaction, log errors
        
    }
    public function UpdateBalance ($newbalance){
        //manual correction of user balance
    }
    
}
