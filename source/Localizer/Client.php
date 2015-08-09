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
     * Post project section upsert
     *
     * @param int    $project_id
     * @param string $code
     * @param string $name
     *
     * @return array
     */

    public function postProjectSectionUpsert($project_id, $code, $name)
    {
        $response = $this->getTransport()->get(
            'api/project/section/upsert.json',
            array(
                'query' => array(
                    'project_id'    => (int) $project_id,
                    'code'          => (string) $code,
                    'name'          => (string) $name,
                    'key'           => $this->_key,
                ),
            )
        );

        return $this->processAnswer($response);
    }

    /**
     * Post project section upload
     *
     * @param int    $project_id
     * @param string $section_code
     * @param mixed  $content
     * @param string $format
     *
     * @return array
     */

    public function postProjectSectionUpload($project_id, $section_code, $content, $format)
    {
        $response = $this->getTransport()->post(
            'api/project/section/upload.json',
            array(
                'query' => array(
                    'project_id'    => (int) $project_id,
                    'code'          => (string) $section_code,
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
     * Get translations
     *
     * @param int    $project_id
     * @param string $section_code
     *
     * @return array
     */

    public function getTranslations($project_id, $section_code)
    {
        $response = $this->getTransport()->get(
            'api/localization/translations.json',
            array(
                'query' => array(
                    'project_id'    => (int) $project_id,
                    'section_code'  => (string) $section_code,
                    'key'           => $this->_key,
                )
            )
        );

        return $this->processAnswer($response);
    }

    /**
     * Post translate
     *
     * @param int    $project_id
     * @param string $section_code
     * @param string $locale
     * @param string $object_key
     * @param string $translation
     * @param string $variant
     *
     * @return array
     */

    public function postTranslate($project_id, $section_code, $locale, $object_key, $translation, $variant = '[]')
    {
        $response = $this->getTransport()->post(
            'api/localization/translate.json',
            array(
                'query' => array(
                    'project_id'    => (int) $project_id,
                    'section_code'  => (string) $section_code,
                    'locale'        => (string) $locale,
                    'object_key'    => (string) $object_key,
                    'translation'   => (string) $translation,
                    'variant'       => (string) $variant,
                    'key'           => $this->_key,
                )
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
