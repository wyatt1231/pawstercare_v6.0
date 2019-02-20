<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->library("pagination");

    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $filter = $this->input->post('filter');
        if ($filter == 'with') {
            $filter = "'For Approval of City Vet' OR status='Approved'";

        } else if ($filter == 'without') {
            $filter = 'For screening';
        } else if ($filter == 'all') {
            $filter = "'For Approval of City Vet' OR status='Approved' or status='For screening'";
        }


        $data['records'] = $this->user_model->userCount();
        $data['records2'] = $this->user_model->petdash();

        $data['records3'] = $this->user_model->adopterList($filter);
        $data['adopterdash'] = $this->user_model->adopterdash();
        $data['records5'] = $this->user_model->adopterListApproval();
        $data['records4'] = $this->user_model->crueltydash();
        $data['pet_report'] = $this->user_model->report();
        $data['pending'] = $this->user_model->pending();
        $this->global['pageTitle'] = 'PawsterCare : Dashboard';
        $this->loadViews("dashboard", $this->global, $data, null);
    }

    function get_data_dashboard()
    {
        $data = $this->user_model->data_dashboard();
        echo json_encode($data);
    }

    function report3jan()
    {
        $rows = '';
        $query = "SELECT breed,Total from january where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3feb()
    {
        $rows = '';
        $query = "SELECT breed,Total from february where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3mar()
    {
        $rows = '';
        $query = "SELECT breed,Total from march where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3apr()
    {
        $rows = '';
        $query = "SELECT breed,Total from april where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3may()
    {
        $rows = '';
        $query = "SELECT breed,Total from may where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3june()
    {
        $rows = '';
        $query = "SELECT breed,Total from june where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3jul()
    {
        $rows = '';
        $query = "SELECT breed,Total from july where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3aug()
    {
        $rows = '';
        $query = "SELECT breed,Total from august where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3sept()
    {
        $rows = '';
        $query = "SELECT breed,Total from september where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3oct()
    {
        $rows = '';
        $query = "SELECT breed,Total from october where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3nov()
    {
        $rows = '';
        $query = "SELECT breed,Total from november where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3dec()
    {
        $rows = '';
        $query = "SELECT breed,Total from december where type='Dog'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3jancat()
    {
        $rows = '';
        $query = "SELECT breed,Total from january where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3febcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from february where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3marcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from march where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3aprcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from april where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3maycat()
    {
        $rows = '';
        $query = "SELECT breed,Total from may where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3junecat()
    {
        $rows = '';
        $query = "SELECT breed,Total from june where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3julcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from july where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3augcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from august where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3septcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from september where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3octcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from october where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3novcat()
    {
        $rows = '';
        $query = "SELECT breed,Total from november where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report3deccat()
    {
        $rows = '';
        $query = "SELECT breed,Total from december where type='Cat'";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report42018()
    {
        $rows = '';
        $query = "SELECT COUNT(`p`.`name`) AS `total`,
        `ap`.`Status` AS `Status` FROM adoptpet AS ap JOIN pets AS p ON ap.pet_id=p.id WHERE DATE_FORMAT(ap.`timestamp`,'%Y')='2018' AND ap.`Status`<> 'REMOVED' AND ap.`Status`<> 'CANCELLED' GROUP BY ap.Status";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report42019()
    {
        $rows = '';
        $query = "SELECT COUNT(`p`.`name`) AS `total`,
        `ap`.`Status` AS `Status` FROM adoptpet AS ap JOIN pets AS p ON ap.pet_id=p.id WHERE DATE_FORMAT(ap.`timestamp`,'%Y')='2019' AND ap.`Status`<> 'REMOVED' AND ap.`Status`<> 'CANCELLED' GROUP BY ap.Status";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }
    function report42020()
    {
        $rows = '';
        $query = "SELECT COUNT(`p`.`name`) AS `total`,
        `ap`.`Status` AS `Status` FROM adoptpet AS ap JOIN pets AS p ON ap.pet_id=p.id WHERE DATE_FORMAT(ap.`timestamp`,'%Y')='2020' AND ap.`Status`<> 'REMOVED' AND ap.`Status`<> 'CANCELLED' GROUP BY ap.Status";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);

    }


    function report2()
    {


        $rows = '';
        $query = "SELECT `p`.`Breed` AS `Breed`,
        ROUND((((5 * SUM(`rp`.`ratings`)) / 5) / COUNT(`p`.`Breed`)),1) AS `total_rating` FROM `ratedpets` `rp` join pets  p on `rp`.`pet_id` = `p`.`id` where p.type='Dog' group by  `p`.`Breed`";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);
    }
    function report2Cat()
    {


        $rows = '';
        $query = "SELECT `p`.`Breed` AS `Breed`,
        ROUND((((5 * SUM(`rp`.`ratings`)) / 5) / COUNT(`p`.`Breed`)),1) AS `total_rating` FROM `ratedpets` `rp` join pets  p on `rp`.`pet_id` = `p`.`id` where p.type='Cat' group by  `p`.`Breed`";
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);
    }


    function chart()
    {
        $rows = '';
        $query = "Select p.name,CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1)) as 'average',count(r.pet_id) as 'count' from ratings r inner join pets p on p.id=r.pet_id inner join adopter a on a.id=p.Owner where p.Owner='1' GROUP by r.pet_id HAVING CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1)) < 2.5  order by (CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1))) desc ";

        //Select p.name,CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1)) as average, count(r.pet_id) as rate_count from ratings r inner join pets p on p.id=r.pet_id inner join adopter a on a.id=p.Owner where p.Owner='1' GROUP by r.pet_id
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
            $rows = $result->result_array();
        }
        print json_encode($rows);
    }

    function chart_pets()
    {
        $rows = '';

        $from =$_GET["from"];
        $to =$_GET["to"];
        
        if ($from && $to) {
            $from = date("Y-m-d", strtotime($from));
            $to = date("Y-m-d", strtotime($to));
            $query = "Select p.type,p.Breed,CAST(((count(p.Breed)/(Select count(*) from pets where Status = 'Approved'))*100) as DECIMAL(11,1)) as 'pet_count' from pets p where p.Status = 'Approved' and (p.approved_date BETWEEN '$from' and '$to') GROUP By p.Breed";
        }else{
            $query = "Select p.type,p.Breed,CAST(((count(p.Breed)/(Select count(*) from pets where Status = 'Approved'))*100) as DECIMAL(11,1)) as 'pet_count' from pets p where p.Status = 'Approved' GROUP By p.Breed";
        }
        $result = $this->db->query($query);
        $total_rows = $result->num_rows;
        if ($result) {
         $rows = $result->result_array();
     }
     echo json_encode($rows);



 }

 function chart_pet_data()
 {
     $rows = '';
     $from =$_GET["from"];
     $to =$_GET["to"];

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $report =$this->user_model->chart_pets_data($from,$to);

    $data = array();
    foreach ($report->result() as $r) {
        $data[] = array(
            $r->Breed,
            $r->pet_count ,
            $r->num_count,
        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $report->num_rows(),
        "recordsFiltered" => $report->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function chart_adopters()
{
    $rows = '';

    $from =$_GET["from"];
    $to =$_GET["to"];

    if ($from && $to) {
        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));
        $query = "select (CASE WHEN a.Status = 'Approved by City Vet' THEN 'Screened' WHEN a.Status = 'Not Screened by The City Vet Office' THEN 'Unscreened' ELSE 'Blocked' END) as 'Status' , CAST(((count(a.Status)/(select count(*) from adopter where Status != 'n/a'))*100) as DECIMAL(11,1)) as 'status_count' from adopter a where (a.status_update BETWEEN '$from' and '$to') and a.Status != 'n/a' GROUP by a.Status";
    }else{
        $query = "select (CASE WHEN a.Status = 'Approved by City Vet' THEN 'Screened' WHEN a.Status = 'Not Screened by The City Vet Office' THEN 'Unscreened' ELSE 'Blocked' END) as 'Status' , CAST(((count(a.Status)/(select count(*) from adopter where Status != 'n/a'))*100) as DECIMAL(11,1)) as 'status_count' from adopter a where a.Status != 'n/a' GROUP by a.Status";
    }
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    echo json_encode($rows);


}
function chart_adopters_data()
 {
     $rows = '';
     $from =$_GET["from"];
     $to =$_GET["to"];

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $report =$this->user_model->chart_adopter_data($from,$to);

    $data = array();
    foreach ($report->result() as $r) {
        $data[] = array(
            $r->Status,
            $r->status_count,
            $r->num_count,

        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $report->num_rows(),
        "recordsFiltered" => $report->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}
function chart_petcruelty()
{
    $rows = '';

    $from =$_GET["from"];
    $to =$_GET["to"];

    if ($from && $to) {
        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));
        $query = "Select (CASE WHEN pc.category = 'Maltreated' THEN 'Maltreated' WHEN pc.category = 'Tortured' THEN 'Tortured' WHEN pc.category = 'Neglect to provide adequate care' THEN 'Inadequate care' WHEN pc.category = 'Neglect to provide adequate sustenance or shelter' THEN 'Inadequate sustenance' WHEN pc.category = 'Illegal use of pets in research or experiments' THEN 'Illegal Experiments' WHEN pc.category = 'Killing' THEN 'Killing' ELSE 'Others' END) as 'category',CAST(((COUNT(pc.category)/(Select count(*) from pet_cruelty where Remarks = 'Completed')) * 100) as DECIMAL(11,1)) as 'pc_count' from pet_cruelty pc where pc.Remarks= 'Completed' and (pc.remarks_update_date >= '$from' and pc.remarks_update_date <= '$to') GROUP by pc.category";
    }else{
        $query = "Select (CASE WHEN pc.category = 'Maltreated' THEN 'Maltreated' WHEN pc.category = 'Tortured' THEN 'Tortured' WHEN pc.category = 'Neglect to provide adequate care' THEN 'Inadequate care' WHEN pc.category = 'Neglect to provide adequate sustenance or shelter' THEN 'Inadequate sustenance' WHEN pc.category = 'Illegal use of pets in research or experiments' THEN 'Illegal Experiments' WHEN pc.category = 'Killing' THEN 'Killing' ELSE 'Others' END) as 'category',CAST(((COUNT(pc.category)/(Select count(*) from pet_cruelty where Remarks = 'Completed')) * 100) as DECIMAL(11,1)) as 'pc_count' from pet_cruelty pc where pc.Remarks= 'Completed' GROUP by pc.category";
    }
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    echo json_encode($rows);


}
function chart_petcruelty_data()
 {
     $rows = '';
     $from =$_GET["from"];
     $to =$_GET["to"];

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $report =$this->user_model->chart_petcruelty_data($from,$to);

    $data = array();
    foreach ($report->result() as $r) {
        $data[] = array(
            $r->category,
            $r->pc_count,
            $r->pc_count,

        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $report->num_rows(),
        "recordsFiltered" => $report->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function chart1()
{
    $rows = '';
    $query = "Select p.name,CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1)) as 'average',count(r.pet_id) as 'count' from ratings r inner join pets p on p.id=r.pet_id inner join adopter a on a.id=p.Owner where p.Owner='1' GROUP by r.pet_id HAVING CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1)) > 3  order by (CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1))) desc ";

        //Select p.name,CAST( (sum(r.ratings)/count(r.pet_id)) AS DECIMAL(11,1)) as average, count(r.pet_id) as rate_count from ratings r inner join pets p on p.id=r.pet_id inner join adopter a on a.id=p.Owner where p.Owner='1' GROUP by r.pet_id
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}

function report52019()
{
    $rows = '';
    $query = "SELECT 
    COUNT(id) AS total,TYPE, DATE_FORMAT(createdDtm,'%Y') AS DATE FROM pets where DATE_FORMAT(createdDtm,'%Y')='2019' and TYPE<>''
    GROUP BY type ";
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}
function report52020()
{
    $rows = '';
    $query = "SELECT 
    COUNT(id) AS total,TYPE, DATE_FORMAT(createdDtm,'%Y') AS DATE FROM pets where DATE_FORMAT(createdDtm,'%Y')='2020' and TYPE<>''
    GROUP BY type ";
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}
function report52018()
{
    $rows = '';
    $query = "SELECT 
    COUNT(id) AS total,TYPE, DATE_FORMAT(createdDtm,'%Y') AS DATE FROM pets where DATE_FORMAT(createdDtm,'%Y')='2018' and TYPE<>''
    GROUP BY type ";
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}
function report72019()
{
    $rows = '';
    $query = "SELECT 
    COUNT(`pet_cruelty`.`id`) AS `total`,
    months.name,
    DATE_FORMAT(
    `pet_cruelty`.`posted_date`,
    '%Y'
    ) AS `date2`,
    pet_cruelty.`Remarks` 
    FROM
    months 
    JOIN pet_cruelty 
    ON DATE_FORMAT(
    `pet_cruelty`.`posted_date`,
    '%M'
    ) = months.name 
    WHERE DATE_FORMAT(posted_date, '%Y') = '2019' 
    OR DATE_FORMAT(posted_date, '%Y') IS NULL  GROUP BY pet_cruelty.`Remarks` ";
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}
function report72018()
{
    $rows = '';
    $query = "SELECT 
    COUNT(`pet_cruelty`.`id`) AS `total`,
    months.name,
    DATE_FORMAT(
    `pet_cruelty`.`posted_date`,
    '%Y'
    ) AS `date2`,
    pet_cruelty.`Remarks` 
    FROM
    months 
    JOIN pet_cruelty 
    ON DATE_FORMAT(
    `pet_cruelty`.`posted_date`,
    '%M'
    ) = months.name 
    WHERE DATE_FORMAT(posted_date, '%Y') = '2018' 
    OR DATE_FORMAT(posted_date, '%Y') IS NULL  GROUP BY pet_cruelty.`Remarks` ";
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}
function report72020()
{
    $rows = '';
    $query = "SELECT 
    COUNT(`pet_cruelty`.`id`) AS `total`,
    months.name,
    DATE_FORMAT(
    `pet_cruelty`.`posted_date`,
    '%Y'
    ) AS `date2`,
    pet_cruelty.`Remarks` 
    FROM
    months 
    JOIN pet_cruelty 
    ON DATE_FORMAT(
    `pet_cruelty`.`posted_date`,
    '%M'
    ) = months.name 
    WHERE DATE_FORMAT(posted_date, '%Y') = '2020' 
    OR DATE_FORMAT(posted_date, '%Y') IS NULL  GROUP BY pet_cruelty.`Remarks` ";
    $result = $this->db->query($query);
    $total_rows = $result->num_rows;
    if ($result) {
        $rows = $result->result_array();
    }
    print json_encode($rows);
}
function bybreed()
{

    $data['getbreed'] = $this->user_model->getBreed();
    $breed = $this->input->post('breed');
    $data['breed'] = $this->user_model->report6($breed);
    $this->global['pageTitle'] = 'PawsterCare : Reports';

    $this->loadViews("bybreed", $this->global, $data, null);

}
function reports()
{
    $this->global['pageTitle'] = 'PawsterCare : Reports';
    $this->loadViews("reports", $this->global);
}
function byyear()
{
    $year = $this->input->post('year');
    $data['total'] = $this->user_model->total();
    $data['pets'] = $this->user_model->report5($year);
    $data['year'] = $this->user_model->getYear();


    $this->global['pageTitle'] = 'PawsterCare : Reports';

    $this->loadViews("byyear", $this->global, $data, null);

}

function crueltyreport()
{

    $months = $this->input->post('mont');
    $years = $this->input->post('yer');
    $data['cruel'] = $this->user_model->report7($months, $years);
    $data['year'] = $this->user_model->getYear();


    $this->global['pageTitle'] = 'PawsterCare : Reports';

    $this->loadViews("cruelty_report", $this->global, $data, null);

}
function permonth()
{

    $data['getbreed'] = $this->user_model->getBreed();
    $breed = $this->input->post('breed');
    $month = $this->input->post('month');
//  $data['month']=$this->user_model->report3($month,$breed);


    $this->global['pageTitle'] = 'PawsterCare : Reports';

    $this->loadViews("permonth", $this->global, $data, null);

}
function lowest_rated()
{

    $data['low'] = $this->user_model->lowest_rated();


    $this->global['pageTitle'] = 'PawsterCare : Reports';

    $this->loadViews("lowest", $this->global, $data, null);

}
function approve_denied_reports()
{
    $months = $this->input->post('months');


    $data['getmonth'] = $this->user_model->getMonth();
    $data['adoption'] = $this->user_model->report4($months);

    $this->global['pageTitle'] = 'PawsterCare : Reports';

    $this->loadViews("approve_denied_reports", $this->global, $data, null);

}
/*function bymonth()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {       
            $month=$this->input->post('month');

            $this->global['pageTitle'] = 'PawsterCare : Reports';
            
            $this->loadViews("reports", $this->global, $data , NULL);
    }
}
     */
    /**
     * This function is used to load the user list
     */
    function adopterListing()
    {

        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->user_model->adopterListingCount($searchText);

        $returns = $this->paginationCompress("adopterListing  /", $count, 10);

        $data['adopters'] = $this->user_model->adopterListApproval($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'PawsterCare : Adopter List';

        $this->loadViews("adopter", $this->global, $data, null);

    }
    function ReportedAdopterList()
    {


        $data['reported'] = $this->user_model->ReportedAdopterList();

        $this->global['pageTitle'] = 'PawsterCare : Reported Adopter List';

        $this->loadViews("reportedadopter", $this->global, $data, null);

    }
    function reportedadopter_data()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $report = $this->user_model->ReportedAdopterList();
        $data = array();
        foreach ($report->result() as $r) {
            $data[] = array(
                $r->id,
                $r->name,
                $r->total_report,
                "<a class=\"btn btn-sm btn-info\"  title=\"More Info\"><i class=\"fa fa-eye\" id='btnpat'></i></a>",
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $report->num_rows(),
            "recordsFiltered" => $report->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    function adopterHistory()
    {
        $this->global['pageTitle'] = 'PawsterCare : Adopter History List';

        $this->loadViews("History", $this->global, null);

    }
    function deniedHistory()
    {
        $data['denied'] = $this->user_model->deniedHistory();

        $this->global['pageTitle'] = 'PawsterCare : Denied Adopter List';

        $this->loadViews("adoption_denied", $this->global, null);

    }
    function blockedadopter_data()
    {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $block = $this->user_model->adopterHistory();
        $data = array();
        foreach ($block->result() as $r) {
            $data[] = array(
                $r->id,
                $r->Name,
                $r->HAddress,
                $r->Birthdate,
                $r->CStatus,
                $r->OAddress,
                $r->Email,
                $r->Occupation,
                $r->Status,
                "<a class=\"btn btn-sm btn-info\"  title=\"More Info\"><i class=\"fa fa-eye\" id='btnpat'></i></a>",
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $block->num_rows(),
            "recordsFiltered" => $block->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    function deniedadopter_data()
    {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $deny = $this->user_model->deniedHistory();
        $data = array();
        foreach ($deny->result() as $r) {
            $data[] = array(
                $r->id,
                $r->Fname,
                $r->Mname,
                $r->Lname,
                $r->HAddress,
                $r->Birthdate,
                $r->CStatus,
                $r->OAddress,
                $r->Email,

                $r->Status,
                "<a class=\"btn btn-sm btn-info\"  title=\"More Info\"><i class=\"fa fa-eye\" id='btnpat'></i></a>",
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $deny->num_rows(),
            "recordsFiltered" => $deny->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    function adopterList()
    {
        $this->global['pageTitle'] = 'PawsterCare : Adopter List';
        $this->loadViews("adopterList", $this->global, null);
    }
    //MARC CHANGES
    function adopter_data()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $adopter = $this->user_model->adopterList();
        $data = array();
        foreach ($adopter->result() as $r) {
            $data[] = array(
                $r->id,
                $r->Name,
                $r->HAddress,
                $r->Birthdate,
                $r->CStatus,
                $r->OAddress,
                $r->Email,
                $r->Occupation,
                $r->Status
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $adopter->num_rows(),
            "recordsFiltered" => $adopter->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    function adopter_data_with_pets()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $adopter = $this->user_model->adopterListWithPets();
        $data = array();
        foreach ($adopter->result() as $r) {
            $data[] = array(
                $r->id,
                $r->Name,
                $r->HAddress,
                $r->Birthdate,
                $r->CStatus,
                $r->OAddress,
                $r->Email,
                $r->Occupation,
                $r->Status
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $adopter->num_rows(),
            "recordsFiltered" => $adopter->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    function adopter_data_without_pets()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $adopter = $this->user_model->adopterListWithoutPets();
        $data = array();
        foreach ($adopter->result() as $r) {
            $data[] = array(
                $r->id,
                $r->Name,
                $r->HAddress,
                $r->Birthdate,
                $r->CStatus,
                $r->OAddress,
                $r->Email,
                $r->Occupation,
                $r->Status
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $adopter->num_rows(),
            "recordsFiltered" => $adopter->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
 //MARC CHANGES

    public function selected_adoption_request_info()
    {   
       $adoption_id=$this->input->post('adoption_id');
       $room = $this->user_model->get_selected_adoption_request_info($adoption_id);
       $data = array();
       foreach ($room->result() as $r) {
           $data[] = array(
               $r->q1,
               $r->q2,
               $r->q3,
               $r->q4,
               $r->q5,
               $r->q6,
               $r->q7,
               $r->q8,
               $r->q9,
               $r->q10,
               $r->q11
           );
       }
       $output = array(
           "data" => $data
       );
       echo json_encode($output);
   }

   public function selected_adoption_request_adopter()
   {   
       $adoption_id=$this->input->post('adoption_id');
       $room = $this->user_model->get_selected_adoption_request_adopter($adoption_id);
       $data = array();
       foreach ($room->result() as $r) {
           $data[] = array(
               $r->id,
               $r->owner_img,
               $r->Fname,
               $r->Mname,
               $r->Lname,
               $r->Gender,
               $r->HAddress,
               $r->Birthdate,
               $r->CStatus,
               $r->OAddress,
               $r->Email,
               $r->Contact,
               $r->Occupation,
               $r->Salary,
               $r->Status
           );
       }
       $output = array(
           "data" => $data
       );
       echo json_encode($output);
   }

   public function selected_adoption_request_pets()
   {   
       $adoption_id=$this->input->post('adoption_id');
       $room = $this->user_model->get_selected_adoption_request_pets($adoption_id);
       $data = array();
       foreach ($room->result() as $r) {
           $data[] = array(
               $r->id,
               $r->pet_img,
               $r->name,
               $r->type,
               $r->Breed,
               $r->gender,
               $r->color,
               $r->age,
               $r->size,
           );
       }
       $output = array(
           "data" => $data
       );
       echo json_encode($output);
   }

   function adoption_requests_data()
   {

       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));
       $pets = $this->user_model->adoption_requests_data();
       $data = array();
       foreach ($pets->result() as $r) {
           $data[] = array(
               $r->id,
               $r->name,
               $r->adopter_name,
               $r->Status,
               $r->timestamp
           );
       }
       $output = array(
           "draw" => $draw,
           "recordsTotal" => $pets->num_rows(),
           "recordsFiltered" => $pets->num_rows(),
           "data" => $data,
       );
       echo json_encode($output);
   }

   function adoption_requests_data_pending()
   {

       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));
       $pets = $this->user_model->adoption_requests_data_pending();
       $data = array();
       foreach ($pets->result() as $r) {
           $data[] = array(
               $r->id,
               $r->name,
               $r->adopter_name,
               $r->Status,
               $r->timestamp
           );
       }
       $output = array(
           "draw" => $draw,
           "recordsTotal" => $pets->num_rows(),
           "recordsFiltered" => $pets->num_rows(),
           "data" => $data,
       );
       echo json_encode($output);
   }

   function adoption_requests_data_approved()
   {

       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));
       $pets = $this->user_model->adoption_requests_data_approved();
       $data = array();
       foreach ($pets->result() as $r) {
           $data[] = array(
               $r->id,
               $r->name,
               $r->adopter_name,
               $r->Status,
               $r->timestamp
           );
       }
       $output = array(
           "draw" => $draw,
           "recordsTotal" => $pets->num_rows(),
           "recordsFiltered" => $pets->num_rows(),
           "data" => $data,
       );
       echo json_encode($output);
   }

   function adoption_requests_data_denied()
   {

       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));
       $pets = $this->user_model->adoption_requests_data_denied();
       $data = array();
       foreach ($pets->result() as $r) {
           $data[] = array(
               $r->id,
               $r->name,
               $r->adopter_name,
               $r->Status,
               $r->timestamp
           );
       }
       $output = array(
           "draw" => $draw,
           "recordsTotal" => $pets->num_rows(),
           "recordsFiltered" => $pets->num_rows(),
           "data" => $data,
       );
       echo json_encode($output);
   }


   function pet_data()
   {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $pets = $this->user_model->petListing();
    $data = array();
    foreach ($pets->result() as $r) {
        $data[] = array(
            $r->id,
            $r->name,
            $r->Owner,
            $r->type,
            $r->Breed,
            $r->average_rating,
        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $pets->num_rows(),
        "recordsFiltered" => $pets->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function pet_data_high()
{

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $pets = $this->user_model->petListHigh();
    $data = array();
    foreach ($pets->result() as $r) {
        $data[] = array(
            $r->id,
            $r->name,
            $r->Owner,
            $r->type,
            $r->Breed,
            $r->average_rating,
        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $pets->num_rows(),
        "recordsFiltered" => $pets->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function pet_data_low()
{

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $pets = $this->user_model->petListLow();
    $data = array();
    foreach ($pets->result() as $r) {
        $data[] = array(
            $r->id,
            $r->name,
            $r->Owner,
            $r->type,
            $r->Breed,
            $r->average_rating,
        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $pets->num_rows(),
        "recordsFiltered" => $pets->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function petListing()
{

    $data['types'] = $this->user_model->getPetType();

    $this->global['pageTitle'] = 'PawsterCare: Pet List';

    $this->loadViews("petlist", $this->global, $data, null);

}

function adoption_requests()
{

    $data['types'] = $this->user_model->getPetType();

    $this->global['pageTitle'] = 'PawsterCare: Adoption Requests';

    $this->loadViews("adoption_requests", $this->global, $data, null);

}



function userListing()
{
    if ($this->isAdmin() == true) {
        $this->loadThis();
    } else {

        $data['records'] = $this->user_model->userListing();

        $data['roles'] = $this->user_model->getUserRoles();
        $this->global['pageTitle'] = 'PawsterCare : Administrators';

        $this->loadViews("users", $this->global, $data, null);
    }
}
function admin_data()
{

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $admin = $this->user_model->userListing();
    $data = array();
    foreach ($admin->result() as $r) {
        $data[] = array(
            $r->userId,
            $r->name,
            $r->email,
            $r->mobile,
            $r->role,
            $r->createdDtm,
            "<a class=\"btn btn-sm btn-danger\"  title=\"Block\"><i class=\"fa fa-ban\" id='btnpat'></i></a>",



        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $admin->num_rows(),
        "recordsFiltered" => $admin->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}
function adminapproval_data()
{

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $admin = $this->user_model->Approval();
    $data = array();
    foreach ($admin->result() as $r) {
        $data[] = array(
            $r->userId,
            $r->email,
            $r->name,
            $r->role,
            $r->status,


            "<a class=\"btn btn-sm btn-danger\"  title=\"Approve\"><i class=\"fa fa-ban\" id='btnpat'></i></a>",



        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $admin->num_rows(),
        "recordsFiltered" => $admin->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function crueltyListing()
{

    $data['records'] = $this->user_model->crueltyListing();

    $data['pending'] = $this->user_model->pending();
    $data['taken'] = $this->user_model->taken();
    $data['all'] = $this->user_model->all();
    $data['today'] = $this->user_model->today();

    $this->global['pageTitle'] = 'PawsterCare : Pet Cruelty Listing';

    $this->loadViews("petCruelty", $this->global, $data, null);

}
function crueltyListing_data()
{

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $report = $this->user_model->crueltyListing();
    $data = array();
    foreach ($report->result() as $r) {
        $data[] = array(
            $r->pet_id,
            $r->Fname . '' .
            $r->Mname . '' .
            $r->Lname,
            $r->category,
            $r->Remarks,
            $r->posted_date,
            "<a class=\"btn btn-sm btn-info\"  title=\"More Info\"><i class=\"fa fa-eye\" id='btnpat'></i></a>",



        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $report->num_rows(),
        "recordsFiltered" => $report->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function crueltyListingComp_data()
{

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $report = $this->user_model->crueltyListingComp();
    $data = array();
    foreach ($report->result() as $r) {
        $data[] = array(
            $r->pet_id,
            $r->Fname . '' .
            $r->Mname . '' .
            $r->Lname,
            $r->category,
            $r->Remarks,
            $r->posted_date,
            "<a class=\"btn btn-sm btn-info\"  title=\"More Info\"><i class=\"fa fa-eye\" id='btnpat'></i></a>",



        );
    }
    $output = array(
        "draw" => $draw,
        "recordsTotal" => $report->num_rows(),
        "recordsFiltered" => $report->num_rows(),
        "data" => $data,
    );
    echo json_encode($output);
}

function crueltyCompListing()
{

    $data['records'] = $this->user_model->crueltyListing();

    $data['pending'] = $this->user_model->pending();
    $data['taken'] = $this->user_model->taken();
    $data['all'] = $this->user_model->all();
    $data['today'] = $this->user_model->today();

    $this->global['pageTitle'] = 'PawsterCare : Pet Cruelty Listing';

    $this->loadViews("petcrueltycomp", $this->global, $data, null);

}
function userCount()
{

    $searchText = $this->security->xss_clean($this->input->post('searchText'));
    $data['searchText'] = $searchText;

    $this->load->library('pagination');

    $count = $this->user_model->userListingCount($searchText);

    $returns = $this->paginationCompress("userListing  /", $count, 10);

    $data['counts'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);

    $this->global['pageTitle'] = 'PawsterCare : User Listing';

    $this->loadViews("dashboard", $this->global, $data, null);

}

function Approval()
{
    if ($this->isAdmin() == true) {
        $this->loadThis();
    } else {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->user_model->userListingCountApproval($searchText);

        $returns = $this->paginationCompress("userListingCountApproval  /", $count, 5);

        $data['datas'] = $this->user_model->Approval($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'PawsterCare : Adopter Approval List';

        $this->loadViews("Approval", $this->global, $data, null);
    }
}


    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'PawsterCare : Add New User';

            $this->loadViews("addNew", $this->global, $data, null);
        }
    }
    function addNewPet()
    {

        $this->load->model('user_model');
        $data['roles'] = $this->user_model->getUserRoles();
        $data['types'] = $this->user_model->getPetType();
        $data['colors'] = $this->user_model->getPetColor();
        $data['sizes'] = $this->user_model->getPetSize();
        $data['breeds'] = $this->user_model->getPetBreed();
        $this->global['pageTitle'] = 'PawsterCare : Add New Pet';

        $this->loadViews("addNewPet", $this->global, $data, null);

    }
    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            echo ("true");
        } else {
            echo ("false");
        }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

            if ($this->form_validation->run() == false) {
                $this->addNew();
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array(
                    'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $roleId, 'name' => $name,
                    'mobile' => $mobile, 'createdBy' => $this->vendorId, 'createdDtm' => date('Y-m-d H:i:s'), 'status' => 'APPROVAL'
                );

                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New User created successfully');
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }

                redirect('addNew');
            }
        }
    }

    public function do_upload()
    {


            /*$this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('pettype','Pet type','trim|required|max_length[128]');
            $this->form_validation->set_rules('petbreed','Pet Breed','required|max_length[20]');
            $this->form_validation->set_rules('petowner','Pet Owner','trim|required|max_length[20]');
            $this->form_validation->set_rules('userfile','Pet Image','trim|required|max_length[20]');
            if($this->form_validation->run() == FALSE)
            {
                $this->addPet();
            }
            else
            {*/
                $config['upload_path'] = './pets';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '10000';
                $config['max_height'] = '10000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];

                }


                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('pettype')));
                $password = $this->input->post('petbreed');
                $roleId = $this->input->post('petowner');
                $post_image = $this->input->post('userfile');

                $userInfo = array(
                    'pet_img' => $post_image, 'type' => $email, 'Breed' => $password, 'Owner' => $roleId, 'name' => $name,
                    'createdBy' => $this->vendorId, 'createdDtm' => date('Y-m-d H:i:s')
                );

                $this->load->model('user_model');
                $result = $this->user_model->addNewPet($userInfo, $post_image);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New Pet Updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'Pet Update failed');
                }

                redirect('petlist');



            }

            function addqweqwPet()

            {
                $config['upload_path'] ='./pets';
                $config['allowed_types'] ='gif|jpg|png';
                $config['max_size'] ='2048';
                $config['max_width'] ='10000';
                $config['max_height'] ='10000';

                $this->load->library('upload',$config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'no_image.png';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];

                }
                if($this->isAdmin() == TRUE)
                {
                    $this->loadThis();
                }
                else
                {
                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
                    $this->form_validation->set_rules('pettype','Type','trim|required|max_length[128]');
                    $this->form_validation->set_rules('Breed','Breed','required|max_length[20]');
                    $this->form_validation->set_rules('color','Color','trim|required|max_length[128]');
                    $this->form_validation->set_rules('size','Size','required|max_length[20]');
                    $this->form_validation->set_rules('type','Type','required|max_length[20]');
                    $this->form_validation->set_rules('gender','Gender','required|max_length[20]');
                    $this->form_validation->set_rules('age','Age','required|max_length[20]');
                    $this->form_validation->set_rules('pet_img','Pet_Picture','trim|required|max_length[128]');
                    $this->form_validation->set_rules('petowner','Pet Owner','trim|required|max_length[20]');
                    $this->form_validation->set_rules('userfile','Pet Image','trim|required|max_length[20]');




                    $name =$this->input->post('fname');
                    $email = $this->input->post('type');
                    $password = $this->input->post('Breed');
                    $roleId = $this->input->post('petowner');
                    $color = $this->input->post('color');
                    $size = $this->input->post('size');
                    $age = $this->input->post('Age');
                    $gender = $this->input->post('gender');




                    $userInfo = array('pet_img'=>$post_image,'type'=>$email, 'Breed'=>$password, 'Owner'=>$roleId, 'name'=> $name,'gender'=>$gender,'color'=>$color,'age'=>$age,'size'=>$size,
                       'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));

                    $this->load->model('user_model');
                    $result = $this->user_model->addNewPet($userInfo);

                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'New Pet Updated successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Pet Update failed');
                    }

                    redirect('petlist');

                }
            }
            function addPet()


            {
                $config['upload_path'] ='./pets/';
                $config['allowed_types'] ='gif|jpg|png';
                $config['max_size'] ='2048';
                $config['max_width'] ='10000';
                $config['max_height'] ='10000';

                $this->load->library('upload',$config);

                if(!$this->upload->do_upload('petimage')){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'no_image.png';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['petimage']['name'];
                }
                if ($this->isAdmin() == true) {
                    $this->loadThis();
                } else {
                //fname=wqeqw&type=1&age=1&breed=1&size=1&color=1&gender=Male


                    $name = $this->input->post('fname');
                    $type = $this->input->post('type');
                    $breed = $this->input->post('breed');
                    $color = $this->input->post('color');
                    $size = $this->input->post('size');
                    $age = $this->input->post('age');
                    $gender = $this->input->post('gender');
                    $this->load->model('user_model');


                    $result = $this->user_model->addNewPet(array(
                        "pet_img" => $post_image,
                        "name" => $name,
                        "type" => $type,
                        "breed" => $breed,
                        "gender" => $gender,
                        "color" => $color,
                        "age" => $age,
                        "size" => $size,
                        "Owner" => "1",
                        "vaccinated" => "Yes",
                        "status" => "Pending"
                    ));
                    if ($result == true) {
                        $this->session->set_flashdata('success', 'New Pet Updated successfully');
                    } else {
                        $this->session->set_flashdata('error', 'Pet Update failed');
                    }

               // redirect('petlist');

                }
            }

            function editOld($userId = null)
            {

                if ($userId == null) {
                    redirect('userListing');
                }

                $data['roles'] = $this->user_model->getUserRoles();
                $data['userInfo'] = $this->user_model->getUserInfo($userId);

                $this->global['pageTitle'] = 'PawsterCare : Edit User';

                $this->loadViews("editOld", $this->global, $data, null);

            }
            function editPet($userId = null)
            {

                $data['userInfo'] = $this->user_model->getPetInfo($userId);
                $data['types'] = $this->user_model->getPetType();
                $data['colors'] = $this->user_model->getPetColor();
                $data['sizes'] = $this->user_model->getPetSize();
                $data['breeds'] = $this->user_model->getPetBreed();
                $data['ages'] = $this->user_model->getPetAge();
                $data['petlogs'] = $this->user_model->petlogs($userId);
                $this->global['pageTitle'] = 'PawsterCare : Edit Pet';
                $this->loadViews("editPet", $this->global, $data, null);
            }

            function editPetCrueltyViews($userId = null, $petid = null)
            {
                $logid = $this->input->post("petid");
                $data["info"] = $this->user_model->getUserInfoWithRole($this->vendorId);

                if ($userId == null) {
                    redirect('crueltyListing');
                }

                /*  $data['roles'] = $this->user_model->getUserRoles();*/
                $data['userInfo'] = $this->user_model->getCrueltyInfo($userId);
                $data['vids'] = $this->user_model->getCrueltyVids($userId);
                $data['imgs'] = $this->user_model->getCrueltyImgs($userId);
                $data['log'] = $this->user_model->getLogs($userId);

                $this->global['pageTitle'] = 'PawsterCare : Pet Cruelty';

                $this->loadViews("petCrueltyView", $this->global, $data, null);

            }
            function finalremark($petid = null, $reason = null, $ctrl_id = null)
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('final', 'final', 'required|max_length[128]');
                $petid = $this->input->post("petid");
                $ctrl_id = $this->input->post("petid");

                $reason = $this->input->post("final");

                if ($petid == null) {
                    redirect('petCruelty');
                }

                /*  $data['roles'] = $this->user_model->getUserRoles();*/
                if ($this->form_validation->run() == false) {
                    redirect(base_url() . 'petCrueltyView/' . $petid);
                } else {
                    $data['remark'] = $this->user_model->finalremarks($petid, $reason, $ctrl_id);
                    $data['petid'] = $this->user_model->updateremarks($petid, $reason, $ctrl_id);
                    $data['log'] = $this->user_model->getLogs($petid);
                    $this->global['pageTitle'] = 'PawsterCare : Pet Cruelty View';

                    $this->loadViews("petCrueltyView", $this->global, $data, null);
                    redirect(base_url() . 'petCrueltyView/' . $petid);
                }


            }
            function updateremarks($petid = null, $reason = null, $ctrl_id = null, $status = null)
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('reasons', 'Reasons', 'required|max_length[128]');
                $petid = $this->input->post("petid");
                $ctrl_id = $this->input->post("petid");

                $reason = $this->input->post("reasons");
                $status = $this->input->post("status");

                if ($petid == null) {
                    redirect('PetCrueltyList');
                }

                /*  $data['roles'] = $this->user_model->getUserRoles();*/
                if ($this->form_validation->run() == false) {
                    redirect(base_url() . 'petCrueltyView/' . $petid);
                } else {
                    $data['petid'] = $this->user_model->updateremarks($petid, $reason, $ctrl_id, $status);
                    $data['log'] = $this->user_model->getLogs($petid);
                    $this->global['pageTitle'] = 'PawsterCare : Pet Cruelty View';

                    $this->loadViews("petCrueltyView", $this->global, $data, null);
                    redirect(base_url() . 'petCrueltyView/' . $petid);
                }


            }
            function revertremarks($petid = null, $email = null, $pass = null, $adminname = null)
            {


                $email = strtolower($this->security->xss_clean($this->input->post('mail')));
                $pass = $this->input->post('pass');

                $result = $this->user_model->checkpassword($email, $pass);

                $petid = $this->input->post("petid");
                $adminname = $this->input->post('adminname');

                if ($petid == null) {
                    redirect('petCruelty');
                }

                /*  $data['roles'] = $this->user_model->getUserRoles();*/
                if (!empty($result)) {
                    $data['petid'] = $this->user_model->revertremarks($petid, $adminname);
                    $this->global['pageTitle'] = 'PawsterCare : Pet Cruelty';

                    $this->loadViews("petCrueltyView", $this->global, $data, null);
                    redirect(base_url() . 'petCrueltyView/' . $petid);
                } else {
                    $this->session->set_flashdata('error', 'Password is Incorrect');
                    redirect(base_url() . 'petCrueltyView/' . $petid);
                }



/*
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');
         */



        }

        function editOldAdopter($adopter_id = null)
        {

            if ($adopter_id == null) {
                redirect('adopterListing');
            }
            
            /*  $data['roles'] = $this->user_model->getUserRoles();*/
            $data['userInfo'] = $this->user_model->getAdopterInfo($adopter_id);

            $this->global['pageTitle'] = 'PawsterCare : Edit Adopter';

            $this->loadViews("editAdopter", $this->global, $data, null);

        }

        function adoption_requestset($id = null, $status = null, $pet_id = null)
        {


            if ($id == null) {
                redirect('adopterListing');
            }

            $status = 'FOR APPROVAL';
            $adoptid = $this->input->post('adoptid');
            /*  $data['roles'] = $this->user_model->getUserRoles();*/
            $data['userInfo'] = $this->user_model->getAdoptionInfo($id);
            $data['useranswer'] = $this->user_model->getAdopterAnswers($adoptid, $status);
            $this->global['pageTitle'] = 'PawsterCare : Adoption Request';
            $this->loadViews("adoption_request", $this->global, $data, null);

        }

        function deniedadoption($id = null, $status = null, $pet_id = null)
        {


            if ($id == null) {
                redirect('adopterListing');
            }

            $status = 'FOR APPROVAL';
            $adoptid = $this->input->post('adoptid');
            /*  $data['roles'] = $this->user_model->getUserRoles();*/
            $data['userInfo'] = $this->user_model->getDeniedInfo($id);
            $data['useranswer'] = $this->user_model->getDeniedAdopterAnswers($adoptid, $status);
            $this->global['pageTitle'] = 'PawsterCare : Denied Adoption';
            $this->loadViews("adoption_request", $this->global, $data, null);

        }
        function DeniedAdoption_info($petid = null)
        {


            if ($petid == null) {
                redirect('adopterListing');
            }



            /*  $data['roles'] = $this->user_model->getUserRoles();*/

            $data['useranswer'] = $this->user_model->getDeniedAdopterAnswers($petid);
            $this->global['pageTitle'] = 'PawsterCare : Adoption Request';
            $this->loadViews("DeniedAdoptionInfo", $this->global, $data, null);

        }
        function adoption_info($petid = null)
        {


            if ($petid == null) {
                redirect('adopterListing');
            }



            /*  $data['roles'] = $this->user_model->getUserRoles();*/

            $data['useranswer'] = $this->user_model->getAdopterAnswers($petid);
            $this->global['pageTitle'] = 'PawsterCare : Adoption Request';
            $this->loadViews("adoption_info", $this->global, $data, null);

        }
        function adoption_requestget()
        {



            $userId = $this->input->post('userId');
            $pet_id = $this->input->post('petid');



            $Status = ucwords(strtolower($this->security->xss_clean($this->input->post('Status'))));



            $userInfo = array();


            $userInfo = array('Status' => $Status);
            $useranswer = array('Status' => $Status);

            $result = $this->user_model->editAdopter($userInfo, $userId);
            $result2 = $this->user_model->editAdoptpet($useranswer, $pet_id);
            if ($result == true) {
                $this->session->set_flashdata('success', 'Adoption Request updated successfully');
                redirect('adopterList');
            } else {
                $this->session->set_flashdata('error', 'Adoption Request update failed');
            }




        }
        function editPets()
        {

            $config['upload_path'] = './pets/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = true;
            $config['max_size'] = '2048';
            $config['max_width'] = '10000';
            $config['max_height'] = '10000';
            $this->load->library('upload');
            $this->upload->initialize($config);
            $petimage=$this->input->post('petimage');

            if (!$this->upload->do_upload("petimage")) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'no_image.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['petimage']['name'];
            }

            $petid = $this->input->post('petid');
            $petname = $this->input->post('petname');
            $petowner = $this->input->post('petowner');
            $pettype = $this->input->post('pettype');
            $petbreed = $this->input->post('petbreed');
            $petsize = $this->input->post('petsize');
            $petgender = $this->input->post('petgender');
            $petcolor = $this->input->post('petcolor');
            $petage = $this->input->post('petage');
            if (!$petid) {
                echo "qewqeqwewq";
            }else{


                if ($post_image != 'no_image.png') {
                    $result = $this->user_model->editpet(array(
                        "pet_img" => $post_image,
                        "name" => $petname,
                        "type" => $pettype,
                        "Breed" => $petbreed,
                        "gender" => $petgender,
                        "color" => $petcolor,
                        "age" => $petage,
                        "size" => $petsize
                    ), $petid);
                } else {
                    $result = $this->user_model->editpet(array(
                        "name" => $petname,
                        "type" => $pettype,
                        "Breed" => $petbreed,
                        "gender" => $petgender,
                        "color" => $petcolor,
                        "age" => $petage,
                        "size" => $petsize
                    ), $petid);
                }

                echo json_encode(array("success" => $result));
            }
        }
        function editPetCrueltyView()
        {

            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('image', 'Image', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('posted_date', 'Posted_Date', 'trim|required|max_length[128]');

          /*  $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');*/

            if ($this->form_validation->run() == false) {
                $this->editOld($userId);
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $pet_img = ucwords(strtolower($this->security->xss_clean($this->input->post('image'))));
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $description = ucwords(strtolower($this->security->xss_clean($this->input->post('description'))));
                $address = ucwords(strtolower($this->security->xss_clean($this->input->post('address'))));
                $posted_date = ucwords(strtolower($this->security->xss_clean($this->input->post('posted_date'))));

                $userInfo = array();


                $userInfo = array(
                    'name' => $fname, 'Image' => $pet_img, 'title' => $title,
                    'description' => $description, 'address' => $address, 'posted_date' => $posted_date
                );


                $result = $this->user_model->getCrueltyInfo($userInfo, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                    redirect('crueltyList');
                } else {
                    $this->session->set_flashdata('error', 'User update failed');
                }


            }

        }
        function updateAdoption()
        {
            $adoptid = $this->input->post('adopterid');
            $userId = $this->input->post('userId');
            $petid = $this->input->post('adoptid');
            $Status = $this->input->post('Status_');

            $result = $this->user_model->updateAdoption($Status, $adoptid);
            $result = $this->user_model->editAdopter($Status, $userId);
            $result = $this->user_model->updatePet($Status, $petid);
            if ($result == true) {
                $this->session->set_flashdata('success', 'User updated successfully');
                redirect('adopterList');
            } else {
                $this->session->set_flashdata('error', 'User update failed');
            }


        }
        function editAdopter()
        {
            $userId = $this->input->post('userId');
            $pet_id = $this->input->post('petid');

            $Status = $this->input->post('Status');

            $userInfo = array();

            $userInfo = array('Status' => $Status);
            $useranswer = array('Status' => $Status);

            $result = $this->user_model->editAdopter($Status, $userId);
            // $result2=$this->user_model->editAdoptpet($useranswer, $pet_id);
            // if($result == true)
            // {
            //     $this->session->set_flashdata('success', 'User updated successfully');
            //     redirect('adopterList');
            // }
            // else
            // {
            //     $this->session->set_flashdata('error', 'User update failed');
            // } 
            if ($result == true) {
                $this->session->set_flashdata('success', 'User updated successfully');
                redirect('adopterList');
            } else {
                $this->session->set_flashdata('error', 'User update failed');
            }

        }
        function reporteduser($adopter_id = null)
        {

            if ($adopter_id == null) {
                redirect('adopterListing');
            }
            
            /*  $data['roles'] = $this->user_model->getUserRoles();*/
            $data['userInfo'] = $this->user_model->getAdopterInfo($adopter_id);
            $data['log'] = $this->user_model->getreasons($adopter_id);
            $this->global['pageTitle'] = 'PawsterCare : Reported Adopter';

            $this->loadViews("reporteduser", $this->global, $data, null);

        }
        function blockadopter()
        {



            $userId = $this->input->post('adopterid');



            $Status = 'Blocked';





            $userInfo = array('Status' => $Status);

            $result = $this->user_model->blockadopter($userInfo, $userId);

            if ($result == true) {
                $this->session->set_flashdata('success', 'User updated successfully');
                redirect('adopterList');
            } else {
                $this->session->set_flashdata('error', 'User update failed');
            }



        }

        function adminapprove()
        {
            if ($this->isAdmin() == true) {
                $this->loadThis();
            } else {



                $userId = $this->input->post('approveuser');



                $Status = 'ACTIVE';





                $userInfo = array('Status' => $Status);

                $result = $this->user_model->adminapprove($userInfo, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                    redirect('userListing');
                } else {
                    $this->session->set_flashdata('error', 'User update failed');
                }


            }
        }

        function adminblock()
        {
            if ($this->isAdmin() == true) {
                $this->loadThis();
            } else {


               $userId = $this->input->post('user');



               $Status = 'BLOCKED';





               $userInfo = array('Status' => $Status);

               $result = $this->user_model->adminblock($userInfo, $userId);

               if ($result == true) {
                $this->session->set_flashdata('success', 'User updated successfully');
                redirect('userListing');
            } else {
                $this->session->set_flashdata('error', 'User update failed');
            }


        }
    }


    function editUser()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|max_length[20]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

            if ($this->form_validation->run() == false) {
                $this->editOld($userId);
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array();

                if (empty($password)) {
                    $userInfo = array(
                        'email' => $email, 'roleId' => $roleId, 'name' => $name,
                        'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s')
                    );
                } else {
                    $userInfo = array(
                        'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $roleId,
                        'name' => ucwords($name), 'mobile' => $mobile, 'updatedBy' => $this->vendorId,
                        'updatedDtm' => date('Y-m-d H:i:s')
                    );
                }

                $result = $this->user_model->editUser($userInfo, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'User update failed');
                }

                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if ($this->isAdmin() == true) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => true)));
            } else {
                echo (json_encode(array('status' => false)));
            }
        }
    }

    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'PawsterCare : 404 - Page Not Found';

        $this->loadViews("404", $this->global, null, null);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = null)
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $userId = ($userId == null ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;

            $this->load->library('pagination');

            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress("login-history/" . $userId . "/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'PawsterCare : User Login History';

            $this->loadViews("loginHistory", $this->global, $data, null);
        }
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;

        $this->global['pageTitle'] = $active == "details" ? 'PawsterCare : My Profile' : 'PawsterCare : Change Password';
        $this->loadViews("profile", $this->global, $data, null);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

        if ($this->form_validation->run() == false) {
            $this->profile($active);
        } else {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));

            $userInfo = array('name' => $name, 'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->editUser($userInfo, $this->vendorId);

            if ($result == true) {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile update failed');
            }

            redirect('profile/' . $active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == false) {
            $this->profile($active);
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/' . $active);
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password update successful');
                } else {
                    $this->session->set_flashdata('error', 'Password update failed');
                }

                redirect('profile/' . $active);
            }
        }
    }

    public function selected_pet_info()
    {   
        $pet_id=$this->input->post('petid');
        $room = $this->user_model->get_selected_pet_info($pet_id);
        $data = array();
        foreach ($room->result() as $r) {
            $data[] = array(
                $r->id,
                $r->pet_img,
                $r->name,
                $r->type,
                $r->Breed,
                $r->gender,
                $r->color,
                $r->age,
                $r->size,
                $r->owner_id,
                $r->owner_name
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function pet_timeline()
    {
        $pet_id=$this->input->post('petid');

        if ($pet_id) {
            $room = $this->user_model->get_pet_timeline($pet_id);
            $data = array();
            foreach ($room->result() as $r) {
                $data[] = array(
                    $r->log,
                    $r->timestamp
                );
            }
            $output = array(
                "data" => $data
            );
            echo json_encode($output);
        }
    }
    public function pet_comment()
    {
        $pet_id=$this->input->post('petid');

        if ($pet_id) {
            $room = $this->user_model->get_pet_comments($pet_id);
            $data = array();
            foreach ($room->result() as $r) {
                $data[] = array(
                    $r->sender_name,
                    $r->name,
                    $r->message,
                    $r->date_sent
                );
            }
            $output = array(
                "data" => $data
            );
            echo json_encode($output);
        }
    }


    public function selected_user_information()
    {
        $userid= $this -> input -> post('userid');
        
        if ($userid) {
            $room = $this->user_model->get_user_information($userid);
            $data = array();
            foreach ($room->result() as $r) {
                $data[] = array(
                    $r->id,
                    $r->owner_img,
                    $r->Name,
                    $r->HAddress,
                    $r->Birthdate,
                    $r->CStatus,
                    $r->OAddress,
                    $r->Email,
                    $r->Occupation,
                    $r->Status,
                    $r->Gender,
                    $r->Salary,
                    $r->report_count
                );
            }
            $output = array(
                "data" => $data
            );
            echo json_encode($output);
        }

    }

    public function selected_user_timeline()
    {
        $userid= $this -> input -> post('userid');
        
        if ($userid) {
            $room = $this->user_model->get_user_timeline($userid);
            $data = array();
            foreach ($room->result() as $r) {
                $data[] = array(
                    $r->user,
                    $r->name,
                    $r->Status,
                    $r->timestamp
                );
            }
            $output = array(
                "data" => $data
            );
            echo json_encode($output);
        }

    }

    public function selected_user_reports()
    {
        $userid= $this -> input -> post('userid');
        
        if ($userid) {
            $room = $this->user_model->get_user_reports($userid);
            $data = array();
            foreach ($room->result() as $r) {
                $data[] = array(
                    $r->report_id,
                    $r->reported_user,
                    $r->reporter_name,
                    $r->reason,
                    $r->report_date
                );
            }
            $output = array(
                "data" => $data
            );
            echo json_encode($output);
        }

    }

    function update_user_status()
    {
        $userid = $this->input->post('userid');
        $userstatus = $this->input->post('userstatus');
        
        if ($userid && $userstatus) {
            $userdata = array(
                "Status" => $userstatus,
                "status_update" => date('Y/m/d H:i:s')
            );

            $result = $this->user_model->update_user_status($userdata, $userid);

            if ($result) {
                $response["success"] = true;
            }else{
                $response["success"] = false;
            }
            echo json_encode($response);
        }
        
        

    }


    function update_adoption_status()
    {
        $adoption_id = $this->input->post('adoption_id');
        $adoption_status = $this->input->post('adoption_status');
        $date_today = date('Y/m/d H:i:s');
        if ($adoption_id && $adoption_status) {
            $userdata = array(
                "Status" => $adoption_status,
                'approved_date' => date('Y/m/d H:i:s')
            );


            $result = $this->user_model->update_adoption_status($userdata, $adoption_id);
            $result = $this->user_model->update_pet_status($adoption_status, $adoption_id);
            if ($result) {
                $response["success"] = true;
            }else{
                $response["success"] = false;
            }
            echo json_encode($response);
        }
        
        

    }
    public function pet_type_selection()
    {
        $room = $this->user_model->get_pet_type_selection();
        $data = array();
        foreach ($room->result() as $r) {
            $data[] = array(
                $r->id,
                $r->name
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function pet_age_selection()
    {
        $room = $this->user_model->get_pet_age_selection();
        $data = array();
        foreach ($room->result() as $r) {
            $data[] = array(
                $r->id,
                $r->name
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function pet_breed_selection()
    {
        $room = $this->user_model->get_pet_breed_selection();
        $data = array();
        foreach ($room->result() as $r) {
            $data[] = array(
                $r->id,
                $r->name
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function pet_size_selection()
    {
        $room = $this->user_model->get_pet_size_selection();
        $data = array();
        foreach ($room->result() as $r) {
            $data[] = array(
                $r->id,
                $r->name
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function pet_color_selection()
    {
        $room = $this->user_model->get_pet_color_selection();
        $data = array();
        foreach ($room->result() as $r) {
            $data[] = array(
                $r->id,
                $r->name
            );
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }

    public function user_filter()
    {

        $filter1=$this->input->post('filter1');
        $filter2=$this->input->post('filter2');

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        //$user = $this->user_model->adopterListWithWihoutPetsRegistered();

        if ($filter1 == "withwithout" && $filter2 == "registered") {
            $user = $this->user_model->adopterListWithWihoutPetsRegistered();
        }elseif ($filter1 == "withwithout" && $filter2 == "unscreened"){
            $user = $this->user_model->adopterListWithWihoutPetsUnscreened();
        }elseif ($filter1 == "withwithout" && $filter2 == "screened"){
            $user = $this->user_model->adopterListWithWihoutPetsScreened();
        }elseif ($filter1 == "withwithout" && $filter2 == "blocked"){
            $user = $this->user_model->adopterListWithWihoutPetsBlocked();
        }elseif ($filter1 == "with" && $filter2 == "registered"){
            $user = $this->user_model->adopterListWithPetsRegistered();
        }elseif ($filter1 == "with" && $filter2 == "unscreened"){
            $user = $this->user_model->adopterListWithPetsUnscreened();
        }elseif ($filter1 == "with" && $filter2 == "screened"){
            $user = $this->user_model->adopterListWithPetsScreened();
        }elseif ($filter1 == "with" && $filter2 == "blocked"){
            $user = $this->user_model->adopterListWithPetsBlocked();
        }elseif ($filter1 == "without" && $filter2 == "registered"){
            $user = $this->user_model->adopterListWithoutPetsRegistered();
        }elseif ($filter1 == "without" && $filter2 == "unscreened"){
            $user = $this->user_model->adopterListWithWihoutPetsUnscreened();
        }elseif ($filter1 == "without" && $filter2 == "screened"){
            $user = $this->user_model->adopterListWithoutPetsScreened();
        }else{
            $user = $this->user_model->adopterListWithWihoutPetsBlocked();
        }
        $data = array();
        foreach ($user->result() as $r) {
            $data[] = array(
                $r->id,
                $r->Name,
                $r->HAddress,
                $r->Email,
                $r->report_count,
                $r->Status
            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $user->num_rows(),
            "recordsFiltered" => $user->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}




?>