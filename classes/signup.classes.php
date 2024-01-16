<?php
class SignupUser extends Dbh {
    function checkUser($uid, $email) {
        $stmt = $this->connection->prepare('SELECT username from users WHERE username=? OR email=?;');
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        } 
        return $stmt->rowCount() == 0;
    }


   
}
?>