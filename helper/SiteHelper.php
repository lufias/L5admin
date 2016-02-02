<?php 



class SiteHelper {
	
	public static function resolveRouteMainMenu($mainParam){		
		$uriArr = explode('/', \Request::route()->getUri());
		return $mainParam == $uriArr[0];

	}

	public static function resolveRouteMenu($mainParam, $subParam){		
		$uriArr = explode('/', \Request::route()->getUri());
		return $mainParam == $uriArr[0] && $subParam == $uriArr[1];

	}

}
