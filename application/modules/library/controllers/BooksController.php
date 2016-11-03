<?php

class Library_BooksController extends Zend_Controller_Action
{

    public function init()
    {
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch->addActionContext('list', 'json')
        				->initContext();
        
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        $bookList = new Library_Model_ListBooks();
        $bookList = $bookList->listBooks();
        
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($bookList));
        $paginator->setItemCountPerPage(3)
        		  ->setCurrentPageNumber($this->_getParam('page', 1));
        		  
        $this->view->paginator = $paginator;
    }


}



