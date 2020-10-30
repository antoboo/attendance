<?php 
        class crud{
       
            
            private $db;

            //constructor to initialize private variable to the database connection
            function __construct($conn){
                $this -> db = $conn;
            }
        
        
            
            public function insertAttendees($fname, $lname, $dob, $email, $contact, $speciality)
            {
                
                try {
                    //define sql statement to be excuted
                    $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id)VALUES (:fname, :lname, :dob,  :email, :contact, :specialty)";
                    //define sql statement to be excuted
                    $stmt = $this -> db -> prepare($sql);       
                    //bind all placeholder to the actual values
                    $stmt->bindparam(':fname', $fname);
                    $stmt->bindparam(':lname', $lname);
                    $stmt->bindparam(':dob', $dob);
                    $stmt->bindparam(':email', $email);
                    $stmt->bindparam(':contact', $contact);
                    $stmt->bindparam(':specialty', $speciality);

                    $stmt->execute();
                    return true;


                }
                catch ( PDOException $e)
                
                    {
                        echo $e->getMessage();
                        return false;
                    }

             


            }    

            public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
                try {
                $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob, `emailaddress`=:email, 
                `contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id ";

                    $stmt = $this -> db -> prepare($sql);       
                    //bind all placeholder to the actual values
                    $stmt->bindparam(':id', $id);
                    $stmt->bindparam(':fname', $fname);
                    $stmt->bindparam(':lname', $lname);
                    $stmt->bindparam(':dob', $dob);
                    $stmt->bindparam(':email', $email);
                    $stmt->bindparam(':contact', $contact);
                    $stmt->bindparam(':specialty', $specialty);

                    $stmt->execute();
                    return true;
                }
                    catch ( PDOException $e)
                    {
                        echo $e->getMessage();
                        return false;
                    }
                }

            

            public function getAttendees(){

                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }


            public function getAttendeeDetails($id){
                $sql = "SELECT * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt -> bindparam(':id',$id);
                $stmt ->execute();
                $result = $stmt->fetch();
                return $result;

            }
            public function getSpecialties(){

                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            }


            public function deleteAttendee($id){
                
                try {

                    $sql = "delete from attendee WHERE attendee_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt -> bindparam(':id',$id);
                    $stmt ->execute();
                    return true;

                } 
                
                catch ( PDOException $e)
                {
                    echo $e->getMessage();
                    return false;
                }

            }





            }

        
?>