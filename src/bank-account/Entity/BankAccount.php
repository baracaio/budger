<?php

namespace Budger\BankAccount\Entity;

class BankAccount
{
    private string $id;

    private string $title;

    private int $balance;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BankAccount
     */
    public function setTitle(string $title): BankAccount
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     * @return BankAccount
     */
    public function setBalance(int $balance): BankAccount
    {
        $this->balance = $balance;
        return $this;
    }


}