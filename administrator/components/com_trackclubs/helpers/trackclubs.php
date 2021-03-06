<?php
/*------------------------------------------------------------------------
# trackclubs.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Trackclubs component helper.
 */
abstract class TrackclubsHelper
{
	/**
	 *	Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JHtmlSidebar::addEntry(JText::_('Trackclubs'), 'index.php?option=com_trackclubs&view=trackclubs', $submenu == 'trackclubs');
		JHtmlSidebar::addEntry(JText::_('Races'), 'index.php?option=com_trackclubs&view=races', $submenu == 'races');
		JHtmlSidebar::addEntry(JText::_('Results'), 'index.php?option=com_trackclubs&view=results', $submenu == 'results');
		JHtmlSidebar::addEntry(JText::_('Members'), 'index.php?option=com_trackclubs&view=members', $submenu == 'members');
		JHtmlSidebar::addEntry(JText::_('Athletes'), 'index.php?option=com_trackclubs&view=athletes', $submenu == 'athletes');
		JHtmlSidebar::addEntry(JText::_('Groupruns'), 'index.php?option=com_trackclubs&view=groupruns', $submenu == 'groupruns');
		JHtmlSidebar::addEntry(JText::_('Workouts'), 'index.php?option=com_trackclubs&view=workouts', $submenu == 'workouts');
		JHtmlSidebar::addEntry(JText::_('Workout Types'), 'index.php?option=com_trackclubs&view=workouttypes', $submenu == 'workouttypes');
                JHtmlSidebar::addEntry(JText::_('Result Upload'), 'index.php?option=com_trackclubs&view=chooserace', $submenu == 'chooserace');
	}

	/**
	 *	Get the actions
	 */
	public static function getActions($Id = 0)
	{
		jimport('joomla.access.access');

		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($Id)){
			$assetName = 'com_trackclubs';
		} else {
			$assetName = 'com_trackclubs.message.'.(int) $Id;
		};

		$actions = JAccess::getActions('com_trackclubs', 'component');

		foreach ($actions as $action){
			$result->set($action->name, $user->authorise($action->name, $assetName));
		};

