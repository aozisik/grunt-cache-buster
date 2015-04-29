<?php namespace Aozisik\GruntCacheBuster;

use URL, Config; // Config facade

class CacheBuster
{
	public function cacheBustedAssetUrl($url) {
		$base_url   = asset('/');
		$asset_path = str_replace($base_url, '', $url);
		$asset_hash = Config::get('cachebuster.'.$asset_path);
		
		if( ! is_null($asset_hash) && ! empty($asset_hash)) {
			return asset($asset_path).'?v='.$asset_hash;
		}
		
		return asset($asset_path);
	}

	// regular laravel asset helper
	public function asset($path='') {
		return $this->cacheBustedAssetUrl(asset($path));
	}

	// asset by using the theme facade
	public function themeAsset($path='') {
		return $this->cacheBustedAssetUrl(\Theme::asset($path));
	}
}