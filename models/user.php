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
    public $idCountry = NULL;
    public $idRegion = NULL;
    public $passwordHash = '';
    public $password = '';
    public $avatar = '';
    public $checkPassword = '';
    public $log = 0;

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
        $query = 'INSERT INTO `' . self::PREFIX . 'user` (`firstname`, `lastname`, `birthdate`, `mail`, `username`, `idCountry`, `idRegion`, `password`, `avatar`) VALUES (:firstname, :lastname, :birthdate, :mail, :username, :country, :region, :password, :avatar)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $responseRequest->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        $responseRequest->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $responseRequest->bindValue(':country', $this->idCountry, PDO::PARAM_INT);
        $responseRequest->bindValue(':region', $this->idRegion, PDO::PARAM_INT);
        $responseRequest->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $responseRequest->bindValue(':password', $this->passwordHash, PDO::PARAM_STR);
        $responseRequest->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    public function updateUsers()
    {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `firstname` = :firstname,`lastname` = :lastname,`username` = :username,`idCountry` = :country, `idRegion` = :region, `avatar` = :avatar, `birthdate` = :birthdate, `mail` = :mail, `password` = :password WHERE `id` = :id';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $responseRequest->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        $responseRequest->bindValue(':country', $this->idCountry, PDO::PARAM_INT);
        $responseRequest->bindValue(':region', $this->idRegion, PDO::PARAM_INT);
        $responseRequest->bindValue(':avatar', $this->avatar, PDO::PARAM_STR);
        $responseRequest->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $responseRequest->bindValue(':password', $this->passwordHash, PDO::PARAM_STR);
        $responseRequest->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    /**
     * cette méthode permet de vérifier que le mail lors de l'inscription ou de la modification du profil n'existe pas dans la base
     */
    public function existMail()
    {
        $query = 'SELECT `mail` FROM `' . self::PREFIX . 'user` WHERE `mail` = :mail';
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

    /**
     * cette méthode permet de vérifier que le pseudo lors de l'inscription ou de la modification du profil n'existe pas dans la base
     */
    public function existUsername()
    {
        $query = 'SELECT `username` FROM `' . self::PREFIX . 'user` WHERE `username` = :username';
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

    /**
     * cette méthode permet de récupérer l'id d'un utilisateur grâce à son pseudo qui est unique dans la BDD
     */
    public function getUserIdByUsername()
    {
        $userId = 0;
        $query = 'SELECT `id` FROM `' . self::PREFIX . 'user` WHERE `username` = :username';
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

    /**
     * Cette méthode met à jour le statut de l'utilisateur lors de sa connexion ou déconnexion
     */
    public function updateLog()
    {
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `log`= :log WHERE `id` = :id';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_STR);
        $responseRequest->bindValue(':log', $this->log, PDO::PARAM_BOOL);
        return $responseRequest->execute();
    }

    /**
     * cette méthode permet de récupérer l'id et le mot de passe associé au pseudo lors de la connexion
     */
    public function getLoginByUsername()
    {
        $resultRequest = array();
        $query = 'SELECT `id`, `password` FROM `' . self::PREFIX . 'user` WHERE `username` = :username';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    /**
     * récupération de l'ensemble des informations de l'utilisateur à partir de son id
     */
    public function getProfileUserById()
    {
        $resultRequest = array();
        $query = 'SELECT `' . self::PREFIX . 'user`.`firstname`, `' . self::PREFIX . 'user`.`lastname`, `' . self::PREFIX . 'user`.`mail`, `' . self::PREFIX . 'user`.`id`, `' . self::PREFIX . 'user`.`avatar`, `' . self::PREFIX . 'user`.`password`, `' . self::PREFIX . 'user`.`username`, date_format(`' . self::PREFIX . 'user`.`birthdate`, \'%d/%m/%Y\') AS `birthdateFrench` , `' . self::PREFIX . 'country`.`country`, `' . self::PREFIX . 'user`.`idCountry`, `' . self::PREFIX . 'user`.`idRegion`, `' . self::PREFIX . 'region`.`region` FROM `' . self::PREFIX . 'user` INNER JOIN `' . self::PREFIX . 'country` ON `' . self::PREFIX . 'user`.`idCountry` = `' . self::PREFIX . 'country`.`id` LEFT JOIN `' . self::PREFIX . 'region` ON `' . self::PREFIX . 'user`.`idRegion` = `' . self::PREFIX . 'region`.`id` WHERE `' . self::PREFIX . 'user`.`id` = :id';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    /**
     * cette fonction liste les personnes correspondant au critère 
     * pays, région , pseudo.
     * Seul le pays est obligatoire
     */
    public function getListFriendByCountry()
    {
        $resultRequest = array();
        //cette requête permet de rechercher une personne en fonction de son pays et/ou de sa région(optionnel) et de tout ou une partie de son pseudo (optionnel)
        $query = 'SELECT `' . self::PREFIX . 'user`.`firstname`, `' . self::PREFIX . 'user`.`lastname`, `' . self::PREFIX . 'user`.`id`, `' . self::PREFIX . 'user`.`username`, `' . self::PREFIX . 'user`.`avatar`, `' . self::PREFIX . 'user`.`log`, `' . self::PREFIX . 'country`.`country`, `' . self::PREFIX . 'region`.`region` FROM `' . self::PREFIX . 'user` INNER JOIN `' . self::PREFIX . 'country` ON `' . self::PREFIX . 'user`.`idCountry` = `' . self::PREFIX . 'country`.`id` LEFT JOIN `' . self::PREFIX . 'region` ON `' . self::PREFIX . 'user`.`idRegion` = `' . self::PREFIX . 'region`.`id` WHERE (CASE WHEN :country = 10000 THEN `' . self::PREFIX . 'user`.`idCountry` IS NOT NULL WHEN :country < 10000 THEN `' . self::PREFIX . 'user`.`idCountry` = :country END) AND (CASE WHEN :region = 10000 THEN (`' . self::PREFIX . 'user`.`idRegion` IS NOT NULL OR `' . self::PREFIX . 'user`.`idRegion` IS NULL) WHEN :region = 9000 THEN `' . self::PREFIX . 'user`.`idRegion` IS NOT NULL WHEN :region < 9000 THEN `' . self::PREFIX . 'user`.`idRegion` = :region ELSE `' . self::PREFIX . 'user`.`idRegion` IS NULL END) AND `' . self::PREFIX . 'user`.`username` LIKE :username ORDER BY (CASE WHEN `pklds_user`.`idRegion` IS NOT NULL THEN `pklds_user`.`idRegion` ELSE`pklds_user`.`idCountry` END), `' . self::PREFIX . 'user`.`log` DESC';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':country', $this->idCountry, PDO::PARAM_INT);
        $responseRequest->bindValue(':region', $this->idRegion, PDO::PARAM_INT);
        $responseRequest->bindValue(':username', $this->username . '%', PDO::PARAM_STR);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    /**
     * Permet de récupérer la liste des personnes ayant envoyer une demande d'ami tout en vérifiant que l'utilisateur ne la pas deja bloqué
     */
    public function waitingAdd()
    {
        $resultRequest = array();
        $query = 'SELECT `' . self::PREFIX . 'user`.`username`, `' . self::PREFIX . 'user`.`id` FROM `' . self::PREFIX . 'user` INNER JOIN `' . self::PREFIX . 'relationship` ON `' . self::PREFIX . 'user`.id = `' . self::PREFIX . 'relationship`.`idTransmitter` WHERE `' . self::PREFIX . 'relationship`.`idReceiver` = :id AND `' . self::PREFIX . 'relationship`.`acceptRelation` = 0 AND `' . self::PREFIX . 'relationship`.`block` = 1';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    /**
     * Donne la liste d'amis de l'utilisateur
     */
    public function getListMyFriend()
    {
        $resultRequest = array();
        $query = 'SELECT `' . self::PREFIX . 'user`.`username`, `' . self::PREFIX . 'user`.`id`,  `' . self::PREFIX . 'user`.`avatar`,  `' . self::PREFIX . 'user`.`log`, `' . self::PREFIX . 'country`.`country`, `' . self::PREFIX . 'region`.`region` FROM `' . self::PREFIX . 'user` INNER JOIN `' . self::PREFIX . 'relationship` ON `' . self::PREFIX . 'user`.id = `' . self::PREFIX . 'relationship`.`idReceiver` INNER JOIN `' . self::PREFIX . 'country` ON `' . self::PREFIX . 'country`.`id` = `' . self::PREFIX . 'user`.`idCountry` LEFT JOIN `' . self::PREFIX . 'region` ON `' . self::PREFIX . 'region`.`id` = `' . self::PREFIX . 'user`.`idRegion` WHERE `' . self::PREFIX . 'relationship`.`idTransmitter` = :id AND `' . self::PREFIX . 'relationship`.`acceptRelation` = 1 AND `' . self::PREFIX . 'relationship`.`block` = 1';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    public function deleteUser()
    {
        $resultDeleteUser = false;
        try {
            //On démarre la transaction, toujours mettre la table enfant avant la table parente pour éviter les soucis de suppression.
            $this->db->beginTransaction();
            $queryDeleteMessage = 'DELETE FROM `' . self::PREFIX . 'message` USING `' . self::PREFIX . 'message` LEFT JOIN `' . self::PREFIX . 'relationship` ON (`' . self::PREFIX . 'message`.`idRelationship` = `' . self::PREFIX . 'relationship`.`id`) WHERE `' . self::PREFIX . 'relationship`.`idReceiver` = :id OR `' . self::PREFIX . 'relationship`.`idTransmitter` = :id';
            $responseRequestDeleteMessage = $this->db->prepare($queryDeleteMessage);
            $responseRequestDeleteMessage->bindValue(':id', $this->id, PDO::PARAM_INT);
            $responseRequestDeleteMessage->execute();
            $queryDeleteRelation = 'DELETE FROM `' . self::PREFIX . 'relationship` WHERE `' . self::PREFIX . 'relationship`.`idReceiver` = :id OR `' . self::PREFIX . 'relationship`.`idTransmitter` = :id';
            $responseRequestDeleterelation = $this->db->prepare($queryDeleteRelation);
            $responseRequestDeleterelation->bindValue(':id', $this->id, PDO::PARAM_INT);
            $responseRequestDeleterelation->execute();
            $queryDeleteUser = 'DELETE FROM `' . self::PREFIX . 'user` WHERE `' . self::PREFIX . 'user`.`id` = :id';
            $responseRequestDeleteUser = $this->db->prepare($queryDeleteUser);
            $responseRequestDeleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
            $responseRequestDeleteUser->execute();
            //On valide la transaction.
            $resultDeleteUser = true;
            $this->db->commit();
        } catch (Exception $ex) {
            //Si une erreur survient, on annule les changements.
            $this->db->rollBack();
        }
        return $resultDeleteUser;
    }

    public function __destruct()
    {
        
    }

}
