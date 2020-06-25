<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Auth_lib;

class Members implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $auth = new Auth_lib();
        //if is not logged
       if(!$auth->login_check()){
           return redirect('/');
       }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}