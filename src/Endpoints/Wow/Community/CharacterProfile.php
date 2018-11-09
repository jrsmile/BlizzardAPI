<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterProfile extends Endpoint
{
    const FIELD_ALL          = 524287;
    const FIELD_ACHIEVEMENTS = 1;
    const FIELD_APPEARANCE   = 2;
    const FIELD_FEED         = 4;
    const FIELD_GUILD        = 8;
    const FIELD_HUNTER_PETS  = 16;
    const FIELD_ITEMS        = 32;
    const FIELD_MOUNTS       = 64;
    const FIELD_PETS         = 128;
    const FIELD_PET_SLOTS    = 256;
    const FIELD_PROFESSIONS  = 512;
    const FIELD_PROGRESSION  = 1024;
    const FIELD_PVP          = 2048;
    const FIELD_QUESTS       = 4096;
    const FIELD_REPUTATION   = 8192;
    const FIELD_STATISTICS   = 16384;
    const FIELD_STATS        = 32768;
    const FIELD_TALENTS      = 65536;
    const FIELD_TITLES       = 131072;
    const FIELD_AUDIT        = 262144;

    private $fields = [
        1      => 'achievements',
        2      => 'appearance',
        4      => 'feed',
        8      => 'guild',
        16     => 'hunterPets',
        32     => 'items',
        64     => 'mounts',
        128    => 'pets',
        256    => 'petSlots',
        512    => 'professions',
        1024   => 'progression',
        2048   => 'pvp',
        4096   => 'quests',
        8192   => 'reputation',
        16384  => 'statistics',
        32768  => 'stats',
        65536  => 'talents',
        131072 => 'titles',
        262144 => 'audit',
    ];

    protected $endpointUrl = '/wow/character/';

    public function get($realmSlug, $characterName, $fieldInt = 0){
        if($fieldInt !== 0) {
            $this->parameters['fields'] = $this->calcFields($fieldInt);
        }
        $this->requestUrl = $this->endpointUrl . $realmSlug . '/' . $characterName;

        return $this->sendRequest();
    }

    private function calcFields($fieldInt){
        $usedFields = [];
        $possibleFields = array_reverse($this->fields, true);
        foreach ($possibleFields as $fieldWorth => $field){
            if($fieldInt >= $fieldWorth){
                $usedFields[] = $field;
                $fieldInt    -= $fieldWorth;
            }
        }
        $usedFields = array_reverse($usedFields);
        return implode(',', $usedFields);
    }
}
