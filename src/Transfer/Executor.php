<?php
namespace iit\Hetzner\DNS\Transfer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Executor
{
    public function allZones()
    {
        $request = new Query\GetAllZones($this->endpoint);
        $request->setRecord($record);
        $response = $request->execute();
    }

    public function updateRecord()
    {
        $request = new Command\UpdateRecord($this->endpoint);
        $response = $request->execute();
    }

}
