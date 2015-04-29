<?php namespace Aozisik\GruntCacheBuster;

use Illuminate\Support\Facades\Facade;

class CacheBusterFacade extends Facade
{
	protected static function getFacadeAccessor() { return 'cacheBuster'; }	
}