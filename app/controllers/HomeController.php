<?php
/**
 * Created by PhpStorm.
 * User: perin
 * Date: 20/08/2016
 * Time: 16:48
 */
class HomeController extends \HXPHP\System\Controller
{
    public function __construct($configs)
    {
        parent::__construct($configs);

        $this->load(
            'Services\Auth',
            $configs->auth->after_login,
            $configs->auth->after_logout,
            true
        );

        $this->auth->redirectCheck();

        $user_id = $this->auth->getUserId();

        $this->view->setTitle('HXPHP - Administrativa')->setVar('user', User::find($user_id));
    }

    public function bloqueadaAction(){
        $this->auth->roleCheck(array(
            'administrador',
            'usuario',
            'avaliador',
            'empresa'
        ));
    }
}