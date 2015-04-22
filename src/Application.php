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

    /** Universal controller action */
    public function __handler()
    {
        $html = '';

        // TODO: This approach must be removed in favor of events
        // Iterate all loaded applications
        foreach (self::$loaded as $app) {
            // Try to find application help view
            if ($app->findView('help/index')) {
                // Render help page
                $html .= $app->view('help/index')->output();
            }
        }

        // Fire event when application help is rendered
        \samsonphp\event\Event::fire('help.content.rendered', array(&$html));

        $this->view('index')
            ->title(t($this->name, true))
        ->set('content', $html);
    }
}