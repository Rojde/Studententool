<?php
include('header.php');                                                                                        /*hier wird die datei header.php eingebunden, so macht mand das programm übersichtlicher und muss nicht so viel quelltext kopieren */
include('datenbank_anbindung.php');
session_start();
if($_SESSION['userid'] > 6) {
    ?>
<html>
   <body>
      <nav class="nav">																						  <!-- Erstellung einer Navigationsleiste-->
         <ul>                                                                                                 <!-- Auflistung-->
            <li><a href="Terminverwaltung.php" class="active">Terminverwaltung</a></li>                       <!-- Weiterleitung auf Menüpunkt Termine/class=Active=orangene untere linie bleibt wenn man auf dieser seite ist.-->
            <li><a href="Dokumentenverwaltung.php" >Dokumentenverwaltung</a></li>
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
      <section id="main">                                                                                     <!-- Hauptbereich, also unter Überschrift und navigation-->
         <article>                                                                                            <!-- Artikelaufbau, linke Seite der Website-->
            <h2>Terminkalender</h2>																			  <!-- Überschrift des Artikels-->
                                                                             <!-- Bild unter der Überschrift-->
           <?php include('index.php')?> </article>
         <?php
            include('seitenleiste.php');
                    }else {
                header('Location:Login.php');
                   }
            ?>
      </section>
      
      
   </body>
</html>



