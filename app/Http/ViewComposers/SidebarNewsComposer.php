<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Settings\SettingModel;

class SidebarNewsComposer{

	public function __construct()
	{
        // Dependencies automatically resolved by service container...
	}

	public function compose(View $view){

		$view->with('quick_links', PostModel::where(['post_type'=>9,'post_parent'=>0])
			->orderBy('post_order','asc')
			->get());
		$view->with('news_categories', PostCategoryModel::where(['post_type'=>19])
			->orderBy('ordering','asc')
			->get());

	}

}