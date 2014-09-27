<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="nickname")
 */
class Nickname
{
     /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue
     */
    protected $nickname_id;

    /**
     * @Column(type="string")
     */
    protected $nickname;

    /**
     * @ManyToOne(targetEntity="privacy_type")
     **/
    protected $privacy_type_id;

    /**
     * @ManyToOne(targetEntity="user")
     **/
    protected $user_name;

    public function getNickname_id()
    {
        return $this->nickname_id;
    }
    
    public function setNickname_id($nickname_id)
    {
        $this->nickname_id = $nickname_id;
        return $this;
    }
	public function getNickname()
	{
	    return $this->nickname;
	}
	
	public function setNickname($nickname)
	{
	    $this->nickname = $nickname;
	    return $this;
	}
	public function getPrivacy_type_id()
	{
	    return $this->privacy_type_id;
	}
	
	public function setPrivacy_type_id($privacy_type_id)
	{
	    $this->privacy_type_id = $privacy_type_id;
	    return $this;
	}
	public function getUser_name()
	{
	    return $this->user_name;
	}
	
	public function setUser_name($user_name)
	{
	    $this->user_name = $user_name;
	    return $this;
	}
}
?>