// JavaScript Document

   $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#EnderecoUF").val("");
                $("#EnderecoCidade").val("");
                $("#EnderecoBairro").val("");
                $("#EnderecoRua").val("");
                
            }
            
            //Quando o campo cep perde o foco.
            $("#CEPContato").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#EnderecoUF").val("...");
                        $("#EnderecoCidade").val("...");
                        $("#EnderecoBairro").val("...");
                        $("#EnderecoRua").val("...");
                       

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#EnderecoUF").val(dados.uf);
                                $("#EnderecoCidade").val(dados.localidade);
                                $("#EnderecoBairro").val(dados.bairro);
                                $("#EnderecoRua").val(dados.logradouro);
                                
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    
$(document).ready(function() {
    $('form#cadastra').bind("keypress", function(e) {
        if ((e.keyCode == 10)||(e.keyCode == 13)) {
            e.preventDefault();
        }
    });
});
