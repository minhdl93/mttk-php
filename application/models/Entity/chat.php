<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="chat")
 */
class Chat
{
     /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue
     */
    protected $chat_id;

    /**
     * @ManyToOne(targetEntity="user")
     **/
    protected $user_name;

    /**
     * @ManyToOne(targetEntity="user")
     **/
    protected $to;

    /**
     * @Column(type="string")
     */
    protected $msg;

    /**
     * @Column(type="datetime")
     */
    protected $created_at;

    public function getChat_id()
    {
        return $this->chat_id;
    }
    
    public function setChat_id($chat_id)
    {
        $this->chat_id = $chat_id;
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
    public function getTo()
    {
        return $this->to;
    }
    
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    public function getMsg()
    {
        return $this->msg;
    }
    
    public function setMsg($msg)
    {
        $this->msg = $msg;
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
	
}
?>