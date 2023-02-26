<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projs New</title>
    <link rel="icon" type="image/icon type" href="images/ms_logo_blk.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>

</head>

<body>

    <nav class="navbar">
        <div class="brand-title"><img class="navLogo" src="images/logos/mt-logo-white.png" alt="MyTxns"></div>
        <a href="#" class="toggle-button">
            <!-- <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span> -->
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="https://nanacalc.com/" target="_blank"><img class="ckNana" src="images/icons/ckBanana.gif" alt="nanacalc.com"></a></li>
                <!-- <li><a><button class="balBtn" id="balBtn"></button></a></li> -->
                <li><a><button class="loginBtn" id="loginButton">
                            <?php if (isset($_GET['data']) && $_GET['data'] != '') {
                                echo $_GET['data'];
                            } else {
                            ?>
                                Login
                            <?php  } ?></button></a></li>
                <li style="display:none;"><a><button class="" id="loginButton2">Login2</button></a></li>
                <li><a><img class="logoutBtn" id="logoutButton" onclick="logout()" src="images/icons/logout_symbol.png" alt="logout"></a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>

    <!-- Login call to action & insert/replace with main tbale data -->
    <?php if (isset($_GET['data']) && $_GET['data'] != '') {
        echo '<div id="showprojs"><h2  class="loginCta" >';
        require_once('showproj.php');
        echo '</div>';
    } else { ?>
        <div id="showprojs">
            <h2 class="loginCta">Login to see your projects.</h2>
        </div>
    <?php } ?>



    <!-- Add New Project Modal -->

    <div class="addNewProj-bg-modal">
        <div class="addNewProj-modal">
            <div>
                <h5 class="" id="">Add New Project </h5>
                <div class="addNewProj-close">+</div>
            </div>

            <form action="insertcode.php" method="POST">

                <input type="hidden" name="user_address" id="loggedInAddy" value="<?php if (isset($_GET['data'])) {
                                                                                        echo $_GET['data'];
                                                                                    } ?>">


                <div class="">
                    <input class="" type="date" name="mint_date">
                    <select class="" name="mintlist">
                        <option value="" selected hidden>Mint List?</option>
                        <option value="Whitelist">No</option>
                        <option value="wl Pending">Pending</option>
                        <option value="wl Needed">Yes</option>
                    </select>
                </div>

                <input type="text" name="project_name" class="" placeholder="Project Name...">

                <div class="">
                    <img class="ethIcon" src="images/logos/eth-logo.png" alt="Ethereum">
                    <input class="ethInput" type="float" name="price" placeholder="Price...">
                </div>

                <div>
                    <input class="" type="url" d="website" name="website" placeholder="Website url...">
                </div>
                <div>
                    <input class="" type="url" id="twitter" name="twitter" placeholder="Twitter url...">
                </div>
                <div>
                    <textarea class="" id="note" name="note" rows="5" cols="30" placeholder="Notes | copy and pasta info..."></textarea>
                </div>

                <div class="">
                    <button type="submit" name="insertdata" class="saveNewProjbtn">Save Project</button>
                </div>

            </form>

        </div>
    </div>


    <!-- Edit Project Modal -->

    <div class="editProj-bg-modal modal" id="editmodal">
        <div class="editProj-modal" role="document">
            <div>
                <h5 class="" id="">Edit Project </h5>
                <div class="editProj-close">+</div>
            </div>

            <form action="updatecode.php" method="POST">

                <div class="">
                    <input class="" type="hidden" name="edit_user_address" id="edit_user_address">
                    <input class="" type="hidden" name="edit_proj_id" id="edit_proj_id">

                    <div class="">
                        <input class="" type="date" id="edit_mint_date" name="edit_mint_date">
                        <select class="" name="edit_mintlist" id="edit_mintlist">
                            <option value="" selected hidden>Mint List?</option>
                            <option value="Whitelist">No</option>
                            <option value="wl Pending">Pending</option>
                            <option value="wl Needed">Yes</option>
                        </select>
                    </div>

                    <input type="text" name="edit_project_name" id="edit_project_name" placeholder="Project Name...">

                    <div class="">
                        <img class="ethIcon" src="images/logos/eth-logo.png" alt="Ethereum">
                        <input class="ethInput" type="float" name="edit_price" id="edit_price" placeholder="Price...">
                    </div>

                    <div>
                        <input class="" type="url" id="edit_website" name="edit_website" placeholder="Website url...">
                    </div>
                    <div>
                        <input class="" type="url" id="edit_twitter" name="edit_twitter" placeholder="Twitter url...">
                    </div>
                    <div>
                        <textarea class="" id="edit_note" name="edit_note" rows="5" cols="30" placeholder="Notes | copy and pasta info..."></textarea>
                    </div>
                </div>

                <div class="">
                    <button type="submit" name="updatedata" class="editProjbtn">Update Project</button>
                </div>

            </form>

        </div>
    </div>


    <!-- Delete Project Modal -->

    <div class="deleteProj-bg-modal" id="deletemodal">
        <div class="deleteProj-modal">
            <div>
                <h5 class="" id="">Delete Project? </h5>
                <div class="deleteProj-close">+</div>
            </div>

            <form action="deletecode.php" method="POST">

                <div class="">

                    <input type="hidden" name="delete_user_address" id="delete_user_address">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <input class="deletProjTitle" type="text" name="delete_name" id="delete_name">
                </div>
                <div class="">
                    <button type="submit" name="deletedata" class="deleteProjbtn"> Yes !! Delete it. </button>
                </div>
            </form>

        </div>
    </div>





</body>

</html>