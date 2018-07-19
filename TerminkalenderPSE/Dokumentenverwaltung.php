<?php
include('header.php');
include('datenbank_anbindung.php');
session_start();
if($_SESSION['userid'] > 6) {
    ini_set('display_errors','off');                                                                                                            /*Notice undefined Index werden unterdrückt*/
    //die(ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir());                                                          /*Abfrage wo die Dateien temporär gespeichert werden/ Wenn es das upload_tmp_dir nicht findet, dann wird das System nach dem temporären Verzeichnis abgefragt(den Speicherort kann man auch in der datei php.ini unter file uploads finden)*/
    
    
    
    if(isset($_POST['dateischicken'] )){                                                                                                        /*Wenn der Button mit dem Namen dateischicken gedrückt ist, dann*/
        $ordnername = $_POST['ordnername'];                                                                                                         /*Der Inhalt des Textfeldes wird in die Variable $ordnername geladen*/
        mkdir("uploads/$ordnername");                                                                                                               /*Erstelle einen Ordner in Uploads mit dem Namen der beim Textfeld $ordnername eingegeben wurde*/
        $ziel = "uploads/$ordnername/";                                                                                                             /*Das Speicherziel ist in xmapp/htdocs/Klalenderprogramm/uploads/$ordnername/. also in dem neuen Ordner der erstellt wurde*/
        $zieldatei = $ziel .basename($_FILES["neuedatei"]["name"]);                                                                                 /*Beim Hochladen soll die Datei gleich heißen, da sie ansonsten gehashed wird/basename beinhaltet: Das File soll den Namen des upgeloadeten Files "neuedatei" übernehmen*/
        
        if ($_FILES['neuedatei']['size'] > 3000000){                                                                                            /*Dateiobergrenze:3MB*/
            $fehler ="<br>Die Datei ist zu groß;";                                                                                              /*Wenn die Datei größer als 4MB ist dann kommt diese Fehlermeldung*/
        }
        if(!($_FILES['neuedatei']['type']  == 'application/mspowerpoint' OR $_FILES['neuedatei']['type']  == 'application/pdf' OR
            $_FILES['neuedatei']['type']  == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'))                      /*Wenn Neuedatei nicht Powerpoint-Datei(*.pptx, *.ppt ,*.ppz ,*.pps ,*.pot) oder Pdf-Datei(*.pdf)*/
        {
            $fehler ="<br>Der Dateityp ist nicht erlaubt<br>";                                                                                  /*Dann Dateityp nicht zulässig*/
        }
        if(file_exists($zieldatei)){                                                                                                            /*Wenn die Datei schon im Ordner uploads vorhanden ist*/
            $fehler ="<br>Die Datei wurde schon verschickt!<br>";                                                                               /*Dann gebe die Fehlermeldung aus, dass sie schon verschickt wurde*/
        }
        if($fehler){                                                                                                                            /*Falls jeglicher Fehler besteht, soll es als Überschrift 4 in rot ausgegeben werden*/
            echo "<h4><font color=red> $fehler</font></h4>";
        }else    {                                                                                                                              /*Wenn kein Fehler besteht*/
            if(move_uploaded_file($_FILES["neuedatei"]["tmp_name"],$zieldatei)){                                                                     /*Wird abgefragt ob die temporär hochgelade Datei final in $zieldatei weitergeleitet wurde */
                echo "<h4><font color=blue>Der Upload war erfolgreich</font></h4>";                                                               /*Wenn ja war der Upload erfolgreich*/
            } else {                                                                                                                            /*Wenn nicht, gibt es einen Fehler*/
                echo  "<h4><font color=Rede>Beim Upload ist ein Fehler aufgetreten</font></h4>";
            }
            unset($ordnername);                                                                                                                   /*Nachem man die Datei versendet/hochgeladen hat, sollen die Felder wieder leer sein*/
            unset($neuedatei);
            unset($kategorie);
        }
    }
    
    ?>
<html>
   <body>
      <nav class="nav">
         <ul>
            <li><a href="Terminverwaltung.php" >Terminverwaltung</a></li>
            <li><a href="Dokumentenverwaltung.php" class="active" >Dokumentenverwaltung</a></l>
            <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Toolbar</a>																				<!-- Erstellung eines Dropdownmenüs -->
    <div class="dropdown-content">																											<!-- Der Klasse dropdown-content -->
      <a href="https://www.google.com/drive/">Google-Drive </a>																											<!-- Und bestimmten Menüpunkten -->
      <a href="https://github.com/">Github</a>
      <a href="https://moodle.hwr-berlin.de/">Hwr-Moodle</a>
      <a href="http://wiki.mint4.de/">Wiki.mint4</a>
    </div>
 		 </li>
         </ul>
      </nav>
      
      
      <section id="main">																					  	   							  <!-- Hauptbereich, also unter Überschrift und navigation-->
         <article>																								                              <!-- Artikelaufbau, linke Seite der Website-->
            <form action='dokumentenverwaltung.php' method='post' enctype='multipart/form-data'>                                              <!-- Mit action=' echo $PHP_SELF; 'ruft das Formular die gleiche Webseite erneut auf, da das Speichern der Informationen und der Datei ebenfalls in diese Webseite integriert wird/Mit enctype='multipart/form-data' wird der Form gesagt, dass Dateien abgesendet werden -->						
               <p>Ordner Name</p>
               <input type=text name='ordnername' size=50 placeholder='Thema_Gruppe_Matrikelnummer_Matrikelnummer' ><br>                      <!-- Textfeld mit der größe 50 Zeichen der als linktext ausgegeben wird  -->
               <p>Kategorie</p>
               <select name='kategorie' size=1>                                                                                               <!-- Kategorie, welche Dateientypen abgegeben werden dürfen(Nur frontend) -->
                  <option>PDF-Datei
                  <option>PowerPoint-Datei
               </select>
               <p>Datei aussuchen</p>
               <input type=file name='neuedatei' size=100>															                          <!-- Der Button zum aussuchen der Datei auf dem Datenträger -->
               <br><br>
               <input type="submit" name= "dateischicken">															                          <!-- Button der die neue Datei abschickt -->
               <input type="Reset" value="Eintrag entfernen">							     						                          <!-- Zurücksetzen button -->
            </form>
          														
         </article>
         <?php
            include('seitenleiste.php');
            }else {
                header('Location:Login.php');
                }
            ?>
      </section>
   </body>
</html>
