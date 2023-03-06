<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>PHP-Sixth-Task</title>
</head>

<body>

  <?php
  $emailErr = "";
  $email = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  ?>
  <div class="mainform">
    <form action="" method="post" enctype="multipart/form-data">
      <span>First Name:</span>
      <input class="fname" type="text" name="firstname" pattern="[a-zA-Z]{1,}" required><br>
      <span>Last Name:</span>
      <input class="lname" type="text" name="lastname" pattern="[a-zA-Z]{1,}" required><br>
      <span> Full Name:</span>
      <input id="flname" type="text" disabled><br>
      <span> Image:</span>
      <input class="fileupload" name="image" type="file" id="file" /><br>
      <textarea class="marksarea" name="marks" id="" cols="32" rows="10" placeholder="Type Your Marks Here Like: Subject|80"></textarea><br>
      <div id="cont">
        <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="input1"></input>
      </div>
      <span> E-mail:</span>
      <input class="emailbox" type="text" name="email">
      <span class="error">* <?php echo $emailErr; ?></span>
      <br><br>
      <input class="submitbtn" type="submit">
    </form>

  </div>

  <script>
    $(document).ready(function() {
      $(".fname , .lname").on('input', function() {
        var fnamevar = $('.fname').val();
        var lnamevar = $('.lname').val();
        var fullnamevar = fnamevar + " " + lnamevar;
        $("#flname").val(fullnamevar);
      });
    });
  </script>
  <?php include 'welcome.php'; ?>
  <?php
  if ($emailErr == "") {
    echo "<br>";
    echo $_POST["email"];
  }
  ?>

</body>

</html>