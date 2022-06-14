<?php
 include('connect.php');
?> 
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8"/>
  <title>ЛБ 3</title>
  <link href="style1.css" rel="stylesheet">
 </head>
<script>
    var ajax = new XMLHttpRequest();

    function loadDataReq1(){
        if (ajax.readyState === 4) {
            if(ajax.status === 200) {
                console.log(ajax.response);
                document.getElementById("result1").innerHTML = ajax.response;
            } 
        }
    };


    function request1(){
        ajax.onreadystatechange = loadDataReq1;
        let name = document.getElementById("name").value;
        ajax.open("GET", "lab3-1.php?name=" + name);
        //request.setRequestHeader("Content-type","application/x-www-formurlencoded");
        ajax.send();
    };

    // function loadDataReq2(){
    //      if (ajax.readyState === 4) {
    //          if(ajax.status === 200) {
    //              let rows = JSON.parse(ajax.response);
    //              console.dir(rows);
    //              let result = "";
    //              for(let i = 0; i < rows.length; i++){
    //                  result += "<tr><td>" + rows[i].name + "</td><td>" + rows[i].start + "</td><td>" + rows[i].stop + "</td><td>" + rows[i].in_trafic + "</td><td>" + rows[i].out_trafic + "</td></tr>";
    //              }
                
    //              document.getElementById("result2").innerHTML = result;
    //          } 
    //      }
    // };

    async function request2(){
        let time1 = document.getElementById("time1").value;
       let time2 = document.getElementById("time2").value;
       let url = "lab3-2.php?time1="+ time1 + "&time2=" + time2;
       let response = await fetch(url);
       let json = await response.json();
       let result = "";
       for(let i = 0; i < json.length; i++){
                      result += "<tr><td>" + json[i].name + "</td><td>" + json[i].start + "</td><td>" + json[i].stop + "</td><td>" + json[i].in_trafic + "</td><td>" + json[i].out_trafic + "</td></tr>";
                  }
                
        document.getElementById("result2").innerHTML = result;
        //  ajax.onreadystatechange = loadDataReq2;
        //  let time1 = document.getElementById("time1").value;
        //  let time2 = document.getElementById("time2").value;
        //  ajax.open("GET", "lab3-2.php?time1="+ time1 + "&time2=" + time2);
        //  //ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        //  ajax.send();
    };

    function loadDataReq3(){
        if (ajax.readyState === 4) {
            if(ajax.status === 200) {
                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "";
                for(let i = 0; i< rows.length; i++){
                    result += "<tr><td>" + rows[i].children[0].firstChild.nodeValue + "</td><td>" + rows[i].children[1].firstChild.nodeValue + "</td><tr>";
                }
                document.getElementById("result3").innerHTML = result;
            }
        }
    };

    function request3(){
        ajax.onreadystatechange = loadDataReq3;
        let time1 = document.getElementById("time1").value;
        let time2 = document.getElementById("time2").value;
        ajax.open("GET", "lab3-3.php");
        ajax.send();
    };
</script>
 <body>  
 <main>
     
  <h1>Лабораторная №3. Вариант №8</h1>
  <div>
  <h3>Статистика работы выбранного клиента</h3>
  <h3 style="color: rgb(57, 57, 57)">Выберете клиента:</h3>
        <select name="name" id="name" >
       <?php
            try
            {
                $sql = "SELECT client.name FROM client";
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[0];
                    print "<option value='$name'>$name</option>";
                }
            }
            catch (PDOException $e)
            {
                print "Error!: " . $e ->getMessage() . "<br>";
                die();
            }
        ?>   
        </select>
          <input type = "button" value = "Выбрать" onclick="request1()">                     
                 <table border="1">
            <tr>
                <th>Start</th>
                <th>Stop</th>
                <th>In_Trafic</th>
                <th>Out_Trafic</th>
            </tr>         
  <tr id="result1"></tr>
</table>                  

          </div>

  <div>
  <h3>Статистика работы в сети</h3>
  <h3 style="color: rgb(57, 57, 57)">Выберете промежуток времени:</h3>
  <h>с</h>
  <select name="time1" id="time1">
  <option>01:00:00</option>
  <option>02:00:00</option>
  <option>03:00:00</option>
  <option>04:00:00</option>
  <option>05:00:00</option>
  <option>06:00:00</option>
  <option>07:00:00</option>
  <option>08:00:00</option>
  <option>09:00:00</option>
  <option>10:00:00</option>
  <option>11:00:00</option>
  <option>12:00:00</option>
  <option>13:00:00</option>
  <option>14:00:00</option>
  <option>15:00:00</option>
  <option>16:00:00</option>
  <option>17:00:00</option>
  <option>18:00:00</option>
  <option>19:00:00</option>
  <option>20:00:00</option>
  <option>21:00:00</option>
  <option>22:00:00</option>
  <option>23:00:00</option>
  <option>24:00:00</option>
  </select>    
  <h>до</h>
  <select name="time2" id="time2">
  <option>01:00:00</option>
  <option>02:00:00</option>
  <option>03:00:00</option>
  <option>04:00:00</option>
  <option>05:00:00</option>
  <option>06:00:00</option>
  <option>07:00:00</option>
  <option>08:00:00</option>
  <option>09:00:00</option>
  <option>10:00:00</option>
  <option>11:00:00</option>
  <option>12:00:00</option>
  <option>13:00:00</option>
  <option>14:00:00</option>
  <option>15:00:00</option>
  <option>16:00:00</option>
  <option>17:00:00</option>
  <option>18:00:00</option>
  <option>19:00:00</option>
  <option>20:00:00</option>
  <option>21:00:00</option>
  <option>22:00:00</option>
  <option>23:00:00</option>
  <option>24:00:00</option>
  </select> 
  <input type = "button" value = "Выбрать" onclick="request2()">
  <table border="1">
            <tr>
                <th>Client</th>
                <th>Start</th>
                <th>Stop</th>
                <th>In_Trafic</th>
                <th>Out_Trafic</th>
            </tr>         
  <tbody id="result2"></tbody>
</table>
</div>

<div>
  <h3>Клиенты с отрицательным балансом счета</h3>
  <input type = "button" value = "Показать" onclick="request3()">
  <table border="1">
            <tr>
                <th>Client</th>
                <th>Balance</th>
            </tr>         
  <tbody id="result3"></tbody>
</table>
</div>

</main>
 </body>
</html>
