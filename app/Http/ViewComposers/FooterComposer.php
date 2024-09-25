<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Travels\ActivityModel;
use App\Model\TripReview;


class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
		$view->with('footer_text', SettingModel::where('id',1)
			->first());

		$view->with('useful_info', PostModel::where(['post_type'=>9,'post_parent'=>'0'])->orderBy('post_order','asc')->get());	
		$view->with('freviews', TripReview::where('status','1')->orderBy('id', 'desc')->limit(5)->get());



		}	
}