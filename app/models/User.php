<?php
/**
 * Created by PhpStorm.
 * User: perin
 * Date: 19/08/2016
 * Time: 15:47
 */
class User extends \HXPHP\System\Model{

    static $validates_presence_of = array(
        array('name', 'message' => 'O nome de usuário é um campo obrigatório'),
        array('email', 'message' => 'O email é um campo obrigatório'),
        array('password', 'message' => 'A senha é um campo obrigatório')
    );

    static $validates_uniqueness_of = array(
       array(
           array('email'),  'message' => 'Este email já está sendo usado')
    );

    public static function cadastrar(array $post){
        $userObj = new \stdClass;
        $userObj -> user = null;
        $userObj -> status = false;
        $userObj -> errors = array();

        $role = Role::find_by_role('avaliador');

        if(is_null($role)){
            array_push($userObj->errors,'A role user não existe.');
            return $userObj;
        }

        $post = array_merge($post, array(
            'role_id' => $role -> id,
            'status' => 1
        ));

        $password = \HXPHP\System\Tools::hashHX($post['password']);

        $post = array_merge($post, $password);

        $cadastrar = self::create($post);

        if($cadastrar->is_valid()){
            $userObj -> user = $cadastrar;
            $userObj -> status = true;
            return $userObj;
        }

        $errors = $cadastrar->errors->get_raw_errors();
        foreach($errors as $field=>$message){
            array_push($userObj->errors,$message[0]);
        }

        return $userObj;
    }
}