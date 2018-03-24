<?php
/**
 * @link https://shintio.com/
 * @copyright Copyright (c) 2018 Shintio
 * @license https://shintio.com/license/
 */

namespace shintio\uikit;

/**
 * Accordion renders an accordion uikit component
 *
 * For example,
 *
 * ```php
 * echo Accordion::widget([
 *    'items'=>[
 *        [
 *            'title'=>'Element 1',
 *            'content'=>'Lorem ipsum.',
 *        ],
 *        [
 *            'title'=>'Example 2',
 *            'content'=>'Dolor sit amet.',
 *        ]
 *    ]
 * ]);
 * ```
 *
 * @see https://getuikit.com/docs/accordion
 * @author Aleksey Fedorenko <af@shintio.com>
 * @since 3.0
 */
class Accordion extends Widget
{
	/**
	 * @var string $modificator. Option to attribute uk-accordion.
	 */
	public $modificator;

	/**
	 * @var array $options. Options for <ul> accordion tag.
	 */
	public $options;

	/**
	 * @var array $items. Array of accordion items.
	 */
	public $items;
	/**
	 * @var string|null $itemView. View witch rendered to all items.
	 */
	public $itemView;
	/**
	 * @var array $itemOptions. Options for <li> item tag.
	 */
	public $itemOptions;

	/**
	 * @var array $headerOptions. Options for <a> header tag.
	 */
	public $headerOptions;
	/**
	 * @var array $contentOptions. Options for <div> content tag.
	 */
	public $contentOptions;

	/**
	 *
	 */
	public function init()
	{
		parent::init();

		$this->modificator=isset($this->modificator)?$this->modificator:true;

		Html::addCssClass($this->headerOptions,'uk-accordion-title');
		Html::addCssClass($this->contentOptions,'uk-accordion-content');
	}

	/**
	 * @return HtmlContent|string
	 */
	public function run()
	{
		$html=new HtmlContent();

		Html::appendBeginTag($html,'ul',array_merge($this->options,['uk-accordion'=>$this->modificator]));

		foreach($this->items as $key=>$item)
		{
			Html::appendBeginTag($html,'li',$this->itemOptions);

			Html::appendTag($html,'a',isset($item['title'])?$item['title']:$key,$this->headerOptions);
			Html::appendTag($html,'div',isset($itemView)?$this->render($itemView,$item['content']):$item['content'],$this->contentOptions);

			Html::appendEndTag($html,'li');
		}

		Html::appendEndTag($html,'ul');

		return $html;
	}
}
