<?php


namespace BlizzardApiService\Context;


class AccessToken
{
    private $accessToken, $validUntil;

    /**
     * AccessToken constructor.
     * @param string $accessToken
     * @param int $validUntil
     */
    public function __construct(string $accessToken, int $validUntil)
    {
        $this->accessToken = $accessToken;
        $this->validUntil  = $validUntil;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return object $this
     */
    public function setAccessToken(string $accessToken): object
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return int
     */
    public function getValidUntil(): int
    {
        return $this->validUntil;
    }

    /**
     * @param int $validUntil
     * @return object $this
     */
    public function setValidUntil(int $validUntil): object
    {
        $this->validUntil = $validUntil;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString():string
    {
        return $this->accessToken;
    }
}