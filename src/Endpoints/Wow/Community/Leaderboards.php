<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Leaderboards extends Endpoint
{
    protected $possibleBrackets = ['2v2', '3v3', '5v5', 'rbg'];
    protected $endpointUrl      = '/wow/leaderboard/';

    public function get($bracket){
        if (!in_array($bracket, $this->possibleBrackets)){
            throw new \Exception(
                "Bracket $bracket not one of the possible values. " .
                implode(', ', $this->possibleBrackets)
            );
        }
        $this->requestUrl .= $this->endpointUrl . $bracket;
        return $this->sendRequest();
    }
}
