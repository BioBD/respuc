<? 
    foreach($persons as $person)
    {
        echo "<br>";
        echo "Mostrar a pessoa:";
        var_dump($person);
        echo "ID: ". str($person->getPersonId());
        echo "Nome: ". str($person->getFullname());
        echo "<br>";
    }
?>