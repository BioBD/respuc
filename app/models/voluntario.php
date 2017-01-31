<?php

include_once "model.php";

class Voluntario extends Model {

    function cadastrar($dataIn) {
        $dataOut = recuperaForm($dataIn);
        $errors = $this->valida($dataOut);
        if ($errors == null) {
            return $this->execSQL("insertVoluntario", $dataOut);
        } else {
            $this->imprimeErros($errors);
        }
    }

    function alterar($dataIn) {
        return $this->execSQL("updateVoluntario", null);
    }

    function excluir() {
        return $this->execSQL("deleteVoluntario", null);
    }

      function consultar() {
        return $this->execSQL("selectVoluntario", null);
    }

    function listar() {
        return $this->execSQL("todosVoluntarios", null);
    }

    function imprimeErros($errors) {
        /*** Teste para saber se tá funcionando todos os erros***/
        foreach ($errors as $error) {
            echo $error."\n<br>";
        }
    }

    function valida($data) {

        $errors = array();

        $errors = $this->validaMatricula($data[0], $errors);
        $errors = $this->validaNome($data[1], $errors);
        $errors = $this->validaCPF($data[2], $errors);
        $errors = $this->validaGenero($data[3], $errors);
        $errors = $this->validaPeriodo($data[4], $errors);
        $errors = $this->validaDataNascimento($data[5], $errors);
        $errors = $this->validaIdioma($data[6], $errors);
        $errors = $this->validaNomeCurso($data[7], $errors);
        $errors = $this->validaRua($data[8], $errors);
        $errors = $this->validaComplemento($data[9], $errors);
        $errors = $this->validaBairro($data[10], $errors);
        $errors = $this->validaCidade($data[11], $errors);
        $errors = $this->validaUF($data[12], $errors);
        $errors = $this->validaCEP($data[13], $errors);
        $errors = $this->validaTelefoneFixo($data[14], $errors);
        $errors = $this->validaCelular($data[15], $errors);
        $errors = $this->validaEmail($data[16], $errors);

        if($errors == null){
            return null;
        }
        return $errors;
    }

    function validaMatricula($data, $errors){
        if(empty($data)){
            $errors["matricula"] = "Campo Matrícula não pode ser vazio!";
        }
        return $errors;
    }

    function validaNome($data, $errors){
        if (empty($data)) {
            print_r($data);
            $errors["nome"] = "Campo Nome não pode ser vazio!";
        } 

        return $errors;
    }

    function validaCPF($data, $errors){
        if (empty($data)) {
            $errors["cpf"] = "Campo CPF não pode ser vazio!";
        } else if(!ValidaDigitosCpf($data)){
            $errors["cpf"] = "Campo CPF inválido!";
        }

        return $errors;
    }

    function validaDataNascimento($data, $errors){
        if (empty($data)) {
            $errors["data_nascimento"] = "Campo Data de Nascimento não pode ser vazio!";
        }
        //Exemplo: xx/xx/xxxxx
        $dia = substr($data,0,2);
        $mes = substr($data,3,2);
        $ano = substr($data,6);

        if(@!checkdate($mes, $dia, $ano)) {
            $errors["data_nascimento"] = "Campo Data de Nascimento inválida!";
        }

        return $errors;
    }

    function validaGenero($data, $errors){
        if (empty($data)) {
            $errors["genero"] = "Campo Genero não pode ser vazio!";
        } 

        return $errors;
    }

    function validaPeriodo($data, $errors){
        if (empty($data)) {
            $errors["periodo"] = "Campo Periodo não pode ser vazio!";
        } else if(!is_numeric($data)){
            $errors["periodo"] = "Campo Periodo só somente composto de caracteres numéricos!";
        } else if(strlen((string)$data) > 2 ){ // Corrigir Erro
            $errors["periodo"] = "Campo Periodo inválido";
        }

        return $errors;
    }

    function validaIdioma($data, $errors){
        if (empty($data)) {
            $errors["idioma"] = "Campo Idioma não pode ser vazio!";
        }

        return $errors;
    }

    function validaNomeCurso($data, $errors){
        if (empty($data)) {
            $errors["nome_curso"] = "Campo Nome do Curso não pode ser vazio!";
        } 

        return $errors;
    }

    function validaRua($data, $errors){
        if (empty($data)) {
            $errors["rua"] = "Campo Rua não pode ser vazio!";
        } 
        
        return $errors;
    }

    function validaComplemento($data, $errors){
        if (empty($data)) {
            $errors["complemento"] = "Campo Complemento não pode ser vazio!";
        } 
        
        return $errors;
    }

    function validaBairro($data, $errors){
       if (empty($data)) {
            $errors["bairro"] = "Campo Bairro não pode ser vazio!";
        } 
        
        return $errors;
    }

