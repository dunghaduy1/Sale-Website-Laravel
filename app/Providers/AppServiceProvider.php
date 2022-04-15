<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Config;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		// $subtotal=0;
		// $carts=\Cart::content();
		// foreach (\Cart::content() as $key => $value) {
		// 	$subtotal+=$value->price*$value->qty;
		// }
		// dd($subtotal);

		View::composer('*', function ($view) {
			$view->with('category_pro', Category::where([['status', '=', '1'], ['parent_id', '=', '0'], ['type', '=', '1']])->orderby('name')->get());
			$view->with('category_pa', Category::where([['status', '=', '1'], ['parent_id', '>', '0'], ['type', '=', '1']])->orderby('name')->get());
			$view->with('category_blog', Category::where([['status', '=', '1'], ['parent_id', '=', '0'], ['type', '=', '0']])->orderby('name')->get());
			$view->with('category_parent', Category::where([['status', '=', '1'], ['parent_id', '>', '0'], ['type', '=', '0']])->orderby('name')->get());
			$view->with('carts', \Cart::content());
			$subtotal=0;
			$carts=\Cart::content();
			foreach (\Cart::content() as $key => $value) {
				$subtotal+=$value->price*$value->qty;
			}
			$view->with('subtotal', $subtotal);
			$ship=$subtotal>0?20000:0;
			$view->with('fee_ship', $ship);
			$view->with('logo', Config::where([['slug', '=', 'logo'], ['type', '=', '1']])->first());
			$view->with('logo_footer', Config::where([['slug', '=', 'logo-footer'], ['type', '=', '1']])->first());
			$view->with('intro', Config::where([['slug', '=', 'intro'], ['type', '=', '3']])->first());
			$view->with('ads', Config::where([ ['type', '=', '2']])->get());
			$view->with('address', Config::where([['slug', '=', 'address'], ['type', '=', '3']])->first());
			$view->with('phone', Config::where([['slug', '=', 'phone'], ['type', '=', '3']])->first());
			$view->with('email', Config::where([['slug', '=', 'email'], ['type', '=', '3']])->first());
			$view->with('gmap', Config::where([['slug', '=', 'gmap'], ['type', '=', '3']])->first());
			$view->with('worktime', Config::where([['slug', '=', 'worktime'], ['type', '=', '3']])->first());
			
			// dd($logo);
		});
	}

}
