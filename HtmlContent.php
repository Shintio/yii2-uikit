<?php

namespace shintio\uikit;

use yii\base\BaseObject;

class HtmlContent extends BaseObject
{
	public $html;

	public function append($html)
	{
		$this->html.=$html;
	}

	public function __toString()
	{
		return $this->html;
	}
}