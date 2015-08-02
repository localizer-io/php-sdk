<?php

/**
 * Localizer client
 *
 * @uses    Apishka\EasyExtend\Helper\ByClassNameTrait
 *
 * @author Alexander "grevus" Lobtsov <alex@lobtsov.com>
 */

class Localizer_Client
{
    /**
     * Easy extends
     */

    use \Apishka\EasyExtend\Helper\ByClassNameTrait;

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
     * Get project section list
     *
     * @param int $project_id
     * @param int $offset
     * @param int $count
     *
     * @return array
     */

    public function getProjectSectionList($project_id, $offset = 0, $count = 25)
    {
        $response = $this->getTransport()->get(
            'api/project/section/list.json',
            array(
                'query' => array(
                    'project_id'    => (int) $project_id,
                    'offset'        => (int) $offset,
                    'count'         => (int) $count,
                    'key'           => $this->_key,
                ),
            )
        );

        return $this->processAnswer($response);
    }

    /**
     * Post project section create by data
     *
     * @param int    $project_id
     * @param mixed  $content
     * @param string $format
     * @param string $name
     *
     * @return array
     */

    public function postProjectSectionCreateByData($project_id, $content, $format, $name = null)
    {
        $response = $this->getTransport()->post(
            'api/project/section/create/by/file.json',
            array(
                'query' => array(
                    'project_id'    => (int) $project_id,
                    'format'        => (string) $format,
                    'name'          => (string) $name,
                    'key'           => $this->_key,
                ),
                'multipart' => array(
                    array(
                        'name'     => 'file',
                        'contents' => $content,
                        'filename' => 'php-sdk-' . microtime(true) . '.json',
                    ),
                ),
            )
        );

        return $this->processAnswer($response);
    }

    /**
     * Post project section update by data
     *
     * @param int    $section_id
     * @param mixed  $content
     * @param string $format
     * @param string $name
     *
     * @return array
     */

    public function postProjectSectionUpdateByData($section_id, $content, $format, $name = null)
    {
        $response = $this->getTransport()->post(
            'api/project/section/update/by/file.json',
            array(
                'query' => array(
                    'section_id'    => (int) $section_id,
                    'format'        => (string) $format,
                    'name'          => (string) $name,
                    'key'           => $this->_key,
                ),
                'multipart' => array(
                    array(
                        'name'     => 'file',
                        'contents' => $content,
                        'filename' => 'php-sdk-' . microtime(true) . '.json',
                    ),
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
            throw new RuntimeException('Wrong json in answer: ' . var_export($result, true));

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
