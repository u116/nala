<?php

namespace Src\Controllers;

class ContactController extends AbstractController
{
     public function get(): array
    {
        return $this->render('contact', [
                'contacts' => $this->Contact->getContact(),
                false
            ]
        );
    }
}