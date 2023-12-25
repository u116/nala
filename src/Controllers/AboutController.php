<?php

namespace Src\Controllers;

use Src\Http\Forms\AboutForm;
use Src\Models\Validator;

class AboutController extends AbstractController
{
    public string $new;

    public function get(): array
    {
        return $this->render('about', [
                'content' => $this->About->getContent($this->uid),
                false
            ]
        );
    }
}