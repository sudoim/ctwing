<?php

namespace Sudoim\CTWing\IoT\Kernel;

abstract class BaseAction
{
    protected BaseClient $client;

    protected string $uri = '';

    protected string $apiVersion = '';

    protected array $query = [];

    protected array $body = [];

    protected array $headers = [];

    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setApiVersion(string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    protected function getApiVersion(string $default): string
    {
        return 'v' . ($this->apiVersion ? : $default);
    }

    protected function setQuery(string $name, mixed $value): self
    {
        $this->query[$name] = $value;

        return $this;
    }

    protected function getQuery(): array
    {
        return $this->query;
    }

    protected function setBody(string $name, mixed $value): self
    {
        $this->body[$name] = $value;

        return $this;
    }

    protected function getBody(): array
    {
        return $this->body;
    }

    protected function setHeader(string $name, mixed $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    protected function getHeaders(): array
    {
        return $this->headers;
    }

    abstract public function send();
}