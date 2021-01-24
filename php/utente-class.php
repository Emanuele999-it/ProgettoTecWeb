<?php
require_once __DIR__ . "/db-handler.php";

    class Utente {

    private $userid;
    private $nome;
    private $cognome;
    private $email;
    private $img_path;
    private $passw;
    private $is_admin;


    public function __construct (string $email) 
    {
        $connection = new DBConnection();
        $result = $connection->query("SELECT  userid, nome, cognome, email, img_path, passw, is_admin 
                                          FROM utente WHERE email=\"{$email}\"");
        if (!$result) {
            throw new Exception("L'utente non esiste", 1);
            exit;
        }
        
        $user_row = $result->fetch_assoc();

        $this->userid   =   $user_row['userid'];                  
        $this->nome     =   $user_row['nome'];                  
        $this->cognome  =   $user_row['cognome'];
        $this->email    =   $user_row['email'];
        $this->img_path =   $user_row['img_path'];
        $this->passw    =   $user_row['passw'];
        $this->is_admin =   $user_row['is_admin'];

        $connection->disconnect();
    }

    public function update()
    {
        $connection = new DBConnection();
        $result = $connection->query("SELECT userid, nome, cognome, email, img_path, passw, is_admin 
                                          FROM utente WHERE  userid=\"{$this->userid}\"");
        if (!$result) {
            throw new Exception("L'utente non esiste", 1);
            exit;
        }

        $user_row = $result->fetch_assoc();

        $this->userid   =   $user_row['userid'];                  
        $this->nome     =   $user_row['nome'];                  
        $this->cognome  =   $user_row['cognome'];
        $this->email    =   $user_row['email'];
        $this->img_path =   $user_row['img_path'];
        $this->passw    =   $user_row['passw'];
        $this->is_admin =   $user_row['is_admin'];

        $connection->disconnect();

    }

    public function getUserid(){
        return $this->userid;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCognome(){
        return $this->cognome;
    }

    public function getAdmin(){
        return $this->is_admin;
    }

    public function getPassword(){
        return $this->passw;
    }

    public function getEmail(){
        return $this->email;
    }


}
