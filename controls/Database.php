<?php
    class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $dbname = 'hms';
        public $connection;
        public $errors = array();
        //public $success = array();
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
            if($table=="doctors"){
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $specialization = $_POST['DoctorSpecialization'];
            $fees = $_POST['fees'];
            }

            
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

                if($table=="doctors")
                {
                    if(empty($fees))
                    {
                        array_push($this->errors,"Fees must not be empty");
                    }
                    if($specialization=="NULL")
                    {
                        array_push($this->errors,"Specialization must not be empty");
                    }
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
                $sql = "SELECT * FROM $table WHERE email='$email' ";
                $logged = $this->connection->query($sql);
                $email_count = $logged->num_rows;
                if($email_count>0)
                {
                    array_push($this->errors,"Email already exits");
                }
                else{
                    //$password = md5($password);//encript password
                    if($table=="doctors")
                    {
                        $sql = "INSERT INTO $table(username,email,password,phone,gender,specialization,fees) VALUES('$uName','$email','$password','$phone','$gender','$specialization','$fees')";
                    }
                    else{
                        $sql = "INSERT INTO $table(username,email,password) VALUES('$uName','$email','$password')";
                    }

                    $create = $this->connection->query($sql);
                    if($create)
                    {
                        //session_start();
                        //$_SESSION['email'] = $email;
                        //$_SESSION['password'] = $password;
                    return true;
                    }
                    else{
                        return false;
                    }
                }
                
                // echo "<script>alert('Registration succesful');</script>";
                // echo "<script>window.location.href = 'login.php';</script>";
            }
        }

        /////////////////Login function///////
        public function loginRecord($data,$table)
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($email)||empty($password))
            {
                array_push($this->errors," Fields must not be empty");
            }

            if(count($this->errors)==0)
            {
                $sql = "SELECT * FROM $table WHERE email='$email' ";
                $logged = $this->connection->query($sql);
                $email_count = $logged->num_rows;
                if($email_count)
                {   
                    $email_pass = $logged->fetch_assoc();
                    $db_pass = $email_pass['password'];
                    $_SESSION['username'] = $email_pass['username'];
                    $_SESSION['id'] = $email_pass['id']; //for appointment purpose
                    //$user_type = $email_pass['user_type'];
                    if($db_pass==$password)
                    {
                        
                        // $_SESSION['email'] = $email;
                        // if(!empty($_SESSION['email']))
                        // {
                            
                        //     header("Location: patient/dashboard.php");
                        // }


                        // if($user_type == 'admin')
                        // {
                                
                        //     $_SESSION['email'] = $email;
                        //     if(!empty($_SESSION['email']))
                        //     {
                                
                        //         //header("Location: admin/dashboard.php");
                        //         echo "<script>alert('Login succesful');</script>";
                        //         echo "<script>window.location.href = 'admin/dashboard.php';</script>";
                        //     }
                        // }
                        // elseif($user_type == 'doctor')
                        // {
                        //     $_SESSION['email'] = $email;
                        //     if(!empty($_SESSION['email']))
                        //     {
                                
                        //         // header("Location: doctor/dashboard.php");
                        //         echo "<script>alert('Login succesful');</script>";
                        //         echo "<script>window.location.href = 'doctor/dashboard.php';</script>";
                        //     }
                        // }
                        // elseif($user_type == 'pharmacist')
                        // {
                        //     $_SESSION['email'] = $email;
                        //     if(!empty($_SESSION['email']))
                        //     {
                                
                        //         // header("Location: pharmacist/dashboard.php");
                        //         echo "<script>alert('Login succesful');</script>";
                        //         echo "<script>window.location.href = 'pharmacist/dashboard.php';</script>";
                        //     }
                        // }
                        // else{
                        //     $_SESSION['email'] = $email;
                        //     if(!empty($_SESSION['email']))
                        //     {
                                
                        //         // header("Location: patient/dashboard.php");
                        //         echo "<script>alert('Login succesful');</script>";
                        //         echo "<script>window.location.href = 'patient/dashboard.php';</script>";
                        //     }
                        // }

                    return true;
                        
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
        // public function searchRecord($table)
        // {
        //     $search = isset($_POST['query']);
        //     $sql = "SELECT * FROM $table WHERE username LIKE '%{$search}%'";
        //     $result = $this->connection->query($sql);
        //     if($result->num_rows>0)
        //     {
        //         while($row = $result->fetch_assoc())
        //         {
        //            $data[] = $row;  
        //         }
        //         return $data;
        //     }
        // }

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
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $editid = $_POST['hid'];
            if($table=="patients" || $table=="pharmacists"){  $address = $_POST['address']; }
            else { $specialization = $_POST['DoctorSpecialization'];}

            if(empty($uName)||empty($password))
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
                if($table=="patients" || $table=="pharmacists")
                {
                    $sql = "UPDATE $table SET username='$uName',password='$password',address='$address',phone='$phone',gender='$gender' WHERE id='$editid'";
                }
                else {
                    $sql = "UPDATE $table SET username='$uName',password='$password',specialization='$specialization',phone='$phone',gender='$gender' WHERE id='$editid'";
                }

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

        ////////Delete Record/////
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

        //book appointment
        public function bookAppointment($data,$table,$currentUser)
        {
            $uName = $_POST['username'];
            $specialization = $_POST['specialization'];
            $fees = $_POST['fees'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            //$editid = $_POST['hid'];

            if(empty($date)||empty($time))
            {
                array_push($this->errors," Fields must not be empty");
            }

           // var_dump($data);

            if(count($this->errors)==0)
            {
                //$password = md5($password);//encript password
                $sql = "INSERT INTO $table(username,specialization,fees,date,time,uid) VALUES('$uName','$specialization','$fees','$date','$time','$currentUser')";

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

        public function displayAppointment($table,$currentUser)
        {
            $sql = "SELECT * FROM $table WHERE uid = '$currentUser'";
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

        //filter

            // Fetch Standard

        public function fetch_std()
        {
            $data = [];

            $sql = "SELECT DISTINCT `specialization` FROM `doctors`";
            $result = $this->connection->query($sql);
            if($result){
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            return $data;
        }

          // Fetch Result

        public function fetch_res()
        {
            $data = [];

            $sql = "SELECT DISTINCT `gender` FROM `doctors`";
            $result = $this->connection->query($sql);
            if($result){
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            return $data;
        }

              

    }
?>