<?php
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
Todoyu::$CONFIG['SYSTEM']['name'] 			= 'TheDotConcept Work Management Tool';
Todoyu::$CONFIG['SYSTEM']['locale']			= 'en_US';
Todoyu::$CONFIG['SYSTEM']['email']			= 'info@thedotconcept.com';
Todoyu::$CONFIG['SYSTEM']['mailer']			= '0';

	// Date and time settings
Todoyu::$CONFIG['SYSTEM']['timezone']		= 'America/New_York';
Todoyu::$CONFIG['SYSTEM']['firstDayOfWeek']	= 1;

	// Command line interface
Todoyu::$CONFIG['SYSTEM']['todoyuURL']		= 'http://work.thedotconcept.com/';

	// Debugging
Todoyu::$CONFIG['SYSTEM']['logLevel']		= 3;



Todoyu::$CONFIG['SYSTEM']['encryptionKey']	= 'ZWYzMGRhYjU2NTk5NmY4N2QyMWExY2EzYjdjZGQ3Mjg';

?>