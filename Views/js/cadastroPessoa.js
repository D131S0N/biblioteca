jQuery(document).ready(function ($) {
    'use strict';
    // URL base
    var host = window.location.host;
    var protocol = window.location.protocol
    // URL base
    var urlBase = protocol + "//" + host + "/";

    // $.ajax({
    //     url: urlBase + 'cadastro-usuario',
    //     method: 'GET',
    //     dataType: 'json',
    //     contentType: 'application/json',
    //     statusCode: {
    //         200: function (data) {
    //             if (data.update) {
    //                 $('.js-form-register').addClass('js-update-register')
    //                 var register = $('.js-form-register')
    //                 var dados = data.dados

    //                 var enderecos = data.dados.enderecos
    //                 // Padrao-form
    //                 register.find('input[name="email"]').val(dados.email)
    //                 register.find('input[name="telefone"]').val(dados.telefone.residencial)
    //                 register.find('input[name="celular"]').val(dados.telefone.celular)
    //                 register.append('<input type="hidden" name="idEndereco" value="' + enderecos.id + '" />')
    //                 register.find('input[name="cep"]').val(enderecos.cep)
    //                 register.find('input[name="endereco"]').val(enderecos.endereco)
    //                 register.find('input[name="numero"]').val(enderecos.numero)
    //                 register.find('input[name="complemento"]').val(enderecos.complemento)
    //                 register.find('input[name="bairro"]').val(enderecos.bairro)
    //                 register.find('input[name="estado"]').val(enderecos.estado)
    //                 register.find('input[name="cidade"]').val(enderecos.cidade)
    //                 register.find('input[name="nomeEndereco"]').val(enderecos.nomeEndereco)
    //             }
    //         }
    //     }
    // })

    $('.js-form-register').on('submit', function (e) {
        e.preventDefault()

        //   var personType = $(this).find('input[name="tipoPessoa"]:checked').val()

        var register = {
            nome: $(this).find('input[name="nome"]').val(),
            email: $(this).find('input[name="email"]').val(),
            senha: $(this).find('input[name="senha"]').val(),
            documento: $(this).find('input[name="documento"]').val(),
            idade: $(this).find('input[name="idade"]').val(),
            cidade: $(this).find('input[name="cidade"]').val(),
            acao: $(this).find('input[name="acao"]').val(),
        }

        var method = 'POST'
        var urlAjax = urlBase + 'Controllers/checkPost.php'
        console.log(urlAjax)
        // valida se tiver que atualizar cadastro ou criar novo
        if ($(this).hasClass('js-update-register')) {
            method = 'PUT'
            register.endereco.id = $(this).find('input[name="idEndereco"]').val()
        }

        // ajax para cadastro de cliente
        $.ajax({
            url: urlAjax,
            method: method,
            data: JSON.stringify(register),
            dataType: 'json',
            contentType: 'application/json',
            statusCode: {
                400: function (data) {
                    $('.cadastro-pessoa .error input').removeAttr('title')
                    $('.cadastro-pessoa .error').removeClass('error')
                    var errors = data.responseJSON
                    for (var index in errors.mensagens) {
                        var fieldArray = index.split('.')
                        var field = fieldArray[fieldArray.length - 1]
                        var input = $('.cadastro-pessoa input[name="' + field + '"]')
                        input.parent().addClass('error').focus()
                    }
                },
                200: function (data) {
                    window.open(urlBase, '_self')
                },
                201: function (data) {
                    window.open(urlBase, '_self')
                },
                409: function (data) {
                    $('.cadastro-pessoa .error input').removeAttr('title')
                    $('.cadastro-pessoa .error').removeClass('error')
                    var errors = data.responseJSON
                    var index = errors.mensagens.email
                    var input = $('.cadastro-pessoa input[name="email"]')
                    input.parent().addClass('error')
                    alert(index[0])
                }
            }
        })
    })

    // máscara dos campos no form de cadastro
    // $('.cadastro-pessoa input[name="documento"]').mask('000.000.000-00')

    // // autocomplete do form de endereço
    // $('.js-form-register input[name="cep"]').blur(function () {

    //     // nova variável "cep" somente com dígitos
    //     var cep = $(this).val().replace(/\D/g, '');

    //     // verifica se o campo cep possui valor informado
    //     if (cep != '') {

    //         // expressão regular para validar o CEP
    //         var validacep = /^[0-9]{8}$/;

    //         // valida o formato do CEP
    //         if (validacep.test(cep)) {
    //             // preenche os campos com "..." enquanto consulta webservice
    //             $('.js-form-register input[name="endereco"]').val('Aguarde...');
    //             $('.js-form-register input[name="bairro"]').val('Aguarde...');
    //             $('.js-form-register input[name="estado"]').val('Aguarde...');
    //             $('.js-form-register input[name="cidade"]').val('Aguarde...');
    //             $('.btn-cadastrar').attr("disabled", true);

    //             // consulta o webservice viacep.com.br/
    //             $.getJSON('https://viacep.com.br/ws/' + cep + '/json/?callback=?', function (dados) {
    //                 if (!('erro' in dados)) {
    //                     // atualiza os campos com os valores da consulta
    //                     $('.js-form-register input[name="endereco"]').val(dados.logradouro);
    //                     $('.js-form-register input[name="bairro"]').val(dados.bairro);
    //                     $('.js-form-register input[name="estado"]').val(dados.uf);
    //                     $('.js-form-register input[name="cidade"]').val(dados.localidade);
    //                     $('.btn-cadastrar').attr("disabled", false);
    //                 }
    //                 else {
    //                     // CEP pesquisado não foi encontrado
    //                     clearAddressForm();
    //                     alert('CEP não encontrado.');
    //                 }
    //             });
    //         }
    //         else {
    //             // CEP é inválido
    //             clearAddressForm();
    //             alert('Formato de CEP inválido.');
    //         }
    //     }
    //     else {
    //         // CEP sem valor, limpa formulário
    //         clearAddressForm();
    //     }
    // });

    // script para exibir/esconder campos do formulário de cadastro de acordo com o tipo de pessoa (PF ou PJ)
    // var PF = ['nome', 'cpf', 'rg', 'dataNascimento', 'sexo'];
    // var PJ = ['nomeFantasia', 'razaoSocial', 'responsavel', 'cnpj', 'inscricaoEstadual', 'inscricaoMunicipal'];

    // $('input[name="tipoPessoa"]').click(function () {
    //     if ($(this).val() == 'PJ') {
    //         showFields(PJ);
    //         hideFields(PF);
    //     } else {
    //         showFields(PF);
    //         hideFields(PJ);
    //     }
    // });

});