    function validaCidade($data, $errors){
        if (empty($data)) {
            $errors["cidade"] = "Campo Cidade não pode ser vazio!";
        } 
        
        return $errors;
    }

    function validaUF($data, $errors){
        if (empty($data)) {
            $errors["uf"] = "Campo UF não pode ser vazio!";
        } 
        
        return $errors;
    }

    function validaCEP($data, $errors){
        if (empty($data)) {
            $errors["cep"] = "Campo CEP não pode ser vazio!";
        } 
        
        return $errors;
    }

    function validaTelefoneFixo($data, $errors){
        if (empty($data)) {
            $errors["telefone_fixo"] = "Campo Telefone Fixo não pode ser vazio!";
        }  
        
        return $errors;
    }

    function validaCelular($data, $errors){
        if (empty($data)) {
            $errors["celular"] = "Campo Celular não pode ser vazio!";
        }  
        
        return $errors;
    }

    function validaEmail($data, $errors){
        if (empty($data)) {
            $errors["email"] = "Campo E-mail não pode ser vazio!";
        } else if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Campo E-mail inválido!";
        }

        return $errors;
    }

}

 function recuperaForm($dataIn){

        $temp["matricula"] = trim(strip_tags($dataIn["matricula"]));
        $temp["nome"] = trim(strip_tags($dataIn["nome"]));
        $temp["cpf"] = trim(strip_tags($dataIn["cpf"]));
        $temp["genero"] = trim(strip_tags($dataIn["genero"]));
        $temp["periodo"] = trim(strip_tags($dataIn["periodo"]));
        $temp["data_nascimento"] = trim(strip_tags($dataIn["data_nascimento"]));
        $temp["idioma"] = trim(strip_tags($dataIn["idioma"]));
        $temp["nome_curso"] = trim(strip_tags($dataIn["nome_curso"]));
        $temp["rua"] = trim(strip_tags($dataIn["rua"]));
        $temp["complemento"] = trim(strip_tags($dataIn["complemento"]));
        $temp["bairro"] = trim(strip_tags($dataIn["bairro"]));
        $temp["cidade"] = trim(strip_tags($dataIn["cidade"]));
        $temp["uf"] = trim(strip_tags($dataIn["uf"]));
        $temp["cep"] = trim(strip_tags($dataIn["cep"]));
        $temp["telefone_fixo"] = trim(strip_tags($dataIn["telefone_fixo"]));
        $temp["celular"] = trim(strip_tags($dataIn["celular"]));
        $temp["email"] = trim(strip_tags($dataIn["email"]));

        $dataOut = array(   $temp["matricula"],
                            $temp["nome"],
                            $temp["cpf"],
                            $temp["genero"],
                            $temp["periodo"],
                            $temp["data_nascimento"],
                            $temp["idioma"],
                            $temp["nome_curso"],
                            $temp["rua"],
                            $temp["complemento"],
                            $temp["bairro"],
                            $temp["cidade"],
                            $temp["uf"],
                            $temp["cep"],
                            $temp["telefone_fixo"],
                            $temp["celular"],
                            $temp["email"]
                            );

        return $dataOut;
    }

   function charAt($string, $pos){
        return $string{$pos};
    }

    function ValidaDigitosCpf($cpf) {
        if(strlen($cpf) != 11){
            return false;
        } else if ($cpf == '12345678909' || $cpf == '11111111111' || 
                    $cpf == '22222222222' || $cpf == '33333333333' ||
                    $cpf == '44444444444' || $cpf == '55555555555' || 
                    $cpf == '66666666666' || $cpf == '77777777777' || 
                    $cpf == '88888888888' || $cpf == '99999999999'){
            return false;
        }
        //Calculo do 1º dígito
        $soma =  (charAt($cpf,0)*10)+
                    (charAt($cpf,1)*9)+
                    (charAt($cpf,2)*8)+
                    (charAt($cpf,3)*7)+
                    (charAt($cpf,4)*6)+
                    (charAt($cpf,5)*5)+
                    (charAt($cpf,6)*4)+
                    (charAt($cpf,7)*3)+
                    (charAt($cpf,8)*2);
        
        $resto = $soma % 11;
        
        if($resto <= 1) {
            $dv1 = 0;
        } else {
            $dv1 = 11 - $resto;   
        }
        if ($dv1 != charAt($cpf,9)) {
            return false;
        }
        
        //Calculo do 2º digito
        $soma = 0;            
        for ($i=0; $i<=9; $i++) {
            $soma += charAt($cpf,$i)*(11-$i); 
        }   
        $resto = $soma % 11;
        if($resto <= 1) {
            $dv2 = 0;
        } else {
            $dv2 = 11 - $resto; 
        }
        if ($dv2 != charAt($cpf,10)) {
            return false;
        }
        //passou pela validação
        return true;
    }
