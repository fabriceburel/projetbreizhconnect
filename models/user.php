<?php

/**
 * Description of user
 *
 * @author fabrice
 */
class users extends dataBase {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $username = '';
    public $birthdate = '';
    public $birthdateFrench = '';
    public $mail = '';
    public $country = NULL;
    public $region = NULL;
    public $passwordHash = '';
    public $password = '';
    public $avatar = '';
    public $checkPassword = '';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * création de la méthode addUser qui permet insérer un utilisateur dans la base de donnée à l'aide d'une requête préparé
     */
    public function addUsers()
    {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `user`(`firstname`, `lastname`, `birthdate`, `mail`, `username`, `country`, `region`, `password`, `avatar`) VALUES (:firstname, :lastname, :birthdate, :mail, :username, :country, :region, :password, :avatar)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $responseRequest->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        $responseRequest->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $responseRequest->bindValue(':country', $this->country, PDO::PARAM_INT);
        $responseRequest->bindValue(':region', $this->region, PDO::PARAM_INT);
        $responseRequest->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $responseRequest->bindValue(':password', $this->passwordHash, PDO::PARAM_STR);
        $responseRequest->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    //cette méthode permet de vérifier que le mail lors de l'inscription ou de la modification du profil n'existe pas dans la base
    public function existMail()
    {
        $query = 'SELECT `mail` FROM `user` WHERE `mail` = :mail';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $mailExist = false;
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
            if (!is_object($resultRequest))
            {
                $mailExist = true;
            }
        }
        return $mailExist;
    }

    //cette méthode permet de vérifier que le pseudo lors de l'inscription ou de la modification du profil n'existe pas dans la base
    public function existUsername()
    {
        $query = 'SELECT `username` FROM `user` WHERE `username` = :username';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        $UsernameExist = false;
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
            if (!is_object($resultRequest))
            {
                $UsernameExist = true;
            }
        }
        return $UsernameExist;
    }

    //cette méthode permet de récupérer l'id d'un utilisateur grâce à son pseudo qui est unique dans la BDD
    public function getUserIdByUsername()
    {
        $userId = 0;
        $query = 'SELECT `id` FROM `user` WHERE `username` = :username';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
            if (is_object($resultRequest))
            {
                $userId = $resultRequest->id;
            }
        }
        return $userId;
    }

    //cette méthode permet de récupérer l'id et le mot de passe associé au pseudo lors de la connexion
    public function getLoginByUsername()
    {
        $resultRequest = true;
        $query = 'SELECT `id`, `password`  FROM `user` WHERE `username` = :username';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    //récupération de l'ensemble des informations de l'utilisateur à partir de son id
    public function getProfileUserById()
    {
        $resultRequest = true;
        $query = 'SELECT `user`.`firstname`, `user`.`lastname`,`user`.`id`, `user`.`avatar`, `user`.`username`, date_format(`user`.`birthdate`, \'%d/%m/%Y\') AS `birthdate` ,`country`.`country`, `region`.`region` AS `region` FROM `user` INNER JOIN `country` ON `user`.`country` = `country`.`id` LEFT JOIN `region` ON `user`.`region` = `region`.`id` WHERE `user`.`id` = :id';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    public function getListFriendByCountry()
    {
        $resultRequest = true;
        if ($this->region == NULL)
        {
            $query = 'SELECT `user`.`firstname`, `user`.`lastname`,`user`.`id`, `user`.`username` FROM `user` INNER JOIN `country` ON `user`.`country` = `country`.`id` LEFT JOIN `region` ON `user`.`region` = `region`.`id` WHERE `user`.`country` = \':country\' AND `user`.`username` LIKE \':username%\'';
        }
        else
        {
            $query = 'SELECT `user`.`firstname`, `user`.`lastname`,`user`.`id`, `user`.`username` FROM `user` INNER JOIN `country` ON `user`.`country` = `country`.`id` LEFT JOIN `region` ON `user`.`region` = `region`.`id` WHERE `user`.`country` = :country AND `user`.`region` = :region AND `user`.`username` LIKE \':username%\'';
        }
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':country', $this->country, PDO::PARAM_STR);
        $responseRequest->bindValue(':region', $this->region, PDO::PARAM_STR);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    public function __destruct()
    {
        
    }

}
