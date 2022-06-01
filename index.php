<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <?php include 'functions.php'; ?>

    <h1>Обработка строк</h1>

    <h2>Фамилия, имя, отчество в отдельных строках</h2>
    <?php
    getPartsFromFullname($personID);
    echo $fullname['surname'].'<br/>';
    echo $fullname['name'].'<br/>';
    echo $fullname['patrname'];
    ?>

    <h2>Фамилия, имя, отчество в одной строке</h2>
    <?php
    $surname = $fullname['surname'];
    $name = $fullname['name'];
    $patrname = $fullname['patrname'];
    getFullnameFromParts ($surname, $name, $patrname);
    echo $person;
    ?>

    <h2>Сокращенное фамилия, имя, отчество</h2>
    <?php
    getShortName($personID);
    echo $reduction;
    ?>

    <h2>Гендерный состав аудитории:</h2>
    <?php
    getGenderDescription ($example_persons_array);
    echo nl2br($genderMessage);
    ?>

    <h2>Подбор пары из массива</h2>
    <?php
    getPerfectPartner ($surname, $name, $patrname, $example_persons_array);
    echo nl2br($compatibilityMessage);
    ?>

    <h2>Подбор пары из формы</h2>

    <form name="input_name" method="POST" action="index.php">
        <label>Ваше имя: <input type="text" name="input_name" required placeholder = "Ваше имя"></label>
        <label>Ваше отчество: <input type="text" name="input_patrname" required placeholder = "Ваше отчество"></label>
        <label>Ваша фамилия: <input type="text" name="input_surname" required placeholder = "Ваша фамилия"></label>
        <input type="submit" name="send" value="Отправить">
    </form>

    <?php
        
        if (isset($_POST)) {
            $inputName = isset($_POST['input_name']) ? $_POST['input_name'] : "ИВАН";
            $inputPatrname = isset($_POST['input_patrname']) ? $_POST['input_patrname'] : "ДАНИЛОВИЧ";
            $inputSurname = isset($_POST['input_surname']) ? $_POST['input_surname'] : "КАЛИТА";
            getPerfectPartner ($inputSurname, $inputName, $inputPatrname, $example_persons_array);
            echo nl2br($compatibilityMessage);
    }?>

</body>

</html>