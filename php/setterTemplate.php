<?php
class setterTemplate{
    private $page;
    private $root;

    public function __construct(string $root){
        $this->root = $root;
        $this->page = file_get_contents(__DIR__ . "/pageTemplate.php");
    }

    public function setTitle(string $title)
    {
        $this->page = str_replace("<titlePlaceholder />", $title, $this->page);
    }

    public function setDescription(string $description)
    {
        $this->page = str_replace("<descriptionPlaceholder />", $description, $this->page);
    }
    
    public function setNavBar(string $navbar){
        $this->page = str_replace("<navBarPlaceholder />", $navbar, $this->page);
    }

    public function setPercorso(string $percorso){
        $this->page = str_replace("<percorsoPlaceholder />", $percorso, $this->page);
    }

    public function setContent(string $content){
        $this->page = str_replace("<contentSegnaposto />", file_get_contents(__DIR__ . "/contents/" . $content), $this->page);
    }

    public function setFooter(){
        $this->page = str_replace("<footerSegnaposto />", file_get_contents(__DIR__ . "/contents/footer.php"), $this->page);
    }

    public function validate()
    {
        $this->replaceRoot();
        echo $this->page;
    }

    private function replaceRoot()
    {
        $this->page = str_replace("<rootFolder />", $this->root, $this->page);
    }
}


?>