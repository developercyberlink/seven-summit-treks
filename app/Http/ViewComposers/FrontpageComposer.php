<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostModel;
use App\Models\Settings\SettingModel;
use App\Models\Galleries\VideoGalleryModel;

class FrontpageComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
		$view->with('aboutus', PostModel::where(['post_type'=>1,'status'=>1,'id'=>29])
			->first());

		$view->with('recent_notice', PostModel::where(['post_type'=>4,'status'=>1,'post_parent'=>8])->orderBy('id','desc')->limit(5)
			->get());
		
		$view->with('latest_news_tab1', PostModel::where(['post_type'=>9,'status'=>1])->orderBy('id','desc')->limit(5)->get());
		
		$view->with('recent_notice_tab2', PostModel::where(['post_type'=>10,'status'=>1])->orderBy('id','desc')
			->get());
		
		$view->with('latest_video', VideoGalleryModel::orderBy('id','desc')->limit(1)->first());	
			
			
	}
	
}