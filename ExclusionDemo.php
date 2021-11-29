<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\ExclusionDemo;

use Piwik\Tracker\Request;

class ExclusionDemo extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return array(
            'Tracker.isExcludedVisit' => 'isExcludedVisit'
        );
    }

    public function isTrackerPlugin()
    {
        return true;
    }

    public function isExcludedVisit(bool &$excluded, Request $request)
    {
//        var_dump($request->getIp());
        if ($request->getVisitorId() === "something") {
            $excluded = true;
        }
        $params = $request->getParams();
        if ($params["url"] === "something") {
            $excluded = true;
        }
        if ($params["uid"] === "some user id") {
            $excluded = true;
        }
    }
}
