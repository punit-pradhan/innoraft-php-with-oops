<html>

<head>
    <title>Show Image</title>
</head>

</html>
<?php
class Fullname
{
    public $firstname, $lastname, $file_name, $file_temp, $file_path;
    function __construct($firstname, $lastname, $file_name, $file_temp, $file_path)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->file_name = $file_name;
        $this->file_temp = $file_temp;
        $this->file_path = $file_path;
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
}
if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_path = "./images/" . $file_name;
    $user = new Fullname($firstname, $lastname, $file_name, $file_temp, $file_path);
    $user->displayimage();
    echo $user->printfullname();
}
?>