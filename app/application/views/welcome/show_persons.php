<? 
    foreach($persons as $person)
    {
        echo "<br>";
        echo "Mostrar a pessoa:";
        var_dump($person);
        echo "ID: {$person->getPersonId()}";
        echo "Nome: {$person->getFullname()}";
        echo "<br>";
    }
?>
