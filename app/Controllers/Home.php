<?php namespace App\Controllers;


use App\Models\ServicesModel;
use App\Models\UsersModel;
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
                $data['menu_items']['admin']    =  ['new_service','service_list','users','first_timers','new_converts','f_school'];
            }


        }

        $this->menus = $data;

    }





    public function thank_you(){
        $data = $this->menus;
       // echo 'Thank you very much';
        echo view('partials/header',$data);
        echo view('pages/table');
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

    public function service_list(){
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open' => '<table class="table table-responsive table-striped table-bordered table-hover" id="example" >'
        ];

        $table->setTemplate($template);
        $table->setHeading(['ID','Title','Service date', 'URL','Manage']);

        $q = ask_db('service_id,service_title,service_date,stream_url','ff_services',['church_id'=>$_SESSION['logged_in']['church_id']]);


        foreach($q as $key => $val) {
            $manage = anchor('new_service/'.$val['service_id'],'<i class="fa fa-pencil-square"></i>');
            $manage .= ' | ';
            $manage .= anchor('service_list/'.$val['service_id'],'<i class="fa fa-trash"></i>');
            $table->addRow($val['service_id'], $val['service_title'], $val['service_date'], $val['stream_url'],$manage);
        }



        $data['table'] =  $table->generate();

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
        $name .= ','.$i[2];

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
                'citation'     =>$i[3],
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
        $q = ask_db('service_id,service_title, service_date, stream_url,service_notes','ff_services',$where,1,'','service_date');



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

	public function index()
	{

        $q = ask_db('service_id,service_title, service_date, stream_url,service_notes','ff_services',[],'','','service_date');
        $data['stream_url'] = youtube($q[0]['stream_url']);

        $date = new \DateTime(date('Y-m-d'));
        $day = $date->format('D');

        echo view('partials/header.php',$this->menus);
        //no slider on service days
        if($day ==='Wed' || $day === 'Fri' || $day === 'Sun'){
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
                    $_SESSION['error']='Login error, you need to re-register with the same email address if you had an account before';
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
