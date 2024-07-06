<?php
include "../auth.php";

include_once "../php/db_connection.php";

$user_id = $_SESSION['user_id'];

$progress_query = "
    SELECT exam.title, ranked_scores.score, ranked_scores.correct_answers, ranked_scores.wrong_answers, ranked_scores.rank_position, ranked_scores.retake_count
    FROM (
        SELECT user_id, eid, score, correct_answers, wrong_answers, retake_count,
               RANK() OVER (PARTITION BY eid ORDER BY score DESC) as rank_position
        FROM user_scores
    ) ranked_scores
    INNER JOIN exam ON ranked_scores.eid = exam.eid
    WHERE ranked_scores.user_id = '$user_id'
    ORDER BY ranked_scores.eid";
$progress_result = mysqli_query($conn, $progress_query);

if (!$progress_result) {
    die('Query Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="../css/progress.css">
    <title>User Progress</title>
</head>
<body>
    <header class="header">
        <div class="logo">
        <img src="../icons/lslogo.png" alt="Logo" />
        </div>
        <nav class="nav-links">
            <a href = "home.php">home</a>
            <a href = "../php/logout.php">Log out</a>
        </nav>
    </header>
   

    <div class="content-container">
        <h2></h2>
        <table>
        <thead>
            <tr>
                <th scope="col">Exam Title</th>
                <th scope="col">Score</th>
                <th scope="col">Correct Answers</th>
                <th scope="col">Wrong Answers</th>
                <th scope="col">Rank</th>
                <!--<th>Retake Count</th>-->
            </tr>
            </thead>
          <tbody> 
            <?php
            while ($progress = mysqli_fetch_assoc($progress_result)) {
                echo "<tr>
                    <td data-label='Title'>" . htmlspecialchars($progress['title']) . "</td>
                    <td data-label='Score'>" . htmlspecialchars($progress['score']) . "</td>
                    <td data-label='Correct answers'>" . htmlspecialchars($progress['correct_answers']) . "</td>
                    <td data-label='Wrong answers'>" . htmlspecialchars($progress['wrong_answers']) . "</td>
                    <td data-label='Rank'>" . htmlspecialchars($progress['rank_position']) . "</td>
                    
                </tr>";//<td>" . htmlspecialchars($progress['retake_count']) . "</td>
            }
            ?>
            </tbody>
        </table>
    </div>
    <script src="../js/side.js"></script>
</body>
</html>
