<?php
/**
* User registration Class for Hotel
*/

class User{
    /** @var object $pdo Copy of PDO connection */
    private $pdo;
    /** @var object of the logged in user */
    private $user;
    /** @var string error msg */
    private $msg;


    /**
    * Connection init function
    * @param string $conString DB connection string.
    * @param string $user DB user.
    * @param string $pass DB password.
    *
    * @return bool Returns connection success.
    */
    public function __construct ($conString, $user, $pass){

            try {
                $pdo = new PDO($conString, $user, $pass);
                $this->pdo = $pdo;
                return true;
            }catch(PDOException $e) {
                $this->msg = $e->getMessage();
                return false;
            }

    }


    /**
    * Get User Data fields
    * @return Return user data in array
    */
    public function UserData(){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare("SELECT * FROM users ");
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
             echo  "<tr>";
                echo  "<td>" .  $row['name'] .  "</td>";
                echo  "<td>" .  $row['lastname'] .  "</td>";
                echo  "<td>" .  $row['email'] .  "</td>";
                echo "</tr>";
            }
        }
    }

    /**
    * Register a new user account function
    * @param string user fields
    * @return boolean of success.
    */
    public function registration($name, $lastname, $gender, $dob, $address, $city, $state, $zip, $phone, $email){
        $pdo = $this->pdo;

        $stmt = $pdo->prepare('INSERT INTO users (name, lastname, gender, dob, address, city, state, zip, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        if($stmt->execute([$name, $lastname, $gender, $dob, $address, $city, $state, $zip, $phone, $email])){
            $this->msg = "User Added Correctly";

        }else{
            $this->msg = 'Creating new user failed.';

        }
    }



    /**
    * User information change function
    * @param int $id User id.
    * @param string $fname User first name.
    * @param string $lname User last name.
    * @return boolean of success.
    */
    public function userUpdate($id,$fname,$lname){
        $pdo = $this->pdo;
        if(isset($id) && isset($fname) && isset($lname)){
            $stmt = $pdo->prepare('UPDATE users SET fname = ?, lname = ? WHERE id = ?');
            if($stmt->execute([$id,$fname,$lname])){
                return true;
            }else{
                $this->msg = 'User information change failed.';
                return false;
            }
        }else{
            $this->msg = 'Provide a valid data.';
            return false;
        }
    }

    /**
    * Password hash function
    * @param string $password User password.
    * @return string $password Hashed password.
    */
    private function hashPass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
    * Print error msg function
    * @return void.
    */
    public function printMsg(){
        print $this->msg;
    }


}
