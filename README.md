flexsliderWidget
================

flexslider widget for yii framework based on jquery plugin
http://www.woothemes.com/flexslider/

REQUIREMENTS
------------
1. Yii 1.1.9
2. php 5.3

INSTALLATION
------------
1. Copy files to application/extensions/flexslider directory


USAGE
------------ 
<pre><code>
$this->widget('ext.flexslider.FlexSliderWidget', array(
    'id' => $id,
    'containerCssClass' => 'my-flex-container',
    'slides' => array(
        array('content' => 'Content for slide 1'),
        array('content' => 'Content for slide 2')
    ),
    'options' => array(
        'slideshow' => true,
        'slideshowSpeed' => Yii::app()->params['mainSliderSlideShowSpeed'],
    ),
    'loadCssFile' => true, // or false for disable css file
));
</code></pre>
