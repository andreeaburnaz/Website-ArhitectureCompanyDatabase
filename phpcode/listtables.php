<?php
   require_once "config.php";
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>List tables</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="listtables.css">
   </head>
   <body>
      <div class="container mt-2">
         <div class="row">
            <div class="col-md-12">
               <div class="page-header">
                  <h2>List tables</h2>
               </div>
               <button class="a.button4" onclick="myFunction();"  style="background-color:#f14e4e">List tables from database</button>
               <form method="GET">
                  <?php
                     $sql = "select * from clienti"; // selectam datele din tabelul clienti
                     
                     $result = $link->query($sql);
                     ?>
                  <table class="table" id="mytable1" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idClient</th>
                           <th scope="col">Nume</th>
                           <th scope="col">Prenume</th>
                           <th scope="col">CNP</th>
                           <th scope="col">Oras</th>
                           <th scope="col">Sex</th>
                           <th scope="col">Telefon</th>
                           <th scope="col">Email</th>
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
                           <td><?php echo $array[4];?></td>
                           <td><?php echo $array[5];?></td>
                           <td><?php echo $array[6];?></td>
                           <td><?php echo $array[7];?></td>
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
                     $sql1 = "select * from contracte"; // selectam datele din tabelul contracte
                     
                     $result1 = $link->query($sql1);
                     ?>
                  <table class="table" id="mytable2" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idContract</th>
                           <th scope="col">idClient</th>
                           <th scope="col">NumeAchizitor</th>
                           <th scope="col">NumePrestator</th>
                           <th scope="col">DataInceput</th>
                           <th scope="col">DataSfarsit</th>
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
                           <td><?php echo $array1[4];?></td>
                           <td><?php echo $array1[5];?></td>
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
                     $sql2 = "select * from parteneri"; // selectam datele din tabelul parteneri
                     
                     $result2 = $link->query($sql2);
                     ?>
                  <table class="table" id="mytable3" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idPartener</th>
                           <th scope="col">Nume</th>
                           <th scope="col">Tara</th>
                           <th scope="col">Telefon</th>
                           <th scope="col">Email</th>
                           <th scope="col">idServiciu</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result2->num_rows > 0): ?>
                        <?php while($array2=mysqli_fetch_row($result2)): ?>
                        <tr>
                           <th scope="row"><?php echo $array2[0];?></th>
                           <td><?php echo $array2[1];?></td>
                           <td><?php echo $array2[2];?></td>
                           <td><?php echo $array2[3];?></td>
                           <td><?php echo $array2[4];?></td>
                           <td><?php echo $array2[5];?></td>
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
                     $sql3 = "select * from parteneriproiecte"; // selectam datele din tabelul parteneriproiecte
                     
                     $result3 = $link->query($sql3);
                     ?>
                  <table class="table" id="mytable4" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idPartener</th>
                           <th scope="col">idProiect</th>
                           <th scope="col">NrProiecte</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result3->num_rows > 0): ?>
                        <?php while($array3=mysqli_fetch_row($result3)): ?>
                        <tr>
                           <th scope="row"><?php echo $array3[0];?></th>
                           <td><?php echo $array3[1];?></td>
                           <td><?php echo $array3[2];?></td>
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
                     $sql4 = "select * from proiecte"; // selectam datele din tabelul proiecte
                     
                     $result4 = $link->query($sql4);
                     ?>
                  <table class="table" id="mytable5" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idProiect</th>
                           <th scope="col">idClient</th>
                           <th scope="col">Nume</th>
                           <th scope="col">Durata</th>
                           <th scope="col">Buget</th>
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
                           <td><?php echo $array4[3];?></td>
                           <td><?php echo $array4[4];?></td>
                           <td><?php echo $array4[5];?></td>
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
                     $sql5 = "select * from servicii"; // selectam datele din tabelul servicii
                     
                     $result5 = $link->query($sql5);
                     ?>
                  <table class="table" id="mytable6" style="display:none">
                     <thead>
                        <tr>
                           <th scope="col">idServiciu</th>
                           <th scope="col">idProiect</th>
                           <th scope="col">Nume</th>
                           <th scope="col">NumeCoordonator</th>
                           <th scope="col">NrAngajati</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($result5->num_rows > 0): ?>
                        <?php while($array5=mysqli_fetch_row($result5)): ?>
                        <tr>
                           <th scope="row"><?php echo $array5[0];?></th>
                           <td><?php echo $array5[1];?></td>
                           <td><?php echo $array5[2];?></td>
                           <td><?php echo $array5[3];?></td>
                           <td><?php echo $array5[4];?></td>
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
      <script src="listtables.js"></script>
      <div class="bottom">
         <a href="welcome.php">Welcome page</a>
      </div>
   </body>
</html>