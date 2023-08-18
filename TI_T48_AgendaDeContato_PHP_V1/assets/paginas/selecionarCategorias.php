<?php

$flagAtivo = 0;

try
    {
        //preparar o comando sql para enviar ao banco de dados
        $comandoCat = $conexao->prepare("SELECT * FROM categorias
                                          WHERE Flag = :flag");

        //bindar os paramentros
        $parametrosCat = 
        [
            'flag' => $flagAtivo,
        ];

        //executar o comando preparado no banco de dados
        $comandoCat->execute($parametrosCat);

    }
    catch(PDOException $erro)
    {
        print "<script>
                   alert('Erro ao selecionar conteudo da tabela 
                          categorias no banco de dados. Verifique!')
               </script>";
    }
?>
