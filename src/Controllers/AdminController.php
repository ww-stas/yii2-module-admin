<?php

namespace Diezz\ModuleAdmin\Controllers;

use yii\base\InvalidRouteException;
use yii\web\Controller;

/**
 * Class AdminController
 * Default controller for admin module.
 *
 * @package app\modules\admin\controllers
 */
class AdminController extends Controller
{
    /**
     * Give ability of configure view to the module class.
     *
     * @return \yii\base\View|\yii\web\View
     */
    public function getView()
    {
        if (method_exists($this->module, 'getView')) {
            return $this->module->getView();
        }

        return parent::getView();
    }

    /**
     * Runs an action within this controller with the specified action ID and parameters.
     * If the action ID is empty, the method will use [[defaultAction]].
     *
     * @param string $id     the ID of the action to be executed.
     * @param array  $params the parameters (name-value pairs) to be passed to the action.
     *
     * @return mixed the result of the action.
     * @throws InvalidRouteException if the requested action ID cannot be resolved into an action
     *                               successfully.
     * @see createAction()
     */
    public function runAction($id, $params = [])
    {
        $action = $this->createAction($id);
        if (null !== $action) {
            $this->getView()->subTitle = $this->normalizeName($action->id);
        }
        $this->getView()->title = $this->normalizeName($this->id);
        return parent::runAction($id, $params);
    }

    /**
     * Capitalize word od phrase.
     *
     * @param string $name word to be capitalized.
     *
     * @return string
     */
    protected function normalizeName($name)
    {
        return ucfirst(strtolower($name));
    }
}
