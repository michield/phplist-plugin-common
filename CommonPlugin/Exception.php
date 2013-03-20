<?php 
/**
 * CommonPlugin for phplist
 * 
 * This file is a part of CommonPlugin.
 *
 * @category  phplist
 * @package   CommonPlugin
 * @author    Duncan Cameron
 * @copyright 2011-2012 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 * @version   SVN: $Id: Exception.php 506 2012-01-01 18:35:12Z Duncan $
 * @link      http://forums.phplist.com/viewtopic.php?f=7&t=35427
 */

/**
 * This is a base exception from which all other exceptions inherit
 * 
 */ 
abstract class CommonPlugin_Exception extends Exception
{
	protected $i18n;
	/*
	 *	Public methods
	 */
	public function __construct($message = '', $code = 0)
	{
		$i18n = CommonPlugin_I18N::instance();
		$args = func_get_args();

		if (func_num_args() > 1) {
			unset($args[1]);
		}
		$t = call_user_func_array(array($i18n, 'get'), $args);
		parent::__construct($t, $code);
	}

	public static function errorHandler($errno, $errstr, $errfile, $errline ) {

	    if (!($errno & error_reporting()))
			return true;

       	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);

	}
}
