<?php
session_start();
//check if logged in
if(!isset($_SESSION['username'])){
    header("Location:adminLogin.html");
    exit();
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- <link rel="stylesheet" type="text/css" href="admin.css"> -->

        <title>ADMIN</title>

        <style>
           @media print{
        .logout,.delete, .student-register, .candidate-form{
                display: none!important;
            }
            .result{
                display:block !important;
            }
            .result{
                position:absolute;
                top: 0;
                left:0;
                width: 100%;
            }
            .print{
                display:none !important;
            }
           
        }
            * {
                padding: 0;
                margin: 0;
            }
            
            body {
                background-color: azure;
                background: linear-gradient(to right, rgb(126, 132, 136), rgb(108, 108, 219));
                height:700px;
            }
            
            input {
                width: 150px;
                height: 30px;
                padding: 6px;
                text-align: center;
                margin-left: 60px;
                margin-top: 20px;
                border-radius: 2px;
                border-style: none;
                box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.6);
            }
            
            label {
                margin-left: 60px;
                font-weight: bold;
            }
            a{
                text-decoration:none;
            }
         
          .logout{
            position:fixed;
            width:100px; 
            height:30px;   
            font-weight:bold; 
            margin-left:73%;
            padding:2px;
            border-radius:2px;
            border-style:none;

          }

          .logout:hover{
          width: 100px;
          height:30px;
          font-weight:bold;
          background: linear-gradient(to right, rgb(216, 237, 250), rgb(142, 241, 187));
          transition:0.5s ease-in-out;
          }
            .student-register {
                position:relative;
                width: 300px;
                height: 500px;
                margin-left: 200px;
                margin-top: 100px;
                background-color: lightgrey;
                box-sizing: border-box;
                box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.6);
                border-radius: 5px;
                display: inline-block;
            }
            
            .candidate-form {
                position: relative;
                width: 300px;
                height: 500px;
                margin-left: 70px;
                background-color: lightgrey;
                box-sizing: border-box;
                box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.6);
                border-radius: 5px;
                display: inline-block;
            }
            .delete{
                position:absolute;
                width: 300px;
                height: 500px;
                margin-left: 70px;
                margin-top: 100px;
                background-color: lightgrey;
                box-sizing: border-box;
                box-shadow: 5px 10px 5px rgba(0, 0, 0, 0.6);
                border-radius: 5px;
                display: inline-block;
            }
            
            .student-register {
                margin-top: 100px;
                margin-left: 45px;
            }
            
            .submit {
                margin-top: 40px;
                margin-left: 115px;
                width: 70px;
                height: 40px;
                position: relative;
            }
            
            .submit:hover {
                margin-left: 117px;
                background-color: rgb(108, 108, 219);
                font-weight: bold;
                transition: 0.5s ease-in-out;
                border-radius: 4px;
            }
            .result{
                display:none;
            }
.tables{
    margin-left:200px;
    display:inline-flex;
}
 .uniontable{
    width:400px;
    margin-left:50px;
    border:2px solid black;
    padding:10px;
}
.presidentable{
    width:400px;
    margin-left:40px;
    border:2px solid black;
    padding:10px;
}
.tableID{
    font-weight:bold;
    color:blue;
}
.tdedit{
    padding-left: 15px;
}
.print{
    width:100px;
    height:30px;
    position:fixed;
    border-radius: 3px;
}
#print{
    margin-left:65%;
    width:100px;
    height:30px;
    border-radius: 3px;
  
}
.print:hover{
    width:100px;
    height:40px;
    background: linear-gradient(to right, rgb(216, 237, 250), rgb(142, 241, 187));
    font-weight: bold;
    transition: 0.5s ease;
    border-radius: 2px;
    box-sizing:border-box;
}
        </style>
    </head>

    <body>
        <!--IMPORTING FORM FROM STUDENT LOGIN FOR CONSISTENCY
        TO INHERIT THE STYLE SIMILAR TO STUDENT LOGIN FORM,SAME EXTERNAL STYLESHEET IS LINKED-->
        <div >
            <button class="logout"><a href="index.html" style="color:black;">EXIT</a></button>    
        </div>
        <div id="print">
        <button class="print" onclick="window.print()">PRINT RESULTS</button></div>
        <div>
            <div class="student-register">
                <form action="register.php" method="post">
                    <label for="form-input">STUDENT REGISTRATION</label> <br><br>

                    <label for="studentName">Name</label><br>
                    <input type="text" placeholder="studentName" name="studentName" minlength="6" maxlength="50" required><br><br>

                    <label for="studentId">Id</label><br>
                    <input type="text" placeholder="studentId" name="studentId" minlength="4" maxlength="50" required> <br><br>

                    <label for="studentEmail">Email</label><br>
                    <input type="email" placeholder="gemschool@ac.ke" name="studentEmail" minlength="6" maxlength="50" required><br><br>

                    <label for="studentPassword">Password</label><br>
                    <input type="password" placeholder="studentPassword" name="studentPassword" minlength="6" maxlength="50" required><br>
                    <button class="submit" type="submit">SUBMIT</button>
                </form>
            </div>
            <!--CANDIDATE REGISTRATION FORM -->

            <div class="candidate-form">
                <form action="candidateregister.php" method="post">

                    <label for="form-input">CANDIDATE REGISTRATION</label> <br><br>
                    <label for="studentName">Name</label><br>
                    <input type="text" placeholder="studentName" name="studentName" minlength="6" maxlength="50" required><br><br>

                    <label for="studentId">Id</label><br>
                    <input type="text" placeholder="studentId" name="studentId" minlength="4" maxlength="50" required> <br><br>

                    <label for="studentEmail">Email</label><br>
                    <input type="email" placeholder="gemschool@ac.ke" name="studentEmail" maxlength="50" required><br><br>

                    <label for="Role">Role</label>
                    <input type="text" placeholder="Role Aspiring For" name="role" minlength="4" maxlength="50" required>

                    <button class="submit" type="submit">SUBMIT</button>
                </form>
            </div>
            <div class="delete">
             <form action="delete.php" method="post">

                    <label for="form-input">DE-REGISTER</label> <br><br><br><br><br>
                    <label for="studentName">Name</label><br>
                    <input type="text" placeholder="studentName" name="studentName" minlength="6" maxlength="50" required><br><br>

                    <label for="studentId">Id</label><br>
                    <input type="text" placeholder="studentId" name="studentId" minlength="4" maxlength="50" required> <br><br>

                    <label for="studentEmail">Email</label><br>
                    <input type="email" placeholder="gemschool@ac.ke" name="studentEmail" maxlength="50" required><br><br><br>
                    <button class="submit" type="submit">SUBMIT</button>

             </div>
        </div>
        
        <?php
        include 'connect.php';
        echo "<div class='result'>";
       
