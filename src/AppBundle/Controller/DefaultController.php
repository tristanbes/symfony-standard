<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm($this->get('bug_report_form'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            // w/e we never get there.
        }

        return array(
            'form'   => $form->createView(),
        );
    }
}
