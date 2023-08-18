
const categoria = document.getElementById('categoria');
const usuario = document.getElementById('usuario');
const contato = document.getElementById('contato');
const telefone = document.getElementById('telefone');

function Left(str, n)
{
	if (n <= 0)
    {
	    return "";
    }
	else if (n > String(str).length)
         {
	        return str;
         }
	     else
         {
	        return String(str).substring(0,n);
         }
}

function Right(str, n)
{
    if (n <= 0)
    {
        return "";
    }
    else if (n > String(str).length)
    {
        return str;
    }
    else
    {
       var iLen = String(str).length;
       return String(str).substring(iLen, iLen - n);
    }
}

onpageshow = (EsconderForms());

function EsconderForms()
{
    categoria.classList.remove('mostrar');
    categoria.classList.add('esconder');
    usuario.classList.remove('mostrar');
    usuario.classList.add('esconder');
    contato.classList.remove('mostrar');
    contato.classList.add('esconder');
    telefone.classList.remove('mostrar');
    telefone.classList.add('esconder');
}

function HabilitarFormCategoria()
{
    categoria.classList.remove('esconder');
    categoria.classList.add('mostrar');
}

function HabilitarFormUsuario()
{
    usuario.classList.remove('esconder');
    usuario.classList.add('mostrar');
}

function HabilitarFormContato()
{
    contato.classList.remove('esconder');
    contato.classList.add('mostrar');
}

function HabilitarFormTelefone()
{
    telefone.classList.remove('esconder');
    telefone.classList.add('mostrar');
}

function IncluirTelefone(componente)
{

    let contatoForm = componente.parentNode.parentNode.id;
    let idContatoForm = document.getElementById('idContato');
    let telefoneAcao = document.getElementById("telefoneAcao");
    idContatoForm.value = Left(contatoForm,5);
    telefoneAcao.value = "+";
    $('#telefoneTipo').prop('readonly', false);
    $('#telefoneDDI').prop('readonly', false);
    $('#telefoneDDD').prop('readonly', false);
    $('#telefoneNro').prop('readonly', false);
    HabilitarFormTelefone();

}

function RemoverTelefone(componente)
{
    var contatoLin = componente.parentNode.parentNode.id;
    
    //Recuperando o sincronismo das linhas da tabela (JS/HTML)
    var contatoLinha = document.getElementById(contatoLin);
    var colunas = contatoLinha.getElementsByTagName("td");

    //Coletando as informações do formulário HTML
    var telefoneTipoCol = colunas[3].innerHTML;
    var telefoneDDICol = colunas[4].innerHTML;
    var telefoneDDDCol = colunas[5].innerHTML;
    var telefoneNroCol = colunas[6].innerHTML;

    //Preenchendo o formulário do telefone HTML
    var telefoneAcao = document.getElementById("telefoneAcao");
    var idContato = document.getElementById('idContato');
    var telefoneTipo = document.getElementById('telefoneTipo');

    var telefoneDDI = document.getElementById('telefoneDDI');
    var telefoneDDD = document.getElementById('telefoneDDD');
    var telefoneNro = document.getElementById('telefoneNro');

    telefoneAcao.value = "-";
    idContato.value = Left(contatoLin,5);

    if (telefoneTipoCol == 0)
    {
        $('#telFixo').prop("checked", true);
    }       
    else
    {
        $('#telMovel').prop("checked", true);
    }

    //telefoneTipo.value = telefoneTipoCol;
    telefoneDDI.value = telefoneDDICol;
    telefoneDDD.value = telefoneDDDCol;
    telefoneNro.value = telefoneNroCol;

    $('#telefoneTipo').prop('readonly', true);
    $('#telefoneDDI').prop('readonly', true);
    $('#telefoneDDD').prop('readonly', true);
    $('#telefoneNro').prop('readonly', true);

    telefoneTipo.classList.add('esconder');

    HabilitarFormTelefone();
}


function ContatoNovo()
{
    $('#ContatoAcao').val("+");

    $("#FkUsuario").val("Erich");

    $('#TelefoneTipo1').prop('disabled', false);
    $('#TelefoneDDI1').prop('readonly', false);
    $('#TelefoneDDD1').prop('readonly', false);
    $('#TelefoneNro1').prop('readonly', false);

    HabilitarFormContato();
}



function RemoverContato(componente)
{
    var contatoLin = componente.parentNode.parentNode.id;
    
    
    var parte1 = Left(contatoLin,5);
    var parte2 = '00001' ;

    contatoLin = parte1+parte2;

    var contatoLinha = document.getElementById


    var telefoneTipoCol = colunas[3].innerHTML;
    var telefoneDDICol = colunas[4].innerHTML;
    var telefoneDDDCol = colunas[5].innerHTML;
    var telefoneNroCol = colunas[6].innerHTML;

    //Preenchendo o formulário do telefone HTML
    var telefoneAcao = document.getElementById("telefoneAcao");
    var idContato = document.getElementById('idContato');
    var telefoneTipo = document.getElementById('telefoneTipo');

    var telefoneDDI = document.getElementById('telefoneDDI');
    var telefoneDDD = document.getElementById('telefoneDDD');
    var telefoneNro = document.getElementById('telefoneNro');

    telefoneAcao.value = "-";
    idContato.value = Left(contatoLin,5);

    if (telefoneTipoCol == 0)
    {
        $('#telFixo').prop("checked", true);
    }       
    else
    {
        $('#telMovel').prop("checked", true);
    }

    //telefoneTipo.value = telefoneTipoCol;
    telefoneDDI.value = telefoneDDICol;
    telefoneDDD.value = telefoneDDDCol;
    telefoneNro.value = telefoneNroCol;

    $('#telefoneTipo').prop('readonly', true);
    $('#telefoneDDI').prop('readonly', true);
    $('#telefoneDDD').prop('readonly', true);
    $('#telefoneNro').prop('readonly', true);

    telefoneTipo.classList.add('esconder');

    HabilitarFormTelefone();
}