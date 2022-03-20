<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>SUBQUERIES</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="subqueries.css">
   </head>
   <body>
      <!------- Interogari Complexe ------->   
      <div class="container mt-2">
         <div class="row">
            <div class="col-md-12">
               <div class="page-header">
                  <h2>Interogari Complexe</h2>
               </div>
               <button class="a.button4" onclick="myFunction('mytable1');" style="background-color:#0EE0AF">Gasiti si ordonati descrescator cele mai recente contracte pe care le semneaza fiecare client.</button><br>
               <button class="a.button4" onclick="myFunction('mytable2');" style="background-color:#E00EB3">Afisati id-ul, numele, prenumele si email-ul clientilor care nu au niciun proiect in cadrul firmei.</button><br>
               <button class="a.button4" onclick="myFunction('mytable3');" style="background-color:#98E00E">Afisati id-ul, numele si durata primelor 2 proiecte in functie de bugetul alocat.</button><br>
               <button class="a.button4" onclick="myFunction('mytable4');" style="background-color:#FF5733 ">In ce an vor lua sfarsit cele mai multe contracte ale firmei. Afisati anul si numarul contractelor.</button><br>
               <form method="GET">
                  <?php
                     /* 1. SUBCERERE */
                     $sql = "SELECT C.idContract,C.NumeAchizitor,C.NumePrestator,C.DataInceput
                     FROM contracte C 
                     WHERE C.DataInceput>=(SELECT max(C2.DataInceput) 
                     FROM contracte C2 
                     WHERE C2.idClient=C.idClient) 
                     ORDER BY C.DataInceput DESC";  
                     
                     $result = $link->query($sql);
                     
                     ?>
                  <table class="table" id="mytable1" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idContract</th>
                           <th scope="col">NumeAchizitor</th>
                           <th scope="col">NumePrestator</th>
                           <th scope="col">DataInceput</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result->num_rows > 0): ?>
                        <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                           <th scope="row"><?php echo $array[0];?></th>
                           <td><?php echo $array[1];?></td>
                           <td><?php echo $array[2];?></td>
                           <td><?php echo $array[3];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">Nu s-au gasit date</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                     </tbody>
                  </table>
                  <?php
                     /* 2. SUBCERERE */
                     $sql1 = "SELECT C.idClient,C.Nume,C.Prenume,C.Email
                     FROM clienti C 
                     WHERE NOT EXISTS(SELECT * FROM proiecte WHERE idClient=C.idClient) ";  
                     
                     $result1 = $link->query($sql1);
                     
                     ?>
                  <table class="table" id="mytable2" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idClient</th>
                           <th scope="col">Nume</th>
                           <th scope="col">Prenume</th>
                           <th scope="col">Email</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result1->num_rows > 0): ?>
                        <?php while($array1=mysqli_fetch_row($result1)): ?>
                        <tr>
                           <th scope="row"><?php echo $array1[0];?></th>
                           <td><?php echo $array1[1];?></td>
                           <td><?php echo $array1[2];?></td>
                           <td><?php echo $array1[3];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">Nu s-au gasit date</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result1); ?>
                     </tbody>
                  </table>
                  <?php
                     /* 3. SUBCERERE */
                     $sql2 = "SELECT P.idProiect, P.Nume, P.Durata
                     FROM proiecte P 
                     WHERE 2>(SELECT count(*) 
                     FROM proiecte 
                     WHERE P.Buget  < Buget)
                     ORDER BY P.Buget DESC";  
                     
                     $result2 = $link->query($sql2);
                     
                     ?>
                  <table class="table" id="mytable3" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idProiect</th>
                           <th scope="col">Nume</th>
                           <th scope="col">Durata</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result2->num_rows > 0): ?>
                        <?php while($array2=mysqli_fetch_row($result2)): ?>
                        <tr>
                           <th scope="row"><?php echo $array2[0];?></th>
                           <td><?php echo $array2[1];?></td>
                           <td><?php echo $array2[2];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">Nu s-au gasit date</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result2); ?>
                     </tbody>
                  </table>
                  <?php
                     /*4. SUBCERERE */
                     $sql3 = "SELECT YEAR(DataSfarsit)AS An, COUNT(DataSfarsit) 
                     FROM contracte
                     GROUP BY YEAR(DataSfarsit) 
                     HAVING COUNT(DataSfarsit) = (SELECT MAX(X.Contracte) AS ContracteMax
                     FROM (SELECT Year(DataSfarsit) AS An, COUNT(DataSfarsit) AS Contracte 
                     FROM contracte
                     GROUP BY YEAR(DataSfarsit)) X)";  
                     
                     $result3 = $link->query($sql3);
                     
                     ?>
                  <table class="table" id="mytable4" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">An</th>
                           <th scope="col">NrContracte</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result3->num_rows > 0): ?>
                        <?php while($array3=mysqli_fetch_row($result3)): ?>
                        <tr>
                           <th scope="row"><?php echo $array3[0];?></th>
                           <td><?php echo $array3[1];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">Nu s-au gasit date</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result3); ?>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <?php
         $link->close();
         ?>
      </form>
      <script src="joins.js"></script>
      <div class="bottom">
         <a href="welcome.php">Welcome page</a>
      </div>
   </body>
</html>