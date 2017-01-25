<div id="botoes">
    <a href="index.php?page=cadastrar_instituicao"> <i class="fa fa-users">Nova Instituição</i></a>
</div>

<div id="accordion">
    <?php
    $instituicoes = $_SESSION["ControllerInstituicao"]["instituicoes"];
    foreach ($instituicoes as $instituicao) {
        ?>
        <h3><?= $instituicao["razao_social"] ?> - <?= $instituicao["nome_fantasia"] ?></h3>
        <div>
            <ul>
                <li>Razão Social:<?= $instituicao["razao_social"] ?></li>
                <li>Nome Fantasia:<?= $instituicao["nome_fantasia"] ?></li>
                <li>Ano de Fundação:<?= $instituicao["ano_de_fundacao"] ?></li>
                <li>Website:<?= $instituicao["website"] ?></li>
                <li>Vínculo:<?= $instituicao["vinculo"] ?></li>
                <li>Quantidade de Membros:<?= $instituicao["qtd_membros"] ?></li>
                <li>E-mail da Instituição:<?= $instituicao["email_instituicao"] ?></li>                
                <li>Relações Públicas:<?= $instituicao["relacoes_publicas"] ?></li>
                <li>E-mail do Relações Públicas:<?= $instituicao["email_relacoes_publicas"] ?></li>
                <li>Rua:<?= $instituicao["rua"] ?></li>
                <li>Complemento:<?= $instituicao["complemento"] ?></li>
                <li>Bairro:<?= $instituicao["bairro"] ?></li>
                <li>Cidade:<?= $instituicao["cidade"] ?></li>
                <li>UF:<?= $instituicao["uf"] ?></li>
                <li>CEP:<?= $instituicao["cep"] ?></li>
                <li>Telefone Fixo:<?= $instituicao["telefone_fixo"] ?></li>
                <li>Celular:<?= $instituicao["celular"] ?></li>
            </ul>
        </div>
    <?php } ?>
</div>