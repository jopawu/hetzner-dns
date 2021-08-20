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
     * @param bool $withRecords
     * @return Data\Zone[]
     */
    public function allZones($withRecords = false)
    {
        // TODO: consider pagination

        $request = new Query\GetAllZones($this->endpoint);
        $response = $request->execute();

        $zones = [];

        foreach( $response->getResponseArray()['zones'] as $zoneData )
        {
            $zone = $this->dataFactory->zone($zoneData['id'], $zoneData['name']);

            if( $withRecords )
            {
                $zone->setRecords( $this->allRecords($zone) );
            }

            $zones[] = $zone;
        }

        return $zones;
    }

    /**
     * @param Data\Zone $zone
     * @return Data\Record[]
     */
    public function allRecords(Data\Zone $zone)
    {
        // TODO: consider pagination

        $request = new Query\GetAllRecords($this->endpoint, $zone);
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
