<?php

namespace AppBundle\Action\Task;

use AppBundle\Entity\Task;
use AppBundle\Exception\PreviousTaskNotCompletedException;
use AppBundle\Exception\TaskCancelledException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class Done extends Base
{
    public function __invoke(Task $data, Request $request)
    {
        $task = $data;

        try {
            $this->taskManager->markAsDone($task, $this->getNotes($request));
        } catch (PreviousTaskNotCompletedException $e) {
            throw new BadRequestHttpException($e->getMessage());
        } catch (TaskCancelledException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        return $task;
    }
}
