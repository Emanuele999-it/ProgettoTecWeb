<?php
class setterTemplate{
    private $page;

    public function __construct(){
        $this->page = file_get_contents(__DIR__ . "/pageTemplate.php");
    }

    public function setHeader(){
        $this->page = str_replace("<headerSegnaposto />", file_get_contents(__DIR__ . "/header.php"), $this->page);
    }

    public function setContent(string $content){ //$content deve essere == al nome del file senza percorso
        //CONTROLLO $content
        /*if ($content != controllo) {
            throw eccezione
        }*/
        $this->page = str_replace("<contentSegnaposto />", file_get_contents(__DIR__ . "/contents/" . $content), $this->page);
    }

    public function setFooter(){
        $this->page = str_replace("<footerSegnaposto />", file_get_contents(__DIR__ . "/footer.php"), $this->page);
    }

    public function stampaHtml(){
        echo $this->page;
    }
}


?>