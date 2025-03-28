
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php

    // Receeive data from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $phone = $_POST['phone'];
    
        // validation Data
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger'>Invalid email address</div>";
        }
        $cleanName = filter_var($name, FILTER_SANITIZE_STRING);

        $empData = array(
            "name" => $cleanName,
            "email" => $email,
            "salary" => $salary,
            "phone" => $phone,
            "type" => $type,
        );

        $empText = implode(", ",$empData) . "\n";

        file_put_contents('emp.txt',$empText,FILE_APPEND);

        echo "<div class='alert alert-success mt-3'>Emplyee added successfully</div>";
    }
    ?>
    <div class="container mt-5">
        <h2>Employee Form</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary:</label>
                <input type="number" id="salary" name="salary" class="form-control">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Employee Type:</label>
                <select name="type" id="type" class="form-select">
                    <option value="full_time">Full Time</option>
                    <option value="part_time">Part Time</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2 class="mt-5">Employee List</h2>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Phone</th>
                    <th>Employee Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(file_exists('emp.txt')){
                    $fileContent = file_get_contents('emp.txt');

                    $emps = explode("\n",$fileContent);

                    foreach($emps as $emp){
                        if(!empty($emp)){
                            echo "<tr><td>" . str_replace(", " , "</td><td>",$emp) . "</td></tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>