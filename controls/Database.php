<?php
    class Database{
        // public $host = DB_HOST;
        // public $user = DB_USER;
        // public $pass = DB_PASS;
        // public $dbname = DB_NAME;

        // public $link;
        // public $error;

        // public function __construct()
        // {
        //     $this->connectDB();
        // }

        // private function connectDB()
        // {
        //     $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        //     if(!$this->link)
        //     {
        //         $this->error = "Connection fail".$this->link->connect_error;
        //         return false;
        //     }
        // }

        // public function insert($sql)
        // {
        //     $insert_row = $this->link->query($sql) or die ($this->link->error.__LINE__);
        //     if($insert_row)
        //     {
        //         header("Location: register.php?msg=".urlencode('Registered!'));
        //         exit();
        //     }
        //     else{
        //         die("Error:(".$this->link->errno.")".$this->link->error);
        //     }
        // }
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $dbname = 'hms';
        private $connection;
        public $errors = array();
        public $success = array();
        public function __construct()
        {
            $this->connection = new mysqli($this->host,$this->user,$this->password,$this->dbname);
            if($this->connection->connect_error)
            {
                echo "Connection failed";
            }
            else{
                return $this->connection;
            }
        }
        
        /////Insert function//////
        public function insertRecord($data)
        {
            $uName = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['passwordConf'];

            if(empty($uName)||empty($email)||empty($password)||empty($cpassword))
            {
                array_push($this->errors," Fields must not be empty");
            }
            else
            {
                if(!preg_match("/^[a-zA-Z ]*$/",$uName)){
                    array_push($this->errors," Username: Only letter allowed");
                }
                else if((strlen($uName)<4)){
                    array_push($this->errors," Username: Name is too short");
                }
    
                if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$email)) {
                    array_push($this->errors," Email: Invalid email format");
                }
    
                if(strlen($password)<6){
                    array_push($this->errors," Password: Password is too short");
                }
                else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
                    array_push($this->errors," Password: the password does not meet the requirements");
                }
            
                else if(!($cpassword==$password))
                {
                    array_push($this->errors," Password: Password didn't match");
                }

            }

            if(count($this->errors)==0)
            {
                //$password = md5($password);//encript password
                $sql = "INSERT INTO patients(username,email,password) VALUES('$uName','$email','$password')";
                $create = $this->connection->query($sql);
                
                session_start();
                //array_push($this->success,"Registration Seccessful!");
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("Location: login.php");
            }
        }

        /////////////////Login function///////
        public function loginRecord($data)
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($email)||empty($password))
            {
                array_push($this->errors," Fields must not be empty");
            }

            if(count($this->errors)==0)
            {
                $sql = "SELECT * FROM users WHERE email='$email' ";
                $logged = $this->connection->query($sql);
                $email_count = $logged->num_rows;
                if($email_count)
                {   
                    $email_pass = $logged->fetch_assoc();
                    $db_pass = $email_pass['password'];
                    $_SESSION['username'] = $email_pass['username'];
                    $user_type = $email_pass['user_type'];
                    if($db_pass==$password)
                    {
                        
                        // $_SESSION['email'] = $email;
                        // if(!empty($_SESSION['email']))
                        // {
                            
                        //     header("Location: patient/dashboard.php");
                        // }
                        if($user_type == 'admin')
                        {
                                
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                header("Location: admin/dashboard.php");
                            }
                        }
                        elseif($user_type == 'doctor')
                        {
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                header("Location: doctor/dashboard.php");
                            }
                        }
                        elseif($user_type == 'pharmacist')
                        {
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                header("Location: pharmacist/dashboard.php");
                            }
                        }
                        else{
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                header("Location: patient/dashboard.php");
                            }
                        }

                        
                    }
                    else{
                        array_push($this->errors,"Incorrect Password");
                       // echo "Incorrect";
                    }
                    
                }
                else{
                    array_push($this->errors,"Email not found");
                    //echo "email not found";
                }
                
            }

        }

        // public function logoutRecord()
        // {
        //     session_start();
        //     session_unset();
        //     header("Location:login.php");
        // }
        
        ////////Display data//////
        public function displayRecord($table)
        {
            $sql = "SELECT * FROM $table";
            $result = $this->connection->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                   $data[] = $row;  
                }
                return $data;
            }
        }

    }
?>