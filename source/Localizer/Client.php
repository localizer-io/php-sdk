<?php

/**
 * Localizer client
 *
 * @author Alexander "grevus" Lobtsov <alex@lobtsov.com>
 */

class Localizer_Client
{
    /**
     * Base url
     *
     * @var string
     */

    private $_base_url = 'https://localizer.io/';

    /**
     * Key
     *
     * @var string
     */

    private $_key;

    /**
     * Options
     *
     * @var array
     */

    private $_options = array();

    /**
     * Transport
     *
     * @var object
     */

    private $_transport;

    /**
     * Construct
     *
     * @param array $options
     */

    public function __construct(array $options)
    {
        if (!array_key_exists('key', $options))
            throw new BadMethodCallException('`key` missed in options');

        $this->_key = (string) $options['key'];
        unset($options['key']);

        // For tests etc
        if (array_key_exists('base_url', $options))
        {
            $this->_base_url = $options['base_url'];
            unset($options['base_url']);
        }

        $this->_options = $options;
    }

    /**
     * Get project list
     *
     * @param int $offset
     * @param int $count
     *
     * @return array
     */

    public function getProjectList($offset = 0, $count = 25)
    {
        $response = $this->getTransport()->get(
            'api/project/list.json',
            array(
                'query' => array(
                    'offset'    => (int) $offset,
                    'count'     => (int) $count,
                    'key'       => $this->_key,
                ),
            )
        );

        return $this->processAnswer($response);
    }

    /**
     * Process answer
     *
     * @param \Guzzle $response
     *
     * @return array
     */

    protected function processAnswer($response)
    {
        if (!$response->getStatusCode() == 200)
            throw new RuntimeException('Wrong status code answer: ' . var_export($response->getStatusCode(), true));

        $response->getBody()->seek(0);

        $result = $response->getBody()->getContents();
        $data   = @json_decode($result, true);

        if ($data === false || !is_array($data))
            throw new RuntimeException('Wrong json in answer');

        if ($data['error'] !== null)
            throw new RuntimeException('Server return an error: ' . var_export($data['error']['message'], true));

        return $data['result'];
    }

    /**
     * Set transport
     *
     * @param object $transport
     *
     * @return Localizer_Client this
     */

    public function setTransport($transport)
    {
        $this->_transport = $transport;

        return $this;
    }

    /**
     * Returns transport
     *
     * @return object
     */

    public function getTransport()
    {
        if ($this->_transport === null)
            $this->_transport = $this->initTransport();

        return $this->_transport;
    }

    /**
     * Init transport
     *
     * @return GuzzleHttp\Client
     */

    protected function initTransport()
    {
        return new GuzzleHttp\Client(
            array(
                'base_uri'  => rtrim($this->_base_url, '/') . '/',
                'timeout'   => 30.0,
            )
        );
    }
}
