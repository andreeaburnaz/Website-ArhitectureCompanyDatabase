<?php
   require_once "config.php";
   ini_set("display_errors", 0);
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>JOINS</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="joins.css">
   </head>
   <body>
      <!------- Interogari Simple ------->   
      <div class="container mt-2">
         <div class="row">
            <div class="col-md-12">
               <div class="page-header">
                  <h2>Interogari Simple</h2>
               </div>
               <button class="a.button4" onclick="myFunction('mytable1');" style="background-color:#f14e4e">Sa se afiseze numele si prenumele clientilor care au intocmit un contract al carui NumeAchizitor incepe cu litera "D".</button><br>
               <button class="a.button4" onclick="myFunction('mytable2');" style="background-color:#03f500">Sa se afiseze numele,prenumele si CNP-ul clientilor cu mai mult de 2 proiecte.</button><br>
               <button class="a.button4" onclick="myFunction('mytable4');" style="background-color:#f87701">Afisati numele si durata proiectelor ale caror clienti sunt de gen masculin.</button><br>
               <button class="a.button4" onclick="myFunction('mytable5');" style="background-color:#045dff">Afisati primele 3 profituri de la proiectele unde clientii fie au numele care incepe cu litera "C",fie au prenumele care se termina cu litera "A".</button><br>
               <button class="a.button4" onclick="myFunction('mytable6');" style="background-color:#b775ff">Afisati tara partenerilor care lucreaza in domeniul "Constructii".</button><br>
               <button class="a.button4" onclick="myFunction('mytable3');" style="background-color:#f8e501">Afisati in ordine descrescatoare, in functie de numararul angajatilor, id-ul, numele si numele coordonatoroului serviciilor care au cel putin un partener asociat.</button><br>
               <form method="GET">
                  Introduceti numarul de angajati : NrAngajati=<br>
                  <input type="text" name="NrAngajati_var">
                  <br>
                  <input type="submit" name="save" value="submit"  style="float:center"><br>
                  <?php
                     /* 1. JOIN */
                     $sql = "SELECT CL.Nume,CL.Prenume 
                     FROM clienti CL JOIN contracte CR ON (CL.idClient = CR.idClient) 
                     WHERE CR.NumeAchizitor LIKE 'd%'
                     GROUP BY CL.idClient";  
                     
                     $result = $link->query($sql);
                     
                     ?>
                  <table class="table" id="mytable1" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">Nume</th>
                           <th scope="col">Prenume</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result->num_rows > 0): ?>
                        <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                           <th scope="row"><?php echo $array[0];?></th>
                           <td><?php echo $array[1];?></td>
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
                     /* 2. JOIN */
                     $sql1 = "SELECT C.Nume, C.Prenume,C.CNP
                     FROM clienti C JOIN proiecte P ON (C.idClient = P.idClient)  
                     GROUP BY P.idClient
                     HAVING COUNT(P.idClient) >= 2";  
                     
                     $result1 = $link->query($sql1);
                     
                     ?>
                  <table class="table" id="mytable2" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">Nume</th>
                           <th scope="col">Prenume</th>
                           <th scope="col">CNP</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result1->num_rows > 0): ?>
                        <?php while($array1=mysqli_fetch_row($result1)): ?>
                        <tr>
                           <th scope="row"><?php echo $array1[0];?></th>
                           <td><?php echo $array1[1];?></td>
                           <td><?php echo $array1[2];?></td>
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
                     /* 3. JOIN - parametru variabil */
                     if(isset($_GET['save']))
                         $NrAngajati_var = $_GET['NrAngajati_var'];
                     
                     
                     $sql2 = "SELECT S.idServiciu, S.Nume, S.NumeCoordonator
                     FROM servicii S JOIN parteneri P ON (P.idServiciu = S.idServiciu)  
                     WHERE S.NrAngajati >='$NrAngajati_var'                                        
                     GROUP BY S.idServiciu
                     ORDER BY S.NrAngajati desc";
                     
                     
                     $result2 = $link->query($sql2);
                     
                     ?>
                  <table class="table" id="mytable3" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idServiciu</th>
                           <th scope="col">Nume</th>
                           <th scope="col">NumeCoordonator</th>
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
                     /*4. JOIN*/
                     $sql3 = "SELECT P.Nume,P.Durata
                     FROM proiecte P JOIN clienti C ON (P.idClient = C.idClient)  
                     WHERE C.Sex='M'
                     GROUP BY P.idProiect";  
                     
                     $result3 = $link->query($sql3);
                     
                     ?>
                  <table class="table" id="mytable4" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">Nume</th>
                           <th scope="col">Durata</th>
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
                  <?php
                     /*5.JOIN*/
                     $sql4 = "SELECT  A.idProiect,A.idClient,A.Profit
                     FROM proiecte A  JOIN clienti C ON (A.idClient = C.idClient)  
                     WHERE (C.Nume like 'C%' or C.Prenume like '%a')
                     ORDER BY A.Profit DESC LIMIT 3";  
                     
                     $result4 = $link->query($sql4);
                     
                     ?>
                  <table class="table" id="mytable5" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idProiect</th>
                           <th scope="col">idClient</th>
                           <th scope="col">Profit</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result4->num_rows > 0): ?>
                        <?php while($array4=mysqli_fetch_row($result4)): ?>
                        <tr>
                           <th scope="row"><?php echo $array4[0];?></th>
                           <td><?php echo $array4[1];?></td>
                           <td><?php echo $array4[2];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">Nu s-au gasit date</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result4); ?>
                     </tbody>
                  </table>
                  <?php
                     /*6.JOIN*/
                     $sql5 = "SELECT  A.idPartener, A.Tara
                     FROM parteneri A  JOIN servicii S ON (A.idServiciu = S.idServiciu)   
                     WHERE A.idServiciu=3
                     ORDER BY A.Tara ASC";  
                     
                     $result5= $link->query($sql5);
                     
                     ?>
                  <table class="table" id="mytable6" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idPartener</th>
                           <th scope="col">Tara</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result5->num_rows > 0): ?>
                        <?php while($array5=mysqli_fetch_row($result5)): ?>
                        <tr>
                           <th scope="row"><?php echo $array5[0];?></th>
                           <td><?php echo $array5[1];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">Nu s-au gasit date</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result5); ?>
                     </tbody>
                  </table>
               </form>
            </div>
         </div>
      </div>
      <?php
         $link->close();
         ?>
      <script src="joins.js"></script>
      <div class="bottom">
         <a href="welcome.php">Welcome page</a>
      </div>
   </body>
</html>