// // limpa valores do formulário de CEP
// function clearAddressForm() {
//     $('.js-form-register input[name="endereco"]').val('');
//     $('.js-form-register input[name="bairro"]').val('');
//     $('.js-form-register input[name="estado"]').val('');
//     $('.js-form-register input[name="cidade"]').val('');
// }

// // exibe os campos do formulário de cadastro dependendo do tipo da pessoa (PF ou PJ)
// function showFields(fields) {
//     fields.forEach(function (field) {
//         $('input[name="' + field + '"]').closest('.grid-item').removeClass('hide');
//     });
// }

// // esconde os campos do formulário de cadastro dependendo do tipo da pessoa (PF ou PJ)
// function hideFields(fields) {
//     fields.forEach(function (field) {
//         $('input[name="' + field + '"]').closest('.grid-item').addClass('hide');
//     });
// }

function chooseComplementarRegister(idTipoCadastro) {
    var host = window.location.host;
    var protocol = window.location.protocol
    // URL base
    var urlBase = protocol + "//" + host + "/";
    // TODO: A função está retornando os dados, é necessário pegar esse retorno e disponibilizar nos campos para o cliente preencher
    // ajax para verficar campos do cadastro complementar
    $.ajax({
        url: urlBase + 'cadastro-complementar/' + idTipoCadastro,
        method: 'GET',
        dataType: 'json',
        contentType: 'application/json',
        statusCode: {
            200: function (data) {
                // seleciona a div onde existirão os campos do cadastro complementar para adicionar os campos
                let complementaryRegistration = document.getElementById('js-complementary-registration')

                // remove o container antigo
                let oldComplementaryRegistrationContainer = document.getElementById('js-complementary-registration-container')
                if (oldComplementaryRegistrationContainer !== null) {
                    oldComplementaryRegistrationContainer.remove()
                }

                // cria o container para adicionar os campos
                complementaryRegistration.insertAdjacentHTML('afterend', '<div id="js-complementary-registration-container"></div>')
                complementaryRegistrationContainer = document.getElementById('js-complementary-registration-container')

                for (const fields of data) {
                    for (const field of fields.campos) {
                        let htmlField = ''
                        let htmlLabel = ''
                        let htmlSpan = ''

                        // seleciona os campos
                        switch (field.tipo) {
                            case 'numero':
                                var obrigatorio = '';
                                if (field.obrigatorio) {
                                    obrigatorio = '*';
                                }
                                // cria o input text
                                htmlField = document.createElement('input')
                                htmlField.setAttribute('id', field.id)
                                htmlField.setAttribute('type', 'text')
                                htmlField.setAttribute('placeholder', obrigatorio + field.nome)
                                htmlField.setAttribute('name', field.nome)
                                htmlField.setAttribute('onkeypress', "return onlynumber();")

                                // cria o label
                                htmlLabel = document.createElement('label')
                                htmlLabel.setAttribute('class', 'grid-item large--one-whole')

                                // adiciona o campo criado no form de cadastro
                                htmlLabel.appendChild(htmlField)
                                complementaryRegistrationContainer.appendChild(htmlLabel)
                                break

                            case 'text':
                                var obrigatorio = '';
                                if (field.obrigatorio) {
                                    obrigatorio = '*';
                                }
                                // cria o input text
                                htmlField = document.createElement('input')
                                htmlField.setAttribute('id', field.id)
                                htmlField.setAttribute('type', field.tipo)
                                htmlField.setAttribute('name', field.nome)
                                htmlField.setAttribute('placeholder', obrigatorio + field.nome)

                                // cria o label
                                htmlLabel = document.createElement('label')
                                htmlLabel.setAttribute('class', 'grid-item large--one-whole')

                                // adiciona o campo criado no form de cadastro
                                htmlLabel.appendChild(htmlField)
                                complementaryRegistrationContainer.appendChild(htmlLabel)
                                break

                            case 'radio':
                                // cria o input radio
                                htmlField = document.createElement('input')
                                htmlField.setAttribute('id', field.id)
                                htmlField.setAttribute('type', field.tipo)
                                htmlField.setAttribute('name', field.nome)
                                break

                            case 'checkbox':
                                // cria o input checkbox
                                htmlField = document.createElement('input')
                                htmlField.setAttribute('id', field.id)
                                htmlField.setAttribute('type', field.tipo)
                                htmlField.setAttribute('name', field.nome)

                                // cria o label
                                htmlLabel = document.createElement('label')
                                htmlLabel.setAttribute('class', 'checkbox-field')
                                htmlSpan = document.createElement('span')
                                htmlSpan.innerHTML = field.nome

                                // adiciona o campo criado no form de cadastro
                                htmlLabel.appendChild(htmlField)
                                htmlLabel.appendChild(htmlSpan)
                                complementaryRegistrationContainer.appendChild(htmlLabel)
                                break

                            case 'file':
                                // cria elemento input type file
                                htmlField = document.createElement('input')
                                htmlField.setAttribute('id', field.id)
                                htmlField.setAttribute('type', field.tipo)
                                htmlField.setAttribute('name', field.nome)
                                htmlField.setAttribute('onchange', 'encode(' + field.id + ')');

                                // cria o label
                                htmlLabel = document.createElement('label')
                                htmlLabel.setAttribute('class', 'grid-item large--one-whole')
                                // adiciona o campo criado no form de cadastro
                                htmlLabel.appendChild(htmlField)

                                htmlField = document.createElement('input')
                                htmlField.setAttribute('id', 'file-' + field.id)
                                htmlField.setAttribute('type', 'hidden')

                                htmlLabel.appendChild(htmlField)

                                complementaryRegistrationContainer.appendChild(htmlLabel)

                                break

                            case 'select':
                                // cria elemento input type file
                                htmlField = document.createElement('select')
                                htmlField.setAttribute('id', field.id)
                                htmlField.setAttribute('type', field.tipo)
                                htmlField.setAttribute('name', field.nome)

                                for (const option of field.opcoes) {
                                    optionField = document.createElement('option');
                                    optionField.text = option;
                                    optionField.setAttribute('value', option);
                                    htmlField.add(optionField);
                                }
                                // cria o label
                                htmlLabel = document.createElement('label')
                                htmlLabel.setAttribute('class', 'grid-item large--one-whole select-field')
                                // adiciona o campo criado no form de cadastro
                                htmlLabel.appendChild(htmlField)
                                complementaryRegistrationContainer.appendChild(htmlLabel)

                                break

                            default:
                                break
                        }
                    }
                }
            },
            400: function (data) {
            }
        }
    })

}

function getBase64(file, onLoadCallback) {
    return new Promise(function (resolve, reject) {
        var reader = new FileReader();
        reader.onload = function () { resolve(reader.result); };
        reader.onerror = reject;
        reader.readAsDataURL(file);
    });
}

function encode(id) {
    var selectedfile = document.getElementById(id).files;
    if (selectedfile.length > 0) {
        var imageFile = selectedfile[0];
        var fileReader = new FileReader();
        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result;
            // var newImage = document.createElement('img');
            // newImage.src = srcData;
            document.getElementById("file-" + id).value = srcData;
        }
        fileReader.readAsDataURL(imageFile);
    }
}

//permite somente números no input
function onlynumber(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /^[0-9.]+$/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}
