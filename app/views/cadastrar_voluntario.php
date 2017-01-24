<!-- http://www.w3schools.com/jquerymobile/jquerymobile_form_basic.asp -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="title-section">
                <h1>Cadastrar Novo Voluntário</h1>
            </div>
        </div>
        <form method="post" action="index.php?ctrl=voluntario&cmd=cadastrar">
            <div class="col-md-4">
                <label for="matricula">Matricula:</label><br>
                <input type="text" name="matricula" id="matricula" class="col-md-12">
            </div>
            <div class="col-md-8">
                <label for="nome">Nome:</label><br>
                <input type="text" name="nome" id="nome" class="col-md-12">
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
