<?php
class Main_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $ds_owner = array();
        $dataset_ratings = array();
        $ds_pet = array();
    }
    public function sendEmail(){
        
        if (!empty($_POST)) {
            $email = $this->input->post("email");
            $this->load->model("main_model");
            if ($email) {
                $this->load->model('main_model');
                $result = $this->main_model->retrievePass($email);
                if($result){
                    
                    $to      = $result[0]["Email"];
                    $subject = 'Pawster Care';
                    $message = 'Your password is : '.$this -> decryptPass($result[0]["Password"]);
                    $headers = 'From: edwardjosephfernandez@gmail.com' . "\r\n" .
                        'Reply-To: Pawster Care' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    
                    mail($to, $subject, $message, $headers);
                    $response["error"]=false;
                   echo json_encode($response);
                }else{
                    $response["error"]=true;
                    echo json_encode($response);
                }
            }
        }
    }
    
    public function encryptPass($string){
        $key = 'password to (en/de)crypt';
        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );
        
        $encrypted = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                $string,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
        return $encrypted;
    }

    public function decryptPass($string){
        $key = 'password to (en/de)crypt';
        $data = base64_decode($string);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $string = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );
        return $string;
    }
    
    public function ActiveFacebook()
    {
        if (!empty($_POST)) {
            $fbemail = $this->input->post("fbemail");
          
            $this->load->model("main_model");
            if ($fbemail) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getActivefacebook($fbemail));
            } else {
                $response['error'] = "true";
                echo json_encode($response);
            }
        } else {
            $response['error'] = "true";
            echo json_encode($response);
        }
    }
    
   
    
    public function ActiveAdopter()
    {
        if (!empty($_POST)) {
            $Username = $this->input->post("Username");
            $Password = $this->input->post("Password");
            
            $this->load->model("main_model");
            if ($Username && $Password) {
                $this->load->model('main_model');
                $pass="";
                $adopter = $this->main_model->getActiveAdopter($Username, $Password);
              
                if($adopter["error"]){
                     $pass=$adopter[0]["Password"];
                     $pass = $this -> decryptPass($pass);
                     if($pass === $Password){
                         echo json_encode($this->main_model->getActiveAdopter($Username, $Password));
                        }else{
                           $response['error'] = "true";
                           echo json_encode($response);  
                        }
                }else{
                    $response['error'] = "true";
                    echo json_encode($response);
                }
               
                
            } else {
                $response['error'] = "true";
                echo json_encode($response);
            }
        } else {
            $response['error'] = "true";
            echo json_encode($response);
        }
    }

    public function selectedOwner()
    {
        if (!empty($_POST)) {
            $id = $this->input->post("id");
            $this->load->model("main_model");
            if ($id) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getSelectedOwner($id));
            }
        }
    }

    public function RegisterAccount()
    {
        if (!empty($_POST)) {
            $owner_img = $this->input->post("owner_img");
            $Fname = $this->input->post("Fname");
            $Mname = $this->input->post("Mname");
            $Lname = $this->input->post("Lname");

            $Username = $this->input->post("Username");
            $Password = $this->input->post("Password");
            $Gender = $this->input->post("Gender");
            $HAddress = $this->input->post("HAddress");
            $Birthdate = $this->input->post("Birthdate");
            $CStatus = $this->input->post("CStatus");
            $OAddress = $this->input->post("OAddress");
            $Email = $this->input->post("Email");
            $Contact = $this->input->post("Contact");
            $Occupation = $this->input->post("Occupation");
            $Salary = $this->input->post("Salary");
            $token = $this->input->post("token");

            $Password = $this -> encryptPass($Password);
            if ($token && $Gender && $Fname && $Lname && $Username &&
                $Password && $Birthdate &&
                $CStatus && $HAddress && $Email && $Contact) {
                $this->load->model('main_model');
                $id = $this->main_model->getLastId()[0]['id'];
                $id = ((int) $id + 1);
                $upload_path = "./uploads/$id.jpg";
                $saveimg = "$id.jpg";
                if ($this->main_model->isExistUsername($Username)) {
                    $response['error'] = "true";
                    $response['response'] = "The username you entered already exist.";
                } else {
                    if ($this->main_model->isExistEmail($Email)) {
                        $response['error'] = "true";
                        $response['response'] = "The email address you entered already exist.";
                    } else {
                        if ($Occupation == null or $Salary == null or $OAddress == null) {
                            $Occupation = "n/a";
                            $Salary = "n/a";
                            $OAddress = "n/a";
                        }
                        $data = array(
                            "owner_img" => $saveimg,
                            "Fname" => $Fname,
                            "Mname" => $Mname,
                            "Lname" => $Lname,
                            "Username" => $Username,
                            "Password" => $Password,
                            "Gender" => $Gender,
                            "HAddress" => $HAddress,
                            "Birthdate" => $Birthdate,
                            "CStatus" => $CStatus,
                            "OAddress" => $OAddress,
                            "Email" => $Email,
                            "Contact" => $Contact,
                            "Occupation" => $Occupation,
                            "Salary" => $Salary,
                            "Status" => "Not Screened by The City Vet Office",
                            "token" => $token,
                        );
                        file_put_contents($upload_path, base64_decode($owner_img));
                        $response['error'] = $this->main_model->insertAdopter($data);
                        $response['id'] = $id;
                        $response['img'] = $saveimg;
                    }
                }
            } else {
                $response['error'] = "true";
                $response['response'] = "You must fill up all required fields";
            }
        } else {
            $response['error'] = "true";
            $response['response'] = "Server error has occured.";
        }
        echo json_encode($response);
    }

    public function UpdateActiveAdopter()
    {
        if (!empty($_POST)) {
            $owner_img = $this->input->post("owner_img");
            $id = $this->input->post("id");
            $Fname = $this->input->post("Fname");
            $Mname = $this->input->post("Mname");
            $Lname = $this->input->post("Lname");
            $Gender = $this->input->post("Gender");
            $HAddress = $this->input->post("HAddress");
            $Birthdate = $this->input->post("Birthdate");
            $Cstatus = $this->input->post("CStatus");
            $QAddress = $this->input->post("OAddress");
            $Email = $this->input->post("Email");
            $Contact = $this->input->post("Contact");
            $Occupation = $this->input->post("Occupation");
            $Salary = $this->input->post("Salary");
            if ($owner_img && $id && $Fname && $Gender && $Lname && $HAddress && $Birthdate
                && $Cstatus && $QAddress && $Email && $Contact) {
                $upload_path = "./uploads/$id.jpg";
                $saveimg = "$id.jpg";
                $this->load->model('main_model');
                if ($Occupation == null or $Salary == null) {
                    $Occupation = "n/a";
                    $Salary = "n/a";
                }
                $data = array(
                    "owner_img" => $saveimg,
                    "Fname" => $Fname,
                    "Lname" => $Lname,
                    "Mname" => $Mname,
                    "Gender" => $Gender,
                    "HAddress" => $HAddress,
                    "Birthdate" => $Birthdate,
                    "CStatus" => $Cstatus,
                    "OAddress" => $QAddress,
                    "Email" => $Email,
                    "Contact" => $Contact,
                    "Occupation" => $Occupation,
                    "Salary" => $Salary,
                );
                $response['error'] = $this->main_model->editAdopter($id, $data);
                file_put_contents($upload_path, base64_decode($owner_img));
            } else {
                $response['error'] = "true";
                $response['response'] = "You must fill up all required fields";
            }
        } else {
            $response['error'] = "true";
            $response['response'] = "Server error has occured.";
        }
        echo json_encode($response);
    }

    public function UpdateUserToken()
    {
        if (!empty($_POST)) {
            $id = $this->input->post("id");
            $token = $this->input->post("token");
            if ($id && $token) {
                $this->load->model('main_model');
                $data = array(
                    "token" => $token,
                );
                $response['error'] = $this->main_model->updateToken($id, $data);
            } else {
                $response['error'] = true;
                $response['response'] = "Device token is not supported. Please update your google services.";
            }
        } else {
            $response['error'] = true;
            $response['response'] = "Server error has occured.";
        }
        echo json_encode($response);
    }

    public function ChangePassword()
    {
        if (!empty($_POST)) {
            $id = $this->input->post('id');
            $Password = $this->input->post('Password');
            $NewPassword = $this->input->post('NewPassword');
            $ConfirmPassword = $this->input->post('ConfirmPassword');
            if ($id && $Password) {
                $this->load->model('main_model');
                $data = array(
                    "Password" => $this -> encryptPass($NewPassword),
                );
                if($this -> decryptPass($Password) == $ConfirmPassword){
                     $response['error'] = $this->main_model->editPassword($id, $data);
                      $response['error'] = false;
                      $response['password'] = $this -> encryptPass($NewPassword);
                     echo json_encode($response);
                }else{
                    $response['error'] = true;
                    echo json_encode($response);
                    
                }
               
            }
        }
    }
    public function rated()
    {
        $response = array();
        if (!empty($_POST)) {
            $owner_id = $this->input->post('owner_id');
            $pet_id = $this->input->post('pet_id');
            if ($owner_id && $pet_id) {
                $this->load->model('main_model');
                $response = $this->main_model->isRated($owner_id, $pet_id);
                if (count($response["result"]) > 0) {
                    $response["rating"] = $response["result"][0]["ratings"];
                } else {
                    $response["rating"] = "0.0";
                }
                echo json_encode($response);
            }
        }
    }

    public function favorited()
    {
        $response = array();
        if (!empty($_POST)) {
            $owner_id = $this->input->post('owner_id');
            $pet_id = $this->input->post('pet_id');
            if ($owner_id && $pet_id) {
                $this->load->model('main_model');

                if (!$this->main_model->isFavorited($owner_id, $pet_id)) {
                    $response["favorited"] = false;
                } else {
                    $response["favorited"] = true;
                }
                echo json_encode($response);
            }
        }
    }
    public function isReported()
    {
        $response = array();
        if (!empty($_POST)) {
            $reporter_id = $this->input->post("reporter_id");
            $reported_user_id = $this->input->post("reported_user_id");
            if ($reporter_id && $reported_user_id) {
                $this->load->model('main_model');

                if (!$reportresult = $this->main_model->isReported($reporter_id, $reported_user_id)) {
                    echo json_encode($reportresult);
                } else {
                    echo json_encode($reportresult);
                }
            }
        }
    }

    public function adopted()
    {
        $response = array();
        if (!empty($_POST)) {
            $owner_id = $this->input->post('owner_id');
            $pet_id = $this->input->post('pet_id');
            if ($owner_id && $pet_id) {
                $this->load->model('main_model');

                if (!$this->main_model->isAdopted($owner_id, $pet_id)) {
                    $response["adopted"] = false;
                } else {
                    $response["adopted"] = true;
                }
                echo json_encode($response);
            }
        }
    }

    public function createNewConversation()
    {
        $response = array();
        if (!empty($_POST)) {
            // $title = $this->input->post("title");
            $this->load->model('main_model');
            $sender_id = $this->input->post("sender_id");
            $receiver_id = $this->input->post("receiver_id");
            $conv_title = "$sender_id wants to connect with $receiver_id";
            if ($sender_id && $receiver_id) {
                $result = $this->main_model->setNewConversation($conv_title, $sender_id, $receiver_id);
                if (!$result["error"]) {
                    $response["error"] = false;
                } else {
                    $response["error"] = true;
                }
            } else {
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;
        }
        echo json_encode($response);
    }
    public function Messages()
    {
        $response = array();
        if (!empty($_POST)) {
            // $title = $this->input->post("title");
            $this->load->model('main_model');
            $sender_id = $this->input->post("sender_id");
            $receiver_id = $this->input->post("receiver_id");
            if ($sender_id && $receiver_id) {
                $result = $this->main_model->getMessages($sender_id, $receiver_id);
                if (!$result["error"]) {
                    echo json_encode($result);
                } else {
                    $response["error"] = true;
                    echo json_encode($response);
                }
            } else {
                $response["error"] = true;
                echo json_encode($response);
            }
        } else {
            $response["error"] = true;
            echo json_encode($response);
        }
    }

    public function SubmitPetCruelty()
    {
        if (!empty($_POST)) {
            $adopter_id = $this->input->post("adopter_id");
            $offender_name = $this->input->post("offender_name");
            $offender_capt = $this->input->post("offender_capt");
            $address = $this->input->post("address");
            $category = $this->input->post("category");
            $description = $this->input->post("description");
            $file1 = $this->input->post("file1");
            $file2 = $this->input->post("file2");
            $file3 = $this->input->post("file3");
            $count = $this->input->post("count");
            $filetype = $this->input->post("filetype");
            $lastid = "";
            if ($address && $adopter_id && $offender_name && $offender_capt && $category && $description) {
                $this->load->model('main_model');
                $lastid = $this->main_model->getLastIdOfPetCruelty()[0]['id'];
                $lastid = ((int) $lastid + 1);
                $lastid = $lastid . $adopter_id;
                if ($filetype == "video") {
                    $upload_path = "./petcruelty/$lastid.mp4";
                    $result = $this->main_model->PetCruelty($address, $adopter_id, $offender_name, $offender_capt, $category, $description,
                        "$lastid.mp4", "", "", '1');
                    if (!$result["error"]) {
                        file_put_contents($upload_path, base64_decode($file1));
                        $response["error"] = false;
                    } else {
                        $response["error"] = true;
                    }
                } else {
                    $upload_path1 = "./petcruelty/" . $lastid . "1.jpg";
                    $upload_path2 = "./petcruelty/" . $lastid . "2.jpg";
                    $upload_path3 = "./petcruelty/" . $lastid . "3.jpg";
                    $result = $this->main_model->PetCruelty($address, $adopter_id, $offender_name, $offender_capt, $category, $description,
                        $lastid . "1.jpg", $lastid . "2.jpg", $lastid . "3.jpg", $count);
                    if (!$result["error"]) {
                        if ($count === "1") {
                            file_put_contents($upload_path1, base64_decode($file1));
                        } elseif ($count === "2") {
                            file_put_contents($upload_path1, base64_decode($file1));
                            file_put_contents($upload_path2, base64_decode($file2));
                        } else {
                            file_put_contents($upload_path1, base64_decode($file1));
                            file_put_contents($upload_path2, base64_decode($file2));
                            file_put_contents($upload_path3, base64_decode($file3));
                        }
                        $response["error"] = false;
                    } else {
                        $response["error"] = true;
                    }

                }

            } else {
                $response["error"] = true;
            }

        }
        echo json_encode($response);
    }

    public function savePet()
    {
        if (!empty($_POST)) {
            $pet_img = $this->input->post("pet_img");
            $name = $this->input->post("name");
            $type = $this->input->post("type");
            $Breed = $this->input->post("Breed");
            $gender = $this->input->post("gender");
            $color = $this->input->post("color");
            $age = $this->input->post("age");
            $size = $this->input->post("size");
            $vaccinated = $this->input->post("vaccinated");
            $Owner = $this->input->post("Owner");
            if ($vaccinated && $pet_img && $name && $type && $Breed && $gender && $color && $age && $size && $Owner) {
                $this->load->model('main_model');
                $upload_path = "./pets/$Owner$name.jpg";
                $saveimg = "$Owner$name.jpg";
                if ($this->main_model->isExistPetName($Owner, $name)) {
                    $response['error'] = "true";
                    $response['response'] = "The pet name you entered already exist. Please choose a unique one.";
                } else {
                    $data = array(
                        "pet_img" => $saveimg,
                        "name" => $name,
                        "type" => $type,
                        "Breed" => $Breed,
                        "gender" => $gender,
                        "color" => $color,
                        "age" => $age,
                        "size" => $size,
                        "vaccinated" => $vaccinated,
                        "Owner" => $Owner,
                        "createdBy" => "0",
                    );
                    $response['error'] = $this->main_model->addPet($data);
                    if ($response['error'] === false) {
                        file_put_contents($upload_path, base64_decode($pet_img));
                    }
                }
            } else {
                $response['error'] = "true";
                $response['response'] = "Please fill up all required fields.";
            }
        } else {
            $response['error'] = "true";
            $response['response'] = "Could not connect to the server";
        }
        echo json_encode($response);
    }

    public function updatePet()
    {
        if (!empty($_POST)) {
            $pet_id = $this->input->post("pet_id");
            $pet_img = $this->input->post("pet_img");
            $name = $this->input->post("name");
            $type = $this->input->post("type");
            $Breed = $this->input->post("Breed");
            $gender = $this->input->post("gender");
            $color = $this->input->post("color");
            $age = $this->input->post("age");
            $size = $this->input->post("size");
            $vaccinated = $this->input->post("vaccinated");
            $Owner = $this->input->post("Owner");
            if ($pet_id && $vaccinated && $pet_img && $name && $type && $Breed && $gender && $color && $age && $size) {
                $this->load->model('main_model');
                $upload_path = "./pets/$Owner$name.jpg";
                $saveimg = "$Owner$name.jpg";
                $data = array(
                    "pet_img" => $saveimg,
                    "name" => $name,
                    "type" => $type,
                    "Breed" => $Breed,
                    "gender" => $gender,
                    "color" => $color,
                    "age" => $age,
                    "size" => $size,
                    "vaccinated" => $vaccinated,
                    "createdBy" => "0",
                );

                if (!$this->main_model->editPet($pet_id, $data)) {
                    file_put_contents($upload_path, base64_decode($pet_img));
                    $response['error'] = "false";
                } else {
                    $response['error'] = "true";
                    $response['response'] = "You already have a pet with this name. Please choose a unique one.";
                }
                //  }
            } else {
                $response['error'] = "true";
                $response['response'] = "Please fill up all required fields.";
            }
        } else {
            $response['error'] = "true";
            $response['response'] = "Could not connect to the server";
        }
        echo json_encode($response);
    }

    public function ActivePetCruelty()
    {

        if (!empty($_POST)) {
            $this->load->model('main_model');
            $user_id = $this->input->post("user_id");
            if ($user_id) {
                if ($result = $this->main_model->getActivePetCruelty($user_id)) {
                    
                    echo json_encode($result);
                } else {
                    $response['error'] = true;
                    echo json_encode($result);
                }

            } else {
                $response['error'] = true;
                $response['response'] = "Please fill up all required fields.";
                
            echo json_encode($response);
            }
        } else {
            $response['error'] = true;
            $response['response'] = "Could not connect to the server";
            
            echo json_encode($response);
        }
       
    }
    //Get All pets from the active adopter
    public function AdopterPets()
    {
        if (!empty($_POST)) {
            $Owner = $this->input->post("Owner");
            $this->load->model("main_model");
            if ($Owner) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getAdopterPets($Owner));
            }
        }
    }

    public function retrievePassword()
    {
        if (!empty($_POST)) {
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            if ($email) {
                $to = $email;
                $subject = 'Pawster Care';
                $message = "The password of your account is $password";
                $headers = 'From: mrmontiveles@gmail.com' . "\r\n" .
                'Reply-To: fonblank04@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
            }
        }
    }

    public function newComment()
    {
        if (!empty($_POST)) {
            $sender_id = $this->input->post("sender_id");
            $pet_id = $this->input->post("pet_id");
            $message = $this->input->post("message");
            if ($sender_id && $pet_id && $message) {
                $this->load->model("main_model");
                if (!$this->main_model->IsExistcomment($pet_id)) {
                    $comData = array(
                        "pet_id" => $pet_id,
                    );
                    $this->main_model->newComment($comData);
                }
                $comment_id = $this->main_model->getcommentid($pet_id)[0]["comment_id"];
                $data = array(
                    "comment_id" => $comment_id,
                    "sender_id" => $sender_id,
                    "message" => $message,
                );
                if ($this->main_model->addComDetails($data)) {
                    $getcomments = $this->main_model->getComments($pet_id);
                    if (!$getcomments) {
                        $response["error"] = true;
                        echo json_encode($response);
                    } else {
                        echo json_encode($getcomments);
                    }
                } else {
                    $response["error"] = true;
                    echo json_encode($response);
                }

            }
        }
    }

    public function showComments()
    {
        if (!empty($_POST)) {
            $pet_id = $this->input->post("pet_id");
            if ($pet_id) {
                $this->load->model("main_model");
                $getcomments = $this->main_model->getComments($pet_id);

            } else {
                $response["error"] = true;
            }
            echo json_encode($getcomments);
        }
    }

    public function initialRating()
    {
        if (!empty($_POST)) {
            $get_user_id = $this->input->post("get_user_id");
            $pet_id_1 = $this->input->post("pet_id_1");
            $pet_id_2 = $this->input->post("pet_id_2");
            $pet_id_3 = $this->input->post("pet_id_3");
            $pet_id_4 = $this->input->post("pet_id_4");
            $pet_id_5 = $this->input->post("pet_id_5");
            $rating_1 = $this->input->post("rating_1");
            $rating_2 = $this->input->post("rating_2");
            $rating_3 = $this->input->post("rating_3");
            $rating_4 = $this->input->post("rating_4");
            $rating_5 = $this->input->post("rating_5");

            if ($get_user_id && $pet_id_1 && $pet_id_2 && $pet_id_3 && $pet_id_4 && $pet_id_5 &&
                $rating_1 && $rating_2 && $rating_3 && $rating_4 && $rating_5) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getInitialRating($get_user_id, $pet_id_1, $pet_id_2, $pet_id_3, $pet_id_4, $pet_id_5, $rating_1, $rating_2, $rating_3, $rating_4, $rating_5));
            }
        }
    }

    public function AdoptPet()
    {
        if (!empty($_POST)) {
            $pet_id = $this->input->post("pet_id");
            $adopter_id = $this->input->post("adopter_id");
            $adopter_name = $this->input->post("adopter_name");
            $q1 = $this->input->post("q1");
            $q2 = $this->input->post("q2");
            $q3 = $this->input->post("q3");
            $q4 = $this->input->post("q4");
            $q5 = $this->input->post("q5");
            $q6 = $this->input->post("q6");
            $q7 = $this->input->post("q7");
            $q8 = $this->input->post("q8");
            $q9 = $this->input->post("q9");
            $q10 = $this->input->post("q10");
            $q11 = $this->input->post("q11");
            $Status = $this->input->post("Status");
            if ($pet_id && $adopter_id) {
                $this->load->model('main_model');
                $data = array(
                    "pet_id" => $pet_id,
                    "adopter_id" => $adopter_id,
                    "q1" => $q1,
                    "q2" => $q2,
                    "q3" => $q3,
                    "q4" => $q4,
                    "q5" => $q5,
                    "q6" => $q6,
                    "q7" => $q7,
                    "q8" => $q8,
                    "q9" => $q9,
                    "q10" => $q10,
                    "q11" => $q11,
                    "Status" => "Pending",
                );

                if (!$this->main_model->addAdoptPet($data)) {
                    $response['error'] = true;
                } else {
                    $this->AdoptPetNotif($pet_id, $adopter_id,$adopter_name);
                    $response['error'] = false;
                }
            } else {
                $response['error'] = true;
            }
        } else {
            $response['error'] = true;
        }
        echo json_encode($response);
    }

    public function AdoptPetNotif($pet_id, $adopter_id,$adopter_name)
    {
        $this->load->model('main_model');
        $response = $this->main_model->getUserToken($pet_id);
        $tokens = array();
        if ($response["error"] === false) {
            for ($i = 0; $i < count($response['tokens']); $i++) {
                array_push($tokens, $response['tokens'][$i]['token']);
            }
            //array_push($tokens,'fVCJSOEBIHM:APA91bGv-V8J7WgHT4pis-6SoyRMsExd-jxQNtzR4XVa3cHFceJrigFqBqD5zqP9A6kdR2pS8XiPnwXDn2LXXoYYMtA2NbBpLy3QEk3fkDoD_DkwuAe61vCT6-jBny1uGaEeLP3IzUUH');
            $title = 'You Have a New Adoption Request';
            $body = $adopter_name . ' wants to adopt ' . $response['tokens'][0]['pet_name'];

            $this->load->model('firebase');
            $adoption = $this->main_model->getAdoptionRequestNotifData($pet_id, $adopter_id);

            $data = array(
                'adoption_id' => $adoption[0]['adoption_id'],
                'adopter_id' => $adoption[0]['adopter_id'],
                'adopter_fullname' => $adoption[0]['adopter_fullname'],
                'Status' => $adoption[0]['Status'],
                'pet_id' => $adoption[0]['pet_id'],
                'pet_img' => $adoption[0]['pet_img'],
                'pet_name' => $adoption[0]['pet_name'],
                'timestamp' => $adoption[0]['timestamp'],
                'q1' => $adoption[0]['q1'],
                'q2' => $adoption[0]['q2'],
                'q3' => $adoption[0]['q3'],
                'q4' => $adoption[0]['q4'],
                'q5' => $adoption[0]['q5'],
                'q6' => $adoption[0]['q6'],
                'q7' => $adoption[0]['q7'],
                'q8' => $adoption[0]['q8'],
                'q9' => $adoption[0]['q9'],
                'q10' => $adoption[0]['q10'],
                'q11' => $adoption[0]['q11'],
                'adopter_img' => $adoption[0]['adopter_img'],
                'date' => date('Y-m-d H:i:s'),
            );
            $notification = array(
                'body' => $body,
                'title' => $title,
            );
            $this->firebase->send($tokens, $notification, $data);
        } else {
        }
    }

    public function MyAdoptionRequest()
    {
        $adopter_id = $this->input->post("adopter_id");
        if (!empty($_POST)) {
            if ($adopter_id) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getMyAdoptionRequests($adopter_id));
            }
        }
    }

    public function AdoptionApplicants()
    {
        $owner_id = $this->input->post("owner_id");
        if (!empty($_POST)) {
            if ($owner_id) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getAdoptionRequests($owner_id));
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }

    }

    public function countedRatings()
    {
        $response = array();
        $disp = array();
        $owner_id = $this->input->post("owner_id");
        if (!empty($_POST)) {
            if ($owner_id) {
                $this->load->model('main_model');
                $response = $this->main_model->getCountedRatings($owner_id);
                if ($response["result"][0]["count"] > 4) {
                    $disp["error"] = false;
                } else {
                    $disp["error"] = true;
                }
                echo json_encode($disp);
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }

    }

    public function AcceptAdoptionRequest()
    {
        $id = $this->input->post("adoption_id");
        $pet_id= $this->input->post("pet_id");
        if (!empty($_POST)) {
            if ($id) {
                $this->load->model('main_model');
                $data = array(
                    "Status" => "APPROVED",
                    "approved_date" => date("Y/m/d"),
                );
                echo json_encode($this->main_model->getAcceptAdoptionRequest($id,$pet_id, $data));
            }
        }
    }
    public function DeclineAdoptionRequest()
    {
        $id = $this->input->post("adoption_id");
        if (!empty($_POST)) {
            if ($id) {
                $this->load->model('main_model');
                $data = array(
                    "Status" => "DECLINED",
                    "approved_date" => date("Y/m/d"),
                );
                echo json_encode($this->main_model->getAcceptAdoptionRequest($id, $data));
            }
        }
    }
    public function CancelAdoptionRequest()
    {
        $id = $this->input->post("adoption_id");
        if (!empty($_POST)) {
            if ($id) {
                $this->load->model('main_model');
                $data = array(
                    "Status" => "CANCELLED",
                    "cancelled_date" => date("Y/m/d"),
                );
                echo json_encode($this->main_model->getCancelAdoptionRequest($id, $data));
            }
        }
    }
    public function RemoveAdoptionRequest()
    {
        $id = $this->input->post("adoption_id");
        if (!empty($_POST)) {
            if ($id) {
                $this->load->model('main_model');
                $data = array(
                    "Status" => "REMOVED",
                    "removed_date" => date("Y/m/d"),
                );
                echo json_encode($this->main_model->getAcceptAdoptionRequest($id, $data));
            }
        }
    }

    //get history data
    public function AdoptionHistory()
    {
        $id = $this->input->post("id");
        if (!empty($_POST)) {
            if ($id) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getAdoptionHistory($id));
            }
        }
    }
    public function SearchedPets()
    {
        if (!empty($_POST)) {
            $id = $this->input->post("Owner");
            $type = $this->input->post("type");
            $breed = $this->input->post("Breed");
            $OwnerType = $this->input->post("OwnerType");

            if ($id && $type && $breed && $OwnerType) {
                $this->load->model('main_model');
                $startQuery = "Select * from petinfo where type <> '' ";
                if ($type == "All" && $breed == "All" && $OwnerType == "All") {
                    $query = "$startQuery and owner_id <> " . $id;
                } elseif ($type == "All" && $breed == "All" && $OwnerType == "City Veterenarian's Office") {
                    $query = "$startQuery and owner_id <> $id and owner_id = 1";
                } elseif ($type == "All" && $breed == "All" && $OwnerType == "Private Owners") {
                    $query = "$startQuery and owner_id <> $id and owner_id <> 1";
                } elseif ($type != "All" && $breed != "All" && $OwnerType == "City Veterenarian's Office") {
                    $query = "$startQuery and owner_id <> $id and type='$type' and Breed='$breed' and owner_id =1 ";
                } elseif ($type != "All" && $breed != "All" && $OwnerType == "Private Owners") {
                    $query = "$startQuery and  owner_id <> $id and type='$type' and Breed='$breed' and owner_id <> 1";
                } elseif ($type != "All" && $breed != "All" && $OwnerType == "All") {
                    $query = "$startQuery and  owner_id <> $id and type='$type' and Breed='$breed'";
                } elseif ($type != "All" && $OwnerType == "Private Owners" && $breed === "All") {
                    $query = "$startQuery and  owner_id <> $id and type='$type' and owner_id <> 1";
                } elseif ($type != "All" && $OwnerType == "City Veterenarian's Office" && $breed === "All") {
                    $query = "$startQuery and  owner_id <> $id and type='$type' and owner_id = '1'";
                } elseif ($type != "All" && $OwnerType == "City Veterenarian's Office" && $breed != "All") {
                    $query = "$startQuery and  owner_id <> $id and type='$type' and owner_id ='1' and Breed='$breed'";
                } elseif ($type != "All" && $OwnerType === "All" && $breed === "All") {
                    $query = "$startQuery and  owner_id <> $id and type='$type'";
                }
                echo json_encode($this->main_model->getListOfPets($query));
            }
        }
    }

    public function RatePet()
    {
        if (!empty($_POST)) {
            $pet_id = $this->input->post("pet_id");
            $owner_id = $this->input->post("owner_id");
            $ratings = $this->input->post("ratings");
            if ($pet_id && $owner_id && $ratings) {
                $this->load->model('main_model');
                $data = array(
                    "pet_id" => $pet_id,
                    "owner_id" => $owner_id,
                    "ratings" => $ratings,
                );
                $updata = array(
                    "pet_id" => $pet_id,
                    "owner_id" => $owner_id,
                );

                echo json_encode($this->main_model->getRatePet($data, $updata));
            }
        }
    }
    public function report_user()
    {
        if (!empty($_POST)) {
            $reporter_id = $this->input->post("reporter_id");
            $reported_user_id = $this->input->post("reported_user_id");
            $reason = $this->input->post("reason");
            if ($reporter_id && $reported_user_id && $reason) {
                $this->load->model('main_model');
                $data = array(
                    "reporter_id" => $reporter_id,
                    "reported_user_id" => $reported_user_id,
                    "reason" => $reason,
                );
                echo json_encode($this->main_model->insertReport($data));
            }
        }
    }
    public function FavoritePet()
    {
        $pet_id = $this->input->post("pet_id");
        $owner_id = $this->input->post("owner_id");
        if (!empty($_POST)) {
            if ($pet_id && $owner_id) {
                $this->load->model('main_model');
                $data = array(
                    "pet_id" => $pet_id,
                    "owner_id" => $owner_id,
                );
                echo json_encode($this->main_model->getFavoritePet($data));
            }
        }
    }
     public function UnfavoritePet()
    {
        $pet_id = $this->input->post("pet_id");
        $owner_id = $this->input->post("owner_id");
        if (!empty($_POST)) {
            if ($pet_id && $owner_id) {
                $this->load->model('main_model');
                $data = array(
                    "pet_id" => $pet_id,
                    "owner_id" => $owner_id,
                );
                echo json_encode($this->main_model->getUnFavoritePet($data));
            }
        }
    }

    public function userFavoritePets()
    {
        $response = array();
        $owner_id = $this->input->post("owner_id");
        if (!empty($_POST)) {
            if ($owner_id) {
                $this->load->model('main_model');
                echo json_encode($this->main_model->getUserFavoritePets($owner_id));

            } else {
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;
        }
    }
    public function descSort($pets, $ratings)
    {
        for ($j = 0; $j < count($ratings); $j++) {
            for ($i = 0; $i < count($ratings) - 1; $i++) {

                if ($ratings[$i] < $ratings[$i + 1]) {
                    $temp = $ratings[$i + 1];
                    $tempPets = $pets[$i + 1];

                    $ratings[$i + 1] = $ratings[$i];
                    $pets[$i + 1] = $pets[$i];

                    $ratings[$i] = $temp;
                    $pets[$i] = $tempPets;
                }
            }
        }
        return $pets;

    }
    public function collabFilteringResults()
    {
        $owner_id = $this->input->post("owner_id");
        $this->load->model('main_model');
        $response = array();
        $resultData = array();
        $finalData = array();
        $response = $this->main_model->getUserUnratedPet($owner_id);
        $resultPetData = array();
        $resultPredictionData = array();
        if ($response === true or $response === 1) {
            $response1 = array();
            $response1["error"] = true;
            echo json_encode($response1);
        } else {
            for ($i = 0; $i < count($response); $i++) {
                
                if($this->collaborativeFiltering($response[$i]['pet_id']) >= 1){
                    array_push($resultPetData, $response[$i]['pet_id']);
                    array_push($resultPredictionData, $this->collaborativeFiltering($response[$i]['pet_id']));
                    $resultData[$response[$i]['pet_id']] = $this->collaborativeFiltering($response[$i]['pet_id']);
                }
                
            }
            $petRecommendationDataSet = array();
            $petRecommendationDataSet = $this->descSort($resultPetData, $resultPredictionData);
            $recommendPetInfo = array();
            /*echo '<pre>';
            print_r($resultPetData);
            print_r($resultPredictionData);
            print_r($petRecommendationDataSet);
            echo '</pre>';*/
            $cleanPetRecommendationDataSet = array();
            for ($i = 0; $i < count($petRecommendationDataSet); $i++) {
                if (!$this->main_model->isOwnerPet($owner_id, $petRecommendationDataSet[$i])) {
                    array_push($cleanPetRecommendationDataSet, $petRecommendationDataSet[$i]);
                }
            }
          /*  echo '<pre>';
            print_r($cleanPetRecommendationDataSet);
            echo '</pre>';*/

            if (count($cleanPetRecommendationDataSet) === 0) {
                $recommendPetInfo["error"] = true;
                $recommendPetInfo["response"] = "There is no pet to recommend for you right now. ";
            } else {
                $recommendPetInfo = $this->main_model->getRecommendedPetInfo($cleanPetRecommendationDataSet);
            }
            echo json_encode($recommendPetInfo);
        }
    }

    //collab filtering
    public function collaborativeFiltering($pet_id)
    {
        $owner_id = $this->input->post("owner_id");
        $db = mysqli_connect('185.201.9.122', 'paws', 'eiijii21', 'cias4');
        $this->load->model('main_model');
        $ds_owner = array();
        $ds_pet = array();
        $ds_owner = $this->main_model->getDataSet("Select owner_id from ratings GROUP by owner_id asc", "owner_id");
        $ds_pet = $this->main_model->getDataSet("Select pet_id from ratings GROUP by pet_id asc", "pet_id");
        for ($i = 0; $i < count($ds_pet); $i++) {
            for ($x = 0; $x < count($ds_owner); $x++) {
                $dataset_ratings[$ds_pet[$i]][$ds_owner[$x]][0] = 0;
            }
        }
        for ($i = 0; $i < count($ds_pet); $i++) {
            $arr_owner_ids = array();
            $arr_owner_pet_ratings = array();
            $strQuery = "Select owner_id,ratings from ratings where pet_id=" . $ds_pet[$i] . " order by owner_id asc";
            $result = mysqli_query($db, $strQuery);
            foreach ($result as $row) {
                array_push($arr_owner_ids, $row["owner_id"]);
                array_push($arr_owner_pet_ratings, $row["ratings"]);
            }

            for ($x = 0; $x < count($ds_owner); $x++) {
                for ($y = 0; $y < count($arr_owner_ids); $y++) {
                    if ($ds_owner[$x] == $arr_owner_ids[$y]) {
                        $dataset_ratings[$ds_pet[$i]][$ds_owner[$x]][0] = $arr_owner_pet_ratings[$y];
                    }
                }
            }
        }

        $sc = array();
        $sc = $this->similarityScores($pet_id, $ds_pet, $ds_owner, $dataset_ratings);
        $owner_pet_ratings = array();
        $owner_pet_ratings_petname = array();
        $strQuery = "Select pet_id, ratings from ratings where owner_id =$owner_id ORDER by owner_id asc";
       /* echo '<pre>';
            print_r($sc);
            echo '</pre>';*/
        
        
        $result = mysqli_query($db, $strQuery);
        foreach ($result as $row) {
            array_push($owner_pet_ratings_petname, $row["pet_id"]);
            array_push($owner_pet_ratings, $row["ratings"]);
        }

        $numOfK = 0;
        $knn_dataset = array();
        $distancePet = array();
        $knnPetData = array();
        $knnSimData = array();
        $knnRatingData = array();
        $knnDistanceData = array();
        for ($i = 0; $i < count($owner_pet_ratings_petname); $i++) {
            for ($x = 0; $x < count($ds_pet); $x++) {
                if ($owner_pet_ratings_petname[$i] == $ds_pet[$x]) {
                    array_push($knnPetData, $owner_pet_ratings_petname[$i]);
                    array_push($knnSimData, $sc[$x]);
                    array_push($knnRatingData, $owner_pet_ratings[$i]);
                    array_push($knnDistanceData, $this->EuclideanDistance($sc[$x], $owner_pet_ratings[$i]));
                    $knn_dataset[$owner_pet_ratings_petname[$i]]['simscore'] = $sc[$x];
                    $knn_dataset[$owner_pet_ratings_petname[$i]]['rating'] = $owner_pet_ratings[$i];
                    $knn_dataset[$owner_pet_ratings_petname[$i]]['distance'] = $this->EuclideanDistance($sc[$x], $owner_pet_ratings[$i]);
                    if ($sc[$x] > 0) {
                        $numOfK++;
                    }
                }
            }
        }

        $PetDataset = array();
        $RatingDataset = array();
        $DistanceDataset = array();
        $SimDataset = array();

        list($SimDataset, $PetDataset, $RatingDataset, $DistanceDataset) = $this->ascSort($knnSimData, $knnPetData, $knnRatingData, $knnDistanceData, $numOfK);

        $PcKnnData = array();

        for ($i = 0; $i < count($PetDataset); $i++) {
            $PcKnnData[$PetDataset[$i]]['distance'] = $DistanceDataset[$i];
            $PcKnnData[$PetDataset[$i]]['simscore'] = $SimDataset[$i];
            $PcKnnData[$PetDataset[$i]]['rating'] = $RatingDataset[$i];
        }

        return $this->generalWeightedEverage($PcKnnData, $PetDataset);
    }
    public function ascSort($knnSimData, $knnPetData, $knnRatingData, $knnDistanceData, $numOfK)
    {

        for ($j = 0; $j < count($knnDistanceData); $j++) {
            for ($i = 0; $i < count($knnDistanceData) - 1; $i++) {

                if ($knnDistanceData[$i] > $knnDistanceData[$i + 1]) {
                    $temp = $knnDistanceData[$i + 1];
                    $tempSim = $knnSimData[$i + 1];
                    $tempRating = $knnRatingData[$i + 1];
                    $tempPet = $knnPetData[$i + 1];

                    $knnDistanceData[$i + 1] = $knnDistanceData[$i];
                    $knnSimData[$i + 1] = $knnSimData[$i];
                    $knnPetData[$i + 1] = $knnPetData[$i];
                    $knnRatingData[$i + 1] = $knnRatingData[$i];

                    $knnDistanceData[$i] = $temp;
                    $knnSimData[$i] = $tempSim;
                    $knnPetData[$i] = $tempPet;
                    $knnRatingData[$i] = $tempRating;
                }
            }
        }

        /*  echo '<pre>';
        echo "aw";
        print_r($knnPetData);
        echo '</pre>';*/
        $NumOfData = count($knnSimData);
        //numbers of k neighbors
        $numOfK=5;
        for ($i = 0; $i < $NumOfData; $i++) {
            if ($i > ($numOfK-1)) {
                unset($knnSimData[$i]);
                unset($knnPetData[$i]);
                unset($knnRatingData[$i]);
                unset($knnDistanceData[$i]);
            }
        }
        return array($knnSimData, $knnPetData, $knnRatingData, $knnDistanceData);
    }

    public function getOwnerPetRatings($pet_id, $ds_owner, $dataset_ratings)
    {
        $rating_data = array();
        for ($x = 0; $x < count($ds_owner); $x++) {

            $str = $dataset_ratings[$pet_id][$ds_owner[$x]];
            $string = implode('[]', $str);
            array_push($rating_data, (int) $string);
        }
        return $rating_data;
    }

    public function similarityScores($pet_id, $ds_pet, $ds_owner, $dataset_ratings)
    {
        $simScores = array();

        for ($i = 0; $i < count($ds_pet); $i++) {
            $do = array();
            $activeUser = array();
            $do = $this->getOwnerPetRatings($ds_pet[$i], $ds_owner, $dataset_ratings);
            $activeUser = $this->getOwnerPetRatings($pet_id, $ds_owner, $dataset_ratings);
            $correlation = $this->PearsonCorrelation($do, $activeUser);
            array_push($simScores, $correlation);

        }
        return $simScores;
    }

    public function PearsonCorrelation($arr1, $arr2)
    {
        $correlation = 0;
        $k = $this->SumProductMeanDeviation($arr1, $arr2);
        $res = $this->ProductSumSquareMeanDeviation($arr1, $arr2);
        
        if(!$correlation = $k / $res){
            $correlation=-1;
        }else{
            $correlation = $k / $res;
        }
       return $correlation;
    }

    public function SumProductMeanDeviation($arr1, $arr2)
    {
        $sum = 0;

        $num = count($arr1);

        for ($i = 0; $i < $num; $i++) {
            if ($arr1[$i] != 0 and $arr2[$i] != 0) {
                $sum = $sum + $this->ProductMeanDeviation($arr1, $arr2, $i);
            }
        }

        return $sum;
    }

    public function ProductMeanDeviation($arr1, $arr2, $item)
    {
        return ($this->MeanDeviation($arr1, $item) * $this->MeanDeviation($arr2, $item));
    }

    public function ProductSumSquareMeanDeviation($arr1, $arr2)
    {
        if ($this->SumSquareMeanDeviation($arr1) * $this->SumSquareMeanDeviation($arr2) == 0) {
            return -1;
        } else {
            return $this->SumSquareMeanDeviation($arr1) * $this->SumSquareMeanDeviation($arr2);
        }

    }

    public function SumSquareMeanDeviation($arr)
    {
        $sum = 0;

        $num = count($arr);

        for ($i = 0; $i < $num; $i++) {
            if ($arr[$i] != 0) {
                $sum = $sum + $this->SquareMeanDeviation($arr, $i);
            }
        }
        return sqrt($sum);
    }

    public function SquareMeanDeviation($arr, $item)
    {
        return $this->MeanDeviation($arr, $item) * $this->MeanDeviation($arr, $item);
    }

    public function SumMeanDeviation($arr)
    {
        $sum = 0;

        $num = count($arr);

        $sum = $sum + $this->MeanDeviation($arr, $i);

        return $sum;
    }

    public function MeanDeviation($arr, $item)
    {
        $average = $this->Average($arr);

        return $arr[$item] - $average;
    }

    public function Average($arr)
    {
        $num = 0;
        $sum = $this->Sum($arr);
        for ($i = 0; $i < count($arr); $i++) {

            if ($arr[$i] != 0) {
                $num = $num + 1;
            }

        }
        return $sum / $num;
    }

    public function Sum($arr)
    {
        return array_sum($arr);
    }

    public function EuclideanDistance($var1, $var2)
    {
        $diffSimRating = ($var1 - 1);
        $diffRating = ($var2 - 2.5);
        $squareSimRating = pow($diffSimRating, 2);
        $squareRating = pow($diffRating, 2);
        $sumSquares = $squareSimRating + $squareRating;
        $ud = sqrt($sumSquares);
        return $ud;
    }

    public function generalWeightedEverage($knn_dataset, $knnPetData)
    {
        $PowData = array();
        $simScores = array();
        for ($i = 0; $i < count($knn_dataset); $i++) {

            array_push($PowData, $knn_dataset[$knnPetData[$i]]['simscore'] * $knn_dataset[$knnPetData[$i]]['rating']);
            array_push($simScores, $knn_dataset[$knnPetData[$i]]['simscore']);
        }

        $sumPowData = array_sum($PowData);
        $sumSimScore = array_sum($simScores);
        if (!$predictionValue = @($sumPowData / $sumSimScore)) {
            return -1;
        } else {
            return $predictionValue;
        }

    }

}
