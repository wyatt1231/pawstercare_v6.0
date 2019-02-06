<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Pet extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pet_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'The-Gym-Time : Pet List';
        
        $this->loadViews("petlist", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function petListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->pet_model->petListingCount($searchText);

            $returns = $this->paginationCompress ( "petListing  /", $count, 10 );
            
            $data['pets'] = $this->pet_model->petListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'The-Gym-Time : Pet List';
            
            $this->loadViews("petlist", $this->global, $data, NULL);
        }
    }

    
   
}

?>