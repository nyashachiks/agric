<?php abstract class Custom_Filehandler
{


	public static function upload($pics=FALSE)
	{	
		//try
		//{
$value=array();
		// Custom configuration for this upload
		$config = array(
		    'path' => DOCROOT.'files',
		    'randomize' => true,
		    'ext_whitelist' => array('pdf','doc','txt','docx'),
		);
		$config_profile = array(
		    'path' => DOCROOT.'files',
		    'randomize' => true,
		    'ext_whitelist' => 	array('png','jpeg','jpg','bmp'),
		);
		//Debug::dump(DOCROOT.'files');
		// process the uploaded files in $_FILES
		Upload::process($pics?$config_profile:$config);

		// if there are any valid files
		if (Upload::is_valid())
		{	$value=Upload::get_files();
			//Debug::dump($value);
		 	// Upload::save();
			//$value=Upload::get_files();
			//Debug::dump($value);
			if($pics)
			{
				// save all validated files, and to an alternate location
				Upload::save(DOCROOT.'assets/img/profilepics');
				$arr = Upload::get_files();			
				return $arr;
			}
			else
		 	 {
		 	 	Upload::save();
				$value=Upload::get_files();
			}
			return $value;
		}
		elseif(count(Upload::get_errors())>0)
				{
				$file= Upload::get_errors()[0];
				throw new Exception($file['errors'][0]['message']);
				//Session::set_flash('error',$file['name']. ' generated Error : '. 
				 //$file['errors'][0]['message']);
				}
		else{
			throw new Exception('Undefined error occured please try again');
		}
		return $value;
	}
	
	public static function filedownload($name, $newname)
	{
		//echo($name);die;
		File::download(DOCROOT.'files/'.$name, $newname);
	}
	public static function ViewPic($savedAs,$class=null,$width=NULL)
	{
		if($savedAs!="")
		echo Asset::img('profilepics/'.$savedAs,['class'=>($class!=NULL?$class:''),
		'width'=>($width!=NULL?$width:'')]);
		
	}
}