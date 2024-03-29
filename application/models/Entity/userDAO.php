<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

class UserDAO
{
	private $em;
	function __construct($em) {
       $this->em=$em;
   }

   //user register
	public function themUser($data)
	{
	    $user = new User;
		$user->setEmail($data['email']);
		$user->setPassword($data['password']);
		$user->setFirst_name($data['first_name']);
		$user->setLast_name($data['last_name']);
		$user->setBirthday($data['birthday']);
		$this->em->persist($user);
		$this->em->flush();
	}

	//change user information
	public function suaUser($email)
	{
	    $user = $this->em->getReference('Entity\User', $email);
		$this->em->merge($user);
		$this->em->flush();
	}

	//change user wall profile image
	public function suaProfileImage($data)
	{
	    $user = $this->em->getReference('Entity\User', $data['email']);
	    $user->setPicture($data['pic']);
		$this->em->merge($user);
		$this->em->flush();
	}

	//change user wall profile cover
	public function suaProfileCover($data)
	{
	    $user = $this->em->getReference('Entity\User', $data['email']);
	    $user->setCoverImg($data['pic']);
		$this->em->merge($user);
		$this->em->flush();
	}

	//get previous profile image
	public function getPreviousImage($email)
	{
	    $user = $this->em->getReference('Entity\User', $email);
	    return $user->getPicture();
	}

	//get previous profile cover
	public function getPreviousProfileCover($email)
	{
	    $user = $this->em->getReference('Entity\User', $email);
	    return $user->getCoverImg();
	}

	//delete user
	public function xoaUser($email)
	{
	    $user = $this->em->getReference('Entity\User', $email);
	    $this->em->remove($user);
	    $this->em->flush();
	}

	//find user by name
	public function timUser($name){
		$query = $this->em->createQuery("SELECT p.email,p.first_name,p.last_name,p.picture FROM Entity\User p WHERE p.first_name like ?1 or p.last_name like ?2 order by p.email");
		$str='%'.$name.'%';
		$query->setParameter(1, $str);
		$query->setParameter(2, $str);
		$query->setMaxResults(5);
		$results=$query->getResult();
		return $results;
	}

	//find friend of the user
	public function timUserFriend($name,$email,$fanclub){
		$cnn=$this->em->getConnection();
		$sth = $cnn->prepare("CALL timUserFriend(?,?,?)");
		$sth->bindValue(1, $name);
		$sth->bindValue(2, $email);
		$sth->bindValue(3, $fanclub);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	//get data of user login
	public function timUserLogin($data){
		$data['password']= Md5($data['password']);
		$query = $this->em->createQuery("SELECT p.email,p.first_name,p.last_name,p.birthday,p.picture FROM Entity\User p WHERE p.email=?1 and p.password= ?2");
		$query->setParameter(1, $data['email']);
		$query->setParameter(2, $data['password']);
		$result=$query->getResult();
		if(count($result)>0){
			$user = $this->em->getReference('Entity\User', $data['email']);
			$user->setOnline(1);
			$this->em->merge($user);
			$this->em->flush();
		}
		return $result;
	}

	//get user information by email
	public function getUser($email){
		$query = $this->em->createQuery("SELECT p.first_name,p.last_name,p.birthday,p.picture,p.coverImg FROM Entity\User p WHERE p.email=?1");
		$query->setParameter(1, $email);
		$result=$query->getResult();
		return $result;
	}

	//check if the user is logged in
	public function checkLogin( $email){
		$user = $this->em->getReference('Entity\User', $email);
		return $user->getOnline();
	}

	//update the last login of the user
	public function capNhatLastLogin($email){
		$cnn=$this->em->getConnection();
		$sth = $cnn->prepare("UPDATE user p SET p.last_login=now() WHERE p.email=?");
		$sth->bindValue(1, $email);
		$sth->execute();

		$user = $this->em->getReference('Entity\User', $email);
		$user->setOnline(0);
		$this->em->merge($user);
		$this->em->flush();
	}

	//change password of current user
	public function suaPassword($email,$pass)
	{
	    $user = $this->em->getReference('Entity\User', $email);
	    $user->setPassword($pass);
		$this->em->merge($user);
		$this->em->flush();
	}
}
?>