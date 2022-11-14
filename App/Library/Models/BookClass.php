<?php

namespace App\Library\Models;

use Responder\Base\Models\BaseClass;

class BookClass extends BaseClass
{
    protected string $name;
    
    protected string $author;
    
    protected int $pages;
    
    protected int $editions;
    
    /**
     * @param string $name
     * @param string $author
     * @param int $pages
     * @param int $editions
     */
    public function __construct(string $name, string $author, int $pages, int $editions)
    {
        $this->name = $name;
        $this->author = $author;
        $this->pages = $pages;
        $this->editions = $editions;
    }
    
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'author' => $this->author,
            'pages' => $this->pages,
            'editions' => $this->editions
        ];
    }
}