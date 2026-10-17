<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>

/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2012, snowflake productions GmbH, Switzerland
* All rights reserved.
*
* This script is part of the todoyu project.
* The todoyu project is free software; you can redistribute it and/or modify
* it under the terms of the BSD License.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
* for more details.
*
* This copyright notice MUST APPEAR in all copies of the script.
*****************************************************************************/

	// General system settings
Todoyu::$CONFIG['SYSTEM']['name'] 			= '<?php echo addslashes((isset($this->scope["name"]) ? $this->scope["name"] : null));?>';
Todoyu::$CONFIG['SYSTEM']['locale']			= '<?php echo $this->scope["locale"];?>';
Todoyu::$CONFIG['SYSTEM']['email']			= '<?php echo addslashes((isset($this->scope["email"]) ? $this->scope["email"] : null));?>';
Todoyu::$CONFIG['SYSTEM']['mailer']			= '<?php echo $this->scope["mailer"];?>';

	// Date and time settings
Todoyu::$CONFIG['SYSTEM']['timezone']		= '<?php echo $this->scope["timezone"];?>';
Todoyu::$CONFIG['SYSTEM']['firstDayOfWeek']	= <?php echo (($tmp = (isset($this->scope["firstDayOfWeek"]) ? $this->scope["firstDayOfWeek"] : null))===null||$tmp==='' ? 1 : $tmp);?>;

	// Command line interface
Todoyu::$CONFIG['SYSTEM']['todoyuURL']		= '<?php echo $this->scope["todoyuURL"];?>';

	// Debugging
Todoyu::$CONFIG['SYSTEM']['logLevel']		= <?php echo $this->scope["logLevel"];?>;



Todoyu::$CONFIG['SYSTEM']['encryptionKey']	= '<?php echo $this->scope["encryptionKey"];?>';

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>