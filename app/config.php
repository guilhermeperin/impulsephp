<?php
	//Constantes
	$configs = new HXPHP\System\Configs\Config;

	//desenvolvimento
    $configs->env->add('development');
    $configs->env->development->baseURI = '/impulsephp/';
    $configs->env->development->database->setConnectionData([
        'host' => 'ssh.alanweingartner.com.br',
        'user' => 'root',
        'password' => 'impulsedatabase',
        'dbname' => 'impulse'
    ]);

    $configs->env->development->auth->setURLs('/impulsephp/home/','/impulsephp/login/');

    //especificação dos menus (níveis de acesso dos usuários)
    //a seguir, dashboard é o nome do ícone do font-awesome
    $configs->env->development->menu->setMenus(array(
        'Home/dashboard' => '%baseURI%/home',
        'Link/user' => 'http://www.google.com',
        'Submenus/cog' => array(
            'Painel/dashboard' => '%baseURI%/home',
            'Atualizações/hand-o-up' => '%baseURI%/atualizacoes'
        )
    ),'administrador');

    $configs->env->development->menu->setMenus(array(
        'Home/dashboard' => '%baseURI%/home',
    ));

    $configs->env->development->menu->setConfigs(array(
        'container' => 'nav',
        'container_class' => 'navbar navbar-default',
        'menu_class' => 'nav navbar-nav'
    ));

    //produção
   /* $configs->env->add('production');
    $configs->env->production->baseURI = '/';
    $configs->env->production->database->setConnectionData([
        'host' => 'ssh.alanweingartner.com.br',
        'user' => 'root',
        'password' => 'impulsedatabase',
        'dbname' => 'impulse'
    ]);

    $configs->env->production->auth->setURLs('/home/','/login/');*/

	/*
		//Globais
		$configs->title = 'Titulo customizado';

		//Configurações de Ambiente - Desenvolvimento
		$configs->env->add('development');

		$configs->env->development->baseURI = '/hxphp/';

		$configs->env->development->database->setConnectionData([
			'driver' => 'mysql',
			'host' => 'localhost',
			'user' => 'root',
			'password' => '',
			'dbname' => 'hxphp',
			'charset' => 'utf8'
		]);

		$configs->env->development->mail->setFrom([
			'from' => 'Remetente',
			'from_mail' => 'email@remetente.com.br'
		]);

		$configs->env->development->menu->setConfigs([
			'container' => 'nav',
			'container_class' => 'navbar navbar-default',
			'menu_class' => 'nav navbar-nav'
		]);

		$configs->env->development->menu->setMenus([
			'Home/home' => '%siteURL%',
			'Subpasta/folder-open' => [
				'Home/home' => '%baseURI%/admin/have-fun/',
				'Teste/home' => '%baseURI%/admin/index/',
			]
		]);

		$configs->env->development->auth->setURLs('/hxphp/home/', '/hxphp/login/');
		$configs->env->development->auth->setURLs('/hxphp/admin/home/', '/hxphp/admin/login/', 'admin');

		//Configurações de Ambiente - Produção
		$configs->env->add('production');

		$configs->env->production->baseURI = '/';

		$configs->env->production->database->setConnectionData([
			'driver' => 'mysql',
			'host' => 'localhost',
			'user' => 'usuariodobanco',
			'password' => 'senhadobanco',
			'dbname' => 'hxphp',
			'charset' => 'utf8'
		]);

		$configs->env->production->mail->setFrom([
			'from' => 'Remetente',
			'from_mail' => 'email@remetente.com.br'
		]);
	*/


	return $configs;
