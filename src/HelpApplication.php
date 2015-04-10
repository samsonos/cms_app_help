<?php
namespace samson\cms\web\help;

/**
 * SamsonCMS generic help application
 * This application serves basic help system and approach to
 * all other possible applications and services.
 *
 * @package samson\cms\web\help
 */
class HelpApplication extends \samson\cms\App
{
    /** Application name */
    public $name = 'Помощь';

    /** Application icon*/
    public $icon = 'fa-question';

    /** Identifier */
    protected $id = 'help';

    /** Universal controller action */
    public function __HANDLER()
    {
        $this->view('index')->title(t($this->name, true));
    }
}