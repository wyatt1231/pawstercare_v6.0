<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    public function petListingCount()
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, type.name, breed.name, BaseTbl.Owner');
        $this->db->from('pets as BaseTbl');
        $this->db->join('pet_type as type', 'type.id = BaseTbl.type', 'inner');
        $this->db->join('breed as breed', 'breed.id = BaseTbl.breed', 'inner');

        $this->db->order_by('BaseTbl.id', 'desc');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function lowest_rated()
    {
        $this->db->select('p.`pet_img` as img,p.`name` as name,p.`Breed` as breed,lrp.total_rating as rating');
        $this->db->from('least_rated_pet as lrp');
        $this->db->join('pets p', 'p.id = lrp.pet_id', 'inner');
        $this->db->where('lrp.total_rating <=3');

        $this->db->group_by('lrp.pet_id', 'desc');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function adopterListingCount($searchText = '')
    {
        $this->db->select('Fname, Mname, Lname, HAddress ,Birthdate,CStatus,OAddress,Email,Occupation,Salary,Status');
        $this->db->from('adopter');
        if (!empty($searchText)) {
            $likeCriteria = "(Fname  LIKE '%" . $searchText . "%'
          OR Mname  LIKE '%" . $searchText . "%'
          OR  Status  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function adopterListing()
    {
        $this->db->select('*');
        $this->db->from('adopter');

        $this->db->order_by('id', 'ASC');
        $this->db->where('Status', 'Approve');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function ReportedAdopterList()
    {
        $query = "select * from reportedusers order by total_report asc";
        return $this->db->query($query);

    }
    public function adopterListingAPPROVAL()
    {
        $this->db->select('*');
        $this->db->from('adopter');

        $this->db->order_by('id', 'ASC');
        $this->db->where('Status', 'APPROVAL');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function report()
    {
        $this->db->order_by('ratings', 'asc');
        $query = $this->db->get('most_rated_pet');
        return $query->result_array();
    }

    public function chart()
    {
        $rows = '';
        $query = "SELECT name,ratings FROM most_rated_pet";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }

    }

   
    public function report2($bred)
    {
        $this->db->select(" `p`.`Breed` AS `Breed`,
      ROUND((((5 * SUM(`rp`.`ratings`)) / 5) / COUNT(`p`.`Breed`)),1) AS `total_rating`");
        $this->db->from("`ratedpets` `rp`");
        $this->db->join("pets as p", "`rp`.`pet_id` = `p`.`id`");
        $this->db->where("p.`type`=", $bred);
        $this->db->group_by(' `p`.`Breed`');
        $this->db->order_by('`rp`.`ratings` asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function report3($month, $breed)
    {

        /*$this->db->order_by('total_rating asc');*/
        if (empty($month)) {
            $this->db->select('*');
            $this->db->from("January");
            $this->db->where("type", 'Dog');
        } else {
            $this->db->select('*');
            $this->db->from($month);
            $this->db->where("type", $breed);
        }
        $query = $this->db->get();
        return $query->result_array();

    }public function report4($months)
{
 if($months=="")
 {
    $months="January";
}
$this->db->select("COUNT(`p`.`name`) AS `total`,
  `ap`.`Status` AS `Status`,DATE_FORMAT(ap.`approved_date`,'%M') AS month");
$this->db->from("adoptpet as ap");
$this->db->join("pets as p","ap.pet_id=p.id");
$this->db->where("DATE_FORMAT(ap.`approved_date`,'%M')",$months);
$this->db->group_by('ap.Status');
$query = $this->db->get();
return $query->result_array();
}
    public function report5($year)
    {

        /*$this->db->order_by('total_rating asc');*/
        /*$this->db->order_by('total asc');*/

        $this->db->select("COUNT(id) AS total,TYPE, DATE_FORMAT(createdDtm,'%Y') AS DATE FROM pets");
        $this->db->where("DATE_FORMAT(createdDtm,'%Y')", $year);
        $this->db->group_by('type');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function total()
    {

        /*$this->db->order_by('total_rating asc');*/
        /*$this->db->order_by('total asc');*/

        $this->db->select("COUNT(id) AS total  FROM pets");

        $query = $this->db->get();

        $result = $query->result();
        return $result;

    }
    public function report6($breed)
    {

        /*$this->db->order_by('total_rating asc');*/
        /*$this->db->order_by('total asc');*/
        if ($breed == "") {
            $breed = "Dog";
        }
        $this->db->select("COUNT(p.breed) AS total,p.breed");
        $this->db->from("pets as p");
        $this->db->join("breed as b", 'p.`Breed`=b.`name`', 'left');
        $this->db->where("p.TYPE", $breed);
        $this->db->group_by('p.breed');
        $this->db->order_by('COUNT(p.breed) desc');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function report7($months, $years)
    {

        /*$this->db->order_by('total_rating asc');*/
        /*$this->db->order_by('total asc');*/
        $this->db->select("COUNT(`pet_cruelty`.`id`) AS `total`,
      months.name,
      DATE_FORMAT(`pet_cruelty`.`posted_date`,'%Y') AS `date2`,
      pet_cruelty.`Remarks`");
        $this->db->from("months");
        $this->db->join("pet_cruelty", 'DATE_FORMAT(`pet_cruelty`.`posted_date`,"%M")=months.name', 'left'); /*
        $this->db->where("DATE_FORMAT(posted_date,'%M')=",$months);*/
        $this->db->where("DATE_FORMAT(posted_date,'%Y')='$years' OR DATE_FORMAT(posted_date,'%Y')IS NULL");

        $this->db->group_by("months.name");
        $this->db->order_by('STR_TO_DATE(months.name,"%M")');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function adopterHistory()
    {
        $query = 'select * from users where Status="Blocked" order by id asc';
        return $this->db->query($query);
    }
      public function deniedListApproval()
    {
        $this->db->select('*');
        $this->db->from('adoption_denied');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

     public function deniedHistory()
     
    {
        $query = 'select * from adoption_denied  order by id asc';
        return $this->db->query($query);
    }
    public function crueltyListing()
    {

        $query = 'select * from crueltylist ';
        return $this->db->query($query);

    }
        public function crueltydash()
    {

        $this->db->select('Count(*) as total');
        $this->db->from('pet_cruelty');

        $query = $this->db->get();

        $result = $query->result();
        return $result;

    }
        public function petdash()
    {

        $this->db->select('Count(*) as total');
        $this->db->from('pet_list');
        $this->db->where("type<>'' ");

        $query = $this->db->get();

        $result = $query->result();
        return $result;

    }
       public function adopterdash()
    {

        $this->db->select('Count(*) as total');
        $this->db->from('users');

        $query = $this->db->get();

        $result = $query->result();
        return $result;

    }
    public function crueltyListingComp()
    {

        $query = 'select * from crueltycomp ';
        return $this->db->query($query);

    }
    public function pending()
    {
        $this->db->select('Count(*) as pending');
        $this->db->from('pet_cruelty');
        $where = "Remarks='For Verification' OR Remarks='Pending'";
        /*$where = "Remarks= 'For Verification' or Remarks='For Visit' or Remarks='On Progress";*/
        $this->db->where($where);
        /*  $this->db->where('Remarks',"For Verification");
        $this->db->where('Remarks',"On Progress");*/
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function taken()
    {
        $this->db->select('Count(*) as taken');
        $this->db->from('pet_cruelty');

        $this->db->where('Remarks', "Completed");

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function today()
    {
        $this->db->select('Count(*) as today');
        $this->db->from('pet_cruelty');

        $this->db->where("posted_date>=CURDATE()");

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function all()
    {
        $this->db->select('Count(*) as total');
        $this->db->from('pet_cruelty');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    // MARC CHANGES
    public function adopterList()
    {
        $query = 'select * from users where Status!="Blocked" and Status!="Denied" order by id asc';
        return $this->db->query($query);
    }

    //USERS MODULE MODELS

    public function adopterListWithWihoutPetsRegistered()
    {
        $query = "Select * from users";
        return $this->db->query($query);
    }
    public function adopterListWithWihoutPetsUnscreened()
    {
        $query = "SELECT * FROM users WHERE STATUS = 'Not Screened by The City Vet Office'";
        return $this->db->query($query);
    }
    public function adopterListWithWihoutPetsScreened()
    {
        $query = "SELECT * FROM users WHERE STATUS = 'Approved by City Vet'";
        return $this->db->query($query);
    }
    public function adopterListWithWihoutPetsBlocked()
    {
        $query = "SELECT * FROM users WHERE STATUS = 'Blocked'";
        return $this->db->query($query);
    }

    
    public function adopterListWithPetsRegistered()
    {
        $query = "SELECT * FROM users WHERE  id IN(SELECT OWNER AS 'id' FROM pets )";
        return $this->db->query($query);
    }

    public function adopterListWithPetsUnscreened()
    {
        $query = "SELECT * FROM users WHERE  STATUS = 'Not Screened by The City Vet Office' and id IN(SELECT OWNER AS 'id' FROM pets )";
        return $this->db->query($query);
    }
    public function adopterListWithPetsScreened()
    {
        $query = "SELECT * FROM users WHERE STATUS = 'Approved by City Vet' and  id IN(SELECT OWNER AS 'id' FROM pets )";
        return $this->db->query($query);
    }
    public function adopterListWithPetsBlocked()
    {
        $query = "SELECT * FROM users WHERE STATUS = 'Blocked' and id IN(SELECT OWNER AS 'id' FROM pets )";
        return $this->db->query($query);
    }


    public function adopterListWithoutPetsRegistered()
    {
        $query = "Select * from users where  id NOT IN(SELECT Owner as 'id' from pets )";
        return $this->db->query($query);
    }

    public function adopterListWithoutPetsUnscreened()
    {
        $query = "Select * from users where STATUS = 'Not Screened by The City Vet Office' and  id NOT IN(SELECT Owner as 'id' from pets )";
        return $this->db->query($query);
    }
    public function adopterListWithoutPetsScreened()
    {
        $query = "Select * from users where STATUS = 'Approved by City Vet' and  id NOT IN(SELECT Owner as 'id' from pets )";
        return $this->db->query($query);
    }
    public function adopterListWithoutPetsBlocked()
    {
        $query = "Select * from users where STATUS = 'Blocked' and id NOT IN(SELECT Owner as 'id' from pets )";
        return $this->db->query($query);
    }

    public function adopterListApproval()
    {
        $this->db->select('*');
        $this->db->from('adoption_req');
        $this->db->order_by('adopter_id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    // END MARC CHANGES
  public function chart_pets_data($from = null,$to = null)
    {
              $rows = '';
        $from =$_GET["from"];
        $to =$_GET["to"];
        if ($from && $to) {
            $from1 = date("Y-m-d", strtotime($from));
            $to1 = date("Y-m-d", strtotime($to));
            $query = "SELECT p.type,p.Breed,CONCAT(CAST(((COUNT(p.Breed)/(SELECT COUNT(*) FROM pets WHERE STATUS = 'Approved'))*100) AS DECIMAL(11,1)),'%') AS 'pet_count',CONCAT(COUNT(p.`Breed`), ' of ', (SELECT COUNT(*) FROM pets WHERE STATUS = 'Approved')) AS num_count  FROM pets p WHERE p.Status = 'Approved' AND (p.approved_date BETWEEN '$from1' AND '$to1') GROUP BY p.Breed";
        }else{
            $query = "SELECT p.type,p.Breed,CONCAT(CAST(((COUNT(p.Breed)/(SELECT COUNT(*) FROM pets WHERE STATUS = 'Approved'))*100) AS DECIMAL(11,1)),'%') AS 'pet_count',CONCAT(COUNT(p.`Breed`), ' of ', (SELECT COUNT(*) FROM pets WHERE STATUS = 'Approved')) AS num_count FROM pets p WHERE p.Status = 'Approved' GROUP BY p.Breed";
        }
       
 return $this->db->query($query);
    }
    public function chart_adopter_data($from = null,$to = null)
    {
            $rows = '';

        $from =$_GET["from"];
        $to =$_GET["to"];
        if ($from && $to) {
        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));
        $query = "SELECT (CASE WHEN a.Status = 'Approved by City Vet' THEN 'Screened' WHEN a.Status = 'Not Screened by The City Vet Office' THEN 'Unscreened' ELSE 'Blocked' END) AS 'Status' , CONCAT(CAST(((COUNT(a.Status)/(SELECT COUNT(*) FROM adopter WHERE STATUS != 'n/a'))*100) AS DECIMAL(11,1)),'%') AS 'status_count',CONCAT(COUNT(a.Status) , ' of ',(SELECT COUNT(*) FROM adopter WHERE STATUS != 'n/a') ) AS num_count  FROM adopter a WHERE (a.status_update BETWEEN '$from' AND '$to') AND a.Status != 'n/a' GROUP BY a.Status";
    }else{
        $query = "SELECT (CASE WHEN a.Status = 'Approved by City Vet' THEN 'Screened' WHEN a.Status = 'Not Screened by The City Vet Office' THEN 'Unscreened' ELSE 'Blocked' END) AS 'Status' , CONCAT(CAST(((COUNT(a.Status)/(SELECT COUNT(*) FROM adopter WHERE STATUS != 'n/a'))*100) AS DECIMAL(11,1)),'%') AS 'status_count',CONCAT(COUNT(a.Status) , ' of ',(SELECT COUNT(*) FROM adopter WHERE STATUS != 'n/a') ) AS num_count FROM adopter a WHERE a.Status != 'n/a' GROUP BY a.Status";
    }
     return $this->db->query($query);
    }
public function chart_petcruelty_data($from = null,$to = null)
{
    $rows = '';

    $from =$_GET["from"];
    $to =$_GET["to"];

    if ($from && $to) {
        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));
        $query = "SELECT (CASE WHEN pc.category = 'Maltreated' THEN 'Maltreated' WHEN pc.category = 'Tortured' THEN 'Tortured' WHEN pc.category = 'Neglect to provide adequate care' THEN 'Inadequate care' WHEN pc.category = 'Neglect to provide adequate sustenance or shelter' THEN 'Inadequate sustenance' WHEN pc.category = 'Illegal use of pets in research or experiments' THEN 'Illegal Experiments' WHEN pc.category = 'Killing' THEN 'Killing' ELSE 'Others' END) AS 'category',CONCAT(CAST(((COUNT(pc.category)/(SELECT COUNT(*) FROM pet_cruelty WHERE Remarks = 'Completed')) * 100) AS DECIMAL(11,1)), '%') AS 'pc_count',CONCAT(COUNT(pc.category), ' of ',(SELECT COUNT(*) FROM pet_cruelty WHERE Remarks = 'Completed')) AS 'num_count' FROM pet_cruelty pc WHERE pc.Remarks= 'Completed' AND (pc.remarks_update_date >= '$from' AND pc.remarks_update_date <= '$to') GROUP BY pc.category";
    }else{
        $query = "SELECT (CASE WHEN pc.category = 'Maltreated' THEN 'Maltreated' WHEN pc.category = 'Tortured' THEN 'Tortured' WHEN pc.category = 'Neglect to provide adequate care' THEN 'Inadequate care' WHEN pc.category = 'Neglect to provide adequate sustenance or shelter' THEN 'Inadequate sustenance' WHEN pc.category = 'Illegal use of pets in research or experiments' THEN 'Illegal Experiments' WHEN pc.category = 'Killing' THEN 'Killing' ELSE 'Others' END) AS 'category',CONCAT(CAST(((COUNT(pc.category)/(SELECT COUNT(*) FROM pet_cruelty WHERE Remarks = 'Completed')) * 100) AS DECIMAL(11,1)),'%') AS 'pc_count',CONCAT(COUNT(pc.category), ' of ',(SELECT COUNT(*) FROM pet_cruelty WHERE Remarks = 'Completed')) AS 'num_count'  FROM pet_cruelty pc WHERE pc.Remarks= 'Completed' GROUP BY pc.category";
    }
     return $this->db->query($query);
}
    public function adoption_requests_data()
    {
        $query = "select ap.id,p.name,concat(a.Fname,' ' , a.Lname) as adopter_name,ap.timestamp,ap.Status from adoptpet ap inner join pets p on p.id = ap.pet_id inner join adopter a on a.id = ap.adopter_id where p.Owner = 1";
        return $this->db->query($query);
    }

    public function adoption_requests_data_approved()
    {
        $query = "select ap.id,p.name,concat(a.Fname,' ' , a.Lname) as adopter_name,ap.timestamp,ap.Status from adoptpet ap inner join pets p on p.id = ap.pet_id inner join adopter a on a.id = ap.adopter_id where p.Owner = 1 and ap.Status='Approved'";
        return $this->db->query($query);
    }

    public function adoption_requests_data_pending()
    {
        $query = "select ap.id,p.name,concat(a.Fname,' ' , a.Lname) as adopter_name,ap.timestamp,ap.Status from adoptpet ap inner join pets p on p.id = ap.pet_id inner join adopter a on a.id = ap.adopter_id where p.Owner = 1 and ap.Status='Pending' and p.Status='Pending'";
        return $this->db->query($query);
    }

    public function adoption_requests_data_denied()
    {
        $query = "select ap.id,p.name,concat(a.Fname,' ' , a.Lname) as adopter_name,ap.timestamp,ap.Status from adoptpet ap inner join pets p on p.id = ap.pet_id inner join adopter a on a.id = ap.adopter_id where p.Owner = 1 and ap.Status='Denied'";
        return $this->db->query($query);
    }
    public function petListing()
    {
        $query = "Select p.id,p.name,concat(a.Fname,' ', a.Lname) as 'Owner',p.type,p.Breed, (CASE WHEN CAST(COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'0') as DECIMAL(11,1)) < 1 THEN 'Unrated' ELSE CAST(COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'0') as DECIMAL(11,1)) END )as average_rating from pets p inner join adopter a on p.Owner=a.id where p.Status <> 'testing'  order by p.createdDtm DESC";
        return $this->db->query($query);
    }
    public function petListHigh()
    {
        $query = "Select p.id,p.name,concat(a.Fname,' ', a.Lname) as 'Owner',p.type,p.Breed, (CASE WHEN CAST(COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'0') as DECIMAL(11,1)) < 1 THEN 'Unrated' ELSE CAST(COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'0') as DECIMAL(11,1)) END )as average_rating from pets p inner join adopter a on p.Owner=a.id where p.Status <> 'testing' and (COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'Unrated') ) >= 3  order by p.createdDtm DESC";
        return $this->db->query($query);
    }
    public function petListLow()
    {
        $query = "Select p.id,p.name,concat(a.Fname,' ', a.Lname) as 'Owner',p.type,p.Breed, (CASE WHEN CAST(COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'0') as DECIMAL(11,1)) < 1 THEN 'Unrated' ELSE CAST(COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'0') as DECIMAL(11,1)) END )as average_rating from pets p inner join adopter a on p.Owner=a.id where p.Status <> 'testing' and (COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'Unrated') ) <3 and (COALESCE((Select (sum(r.ratings)/count(r.pet_id)) from ratings r where r.pet_id=p.id ),'Unrated') ) > 0 order by p.createdDtm DESC";
        return $this->db->query($query);
    }
    public function petlogs($userId)
    {

        $this->db->select('*');
        $this->db->from('petlogs');
        $this->db->where('id', $userId);
        $this->db->order_by('id', 'ASC');

        /*   $this->db->where('Status="For screening" or Status="Approve"');
        $this->db->limit($pagess, $segmentss);*/
        $query = $this->db->get();

        $result = $query->result();
        return $result;

    }
    public function userListingCount()
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role,BaseTbl.status');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');

        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->where('BaseTbl.status =', 'ACTIVE');
        $query = $this->db->get();

        return $query->num_rows();
    }
    public function userCount($searchText = '')
    {
        $this->db->select('BaseTbl.id');
        $this->db->from('adopter as BaseTbl');

        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%" . $searchText . "%'
        OR  type.name  LIKE '%" . $searchText . "%'
        OR  breed.name  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.id', 'ASC');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function userListingCountApproval($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role,BaseTbl.status');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%'
        OR  BaseTbl.name  LIKE '%" . $searchText . "%'
        OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->where('BaseTbl.status =', 'APPROVAL');
        $query = $this->db->get();

        return $query->num_rows();
    }
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */

    public function userListing()
    {
        $query = 'select BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role,BaseTbl.status from tbl_users  BaseTbl left join  tbl_roles  Role on Role.roleId = BaseTbl.roleId where BaseTbl.isDeleted = "0" and BaseTbl.roleId != "1" and BaseTbl.status = "ACTIVE" order by BaseTbl.userId desc';
        return $this->db->query($query);
    }
    public function adminblock($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        return true;
    }
    public function Approval()
    {
          $query = 'select BaseTbl.userId, BaseTbl.email, BaseTbl.name as name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role,BaseTbl.status from tbl_users  BaseTbl left join  tbl_roles  Role on Role.roleId = BaseTbl.roleId where BaseTbl.isDeleted = "0" and BaseTbl.roleId != "1" and BaseTbl.status = "APPROVAL" or BaseTbl.status = "BLOCKED" order by BaseTbl.userId desc';
        return $this->db->query($query);
       /* $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name as name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role,BaseTbl.status');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText2 . "%'
            OR  BaseTbl.name  LIKE '%" . $searchText2 . "%'
            OR  BaseTbl.mobile  LIKE '%" . $searchText2 . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->where("BaseTbl.status = 'APPROVAL' or BaseTbl.status = 'BLOCKED'");
        $this->db->order_by('BaseTbl.userId', 'asc');
        $this->db->limit($pages, $segments);
        $query = $this->db->get();

        $result = $query->result();
        return $result;*/
    }
    public function adminapprove($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return true;
    }

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    public function getYear()
    {
        $this->db->select("date_format(createdDtm,'%Y') as date");
        $this->db->from('pets');
        $this->db->group_by("date_format(createdDtm,'%Y')");
        $query = $this->db->get();

        return $query->result();
    }
    public function getBreed()
    {
        $this->db->select("Type");
        $this->db->from('pets');
        $this->db->group_by("Type");
        $query = $this->db->get();

        return $query->result();
    }
    public function getMonth()
    {
        $this->db->select("COUNT(`p`.`name`) AS `total`,
          `ap`.`Status` AS `Status`,DATE_FORMAT(ap.`approved_date`,'%M') AS month");
        $this->db->from("adoptpet as ap");
        $this->db->join("pets as p", "ap.pet_id=p.id");
        $this->db->group_by("DATE_FORMAT(ap.`approved_date`,'%M')");

        $query = $this->db->get();

        return $query->result();
    }
    public function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();

        return $query->result();
    }
    public function getPetType()
    {
        $this->db->select('*');
        $this->db->from('pet_type');

        $this->db->group_by('name');
        $query = $this->db->get();

        return $query->result();
    }
    public function getPetAge()
    {

        $this->db->select('*');
        $this->db->from('age');
        $this->db->group_by('name');
        $query = $this->db->get();

        return $query->result();
    }
    public function getPetBreed()
    {
        $this->db->select('*');
        $this->db->from('breed');
        $this->db->group_by('name');
        $query = $this->db->get();

        return $query->result();
    }
    public function getPetColor()
    {
        $this->db->select('*');
        $this->db->from('color');
        $this->db->group_by('name');
        $query = $this->db->get();

        return $query->result();
    }
    public function getPetSize()
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->group_by('name');
        $query = $this->db->get();

        return $query->result();
    }
    public function getLogs($logid)
    {
        $this->db->select('*');
        $this->db->from('cruelty_actions');
        $this->db->join('pet_cruelty', 'pet_cruelty.id = cruelty_actions.id', 'inner');
        $this->db->where('cruelty_actions.id', $logid);
        $this->db->order_by('cruelty_actions.date', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
        public function getreasons($userId)
    {
        $this->db->select('*');
        $this->db->from('reported_users');
        $this->db->where('reported_user_id', $userId);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    public function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("isDeleted", 0);
        if ($userId != 0) {
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    public function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    public function addNewPet($data)
    {
        if (!$this->db->insert('pets', $data)) {
            return false;
        }else{
            return true;
        }
    }

    public function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }
    public function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->row();
    }

    public function getAdopterInfo($userId)
    {
        $this->db->select('*');
        $this->db->from('adopter');
        $this->db->where('id', $userId);
        $query = $this->db->get();

        return $query->row();
    }
    public function getAdoptionInfo($id)
    {
        $this->db->select('*');
        $this->db->from('adoption_req');
        $this->db->where("id='$id'");
        $query = $this->db->get();

        return $query->row();
    }
      public function getDeniedInfo($id)
    {
        $this->db->select('*');
        $this->db->from('adoption_denied');
        $this->db->where("id='$id'");
        $query = $this->db->get();

        return $query->row();
    }
    public function getAdopterAnswers($adoptid)
    {
        $this->db->select('*');
        $this->db->from('adoptpet');
        $this->db->join('pets', 'pets.id = adoptpet.pet_id');
        $this->db->where("adoptpet.pet_id='$adoptid' and adoptpet.Status='Pending' OR adoptpet.Status='FOR APPROVAL OF CITY VET'");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
       public function getDeniedAdopterAnswers($adoptid)
    {
        $this->db->select('*');
        $this->db->from('adoptpet');
        $this->db->join('pets', 'pets.id = adoptpet.pet_id');
        $this->db->where("adoptpet.pet_id='$adoptid' and adoptpet.Status='Denied' OR adoptpet.Status='FOR APPROVAL OF CITY VET'");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPetInfo($userId)
    {
        $this->db->select('pets.id,pets.pet_img,pets.name,pets.type,pets.breed,pets.gender,pets.color,pets.age,pets.size,Concat(adopter.Fname," ",adopter.Lname) as Owner');
        $this->db->from('pets');

        $this->db->join('adopter', 'adopter.id = pets.Owner');
        $this->db->where('pets.id', $userId);
        $query = $this->db->get();

        return $query->row();
    }
    public function getCrueltyInfo($userId)
    {
        $this->db->select('pet_cruelty.id as pet_id,adopter.Fname,adopter.Mname,adopter.Lname,adopter.Email,adopter.Contact,pet_cruelty.category,pet_cruelty.offender_name,pet_cruelty.offender_capt,pet_cruelty.address,pet_cruelty.description,pet_cruelty_files.pc_name,pet_cruelty.posted_date,adopter.HAddress,pet_cruelty.Remarks');
        $this->db->from('pet_cruelty');
        $this->db->join('adopter', 'adopter.id=pet_cruelty.adopter_id', 'inner');
        $this->db->join('pet_cruelty_files', 'pet_cruelty_files.pc_id=pet_cruelty.pc_file_id', 'inner');
        $this->db->order_by('pet_cruelty.id', 'ASC');
        $this->db->where('pet_cruelty.id', $userId);

        $query = $this->db->get();

        return $query->row();
    }
    public function getCrueltyVids($userId)
    {
        $this->db->select('pet_cruelty.id as pet_id,pet_cruelty_files.pc_name');
        $this->db->from('pet_cruelty');
        $this->db->join('adopter', 'adopter.id=pet_cruelty.adopter_id', 'inner');
        $this->db->join('pet_cruelty_files', 'pet_cruelty_files.pc_id=pet_cruelty.pc_file_id', 'inner');
        $this->db->order_by('pet_cruelty.id', 'ASC');
        $this->db->where("pet_cruelty.id='$userId' and pet_cruelty_files.`pc_name`LIKE'%.mp4%'");

        $query = $this->db->get();

        return $query->result();
    }

    public function getCrueltyImgs($userId)
    {
        $this->db->select('pet_cruelty.id as pet_id,pet_cruelty_files.pc_name');
        $this->db->from('pet_cruelty');
        $this->db->join('adopter', 'adopter.id=pet_cruelty.adopter_id', 'inner');
        $this->db->join('pet_cruelty_files', 'pet_cruelty_files.pc_id=pet_cruelty.pc_file_id', 'inner');
        $this->db->order_by('pet_cruelty.id', 'ASC');
        $this->db->where("pet_cruelty.id='$userId' and pet_cruelty_files.`pc_name`LIKE'%.jpg%'");

        $query = $this->db->get();

        return $query->result();
    }
    public function updateremarks($petid, $reason, $ctrl_id, $status)
    {
        $data = array('id' => $ctrl_id,
            'date' => date('Y-m-d H:i:s'),
            'updates' => 'Status: ' . $status . ' - ' . $reason,
        );
        $data2 = array('Actions' => $ctrl_id,
            'Remarks' => $status,
            'remarks_update_date' => date('Y-m-d H:i:s'),

        );
        $this->db->insert('cruelty_actions', $data);
        $this->db->where('id', $ctrl_id);
        $this->db->update('pet_cruelty', $data2);
        return true;
    }
    public function finalremarks($petid, $reason, $ctrl_id)
    {
        $data = array('id' => $ctrl_id,
            'date' => date('Y-m-d H:i:s'),
            'update' => $reason,
        );
        $data2 = array('Remarks' => 'Completed',
            'remarks_update_date' => date('Y-m-d H:i:s'),

        );
        $this->db->insert('cruelty_actions', $data);
        $this->db->where('id', $ctrl_id);
        $this->db->update('pet_cruelty', $data2);
        return true;
    }
    public function revertremarks($petid, $adminname)
    {

        $data = array('Remarks' => 'Pending',
            'remarks_update_date' => date('Y-m-d H:i:s'),
            'OIC' => $adminname,
        );

        $this->db->where('id', $petid);
        $this->db->update('pet_cruelty', $data);

        return true;
    }
    public function checkpassword($email, $pass)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.name, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.email', $email);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        $user = $query->row();

        if (!empty($user)) {
            if (verifyHashedPassword($pass, $user->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    public function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return true;
    }

 


    public function update_adoption_status($data, $adoption_id)
    {
         $this->db->where('id', $adoption_id);
         if ($this->db->update('adoptpet', $data)) {
            return true;
         }else{
             return false;
         }
    }

    public function update_pet_status($adoption_status,$adoption_id)
    {
        $query = "Update pets set Status='$adoption_status',approved_date=CURRENT_DATE  where id= (Select  ap.pet_id from adoptpet ap where ap.id=$adoption_id)";
         if ($this->db->query($query)) {
            return true;
         }else{
             return false;
         }
    }
      public function updatePet($Status, $adoptid)
    {
        $query = "update pets set Status='$Status' where id='$adoptid'";
        return $this->db->query($query);
        return true;
    }

    //reports

    //Adopted Pets report
    //Select p.type,p.Breed,count(p.Breed) as 'pet_count' from pets p where p.Status = 'Approved' and (p.approved_date BETWEEN '2019-02-01' and '2019-02-07') GROUP By p.Breed

    //Users
    //select a.Status, count(a.Status) as 'status_count' from adopter a where (a.status_update BETWEEN '' and '') and a.Status != 'n/a' GROUP by a.Status 

    //Pet Cruelty
    public function editAdopter($Status, $userId)
    {
         $query = "update adopter set Status='$Status' where id='$userId'";
        return $this->db->query($query);
   
        return true;
    }
    public function editAdoptpet($useranswer, $pet_id)
    {
        $this->db->where('pet_id', $pet_id);
        $this->db->update('adoptpet', $useranswer);
        return true;
    }
    public function blockadopter($userInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('adopter', $userInfo);
        return true;
    }

    public function editpet($data, $petid)
    {
        if (!$this->db->where('id', $petid)) {
            return true;
        } else {
            if (!$this->db->update('pets', $data)) {
                return false;
            } else {
                return true;
            }
        }

    }



    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    public function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }

    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    public function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        $user = $query->result();

        if (!empty($user)) {
            if (verifyHashedPassword($oldPassword, $user[0]->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    public function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    public function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if ($userId >= 1) {
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    public function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if ($userId >= 1) {
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    public function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }

    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    public function getUserInfWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function data_dashboard()
    {
        $query = "Select t1.pc,t2.pets,t3.pendingusers,t4.pendingadoption from (Select count(*) as pc from pet_cruelty pc where pc.Remarks='Pending' or pc.Remarks='For Verification') as t1, (Select count(*) as pets from pets p inner join adopter a on a.id=p.owner where p.Status <> 'testing') as t2, (Select count(*) as pendingusers from adopter a where a.Status='Not Screened by The City Vet Office') as t3, (Select count(*) as pendingadoption from adoptpet ap inner join pets p on p.id=ap.pet_id inner join adopter a on a.id=ap.adopter_id where p.Status='Pending' and ap.Status='Pending' and p.Owner='1') as t4";
        return $this->db->query($query)->result();
    }

    public function get_selected_adoption_request_info($adoption_id)
    {
        $query = 'Select * from adoptpet where id='.$adoption_id;
        return $this->db->query($query);
    }

    public function get_selected_adoption_request_adopter($adoption_id)
    {
        $query = 'SELECT a.* from adopter a inner join adoptpet ap on ap.adopter_id = a.id where ap.id='.$adoption_id;
        return $this->db->query($query);
    }
    public function get_selected_adoption_request_pets($adoption_id)
    {   
        $query = 'SELECT p.* from pets p inner join adoptpet ap  on p.id = ap.pet_id where ap.id='.$adoption_id;
        return $this->db->query($query);
    }

    public function get_selected_pet_info($pet_id)
    {
        $query = 'Select * from petinfo where id='.$pet_id;
        return $this->db->query($query);
    }
    public function get_pet_type_selection()
    {
        $query = "Select * from pet_type";
        return $this->db->query($query);
    }
    
    public function get_pet_timeline($pet_id)
    {
        $query = "Select (CASE WHEN ap.Status = 'Pending' THEN concat(a.Fname,' ',a.Lname, ' wants to adopt ',p.name ) WHEN ap.Status = 'APPROVED' THEN concat(a.Fname,' ',a.Lname, ' adopted ',p.name ) ELSE concat(a.Fname,' ',a.Lname, ' cancelled the adoption to ',p.name ) END) as log, ap.timestamp from adoptpet ap inner join adopter a on a.id=adopter_id inner join pets p on p.id=ap.pet_id where ap.pet_id=".$pet_id;
        return $this->db->query($query);
    }
    public function get_pet_comments($pet_id)
    {
        $query = "Select concat(a.Fname,' ',a.Lname) as sender_name, p.name, cd.message,cd.date_sent from comments c inner join comment_details cd on cd.comment_id = c.comment_id inner join pets p on p.id = c.pet_id inner join adopter a on a.id = cd.sender_id where p.id=".$pet_id;
        return $this->db->query($query);
    }
     public function get_user_timeline($userid)
    {
        $query = "SELECT CONCAT(a.`Fname`,' ',a.`Lname`) AS 'user', p.`name`,ap.`Status`, ap.`timestamp` FROM adoptpet ap INNER JOIN pets p ON p.`id`= ap.`pet_id` INNER JOIN adopter a ON a.`id`=ap.`adopter_id` WHERE ap.`adopter_id`=".$userid;
        return $this->db->query($query);
    }
    public function get_user_reports($userid)
    {
        $query = "  Select ri.*, concat(a.Fname,' ',a.Lname) as reported_user from reporter_info ri inner join adopter a on ri.reported_user_id = a.id where ri.reported_user_id = ".$userid;
        return $this->db->query($query);
    }
  
    public function get_user_information($user_id)
    {
        $query = "select * from users where id = ".$user_id;
        return $this->db->query($query);
    }

    public function update_user_status($userdata, $userid)
    {
        $this->db->where('id', $userid);
        $this->db->update('adopter', $userdata);
        return true;
    }
   
    public function get_pet_age_selection()
    {
        $query = "Select * from age";
        return $this->db->query($query);
    }
    public function get_pet_breed_selection()
    {
        $query = "Select * from breed";
        return $this->db->query($query);
    }
    public function get_pet_size_selection()
    {
        $query = "Select * from size";
        return $this->db->query($query);
    }
    public function get_pet_color_selection()
    {
        $query = "Select * from color";
        return $this->db->query($query);
    }
}