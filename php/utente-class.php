<?php
require_once __DIR__ . "/db-handler.php";

    class Utente {

    private $user_id;
    private $nome;
    private $cognome;
    private $email;
    private $img_path;
    private $passw;
    private $is_admin;


    public function __construct (string $nome) //ATTENZIONE CI VA NICKNAME MA PRIMA MODIFICO IL DB E POI CORREGGO
    {
        $connection = new DBConnection();

        $result = $connection->query("SELECT user_id, nome, cognome, email, img_path, passw, is_admin   FROM utente where nome=\"{$nome}\"");

        if (!result) {
            throw new Exception ("User doesn't exixst", 1);
            exit;
        }


        $user_row = $result->fetch_assoc();

        $this->user_id  =   $user_row['user_id'];
        $this->nome     =   $nome;                  // CORREGGO ANCHE DOPO QUA
        $this->cognome  =   $user_row;
        $this->email    =   $user_row;
        $this->img_path =   $user_row;
        $this->passw    =   $user_row;
        $this->is_admin =   $user_row;



        $connection->disconnect();



    }

    // FARE FUNZIONI GET E UPDATE


}

?>