<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'myprojects');

if(isset($_POST['deletedata']))
{
    $proj_id = $_POST['delete_id'];
    $user_address = $_POST['delete_user_address'];

    $query = "DELETE FROM projects WHERE proj_id='$proj_id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Project Deleted"); </script>';
        // header("Location:index.html");
        header('Location: index.php?data='.$user_address);
    }
    else
    {
        echo '<script> alert("Project Not Deleted"); </script>';
    }
}

?>