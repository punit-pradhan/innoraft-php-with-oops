<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Full Name</title>
</head>

<body>

    <?php
    class Fullname
    {
        public $firstname, $lastname;
        function __construct($firstname, $lastname)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
        public function printfullname()
        {
            return "Hello $this->firstname $this->lastname";
        }
    }
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $user = new Fullname($firstname, $lastname);
        echo $user->printfullname();
    }
    ?>



</body>

</html>