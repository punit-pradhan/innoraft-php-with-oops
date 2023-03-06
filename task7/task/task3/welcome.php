<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    class Fullname
    {
        public $firstname, $lastname, $file_name, $file_temp, $file_path, $unextracted_marks;
        function __construct($firstname, $lastname, $file_name, $file_temp, $file_path, $unextracted_marks)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->file_name = $file_name;
            $this->file_temp = $file_temp;
            $this->file_path = $file_path;
            $this->unextracted_marks = $unextracted_marks;
        }
        public function printfullname()
        {
            return "Hello $this->firstname $this->lastname";
        }
        public function displayimage()
        {
            if (isset($_FILES['image'])) {

                move_uploaded_file($this->file_temp, $this->file_path);
                print "<img src='$this->file_path' 'height=200 width=300' /> ";
                echo "<br>";
            }
        }
        public function displaymarks()
        {
            echo "<table border='1'>";
            echo "<tr>
               <th>Subject</th>
               <th>Marks</th>
           </tr>";
            foreach ($this->unextracted_marks as $mark) {
                $pos = strpos($mark, "|");
                $marks[substr($mark, 0, $pos)] = substr($mark, $pos + 1);
            }
            foreach ($marks as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
        }
    }
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_path = "./images/" . $file_name;
        $unextracted_marks = explode("\n", $_POST['marks']);
        $user = new Fullname($firstname, $lastname, $file_name, $file_temp, $file_path, $unextracted_marks);
        $user->displayimage();
        echo $user->printfullname();
        $user->displaymarks();
    }
    ?>

</body>

</html>