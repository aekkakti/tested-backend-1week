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

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setName(string $name): string
    {
        return $this->name = $name;
    }

    public function setText(string $text): string
    {
        return $this->text = $text;
    }

    public function updateFromArray (array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
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