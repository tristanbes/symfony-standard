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
            $this->getDoctrine()->getManager()->persist($report);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', $this->trans('report.created.success', array(), 'report'));

            return $this->redirect($this->generateUrl('report_index', array(
                'site_id' => $site->getId(),
            )));
        }

        return array(
            'form'   => $form->createView(),
            'report' => $report,
        );
    }
}
