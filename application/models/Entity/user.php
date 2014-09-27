<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
     /**
     * @Id
     * @Column(type="string", nullable=false)
     */
    protected $user_name;

    /**
     * @Column(type="string")
     */
    protected $password;

    /**
     * @Column(type="string")
     */
    protected $first_name;

    /**
     * @Column(type="string")
     */
    protected $last_name;
    
    /**
     * @Column(type="string")
     */
    protected $email;
    
    /**
     * @Column(type="string")
     */
    protected $picture;
    
    /**
     * @Column(type="integer")
     */
    protected $online;
    
    /**
     * @Column(type="datetime")
     */
    protected $created_at;
    
    /**
     * @Column(type="string")
     */
    protected $birthday;

    public function getUser_name()
    {
        return $this->user_name;
    }
    
    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getFirst_name()
    {
        return $this->first_name;
    }
    
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }
    public function getLast_name()
    {
        return $this->last_name;
    }
    
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function getPicture()
    {
        return $this->picture;
    }
    
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }
    public function getOnline()
    {
        return $this->online;
    }
    
    public function setOnline($online)
    {
        $this->online = $online;
        return $this;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }
    
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
    public function getBirthday()
    {
        return $this->birthday;
    }
    
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }
}
?>