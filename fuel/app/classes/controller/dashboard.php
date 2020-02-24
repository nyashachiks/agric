<?php
class Controller_Dashboard extends Controller_Base
{
	public $template = "template_dash";
	
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Dashboard');
	}

	public function action_index()
	{
		
		// check if there is internet OR if we are on HTTPS
		// if not we dont show the functional weather widget
		
		//all went to waste, we need php5_curl installed for this to work!
		
		$url='https://api.forecast.io';
		$ch=curl_init();
		$timeout=3;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

		$result=curl_exec($ch);
		curl_close($ch);
		
		
		//$result = null;
		
		$there_is_internet = false;
		if(!empty($result)) $there_is_internet =  true;
		//Debug::dump($there_is_internet);die;
		$this->template->set_global('there_is_internet', $there_is_internet);
		
		$myarr=Custom_UserUtility::getUserProfile();
				$role=$myarr['role'];
				if($role==='Agritax')
				{
					Session::set('role',$role);
					//$this->template->set_global('role', $role);
					Response::redirect(\Config::get('routes.agridashboard'));
				}
				else if($role==='AMA Officer')
				{
					Session::set('role',$role);
					//Response::redirect(\Config::get('routes.amadashboard'));
				}
				
				//else
				//Response::redirect(\Config::get('routes.dashboard'));
		
		$farmerstatus=0;
		$query = Model_Farm::query()->where('user_id',  Auth::get_user_id()[1]);
		$farmer_count= $query->count();
		$query = Model_Subscription::query()->where('user_id',  Auth::get_user_id()[1])
		->where('type','farmer')
		->where('subscribed',1)
		->order_by('id','desc');
		$farmer_subscription= $query->get_one();
		//if(count($farmer_subscription)>0)
			//$farmerstatus=count($farmer_subscription);//->subscribed;
		$products=Model_Product::find('all');
		$markets=Model_Market::find('all');
		$prodOffer=Model_Productoffer::query()->where('farmer_id','<>', Auth::get_user_id()[1])->get();
		$productoffers= array();
		foreach ($prodOffer as $item){
				$num=(int)$item->quantity_left;
				if($num>0)
				{
					array_push($productoffers, $item);
				}
				
			
		}		
 		$user_identity=Auth::get_user_id()[1];
 		$myproductoffers=Model_Productoffer::find_by('farmer_id', Auth::get_user_id()[1]);
 		$farms=Model_Farm::find_by('user_id', Auth::get_user_id()[1]);
		$this->template->title = "Dashboard";
		
		$this->template->set_global('user_identity', $user_identity);
		$this->template->set_global('farmsubscription', $farmerstatus);
		$this->template->set_global('myfarms', $farmer_count);
		$this->template->set_global('farms', $farmer_count);
		$this->template->set_global('markets', $markets);
		$this->template->set_global('products', $products);
		$this->template->set_global('productoffers', $productoffers);
		$this->template->set_global('myproductoffers', $myproductoffers);
		$this->template->content = View::forge('dashboard/dashboard');

	}
	
	public function action_agri()
	{
		//$productoffers= Model_Productoffer::find('all');
		$pending='Ungraded';
		$productoffers=Model_Productoffer::query()->where('product_status', $pending)->where('status','open')->get();
		$this->template->set_global('productoffers', $productoffers);
		$status='open';
		$productoffers_rated=Model_Productoffer::query()->where('product_status','!=', $pending)->where('status','open')->get();
		$this->template->set_global('productoffers_rated', $productoffers_rated);
		$productoffers_history=Model_Productoffer::query()->where('status','!=', $status)->get();
		$this->template->set_global('productoffers_history', $productoffers_history);
		$budgets= Model_Budget::find('all');
		$this->template->set_global('budgets', $budgets);
		$this->template->title = "Dashboard Agritex";
		$this->template->content = View::forge('dashboard/dashboard_agri');
	}
	public function action_ama()
	{
		//$productoffers= Model_Productoffer::find('all');
		$query =  Model_Contractapplication::query();
		$open_contractapplications = $query->where('status','=', 'Open')->get();
		$this->template->set_global('open_contractapplications', $open_contractapplications);
		
		$query1 =  Model_Contract::query();
		$open_contracts = $query1->where('status','=', 'Pending')->get();
		$this->template->set_global('open_contracts', $open_contracts);
		
		$query2 =  Model_Contract::query();
		$query3 =  Model_Contract::query();
		$contractsapproved = $query2->where('status','=', 'Approved')->get();
		$contractsdeclined = $query3->where('status','=', 'Declined')->get();
		$this->template->set_global('contractsapproved', $contractsapproved);
		$this->template->set_global('contractsdeclined', $contractsdeclined);
		$budgets= Model_Budget::find('all');
		$this->template->set_global('budgets', $budgets);
		$this->template->title = "Dashboard AMA";
		$this->template->content = View::forge('dashboard/dashboard_ama');
	}
	public function action_agri_rated()
	{
		//$productoffers= Model_Productoffer::find('all');
		$pending='Ungraded';
		$productoffers=Model_Productoffer::query()->where('product_status','!=', $pending)->get();
		$this->template->set_global('productoffers', $productoffers);
		$this->template->title = "Rated Products";
		$this->template->content = View::forge('dashboard/dashboard_agri');
	}
	public function action_agri_history()
	{
		//$productoffers= Model_Productoffer::find('all');
		$status='open';
		$productoffers=Model_Productoffer::query()->where('status','!=', $status)->get();
		$this->template->set_global('productoffers', $productoffers);
		$this->template->title = "Products History";
		$this->template->content = View::forge('dashboard/dashboard_agri');
	}
	public function action_ama_history()
	{
		//$productoffers= Model_Productoffer::find('all');
		$status='open';
		$productoffers=Model_Productoffer::query()->where('status','!=', $status)->get();
		$this->template->set_global('productoffers', $productoffers);
		$this->template->title = "Products History";
		$this->template->content = View::forge('dashboard/dashboard_agri');
	}
	public function action_subscribe()
	{
		if (Input::method() == 'POST')
		{
			
		/*--select subscribed role--*/		
			
				$subscription = Model_Subscription::forge(array(
				'user_id'=>Auth::get_user_id()[1], //array index 1 contains the user id we need
				'type'=>Input::post('type'),
				'subscribed'=>Input::post('subscribe'),
				));
				if ($subscription->save())
				{
					$user=Auth\Model\Auth_User::find(Auth::get_user_id()[1])	;
					$role=Auth\Model\Auth_Role::query()->where('name',$subscription->type)->get_one();
					if($subscription->subscribed==1)//there was a subscription
					{
						$user->roles[]=$role;
						$user->save();
					}
					else//unsubscription
					{
						unset($user->roles[$role->id]);
						$user->save();
					}
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		
	}
}
