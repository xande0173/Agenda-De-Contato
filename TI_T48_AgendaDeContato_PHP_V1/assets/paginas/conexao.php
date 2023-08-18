<?php
    $SGBD_Escolhido = "MySQL";
    //$SGBD_Escolhido = "SQLServer";

    $servidorSQLSrv = 'localhost';
    $servidorMySQL = 'localhost';
    $bancoDeDadosSQLSrv = 'AgendaDeContato';
    $bancoDeDadosMySQL = 'AgendaDeContato';
    $usuarioSQLSrv = 'sa';
    $usuarioMySQL = 'root';
    $senhaSQLSrv = 'senac111';
    $senhaMySQL = '';
 
    $stringPDOSQLSrv = "sqlsrv:Server=".$servidorSQLSrv."; Database=".$bancoDeDadosSQLSrv;
    $stringPDOMySQL = "mysql:host=".$servidorMySQL."; dbname=".$bancoDeDadosMySQL;
    
    try
    {
        if($SGBD_Escolhido == "SQLServer")
        {
            $conexao = new PDO($stringPDOSQLSrv, $usuarioSQLSrv, $senhaSQLSrv);
        }
        else
        {
            $conexao = new PDO($stringPDOMySQL, $usuarioMySQL, $senhaMySQL);
        }

    }
    catch(PDOException $erro)
    {
        print "<script>alert('Erro ao conectar no banco de dados, entre em contato com o suporte do sistema.')</script>";
    }

?>
