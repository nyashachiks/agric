<?php
use Orm\Model;

class Model_Profilepic extends Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'saved_as',
		'actual_name',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
public static function getProfilePic($uid)
{
	
	$result=	Model_Profilepic::query()->select('saved_as')->
	where('user_id',$uid)->order_by('id','desc')->get_one();
	//Debug::dump($result->saved_as);die;
	if(isset($result))
		return 'profilepics/'.$result->saved_as;
	else	
		return 'users/chidad.jpg';
}
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		//$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		//$val->add_field('saved_as', 'Saved As', 'required|max_length[255]');
		//$val->add_field('actual_name', 'Actual Name', 'required|max_length[255]');

		return $val;
	}

}
