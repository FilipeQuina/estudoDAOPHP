<?php
class Usuario{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($id){
        $this->idusuario = $id;
    }
    public function getDeslogin(){
        return $this->deslogin;
    }
    public function setDeslogin($id){
        $this->deslogin = $id;
    }
    public function getDessenha(){
        return $this->dessenha;
    }
    public function setDessenha($id){
        $this->dessenha = $id;
    }
    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    public function setDtcadastro($id){
        $this->dtcadastro = $id;
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
            ":ID"=>$id
        ));
        if(count($results)>0){
            $row = $results[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%". $login ."%"
        ));
    }

    public function login($login, $password){
        $sql = new Sql();
        try{
            $results = $sql->select("SELECT * FROM tb_usuarios WHERE dessenha = :PASSWORD",array(
                //":LOGIN"=>$login
                ":PASSWORD"=>$password
            ));
            var_dump($results);
        }catch(Exception $e){
            echo "erro ".$e;
        }
        
        if(count($results)>0){
            $row = $results[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }
        else{
            throw new Exception("Login e/ou senha Inválidos.");
        }
    }
    public function __toString(){
        return json_encode(array(
            "idusurio"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

        ));
    }
}


?>