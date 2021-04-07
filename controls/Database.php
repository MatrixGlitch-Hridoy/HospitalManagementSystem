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
        public function insertRecord($data,$table)
        {
            $uName = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['passwordConf'];
            // $address = $_POST['address'];
            // $phone = $_POST['phone'];
            // $gender = $_POST['gender'];

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
                $sql = "INSERT INTO $table(username,email,password,address,phone,gender) VALUES('$uName','$email','$password','$address','$phone','$gender')";
                $create = $this->connection->query($sql);
                if($create)
                {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                return true;
                }
                else{
                    return false;
                }
                // echo "<script>alert('Registration succesful');</script>";
                // echo "<script>window.location.href = 'login.php';</script>";
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
                                
                                //header("Location: admin/dashboard.php");
                                echo "<script>alert('Login succesful');</script>";
                                echo "<script>window.location.href = 'admin/dashboard.php';</script>";
                            }
                        }
                        elseif($user_type == 'doctor')
                        {
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                // header("Location: doctor/dashboard.php");
                                echo "<script>alert('Login succesful');</script>";
                                echo "<script>window.location.href = 'doctor/dashboard.php';</script>";
                            }
                        }
                        elseif($user_type == 'pharmacist')
                        {
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                // header("Location: pharmacist/dashboard.php");
                                echo "<script>alert('Login succesful');</script>";
                                echo "<script>window.location.href = 'pharmacist/dashboard.php';</script>";
                            }
                        }
                        else{
                            $_SESSION['email'] = $email;
                            if(!empty($_SESSION['email']))
                            {
                                
                                // header("Location: patient/dashboard.php");
                                echo "<script>alert('Login succesful');</script>";
                                echo "<script>window.location.href = 'patient/dashboard.php';</script>";
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

        public function displayRecordById($editid,$table)
        {
            $sql = "SELECT * FROM $table WHERE id ='$editid'";
            $result = $this->connection->query($sql);
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                return $row;
            }
            // if($result = $this->connection->query($sql))
            // {
            //     while($row = $result->fetch_assoc())
            //     {
            //         $data = $row;
            //     }
            // }
            // return $data;
        }

        /////////Update Record/////
        public function updateRecord($data,$table)
        {
            $uName = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $editid = $_POST['hid'];

            if(empty($uName)||empty($email)||empty($password))
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

            }

           // var_dump($data);

            if(count($this->errors)==0)
            {
                //$password = md5($password);//encript password
                $sql = "UPDATE $table SET username='$uName',email='$email',password='$password',address='$address',phone='$phone',gender='$gender' WHERE id='$editid'";
                $result = $this->connection->query($sql);
                if($result)
                {
                    echo "<script>alert('updated succesful');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }
                else{
                    echo "not working";
                }
            }
        }

        public function delete($deleteid,$table)
        {
            $sql = "DELETE FROM $table WHERE id = '$deleteid'";
            $result = $this->connection->query($sql);
            if($result)
            {
                return true;
            }
            else{
                return false;
            }
        }

    }
?>