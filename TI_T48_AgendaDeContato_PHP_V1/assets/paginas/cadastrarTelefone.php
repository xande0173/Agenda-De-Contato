<?php
    include './conexao.php';

    if(isset($_POST["enviarTel"]))
    {
        $idContato = $_POST['idContato'];
        $telefoneTipo = $_POST['telefoneTipo'];
        $telefoneDDI = $_POST['telefoneDDI'];
        $telefoneDDD = $_POST['telefoneDDD'];
        $telefoneNro = $_POST['telefoneNro'];
    }

    //preparar o comando sql para enviar ao banco de dados (Tabela Contatos)
    $comandoC = $conexao->prepare("INSERT INTO telefones(Telefone_Nro, Telefone_Tipo, Telefone_DDI, Telefone_DDD, Fk_Id_Contato)
                                                 VALUES (:telefoneNro, :telefoneTipo, :telefoneDDI, :telefoneDDD, :idContato)");
    //bindar os paramentros
    $comandoC->bindParam(':idContato',$idContato);
    $comandoC->bindParam(':telefoneTipo',$telefoneTipo);
    $comandoC->bindParam(':telefoneDDI',$telefoneDDI);
    $comandoC->bindParam(':telefoneDDD',$telefoneDDD);
    $comandoC->bindParam(':telefoneNro',$telefoneNro);

    try
    {
        //executar o comando preparado no banco de dados
        $comandoC->execute();
        print "<script>
                    alert('Inclusão do Telefone realizada com Sucesso!');
                    window.location.href='./../../index.php';
               </script>";

    }
    catch (PDOException $erroC)
    {
        print "<script>
                    alert('Não foi possível incluir o Telefone. Verifique!');
                    window.location.href='./../../index.php';
               </script>";
    }

?>
