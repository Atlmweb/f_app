<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
	    //$_SESSION['logged_in'] = 'yes';
	    $data['menu_items'] =  [
                                    'home',
                                    'jesus',
                                    'events',
                                    'contact',

                                ];

	    if(!isset($_SESSION['logged_in'])) {
            $data['menu_items']['accounts'] =  ['givings','password_change','edit_profile','logout'];
        }




        echo view('partials/header.php',$data);
        echo view('pages/slider.php');

        echo view('pages/home.php');
        echo view('pages/live_service.php');
        echo view('partials/footer.php');


        //return view('welcome_message');
	}



	//--------------------------------------------------------------------

}
