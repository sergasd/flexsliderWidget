<?php
/**
 * @class FlexSliderWidget
 * widget for jquery plugin flexslider
 * @link http://www.woothemes.com/flexslider/
 * @author sergasd sergasd@gmail.com
 */
class FlexSliderWidget extends CWidget
{

    /**
     * @var array slides.
     * default structure
     * array(
     *      array('content' => 'content for slide 1'),
     *      array('content' => 'content for slide 2'),
     * )
     * may be different depend on template file
    */
    public $slides = array();

    /**
     * @var string path to template for slides
    */
    public $template = 'default';

    /**
     * @var string
    */
    public $containerCssClass = '';

    /**
     * @var boolean whether to load flexslider css file
    */
    public $loadCssFile = true;

    /**
     * @var array plugin options
     * @see http://www.woothemes.com/flexslider/
    */
    public $options = array();

    private $defaultOptions = array(
        'animation' => 'slide',
        'slideshow' => false,
        'controlsContainer' => '.my-flex-container',
        'directionNav' => false,
    );

    private $assetsDir;


    public function run()
    {
        $this->registerScripts();
        $this->render($this->template, array(
            'id' => $this->id,
            'containerCssClass' => $this->containerCssClass,
            'slides' => $this->slides,
        ));
    }


    public function getId($autoGenerate = true)
    {
        $prefix = Yii::app()->request->isAjaxRequest ? 'ajax-' : '';
        return "{$prefix}flex-slider-" . parent::getId($autoGenerate);
    }


    protected function registerScripts()
    {
        $this->assetsDir = Yii::app()->assetManager->publish(__DIR__ . '/assets', false, -1, YII_DEBUG);
        $sliderOptions = CJavaScript::encode(CMap::mergeArray($this->defaultOptions, $this->options));

        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile("{$this->assetsDir}/jquery.flexslider-min.js", CClientScript::POS_END);
        $cs->registerScript($this->id, "$('#{$this->id}').flexslider({$sliderOptions})", CClientScript::POS_LOAD);

        if ($this->loadCssFile) {
            $cs->registerCssFile($this->assetsDir . '/flexslider.css');
        }
    }

}
