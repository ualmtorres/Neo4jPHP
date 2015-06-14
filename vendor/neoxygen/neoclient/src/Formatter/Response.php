<?php

namespace Neoxygen\NeoClient\Formatter;

class Response
{
    private $rawResponse;

    private $results;

    private $rows;

    private $errors = [];

    public function setRawResponse($rawResponse)
    {
        $this->rawResponse = $rawResponse;

        if (isset($rawResponse['errors'])) {
            if (!empty($rawResponse['errors'])) {
                $this->errors = $rawResponse['errors'][0];
            }
        }
    }

    public function getJsonResponse()
    {
        $json = json_encode($this->rawResponse);

        return $json;
    }

    public function getResponse()
    {
        return $this->rawResponse;
    }

    public function addResult(Result $result)
    {
        $this->results[] = $result;
    }

    public function getResult()
    {
        if (null !== $this->results && !$this->results instanceof Result) {
            reset($this->results);

            return $this->results[0];
        }

        return $this->results;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function setResult(Result $result)
    {
        $this->results = $result;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function containsResults()
    {
        if (isset($this->rawResponse['results']) && !empty($this->rawResponse['results'])) {
            return true;
        }

        return false;
    }

    public function containsRows()
    {
        if (isset($this->rawResponse['results'][0]['columns']) && !empty($this->rawResponse['results']['0']['columns'])) {
            return true;
        }

        return false;
    }

    public function setRows(array $rows)
    {
        $this->rows = $rows;
    }

    public function geRows()
    {
        return $this->rows;
    }

    public function hasRows()
    {
        return null !== $this->rows;
    }

    public function getBody()
    {
        return $this->rawResponse;
    }
}
