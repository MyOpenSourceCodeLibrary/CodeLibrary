<?php
/**
   * Logovaci nastroj pro PHP (Inspirovano skvelou knihovnou
   * log4j od Apache foundation)
   * Umoznuje bud logovat hlasky do souboru nebo zasilat emailem
   */
class log4php {
	/**
     * Email administratora
     * Na tento email budou zasilany chybove hlasky
     */    
	var $adminEmail;
	/**
     * Email log4php
     * Tento email bude uveden coby odesilatel 
     */    
	var $mailFrom;
	/**
     * Absolutni cesta k souboru s logem
     */    
	var $logFileName;
	/** Cil logovani.
     * Do souboru nebo chyby posilat emailem
     *  Povolene varianty: 'email' | 'file'
     */
	var $logType;
	/**
     * Jaka uroven bude zaznamenana?
     * Povolene urovne: 
     *   <ul>
     *     <li>1 - debug</li>
     *     <li>2 - warn</li>
     *     <li>3 - error</li>
     *   </ul>
     */
	var $logLevel;
	/**
     * Pomocna promenna - nepouzivat
     */
	var $logLevelTxt;
	/**
     * Jmeno aplikace
     */
	public $appName;
	/**
     * Jakym formatem ma byt zobrazovan casovy udaj v logu?
     * Viz funkce strftime();
     * http://cz.php.net/manual/en/function.strftime.php
     */ 
	var $logPath;

	var $timeFormat;
	/**
     * Constructor, ktery provadi prvotni inicializaci 
     * tridy.
     */
	function log4php() {
		$this->logLevel = ( isset($GLOBALS['g_default_log_level']) && in_array($GLOBALS['g_default_log_level'], array(1,2,3)) ) ? intval($GLOBALS['g_default_log_level']) : 1;
		$this->appName = 'default';
		$this->logPath = "./";
		$this->logType = 'file';
		//$this->adminEmail = 'bob@test.com';
		$this->timeFormat = '%d.%m.%Y %H:%M:%S';
	}
	/**
     * Interni funkce pro zjisteni posledniho casu modifikace
     * param $filename Jmeno souboru
     * return String 
     */
	function getFileMDate($filename) {
		if (!file_exists($filename)) return "0";

		$date=strftime("%Y%m%d", filemtime($filename));
		return $date;
	}
	/**
     * Interni funkce pro zjisteni aktualniho casu a jeho porovnani 
     * s funkci getFileMDate($filename)
     * return String 
     */
	function getActualMDate() {
		$date=strftime("%Y%m%d", time());
		return $date;
	}
	/**
     * Zalogovani hlasky do souboru 
     * @param $msg Textova hlaska
     */
	function fileLog($msg) {
		$new_created = false;
		// Zjistime, zda neni jiz dalsi den
		if (file_exists($this->logFile))
		{
			if ( $this->getFileMDate($this->logFile) != $this->getActualMDate() ) {
				// Zmenil se datum - provedeme zalohu
				rename($this->logFile, $this->logFile.".".strftime("%Y%m%d", filectime($this->logFile)).".log");
				$new_created = true;
			}
		}
		else
		{
			$new_created = true;
		}

		$fp=fopen($this->logFile, "a");
		if ($new_created) chmod($this->logFile, 0666);
		$msg=strftime($this->timeFormat, time())." [".$this->logLevelTxt."] ".$msg;
		if (fwrite($fp, $msg."\r\n")===false)
		Die("Cannot write \"$msg\" to \"".$this->logFile."\"");
		fclose($fp);
	}
	/**
     * Odeslani logove hlasky emailem
     * @param $msg Textova hlaska
     */
	function mailLog($msg) {
		$recipient = $this->adminEmail;
		/* subject */
		$subject = "Error from " . $this->appName;

		/* message */
		$message .= "Runtime error from ".$this->appName."\n";
		$message .= "Date/Time\t\tLog level\t\tMessage\n";
		$message .= strftime($this->timeFormat, time())."\t\t[".$this->logLevelTxt."]\t\t$msg\n";

		/* p�idat signaturu */
		$message .= "--\r\n"; //odd�lova? signatury
		$message .= "log4php by OldSoldier";

		/* dodate�n? hlavi�ky pro chyby, From, cc, bcc, atd */
		$headers .= "From: log4php (".$this->appName.") <".$this->mailFrom.">\n";
		$headers .= "X-Sender: <".$this->mailFrom.">\n";
		$headers .= "X-Mailer: Log4php/PHP mailer\n"; // mailov? klient
		$headers .= "X-Priority: 1\n"; // Urgentn? vzkaz!
		$headers .= "Return-Path: <".$this->mailFrom.">\n";  // N�vratov? cesta pro chyby

		/* Pokud chcete poslat HTML email, odkomentujte n�sleduj�c? ��dek */
		// $headers .= "Content-Type: text/html; charset=iso-8859-1\n"; // Mime typ

		/* a te? to ode�leme */
		mail($recipient, $subject, $message, $headers);
	}
	/**
     * Touto metodou se provadi logovani v urovni DEBUG
     * Pouziti napr. pro odladovani
     * @param $msg Textova hlaska
     */
	function debug($msg){
        $logLevel = $this->get_log_level();
		if ($logLevel>1) return;
		$this->logFile = $this->logPath . $this->appName . '.debug';
		$this->logLevelTxt="DEBUG";
		switch ($this->logType) {
			case 'file':
				$this->fileLog($msg);
				break;
			case 'email':
				$this->mailLog($msg);
				break;
		}
	}
	/**
     * Touto metodou se provadi logovani v urovni DEBUG
     * Pouziti napr. pro drobne nekriticke chyby
     * @param $msg Textova hlaska
     */
	function warn($msg){
        $logLevel = $this->get_log_level();
		if ($logLevel>2) return;
		$this->logFile = $this->logPath . $this->appName . '.warn';
		$this->logLevelTxt="WARN";
		switch ($this->logType) 
		{
			case 'file':
				$this->fileLog($msg);
				break;
			case 'email':
				$this->mailLog($msg);
				break;
		}
	}
	/**
     * Touto metodou se provadi logovani v urovni DEBUG
     * Pouziti napr. pro kriticke chyby, ktere mohou zpusobit 
     * pad aplikace
     * @param $msg Textova hlaska
     */
	function error($msg){
        $logLevel = $this->get_log_level();
		if ($logLevel>3) return;
		$this->logFile = $this->logPath . $this->appName . '.error';
		$this->logLevelTxt="ERROR";	
		switch ($this->logType) {
			case 'file':
				$this->fileLog($msg);
				break;
			case 'email':
				$this->mailLog($msg);
				break;
		}
	}

    function get_log_level()
    {
        return ( isset($GLOBALS['g_default_log_level']) && in_array($GLOBALS['g_default_log_level'], array(1,2,3)) ) ? intval($GLOBALS['g_default_log_level']) : 1;
    }
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

?>
