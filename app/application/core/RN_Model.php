<?php
 
require_once(APPPATH.'core/ModelException.php');
 
 // RESPUC/NEAM Model -> RN_Model
class RN_Model extends CI_Model {
    protected $Logger;
 
    protected $errorPrefix= 'G';
 
    protected $errorPadding= 6;
 
    public function __construct(){
        parent::__construct();
    }
 
    public function setLogger(&$pLogger) {
        $this->Logger = $pLogger;
    }
 
    private function getMicroTime() {
        list($_usec, $_sec) = explode(" ", microtime());
        return ((float) $_usec + (float) $_sec);
    }

    //Executa um comando sql com log, retornando apenas se o comando executou ou nao  
    protected function execute($conn, $query, $arrParam=null) {
        try {
            //$this->setErrorVerbosity($conn);
            $startTime = $this->getMicroTime();
            $rows = $conn->query($query, $arrParam);
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            if(!$rows)
                throw new Exception("Failed to execute");
            $this->throwLastError($conn);
            //$this->Logger->info("Rows affected:[".$conn->affected_rows()."]");
            $this->Logger->info('['.get_class($this).']Successfully executed');
            return true;
        } catch (Exception $e) {
            $this->Logger->error('['.get_class($this).']Failed to execute');
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->error('['.get_class($this).']error[' . $e . ']');
            $this->Logger->info('['.get_class($this).']End');
            throw new ModelException($e->getMessage(),$e->getCode());
        }
    }

    //Executa um comando sql sem log, retornando apenas se o comando executou ou nao  
    protected function executeNoLog($conn, $query, $arrParam=null) {
        try {
            $this->setErrorVerbosity($conn);
            $startTime = $this->getMicroTime();
            $rows = $conn->query($query, $arrParam);
            //$this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            $this->throwLastError($conn);
            $this->Logger->info('['.get_class($this).']Successfully executed');
            return true;
        } catch (Exception $e) {
            $this->Logger->error('['.get_class($this).']Failed to execute');
            //$this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->error('['.get_class($this).']error[' . $e . ']');
            $this->Logger->info('['.get_class($this).']End');
            throw new ModelException($e->getMessage(),$e->getCode());
        }
    }


     //Executa uma query sql com log, retornando apenas a primeira linha do cursor 
    protected function executeRow($conn, $query, $arrParam=null) {
        try {
            //$this->setErrorVerbosity($conn);
            $startTime = $this->getMicroTime();
            $rows = $conn->query($query, $arrParam);
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            $this->throwLastError($conn);
            if(!$rows){
                $this->Logger->info('Query did not return anything');
                return array();
            }
            $exec = $rows->row();
            $this->Logger->info('Return: '.print_r($exec,true));
            $this->Logger->info('['.get_class($this).']Successfully executed');
            return $exec;
        }catch (Exception $e){
            $this->Logger->error('['.get_class($this).']Failed to execute');
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->error('['.get_class($this).']error[' . $e . ']');
            $this->Logger->info('['.get_class($this).']End');
            throw new ModelException($e->getMessage(),$e->getCode());
        }
    }
 
     //Executa um comando sql com log, retornando o id autoincremental gerado pelo comando 
    protected function executeReturningId($conn, $query, $arrParam=null) {
        try {
            //$this->setErrorVerbosity($conn);
            $startTime = $this->getMicroTime();
            $rows = $conn->query($query, $arrParam);
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            $this->throwLastError($conn);
            if(!$rows){
                $this->Logger->info('Query did not return anything');
                return array();
            }
            $exec = $conn->insert_id();
            $this->Logger->info('Return: '.print_r($exec,true));
            $this->Logger->info('['.get_class($this).']Successfully executed');
            return $exec;
        }catch (Exception $e){
            $this->Logger->error('['.get_class($this).']Failed to execute');
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->error('['.get_class($this).']error[' . $e . ']');
            $this->Logger->info('['.get_class($this).']End');
            throw new ModelException($e->getMessage(),$e->getCode());
        }
    }
 
  //Executa uma query sql com log, retornando todas as linhas do cursor 

