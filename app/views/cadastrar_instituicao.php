<!-- http://www.w3schools.com/jquerymobile/jquerymobile_form_basic.asp -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="title-section">
                <h1>Cadastrar Novo Voluntário</h1>
            </div>
        </div>
        <form method="post" action="index.php?ctrl=instituicao&cmd=cadastrar">
            <div class="col-md-4">
                <label for="razao_social">Razão Social:</label><br>
                <input class="form-control" type="text" name="razao_social" id="razao_social" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="nome_fantasia">Nome Fantasia:</label><br>
                <input class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="ano_de_fundacao">Ano de Fundação:</label><br>
                <input class="form-control" type="text" name="ano_de_fundacao" id="ano_de_fundacao" class="col-md-12" maxlength="4">
            </div>
            <div class="col-md-6">
                <label for="website">Website:</label><br>
                <input class="form-control" type="text" name="website" id="website" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="qtd_membros">Quantidade de Membros:</label><br>
                <input class="form-control" type="text" name="qtd_membros" id="qtd_membros" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="email_instituicao">E-mail da Instituição:</label><br>
                <input class="form-control" type="text" name="email_instituicao" id="email_instituicao" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="relacoes_publicas">Relações Públicas:</label><br>
                <input class="form-control" type="text" name="relacoes_publicas" id="relacoes_publicas" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="email_relacoes_publicas">E-mail do Relações Públicas:</label><br>
                <input class="form-control" type="text" name="email_relacoes_publicas" id="email_relacoes_publicas" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="rua">Rua:</label><br>
                <input class="form-control" type="text" name="rua" id="rua" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="complemento">Complemento:</label><br>
                <input class="form-control" type="text" name="complemento" id="complemento" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="bairro">Bairro:</label><br>
                <input class="form-control" type="text" name="bairro" id="bairro" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="cidade">Cidade:</label><br>
                <input class="form-control" type="text" name="cidade" id="cidade" class="col-md-12">
            </div>
            <div class="col-md-4">
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
            <div class="col-md-6">
                <label for="cep">CEP:</label><br>
                <input class="form-control" type="text" name="cep" id="cep" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="telefone_fixo">Telefone Fixo:</label><br>
                <input class="form-control" type="text" name="telefone_fixo" id="telefone_fixo" class="col-md-12">
            </div>
            <div class="col-md-6">
                <label for="celular">Celular:</label><br>
                <input class="form-control" type="text" name="celular" id="celular" class="col-md-12">
            </div>
            <div class="col-md-12">
                <input type="submit" value="Salvar">
            </div>
            <div class="col-md-12">
                <br>
            </div>
        </form>
    </div>
</div>