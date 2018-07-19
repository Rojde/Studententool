<?php
include('header.php');
include('datenbank_anbindung.php');
session_start();
if($_SESSION['userid'] == 6) {                                                                      /*Abfrage ob Zugangsberechtigung für die Admin-Seite vorhanden ist*/
    ?>

<html>
   <body>
      <nav class="nav">
         <ul>
            <li><a href="TerminverwaltungAdmin.php" >TerminverwaltungAdmin</a></li>
       		<li><a href="DokumentenverwaltungAdmin.php" class="active" >DokumentenverwaltungAdmin</a></l>
       		<li class="dropdown">
       		<a href="javascript:void(0)" class="dropbtn">Toolbar</a>
   	 <div class="dropdown-content">
      <a href="https://www.google.com/drive/">Google-Drive</a>
      <a href="https://github.com/">Github</a>
      <a href="https://moodle.hwr-berlin.de/">Hwr-Moodle</a>
      <a href="http://wiki.mint4.de/">Wiki.mint4</a>
    </div>
       	</li>
         </ul>
      </nav>
      <section id="main">
        
         <article>
            <!-- Artikelaufbau, linke Seite der Website-->
            <h2>Abgabe Projektarbeit [Finale Version]</h2>
            <h3>Abgabestatus</h3>
        
<?php

$ordner = "Uploads/";                                                                                /* Ordnername/auch komplette Pfade möglich ($ordner = "download/files";)*/
$alledateien = scandir($ordner);                                                                     /* Hier werden alle Dateien im Ordner ausgelesen und Array in Variable gespeichert/scandir sortiert von A-Z*/
foreach ($alledateien as $datei) {                                                                   /*Hier wird das Array $alledateien ausgegeben und in Variable $datei gespeichert*/
    $dateiinfo = pathinfo($ordner."/".$datei);                                                       /*Folgende Variablen stehen nach pathinfo zur Verfügung: 1.$dateiinfo['filename'] =Dateiname ohne Dateiendung  2.$dateiinfo['dirname'] = Verzeichnisname 3.$dateiinfo['extension'] = Dateityp -/endung 4.$dateiinfo['basename'] = voller Dateiname mit Dateiendung*/
    $size = ceil(filesize($ordner."/".$datei)/1024);                                                 /*Größe ermitteln der Datei*/
    if ($datei != "." && $datei != ".." && $datei !=".htaccess" && $datei !=".htpasswd") {           /*Nur Ausgabe von richtigen Ordner und keine . Ordner so wie der Index vom Kalenderprogramm. Und die htaccess und htpasswd sollen auch nicht angezeigt werden*/
 ?>    
   <ul> <a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">					         <!-- $dateiinfo['dirname'] Nimmt den Namen der Datei aus dem Verzeichnis/ $dateiinfo['basename']= Wenn man auf den Link drückt, wird der Inhalt der Datei angezeigt -->
    <?php echo $dateiinfo['filename']; ?></a> 		                                                         <!-- Ausgabe des Dateiennamens/Ausgabe des Dateityps -->
    </ul>
    
    												                                                         <!-- Ausgabe der Dateigröße in KB -->
	
<?php
 };
};

?>

   
         </article>
         <?php
            include('seitenleiste.php');
}               else {                                                                                      /*Wenn keine Zugangsberechtigung gegeben ist wird auf die Login-Seite weitergeleitet(redirect)*/
             header('Location:Login.php');
              }   
            ?>
      </section>
   </body>
</html>


