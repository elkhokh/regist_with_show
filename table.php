
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
        <h2 class="mt-5">Employee List</h2>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(file_exists('data.txt')){
                    $fileContent = file_get_contents('data.txt');

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
    <div class="col-2 mx-auto bg-light my-2  border-1">
        
        <div class="mb-3">
        <h2>go to home page</h2>
                           <h2><a href="index.php">home</a></h2> 
                        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>