<?php

if(isset($_GET['answer'])) {

    $current_question = $_SESSION['game']['current_question'];

    $answer = $_GET['answer'];
    
    $answer_given = $_SESSION['questions'][$current_question]['answers'][$answer];

    if($answer_given == $_SESSION['questions'][$_SESSION['game']['current_question']]['correct_answer']) {
        $_SESSION['game']['correct_answers']++;
    } else {
        $_SESSION['game']['incorrect_answers']++;
    }

    if($_SESSION['game']['current_question'] == $_SESSION['game']['total_questions'] - 1) {
        header('Location: index.php?route=gameover');
        exit;
    }

    $_SESSION['game']['current_question']++;

    header('Location: index.php?route=game');
    exit;
}

$current_question = $_SESSION['game']['current_question'];
$total_questions = $_SESSION['game']['total_questions'];

$correct_answers = $_SESSION['game']['correct_answers'];
$incorrect_answers = $_SESSION['game']['incorrect_answers'];

$country = $_SESSION['questions'][$current_question]['question'];
$answers = $_SESSION['questions'][$current_question]['answers'];
$image_path = $_SESSION['questions'][$current_question]['image_path'];

?>

<div class="container">
    <h1>Quiz do tipo de pokemon</h1>

    <h5>Questão n.º <strong><?= $current_question + 1 . ' / ' . $total_questions ?></strong></h5>

    <div>
        <h4>Corretas: <strong><?= $correct_answers ?></strong>
        Erradas: <strong><?= $incorrect_answers ?></strong></h4>
    </div>

    <hr>
    <h4>Qual é o tipo do pokemon:<strong><br><?= $country ?></strong></h4>

    <?php if (!empty($image_path)): ?>
        <div class="pokemon-image-container">
            <img src="<?= $image_path ?>" alt="Imagem do Pokémon <?= $country ?>" style="width: 200px; height: 200px;">
        </div>
    <?php endif; ?>

    <hr>

    <div>
        <h3 style="cursor: pointer" id="answer_0"><?= $capitals[$answers[0]][1] ?></h3>
        <h3 style="cursor: pointer" id="answer_1"><?= $capitals[$answers[1]][1] ?></h3>
        <h3 style="cursor: pointer" id="answer_2"><?= $capitals[$answers[2]][1] ?></h3>
    </div>

    <div>
        <a href="index.php?route=start">Desistir</a>
    </div>
</div>

<script>
    document.querySelectorAll("[id^='answer_']").forEach(element => {
        element.addEventListener('click', () => {
            let id = element.id.split('_')[1];
            window.location.href = `index.php?route=game&answer=${id}`;
        });
    });
</script>