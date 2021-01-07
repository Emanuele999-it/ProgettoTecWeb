<?php
class setterTemplate{
    private $page;
    private $root;

    public function __construct(string $root){
        $this->page = file_get_contents(__DIR__ . "/pageTemplate.php");
        $this->root = $root;
    }

    /*sistemaLink() serve a compensare il fatto che index.php si trova in un percorso diverso rispetto alle altre pagine.
    Aggiusta quindi i link delle immagini e style che sono presenti in header*/
    public function sistemaLink(){
        $this->page = str_replace("<correzioneLink />", $this->root, $this->page);
    }

    public function sistemaMenu(){
        if($this->root == ""){
            $this->page = str_replace("<correzioneMenu />", "php/", $this->page);
        }
        else{
            $this->page = str_replace("<correzioneMenu />", "", $this->page);
        }
    }

    public function setHeader(){
        $this->page = str_replace("<headerSegnaposto />", file_get_contents(__DIR__ . "/contents/header.php"), $this->page);
    }

    public function setContent(string $content){ //$content deve essere == al nome del file senza percorso
        //CONTROLLO $content
        /*if ($content != controllo) {
            throw eccezione
        }*/
        $this->page = str_replace("<contentSegnaposto />", file_get_contents(__DIR__ . "/contents/" . $content), $this->page);
    }

    public function setFooter(){
        $this->page = str_replace("<footerSegnaposto />", file_get_contents(__DIR__ . "/contents/footer.php"), $this->page);
    }

    public function stampaHtml(){
        echo $this->page;
    }
}


?>