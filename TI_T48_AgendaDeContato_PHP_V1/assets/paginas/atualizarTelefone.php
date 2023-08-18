<?php
    include './conexao.php';

    if(isset($_POST["enviarTel"]))
    {
        $telefoneAcao = $_POST['telefoneAcao'];
        $idContato = $_POST['idContato'];
        $telefoneTipo = $_POST['telefoneTipo'];
        $telefoneDDI = $_POST['telefoneDDI'];
        $telefoneDDD = $_POST['telefoneDDD'];
        $telefoneNro = $_POST['telefoneNro'];
    }

    $flagAtivo = 0;
    $flagExcluido = 9;

    $flagTelefone = 0;

    //preparar o comando sql para enviar ao banco de dados (Tabela Contatos)
    if($telefoneAcao == "+")
    {
        $flagTelefone = $flagAtivo;
        $comandoT = $conexao->prepare("INSERT INTO telefones(Telefone_Nro, Telefone_Tipo, Telefone_DDI, Telefone_DDD, Fk_Id_Contato, Flag)
                                                     VALUES (:telefoneNro, :telefoneTipo, :telefoneDDI, :telefoneDDD, :idContato, :flag)");
    }
    else
    {
        $flagTelefone = $flagExcluido;
        $comandoT = $conexao->prepare("UPDATE telefones SET Flag = :flag
                                        WHERE Fk_Id_Contato = :idContato
                                          AND Telefone_Tipo = :telefoneTipo
                                          AND Telefone_DDI = :telefoneDDI
                                          AND Telefone_DDD = :telefoneDDD
                                          AND Telefone_Nro = :telefoneNro");
    }
    //bindar os paramentros
    $parametrosT =
    [
        'flag' => $flagTelefone,
        'idContato' => $idContato,
        'telefoneTipo' => $telefoneTipo,        
        'telefoneDDI' => $telefoneDDI,        
        'telefoneDDD' => $telefoneDDD,        
        'telefoneNro' => $telefoneNro,            
    ];

    try
    {
        //executar o comando preparado no banco de dados
        $comandoT->execute($parametrosT);
        print "<script>
                    window.location.href='./../../index.php';
               </script>";

    }
    catch (PDOException $erroT)
    {
        print "<script>
                    alert('Não foi possível Atualizar o Telefone. Verifique!');
                    window.location.href='./../../index.php';
               </script>";
    }

?>