    protected function executeRows($conn, $query, $arrParam=null) {
        try {
            //$this->setErrorVerbosity($conn);
            $startTime = $this->getMicroTime();
            $rows = $conn->query($query, $arrParam);
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            $this->throwLastError($conn);
            if(!$rows){
                $this->Logger->info('Query did not return anything');
                return array();
            }
            $exec = $rows->result();
            $this->Logger->info('Return: '.print_r($exec,true));
            $this->Logger->info('['.get_class($this).']Rows affected: '. count($exec));
            $this->Logger->info('['.get_class($this).']Successfully executed');
            return $exec;
        } catch (Exception $e) {
            $this->Logger->error('['.get_class($this).']Failed to execute');
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->error('['.get_class($this).']error[' . $e . ']');
            $this->Logger->info('['.get_class($this).']End');
            throw new ModelException($e->getMessage(),$e->getCode());
        }
    }
 
   //Executa uma query sql sem log, retornando todas as linhas do cursor 

    protected function executeRowsNoLog($conn, $query, $arrParam=null) {
        try {
            //$this->setErrorVerbosity($conn);
            $startTime = $this->getMicroTime();
            $rows = $conn->query($query, $arrParam);
            //$this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            $this->throwLastError($conn);
            if(!$rows){
                $this->Logger->info('Query did not return anything');
                return array();
            }
            $exec = $rows->result();
            //$this->Logger->info('Return: '.print_r($exec,true));
            $this->Logger->info('['.get_class($this).']Rows affected: '. count($exec));
            $this->Logger->info('['.get_class($this).']Successfully executed');
            return $exec;
        } catch (Exception $e) {
            $this->Logger->error('['.get_class($this).']Failed to execute');
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->error('['.get_class($this).']error[' . $e . ']');
            $this->Logger->info('['.get_class($this).']End');
            throw new ModelException($e->getMessage(),$e->getCode());
        }
    }
 
    protected function updateAffectedRows($conn, $query, $arrParam=null) {
        //$this->setErrorVerbosity($conn);
        $conn->trans_start();
        $startTime = $this->getMicroTime();
        $rows = $conn->query($query, $arrParam);
        if($conn->trans_status() === FALSE){
            $this->Logger->info('['.get_class($this).']Failed to execute');
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $this->Logger->info('['.get_class($this).']End');
            $conn->trans_rollback();
            return "updated fail";
        }else{
            $this->Logger->debug('['.get_class($this).']query[' . $conn->last_query() . ']');
            $endTime = $this->getMicroTime();
            $totalTime = $endTime-$startTime;
            $this->Logger->info('Total time spent: '.$totalTime);
            $exec = $conn->affected_rows();
            $this->Logger->info('Return: '.print_r($exec,true));
            $this->Logger->info('['.get_class($this).']Successfully executed');
            $conn->trans_commit();
            return $exec;
        }
    }
 
    protected function getTimestampWithMiliseconds(){
        $fator=1000000;
        $milisegundos= microtime(true);
        return date('Y-m-d H:i:s').'.'.str_pad((int)(($milisegundos-(int)$milisegundos)*$fator), 6, '0', STR_PAD_LEFT);
    }
 
    protected function setErrorVerbosity($conn){
        $conn->call_function('set_error_verbosity', $conn->conn_id, PGSQL_ERRORS_VERBOSE);
    }
 
    protected function getLastError($conn){
        $error= $conn->call_function('last_error',$conn->conn_id);
        if(preg_match('/^(ERROR):  ([a-zA-Z0-9]*): (.*)/i',$error,$matches)){
            return '['.$matches[2].']'.$matches[3];
        }else{
            return false;
        }
    }
 
    protected function throwLastError($conn){
        $error= $this->getLastError($conn);
        if($error){
            throw new ModelException($error);
        }
    }
 
    protected function formatError($pErrorCode){
        if(is_numeric($pErrorCode)){
            $pErrorCode= abs($pErrorCode);
        }
        return $this->errorPrefix.str_pad($pErrorCode, $this->errorPadding, '0', STR_PAD_LEFT);
    }
}
 
?>