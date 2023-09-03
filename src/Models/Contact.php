<?php

namespace Src\Models;

class Contact extends Model
{
    private const CONTACTS = [
        'email',
        'X',
        'github',
        'discord',
        'website',
    ];
    private string $select = '';
    private array $prepared = [];

    public function getContact(): array|null
    {
        foreach((array) $this->getContactData() as $contact => $value) {
            if (isset($value)) $this->prepared[$contact] = $value;
        }

        return empty($this->prepared) ? null : $this->prepared;
    }

    private function prepareSelect(): string
    {
        foreach(static::CONTACTS as $contact) {
            $this->select .= $contact.',';
        }

        return rtrim($this->select, ',');
    }

    private function getContactData(): array|null
    {
        return $this->DB
            ->select($this->prepareSelect())
            ->from('contact')
            ->where('uid=1')
            ->fetchAssoc();
    }
}