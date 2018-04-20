<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 13:28
 */

class Validation
{
    public function stringLenght($min,$max,$string){
        if(strlen($string)>=$min && strlen($string)<=$max){
            return true;
        }
        elseif (strlen($string)<$min){
            return false;
        }
        elseif (strlen($string)>$max){

            return false;
        }
    }
    public function email($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }

    }

}