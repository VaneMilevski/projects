<?php


$fullName = $_POST['fullName'];
$companyName = $_POST['companyName'];
$email = $_POST['email'];
$number = $_POST['number'];
$student = $_POST['student'];


//database

$con = new mysqli('localhost', 'root', '', 'project01');

$sql = "INSERT INTO hirestudent (ID, fullName, companyName, email, number, student) VALUES ('0', '$fullName', '$companyName', '$email', '$number', '$student')";

$rs = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="brainster icon" href="./Images/Logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Brainster-Vane Milevski</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/e2d4b2d900.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
  </head>
<body>
    

<div class="message-after">
  <h1 class="display-1 text-center fw-bold uapp">Успешна апликација!</h1>
</div>



     <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
</body>
</html>