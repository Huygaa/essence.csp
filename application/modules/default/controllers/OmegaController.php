<?php

class OmegaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$this->view->act=$this->_request->getActionName();
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch ->addActionContext('next', array('json'))
        			   ->initContext();
    }

    public function indexAction()
    {
        // action body
    }

    public function voteAction()
    {
        // action body
        $omegas=new Library_Model_DbTable_Omega();
        $candidates=new Library_Model_DbTable_Candidate();
    	$request=$this->getRequest();
    	
        $cid=intval($request->getParam('cid'));
        $omega_id=intval($request->getParam('omega_id'));
        
        if ($cid==-1){
        	$omega=$omegas->fetchRow($omegas->select()->where('id = ?',$omega_id));
        	$data = array(
                	'no_answer_vote' => $omega['no_answer_vote']+1,
                	'total_vote' => $omega['total_vote']+1
			);				
			$where['id = ?']= $omega_id;
				
			$omegas->update($data,$where);
        } else {
        	$candidate=$candidates->fetchRow($candidates->select()->where('id = ?',$cid));
			$data = array(
                	'vote' => $candidate['vote']+1
			);
			
			if($candidate['vote']+1>=5) $answer=$candidate['id'];
			else $answer=0;
        	
			$where['id = ?']= $cid;
			$candidates->update($data,$where);
			
        	$omega=$omegas->fetchRow($omegas->select()->where('id = ?',$omega_id));
        	$data = array(
                	'total_vote' => $omega['total_vote']+1,
        			'answer_cid' => $answer
			);				
			$where['id = ?']= $omega_id;
				
			$omegas->update($data,$where);
        }
    }

    public function viewAction()
    {
        // action body
    }

    public function nextAction()
    {
        // action body
        $omegas=new Library_Model_DbTable_Omega();
        $candidates=new Library_Model_DbTable_Candidate();
		
        $list=$omegas->fetchAll($omegas->select()->order('total_vote ASC'));
		$omegaWiki = null;
		
		foreach($list as $row){
			$omegaWiki= array(
				'id' => $row['id'],
				'gloss' => $row['definition'],
				'words' => $row['words']
			); break;
		}
		
		$this->view->omegaWiki=$omegaWiki;
		
		$listCandidates=$candidates->fetchAll($candidates->select()->where('omega_id = ?',$omegaWiki['id']));
    	$candidatesA = array();
		foreach($listCandidates as $row){
			$d=strlen($row['sim_gloss']);
			if($d>4) $row['sim_gloss']=substr($row['sim_gloss'], 0,4);
			$d=strlen($row['sim_word']);
			if($d>4) $row['sim_word']=substr($row['sim_word'], 0,4);
			$candidatesA [] = array(
				'id' => $row['id'],
				'gloss' => $row['gloss'],
				'words' => $row['words'],
				'synset_id' => $row['real_id'],
				'sim_gloss' => $row['sim_gloss'],
				'sim_words' => $row['sim_word']
			);
		}
		
		$this->view->candidates=$candidatesA;
    }


}







