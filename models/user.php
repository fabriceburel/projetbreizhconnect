<?php

/**
 * Gestion des utilisateurs avec héritage de la class dataBase
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

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * création de la méthode addUser qui permet insérer un utilisateur dans la base de donnée à l'aide d'une requête préparé
     */
    public function addUsers()
    {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont récupérés via les marqueurs nominatifs
        $query = 'INSERT INTO ' . USER . ' (`firstname`, `lastname`, `birthdate`, `mail`, `username`, `idCountry`, `idRegion`, `password`, `avatar`) VALUES (:firstname, :lastname, :birthdate, :mail, :username, :country, :region, :password, :avatar)';
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
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont récupérés via les marqueurs nominatifs
        $query = 'UPDATE ' . USER . ' SET `firstname` = :firstname,`lastname` = :lastname,`username` = :username,`idCountry` = :country, `idRegion` = :region, `avatar` = :avatar, `birthdate` = :birthdate, `mail` = :mail, `password` = :password WHERE `id` = :id';
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
        $query = 'SELECT `mail` FROM ' . USER . ' WHERE `mail` = :mail';
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
        $query = 'SELECT `username` FROM ' . USER . ' WHERE `username` = :username';
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
        $query = 'SELECT `id` FROM ' . USER . ' WHERE `username` = :username';
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
     * cette méthode permet de récupérer l'id et le mot de passe associé au pseudo lors de la connexion
     */
    public function getLoginByUsername()
    {
        $resultRequest = array();
        $query = 'SELECT `id`, `password` FROM ' . USER . ' WHERE `username` = :username';
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
        $query = 'SELECT CONCAT(UPPER(LEFT(`firstname` ,1)),LOWER(RIGHT(`firstname`, LENGTH(`firstname`)-1)))  as `firstname`,  UPPER(' . USER . '.`lastname`) as `lastname`, ' . USER . '.`mail`, ' . USER . '.`id`, ' . USER . '.`avatar`, FLOOR( DATEDIFF( NOW(), `birthdate`)/365) AS `age`, ' . USER . '.`password`, ' . USER . '.`username`, date_format(' . USER . '.`birthdate`, \'%d/%m/%Y\') AS `birthdateFrench` , ' . COUNTRY . '.`country`, ' . USER . '.`idCountry`, ' . USER . '.`idRegion`, ' . REGION . '.`region` FROM ' . USER . ' INNER JOIN ' . COUNTRY . ' ON ' . USER . '.`idCountry` = ' . COUNTRY . '.`id` LEFT JOIN ' . REGION . ' ON ' . USER . '.`idRegion` = ' . REGION . '.`id` WHERE ' . USER . '.`id` = :id';
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
     */
    public function getListFriendByCountry()
    {
        $resultRequest = array();
        //cette requête permet de rechercher une personne en fonction de son pays et/ou de sa région(optionnel) et de tout ou une partie de son pseudo (optionnel)
        $query = 'SELECT CONCAT(UPPER(LEFT(`firstname` ,1)),LOWER(RIGHT(`firstname`, LENGTH(`firstname`)-1))) as `firstname`,  UPPER(' . USER . ' .`lastname`) as `lastname`, ' . USER . '.`id`, ' . USER . '.`username`, ' . USER . '.`avatar`, FLOOR( DATEDIFF( NOW(), `birthdate`)/365) AS `age`, (CASE WHEN TIMESTAMPDIFF(MINUTE,' . LOG . '.`lastAction`, now())<20 AND ' . LOG . '.`connect` = 1 THEN 1 ELSE 0 END) AS `log`, ' . COUNTRY . '.`country`, ' . REGION . '.`region` FROM ' . USER . ' INNER JOIN ' . COUNTRY . ' ON ' . USER . '.`idCountry` = ' . COUNTRY . '.`id` LEFT JOIN ' . REGION . ' ON ' . USER . '.`idRegion` = ' . REGION . '.`id` INNER JOIN ' . LOG . ' ON ' . USER . '.`id` = ' . LOG . '.`idUSer` WHERE (CASE WHEN :country = 10000 THEN ' . USER . '.`idCountry` IS NOT NULL WHEN :country < 10000 THEN ' . USER . '.`idCountry` = :country END) AND (CASE WHEN :region = 10000 THEN (' . USER . '.`idRegion` IS NOT NULL OR ' . USER . '.`idRegion` IS NULL) WHEN :region = 9000 THEN ' . USER . '.`idRegion` IS NOT NULL WHEN :region < 9000 THEN ' . USER . '.`idRegion` = :region ELSE ' . USER . '.`idRegion` IS NULL END) AND ' . USER . '.`username` LIKE :username ORDER BY (CASE WHEN ' . USER . '.`idRegion` IS NOT NULL THEN ' . USER . '.`idRegion` ELSE' . USER . '.`idCountry` END), ' . LOG . '.`lastAction` DESC';
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
        $query = 'SELECT ' . USER . '.`username`, ' . USER . '.`id` FROM ' . USER . ' INNER JOIN ' . RELATIONSHIP . ' ON ' . USER . '.id = ' . RELATIONSHIP . '.`idTransmitter` WHERE ' . RELATIONSHIP . '.`idReceiver` = :id AND ' . RELATIONSHIP . '.`acceptRelation` = 0 AND ' . RELATIONSHIP . '.`block` = 1';
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
        $query = 'SELECT ' . USER . '.`username`, ' . USER . '.`id`,  ' . USER . '.`avatar`,  (CASE WHEN TIMESTAMPDIFF(MINUTE,' . LOG . '.`lastAction`, now())<20 AND ' . LOG . '.`connect` = 1 THEN 1 ELSE 0 END) AS `log`, ' . COUNTRY . '.`country`, ' . REGION . '.`region` FROM ' . USER . ' INNER JOIN ' . RELATIONSHIP . ' ON ' . USER . '.id = ' . RELATIONSHIP . '.`idReceiver` INNER JOIN ' . COUNTRY . ' ON ' . COUNTRY . '.`id` = ' . USER . '.`idCountry` LEFT JOIN ' . REGION . ' ON ' . REGION . '.`id` = ' . USER . '.`idRegion` INNER JOIN ' . LOG . ' ON ' . USER . '.`id` = ' . LOG . '.`idUSer` WHERE ' . RELATIONSHIP . '.`idTransmitter` = :id AND ' . RELATIONSHIP . '.`acceptRelation` = 1 AND ' . RELATIONSHIP . '.`block` = 1 ORDER BY (CASE WHEN ' . USER . '.`idRegion` IS NOT NULL THEN ' . USER . '.`idRegion` ELSE' . USER . '.`idCountry` END), ' . LOG . '.`lastAction` DESC';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }

    /**
     * Permet la suppression d'un utilisateur, de sa liste d'ami et de ses messages par l'intermédiaire d'un transaction
     */
    public function deleteUser()
    {
        $resultDeleteUser = false;
        try {
            //On démarre la transaction, toujours mettre la table enfant avant la table parente pour éviter les soucis de suppression.
            $this->db->beginTransaction();
            $queryDeleteMessage = 'DELETE FROM ' . MESSAGE . ' USING ' . MESSAGE . ' LEFT JOIN ' . RELATIONSHIP . ' ON (' . MESSAGE . '.`idRelationship` = ' . RELATIONSHIP . '.`id`) WHERE ' . RELATIONSHIP . '.`idReceiver` = :id OR ' . RELATIONSHIP . '.`idTransmitter` = :id';
            $responseRequestDeleteMessage = $this->db->prepare($queryDeleteMessage);
            $responseRequestDeleteMessage->bindValue(':id', $this->id, PDO::PARAM_INT);
            $responseRequestDeleteMessage->execute();
            $queryDeleteRelation = 'DELETE FROM ' . RELATIONSHIP . ' WHERE ' . RELATIONSHIP . '.`idReceiver` = :id OR ' . RELATIONSHIP . '.`idTransmitter` = :id';
            $responseRequestDeleterelation = $this->db->prepare($queryDeleteRelation);
            $responseRequestDeleterelation->bindValue(':id', $this->id, PDO::PARAM_INT);
            $responseRequestDeleterelation->execute();
            $queryDeleteUser = 'DELETE FROM ' . USER . ' WHERE ' . USER . '.`id` = :id';
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
