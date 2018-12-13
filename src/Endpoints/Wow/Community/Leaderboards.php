<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;
use BlizzardApiService\Exceptions\BracketException;

class Leaderboards extends Endpoint
{
    protected $possibleBrackets = ['2v2', '3v3', '5v5', 'rbg'];
    protected $endpointUrl      = '/wow/leaderboard/%s';

    public function __construct(string $bracket){
        if (!in_array($bracket, $this->possibleBrackets)){
            throw new BracketException(
                $bracket, implode(', ', $this->possibleBrackets)
            );
        }
        $this->setUrl($bracket);
        parent::__construct();
    }
}
