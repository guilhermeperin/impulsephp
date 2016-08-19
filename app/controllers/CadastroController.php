<?php
/**
 * Created by PhpStorm.
 * User: perin
 * Date: 19/08/2016
 * Time: 15:00
 */
class CadastroController extends \HXPHP\System\Controller{
    public function cadastrarAction(){
        $this->view->setFile('index');

        $this->request->setCustomFilters(array(
            'email' => FILTER_VALIDATE_EMAIL
        ));

        $post = $this->request->post();
        if(!empty($post)) {
            $cadastrarUsuario = User::cadastrar($post);

            if($cadastrarUsuario->status==false){
                $this->load('Helpers\Alert',array(
                    'danger',
                    'Ops! não foi possível efetuar seu cadastro. Verifique os erros abaixo:',
                    $cadastrarUsuario->errors

                ));
            }
        }
        //var_dump($this->request->post());
        //Gerar senha
        //Obter role_id
    }
}