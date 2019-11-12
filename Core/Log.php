<?php


namespace Core;


class Log
{
    public $fileHandle;
    private $url = "";
    private $userAgent = "";

    /** set useragent and url for write in Log file
     * Log constructor.
     * @param $url
     * @param $userAgent
     */
    public function __construct($url, $userAgent)
    {
        //set url in log url variable
        $this->setUrl(ltrim($url, "/"));
        //set useragent in log UserAgent variable
        $this->setUserAgent($userAgent);

        $this->fileHandle = fopen(rtrim(BASE_DIR, "/") . LOG_PATH, 'a+');
    }

    public function addLogFile()
    {
        if ($this->getUrl() == ""){
            $this->setUrl("/");
        }
        fwrite($this->fileHandle, $this->getUserAgent() . "||||" . $this->getUrl(). "||||" . date("Y-m-d H:i:s")."\t\n");
        fclose($this->fileHandle);
    }

    /** get value in userAgent
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /** set value in userAgent
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /** get value in url
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /** set value in url
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}