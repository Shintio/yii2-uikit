<?php

namespace shintio\uikit;

use yii\helpers\ArrayHelper;

// TODO: ?Align
// TODO: ?Animation
// TODO: ?Background
// TODO: ?Base
// TODO: Card
// TODO: Close
// TODO: Column
// TODO: Comment
// TODO: Container
// TODO: Countdown
// TODO: Cover
// TODO: Description List
// TODO: Divider
// TODO: Dotnav
// TODO: Drop
// TODO: Dropdown
// TODO: Flex
// TODO: Form
// TODO: Grid
// TODO: Grid Parallax
// TODO: Heading
// TODO: Iconnav
// TODO: Inverse
// TODO: Label
// TODO: Lightbox
// TODO: Link
// TODO: List
// TODO: Margin
// TODO: Marker
// TODO: Modal
// TODO: Nav
// TODO: Navbar
// TODO: Notification
// TODO: Off-canvas
// TODO: Overlay
// TODO: Padding
// TODO: Pagination
// TODO: Parallax
// TODO: Placeholder
// TODO: Position
// TODO: Print
// TODO: Progress
// TODO: Scroll
// TODO: Scrollspy
// TODO: Search
// TODO: Section
// TODO: Slidenav
// TODO: Slider
// TODO: Slideshow
// TODO: Sortable
// TODO: Spinner
// TODO: Sticky
// TODO: Subnav
// TODO: Switcher
// TODO: Tab
// TODO: Table
// TODO: Text
// TODO: Thumbnav
// TODO: Tile
// TODO: Toggle
// TODO: Tooltip
// TODO: Totop
// TODO: Transition
// TODO: Upload
// TODO: Utility
// TODO: Visibility
// TODO: Width

class Html extends \yii\helpers\Html
{
	/* COMPONENTS */

	public static function alert($text,$type='primary',$options=[],$contentOptions=[])
	{
		$content=self::tag('a','',[
			'class'=>'uk-alert-close',
			'uk-close'=>true
		]);
		$content.=self::tag('p',$text,$contentOptions);

		self::addCssClass($options,'uk-alert-'.$type);

		return self::tag('div',$content,array_merge($options,['uk-alert'=>true]));
	}

	public static function badge($value,$options=[])
	{
		self::addCssClass($options,'uk-badge');

		return static::tag(span,$value,$options);
	}

	public static function button($content='Button',$type='default',$options=[])
	{
		self::addCssClass($options,'uk-button');
		self::addCssClass($options,'uk-button-'.$type);

		return self::tag('button',$content,$options);
	}

	public static function linkButton($content='Button',$type='default',$url=[],$options=[])
	{
		self::addCssClass($options,'uk-button');
		self::addCssClass($options,'uk-button-'.$type);

		return self::a($content,$url,$options);
	}

	public static function icon($name,$options=[])
	{
		$tag=ArrayHelper::remove($options,'tag','span');
		$options['uk-icon']=$name;

		return static::tag($tag,'',$options);
	}

	/* TOOLS */

	public static function ifTag($name,$content=null,$options=[])
	{
		return isset($content)?self::tag($name,$content,$options):'';
	}

	public static function append(&$html,$append)
	{
		if(is_a($html,HtmlContent::className()))
		{
			/** @var $html HtmlContent */
			$html->append($append);
		}
		else
		{
			$html.=$append;
		}
	}

	public static function appendTag(&$html,$name,$content='',$options=[])
	{
		self::append($html,self::tag($name,$content,$options));
	}

	public static function appendBeginTag(&$html,$name,$options=[])
	{
		self::append($html,self::beginTag($name,$options));
	}

	public static function appendEndTag(&$html,$name)
	{
		self::append($html,self::endTag($name));
	}

	public static function appendIfTag(&$html,$name,$content=null,$options=[])
	{
		self::append($html,self::ifTag($name,$content,$options));
	}

	public static function widget($name,$config)
	{
		$className=(__NAMESPACE__.'\\'.$name);

		return $className::widget($config);
	}

	public static function widgetAccordion($config)
	{
		return Accordion::widget($config);
	}

	public static function widgetAlert($config)
	{
		return Alert::widget($config);
	}

	public static function widgetArticle($config)
	{
		return Article::widget($config);
	}
}
