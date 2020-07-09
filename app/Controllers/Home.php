<?php namespace App\Controllers;


use App\Models\ServicesModel;
use App\Models\UsersModel;
use App\Models\TransactionsModel;
use Auth_lib;

class Home extends BaseController
{
    public $menus;
    public $church;


    public function __construct(){
        $this->session = \Config\Services::session();

        $data['menu_items'] =  ['home','jesus','videos','get_involved','contact'];
        $this->church = $_SESSION['logged_in']['church_id'] ?? '';


        if(isset($_SESSION['logged_in'])){

            //load added stuff for logged in user: member and admin
            if(($_SESSION['logged_in']['level']==='MEMBER') || ($_SESSION['logged_in']['level'] ==='ADMIN')){
                $data['menu_items']['accounts'] =  ['dashboard','givings','password_change','edit_profile','logout'];
            }


            //load admin stuff
            if($_SESSION['logged_in']['level']==='ADMIN'){
                $data['menu_items']['admin']    =  ['new_service','service_list','users','payments','first_timers','new_converts','f_school'];
            }


        }

        $this->menus = $data;

    }

    public function check_existing_record($ref){
        $q = ask_db('txn_id','ff_transactions',['reference'=>"'$ref'"]);
        return (!empty($q)) ? TRUE: FALSE;
    }


    public function get_records(){
        $db = new TransactionsModel();
        //specific to ID coming from live.christembassynungua.org
        $match = [
            '99999995' =>'1', //offering
            '99999992' =>'2', //tithe
            '99999991' =>'3', //first fruit
            '9999996' =>'4', //special
            '9999999' =>'5', //thanks giving
            '1' =>'6', //healing school
            '2' =>'7', //rhapsody
            '20' =>'8', //programs
            '14'=>'10', //bible
            '16'=>'11', //LMAM
            '5'=>'12',//Inner city
            '10'=>'13',//LWsat
            '38'=>'15', //CGI

        ];

        $data = [
            'email'=> str_encode($_SESSION['logged_in']['email'])
        ];
        $res = $this->curl_post('https://loveworldims.org/grow/get_payment_history',$data);
        $a = json_decode($res,1);

        d($a);
       

        foreach($a as $key => $val){
           $ref = ($val['ref']!== NULL && $val['ref'] !=='')? $val['ref'] : $val['descr'];
            //insert record
            $data = [
                'church_id'    =>'237',
                'user_id'      =>$_SESSION['logged_in']['user_id'],
                'payment_date' =>$val['record_date'],
                'cat_id'       =>$match[$val['id']],
                'payment_mode' =>$val['payment_mode'],
                'currency'     =>$val['cur'],
                'amount'       =>$val['amt'],
                'reference'    =>$ref,
                'description'  =>$val['descr'],
                'citation'     =>'Imported Txn',
                'created_at'   =>date('Y-m-d H:i:s'),
            ];

            if($this->check_existing_record($ref)===FALSE) {

                $db->insert($data);
            }

        }

        return redirect('givings');

    
    }

    

