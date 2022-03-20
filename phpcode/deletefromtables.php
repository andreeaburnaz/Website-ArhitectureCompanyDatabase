<?php
require_once "config.php";
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $tabel = $_POST['tabel'];
    $column = $_POST['column'];
    $sql = "DELETE FROM `$tabel` WHERE $column= '$search'"; // stergem linia dupa cautarea efectuata.
    $result = $link->query($sql);
    $link->close();
}
if (!empty($result)) {
    echo "Linia cu ID-ul ' $search ' din tabelul ' $tabel 's-a sters!";
    echo "<a href='deletefromtables.html'> Return to the delete page</a>";
} else {
    echo "Eroare";
}
?>