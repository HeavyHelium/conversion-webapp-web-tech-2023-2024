<?php
class SignupContr {
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    
    public function __construct($uid, $pwd, 
                                $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }


    private function emptyInput() {  
        if(empty($this->uid) || empty($this->pwd) || 
           empty($this->pwdRepeat) || empty($this->email)) {
            return true;
        }
        return false;
    }

    private function validUid() {
        if(!preg_match("/^[a-zA-Z0-9]", $this->uid)) {
            return false;
        }
        return true;
    }

    private function validEmail() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function pwdMatch() {
        return $this->pwd == $this->pwdRepeat;
    }
}
?>