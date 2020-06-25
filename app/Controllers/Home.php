<?php namespace App\Controllers;


use Auth_lib;

class Home extends BaseController
{
    public $menus;

    public function __construct(){
        $this->session = \Config\Services::session();

        $data['menu_items'] =  ['home','jesus','services','gallery','contact'];


        if(isset($_SESSION['logged_in'])){
            //load admin stuff
            if($_SESSION['logged_in']['level']==='ADMIN'){
                $data['menu_items']['admin']    =  ['church_service','givings','members','first_timers','new_converts','f_school'];
            }

            //load added stuff for logged in user: member and dmin
            if(($_SESSION['logged_in']['level']==='MEMBER') || ($_SESSION['logged_in']['level'] ==='ADMIN')){


                $data['menu_items']['accounts'] =  ['give','givings','password_change','edit_profile','logout'];
            }


        }

        $this->menus = $data;



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

        $data = [
            'church_id' => $this->request->getPost('church_id'),
            'customer_id' => $this->request->getpost('customer_id'),
            'title' => $this->request->getpost('title'),
            'title' => $this->request->getpost('title'),
        ];

    }



	//--------------------------------------------------------------------

}
