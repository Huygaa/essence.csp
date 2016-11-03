<?php

class AuthenticationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
    	if(Zend_Auth::getInstance()->hasIdentity()){
    		$this->_redirect('index/index');
    	}
    	
    	$request = $this->getRequest();
    	$form = new Form_LoginForm();
    	
    	if($request->isPost()){
    		if($form->isValid($this->_request->getPost())){
    			
    			$authAdapter = $this->getAuthAdapter();
    			
    			$username = $form->getValue('username');
    			$password = $form->getValue('password');
    			
    			$authAdapter->setIdentity($username)
    						->setCredential($password);
    			
    			$auth = Zend_Auth::getInstance();
    			$result = $auth->authenticate($authAdapter);
    			
    			if($result->isValid()){
    				$identity = $authAdapter->getResultRowObject();
    				
    				$authStorage =$auth->getStorage();
    				$authStorage->write($identity);
    				
    				$this->_redirect('index/index');
    			} else {
    				echo 'invalid';
    			}
    			
    		}
    	}
    	
    	$this->view->form = $form;
        
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('index/index');
    }

    private function getAuthAdapter()
    {
    	$authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
    	$authAdapter->setTableName('users')
    				->setIdentityColumn('username')
    				->setCredentialColumn('password');
    	return $authAdapter;
    }

}





