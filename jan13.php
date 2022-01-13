<?php session_start();
//reset game
if (isset($_POST['reset'])) {
    session_unset();
}

//generate answer
if (!isset($_SESSION['answer'])) {
    $_SESSION['answer'] = [rand(1, 9), rand(1, 9), rand(1, 9), rand(1, 9)];
}

echo implode($_SESSION['answer']) . "<br>";

//when guess is submitted
if (isset($_POST['guess'])) {
    $guess = str_split($_POST['guess']);
    $_SESSION['guesses'][] = implode($guess) . " - " . check($_SESSION['answer'], $guess);
    displayArray($_SESSION['guesses']);
}

//compare user guess with answer
function check($answer, $guess): string
{
    $correct = $wrongPos = 0;

    //check same position
    for ($i = 0; $i < 4; $i++) {
        if ($guess[$i] == $answer[$i]) {
            $correct += 1;
            $answer[$i] = NULL;
            $guess[$i] = NULL;
        }
    }

    //check elsewhere
    for ($i = 0; $i < 4; $i++) {
        if ($guess[$i] === NULL) {continue;}

        $pos = array_search($guess[$i], $answer);
        if ($pos !== FALSE) {
            $wrongPos += 1;
            $answer[$pos] = NULL;
            $guess[$i] = NULL;
        }
    }
    return $correct . "/" . $wrongPos;
}

function displayArray($arr) {
    foreach ($arr as $value) {
        echo $value . "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mastermind</title>
</head>
<body>
<form action="jan13.php" method="post">
    <label>
        <input type="number" min="1111" max="9999" name="guess" required>
    </label>
</form>
<form action="jan13.php" method="post">
    <input name="reset" value="reset" type="submit">
</form>
</html>