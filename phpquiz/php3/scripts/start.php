<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $total_questions = intval($_POST['text_total_questions']) ?? 10;

    prepare_game($total_questions);

    header('Location: index.php?route=game');
    exit;
}

function prepare_game($total_questions)
{
    global $capitals;

    $ids = [];
    $tipos_usados = [];

    $max_pokemons = count($capitals);
    $total_questions = min($total_questions, $max_pokemons);

    while (count($ids) < $total_questions) {
        $id = rand(0, $max_pokemons - 1);
        $tipo = $capitals[$id][1];

        if (!in_array($id, $ids) && !in_array($tipo, $tipos_usados)) {
            $ids[] = $id;
            $tipos_usados[] = $tipo;
        }
    }

    $questions = [];
    foreach ($ids as $id) {

        $answers = [];
        $answers[] = $id;

        $correct_type = $capitals[$id][1];

        while (count($answers) < 3) {
            $tmp = rand(0, $max_pokemons - 1);
            $tmp_type = $capitals[$tmp][1];

            if (!in_array($tmp, $answers) && $tmp_type !== $correct_type) {
                $answers[] = $tmp;
            }
        }

        shuffle($answers);

        $questions[] = [
            'question' => $capitals[$id][0],
            'correct_answer' => $id,
            'answers' => $answers,
            'image_path' => $capitals[$id][2]
        ];
    }

    $_SESSION['questions'] = $questions;

    $_SESSION['game'] = [
        'total_questions' => count($ids),
        'current_question' => 0,
        'correct_answers' => 0,
        'incorrect_answers' => 0,
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container">

    <div class="row">
    <h1>Quiz de Pokémon</h1>
    <hr>

    <form action="index.php?route=start" method="post">
        <h3>
            <label for="text_total_questions" class="form-label">Número de questões:</label>
            <input type="number" class="form-control" id="text_total_questions" name="text_total_questions" value="10" min="1" max="20">
        </h3>

        <div>
            <button type="submit" class="btn">Iniciar</button>
        </div>
    </form>
</div>


</div>
</body>
</html>