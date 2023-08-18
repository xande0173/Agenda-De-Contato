<?php

    if(isset($_POST["EnviarContato"]))
    {
        //recuperar as informações do Form
        $ContatoAcao = $_POST['ContatoAcao'];
    }

    switch($ContatoAcao)
    {
        case '+':
            include './cadastrarContato.php';
            break;
        case '-':
            include './removerContato.php';
          break;
        case '*':
            include './alterarContato.php';
            break;
        default:
            print "<script>
                alert('Não foi possível encontrar a opção desejada. Verifique!');
                window.location.href='./../../index.php';
            </script>";
            break;
      }

?>