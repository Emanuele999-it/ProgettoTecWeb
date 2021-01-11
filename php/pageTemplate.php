<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

  <head>
      <title>
        <titlePlaceholder />
      </title>

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="title" content="<titlePlaceholder />" />
      <meta name="description" content="<descriptionPlaceholder />" />
      <meta name="keywords" content="videogiochi, videogames, recensioni" />
      <meta name="author" content="Emanuele Pase, Davide, Damiano Bertoldo, Filippo" />
      <meta name="language" content="it-IT" />
      <link rel="stylesheet" type="text/css" href="<rootFolder />/CSS/style.css" media="screen"/>
      <link rel="stylesheet" type="text/css" href="<rootFolder />/CSS/print.css" media="print"/>
      
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script>
      function myFunction() {
        var x = document.getElementById("links");
        if (x.style.display === "block") {
        x.style.display = "none";
        } else {
        x.style.display = "block";
        }
      }
      </script>
  </head>

  <body>
    <div id="header">
      <img  id="logo" src="<rootFolder />/img/logo-spaziogames.png" alt="Logo sito The Darksoulers"/>
      <div id="hamburger-menu" class="topnav">
        <div class="logo-mobile">
          <img  id="logo-mobile-full" src="<rootFolder />/img/logo-spaziogames.png" alt="Logo sito The Darksoulers"/>
          <img  id="logo-mobile-short" src="<rootFolder />/img/logo-mobile.png" alt="Logo sito The Darksoulers">
        </div>          
      </div>
      <navBarPlaceholder />
        <div id="barra-di-ricerca"> 
          <form>
            <fieldset id="fieldSet">
                <label for="risultati-ricerca">Cerca:</label>
                <input type="text" id="risultati-ricerca" name="termine-ricerca">
                <input type="image" id="immagine-lente" src="<rootFolder />/img/lente.png" alt="cerca">
            </fieldset>
          </form>
        </div>   
      <div id="breadcrumb">
          <p tabindex="0"> Il tuo percorso: <percorsoPlaceholder /> </p>  
      </div>  
      <a class="aiuti-screenreader" href="#menu">Vai ai menu</a>
      <a class="aiuti-screenreader" href="#content">Vai a contenuto</a>   
    </div>  

    <div id="content">
        <contentSegnaposto />
    </div>
      

      <footerSegnaposto />

  </body>
</html>