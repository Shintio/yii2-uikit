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
 * Breadcrumbs renders an breadcrumb uikit component
 *
 * For example,
 *
 * ```php
 * $this->params['breadcrumbs'][]=['Home'=>['site/index']];
 * $this->params['breadcrumbs'][]='Contact';
 *
 * echo Breadcrumb::widget();
 * ```
 *
 * @see https://getuikit.com/docs/breadcrumb
 * @author Aleksey Fedorenko <af@shintio.com>
 * @since 3.0
 */
class Breadcrumbs extends Widget
{
	/**
	 * @var array $options . Options for <ul> breadcrumbs tag.
	 */
	public $options;
	/**
	 * @var array $contentOptions . Options for <li> content tag.
	 */
	public $contentOptions;
	/**
	 * @var array $linkOptions . Options for <a> link tag.
	 */
	public $linkOptions;
	/**
	 * @var array $activeOptions . Options for <span> active element tag.
	 */
	public $activeOptions;

	/**
	 * @var array $data . Array of breadcrumbs.
	 * The following formats are supported:
	 * - null. Widget get array from Yii::$app->view->params['breadcrumbs'].
	 * - [[$page1=>$link],$page2]. $link used to get href from Url::to($link);
	 */
	public $data;

	/**
	 *
	 */
	public function init()
	{
		parent::init();

		Html::addCssClass($this->options,'uk-breadcrumb');
		$this->data=isset($this->data)?$this->data:\Yii::$app->view->params['breadcrumbs'];
	}

	/**
	 * @return HtmlContent|string
	 */
	public function run()
	{
		$html=new HtmlContent();

		Html::appendBeginTag($html,'ul',$this->options);

		foreach($this->data as $key=>$item)
		{
			Html::appendBeginTag($html,'li',$this->contentOptions);

			if(is_array($item))
			{
				foreach($item as $name=>$link)
				{
					Html::append($html,Html::a($name,$link,$this->linkOptions));
				}
			}
			else
			{
				Html::appendTag($html,'span',$item,$this->activeOptions);
			}

			Html::appendEndTag($html,'li');
		}

		Html::appendEndTag($html,'ul');

		return $html;
	}
}
