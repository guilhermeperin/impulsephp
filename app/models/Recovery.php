<?php
/**
 * Created by PhpStorm.
 * User: perin
 * Date: 20/08/2016
 * Time: 12:35
 */
class Recovery extends \HXPHP\System\Model{

    static $belongs_to = array(
        array('user')
    );

    public static function validar($user_email){
        $callbackObj = new \stdClass;
        $callbackObj->user = null;
        $callbackObj->code = null;
        $callbackObj->status = false;

        $user_exists = User::find_by_email($user_email);

        if(!is_null($user_exists)){
            $callbackObj->status = true;
            $callbackObj->user = $user_exists;

            self::delete_all(array(
                'conditions' => array(
                    'user_id = ?',
                    $user_exists->id
                )
            ));
        }else{
            $callbackObj->code = "nenhum-usuario-encontrado";
        }
        return $callbackObj;
    }

    public static function validarToken($token){
        $callbackObj = new \stdClass;
        $callbackObj->user = null;
        $callbackObj->code = null;
        $callbackObj->status = false;

        $validar = self::find_by_token($token);

        if(!is_null($validar)){
            $callbackObj->status = true;
            $callbackObj->user = $validar->user;
        }else{
            $callbackObj->code = 'token-invalido';
        }

        return $callbackObj;
    }
}