<?php
include '../Models/conecta.php';

?>

<script src="/js/elements/form-register.js" type="text/javascript"></script>

<form accept-charset="UTF-8" id="create_customer" class="grid-item form-default form-register js-form-register" method="post" enctype="multipart/form-data">
  <fieldset class="grid client-data">
    
    <div class="grid--full">
      <div class="grid-item radio-field type-person">
        <span>TIPO DE PESSOA:</span>
        <label>
          <input type="radio" value="PF" name="tipoPessoa" checked>
          <span>Pessoa Física</span>
        </label>
        <label>
          <input type="radio" value="PJ" name="tipoPessoa">
          <span>Pessoa Jurídica</span>
        </label>
      </div>
    </div>

    <label class="grid-item large--one-whole hide">
      <input type="text" value="" name="nomeFantasia" id="" placeholder="Nome fantasia">
    </label>
    <label class="grid-item large--one-whole hide">
      <input type="text" value="" name="razaoSocial" id="" placeholder="Razão social">
    </label>
    <label class="grid-item large--one-whole hide">
      <input type="text" value="" name="cnpj" id="" placeholder="CNPJ">
    </label>
    <label class="grid-item large--one-whole hide">
      <input type="text" value="" name="responsavel" id="" placeholder="Responsável">
    </label>
    <label class="grid-item large--one-whole hide">
      <input type="text" value="" name="inscricaoEstadual" id="" placeholder="Inscrição estadual">
    </label>
    <label class="grid-item large--one-whole hide">
      <input type="text" value="" name="inscricaoMunicipal" id="" placeholder="Inscrição municipal">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="nome" id="name" placeholder="*Nome">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="cpf" id="cpf" placeholder="*CPF">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="rg" id="rg" placeholder="*RG">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="dataNascimento" id="date-of-birth" placeholder="*Data de nascimento">
    </label>
    <div class="grid-item large--one-whole radio-field gender">
      <span>Sexo</span>
      <label>
        <input type="radio" value="masculino" name="sexo">
        <span>Masculino</span>
      </label>
      <label>
        <input type="radio" value="feminino" name="sexo">
        <span>Feminino</span>
      </label>
    </div>
    
    {% unless cadastroComplementar.dados %}
      <div id="js-complementary-registration" class="grid-item large--one-whole select-field">
        <select name="" id="id-tipo-cadastro" onchange="chooseComplementarRegister(document.getElementById('id-tipo-cadastro').value)">
          <option value="Selecione" selected>Selecione</option>
          {% for tipoCadastro in cadastroComplementar %}
            {% assign tipoComplementar = tipoCadastro.tipo | downcase %}
            {% if tipoComplementar == 'cliente' %}
              <option value="{{tipoCadastro.id}}">{{tipoCadastro.nome}}</option>
            {% endif %}
            {% else %}
              {% comment %} evita gerar um erro no for por objeto vazio {% endcomment %}
          {% endfor %}
        </select>
      </div>
    {% endunless %}
    {% comment %} <!-- TODO: caso vier um campo do tipo UPLOAD, adicionar um segundo input, tipo esse <input type="hidden" name="file" id="file"> para que o js passe o novo valor para uma variável -->
    <!-- TODO: quando o cliente ir na tela "meus dados" virá os dados do cadastro complementar dentro dos dados do cliente, no indíce 'cadastroComplementar' --> {% endcomment %}
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="telefone" id="telephone" placeholder="*Telefone">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="celular" id="cell-phone" placeholder="Celular">
    </label>
    <label class="grid-item large--one-whole">
      <input type="email" value="{{ cadastro.dados.email }}" name="email" id="email" placeholder="*E-mail">
    </label>
    <label class="grid-item large--one-whole">
      <input type="password" value="" name="senha" id="password" placeholder="*Senha">
    </label>
    <div class="grid-item large--one-whole radio-field newsletter-check">
      <span>Receber material promocional</span>
      <label>
        <input type="radio" value="Sim" name="rmp">
        <span>SIM</span>
      </label>
      <label>
        <input type="radio" value="Não" name="rmp">
        <span>NÃO</span>
      </label>
    </div>
  </fieldset>
  <fieldset class="grid address">
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="nomeEndereco" id="address-name" placeholder="Nome do endereço">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="{{ cadastro.dados.endereco.cep }}" name="cep" id="cep" placeholder="CEP">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="{{ cadastro.dados.endereco.endereco }}" name="endereco" id="address" placeholder="Endereço">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="numero" id="number" placeholder="Nº">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="" name="complemento" id="complement" placeholder="Complemento">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="{{ cadastro.dados.endereco.bairro }}" name="bairro" id="neighborhood" placeholder="Bairro">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="{{ cadastro.dados.endereco.estado }}" name="estado" id="state" placeholder="Estado">
    </label>
    <label class="grid-item large--one-whole">
      <input type="text" value="{{ cadastro.dados.endereco.cidade }}" name="cidade" id="city" placeholder="Cidade">
    </label>
    <div class="grid-item large--one-whole">
      <button type="submit" class="btn btn-cadastrar">CADASTRAR</button>
    </div>
  </fieldset>
</form>

<script>
    var input = document.querySelector('input[type=file]')
    input.onchange = function () {

      var file = input.files[0],
        reader = new FileReader()
    
      reader.onloadend = function () {
        var b64 = reader.result
        document.querySelector('input[id=file]').value = b64;
      }
    
      reader.readAsDataURL(file)
    }
</script>