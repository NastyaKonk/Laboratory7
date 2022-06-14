 <?php
     include('connect.php');

    if(isset($_REQUEST["name"]))
        {
             $name=$_REQUEST["name"];
                 
                $sql = "SELECT seanse.start, seanse.stop, seanse.in_trafic, seanse.out_trafic FROM seanse, client WHERE client.name=:name AND client.ID_Client=seanse.FID_Client";
                $sth =  $dbh->prepare($sql);
                $sth->execute(array(':name' => $name));
                $timetable = $sth->fetchAll();
                foreach($timetable as $row)
                {
                    $Start = $row[0];
                    $Stop = $row[1];
                    $In_Trafic = $row[2];
                    $Out_Trafic = $row[3];
                    echo "<td>$Start</td><td>$Stop</td><td>$In_Trafic</td><td>$Out_Trafic</td>";
                }
        }            
?>
