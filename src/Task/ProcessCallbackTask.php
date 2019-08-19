<?php

namespace AsyncPHP\Doorman\Task;

use AsyncPHP\Doorman\Expires;
use AsyncPHP\Doorman\Process;

final class ProcessCallbackTask extends CallbackTask implements Expires, Process
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var null|int
     */
    private $expiredAt;

    /**
     * @var null|boolean
     */
    private $persistent;

    /**
     * @inheritdoc
     *
     * @return null|int
     */
    public function isPersistent()
    {
        return $this->persistent;
    }
    
    /**
     * @inheritdoc
     *
     * @param true/false 
     *
     * @return $this
     */
    public function setPersistent($persistent)
    {
        $this->persistent = $persistent;

        return $this;
    }
    

    /**
     * @inheritdoc
     *
     * @return null|int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return int
     */
    public function getExpiresIn()
    {
        return -1;
    }

    /**
     * @inheritdoc
     *
     * @param int $startedAt
     *
     * @return bool
     */
    public function shouldExpire($startedAt)
    {
        $this->expiredAt = time();

        return true;
    }

    /**
     * Checks whether this task has expired.
     *
     * @return bool
     */
    public function hasExpired()
    {
        return is_int($this->expiredAt);
    }
}
