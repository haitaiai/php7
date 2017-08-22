<?php

class User {
    private $idUsuario;
    private $desEmail;
    private $desLogin;
    private $desSenha;
    private $dtCadastro;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getDesEmail()
    {
        return $this->desEmail;
    }

    /**
     * @param mixed $desEmail
     */
    public function setDesEmail($desEmail)
    {
        $this->desEmail = $desEmail;
    }

    /**
     * @return mixed
     */
    public function getDesLogin()
    {
        return $this->desLogin;
    }

    /**
     * @param mixed $desLogin
     */
    public function setDesLogin($desLogin)
    {
        $this->desLogin = $desLogin;
    }

    /**
     * @return mixed
     */
    public function getDesSenha()
    {
        return $this->desSenha;
    }

    /**
     * @param mixed $desSenha
     */
    public function setDesSenha($desSenha)
    {
        $this->desSenha = $desSenha;
    }

    /**
     * @return mixed
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * @param mixed $dtCadastro
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }

    public function loadById($id) {
        $sql = new sql();

        $results = $sql->select("select * from tb_usuarios where idusuario = :ID", array(
            ":ID" => $id
        ));

        if (count($results) > 0) {
            $this->getData($results[0]);
        }
    }

        public static function getList() {
            $sql = new Sql();
            return $sql->select("select * from tb_usuarios order by deslogin;");
        }

        public static function search($login) {
            $sql = new Sql();

            return $sql->select("select * from tb_usuarios where deslogin like :SEARCH", array(
                ":SEARCH"=>"%".$login."%"
            ));
        }

        public function login($login, $password) {
            $sql = new sql();

            $results = $sql->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :PASSWORD", array(
                ":LOGIN" => $login,
                ":PASSWORD"=> $password
            ));

            if (count($results) > 0) {
                $this->getData($results[0]);
            } else {
                echo "User or Password incorrect";
            }
        }

        public function getData($data) {
            $this->setIdUsuario($data['idusuario']);
            $this->setDesEmail($data['desemail']);
            $this->setDesLogin($data['deslogin']);
            $this->setDesSenha($data['dessenha']);
            $this->setDtCadastro(new DateTime($data['dtcadastro']));
        }

    public function __toString() {
        return json_encode(array(
            "idusuario"=>$this->getIdUsuario(),
            "desemail"=>$this->getDesEmail(),
            "deslogin"=>$this->getDesLogin(),
            "dessenha"=>$this->getDesSenha()
        ));
    }

}
?>