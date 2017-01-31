<div class="row form-group text-center" id="pequisar">
    <form method="post" action="index.php?ctrl=voluntario&cmd=consultar">
        <div class="row">
            <input class="" type="search" name="Pesquisar Voluntário">
            <input class="btn btn-success" type="submit" value="Pesquisar">
        </div>
    </form>   
</div>
<div class="text-right" id="botoes">
    <a class="btn btn-info" href="index.php?page=cadastrar_voluntario">Novo Voluntário</a>
</div>

<div id="accordion">
    <?php
    $voluntarios = $_SESSION["ControllerVoluntario"]["voluntarios"];
    foreach ($voluntarios as $voluntario) {
        ?>
        <h3><?= $voluntario["matricula"] ?> - <?= $voluntario["nome"] ?></h3>
        <div>
            <ul class="list-unstyled">
                <li>Matricula:<?= $voluntario["matricula"] ?></li>
                <li>Nome:<?= $voluntario["nome"] ?></li>
                <li>CPF:<?= $voluntario["cpf"] ?></li>
                <li>Data de Nascimento:<?= $voluntario["data_nascimento"] ?></li>
                <li>Genero:<?= $voluntario["genero"] ?></li>
                <li>Período:<?= $voluntario["periodo"] ?></li>
                <li>Idioma:<?= $voluntario["idioma"] ?></li>
                <li>E-mail:<?= $voluntario["email"] ?></li>
                <li>Nome do Curso:<?= $voluntario["nome_curso"] ?></li>
                <li>Rua:<?= $voluntario["rua"] ?></li>
                <li>Complemento:<?= $voluntario["complemento"] ?></li>
                <li>Bairro:<?= $voluntario["bairro"] ?></li>
                <li>Cidade:<?= $voluntario["cidade"] ?></li>
                <li>UF:<?= $voluntario["uf"] ?></li>
                <li>CEP:<?= $voluntario["cep"] ?></li>
                <li>Telefone Fixo:<?= $voluntario["telefone_fixo"] ?></li>
                <li>Celular:<?= $voluntario["celular"] ?></li>
                <div class="row text-right" id="">
                    <a class="btn btn-warning" href="index.php?ctrl=voluntario&cmd=alterar">Editar</a>
                    <a class="btn btn-danger" href="index.php?ctrl=voluntario&cmd=excluir">Excluir</a>
                </div>
            </ul>
        </div>
    <?php } ?>
</div>