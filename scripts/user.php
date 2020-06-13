<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;
    private $privilegio;
    private $localidad;
    private $noEmpleado;


    public function userExists($user, $pass){

        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE noEmpleado = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE noEmpleado = :user');
        $queryResult= $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->privilegio = $currentUser['privilegio'];
            $this->localidad = $currentUser['localidad'];
            $this->noEmpleado = $currentUser['noEmpleado'];
            $this->email = $currentUser['email'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrivilegio(){
        return $this->privilegio;
    }

    public function getLocalidad(){
        return $this->localidad;
    }


}

?>
