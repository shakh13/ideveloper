<?php
/**
 * Created by PhpStorm.
 * User: atm
 * Date: 14.09.2018
 * Time: 10:51
 */
namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Nav extends \yii\base\Widget{


    private $logo = '<img src="logo1.png"><div class="hide-on-med-and-down">iDeveloper</div>';
    private $items = [];
    private $class = "blue-grey darken-4";
    private $type = "navbar-fixed";
    private $content = "";


    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @return string
     */


    private function fill($var){
        return isset($var)? (strlen($var) == 0 ? '' : $var) : '';
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return Widget[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Widget[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        ?>
            <div class="<?= $this->type ?>">
                <nav class="<?= $this->class ?>">
                    <div class="nav-wrapper container grey-text">
                        <?= Html::a($this->logo, ['/site'], ['class' => 'brand-logo grey-text', 'id' => 'brand-logo']) ?>
                        <a href="#" data-target="mobile-menu" class="sidenav-trigger">
                            <i class="material-icons grey-text">menu</i>
                        </a>
                        <?= $this->content ?>
                        <ul class="right hide-on-med-and-down">
                            <?php
                                foreach ($this->items as $item){
                                    $item['attrs'] = isset($item['attrs']) ? $item['attrs'] : '';
                                    $item['class'] = isset($item['class']) ? $item['class'] : '';
                                    $item['url'] = isset($item['url']) ? Html::a($item['content'], $item['url'], ['class' => $item['class']]) : $item['content'];
                                    echo "<li ".$item['attrs'].">".$item['url']."</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        <?php
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
?>