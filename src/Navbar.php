<?php
/**
 * @link https://shintio.com/
 * @copyright Copyright (c) 2018 Shintio
 * @license https://shintio.com/license/
 */

namespace shintio\uikit;

/**
 * Navbar renders an navbar uikit component
 *
 * For example,
 *
 * ```php
 * Navbar::begin();
 *
 * Navbar::beginLeft();
 * echo Nav::widget();
 * echo Html::button();
 * Navbar::endLeft();
 *
 * Navbar::end();
 * ```
 *
 * @see https://getuikit.com/docs/navbar
 * @author Aleksey Fedorenko <af@shintio.com>
 * @since 3.0
 */
/**
 * Class Navbar
 * @package shintio\uikit
 */
class Navbar extends Widget
{
	/**
	 * @var array $options . Options for <nav> navbar tag.
	 */
	public $options;

	/**
	 *
	 */
	public function init()
	{
		parent::init();

		Html::addCssClass($this->options,'uk-navbar-container');
		$this->options['uk-navbar']=true;

		echo Html::beginTag('nav',$this->options);
	}

	/**
	 * @return HtmlContent|string
	 */
	public function run()
	{
		echo Html::endTag('nav');
	}

	/**
	 * Render begin <div> left nav wrapper tag.
	 *
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function beginLeft($options=[])
	{
		Html::addCssClass($options,'uk-navbar-left');

		echo Html::beginTag('div',$options);
	}

	/**
	 * Render end </div> left nav wrapper tag.
	 */
	public static function endLeft()
	{
		echo Html::endTag('div');
	}

	/**
	 * Render <div> left nav wrapper tag.
	 *
	 * @param string $content . Content which renrered in <div> nav wrapper tag.
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function left($content,$options=[])
	{
		Html::addCssClass($options,'uk-navbar-left');

		echo Html::tag('div',$content,$options);
	}

	/**
	 * Render begin <div> center nav wrapper tag.
	 *
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function beginCenter($options=[])
	{
		Html::addCssClass($options,'uk-navbar-center');

		echo Html::beginTag('div',$options);
	}

	/**
	 * Render end </div> center nav wrapper tag.
	 */
	public static function endCenter()
	{
		echo Html::endTag('div');
	}

	/**
	 * Render <div> center nav wrapper tag.
	 *
	 * @param string $content . Content which renrered in <div> nav wrapper tag.
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function center($content,$options=[])
	{
		Html::addCssClass($options,'uk-navbar-center');

		echo Html::tag('div',$content,$options);
	}

	/**
	 * Render begin <div> right nav wrapper tag.
	 *
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function beginRight($options=[])
	{
		Html::addCssClass($options,'uk-navbar-right');

		echo Html::beginTag('div',$options);
	}

	/**
	 * Render end </div> right nav wrapper tag.
	 */
	public static function endRight()
	{
		echo Html::endTag('div');
	}

	/**
	 * Render <div> right nav wrapper tag.
	 *
	 * @param string $content . Content which renrered in <div> nav wrapper tag.
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function right($content,$options=[])
	{
		Html::addCssClass($options,'uk-navbar-right');

		echo Html::tag('div',$content,$options);
	}

	/**
	 * Render begin <div> nav wrapper tag.
	 *
	 * @param string $align . Align for <div> nav wrapper tag.(left,center,right)
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function beginAlign($align,$options=[])
	{
		Html::addCssClass($options,'uk-navbar-'.$align);

		echo Html::beginTag('div',$options);
	}

	/**
	 * Render end </div> nav wrapper tag.
	 */
	public static function endAlign()
	{
		echo Html::end('div');
	}

	/**
	 * Render <div> nav wrapper tag.
	 *
	 * @param string $align . Align for <div> nav wrapper tag.(left,center,right)
	 * @param string $content . Content which renrered in <div> nav wrapper tag.
	 * @param array $options . Options for <div> nav wrapper tag.
	 */
	public static function align($align,$content,$options=[])
	{
		Html::addCssClass($options,'uk-navbar-'.$align);

		echo Html::tag('div',$content,$options);
	}
}