		return $result;
	}

	/**
	 *	File Uploader
	 */
	public static function imageUpload($file, $data, $fieldname)
	{
		$componentParams	= JComponentHelper::getParams('com_trackclubs');
		$maxWidth			= $componentParams->get('image_width', 600);
		$maxHeight			= $componentParams->get('image_height', 500);
		$maxThumbWidth		= $componentParams->get('image_thumb_width', 150);
		$maxThumbHeight		= $componentParams->get('image_thumb_height', 150);

		// Include file system helpers
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');

		// Include wideimage - http://wideimage.sourceforge.net
		require_once('components/com_trackclubs/assets/wideimage/WideImage.php');

		// Set message array
		$info = array();

		// Set folders
		$mediaFolder	= JPATH_SITE . DS . 'images' . DS . 'com_trackclubs';
		$thumbFolder	= $mediaFolder . DS . 'thumb';
		$tmpFolder		= $mediaFolder . DS . 'tmp';

		// File size limit 10000000kb or 10MB
		$fileSize = $file['size'][$fieldname];
		if($fileSize > 10000000){
			$info['error']	= 1;
			$info['msg']	= JText::_('Can not upload a file over 10MB, please make this file smaller so that it is under the limit');
			return $info;
		}

		// Any errors the server registered on uploading
		$fileError = $file['error'][$fieldname];
		if ($fileError > 0){
			switch ($fileError)
			{
				case 1:
					$info['error']	= 1;
					$info['msg']	= JText::_('Image is larger than the php.ini allows, please make changes to your server php.ini file');
					return $info;
				case 2:
					$info['error']	= 1;
					$info['msg']	= JText::_('The form does not allow this sized image to be uploaded, please resize the image');
					return $info;
				case 3:
					$info['error']	= 1;
					$info['msg']	= JText::_('There was an error when trying to upload your image, partial image uploaded only.');
					return $info;
				case 4:
					$info['error']	= 1;
					$info['msg']	= JText::_('Error, no image present.');
					return $info;
			}
		}

		// Create folders if they do not exist
		if(!JFolder::exists($mediaFolder)){
			JFolder::create($mediaFolder);
		}
		if(!JFolder::exists($thumbFolder)){
			JFolder::create($thumbFolder);
		}
		if(!JFolder::exists($tmpFolder)){
			JFolder::create($tmpFolder);
		}

		// Handle photo
		$fileName 	= $file['name'][$fieldname];
		$fileName	= preg_replace("/[^A-Za-z0-9._]/", "", $fileName);
		$fileTemp 	= $file['tmp_name'][$fieldname];
		$filePath	= $mediaFolder . DS . $fileName;
		$thumbPath	= $thumbFolder . DS . $fileName;
		$tmpArea		= $tmpFolder . DS . $fileName;

		//Check for allowed extensions
		$uploadedFileNameParts	= explode('.',$fileName);
		$uploadedFileExtension	= array_pop($uploadedFileNameParts);
		$uploadedFileExtension	= strtolower($uploadedFileExtension);
		$validFileExts			= explode(',', 'jpeg,jpg,png,gif,pdf');

		//assume the extension is false until we know its ok
		$extOk = false;

		//go through every ok extension, if the ok extension matches the file extension (case insensitive)
		//then the file extension is ok
		foreach($validFileExts as $key => $value){
			if(preg_match("/$value/i", $uploadedFileExtension )){
				$extOk			= true;
				$fileExtension	= $value;
			}
		}

		// Check if acceptable extension
		if($extOk == false){
			$info['error']	= 1;
			$info['msg']	= JText::_('Not acceptable image extension');

			return $info;
		}

		// Get image information
		list($width, $height, $type, $attr) = getimagesize($fileTemp);

		// Check if there is a file
		if($fileName){
			// Try to upload file
			if(!JFile::upload($fileTemp, $filePath)){
				$info['error']	= 1;
				$info['msg']	= JText::_('There was an error uploading your image, please try again');

				return $info;
			} else { // Else file has been uploaded!
				// restrictions taken into account
				if($maxWidth > 900){
					$maxWidth = 900;
				}
				if($maxHeight > 700){
					$maxHeight = 700;
				}
				if($maxThumbWidth > 400){
					$maxThumbWidth = 400;
				}
				if($maxThumbHeight > 400){
					$maxThumbHeight = 400;
				}

				// Full Image
				// if the image is huge, then we need to resize on the fly
				// so that wideimage library can do its thing
				if($width > 900 || $height > 700){
					if($uploadedFileExtension == "jpg" || $uploadedFileExtension == "jpeg" ){
						$src = imagecreatefromjpeg($filePath);
					} elseif($uploadedFileExtension == "png"){
						$src = imagecreatefrompng($filePath);
					} else {
						$src = imagecreatefromgif($filePath);
					}

					list($width, $height) = getimagesize($filePath);

					$wRatio		= $width / $maxWidth;
					$hRatio		= $height / $maxHeight;
					$maxRatio	= max($wRatio, $hRatio);
					if ($maxRatio > 1) {
						$newwidth	= $width / $maxRatio;
						$newheight	= $height / $maxRatio;
					} else {
						$newwidth	= $width;
						$newheight	= $height;
					}

					$tmp				= imagecreatetruecolor($newwidth, $newheight);
					$backgroundColor	= imagecolorallocate($tmp, 255, 255, 255);

					imagefill($tmp, 0, 0, $backgroundColor);
					imagecopyresampled($tmp, $src, 0, 0, 0, 0,$newwidth, $newheight, $width, $height);
					imagejpeg($tmp, $filePath, 100);
					imagedestroy($src);
					imagedestroy($tmp);
				}

				// Thumb Image
				$image	= WideImage::load($filePath);
				$resized	= $image->resize($maxThumbWidth, $maxThumbHeight, 'outside')->crop('center', 'center', $maxThumbWidth, $maxThumbHeight);
				$resized->saveToFile($thumbPath);

				// Full Image
				$image	= WideImage::load($filePath);
				$resized	= $image->resize($maxWidth, $maxHeight, 'outside')->crop('center', 'middle', $maxWidth, $maxHeight);
				$resized->saveToFile($filePath);

				// Set return variables
				$info[$fieldname]	= $fileName;
				$info['error']		= 0;
				$info['msg']		= JText::_('File Uploaded!');

				return $info;
			}
		} else {
			$info['error']	= 1;
			$info['msg']	= JText::_('No image selected to upload');

			return $info;
		}
	}
}
?>