<?php

include_once APPPATH . 'core/person.php';
include_once APPPATH . 'libraries/logger.php';
include_once APPPATH . 'libraries/csv.php';

// RESPUC/NEAM Controller -> RN_Controller
class RN_Controller extends CI_Controller {

    protected $pid;
    protected $Logger;

    public function __construct() {
        parent::__construct();
        $this->setLogger();        
    }

    public function __destruct() {
        if ($this->Logger)
            $this->Logger->endTransaction();
    }

    private function setLogger() {
        $this->config->load('logger', true);
        $logPath = $this->config->item('log_path', 'logger');
        //$logFilename = strtolower(get_class($this));
        $logLevel = $this->config->item('log_level', 'logger');
        //$this->Logger = new Logger($logLevel, $logPath, $logFilename);
        $this->Logger = new Logger($logLevel, $logPath, "kinderland");
        $this->Logger->startTransaction();
        $this->Logger->info('[ENVIRONMENT][' . strtoupper(ENVIRONMENT) . ']');
        $this->Logger->info("[PROCESS ID][{$this->pid}]");
    }

    public function loadView($viewName, $data = array()) {
        $output = $this->load->view('include/header', $data, true);
        $output .= $this->load->view($viewName, $data, true);
        $output .= $this->load->view('include/footer', $data, true);
        $this->output->set_output($output);
    }
}

?>