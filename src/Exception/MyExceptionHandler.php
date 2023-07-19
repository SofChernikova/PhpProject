<?php

namespace App\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class MyExceptionHandler
{
    public function __invoke(ExceptionEvent $event) : void
    {
        // TODO: Implement __invoke() method.
        $exception = $event->getThrowable();


        $code = $exception instanceof MyException ? 404 : 400;

        $responseData = [
            'error' => [
                'code' => $code,
                'message' => $exception->getMessage()
            ]
        ];

        $event->setResponse(new JsonResponse($responseData, $code));
    }

//    public function onKernelException(ExceptionEvent $event): void
//    {
//        $exception = $event->getThrowable();
//
//
//        $code = $exception instanceof UserInputException ? 400 : 500;
//
//        $responseData = [
//            'error' => [
//                'code' => $code,
//                'message' => $exception->getMessage()
//            ]
//        ];
//
//        $event->setResponse(new JsonResponse($responseData, $code));
//    }
}
