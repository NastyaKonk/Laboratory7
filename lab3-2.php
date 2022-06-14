<?php
            header('Content-Type: applications/json');
            header('Cache-Control: no-cache, must-revalidate');
             include('connect.php');

             if(isset($_GET["time1"]) AND isset($_GET["time2"]))
             {
                 $time1=$_GET["time1"];
                 $time2=$_GET["time2"];
                    $sql = "SELECT client.name, seanse.start, seanse.stop, seanse.in_trafic, seanse.out_trafic FROM seanse, client WHERE seanse.start > :time1 AND seanse.stop < :time2 AND client.ID_Client=seanse.FID_Client";
                    $sth =  $dbh->prepare($sql);
                    $sth->execute(array(':time1' => $time1, ':time2' => $time2));
                    $timetable = $sth->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($timetable);
                }            
            ?>

