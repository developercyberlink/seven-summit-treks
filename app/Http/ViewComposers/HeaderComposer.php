<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostTypeModel;
use App\Models\Posts\PostModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Travels\DestinationModel;
use App\Models\Travels\ActivityModel;
use App\Models\Expeditions\ExpeditionModel;
use App\Models\Pages\PageTypeModel;

class HeaderComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('navigations', PostTypeModel::where(['is_menu'=>'1'])
			->orderBy('ordering','asc')
			->get());

		$view->with('expeditions',ExpeditionModel::orderBy('ordering','asc')->get());

		$view->with('activities', ActivityGroupModel::where(['status'=>1])
			->orderBy('ordering','asc')
			->get());

		$view->with('allregions',RegionModel::orderBy('ordering','asc')->get());
		
		$view->with('destination', DestinationModel::where(['status'=>1])
			->orderBy('ordering','asc')
			->get());
			
		$view->with('pagetypes',PageTypeModel::where(['is_menu'=>'1'])
			->orderBy('ordering','asc')
			->get());
			
		$view->with('expedition_first',ExpeditionModel::where('id','1')->first());
	}
	
}