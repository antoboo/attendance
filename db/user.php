<?php 
        class user{
       
            //private database object
            private $db;
        
            //constructor to initialize private variable to the database connection
            function __construct($conn){
                $this->db = $conn;



           
            }public function insertUser($username, $password) 
                {
                    try {
                        $result = $this->getUserbyUsername($username);
                        if ($result['num'] > 0){
                            return false; 

                        }
                        else
                         {
                            $new_password = md5($password.$username);
                        
                            //define sql statement to be excuted
                            $sql = "INSERT INTO users (username, password)VALUES (:username, :password)";
                            //define sql statement to be excuted
                            $stmt = $this -> db -> prepare($sql);       
                            //bind all placeholder to the actual values
                            $stmt->bindparam(':username', $username );
                            $stmt->bindparam(':password', $new_password);
                            //execute statement
                            $stmt->execute();
                            return true;
        
        
                        }
                    }catch ( PDOException $e)
                        
                            {
                                echo $e->getMessage();
                                return false;
                            }

                    }
                

             public function getUser($username, $password)
                    {          
                        try {
                            $sql = "select * from `users` where `username` = :username AND `password` = :password";
                           // The error was that you had query and not prepare.... :() $stmt = $this->db->query($sql);
                            $stmt = $this->db->prepare($sql);
                            $stmt->bindparam(':username',$username);
                            $stmt->bindparam(':password',$password);
                            $stmt ->execute();
                            $result = $stmt->fetch();
                            return $result;
                            
                        }
                    
                        catch ( PDOException $e)                        
                            {
                                //var_dump($stmt->ErrorInfo());
                                echo $e->getMessage();
                                var_dump($e);
                                return false;
                            }
                        }

            public function getUserbyUsername($username)
                {          
                            try {
                                $sql = "SELECT count(*) as num from users where username = :username";
                                $stmt = $this->db->prepare($sql);
                                $stmt -> bindparam(':username',$username);
                            
                                $stmt ->execute();
                                $result = $stmt->fetch();
                                return $result;
                                
                                }
                        
                                catch ( PDOException $e)
                                
                                    {
                                        echo $e->getMessage();
                                        return false;
                                    }
                



           }    
         }

        

        


?>