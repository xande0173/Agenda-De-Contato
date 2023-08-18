<?php
    //definir o criterio de pesquisa (WHERE)
    $flagAtivo = 0;
    $flagExcluido = 9;

    try
    {
        //preparar o comando sql para enviar ao banco de dados
        $comandoL = $conexao->prepare("SELECT contatos.*, telefones.* FROM contatos, telefones 
                                       WHERE contatos.Flag = :flag
                                         AND telefones.Flag = :flag 
                                         AND contatos.Id_Contato = telefones.Fk_Id_Contato
                                       ORDER BY contatos.Fk_Categoria ASC,
                                                contatos.Contato_Nome ASC,
                                                telefones.Telefone_Tipo DESC,
                                                telefones.Telefone_DDI ASC,
                                                telefones.Telefone_DDD ASC,
                                                telefones.Telefone_Nro ASC"); 

        //bindar os paramentros
        //$comando->bindParam(':flag',$flagAtivo);

        $parametrosL = ['flag' => $flagAtivo,];

        //executar o comando preparado no banco de dados
        $comandoL->execute($parametrosL);

    }
    catch(PDOException $erro)
    {
        print "<script>alert('Erro ao selecionar conteudo da tabela contatos no banco de dados. Verifique!')</script>";
    }

    print "<table id='minhaTabela'>";
    print "<colgroup>";
    print "<col span='8' class='colVisivel'>";
    print "<col span='8' class='colOculta'>";
    print "</colgroup>";
    print "<tr id='0'>";
    print "<th>Cat</th>";
    print "<th>ID</th>";
    print "<th>Nome_do_Contato</th>";
    print "<th>Telefone Tipo</th>";
    print "<th>Telefone DDI</th>";
    print "<th>Telefone DDD</th>";
    print "<th>Telefone Nro</th>";
    print "<th>Email</th>";
    print "<th class='colOculta'>CEP</th>";
    print "<th class='colOculta'>UF</th>";
    print "<th class='colOculta'>Cidade</th>";
    print "<th class='colOculta'>Bairro</th>";
    print "<th class='colOculta'>Rua</th>";
    print "<th class='colOculta'>Nro</th>";
    print "<th class='colOculta'>Compl</th>";
    print "<th class='colOculta'>Favorito</th>";
    print "<th>Excluir</th>";
    print "<th>Atualizar</th>";
    print "<th>Mais Fones</th>";
    print "</tr>";

    //Processar o resultado obtido 
    if($comandoL != "")
    {
        $Id_Anterior = 0;

        $IdSeq = 0;
        while($linha = $comandoL->fetch(PDO::FETCH_OBJ))
        {
            if($linha->Id_Contato == $Id_Anterior)
            {
                $IdSeq++;
            }
            else
            {
                $IdSeq = 1;
            }
            $IdStr = "00000";
            $IdStr = $IdStr.$linha->Id_Contato;
            $IdParte1 = substr($IdStr,-5);
            $IdStr = "00000";
            $IdStr = $IdStr.$IdSeq;
            $IdParte2 = substr($IdStr,-5);
            $IdContatoLinha = $IdParte1.$IdParte2;
            print "<tr id=".$IdContatoLinha.">";
            //print "<script>alert($linha->Id_Contato + ' - ' + $Id_Anterior)</script>";
            if($linha->Id_Contato == $Id_Anterior)
            {
                print "<td>".""."</td>";
                print "<td>".""."</td>";
                print "<td>".""."</td>";
                print "<td>".$linha->Telefone_Tipo."</td>";
                print "<td>".$linha->Telefone_DDI."</td>";
                print "<td>".$linha->Telefone_DDD."</td>";
                print "<td>".$linha->Telefone_Nro."</td>";
                print "<td>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
                print "<td class='colOculta'>".""."</td>";
            }
            else
            {
                print "<td class='colVisivel'>".$linha->Fk_Categoria."</td>";
                print "<td class='colVisivel'>".$linha->Id_Contato."</td>";
                print "<td class='colVisivel'>".$linha->Contato_Nome."</td>";
                print "<td class='colVisivel'>".$linha->Telefone_Tipo."</td>";
                print "<td class='colVisivel'>".$linha->Telefone_DDI."</td>";
                print "<td class='colVisivel'>".$linha->Telefone_DDD."</td>";
                print "<td class='colVisivel'>".$linha->Telefone_Nro."</td>";
                print "<td class='colVisivel'>".$linha->Email."</td>";
                print "<td class='colOculta'>".$linha->CEP_Contato."</td>";
                print "<td class='colOculta'>".$linha->Endereco_UF."</td>";
                print "<td class='colOculta'>".$linha->Endereco_Cidade."</td>";
                print "<td class='colOculta'>".$linha->Endereco_Bairro."</td>";
                print "<td class='colOculta'>".$linha->Endereco_Rua."</td>";
                print "<td class='colOculta'>".$linha->Endereco_Nro."</td>";
                print "<td class='colOculta'>".$linha->Endereco_Compl."</td>";
                print "<td class='colOculta'>".$linha->Favorito."</td>";
            }
            print "<td class='colVisivel'><button class='remove-btn' onclick='RemoverContato(this)'>Remover</button></td>";
            print "<td class='colVisivel'><button class='altera-btn' onclick='AlterarContato(this)'>Alterar</button></td>";
            print "<td class='colVisivel'>";
            print      "<button class='incfone-btn' onclick='IncluirTelefone(this)'>+Fones</button>";
            print      "<button class='excfone-btn' onclick='RemoverTelefone(this)'>-Fones</button>";
            print "</td>";
            print"</tr>";
            $Id_Anterior = $linha->Id_Contato;
        }
    }
    else
    {
        print("Tabela sem conteúdo");
    }
    print "</table>";

?>