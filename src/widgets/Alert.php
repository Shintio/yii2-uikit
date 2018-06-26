<?php
/**
 * @link https://shintio.com/
 * @copyright Copyright (c) 2018 Shintio
 * @license https://shintio.com/license/
 */

namespace shintio\uikit\widgets;

use shintio\uikit\helpers\Html;
use shintio\uikit\HtmlContent;
use shintio\uikit\Widget;

/**
 * Alert renders an alert uikit component
 *
 * For example,
 *
 * ```php
 * echo Alert::widget();
 * ```
 *
 * @see https://getuikit.com/docs/alert
 * @author Aleksey Fedorenko <af@shintio.com>
 * @since 3.0
 */
class Alert extends Widget
{
	/**
	 * @var array $options . Options for <div> alert tag.
	 */
	public $options;
	/**
	 * @var array $contentOptions . Options for <p> content tag.
	 */
	public $contentOptions;

	/**
	 * @var array $data . Array of alerts.
	 * The following formats are supported:
	 * - null. Widget get array from Yii::$app->session->getAllFlashes(). For put element in this containet use Yii::$app->session->setFlash($key,$value).
	 * - [$key=>$value]. Render one alert with type of $key and content $value.
	 * - [$key=>[$value1,$value2]]. Render some alert withs type of $key.
	 */
	public $data;

	/**
	 *
	 */
	public function init()
	{
		parent::init();

		$this->data=isset($this->data)?$this->data:\Yii::$app->session->getAllFlashes();
	}

	/**
	 * @return HtmlContent|string
	 */
	public function run()
	{
		$html=new HtmlContent();

		foreach($this->data as $type=>$item)
		{
			if(is_array($item))
			{
				foreach($item as $key=>$value)
				{
					Html::append($html,Html::alert($value,$type,$this->options,$this->contentOptions));
				}

			}
			else
			{
				Html::append($html,Html::alert($item,$type,$this->options,$this->contentOptions));
			}
		}

		return $html;
	}
}
