
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <?php



// Receeive data from the form
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    
    //---------------------
    // validate Data

    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Invalid email address</div>";
        exit; }

    $name = filter_var($name, FILTER_SANITIZE_STRING);
    if (empty($name)) {
        echo "<div class='alert alert-danger'>Name is required</div>";
        exit; }

    $phone = filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
if(empty($phone)){  echo "<div class='alert alert-danger'> not found phone</div>";
    exit;}

$password = filter_var($password, FILTER_SANITIZE_STRING);
if(empty($password)){ echo "<div class='alert alert-danger'> not found password</div>";
    exit; }

// to reception data and put in array 
    $empData = array(
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "phone" => $phone,
    );

    $empText = implode(", ",$empData) . "\n";

    file_put_contents('data.txt',$empText,FILE_APPEND);

    echo "<div class='alert alert-success mt-3'>input data added successfully</div>";
    header("Location: table.php");
    exit();
}


?>

    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto bg-light my-5 border border-dark border-3">
                <h1 class=" p-2 mt-2"> Login</h1>

                <form  method="post">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit"  class="form-control btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- <div class="col-2 mx-auto bg-light my-2  border-1">
        
    <div class="mb-3">
    <h2>go to table</h2>
                       <h2><a href="table.php">table</a></h2> 
                    </div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
    