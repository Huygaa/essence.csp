<?php

class Model_LibraryAcl extends Zend_Acl{
	public function __construct(){
//		$this->add(new Zend_Acl_Resource('index'));
//		$this->add(new Zend_Acl_Resource('logout'));
//		$this->add(new Zend_Acl_Resource('login'));
//		
//		$this->add(new Zend_Acl_Resource('book'));
//		$this->add(new Zend_Acl_Resource('edit'), 'book');
//		$this->add(new Zend_Acl_Resource('add'), 'book');
//		$this->add(new Zend_Acl_Resource('delete'), 'book');
//		
//		$this->add(new Zend_Acl_Resource('books'));
//		$this->add(new Zend_Acl_Resource('list'), 'books');
//		
//		$this->addRole(new Zend_Acl_Role('guest'));
//		$this->addRole(new Zend_Acl_Role('user'), 'guest');
//		$this->addRole(new Zend_Acl_Role('admin'), 'user');
//		
//		$this->allow('guest', 'login');
//		$this->deny('user', 'login');
//		$this->allow('user', array('index', 'logout', 'books'));
//		$this->allow('admin', 'book');

		$this->addRole(new Zend_Acl_Role('guests'));
		$this->addRole(new Zend_Acl_Role('users'), 'guests');
		$this->addRole(new Zend_Acl_Role('admins'), 'users');
		
		$this->add(new Zend_Acl_Resource('library'))
			 ->add(new Zend_Acl_Resource('library:books'), 'library');
		$this->add(new Zend_Acl_Resource('admin'))
			 ->add(new Zend_Acl_Resource('admin:book'), 'admin');
		$this->add(new Zend_Acl_Resource('default'))
			 ->add(new Zend_Acl_Resource('default:authentication'), 'default')
			 ->add(new Zend_Acl_Resource('default:languageswitch'), 'default')
			 ->add(new Zend_Acl_Resource('default:index'), 'default')
			 ->add(new Zend_Acl_Resource('default:error'), 'default')
			 ->add(new Zend_Acl_Resource('default:omega'), 'default');
			  
		$this->allow('guests', 'default:authentication', 'login');
		$this->allow('guests', 'default:error', 'login');
		$this->allow('guests', 'default:index', 'login');
		$this->allow('guests', 'default:languageswitch', 'switch');
		$this->allow('guests', 'default:omega', array('next', 'vote'));
		
		$this->deny('users', 'default:authentication', 'login');
		$this->allow('users', 'default:index', 'index');
		$this->allow('users', 'default:authentication', 'logout');
		$this->allow('users', 'library:books', array('index', 'list'));
		
		$this->allow('admins', 'admin:book', array('index', 'add', 'edit', 'delete'));
	}
}