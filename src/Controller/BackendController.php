<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BackendController extends Controller
{
    /**
     * @Route("/backend", name="backend")
     */
    public function index()
    {
        return $this->render('backend/index.html.twig', [
            'controller_name' => 'BackendController',
            'tag' => 'My Dashboard',
        ]);
    }
    /**
     * @Route("backend/project/", name="project_index", methods="GET")
     */
    public function p_index(ProjectRepository $projectRepository): Response
    {
        return $this->render('backend/project/index.html.twig',[
        'projects' => $projectRepository->findAll(),
        'tag' => 'Project',
        ]);
    }

    /**
     * @Route("backend/project/new", name="project_new", methods="GET|POST")
     */
    public function p_new(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('project_index');
        }

        return $this->render('backend/project/new.html.twig', [
            'project' => $project,
            'tag' => 'new project',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/project/{id}", name="project_show", methods="GET")
     */
    public function p_show(Project $project): Response
    {
        return $this->render('backend/project/show.html.twig', ['project' => $project,'tag'=>'show']);
    }

    /**
     * @Route("backend/project/{id}/edit", name="project_edit", methods="GET|POST")
     */
    public function p_edit(Request $request, Project $project): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_edit', ['id' => $project->getId()]);
        }

        return $this->render('backend/project/edit.html.twig', [
            'project' => $project,
            'tag'=>'editing',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/project/{id}", name="project_delete", methods="DELETE")
     */
    public function p_delete(Request $request, Project $project): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush();
        }

        return $this->redirectToRoute('project_index');
    }
}
