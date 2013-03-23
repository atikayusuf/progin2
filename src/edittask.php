<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        <!--[if lt IE 9]>
        <script src="html5.js" type="text/javascript"></script>
        <![endif]-->
        <title>ToDo</title>
        <link rel="stylesheet" type="text/css" media="all" href="css.css" />
    </head>

    <body>
        <header>	

            <div id="tes">
                <br></br>
                <h1 id="logo"><a href="dashboard.php"><img src="images/logo2.png"/></a>
                    <input name="search" size="30" type="text" maxlength="20"><img src="images/search-icon.png"/>
            </div>
        </header>
        <div id="page" >
            <header id="branding">
                <hgroup>
                    <h1 id="site-title">              <a href="dashboard.php"></a></h1>
                    <h2 id="site-description">            </h2>
                </hgroup>

                <nav id="access" role="navigation">
                    <ul class="menu">
                        <li class="menu-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="menu-item current_page_item"><a href="profil.php">Profile</a></li>

                    </ul>
                </nav>



            </header>

            <div id="main">
                <div id="primary">
                    <div id="content" role="main">
                        <article class="post">	

                            <?php
                            session_start();
                            require_once("database.php");
                            $task = $_GET['task'];
                            $con = connectDatabase();
                            $query = 'SELECT * FROM task WHERE namaTask="' . $task . '"';
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_array($result);
                            echo "Nama Task : " . $row['namaTask'];
                            echo "<br>Creator : " . $row['creatorTaskName'];
                            echo "<br>Deadline : " . $row['deadline'];
                            echo "<br>Status : " . $row['status'];
                            if ($_SESSION['login'] == $row['creatorTaskName']) {
                                echo '<br><a href="deletetask2.php?&task=' . $row['namaTask'] . '"><input type="button" value="Delete Task">' . "</a>";
                            }
                            ?>
<?php ?>


                        </article>		
                    </div>			
                </div>



                <footer id="colophon">
                    <div id="site-generator">
                        <p>&copy; <a href="#">AAA</a>-IF3038 Pemrograman Internet 2013 <br />
                        </p>
                    </div>
                </footer>
            </div>

        </div>	
    </body>
</html>