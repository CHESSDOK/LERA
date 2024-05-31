<?php
include "../auth.php";

include_once "../php/db_connection.php";

$user_id = $_SESSION['user_id'];
$eid = $_GET['eid'];

// Fetch user score data for the exam
$score_query = "SELECT * FROM user_scores WHERE user_id='$user_id' AND eid='$eid'";
$score_result = mysqli_query($conn, $score_query);
if (!$score_result || mysqli_num_rows($score_result) == 0) {
    die("Error fetching score data or no data found.");
}
$score_data = mysqli_fetch_assoc($score_result);

// Fetch all questions for the exam
$questions_query = "SELECT * FROM question WHERE eid='$eid'";
$questions_result = mysqli_query($conn, $questions_query);
if (!$questions_result) {
    die("Error fetching questions.");
}

// Fetch user's answers for the exam
$user_answers_query = "SELECT * FROM user_answers WHERE user_id='$user_id' AND eid='$eid'";
$user_answers_result = mysqli_query($conn, $user_answers_query);
if (!$user_answers_result) {
    die("Error fetching user answers.");
}

$user_answers = [];
while ($answer = mysqli_fetch_assoc($user_answers_result)) {
    $user_answers[$answer['qid']] = $answer['answer'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: #5375E2;
            margin: 0;
            padding: 0;
        }

         /* === header Styles === */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 10px 20px; /* Adjust as needed */
        }
        
        .logo img {
            width: 100px; /* Adjust the width of the logo */
        }
  
        /* Results Container */
        .results {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 90%;
        }

        /* Headings */
        .results h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .results h2 {
            color: #333;
            margin-top: 30px;
        }

        /* Paragraphs */
        .results p {
            color: #666;
            margin: 10px 0;
        }

        /* Question Details */
        .question-detail {
            background-color: #f9f9f9;
            margin: 20px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .question-detail p {
            color: #333;
            margin: 5px 0;
        }
        /* Back Button Styles */
        #back-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px; /* Adjust as needed */
        }

        #back-button:hover {
            background-color: #0056b3;
        }


        /* Responsive Design */
        @media only screen and (max-width: 600px) {
            .results {
                padding: 10px;
            }

            .question-detail {
                padding: 10px;
            }
        }

    </style>
    <title>Exam Results</title>
</head>
<body>
<header>
      <div class="logo">
        <!-- Place your logo here -->
        <img src="../icons/lslogo.png" alt="Logo" />
      </div>
      <a href="exams_list.php"> <button id="back-button">Back</button> </a>
      </div>
    </header>
    <div class="results">
        <h1>Results for Exam</h1>
        <p>Your Score: <?php echo htmlspecialchars($score_data['score']); ?></p>
        <p>Correct Answers: <?php echo htmlspecialchars($score_data['correct_answers']); ?></p>
        <p>Wrong Answers: <?php echo htmlspecialchars($score_data['wrong_answers']); ?></p>
        <h2>Question Details:</h2>
        <?php
        while ($question = mysqli_fetch_assoc($questions_result)) {
            $qid = $question['id'];
            $correct_answer = $question['correct_answer'];
            $user_answer = isset($user_answers[$qid]) ? $user_answers[$qid] : 'Not answered';

            echo '<div class="question-detail">
                    <p>Question: ' . htmlspecialchars($question['question']) . '</p>
                    <p>Your answer: ' . htmlspecialchars($user_answer) . '</p>
                    <p>Correct answer: ' . htmlspecialchars($correct_answer) . '</p>
                </div>';
        }
        ?>
    </div>
</body>
</html>
