<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Settings\SettingModel;
use App\Models\Team\TeamCategory;
use App\Models\Team\TeamModel;
use App\Models\Pages\PageTypeModel;

class SidebarInnerComposer{

	public function __construct()
	{
        // Dependencies automatically resolved by service container...
	}

	public function compose(View $view){

		$view->with('useful_info', PostModel::where(['post_type'=>9,'post_parent'=>0])
			->orderBy('post_order','asc')
			->get());

		$view->with('company', PostModel::where(['post_type'=>1,'post_parent'=>0])
			->orderBy('post_order','asc')
			->get());
			
		$view->with('first_team', TeamModel::where(['category' => 1, 'status' => '1'])
        	->orderBy('ordering','asc')
        	->get());
        	
    	$view->with('team', TeamCategory::first());
        
    	$view->with('book_sidebar', PageTypeModel::where('is_menu','1')->get());

	}

}