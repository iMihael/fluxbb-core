<?php

// Language definitions used in db_update.php

return array(

'update'						=>	'Update FluxBB',
'update_message'				=>	'Your FluxBB database is out-of-date and must be upgraded in order to continue. If you are the board administrator, please follow the instructions below to complete the upgrade.',
'note'							=>	'Note:',
'members_message'				=>	'This process is for board administators only. If you are a member there is nothing to worry about - the forums will be back shortly!',
'administrator_only'			=>	'This step is for the board administrator only!',
'database_password_info'		=>	'To perform the database update please enter the database password with which FluxBB was installed. If you cannot remember, this is stored in your \'config.php\' file.',
'database_password_note'		=>	'If you are running SQLite (and hence have no database password) please use the database file name instead. This must exactly match the database file name given in your configuration file.',
'database_password'				=>	'Database password',
'maintenance'					=>	'Maintenance',
'maintenance_message_info'		=>	'The message that will be displayed to users during the updating process. This text will not be parsed like regular posts and thus may contain HTML.',
'maintenance_message'		    =>	'Maintenance message',
'next'							=>	'Next',

'you_are_running_error'			=>	'You are running %1$s version %2$s. FluxBB %3$s requires at least %1$s %4$s to run properly. You must upgrade your %1$s installation before you can continue.',
'version_mismatch_error'		=>	'Version mismatch. The database \'%s\' doesn\'t seem to be running a FluxBB database schema supported by this update script.',
'invalid_file_error'			=>	'Invalid database file name. When using SQLite the database file name must be entered exactly as it appears in your \'%s\'',
'invalid_password_error'		=>	'Invalid database password. To upgrade FluxBB you must enter your database password exactly as it appears in your \'%s\'',
'no_password_error'				=>	'No database password provided',
'script_runs_error'				=>	'It appears the update script is already being ran by someone else. If this is not the case, please manually delete the file \'%s\' and try again',
'no_update_error'				=>	'Your forum is already as up-to-date as this script can make it',

'intro_1'						=>	'This script will update your forum database. The update procedure might take anything from a second to hours depending on the speed of the server and the size of the forum database. Don\'t forget to make a backup of the database before continuing.',
'intro_2'						=>	'Did you read the update instructions in the documentation? If not, start there.',
'no_charset_conversion'			=>	'<strong>IMPORTANT!</strong> FluxBB has detected that this PHP environment does not have support for the encoding mechanisms required to do UTF-8 conversion from character sets other than ISO-8859-1. What this means is that if the current character set is not ISO-8859-1, FluxBB won\'t be able to convert your forum database to UTF-8 and you will have to do it manually. Instructions for doing manual charset conversion can be found in the update instructions.',
'enable_conversion'				=>	'<strong>Enable conversion:</strong> When enabled this update script will, after it has made the required structural changes to the database, convert all text in the database from the current character set to UTF-8. This conversion is required if you\'re upgrading from version 1.2.',
'current_character_set'			=>	'<strong>Current character set:</strong> If the primary language in your forum is English, you can leave this at the default value. However, if your forum is non-English, you should enter the character set of the primary language pack used in the forum. <em>Getting this wrong can corrupt your database so don\'t just guess!</em> Note: This is required even if the old database is UTF-8.',
'charset_conversion'			=>	'Charset conversion',
'enable_conversion_label'		=>	'<strong>Enable conversion</strong> (perform database charset conversion).',
'current_character_set_label'	=>	'Current character set',
'current_character_set_info'	=>	'Accept default for English forums otherwise the character set of the primary language pack.',
'start_update'					=>	'Start update',
'error_converting_users'		=>	'Error converting users',
'error_info_1'					=>	'There was an error converting some users. This can occur when converting from FluxBB v1.2 if multiple users have registered with very similar usernames, for example "bob" and "böb".',
'error_info_2'					=>	'Below is a list of users who failed to convert. Please choose a new username for each user. Users who are renamed will automatically be sent an email alerting them of the change.',
'new_username'					=>	'New username',
'required'						=>	'(Required)',
'correct_errors'				=>	'The following errors need to be corrected:',
'rename_users'					=>	'Rename users',
'successfully_updated'			=>	'Your forum database was successfully updated. You may now %s.',
'go_to_index'					=>	'go to the forum index',

'unable_to_lock_error'			=>	'Unable to write update lock. Please make sure PHP has write access to the directory \'%s\' and no-one else is currently running the update script.',

'converting'					=>	'Converting %s …',
'converting_item'				=>	'Converting %1$s %2$s …',
'preparsing_item'				=>	'Preparsing %1$s %2$s …',
'rebuilding_index_item'			=>	'Rebuilding index for %1$s %2$s',

'ban'							=>	'ban',
'categories'					=>	'categories',
'censor_words'					=>	'censor words',
'configuration'					=>	'configuration',
'forums'						=>	'forums',
'groups'						=>	'groups',
'post'							=>	'post',
'report'						=>	'report',
'topic'							=>	'topic',
'user'							=>	'user',
'signature'						=>	'signature',

'username_too_short_error'		=>	'Usernames must be at least 2 characters long. Please choose another (longer) username.',
'username_too_long_error'		=>	'Usernames must not be more than 25 characters long. Please choose another (shorter) username.',
'username_guest_reserved_error'	=>	'The username guest is reserved. Please choose another username.',
'username_ip_format_error'		=>	'Usernames may not be in the form of an IP address. Please choose another username.',
'username_bad_characters_error'	=>	'Usernames may not contain all the characters \', " and [ or ] at once. Please choose another username.',
'username_bbcode_error'			=>	'Usernames may not contain any of the text formatting tags (BBCode) that the forum uses. Please choose another username.',
'username_duplicate_error'		=>	'Someone is already registered with the username %s. The username you entered is too similar. The username must differ from that by at least one alphanumerical character (a-z or 0-9). Please choose a different username.',

);