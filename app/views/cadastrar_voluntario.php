<!-- http://www.w3schools.com/jquerymobile/jquerymobile_form_basic.asp -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="title-section">
                <h1>Cadastrar Novo Voluntário</h1>
            </div>
        </div>
        <form method="post" action="index.php?ctrl=voluntario&cmd=cadastrar">
        <fieldset class="col-md-12"><legend>Informação Pessoais</legend>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label for="matricula">Matricula:</label><br>
                    <input class="form-control" type="text" name="matricula" id="matricula" class="col-md-12" maxlength="7">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="nome">Nome:</label><br>
                    <input class="form-control" type="text" name="nome" id="nome" class="col-md-12">
                </div>
                <div class="col-xs-4 form-group">
                    <label for="cpf">CPF:</label><br>
                    <input class="form-control" type="text" name="cpf" id="cpf" class="col-md-12" maxlength="11">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label for="data_nascimento">Data de Nascimento:</label><br>
                    <input class="form-control" type="text" name="data_nascimento" id="data_nascimento" class="col-md-12">
                </div>
                <div class="col-xs-4 form-group">
                    <label for="genero">Gênero:</label><br>
                    <select class="form-control" name="genero" id="genero">
                        <option value="">Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label for="email">E-mail:</label><br>
                    <input class="form-control" type="text" name="email" id="email" class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label for="nome_curso">Nome do Curso:</label><br>
                    <select class="form-control" name="nome_curso" id="nome_curso">
                        <option value="">Selecione</option>
                        <option value="Administração">Administração</option>
                    </select>
                </div>
                <div class="col-xs-4 form-group">
                    <label for="periodo">Período:</label><br>
                    <select class="form-control" name="periodo" id="periodo">
                        <option value="">Selecione</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                    </select>
                </div>
                <div class="col-xs-4 form-group">
                    <label for="idioma">Idioma:</label><br>
                    <select class="form-control" name="idioma" id="idioma">
                        <option value="">Selecione</option>
                        <option value="English">English</option>
                        <option value="Español">Español</option>
                        <option value="Français">Français</option>
                    </select>
                </div>
            </div>
            </fieldset>
            <fieldset class="col-md-12"> <legend>Contato</legend>
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="rua">Rua:</label><br>
                    <input class="form-control" type="text" name="rua" id="rua" class="col-md-12">
                </div>
                <div class="col-xs-6 form-group">
                    <label for="complemento">Complemento:</label><br>
                    <input class="form-control" type="text" name="complemento" id="complemento" class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label for="bairro">Bairro:</label><br>
                    <input class="form-control" type="text" name="bairro" id="bairro" class="col-md-12">
                </div>
                <div class="col-xs-4 form-group">
                    <label for="cidade">Cidade:</label><br>
                    <input class="form-control" type="text" name="cidade" id="cidade" class="col-md-12">
                </div>
                <div class="col-md-4 form-group">
                    <label for="uf">UF:</label><br>
                    <select class="form-control" name="uf" id="uf">
                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label for="cep">CEP:</label><br>
                    <input class="form-control" type="text" name="cep" id="cep" class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="telefone_fixo">Telefone Fixo:</label><br>
                    <input class="form-control" type="text" name="telefone_fixo" id="telefone_fixo" class="col-md-12">
                </div>
                <div class="col-md-4 form-group">
                    <label for="celular">Celular:</label><br>
                    <input class="form-control" type="text" name="celular" id="celular" class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
            </div>
            <div class="col-md-12">
                <br>
            </div>
            </fieldset>
        </form>
    </div>
</div>