<?php

 namespace App\Providers;
 
 use Illuminate\Support\Facades\View;
 use Illuminate\Support\ServiceProvider;
 
 // 解説20
 use Validator;
 use App\Http\Validators\MailformValidator;
 
class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$validator = $this->app['validator'];
		$validator->resolver(function($translator,$data,$rules,$messages){
			return new MailformValidator($translator,$data,$rules,$messages);
		});
    }
 
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}