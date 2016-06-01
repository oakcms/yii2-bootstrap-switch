<?php
/**
 * Created by Vladimir Hryvinskyy.
 * Site: http://codice.in.ua/
 * Date: 01.06.2016
 * Project: oakcms
 * File name: Switcher.php
 */

namespace oakcms\bootstrapswitch;

use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Switcher renders a checkbox type toggle switch control. For example:
 *
 * ```
 * <?= \oakcms\yii2-bootstrap-switch\Switcher::widget([
 *      'name' => 'Test',
 *      'clientOptions' => [
 *          'size' => 'large',
 *          'onColor' => 'success',
 *          'offColor' => 'danger'
 *      ]
 *  ]);?>
 * ```
 *
 * @author Volodumur Hrivinskiy <amigo.cobos@gmail.com>
 * @link http://www.codice.in.ua
 * @package oakcms\yii2-bootstrap-switch
 */

class Switcher extends InputWidget
{
    use SwitchTrait;

    /**
     * @var bool whether to display the label inline or not. Defaults to true.
     */
    public $inlineLabel = true;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            $input = Html::activeCheckbox($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::checkbox($this->name, $this->checked, $this->options);
        }
        echo $this->inlineLabel ? $input : Html::tag('div', $input);
        $this->selector = "#{$this->options['id']}";
        $this->registerClientScript();
    }

}
