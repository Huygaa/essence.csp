<?php

class Library_Model_ListBooks {
	
	public function listbooks(){
		$db = Zend_Db_Table::getDefaultAdapter();
		$selectBooks = new Zend_Db_Select($db);
		$selectBooks->from('books');
		
		return $selectBooks;
	}
}