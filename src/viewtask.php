<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        <!--[if lt IE 9]>
        <script src="html5.js" type="text/javascript"></script>
        <![endif]-->
        <title>ToDo</title>
        <link rel="stylesheet" type="text/css" media="all" href="css.css" />
        <script>
            function loadXMLdoc(){
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                
            }
        </script>
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
                            $task = $_GET['nama'];
                            $con = connectDatabase();
                            $query = 'SELECT * FROM task WHERE namaTask="' . $task . '"';
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_array($result);
                            echo "Nama Task : " . $row['namaTask'];
                            echo "<br>Creator : " . $row['creatorTaskName'];
                            echo "<br>Assignee : ";

                            $query4 = 'select * from usertotask where namaTask = "' . $task . '"';
                            $result4 = mysqli_query($con, $query4);
                            while ($row4 = mysqli_fetch_array($result4)) {
                                echo '<a href="viewprofile.php?user=' . $row4['username'] . '">' . $row4['username'] . '</a>  , ';
                            };
                            echo "<br>";


                            $ext = explode(".", $row['attachment']);
                            $extension = $ext[count($ext) - 1];
                            $picExtArray = array("png", "jpg", "jpeg", "bmp", "gif");
                            $vidExtArray = array("mpg", "avi", "flv", "mp4", "mpeg", "ogg");
                            if (in_array($extension, $picExtArray)) {
                                echo '<br>attachment : <br><img src="' . $row['attachment'] . '">';
                            } else if (in_array($extension, $vidExtArray)) {
                                ?>
                                <br>Attachment : <br>
                                <video class="isi" width="320" height="240" controls>
                                    <source src="<?php echo $row['attachment']; ?>" type="video/<?php echo $extension; ?>">
                                    Your browser does not support the video tag.
                                </video>
                                <br>
                                <?php
                            } else {
                                echo '<br>attachment : <a href="' . $row['attachment'] . '" target="_blank">' . $row['attachment'] . '</a>';
                            }
                            echo "<br>Deadline : " . $row['deadline'];
                            echo "<br>Status : " . $row['status'];
                            if ($_SESSION['namauser'] == $row['creatorTaskName']) {
                                echo '<br><a href="changetaskstatus.php?filter=-1&task=' . $row['namaTask'] . '"><input type="button" value="Ubah Status">' . "</a>";
                                echo '<br><a href="edittask.php?&task=' . $row['namaTask'] . '"><input type="button" value="Edit Task">' . "</a>";
                            }
                            ?>
                                <div align="right">
                                <?php
                                echo "Jumlah Komentar : " . $row['jumlahKomentar'] . "<br>------------<br>";
                                $query = 'SELECT * FROM komentar INNER JOIN user ON komentar.komentator=user.username WHERE namaTask="' . $task . '"ORDER BY  `komentar`.`timestamp` DESC';
                                $result = mysqli_query($con, $query);
                                $lastid = 0;
                                while ($row2 = mysqli_fetch_array($result)) {
                                    $query2 = 'SELECT count(*) as hasil FROM `komentar` where komentator="' . $row2['komentator'] . '" AND namaTask="' . $task . '";';
                                    if($row2['idKomentar']>$lastid){
                                        $lastid=$row2['idKomentar'];
                                        }
                                    $result2 = mysqli_query($con, $query2);
                                    $row3 = mysqli_fetch_array($result2);
                                    echo $row2['komentator'] . "<br>";
                                    echo $row3['hasil'] . " Comments<br>";
                                    echo '<img src="' . $row2['avatar'] . '"width = 50 height = 50>';
                                    echo "<br>";
                                    echo "on : " . $row2['timestamp'][11] . $row2['timestamp'][12] . ":" . $row2['timestamp'][14] . $row2['timestamp'][15] . " " . $row2['timestamp'][8] . $row2['timestamp'][9] . "/" . $row2['timestamp'][5] . $row2['timestamp'][6];
                                    echo "<br>";
                                    echo "Komentar : " . $row2['isikomentar'];
                                    echo "<br>";
                                    echo "<br>";
                                }
                                    echo '<div id="newtask"></div>'
                                ?>
                                <form action="submitcomment.php" method="POST">
                                    Isi Komentar :
                                    <br>
                                    <input type="hidden" name="lastid" value="<?php echo $lastid?>">
                                    <input type="hidden" name="task" value="<?php echo $task?>">
                                    <textarea name="isikomentar" cols="50" rows="5"></textarea>
                                    <br>
                                    
                                    <input type="submit" value="kirim!">
                                </form>
                            </div>
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