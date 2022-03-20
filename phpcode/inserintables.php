<?php
include_once 'config.php';
if (isset($_POST['save'])) {
    /* INSERT in tabelul clienti*/
    $idClient = $_POST['idClient'];
    $Nume = $_POST['Nume'];
    $Prenume = $_POST['Prenume'];
    $CNP = $_POST['CNP'];
    $Oras = $_POST['Oras'];
    $Sex = $_POST['Sex'];
    $Telefon = $_POST['Telefon'];
    $Email = $_POST['Email'];
    $sql1 = "INSERT INTO clienti (idClient,Nume,Prenume,CNP,Oras,Sex,Telefon,Email)    
 VALUES ('$idClient','$Nume','$Prenume','$CNP','$Oras','$Sex','$Telefon','$Email')";
    if (mysqli_query($link, $sql1)) {
        echo "O noua inregistrare a fost adaugata cu succes!";
        echo "<a href='insertintables.html'> Return to insert in tables </a>";
    } else {
        echo "Error: " . $sql1 . "
" . mysqli_error($link);
    }
}
if (isset($_POST['save1'])) { /* INSERT in tabelul proiecte*/
    $idProiect = $_POST['idProiect'];
    $idClient = $_POST['idClient1'];
    $Nume = $_POST['Nume1'];
    $Durata = $_POST['Durata'];
    $Buget = $_POST['Buget'];
    $Profit = $_POST['Profit'];
    $sql = "INSERT INTO proiecte (idProiect,idClient,Nume,Durata,Buget,Profit)    
	 VALUES ('$idProiect','$idClient','$Nume','$Durata','$Buget','$Profit')";
    if (mysqli_query($link, $sql)) {
        echo "O noua inregistrare a fost adaugata cu succes!";
        echo "<a href='welcome.php'> Return to insert in tables </a>";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($link);
    }
}
if (isset($_POST['save2'])) { /* INSERT in tabelul contracte*/
    $idContract = $_POST['idContract'];
    $idClient = $_POST['idClient2'];
    $NumeAchizitor = $_POST['NumeAchizitor'];
    $NumePrestator = $_POST['NumePrestator'];
    $DataInceput = $_POST['DataInceput'];
    $DataSfarsit = $_POST['DataSfarsit'];
    $sql2 = "INSERT INTO contracte (idContract,idClient,NumeAchizitor,NumePrestator,DataInceput,DataSfarsit)    
	 VALUES ('$idContract','$idClient','$NumeAchizitor','$NumePrestator','$DataInceput','$DataSfarsit')";
    if (mysqli_query($link, $sql2)) {
        echo "   O noua inregistrare a fost adaugata cu succes!";
        echo "<a href='welcome.php'> Return to insert in tables </a>";
    } else {
        echo "Error: " . $sql2 . "
" . mysqli_error($link);
    }
}
if (isset($_POST['save3'])) { /* INSERT in tabelul parteneri*/
    $idPartener = $_POST['idPartener'];
    $Nume = $_POST['Nume3'];
    $Tara = $_POST['Tara'];
    $Telefon = $_POST['Telefon3'];
    $Email = $_POST['Email3'];
    $idServiciu = $_POST['idServiciu3'];
    $sql3 = "INSERT INTO parteneri (idPartener,Nume,Tara,Telefon,Email,idServiciu)    
	 VALUES ('$idPartener','$Nume','$Tara','$Telefon','$Email','$idServiciu')";
    if (mysqli_query($link, $sql3)) {
        echo "   O noua inregistrare a fost adaugata cu succes!";
        echo "<a href='welcome.php'> Return to insert in tables </a>";
    } else {
        echo "Error: " . $sql3 . "
" . mysqli_error($link);
    }
}
if (isset($_POST['save4'])) { /* INSERT in tabelul servicii*/
    $idServiciu = $_POST['idServiciu'];
    $idProiect = $_POST['idProiect4'];
    $Nume = $_POST['Nume4'];
    $NumeCoordonator = $_POST['NumeCoordonator'];
    $NrAngajati = $_POST['NrAngajati'];
    $sql4 = "INSERT INTO servicii (idServiciu,idProiect,Nume,NumeCoordonator,NrAngajati)    
	 VALUES ('$idServiciu','$idProiect','$Nume','$NumeCoordonator','$NrAngajati')";
    if (mysqli_query($link, $sql4)) {
        echo "   O noua inregistrare a fost adaugata cu succes!";
        echo "<a href='welcome.php'> Return to insert in tables </a>";
    } else {
        echo "Error: " . $sql4 . "
" . mysqli_error($link);
    }
}
mysqli_close($link);