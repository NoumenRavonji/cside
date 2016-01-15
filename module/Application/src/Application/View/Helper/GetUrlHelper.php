<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class GetUrlHelper extends AbstractHelper
{
    public function __invoke($url)
    {
        if(is_string($url)){
			return $url;
		}

		$urlInside = array();

		if(!empty($url['controller'])){
			$urlInside['controller'] = $url['controller'];
		}

		if(!empty($url['action'])){
			$urlInside['action'] = $url['action'];
		}

		if(!empty($url['id'])){
			$urlInside['id'] = $url['id'];
		}

		$newUrl = $this->getView()->url(
			(!empty($url['route'])) ? ($url['route']) : 'application',
			$urlInside
		);

		return $newUrl;
    }
}
?>