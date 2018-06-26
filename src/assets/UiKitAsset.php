<?php
/**
 * @link https://shintio.com/
 * @copyright Copyright (c) 2018 Shintio
 * @license https://shintio.com/license/
 */

namespace shintio\uikit\assets;
use yii\web\AssetBundle;

/**
 * Asset bundle for the UiKit files.
 *
 * @see https://getuikit.com/
 * @author Aleksey Fedorenko <af@shintio.com>
 * @since 3.0
 */
class UiKitAsset extends AssetBundle
{
	public $sourcePath = '@vendor/uikit/yii2-uikit/uikit';

	public $css = [
		'dist/css/uikit.min.css',
	];
	public $js = [
		'dist/js/uikit.min.js',
		'dist/js/uikit-icons.min.js',
	];
}
