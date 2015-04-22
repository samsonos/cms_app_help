<?php
namespace samsoncms\app\help;

/**
 * SamsonCMS generic help application
 * This application serves basic help system and approach to
 * all other possible applications and services.
 *
 * @package samson\cms\web\help
 */
class Application extends \samsoncms\Application
{
    /** Application name */
    public $name = 'Помощь';

    /** Application icon*/
    public $icon = 'question';

    /** Identifier */
    protected $id = 'help';

    /**
     * Event handler for rendering main menu sub menu
     * @param string $html Main menu HTML
     * @param string $subMenu Sub menu HTML
     */
    public function subMenuHandler(&$html, &$subMenu)
    {
        $subMenu = '<li><a href="#top">'.t('В начало', true).'</a></li>';

        // Fire event when application help is rendered
        \samsonphp\event\Event::fire('help.submenu.rendered', array(&$subMenu));
    }

    /** Universal controller action */
    public function __handler()
    {
        // Render menu
        \samsonphp\event\Event::subscribe('template.menu.rendered', array($this, 'subMenuHandler'));

        $html = '';

        // Fire event when application help is rendered
        \samsonphp\event\Event::fire('help.content.rendered', array(&$html));

        // Prepare view
        $this->view('index')
            ->title(t($this->name, true))
        ->set('content', $html);
    }
}