$sql ='SELECT * FROM president_results';
$query = mysqli_query($conn,$sql);

if(!($query)){

die ('Unable to run query!!');
}

echo "<div class='tables'>";
echo "<div class='presidentable'>";

echo "<table>
       <th colspan='3' class='tableID'>PRESIDENTIAL RESULT</th>
            <tr>
                <th>studentName</th>
                <th>studentId</th>
                <th>studentChoice</th>
            </tr>";

      while($row= mysqli_fetch_assoc($query)){
                 echo "
                 <tr>
        <td>".$row['studentName']."</td>
        <td class='tdedit'>".$row['studentId']."</td>
        <td class='tdedit'>".$row['studentChoice']."</td>
                 </tr>";
      }
    echo "</table>";
    
    $sql ="SELECT studentChoice, COUNT(*)
     AS total_votes
     FROM president_results
     WHERE studentChoice IS NOT NULL AND studentChoice !=''
     GROUP BY studentChoice ORDER BY total_votes DESC
     LIMIT 1 ";

     $result= $conn->query($sql);

     if($result && $result->num_rows>0){

     $data = $result->fetch_assoc();
     $winner = ($data['studentChoice']);

     $votes = (int)$data['total_votes'];

     echo "<h3>WINNER: $winner</h3>";
     echo "<h3>Total Votes: $votes</h3>";
     }
echo "</div>";

$sql ='SELECT * FROM unionrep_results';
$query = mysqli_query($conn,$sql);

if(!($query)){

die ('Unable to run query');
}

echo "<div class='uniontable'>";
echo "<table>
        <th colspan='3' class='tableID'>UNION-REP RESULTS</th>
            <tr>
                <th>studentName</th>
                <th>studentId</th>
                <th>studentChoice</th>
            </tr>";

      while($row= mysqli_fetch_assoc($query)){
                 echo "
                 <tr>
        <td>".$row['studentName']."</td>
        <td class='tdedit'>".$row['studentId']." </td>
        <td class='tdedit'>".$row['studentChoice']."</td>
                 </tr>";
      }
    echo "</table>";
    // COMPUTING THE WINNER OF THE ELECTION PROCESS

    $sql ="SELECT studentChoice, COUNT(*)
     AS total_votes
     FROM unionrep_results
     WHERE studentChoice IS NOT NULL AND studentChoice !=''
     GROUP BY studentChoice ORDER BY total_votes DESC
     LIMIT 1 ";

     $result= $conn->query($sql);

     if($result && $result->num_rows>0){

     $data = $result->fetch_assoc();
     $winner = ($data['studentChoice']);

     $votes = (int)$data['total_votes'];

     echo "<h3>WINNER: $winner</h3>";
     echo "<h3>Total Votes: $votes</h3>";
     }
     echo "</div>";

     echo "</div>";
     echo "<br>";
     echo "<div id='print'>
<button class='print' onclick='window.print()'>PRINT RESULT</button>
</div>";
echo "</div>";
?>

    </body>

    </html>