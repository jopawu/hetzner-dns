<?php
namespace iit\Hetzner\DNS\Transfer;

use iit\Hetzner\DNS\Data;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Executor
{
    /**
     * @var Endpoint
     */
    protected $endpoint;

    /**
     * @var Data\Factory
     */
    protected $dataFactory;

    /**
     * Executor constructor.
     * @param Endpoint $endpoint
     */
    public function __construct(Endpoint $endpoint, Data\Factory $dataFactory)
    {
        $this->endpoint = $endpoint;
        $this->dataFactory = $dataFactory;
    }

    /**
     * @return Data\Zone[]
     */
    public function allZones()
    {
        // TODO: consider pagination

        $request = new Query\GetAllZones($this->endpoint);
        $response = $request->execute();

        $zones = [];

        foreach( $response->getResponseArray()['zones'] as $zoneData )
        {
            $records = $this->allRecords($zoneData['id']);
            $zones[] = $this->dataFactory->zone($zoneData['id'], $zoneData['name'], $records);
        }

        return $zones;
    }

    /**
     * @param string $zoneId
     * @return Data\Record[]
     */
    public function allRecords($zoneId)
    {
        // TODO: consider pagination

        $request = new Query\GetAllRecords($this->endpoint, $zoneId);
        $response = $request->execute();

        $records = [];

        foreach( $response->getResponseArray()['records'] as $record )
        {
            $records[] = $this->dataFactory->record(
                $record['id'], $record['name'], $record['type'], $record['value']
            );
        }

        return $records;
    }

    public function updateRecord()
    {
        #$request = new Command\UpdateRecord($this->endpoint);
        #$response = $request->execute();
    }

}
