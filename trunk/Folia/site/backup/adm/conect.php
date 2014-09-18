<?php
	/*
	// Conectando a um Banco de Dados Simples.
	// Aqui, temos o campo mysql_connect, nele temos 3 variaveis, 1a é o Endereço do Servidor,
	// 2a é o Usuário que você deseja utilizar e a terceira é a senha deste usuário.
	// Lembrando que tudo isso está no seu gerenciador de banco de dados ! 
	*/
	
	/*
	// Desenvolvido por Pedro Nicodemos - Rio de Janeiro - 2011 
	// pedro.augusto.nicodemos@gmail.com
	*/
	
	//header('Content-Type: text/html; charset=utf-8'); // UTF-8
	
	ini_set('default_charset','UTF-8'); // Para o charset das páginas e
		
	$link = mysql_connect("mysql.foliadeluz.org.br","foliadeluz","safari");

	/*
	// Uma pequena verificação para confirmar a conexão
	*/

	if($link == true)
	{

		/*
		// Depois temos a conexão ao banco de dados desejado (dentro do servidor mysql)
		// No caso, mysql_select_db("nome_do_banco");
		// e o if manda o comando de erro caso ele não consiga entrar.
		*/
	
		$link2 = mysql_select_db("foliadeluz");
		
		if($link2==true)
		{
			$retorna = "Conectado";
			mysql_query("SET NAMES 'utf8'");
       	 	mysql_query('SET character_set_connection=utf8');
        	mysql_query('SET character_set_client=utf8');
        	mysql_query('SET character_set_results=utf8');
		}
		else
		{
			$retorna = mysql_error();
		}
	}
	else
	{
		/*
		// Aqui o Erro é enviado, caso não se conecte ao servidor do banco de dados.
		*/
		
		$retorna = mysql_error();
	}
?>
