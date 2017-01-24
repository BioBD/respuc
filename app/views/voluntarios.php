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
            <ul>
                <li>Matricula:<?= $voluntario["matricula"] ?></li>
                <li>Nome:<?= $voluntario["nome"] ?></li>
            </ul>
        </div>
    <?php } ?>
</div>