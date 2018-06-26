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
 * Article renders an article uikit component
 *
 * For example,
 *
 * ```php
 * echo Article::widget([
 *    'title'=>'My post',
 *    'content'=>'Lorem ipsum dolor sit amet.',
 * ]);
 * ```
 *
 * @see https://getuikit.com/docs/article
 * @author Aleksey Fedorenko <af@shintio.com>
 * @since 3.0
 */
class Article extends Widget
{
	/**
	 * @var array $options . Options for <article> article tag.
	 */
	public $options;

	/**
	 * @var string|null $title . Title of article.
	 */
	public $title;
	/**
	 * @var array $titleOptions . Options for <h1> title tag.
	 */
	public $titleOptions;
	/**
	 * @var string|null $meta . Meta information of article.
	 */
	public $meta;
	/**
	 * @var array $metaOptions . Options for <p> meta tag.
	 */
	public $metaOptions;
	/**
	 * @var string|null $lead . Caption of article content.
	 */
	public $lead;
	/**
	 * @var array $leadOptions . Options for <p> caption tag.
	 */
	public $leadOptions;

	/**
	 * @var string|null $content . Article content.
	 */
	public $content;
	/**
	 * @var array $contentOptions . Options for <p> content tag.
	 */
	public $contentOptions;

	/**
	 * @var string|null $footer . Footer for atricle.
	 */
	public $footer;
	/**
	 * @var array $footerOptions . Options for <div> footer tag.
	 */
	public $footerOptions;

	/**
	 *
	 */
	public function init()
	{
		parent::init();

		Html::addCssClass($this->options,'uk-article');
		Html::addCssClass($this->options,'uk-article');
		Html::addCssClass($this->titleOptions,'uk-article-title');
		Html::addCssClass($this->metaOptions,'uk-article-meta');
		Html::addCssClass($this->leadOptions,'uk-text-lead');
	}

	/**
	 * @return HtmlContent|string
	 */
	public function run()
	{
		$html=new HtmlContent();

		Html::appendBeginTag($html,'article',$this->options);

		Html::appendIfTag($html,'h1',$this->title,$this->titleOptions);
		Html::appendIfTag($html,'p',$this->meta,$this->metaOptions);
		Html::appendIfTag($html,'p',$this->lead,$this->leadOptions);
		Html::appendIfTag($html,'p',$this->content,$this->contentOptions);
		Html::appendIfTag($html,'div',$this->footer,$this->footerOptions);

		Html::appendEndTag($html,'article');

		return $html;
	}
}
