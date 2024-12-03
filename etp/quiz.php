<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .question { margin-bottom: 20px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Online Quiz</h1>

    <?php
    // Define the questions and correct answers
    $questions = [
        "What is the capital of France?" => ["A) Paris", "B) London", "C) Rome", "D) Berlin"],
        "Which planet is known as the Red Planet?" => ["A) Earth", "B) Venus", "C) Mars", "D) Jupiter"],
        "What is the largest ocean on Earth?" => ["A) Atlantic", "B) Indian", "C) Pacific", "D) Arctic"],
        "Who wrote 'Romeo and Juliet'?" => ["A) Charles Dickens", "B) William Shakespeare", "C) Jane Austen", "D) Mark Twain"],
        "Which element has the chemical symbol 'O'?" => ["A) Oxygen", "B) Gold", "C) Hydrogen", "D) Silver"]
    ];

    $correctAnswers = ["A", "C", "C", "B", "A"]; // Correct answers corresponding to questions
    $score = 0;
    $errors = [];
    $submittedAnswers = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate input
        foreach (array_keys($questions) as $index => $question) {
            if (empty($_POST["q$index"])) {
                
                $errors[] = "Question " . ($index + 1) . " is not answered.";
            } else {
                $submittedAnswers[$index] = $_POST["q$index"];
                if ($_POST["q$index"] === $correctAnswers[$index]) {
                    $score++;
                }
            }
        }

        // Display score if there are no errors
        if (empty($errors)) {
            echo "<h2>Your Score: $score / " . count($questions) . "</h2>";
        }
    }
    ?>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <p>Please answer all questions:</p>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <?php foreach ($questions as $question => $options): ?>
            <div class="question">
                <p><strong><?= htmlspecialchars($question) ?></strong></p>
                <?php foreach ($options as $key => $option): ?>
                    <label>
                        <input 
                            type="radio" 
                            name="q<?= $loopIndex = array_search($question, array_keys($questions)); ?>" 
                            value="<?= chr(65 + $key) ?>" 
                            <?= isset($submittedAnswers[$loopIndex]) && $submittedAnswers[$loopIndex] === chr(65 + $key) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($option) ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit">Submit Quiz</button>
        
    </form>
</body>
</html>
