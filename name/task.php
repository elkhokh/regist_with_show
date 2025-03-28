<?php
$skillsArray = [];
$skillsString = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skillsString = $_POST["skills"];

    $skillsArray = explode(",", $skillsString);

    $skillsArray = array_map('trim', $skillsArray);

    $skillsString = implode(", ", $skillsArray);
}
?>

<form method="POST">
    <label>Enter your Skills (comma separated):</label>
    <input type="text" name="skills" value="<?= $skillsString ?>">
    <button type="submit">Send</button>
</form>

<h3>Skills:</h3>
<ul>
    <?php
    foreach ($skillsArray as $skill) {
        if (!empty($skill)) { 
            echo "<li>" . $skill . "</li>";
        }
    }
    ?>
</ul>
