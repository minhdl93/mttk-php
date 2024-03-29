 <?php
class MessageController extends CI_Controller {

    //check if user have logged in
    function __construct() {
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('/userController/index', 'refresh');
        }
    }
    
    //add new  chat message
    public function addMessage() {
        $data['to']      = $this->input->post('email');
        $data['from']    = $this->session->userdata('email');
        $data['message'] = $this->input->post('message');
        $img             = uploads_url() . 'img/' . $this->session->userdata('pic');
        $name            = $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name');
        $em              = $this->doctrine->em;
        $message         = new Entity\MessageDAO($em);
        $message_id      = $message->addMessage($data);
        //ajax add chat message
        echo '<li class="chatRight" id="' . $message_id . '"><p>' . $data['message'] . "</p></li>";
    }
    
    //get first 10 messages
    public function getFirstMessages() {
        $em           = $this->doctrine->em;
        $data['to']   = $this->input->post('email');
        $data['from'] = $this->session->userdata('email');
        $message      = new Entity\MessageDAO($em);
        $result       = $message->getFirstMessages($data);
        echo json_encode($result);
    }
    
    //get next 10 messages
    public function getMoreMessages() {
        $em              = $this->doctrine->em;
        $data['to']      = $this->input->post('email');
        $data['from']    = $this->session->userdata('email');
        $data['started'] = $this->input->post('started');
        $message         = new Entity\MessageDAO($em);
        $result          = $message->getMoreMessages($data);
        echo json_encode($result);
    }

    //get new message  number
    function getNewMessageNumber() {
        $em     = $this->doctrine->em;
        $noti   = new Entity\MessageDAO($em);
        $result = $noti->getNewMessageNumber($this->session->userdata('email'));
        echo count($result);
    }
}

?>