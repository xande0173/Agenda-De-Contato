
<?php include './assets/paginas/conexao.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/agendaDeContato.css">
    <title>AgendaDeContatoV1</title>
</head>
<body>
    <header>
        <nav id="nav">
            Agenda de Contatos (V1)
            <div>
                <div id="menu">
                    <button onclick="ContatoNovo()">Novo Contato</button>
                    <button onclick="UsuarioNovo()">Novo Usuario</button>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="categoria">

        </section>
        <section id="usuario">

        </section>
        <section id="contato">
        <form action="./assets/paginas/atualizarContato.php" method="POST">
<!--            <form action="./assets/paginas/cadastrarContato.php" method="POST">-->
                <div id="entradaDeDadosContato">
                    <div class="divSup">
                        <input id="ContatoAcao" name="ContatoAcao" class="input-text" type="hidden"/>
                        <input id="IdContato" name="IdContato" class="input-text" type="hidden"/>
                        <input id="FkUsuario" name="FkUsuario" class="input-text" placeholder="Usuario LogIn" type="text" maxlength="10" readonly/>
                        <input id="ContatoNome" name="ContatoNome" class="input-text" placeholder="Nome do Contato" type="text" maxlength="100" required autofocus />
                        <input id="Email" name="Email" class="input-text" placeholder="Email" type="email" maxlength="100" required />
                        <input id="CEPContato" name="CEPContato" class="input-text" placeholder="CEP" type="number" maxlength="8" required />
                    </div>
                    <div class="divInf">
                        <input id="EnderecoUF" name="EnderecoUF" class="input-text" placeholder="Endereco UF" type="text" maxlength="200" />
                        <input id="EnderecoCidade" name="EnderecoCidade" class="input-text" placeholder="Endereco Cidade" type="text" maxlength="200" />
                        <input id="EnderecoBairro" name="EnderecoBairro" class="input-text" placeholder="Endereco Bairro" type="text" maxlength="200" />
                        <input id="EnderecoRua" name="EnderecoRua" class="input-text" placeholder="Endereco Rua" type="text" maxlength="200" />
                        <input id="EnderecoNro" name="EnderecoNro" class="input-text" placeholder="Numero" type="text" maxlength="20" required />
                        <input id="EnderecoCompl" name="EnderecoCompl" class="input-text" placeholder="Complemento" type="text" maxlength="50" required />
                        <?php include './assets/paginas/selecionarCategorias.php';?>
                        <fieldset class="input-text">Categoria
                            <select name="FkCategoria" id="FkCategoria">
                                <?php
                                    while($linhaCat = $comandoCat->fetch(PDO::FETCH_OBJ))
                                    {
                                ?>
                                    <option value="<?php echo "$linhaCat->categoria_Id" ?>">
                                        <?php echo "$linhaCat->Categoria_Descricao" ?>
                                    </option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="divTel">
                        <fieldset id="TelefoneTipo1" class="input-text">Telefone

                            <input type="radio" name="TelefoneTipo1" value="0"/>Fixo

                            <input type="radio" name="TelefoneTipo1" value="1"/>Móvel
                        </fieldset>
                        <!--<input id="TelefoneTipo1" name="TelefoneTipo1" class="input-text" placeholder="Tipo Telefone" type="number" maxlength="11" required />-->
                        <input id="TelefoneDDI1" name="TelefoneDDI1" class="input-text" placeholder="Telefone DDI" type="number" maxlength="11" required />
                        <input id="TelefoneDDD1" name="TelefoneDDD1" class="input-text" placeholder="Telefone DDD" type="number" maxlength="11" required />
                        <input id="TelefoneNro1" name="TelefoneNro1" class="input-text" placeholder="Telefone Nro" type="number" maxlength="11" required />
                    </div>
                    <!--<input class="input-btn" type="submit" name="Enviar" value="Enviar" onclick="return addToTable()" />-->
                    <input class="input-btn" type="submit" name="EnviarContato" value="Enviar"/>
                </div>
            </form>
        </section>
        <section id="telefone">
            <form action="./assets/paginas/atualizarTelefone.php" method="POST">
                <div id="entradaDeDadosT">
                    <input id="telefoneAcao" name="telefoneAcao" class="input-text" type="hidden"/>
                    <input id="idContato" name="idContato" class="input-text" placeholder="Id do Contato" type="number" readonly/>

                    <fieldset id="telefoneTipo" class="input-text">Telefone
                        <input id="telFixo" type="radio" name="telefoneTipo" value="0"/>Fixo
                        <input id="telMovel" type="radio" name="telefoneTipo" value="1"/>Móvel
                    </fieldset>


<!--                    <input id="telefoneTipo" name="telefoneTipo" class="input-text" placeholder="Tipo do Telefone" type="number" required autofocus/>-->
                    <input id="telefoneDDI" name="telefoneDDI" class="input-text" placeholder="Telefone DDI" type="number" required />
                    <input id="telefoneDDD" name="telefoneDDD" class="input-text" placeholder="Telefone DDD" type="number" required />
                    <input id="telefoneNro" name="telefoneNro" class="input-text" placeholder="Telefone Número" type="number" required />
                    <input class="input-btn" type="submit" name="enviarTel" value="EnviarTel"/>
                </div>
            </form>
        </section>
        <section id="tabela">
            <?php include './assets/paginas/listarContatos.php';?>
        </section>
    </main>
    <footer>

    </footer>
    <script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="./assets/js/main.js"></script>
    <script src='./assets/js/agendaDeContato.js'></script>
</body>
</html>