<?php
/**
* @package    Categories Readmore Plugin
* @copyright  Copyright (C) 2015 JoomJunk. All rights reserved.
* @license    GPL v3.0 or later http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die;

/**
 * Contact Plugin
 *
 * @since  3.2
 */
class PlgContentCategoryrm extends JPlugin
{
	/**
	 * Plugin that retrieves contact information for contact
	 *
	 * @param   mixed    &$row     An object with a "description" property
	 *
	 * @return  boolean
	 */
	public function onCategorySplit(&$row)
	{
		// Return if we don't have a valid description in place
		if (!isset($row->description) || empty($row->description))
		{
			return true;
		}

		$pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';
		$tagPos = preg_match($pattern, $row->description);

		if ($tagPos == 0)
		{
			$row->introtext = $row->description;
			$row->fulltext = '';
		}
		else
		{
			list ($row->introtext, $row->fulltext) = preg_split($pattern, $array['articletext'], 2);
		}

		return true;
	}
}