    public function curl_post($url, $data,$json_encode_data = FALSE){
        
        $data = ($json_encode_data)?json_encode($data):$data;
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
    		CURLOPT_URL => $url,
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_CUSTOMREQUEST => "POST",
    		CURLOPT_POSTFIELDS => $data,
    		
    	));
    	$response = curl_exec($curl);
    	
    	if($err = curl_error($curl)){
    	    curl_close($curl);
    	    return "CURL Error : ".$err;
    	}else{
        	curl_close($curl);
        	return $response;
        }
    }





    public function thank_you(){
        $data = $this->menus;
        $data['title'] = 'Thank you very much for your seed sown!';
        $data['table'] = '<p><h3> Thank you for being an extension of God’s outstretched arm to the Nations of the world. </h3></p>

        <p>We pray that God will continue to give you seed to sow, bread for your food and He will surely multiply your seed sown and increase the fruits of your righteousness in Jesus Name.
        (2 Corinthians 9:10). Amen</p> ';

        //$arr = $_GET['resp'];
        //$str = '{"id":285849711,"txRef":"42-2-Tithe-A Thousand folds in Jesus name amen","flwRef":"FLWMM15940268326029119","orderRef":"URF_MMGH_1594026832440_282535","paymentPlan":null,"paymentPage":null,"createdAt":"2020-07-06T09:13:52.000Z","amount":230,"charged_amount":230,"status":"successful","IP":"154.160.23.42","currency":"GHS","appfee":5.75,"merchantfee":0,"merchantbearsfee":1,"customer":{"id":215553564,"phone":"0544296060","fullName":"Brother Aaron Kutin","customertoken":null,"email":"officialkutin@gmail.com","createdAt":"2020-07-06T09:13:52.000Z","updatedAt":"2020-07-06T09:13:52.000Z","deletedAt":null,"AccountId":72294},"entity":{"id":"NO-ENTITY"},"event.type":"MOBILEMONEYGH_TRANSACTION"}';
        

        //d(json_decode($str,1));

        echo view('partials/header',$data);
        echo view('partials/table',$data);
        echo view('partials/footer');
    }


    public function new_service(){
        if(count($_POST) > 7){

            //process form
           $m = new ServicesModel();
           $s= $m->save($_POST);

           //dump($_POST);

           dump($m->errors()); //exit();

           if(is_int($s)){
               $_SESSION['success'] = 'Service is succesfully Saved';
               //TODO email valid users
           }

           return redirect('service_list');
        }

        $data = $this->menus;

        $uri = service('uri');
        $id = $uri->getsegment('2');



        if($id){
            $data['record'] = ask_db('*','ff_services',['service_id'=>"'$id'"])[0];

        }



       echo view('partials/header',$data);
        echo view('pages/new_service',$data);
        echo view('partials/footer');
    }


    public function get_full_name($user_id){
        $q = ask_db('title,first_name,last_name','ff_users',['user_id'=>"'$user_id'"]);

        return isset($q[0]) ? $q[0]['title'].' '.$q[0]['first_name'].' '.$q[0]['last_name'] : 'Unknown Name';

    }

    public function get_giving_cat_name($cat_id){
        $q = ask_db('cat_name','ff_giving_cat',['cat_id'=>"'$cat_id'"]);
        return isset($q[0]) ? $q[0]['cat_name']: 'Unknown Category';
    }


    public function payments_table($user_id = NULL){
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open' => '<table class="table table-responsive table-striped table-bordered table-hover" id="example" >'
        ];

        $w = ($user_id !== NULL) ? ['user_id'=>$_SESSION['logged_in']['user_id']] : ['church_id'=>$_SESSION['logged_in']['church_id']];

        $table->setTemplate($template);

        if($user_id ===NULL){
            $table->setHeading(['ID','Date','Name','Amount', 'Purpose','Ref','Citation']);
        } else {
            $table->setHeading(['ID','Date','Amount', 'Purpose','Citation']);
        }


        $q = ask_db('txn_id,cat_id,user_id,payment_date,amount,currency,reference,description,citation','ff_transactions',$w);

        if(!empty($q)){
            foreach ($q as $key => $val){
                $desc = explode(',',$val['description']);
                if($val['citation']=='Imported Txn'){
                    $name = $this->get_full_name($val['user_id']);
                    $purpose = $this->get_giving_cat_name($val['cat_id']);
                } else {
                    $name = ($user_id !== NULL) ?$_SESSION['logged_in']['name']: $desc[0];
                    $purpose = $desc[1]??'';
                }




                $amount = $val['currency'].' '.$val['amount'];
                $date = nice_date($val['payment_date']);

                if($user_id ===NULL){
                    $table->addRow($val['txn_id'],$date,$name,$amount,$purpose,$val['reference'],$val['citation']);
                } else {
                    $table->addRow($val['txn_id'],$date,$amount,$purpose,$val['citation']);
                }

            }

        }

        $s = $table->generate();

        return $s;
    }

    public function payments(){



        $m = $this->get_seed_summary('month',TRUE);
        $y = $this->get_seed_summary('year',TRUE);

        //month summary
        $data['total_m'] = $m['total'];
        $data['summary_m'] = $m['summary'];

        //year summary
        $data['total_y'] = $y['total'];
        $data['summary_y'] = $y['summary'];



        $data['table'] =  $this->payments_table();
        $data['title']  = 'List of payments';


        echo view('partials/header',$this->menus);
        echo view('pages/seeds',$data);
        echo view('partials/footer');
    }

    public function users(){
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open' => '<table class="table table-responsive table-striped table-bordered table-hover" id="example" >'
        ];

        $table->setTemplate($template);
        $table->setHeading(['ID','Name','Email', 'Phone','Is active','Manage']);

        $q = ask_db('user_id,title,last_name,first_name,email_address,phone_number,is_active','ff_users');

        if(!empty($q)){
            foreach ($q as $val){
                $manage = manage_icons($val['user_id'],'register','delete','users');

                $name = $val['title'].' '.$val['first_name'].' '.$val['last_name'];
                $table->addRow($val['user_id'],$name,$val['email_address'],$val['phone_number'],$val['is_active'],$manage);
            }
        }

        $data['table'] =  $table->generate();

        $data['title']  = 'List of users';

        echo view('partials/header',$this->menus);
        echo view('partials/table', $data);
        echo view('partials/footer');


    }


    public function service_list(){
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open' => '<table class="table table-responsive table-striped table-bordered table-hover" id="example" >'
        ];

        $table->setTemplate($template);
        $table->setHeading(['ID','Title','Service date', 'URL','Manage']);

        $q = ask_db('service_id,service_title,service_date,stream_url','ff_services',['church_id'=>$_SESSION['logged_in']['church_id']]);


        foreach($q as $key => $val) {

            $manage = manage_icons($val['service_id'],'new_service','delete_service');
            $table->addRow($val['service_id'], $val['service_title'], $val['service_date'], $val['stream_url'],$manage);
        }





        $data['table'] =  $table->generate();
        $data['title'] = 'Service list';

        echo view('partials/header',$this->menus);
        echo view('partials/table', $data);
        echo view('partials/footer');
    }




    public function projects(){
        //
        $data = $this->menus;
        // echo 'Thank you very much';
        echo view('partials/header',$data);
        echo view('pages/projects');
        echo view('partials/footer');
    }

    public function contact(){

        if(count($_POST) > 4) {
            if($this->request->getPost('email',FILTER_VALIDATE_EMAIL)){

                $sender_name = $this->request->getPost('name');
                $sender_email = $this->request->getPost('email');
                $message = $this->request->getPost('phone').'<br/>';
                $message .= $this->request->getPost('subject').'<br/>';
                $message .= $this->request->getPost('message').'<br/>';

                $email = \Config\Services::email();

                $email->setFrom($sender_email, $sender_name);
                $email->setTo('info@christembassynungua.org');


                $email->setSubject('Live contact form');
                $email->setMessage($message);

                if($email->send()){
                    $_SESSION['success'] = 'Your mail sent successfully, you will hear from us shortly';

                }
                return redirect('contact');

            }
        } else {
            $data = $this->menus;

           echo view('partials/header',$data);
            echo view('pages/contact');
            echo view('partials/footer');
        }

    }


    public function videos(){

        $q = ask_db('service_id,service_title as title, service_date, stream_url,SUBSTRING(service_notes, 1, 100) AS summary','ff_services',[],100,'','service_date');


        //
        $data = $this->menus;
        $data['services'] = $q;

        // echo 'Thank you very much';
        echo view('partials/header',$data);
        echo view('pages/videos',$data);
        echo view('partials/footer');
    }




    public function process_seeds(){
        $db = \Config\Database::connect();

        //d(json_decode($_GET['resp'],1));
        $arr = json_decode($_GET['resp'],1);

        $i = explode('-',$arr['tx']['txRef']);
        $d = substr($arr['tx']['createdAt'],0,10);
        $cur = $arr['tx']['currency'];
        $amt = $arr['tx']['amount'];
        $ref = $arr['tx']['flwRef'];
        $name = $arr['tx']['customer.fullName'];
        $ds = explode('_',$i[2]);
        $name .= ','.$ds[0];

        if($arr['respcode']==='00' || $arr['tx']['status']==='successful') {

            $data = [
                'church_id'    =>'237',
                'user_id'      =>$i[0],
                'payment_date' =>$d,
                'cat_id'       =>$i[1],
                'payment_mode' =>'online',
                'currency'     =>$cur,
                'amount'       =>$amt,
                'reference'    =>$ref,
                'description'  =>$name,
                'citation'     =>$ds[1],
                'created_at'   =>date('Y-m-d H:i:s'),
            ];

            $db->table('ff_transactions')->insert($data);

            if(isset($_SESSION['logged_in']['user_id'])){
                return redirect('givings');
            } else {
                return redirect('thank_you');
            }

        } else {
            dump('Transaction not successful, pls try again');
        }
    }




    protected function get_seed_summary($range,$all=FALSE) : array{
        $arr = [];

        if($range === 'month'){
            $start = date('Y-m-01'); $end = date('Y-m-d');
        } elseif ($range === 'year') {
            $start = date('Y-01-01'); $end = date('Y-m-d');
        } else {
            exit('Unknown range');
        }

        $w = ["payment_date BETWEEN '$start' AND '$end'",'ff_transactions.cat_id'=>'ff_giving_cat.cat_id'];
        if($all === FALSE){
            $w['user_id'] = $_SESSION['logged_in']['user_id'];
        }

        //this month
        $summary = ask_db('SUM(amount) as tot,cat_name,ff_giving_cat.cat_id,ff_transactions.cat_id,currency','ff_transactions,ff_giving_cat',$w,'','ff_transactions.cat_id, currency');

        $total = array_sum(array_column($summary,'tot'));

        $arr['total'] = $total;
        $arr['summary'] = $summary;

        return $arr;


    }

    public function my_seeds(){
        $data = $this->menus;

        $m = $this->get_seed_summary('month');
        $y = $this->get_seed_summary('year');

        //month summary
        $data['total_m'] = $m['total'];
        $data['summary_m'] = $m['summary'];

        //year summary
        $data['total_y'] = $y['total'];
        $data['summary_y'] = $y['summary'];

        $data['title'] = 'My Seeds';
        $data['table'] = $this->payments_table($_SESSION['logged_in']['user_id']);




        echo view('partials/header',$this->menus);
        echo view('pages/seeds',$data);
        echo view('partials/footer');

    }

    public function all_seeds(){
        $data = $this->menus;

        $m = $this->get_seed_summary('month',TRUE);
        $y = $this->get_seed_summary('year',TRUE);

        //month summary
        $data['total_m'] = $m['total'];
        $data['summary_m'] = $m['summary'];

        //year summary
        $data['total_y'] = $y['total'];
        $data['summary_y'] = $y['summary'];



        echo view('partials/header',$this->menus);
        echo view('pages/all_seeds',$data);
        echo view('partials/footer');

    }


    public function dashboard(){
        $where = ['church_id'=>$this->church];
        $q = ask_db('service_id,service_title, service_date, stream_url,service_notes','ff_services',$where,1,'','updated_at');



        $data = $this->menus;

        if(!empty($q)) {
            $date                   = nice_date($q[0]['service_date']);
            $data['service_id']     = $q[0]['service_id'];
            $data['service_title']  = $q[0]['service_title'];
            $data['service_date']   = $date;
            $data['stream_url']     = youtube($q[0]['stream_url']);
            $data['service_notes']  = $q[0]['service_notes'];
            $_SESSION['service']    = $q[0]['service_id'];
        }

        $data['title'] = $_SESSION['logged_in']['name'] ?? '';

        echo view('partials/header',$data);
        echo view('dashboard',$data);
        echo view('partials/footer',$data);
    }


    public function video(){
        $uri = service('uri');
        $id = $uri->getsegment('2');

        $where = ['service_id'=>$id];
        $data = $this->menus;
        $q = ask_db('service_id,service_title, service_date, stream_url,service_notes','ff_services',$where);

        $data['stream_url'] = youtube($q[0]['stream_url']);
        $data['service_notes'] = $q[0]['service_notes'];

        echo view('partials/header',$data);
        echo view('pages/video_notes',$data);
        echo view('partials/footer',$data);

    }



	public function index()
	{

        $q = ask_db('service_id,service_title, DATE(service_date) as service_date, stream_url,service_notes','ff_services',[],'','','updated_at');
        $data['stream_url'] = youtube($q[0]['stream_url']);
        $data['title'] = $_SESSION['logged_in']['name']?? NULL;



        echo view('partials/header.php',$this->menus);
        //no slider on service days
        if($q[0]['service_date'] === date('Y-m-d')){
            echo view('pages/live_service.php',$data);
            echo view('pages/home.php');
        } else {
            echo view('pages/slider.php');
            echo view('pages/home.php');
            echo view('pages/live_service.php',$data);
        }

        echo view('partials/footer.php');
	}



	public function login(){
        if(isset($_POST['username'])){
            $user = $this->request->getPost('username',FILTER_SANITIZE_EMAIL);
            $pass = $this->request->getPost('password');
            $auth = new Auth_lib();

            if ($auth->check_username($user)) {

                if ($auth->verify_password($user, $pass)) {
                    //password is correct, login user
                    $auth->grant_access($user);


                    return redirect('dashboard');
                } else {
                    $_SESSION['error']='Login error, invalid username and password combination';
                    return redirect('login');
                }
            } else {
                $_SESSION['error'] = lang('User account does not exist');

                return redirect('register');
            }
        } else {
            echo view('partials/header',$this->menus);
            echo view('pages/login');
            echo view('partials/footer');
        }



    }

    public function logout(){
	    session_destroy();

	    return redirect('/');
    }


    public function activate_account(){
        //set is_admin to 1 on success
        $db      = \Config\Database::connect();
        $m = $db->table('ff_users');

        $uri = service('uri');
        $id = $uri->getsegment('2');

        $q = ask_db('user_id','ff_users',['random_key'=>"'$id'"]);

        if(!empty($q)){
            $data = ['is_active' =>'1'];

            $m->where('random_key', $id);
            $m->update($data);

            $_SESSION['success'] = 'Account is successfully activated';
        } else {
            $_SESSION['error'] = 'There was an error in activating your account, kindly respond to the activation email';
        }



        return redirect('login');


    }

    public function register(){

        if(count($_POST) > 7) {
            $m = new UsersModel();
            $p = password_hash($this->request->getPost('password'),1);
            $s = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'),0,10);
            $random = md5(time()).$s;

            $e = $this->request->getPost('email_address',FILTER_SANITIZE_EMAIL);
            $n = $this->request->getPost('title').' '.$this->request->getPost('first_name').' '.$this->request->getPost('last_name');

            $data = [
                'church_id'   => $this->request->getPost('church_id'),
                'customer_id' => $this->request->getPost('customer_id'),
                'title'       => $this->request->getPost('title'),
                'first_name'  => $this->request->getPost('first_name',FILTER_SANITIZE_STRING),
                'last_name'   => $this->request->getPost('last_name',FILTER_SANITIZE_STRING),
                'phone_number'   => $this->request->getPost('phone_number'),
                'email_address'  => $e,
                'password'   => $p,
                'random_key'     => $random,

            ];

            $id = $m->insert($data);
            if($id){

                //send welcome email

                $email = \Config\Services::email();

                $email->setFrom('info@christembassynungua.org', 'Christ Embassy, EWCA Zone 5');
                $email->setTo($e);

                $d['link'] = 'https://live.christembassynungua.org/activate_account/'.$random;
                $d['name'] = ucwords($n);
                $message = view('pages/welcome_email',$d);


                $email->setSubject('Account activation, Christ Embassy, EWCA Zone 5');
                $email->setMessage($message);

                if($email->send()){
                    $_SESSION['info'] = 'Your mail sent successfully, you will hear from us shortly';
                    $_SESSION['success'] = 'User registration succesful';


                }
            }


            return redirect('login');
        } else {
            echo view('partials/header',$this->menus);
            echo view('pages/register');
            echo view('partials/footer');
        }


    }

    public function comments()
    {

        $uri = service('uri');
        $id = $uri->getsegment('3');

        $w = ['service_id'=>$_SESSION['service'], "comment_id > $id"];
        $q = ask_db('comment_id as id,msg as comment,sender as name,created_at as date','ff_service_comment',$w,"100",'','comment_id','ASC');


        $html = '';

        foreach ($q as $com) {
            $html .= '<li id="'.$com['id'].'" class="message-list">
                            <h5><i class="fa fa-user-circle"></i>' . ucwords($com['name']) . '</h5>
                            <p>' . $com['comment'] . '</p>
                            <span class="text-muted text-gray">' . time_diff($com['date']) . '</span>
                        </li>';
        }

       echo $html;

    }

    public function post_comment(){
        $db = \Config\Database::connect();

        if($this->request->getPost('msg')===''){
            exit();
        }

        $data = [

            'sender'=>$this->request->getPost('name',FILTER_SANITIZE_STRING),
            'msg' =>$this->request->getPost('msg'),
            'service_id' =>$this->request->getPost('sid',FILTER_SANITIZE_NUMBER_INT),
            'created_at' =>date('Y-m-d H:i:s'),
        ];

        $db->table('ff_service_comment')->insert($data);

        echo json_encode($_POST);
    }




	//--------------------------------------------------------------------

}
