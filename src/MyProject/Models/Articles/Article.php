<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */

    public function getText(): string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    /**
     * @return int
     */

    public function getAuthorId(): int
    {
        return (int) $this->authorId;
    }

}