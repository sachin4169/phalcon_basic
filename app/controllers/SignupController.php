<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {
   
    }
    public function registerAction()
    {
        // return "hello";
        
        $user = new Users();

        //assign value from the form to $user
        $success =$user->save(
            $this->request->getPost(),
            [
                'name',
                'email',
                'password'
            ]
        );
        $this->view->success = $success;

        if ($success) {
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated:<br>"
                    . implode('<br>', $user->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
    }
}