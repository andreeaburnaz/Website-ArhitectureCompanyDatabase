<?php
include_once 'config.php';
if(isset($_POST['save'])){
 /* UPDATE in tabelul clienti*/
 $idClient = $_POST['idClient'];
 $Nume = $_POST['Nume'];
 $Prenume = $_POST['Prenume'];
 $CNP = $_POST['CNP'];  
 $Oras = $_POST['Oras'];
 $Sex = $_POST['Sex'];
 $Telefon = $_POST['Telefon'];
 $Email = $_POST['Email'];
 
 $sql1 = "UPDATE clienti SET Nume='$Nume', Prenume='$Prenume', CNP='$CNP', Oras='$Oras',Sex='$Sex',Telefon='$Telefon',Email='$Email'
 WHERE idClient='$idClient'"; 
 if (mysqli_query($link, $sql1)) {
    echo "Linia de la id-ul '$idClient' din tabelul Clienti a fost modificata!";
    echo "<a href='updateintables.html'> Return to update in tables </a>";
 } else {
    echo "Error: " . $sql1 . "
" . mysqli_error($link);
 }
}

if(isset($_POST['save1']))
{	 /* UPDATE in tabelul proiecte*/
	 $idProiect = $_POST['idProiect'];
	 $idClient = $_POST['idClient1'];
	 $Nume = $_POST['Nume1'];
	 $Durata = $_POST['Durata'];  
     $Buget = $_POST['Buget'];
     $Profit = $_POST['Profit'];
	 $sql ="UPDATE proiecte SET idClient='$idClient', Nume='$Nume', Durata='$Durata', Buget='$Buget',Profit='$Profit'
     WHERE idProiect='$idProiect'"; 
	 if (mysqli_query($link, $sql)) {
		echo "Linia de la id-ul '$idProiect' din tabelul Proiecte a fost modificata!";
        echo "<a href='updateintables.html'> Return to update in tables </a>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($link);
	 }

}

if(isset($_POST['save2']))
{	 /* UPDATE in tabelul contracte*/
	 $idContract = $_POST['idContract'];
	 $idClient = $_POST['idClient2'];
	 $NumeAchizitor = $_POST['NumeAchizitor'];
	 $NumePrestator = $_POST['NumePrestator'];  
     $DataInceput = $_POST['DataInceput'];
     $DataSfarsit = $_POST['DataSfarsit'];
	 $sql2 = "UPDATE contracte SET idClient='$idClient', NumeAchizitor='$NumeAchizitor', NumePrestator='$NumePrestator', DataInceput='$DataInceput',DataSfarsit='$DataSfarsit'
     WHERE idContract='$idContract'"; 
	 if (mysqli_query($link, $sql2)) {
		echo "Linia de la id-ul '$idContract' din tabelul Contracte a fost modificata!";
        echo "<a href='updateintables.html'> Return to update in tables </a>";
	 } else {
		echo "Error: " . $sql2 . "
" . mysqli_error($link);
	 }

}

mysqli_close($link);
?>