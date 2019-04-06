<?php 
    include_once('./myphp-backup.php');
    
    

    
    class DoCornAtInterval{
        var $DB_USER = 'biharil1_fuking';
	    var $DB_PASSWORD = 'the&00tT!g*&';
	    var $DB_NAME = 'biharil1_MarketGo';
        var $DB_HOST = 'localhost';
        var $BACKUP_DIR = 'myphp-backup-files'; // Comment this line to use same script's directory ('.')
        var $TABLES = '*'; // Full backup

        //$TABLES = 'table1, table2, table3'; // Partial backup

        var $CHARSET = 'utf8';
        var $GZIP_BACKUP_FILE = true; // Set to false if you want plain SQL backup files (not gzipped)
        var $BATCH_SIZE = 1000;

        function start(){// performing operation and making backup function
            $this->setInterval(function(){
                $init = new InitParam();
                $output = $init->doInitParamAndGetData($this->DB_USER,$this->DB_PASSWORD, $this->DB_NAME, $this->DB_HOST, $this->BACKUP_DIR, $this->TABLES, $this->CHARSET, $this->GZIP_BACKUP_FILE, $this->BATCH_SIZE);
                //echo($output);
            },10000);
        }

        function setInterval($f, $milliseconds)
        {
            $seconds=(int)$milliseconds/1000;
            while(true)
            {
                $f();
                sleep($seconds);
            }
        }

        
    }
    $doCornAtinte = new DoCornAtInterval();
    $doCornAtinte->start();
?>