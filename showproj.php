<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Projs</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    $q = $_GET['q'];

    $connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die('Could not connect: ' . mysqli_error($connection));
    }

    mysqli_select_db($connection, "myprojects");
    $query = "SELECT * FROM projects WHERE user_address = '" . $q . "'";
    $result = mysqli_query($connection, $query);

    $projsheader = "'s Projects";

    echo '<h2 class="projHeaderAddy" >' . $q . '</h2>';
    echo '<h2 class="projHeader" >' . $projsheader . '</h2> <br><br><br>';
    echo '<div>
            <a href="#" id="addNewProj-button" onclick="insertAdd(), showAddNew()"><img class="newProjIcon" src="images/icons/new_icon.png" alt="New Icon "></a>
            <br>
            <table class="project_table">
                <thead>
                    <tr class="table_header">
                        <th style="display:none;" >Adress</th>
                        <th style="display:none;" >Proj ID</th>
                        <th>Mint Date</th>
                        <th>Proj Name</th>
                        <th>Mint List</th>
                        <th>Price</th>
                        <th><a><img class="webIcon" src="images/icons/link_icon_gray.png" alt="Website Link"></a></th>
                        <th><a><img class="webIcon" src= "images/icons/twitter_grey_icon.png" alt="Twitter Link "></a></th>
                        <th>Note</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>';
    while ($row = mysqli_fetch_array($result)) {


        echo "<tbody>
                        <tr>
                            <td style='display:none;'>$row[user_address]</td>
                            <td style='display:none;'>$row[proj_id]</td>
                            <td>$row[mint_date]</td>
                            <td>$row[project_name]</td>
                            <td>$row[mintlist]</td>
                            <td>$row[price]</td>
                            <td><a href='$row[website]' target='_blank'><img class='webIcon' src='images/icons/weblink-icon.png' alt='Project Website Link'></a></td>
                            <td><a href='$row[twitter]' target='_blank'><img class='webIcon' src='images/logos/twitter-logo.png' alt='Project Twitter Link'></></a></td>
                            <td><textarea rows='1' cols='10'>$row[note]</textarea></td>
                            <td> 
                                <a href='#' class='editbtn' id='editProj-button' onclick='showEditProj()'><img class='editIcon' src='images/icons/edit-icon.png' alt='Edit Proj'></a>
                                <a href='#' class='deletebtn' id='deleteProj-button' onclick='showDeleteProj()'><img class='editIcon' src='images/icons/delete_icon.png' alt='Delete Proj'></a>
                            </td>
                        </tr>
                    </tbody>";
    }
    echo "</table> </div>";
    mysqli_close($connection);
    ?>
</body>

</html>