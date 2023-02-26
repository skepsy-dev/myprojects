<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Projs</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
    <script src="script.js" defer></script>
</head>

<body>

    <?php
    $q = '';
    if (isset($_GET['data'])) {
        $q = $_GET['data'];
    } else {
        $q = $_GET['q'];
    }
    // $q = '0xd78e5ade2cdc907688a4feb888ef6c60c0a16f53';

    $connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die('Could not connect: ' . mysqli_error($connection));
    }

    mysqli_select_db($connection, "myprojects");
    $query = "SELECT * FROM projects WHERE user_address = '" . $q . "'";
    $result = mysqli_query($connection, $query);

    $projsheader = "'s Projects";

    echo '<div class="loggedHeader"> <h3 class="projHeaderAddy" >' . substr($q, 0, 5) . '...</h3>
            <h3 class="projHeader" >' . $projsheader . '</h3>
        </div> <br>';
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
                        <tr id='row_data$row[proj_id]'>
                            <td style='display:none;'>$row[user_address]</td>
                            <td style='display:none;'>$row[proj_id]</td>
                            <td>$row[mint_date]</td>
                            <td>$row[project_name]</td>
                            <td>$row[mintlist]</td>
                            <td>$row[price]</td>
                            <td style='display:none;'>$row[website]</td>
                            <td><a href='$row[website]' target='_blank'><img class='webIcon' src='images/icons/weblink-icon.png' alt='Project Website Link'></a></td>
                            <td style='display:none;'>$row[twitter]</a></td>
                            <td><a href='$row[twitter]' target='_blank'><img class='webIcon' src='images/logos/twitter-logo.png' alt='Project Twitter Link'></></a></td>
                            <td style='display:none;'>$row[note]</textarea></td>
                            <td><textarea rows='1' cols='10'>$row[note]</textarea></td>
                            <td> 
                                <a href='#' class='editbtn' id='editProj-button' onclick='showEditProj($row[proj_id])'><img class='editIcon' src='images/icons/edit-icon.png' alt='Edit Proj'></a>
                                <a href='#' class='deletebtn' id='deleteProj-button' onclick='showDeleteProj($row[proj_id])'><img class='editIcon' src='images/icons/delete_icon.png' alt='Delete Proj'></a>
                            </td>
                        </tr>
                    </tbody>";
    }
    echo "</table> </div>";
    mysqli_close($connection);
    ?>
</body>

</html>