<div id="botoes">
    <a href="index.php?page=cadastrar_voluntario"> <i class="fa fa-users">Novo Voluntário</i></a>
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
            </ul>
        </div>
    <?php } ?>
</div>