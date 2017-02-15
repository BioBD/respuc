<?php

class Logger {

    /**
     * The ALL has the lowest possible rank and is intended
     * to turn on all logging.
     */
    const ALL = - 2147483648;
    const TRACE = 5000;

    /**
     * The DEBUG Level designates fine-grained informational events that
     * are most useful to debug an application.
     */
    const DEBUG = 10000;

    /**
     * The INFO level designates informational messages that highlight the
     * progress of the application at coarse-grained level.
     */
    const INFO = 20000;

    /**
     * The WARN level designates potentially harmful situations.
     */
    const WARN = 30000;

    /**
     * The ERROR level designates error events that might still allow the
     * application to continue running.
     */
    const ERROR = 40000;

    /**
     * The FATAL level designates very severe error events that will
     * presumably lead the application to abort.
     */
    const FATAL = 50000;

    /**
     * The OFF has the highest possible rank and is intended
     * to turn off logging.
     */
    const OFF = 2147483648;

    /**
     * Log level
     * @var int
     */
    private $level = self::ALL;

    /**
     * Log path
     * @var string
     */
    private $path;

    /**
     * Base filename
     * @var string
     */
    private $filename;

    /**
     * Full filename (path + filename formatted with date string)
     * @var string
     */
    private $finalFilename;

    /**
     * Customizable unique identifier
     * @var string
     */
    private $uniqueIdentifier;

    /**
     * Object used to manipulate the file
     */
    private $fileObj;

    /**
     * Store the date (usgin yyyymmdd format) when log file was opened. Useful
     * when you have the same process running many days - and we need to write
     * to the right log file.
     * @var string
     */
    private $logStartDate;

    /**
     * Set path, level, filename and finalFilename and open file if levels
     * different than OFF.
     *
     * @param int $level
     * @param string $path
     * @param string $filename
     */
    public function __construct($level, $path, $filename, $uniqid = null) {

        $this->logStartDate = date('Ymd');

        if ($uniqid) {
            $this->uniqueIdentifier = $uniqid;
        } else {
            $this->uniqueIdentifier = $this->generateUniqID();
        }

        $this->level = $level;
        $this->path = $path;
        $this->filename = $filename;

        $this->setFinalFilename();

        if ($this->level < self::OFF) {
            $this->openLogFile($this->finalFilename);
        }
    }

    public function __destruct() {
        if ($this->fileObj) {
            fclose($this->fileObj);
        }
    }

    /**
     * Set final filename, eg. /path/filename_20101004.txt
     *
     * @return string
     */
    private function setFinalFilename() {
        $this->finalFilename = "{$this->path}/{$this->filename}_{$this->logStartDate}.log";
    }

    /**
     * Open logfile
     */
    private function openLogFile($filename) {
        // we need to check if the file is already open
        // and it's the correct logfile
        $current_date = date('Ymd');
        if ($this->fileObj && $current_date == $this->logStartDate) {
            return;
        }

        $this->fileObj = fopen($filename, 'a');
    }

    /**
     * Build log line and write it to file according to configured level.
     *
     * @param string $message
     * @param int $level
     */
    private function writeLine($message, $level) {
        if ($this->fileObj && ($this->level == self::ALL || $this->level <= $level || $level == 'delimiter')) {
            $line = $this->buildLine($message, $level);
            $this->openLogFile($this->finalFilename);
            fwrite($this->fileObj, $line);
        }
    }

    /**
     * Outputs message 'START TRANSACTION' as INFO level
     */
    public function startTransaction() {
        $this->writeLine('[START TRANSACTION]', 'delimiter');
    }

    /**
     * Outputs message 'END TRANSACTION' as INFO level
     */
    public function endTransaction() {
        $this->writeLine('[END TRANSACTION]', 'delimiter');
    }

    /**
     * Writes a DEBUG message
     *
     * @param string $message
     */
    public function debug($message) {
        $this->writeLine($message, self::DEBUG);
    }

    /**
     * Writes an INFO message
     *
     * @param string $message
     */
    public function info($message) {
        $this->writeLine($message, self::INFO);
    }

    /**
     * Writes a WARN message
     *
     * @param string $message
     */
    public function warn($message) {
        $this->writeLine($message, self::WARN);
    }

    /**
     * Writes an ERROR message
     *
     * @param string $message
     */
    public function error($message) {
        $this->writeLine($message, self::ERROR);
    }

    /**
     * Writes a FATAL message
     *
     * @param string $message
     */
    public function fatal($message) {
        $this->writeLine($message, self::FATAL);
    }

    /**
     * Build log line based on the template
     * (current date/time - [uniqueIdentifier] - [level] --> message).
     * eg.: 2010-10-04 01:55:39 - [0e4b07dc7eaa] - [DEBUG] --> your message
     *
     * @param string $message
     * @param int $level
     */
    private function buildLine($message, $level) {
        $line = date('Y-m-d H:i:s') . ' - [' . $this->uniqueIdentifier . '] - ';

        switch ($level) {
            case 'delimiter' :
                break;
            case self::TRACE :
                $line .= '[TRACE] --> ';
                break;
            case self::DEBUG :
                $line .= '[DEBUG] --> ';
                break;
            case self::INFO :
                $line .= '[INFO]  --> ';
                break;
            case self::WARN :
                $line .= '[WARN]  --> ';
                break;
            case self::ERROR :
                $line .= '[ERROR] --> ';
                break;
            case self::FATAL :
                $line .= '[FATAL] --> ';
                break;
        }

        $line .= $message . "\n";
        return $line;
    }

    /**
     * Generates an unique identifier that stays the same durign all execution.
     *
     * @return string
     */
    private function generateUniqID() {
        $_str = "";
        $_randlen_string = 6;
        $_randlen_num = 4;

        $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charset_len = strlen($charset) - 1;
        for ($i = 0; $i < $_randlen_string; $i++) {
            $_str .= $charset[mt_rand(0, $charset_len)];
        }

        $charset = "0123456789";
        $charset_len = strlen($charset) - 1;
        for ($i = 0; $i < $_randlen_num; $i++) {
            $_str .= $charset[mt_rand(0, $charset_len)];
        }

        return strtoupper($_str);
    }

}

?>