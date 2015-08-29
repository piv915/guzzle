<?php
/**
 * Created by PhpStorm.
 * User: pix
 * Date: 29.08.15
 * Time: 23:06
 */

namespace GuzzleHttp;


class RequestIterator implements \Iterator
{

    /**
     * @var \Iterator $iterable
     */
    private $iterable;
    private $client;
    private $opts;

    public function __construct($iterable, $client, $opts)
    {
        $this->iterable = $iterable;
        $this->client = $client;
        $this->opts = $opts;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // TODO: Implement current() method.
        $rfn = $this->iterable->current();
        if ($rfn instanceof RequestInterface) {
            return $this->client->sendAsync($rfn, $this->opts);
        } elseif (is_callable($rfn)) {
            return $rfn($this->opts);
        } else {
            throw new \InvalidArgumentException('Each value yielded by '
                . 'the iterator must be a Psr7\Http\Message\RequestInterface '
                . 'or a callable that returns a promise that fulfills '
                . 'with a Psr7\Message\Http\ResponseInterface object.');
        }
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        // TODO: Implement next() method.
        $this->iterable->next();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->iterable->key();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        return true;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->iterable->rewind();
    }
}