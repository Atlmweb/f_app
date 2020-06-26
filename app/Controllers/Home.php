<?php namespace App\Controllers;


use App\Models\UsersModel;
use Auth_lib;

class Home extends BaseController
{
    public $menus;
    public $church;

    public function __construct(){
        $this->session = \Config\Services::session();

        $data['menu_items'] =  ['home','jesus','services','gallery','contact'];
        $this->church = $_SESSION['logged_in']['church_id'] ?? '';


        if(isset($_SESSION['logged_in'])){
            //load admin stuff
            if($_SESSION['logged_in']['level']==='ADMIN'){
                $data['menu_items']['admin']    =  ['church_service','givings','members','first_timers','new_converts','f_school'];
            }

            //load added stuff for logged in user: member and admin
            if(($_SESSION['logged_in']['level']==='MEMBER') || ($_SESSION['logged_in']['level'] ==='ADMIN')){
                $data['menu_items']['accounts'] =  ['dashboard','give','givings','password_change','edit_profile','logout'];
            }

        }

        $this->menus = $data;

    }

    public function dashboard(){
        $where = ['church_id'=>$this->church];
        $q = ask_db('service_title, service_date, stream_url,service_notes','ff_services',$where,1,'','service_date');

        $data = $this->menus;

        if(!empty($q)) {
            $date = nice_date($q[0]['service_date']);
            $data['service_title']  = $q[0]['service_title'];
            $data['service_date']   = $date;
            //$data['stream_url']     = youtube($q[0]['stream_url']);
            $data['stream_url']     = youtube('https://youtu.be/a5M6_9iMU24');
            $data['service_notes']  = $q[0]['service_notes'];
        }

        $data['title'] = $_SESSION['logged_in']['name'] ?? '';

        echo view('partials/header',$data);
        echo view('dashboard',$data);
        echo view('partials/footer',$data);
    }

	public function index()
	{


        $date = new \DateTime(date('Y-m-d'));
        $day = $date->format('D');

        echo view('partials/header.php',$this->menus);
        //no slider on service days
        if($day ==='Wed' || $day === 'Fri' || $day === 'Sun'){
            echo view('pages/live_service.php');
            echo view('pages/home.php');
        } else {
            echo view('pages/slider.php');
            echo view('pages/home.php');
            echo view('pages/live_service.php');
        }

        echo view('partials/footer.php');
	}



	public function login(){
	    $user = $this->request->getPost('username',FILTER_SANITIZE_EMAIL);
	    $pass = $this->request->getPost('password');

	    $auth = new Auth_lib();

	    if ($auth->check_username($user)) {

           if ($auth->verify_password($user, $pass)) {
              //password is correct, login user
               $auth->grant_access($user);


               return redirect('/');
           } else {
               dump('Login error');
           }
        } else {
	        $_SESSION['info'] = lang('Front.user_not_exist');

	        return redirect('register');
        }
    }

    public function logout(){
	    session_destroy();

	    return redirect('/');
    }



    public function register(){
	    dump($_SESSION);
	    dump($_POST);
	  //  echo view('pages/register');
        $m = new UsersModel();

        $p = password_hash($this->request->getPost('password'),1);
        $s = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'),0,10);
        $random = md5(time()).$s;

        $data = [
            'church_id'   => $this->request->getPost('church_id'),
            'customer_id' => $this->request->getPost('customer_id'),
            'title'       => $this->request->getPost('title'),
            'first_name'  => $this->request->getPost('first_name',FILTER_SANITIZE_STRING),
            'last_name'   => $this->request->getPost('last_name',FILTER_SANITIZE_STRING),
            'phone_number'   => $this->request->getPost('phone_number'),
            'email_address'  => $this->request->getPost('email_address',FILTER_SANITIZE_EMAIL),
            'password'   => $p,
            'random_key'     => $random,

        ];

        $id = $m->insert($data);
        if($id){

            //send welcome email
            $_SESSION['success'] = lang('Front.reg_success');
        }
        dump($data);

        dump($m->errors());

    }



	//--------------------------------------------------------------------

}
