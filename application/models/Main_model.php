<?php
class Main_model extends CI_Model
{

    public function ConvoExist($Username, $Password)
    {
        $response = array();
        $query = "Select * from adopter where Username='$Username' or Email='$Username' and password='$Password'";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $response = $result->result_array();
            $response["error"] = "false";
            return $response;
        } else {
            $response["0"] = "Please input a valid username and password!";
            $response["error"] = "true";
            return $response;
        }
    }
    public function getActivefacebook($fbemail)
    {
        $response = array();
        $query = "Select * from adopter where Email='" . $fbemail . "'";
        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            $response = $result->result_array();
            $response["error"] = "false";
            return $response;
        } else {
            $response["0"] = "Please input a valid username and password!";
            $response["error"] = "true";
            return $response;
        }
    }

    public function getUserToken($id)
    {
        $response = array();
        $query = "select owner_name,token, name as 'pet_name' from petinfo where id='$id' and token <> ''";
        //  $query="select owner_name,token, name as 'pet_name' from petinfo";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $response["tokens"] = $result->result_array();
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function getActiveAdopter($Username, $Password)
    {
        
        $response = array();
        $query = " Select * from adopter where  Status <> 'Blocked'  and id <> '1'  and Username='$Username' or email='$Username'";

       
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $response = $result -> result_array();
            $response["error"] = "false";
            return $response;
        } else {
            return false;
        }
    }

    public function getSelectedOwner($id)
    {
        $response = array();
        $query = "Select * from adopter where id=$id";
        if ($result = $this->db->query($query)) {
            if ($result->num_rows() > 0) {
                $response = $result->result_array();
                $response["error"] = "false";
            } else {
                $response["0"] = "User not found";
                $response["error"] = "true";

            }
        } else {
            $response["error"] = "true";
        }
        return $response;
    }

    public function getFileName()
    {
        $id = array();
        $query = "Select max(id) as id from adopter";
        $result = $this->db->query($query);
        $id = $result->result_array();

        $getID = ($id[0]['id']);

        if ($getID == null) {
            return 1;
        } else {
            return ++$getID;
        }

    }

    public function insertAdopter($data)
    {
        $response = array();
        if (!$this->db->insert("adopter", $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertReport($data)
    {
        $response = array();
        if (!$this->db->insert("reported_users", $data)) {

            $response["error"] = true;
        } else {
            $response["error"] = false;
        }
        return $response;
    }
    public function editAdopter($id, $data)
    {
        if (!$this->db->where('id', $id)) {
            return true;
        } else {
            if (!$this->db->update('adopter', $data)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateToken($id, $data)
    {
        if (!$this->db->where('id', $id)) {
            return true;
        } else {
            if (!$this->db->update('adopter', $data)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function editPet($id, $data)
    {
        if (!$this->db->where('id', $id)) {
            return true;
        } else {
            if (!$this->db->update('pets', $data)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function editPassword($id, $data)
    {
        if (!$this->db->where('id', $id)) {
            return true;
        } else {
            if (!$this->db->update('adopter', $data)) {
                return true;
            } else {
                if ($this->db->affected_rows() > 0) {
                    return false;
                } else {
                    return true;
                }

            }
        }
    }

    public function PetCruelty($address, $adopter_id, $offender_name, $offender_capt, $category, $description,
        $file1, $file2, $file3, $filecount) {
        $response = array();
        $filecount = (int) $filecount;
        $query = "Call savePetCruelty('$adopter_id' , '$offender_name' , '$offender_capt' , '$category'  , '$description',
            '$file1','$file2','$file3',$filecount,'$address')";
           
        if ($result = $this->db->query($query)) {
            if ($this->db->affected_rows() > 0) {
                $response["error"] = false;
            } else {
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function addPet($data)
    {
        if (!$this->db->insert("pets", $data)) {
            return true;
        } else {
            if ($this->db->affected_rows() > 0) {
                return false;
            } else {
                return true;
            }
        }

    }

    public function getUploadVideo($data)
    {
        if (!$this->db->insert("pets", $data)) {
            return true;
        } else {
            if ($this->db->affected_rows() > 0) {
                return false;
            } else {
                return true;
            }
        }

    }

    public function getAdopterPets($Owner)
    {
        $response = array();
        $query = "Select * from petinfo where owner_id='" . $Owner . "'";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $response["AdopterPets"] = $result->result_array();
            $response["error"] = false;
            return $response;
        } else {
            return true;
        }
    }

    public function getActivePetCruelty($user_id)
    {
        $response = array();
        $query = "Select f.pc_name,pc.address,pc.offender_name,pc.offender_capt,pc.category,pc.description,pc.Remarks,pc.posted_date from pet_cruelty pc inner join pet_cruelty_files f on f.pc_id=pc.pc_file_id where pc.Remarks != 'Completed' and pc.adopter_id=$user_id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $response["PetCruelty"] = $result->result_array();
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function getListOfPets($query)
    {
        $response = array();
        if (!$result = $this->db->query($query)) {
            $response["error"] = true;
        } else {
            if ($result->num_rows() > 0) {
                $response["ListOfPets"] = $result->result_array();
                $response["error"] = false;
                return $response;
            } else {
                $response["error"] = true;
            }
        }
        return $response;
    }

    public function getUserFavoritePets($owner_id)
    {
        $response = array();
        $query = "SELECT p.id,p.pet_img,p.name,p.type,p.Breed,p.gender,p.color,p.age,p.size,p.owner_name,p.owner_img,p.owner_id,p.vaccinated from favorites f join petinfo p on p.id=f.pet_id where f.owner_id='$owner_id'";
        if ($result = $this->db->query($query)) {
            if ($result->num_rows() > 0) {
                $response["FavoritePets"] = $result->result_array();
                $response["error"] = false;
            } else {
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;
        }
        return $response;
    }
    public function addAdoptPet($data)
    {
        $response = array();
        if (!$this->db->insert("adoptpet", $data)) {
            return false;
        } else {
            return true;
        }
    }

    public function getInitialRating($get_user_id, $pet_id_1, $pet_id_2, $pet_id_3, $pet_id_4, $pet_id_5, $rating_1, $rating_2, $rating_3, $rating_4, $rating_5)
    {
        $response = array();
        $query = "Call initialRating($get_user_id , $pet_id_1 , $pet_id_2 , $pet_id_3 , $pet_id_4 , $pet_id_5 ,
            $rating_1 , $rating_2 , $rating_3 , $rating_4 , $rating_5)";
        if ($result = $this->db->query($query)) {
            if ($this->db->affected_rows() > 0) {
                $response["error"] = false;
            } else {
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function IsExistcomment($pet_id)
    {
        $query = "SELECT comment_id from comments where pet_id=$pet_id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function newComment($comData)
    {
        if ($this->db->insert("comments", $comData)) {
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getcommentid($pet_id)
    {
        $response = array();
        $query = "SELECT comment_id from comments where pet_id=$pet_id";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            return $result->result_array();
        }
    }
    public function addComDetails($data)
    {
        if ($this->db->insert("comment_details", $data)) {
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getComments($pet_id)
    {
        $response = array();
        $query = "Select concat(s.Fname,' ',s.Lname) as 'sender', cd.message,s.owner_img, cd.date_sent  from comments c inner join comment_details cd on cd.comment_id=c.comment_id inner join adopter s on s.id=cd.sender_id where c.pet_id=$pet_id";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            $response["error"] = true;
        } else {
            $response["comments"] = $result->result_array();
            $response["error"] = false;

        }
        return $response;
    }
    public function getMyAdoptionRequests($adopter_id)
    {
        $response = array();
        $query = "SELECT ap.id as 'adoption_id',p.owner_id as 'owner_id',p.owner_name as 'owner_fullname',a.Status,p.id as 'pet_id',p.pet_img,p.name as 'pet_name',ap.timestamp,ap.q1,ap.q2,ap.q3,ap.q4,ap.q5,ap.q6,ap.q7,ap.q8,ap.q9,ap.q10,ap.q11,ap.Status as 'adoption_status' from adoptpet ap inner join adopter a on a.id=ap.adopter_id inner join petinfo p on p.id=ap.pet_id where ap.Status <> 'DECLINED' and ap.Status <> 'REMOVED' and ap.Status <> 'APPROVED' and ap.Status <> 'CANCELLED' and ap.adopter_id= '$adopter_id' and p.pet_status='Pending' ORDER BY ap.timestamp DESC";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            $response["error"] = true;
        } else {
            if ($result->num_rows() > 0) {
                $response["MyAdoptionRequest"] = $result->result_array();
                $response["error"] = false;
            }
        }
        return $response;
    }

    public function getLastId()
    {
        $response = array();
        $query = "SELECT max(id) as id FROM adopter";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            $response["error"] = true;
        } else {
            $response = $result->result_array();
        }
        return $response;
    }

    public function getAdoptionRequestNotifData($pet_id, $adopter_id)
    {
        $response = array();
        $query = " SELECT ap.id as 'adoption_id',ap.adopter_id as 'adopter_id',a.owner_img as 'adopter_img',concat(a.Fname,' ',a.Lname) as 'adopter_fullname',a.Status,p.id as 'pet_id',p.pet_img,p.name as 'pet_name',ap.timestamp,ap.q1,ap.q2,ap.q3,ap.q4,ap.q5,ap.q6,ap.q7,ap.q8,ap.q9,ap.q10,ap.q11 from adoptpet ap inner join adopter a on a.id=ap.adopter_id inner join pets p on p.id=ap.pet_id where ap.pet_id='$pet_id' and ap.adopter_id='$adopter_id' and ap.status ='Pending'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            return $result->result_array();
        }

    }
    public function isExistUsername($username)
    {
        $response = array();
        $query = "SELECT id as 'id' from adopter where Username='$username'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }
    public function getSelectedOwnerRating($owner_id, $pet_id)
    {
        $response = array();
        $query = "Select ratings from ratings where owner_id='$owner_id' and pet_id='$pet_id'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }

    public function isRated($owner_id, $pet_id)
    {
        $response = array();
        $query = "Select ratings from ratings where owner_id='$owner_id' and pet_id='$pet_id'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                $response["result"] = $result->result_array();
                $response["rated"] = true;
            } else {
                $response["result"] = $result->result_array();
                $response["rated"] = false;
            }
            return $response;
        }
    }

    public function isReported($reporter_id, $reported_user_id)
    {
        $response = array();
        $query = "Select * from reported_users where reporter_id='$reporter_id' and reported_user_id='$reported_user_id'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                $response["reported"] = true;
            } else {
                $response["reported"] = false;
            }
            return $response;
        }
    }

    public function isAdopted($owner_id, $pet_id)
    {
        $response = array();
        $query = "Select id from adoptpet where adopter_id='$owner_id' and pet_id='$pet_id'";
        
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }
    public function isFavorited($owner_id, $pet_id)
    {
        $response = array();
        $query = "Select id from favorites where owner_id='$owner_id' and pet_id='$pet_id'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }

    public function isOwnerPet($owner, $pet_id)
    {
        $response = array();
        $query = "Select id from petinfo where owner_id=$owner and id=$pet_id";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }

    public function isExistPetName($id, $petname)
    {
        $response = array();
        $query = "Select id from pets where name='$petname' and Owner=$id";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }

    public function isExistUpdatePetName($pet_id, $petname, $id)
    {
        $response = array();
        $query = "Select id from pets where name='$petname' and Owner=$id and id <> $id";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }

    public function isExistEmail($email)
    {
        $response = array();
        $query = "SELECT id as 'id' from adopter where Email='$email'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return true;
            }
            return false;
        }
    }
    public function retrievePass($email)
    {
        $response = array();
        $query = "SELECT Email,Password from adopter where Email='$email' or Contact='$email'";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            return false;
        } else {
            if ($result->num_rows() > 0) {
                return $result-> result_array();
            }
            return false;
        }
    }
    public function getLastIdOfPetCruelty()
    {
        $response = array();
        $query = "SELECT max(id) as id FROM pet_cruelty";
        $result = $this->db->query($query);
        if (!$result = $this->db->query($query)) {
            $response["error"] = true;
        } else {
            $response = $result->result_array();
            $response["error"] = false;
        }
        return $response;
    }
    public function getCountedRatings($owner_id)
    {
        $response = array();
        $query = "Select count(*) as count from ratings where owner_id=$owner_id";

        if ($result = $this->db->query($query)) {
            $response["result"] = $result->result_array();
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function getAdoptionRequests($Owner)
    {
        $response = array();
        $query = "SELECT ap.id as 'adoption_id',ap.adopter_id as 'adopter_id',a.owner_img as 'adopter_img',concat(a.Fname,' ',a.Lname) as 'adopter_fullname',a.Status,p.id as 'pet_id',p.pet_img,p.name as 'pet_name',ap.timestamp,ap.q1,ap.q2,ap.q3,ap.q4,ap.q5,ap.q6,ap.q7,ap.q8,ap.q9,ap.q10,ap.q11 from adoptpet ap inner join adopter a on a.id=ap.adopter_id inner join pets p on p.id=ap.pet_id where ap.Status <>'REMOVED' and ap.Status <>'APPROVED' and ap.Status <>'DECLINED' and p.Owner= '$Owner' and p.Status='Pending' ORDER BY ap.timestamp DESC";
        if ($result = $this->db->query($query)) {
            $response["AdoptRequests"] = $result->result_array();
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function getAcceptAdoptionRequest($id,$pet_id, $data)
    {
        $response = array();
        if (!$this->db->where('id', $id)) {
            $response["error"] = true;
        } else {
            if (!$this->db->update('adoptpet', $data)) {
                $response["error"] = true;
            } else {
                $query="Update pets set status = 'Approved' where id = $pet_id";
                if (!$this->db->query($query)) {
                  $response["error"] = true;
                } else {
                    $response["error"] = false;
                }
            }
        }
        return $response;
    }

    public function getCancelAdoptionRequest($id, $data)
    {
        $response = array();
        if (!$this->db->where('id', $id)) {
            $response["error"] = true;
        } else {
            if (!$this->db->update('adoptpet', $data)) {
                $response["error"] = true;
            } else {
               $response["error"] = false;
            }
        }
        return $response;
    }

    public function setNewConversation($conv_title, $sender_id, $receiver_id)
    {
        $response = array();
        $query = "CALL `newConversation`('$conv_title', $sender_id, $receiver_id)";
        if (!$result = $this->db->query($query)) {
            $response["error"] = true;
        } else {
            if ($this->db->affected_rows() > 0) {

                $response["error"] = false;
            } else {

                $response["error"] = true;
            }
        }
        return $response;
    }
    public function getMessages($get_sender_id, $get_receiver_id)
    {
        $response = array();
        $query = "CALL `selectMessages`($get_sender_id, $get_receiver_id)";
        if ($result = $this->db->query($query)) {
            if ($result->num_rows() > 0) {
                $response["Messages"] = $result->result_array();
                $response["error"] = false;
            } else {
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;

        }
        return $response;
    }

    public function getAdoptionHistory($id)
    {
        $response = array();
        $query = "Select ap.id,ap.status as 'adoption_status', p.id as 'pet_id',p.pet_img,p.name,concat(a.Fname,' ',a.Lname) as 'owner',ap.Status,ap.timestamp from adoptpet ap join adopter a on a.id=ap.adopter_id join petinfo p on p.id=ap.pet_id where  (a.id=$id or p.owner_id=$id) and ap.Status <> 'APPROVAL' and ap.Status <> 'Pending'  and ap.Status <> 'REMOVED'  and ap.timestamp >= DATE_SUB(NOW(), INTERVAL 15 DAY)";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $response["AdoptionHistory"] = $result->result_array();
            $response["error"] = false;

        } else {
            $response["error"] = true;
        }
        return $response;
    }

    public function getDataSet($query, $column)
    {
        $db = mysqli_connect('185.201.9.122', 'paws', 'eiijii21', 'cias4');
        $arr_dataset = array();
        $result = mysqli_query($db, $query);
        foreach ($result as $row) {
            array_push($arr_dataset, (int) $row[$column]);
        }
        return $arr_dataset;
    }
    
    public function getRatePet($data, $updata)
    {
        $response = array();
        if (!$this->db->insert("ratings", $data)) {
            $this->db->where($updata);
            $this->db->update('ratings', $data);
            if ($this->db->affected_rows() > 0) {
                $response["error"] = false;
            } else {
                $response["error"] = true;
            }

        } else {
            $response["error"] = false;
        }

        return $response;
    }

    public function getFavoritePet($data)
    {
        $response = array();
        if (!$this->db->insert("favorites", $data)) {
            $response["error"] = true;
        } else {
            $response["error"] = false;
        }
        return $response;
    }
     public function getUnFavoritePet($data)
    {
        $response = array();
        
        if (!$this->db->delete('favorites', $data)) {
            $response["error"] = true;
        } else {
            $response["error"] = false;
        }
        return $response;
    }

    public function getUserUnratedPet($owner_id)
    {
        $response = array();
        $query = "SELECT pet_id FROM ratings WHERE owner_id = $owner_id";
        if ($result = $this->db->query($query)) {
            $response = $result->result_array();
            $str = "SELECT pet_id from ratings WHERE ";
            for ($i = 0; $i < count($response); $i++) {
                if ($i == (count($response) - 1)) {
                    $str = $str . " pet_id <> " . $response[$i]['pet_id'] . " GROUP by pet_id";
                } else {
                    $str = $str . " pet_id <> " . $response[$i]['pet_id'] . " and ";
                }
            }
            if (!$result = $this->db->query($str)) {
                return true;
            } else {
                $response = array();
                if (!$result->num_rows() > 0) {
                    return true;
                } else {
                    return $response = $result->result_array();
                }
            }

        } else {
            return true;
        }
    }

    public function getRecommendedPetInfo($data)
    {
        $response = array();
        for ($i = 0; $i < count($data); $i++) {
            $str = "SELECT * from petinfo WHERE id =" . $data[$i];
            $result = $this->db->query($str);
            $response['Pets'][$i] = $result->result_array();
        }
        if ($result->num_rows() > 0) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        return $response;

    }
}
