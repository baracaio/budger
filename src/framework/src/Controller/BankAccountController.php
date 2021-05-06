<?php

namespace SymfonyFramework\Controller;

use Budger\Services\BankAccount\BankAccountRegistrationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BankAccountController extends AbstractController
{
    public function index(BankAccountRegistrationService $bankAccountRegistrationService)
    {
        /**
         * @var BankAccountRegistrationService
         */

        $bankAccountRegistrationService->createNewBankAccount();

        return new JsonResponse([
            'oi',
        ]);
    }
}