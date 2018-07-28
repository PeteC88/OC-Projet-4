<?php

Class UserModel extends DbConnect
{
	public function getUser($email, $password)
	{
		$requser = $this->db->prepare("SELECT * FROM connexion WHERE email = ? AND password = ? ");
        $requser->execute(array($email, $password));
        $userexist = $requser->fetch();

        return $userexist;
	}
}