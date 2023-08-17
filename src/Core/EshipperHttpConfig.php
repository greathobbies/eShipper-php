<?php

namespace Greathobbies\Eshipper\Core;

use Greathobbies\Eshipper\Exception\EshipperConfigurationException;

class EshipperHttpConfig
{

  public static $defaultCurlOptions = array(
    CURLOPT_SSLVERSION => 6,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 60,    // maximum number of seconds to allow cURL functions to execute
    CURLOPT_USERAGENT => 'Eshipper-PHP-SDK',
    CURLOPT_HTTPHEADER => array(),
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_SSL_VERIFYPEER => 1,
    CURLOPT_SSL_CIPHER_LIST => 'TLSv1:TLSv1.2'
    //Allowing TLSv1 cipher list.
    //Adding it like this for backward compatibility with older versions of curl
  );

  const HEADER_SEPARATOR = ';';
  const HTTP_GET = 'GET';
  const HTTP_POST = 'POST';

  private $headers = array();

  private $curlOptions;

  private $url;

  private $method;
  private $retryCount = 0;


  public function __construct($url = null, $method = self::HTTP_POST, $configs = array())
  {
    $this->url = $url;
    $this->method = $method;
    $this->curlOptions = $this->getHttpConstantsFromConfigs($configs, 'http.') + self::$defaultCurlOptions;
    // Update the Cipher List based on OpenSSL or NSS settings
    $curl = curl_version();
    $sslVersion = isset($curl['ssl_version']) ? $curl['ssl_version'] : '';
    if($sslVersion && substr_compare($sslVersion, "NSS/", 0, strlen("NSS/")) === 0) {
      //Remove the Cipher List for NSS
      $this->removeCurlOption(CURLOPT_SSL_CIPHER_LIST);
    }
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function getHeaders()
  {
    return $this->headers;
  }

  public function getHeader($name)
  {
    if (array_key_exists($name, $this->headers)) {
      return $this->headers[$name];
    }
    return null;
  }

  public function setUrl($url)
  {
    $this->url = $url;
  }

  public function setHeaders(array $headers = array())
  {
    $this->headers = $headers;
  }

  public function addHeader($name, $value, $overWrite = true)
  {
    if (!array_key_exists($name, $this->headers) || $overWrite) {
      $this->headers[$name] = $value;
    } else {
      $this->headers[$name] = $this->headers[$name] . self::HEADER_SEPARATOR . $value;
    }
  }

  public function removeHeader($name)
  {
    unset($this->headers[$name]);
  }

  public function getCurlOptions()
  {
    return $this->curlOptions;
  }

  public function addCurlOption($name, $value)
  {
    $this->curlOptions[$name] = $value;
  }

  public function removeCurlOption($name)
  {
    unset($this->curlOptions[$name]);
  }

  public function setCurlOptions($options)
  {
    $this->curlOptions = $options;
  }

  public function setSSLCert($certPath, $passPhrase = null)
  {
    $this->curlOptions[CURLOPT_SSLCERT] = realpath($certPath);
    if (isset($passPhrase) && trim($passPhrase) != "") {
      $this->curlOptions[CURLOPT_SSLCERTPASSWD] = $passPhrase;
    }
  }

  public function setHttpTimeout($timeout)
  {
    $this->curlOptions[CURLOPT_CONNECTTIMEOUT] = $timeout;
  }

  public function setHttpProxy($proxy)
  {
    $urlParts = parse_url($proxy);
    if ($urlParts == false || !array_key_exists("host", $urlParts)) {
      throw new EshipperConfigurationException("Invalid proxy configuration " . $proxy);
    }
    $this->curlOptions[CURLOPT_PROXY] = $urlParts["host"];
    if (isset($urlParts["port"])) {
      $this->curlOptions[CURLOPT_PROXY] .= ":" . $urlParts["port"];
    }
    if (isset($urlParts["user"])) {
      $this->curlOptions[CURLOPT_PROXYUSERPWD] = $urlParts["user"] . ":" . $urlParts["pass"];
    }
  }

  public function setHttpRetryCount($retryCount)
  {
    $this->retryCount = $retryCount;
  }

  public function getHttpRetryCount()
  {
    return $this->retryCount;
  }

  public function setUserAgent($userAgentString)
  {
    $this->curlOptions[CURLOPT_USERAGENT] = $userAgentString;
  }

  public function getHttpConstantsFromConfigs($configs = array(), $prefix)
  {
    $arr = array();
    if ($prefix != null && is_array($configs)) {
      foreach ($configs as $k => $v) {
        // Check if it startsWith
        if (substr($k, 0, strlen($prefix)) === $prefix) {
          $newKey = ltrim($k, $prefix);
          if (defined($newKey)) {
            $arr[constant($newKey)] = $v;
          }
        }
      }
    }
    return $arr;
  }

}