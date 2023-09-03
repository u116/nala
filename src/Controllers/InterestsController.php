<?php

namespace Src\Controllers;

class InterestsController extends AbstractController
{
    public function get(): array
    {
        $interests = $this->Interests->getInterests();
        return $this->render('interests', [
                'interests' => empty($interests) ? null : $interests,
            ]
        );
    }
}