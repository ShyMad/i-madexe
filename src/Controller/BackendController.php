<?php

namespace App\Controller;

use App\Entity\About;
use App\Form\AboutType;
use App\Repository\AboutRepository;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Entity\EtatCivil;
use App\Form\EtatCivilType;
use App\Repository\EtatCivilRepository;
use App\Entity\Fromation;
use App\Form\FromationType;
use App\Repository\FromationRepository;
use App\Entity\ImageProject;
use App\Form\ImageProjectType;
use App\Repository\ImageProjectRepository;
use App\Entity\Link;
use App\Form\LinkType;
use App\Repository\LinkRepository;
use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use App\Entity\Experience;
use App\Form\ExperienceType;
use App\Repository\ExperienceRepository;
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
    // Project control
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
    
    // Experience

    /**
     * @Route("backend/experience/", name="experience_index", methods="GET")
     */
    public function ex_index(ExperienceRepository $experienceRepository): Response
    {
        return $this->render('backend/experience/index.html.twig', ['experiences' => $experienceRepository->findAll()]);
    }

    /**
     * @Route("/backend/experience/new", name="experience_new", methods="GET|POST")
     */
    public function ex_new(Request $request): Response
    {
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($experience);
            $em->flush();

            return $this->redirectToRoute('experience_index');
        }

        return $this->render('experience/new.html.twig', [
            'experience' => $experience,
            'tag'=>'new experience',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/backend/experience/{id}", name="experience_show", methods="GET")
     */
    public function ex_show(Experience $experience): Response
    {
        return $this->render('experience/show.html.twig', ['experience' => $experience,'tag'=>'show']);
    }

    /**
     * @Route("/backend/experience/{id}/edit", name="experience_edit", methods="GET|POST")
     */
    public function ex_edit(Request $request, Experience $experience): Response
    {
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('experience_edit', ['id' => $experience->getId()]);
        }

        return $this->render('backend/experience/edit.html.twig', [
            'experience' => $experience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/backend/experience/{id}", name="experience_delete", methods="DELETE")
     */
    public function delete(Request $request, Experience $experience): Response
    {
        if ($this->isCsrfTokenValid('delete'.$experience->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($experience);
            $em->flush();
        }

        return $this->redirectToRoute('experience_index');
    }

    // skill

    
    /**
     * @Route("backend/skill/", name="skill_index", methods="GET")
     */
    public function s_index(SkillRepository $skillRepository): Response
    {
        return $this->render('backend/skill/index.html.twig', ['skills' => $skillRepository->findAll(),'tag'=>'skill']);
    }

    /**
     * @Route("backend/skill/new", name="skill_new", methods="GET|POST")
     */
    public function s_new(Request $request): Response
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();

            return $this->redirectToRoute('skill_index');
        }

        return $this->render('backend/skill/new.html.twig', [
            'skill' => $skill,
            'tag' => 'new skill',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/skill/{id}", name="skill_show", methods="GET")
     */
    public function s_show(Skill $skill): Response
    {
        return $this->render('backend/skill/show.html.twig', ['skill' => $skill,'tag'=>'show']);
    }

    /**
     * @Route("backend/skill/{id}/edit", name="skill_edit", methods="GET|POST")
     */
    public function s_edit(Request $request, Skill $skill): Response
    {
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('skill_edit', ['id' => $skill->getId()]);
        }

        return $this->render('backend/skill/edit.html.twig', [
            'skill' => $skill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/skill/{id}", name="skill_delete", methods="DELETE")
     */
    public function s_delete(Request $request, Skill $skill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skill->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($skill);
            $em->flush();
        }

        return $this->redirectToRoute('skill_index');
    }
    
    // Link

    /**
     * @Route("backend/link/", name="link_index", methods="GET")
     */
    public function l_index(LinkRepository $linkRepository): Response
    {
        return $this->render('backend/link/index.html.twig', ['links' => $linkRepository->findAll(),'tag'=>'link']);
    }

    /**
     * @Route("backend/link/new", name="link_new", methods="GET|POST")
     */
    public function l_new(Request $request): Response
    {
        $link = new Link();
        $form = $this->createForm(LinkType::class, $link);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($link);
            $em->flush();

            return $this->redirectToRoute('link_index');
        }

        return $this->render('backend/link/new.html.twig', [
            'link' => $link,
            'tag' => 'new link',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/link/{id}", name="link_show", methods="GET")
     */
    public function l_show(Link $link): Response
    {
        return $this->render('backend/link/show.html.twig', ['link' => $link,'tag'=>'show']);
    }

    /**
     * @Route("backend/link/{id}/edit", name="link_edit", methods="GET|POST")
     */
    public function l_edit(Request $request, Link $link): Response
    {
        $form = $this->createForm(LinkType::class, $link);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('link_edit', ['id' => $link->getId()]);
        }

        return $this->render('backend/link/edit.html.twig', [
            'link' => $link,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/link/{id}", name="link_delete", methods="DELETE")
     */
    public function l_delete(Request $request, Link $link): Response
    {
        if ($this->isCsrfTokenValid('delete'.$link->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($link);
            $em->flush();
        }

        return $this->redirectToRoute('link_index');
    }
    // image_project

     /**
     * @Route("backend/image_project/", name="image_project_index", methods="GET")
     */
    public function im_index(ImageProjectRepository $imageProjectRepository): Response
    {
        return $this->render('backend/image_project/index.html.twig', ['image_projects' => $imageProjectRepository->findAll(),'tag'=>'image for projects']);
    }

    /**
     * @Route("backend/image_project/new", name="image_project_new", methods="GET|POST")
     */
    public function im_new(Request $request): Response
    {
        $imageProject = new ImageProject();
        $form = $this->createForm(ImageProjectType::class, $imageProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageProject);
            $em->flush();

            return $this->redirectToRoute('image_project_index');
        }

        return $this->render('backend/image_project/new.html.twig', [
            'image_project' => $imageProject,
            'tag' => 'new image',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/image_project/{id}", name="image_project_show", methods="GET")
     */
    public function im_show(ImageProject $imageProject): Response
    {
        return $this->render('backend/image_project/show.html.twig', ['image_project' => $imageProject,'tag'=>'show']);
    }

    /**
     * @Route("backend/image_project/{id}/edit", name="image_project_edit", methods="GET|POST")
     */
    public function im_edit(Request $request, ImageProject $imageProject): Response
    {
        $form = $this->createForm(ImageProjectType::class, $imageProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('image_project_edit', ['id' => $imageProject->getId()]);
        }

        return $this->render('backend/image_project/edit.html.twig', [
            'image_project' => $imageProject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/image_project/{id}", name="image_project_delete", methods="DELETE")
     */
    public function im_delete(Request $request, ImageProject $imageProject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imageProject->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imageProject);
            $em->flush();
        }

        return $this->redirectToRoute('image_project_index');
    }

    // FROMATION

     /**
     * @Route("backend/formation/", name="fromation_index", methods="GET")
     */
    public function f_index(FromationRepository $fromationRepository): Response
    {
        return $this->render('backend/fromation/index.html.twig', ['fromations' => $fromationRepository->findAll(),'tag'=>'formation']);
    }

    /**
     * @Route("backend/formation/new", name="fromation_new", methods="GET|POST")
     */
    public function f_new(Request $request): Response
    {
        $fromation = new Fromation();
        $form = $this->createForm(FromationType::class, $fromation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fromation);
            $em->flush();

            return $this->redirectToRoute('fromation_index');
        }

        return $this->render('backend/fromation/new.html.twig', [
            'fromation' => $fromation,
            'tag' => 'new formation',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/formation/{id}", name="fromation_show", methods="GET")
     */
    public function f_show(Fromation $fromation): Response
    {
        return $this->render('backend/fromation/show.html.twig', ['fromation' => $fromation,'tag'=>'show']);
    }

    /**
     * @Route("backend/formation/{id}/edit", name="fromation_edit", methods="GET|POST")
     */
    public function edit(Request $request, Fromation $fromation): Response
    {
        $form = $this->createForm(FromationType::class, $fromation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fromation_edit', ['id' => $fromation->getId()]);
        }

        return $this->render('backend/fromation/edit.html.twig', [
            'fromation' => $fromation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/formation/{id}", name="fromation_delete", methods="DELETE")
     */
    public function f_delete(Request $request, Fromation $fromation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fromation->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fromation);
            $em->flush();
        }

        return $this->redirectToRoute('fromation_index');
    }

    // ETAT CIVIL

     /**
     * @Route("backend/etat_civil/", name="etat_civil_index", methods="GET")
     */
    public function et_index(EtatCivilRepository $etatCivilRepository): Response
    {
        return $this->render('backend/etat_civil/index.html.twig', ['etat_civils' => $etatCivilRepository->findAll(),'tag'=>'etat civil']);
    }

    /**
     * @Route("backend/etat_civil/new", name="etat_civil_new", methods="GET|POST")
     */
    public function et_new(Request $request): Response
    {
        $etatCivil = new EtatCivil();
        $form = $this->createForm(EtatCivilType::class, $etatCivil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etatCivil);
            $em->flush();

            return $this->redirectToRoute('etat_civil_index');
        }

        return $this->render('backend/etat_civil/new.html.twig', [
            'etat_civil' => $etatCivil,
            'tag' => 'new etat',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/etat_civil/{id}", name="etat_civil_show", methods="GET")
     */
    public function et_show(EtatCivil $etatCivil): Response
    {
        return $this->render('backend/etat_civil/show.html.twig', ['etat_civil' => $etatCivil,'tag'=>'show']);
    }

    /**
     * @Route("backend/etat_civil/{id}/edit", name="etat_civil_edit", methods="GET|POST")
     */
    public function et_edit(Request $request, EtatCivil $etatCivil): Response
    {
        $form = $this->createForm(EtatCivilType::class, $etatCivil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etat_civil_edit', ['id' => $etatCivil->getId()]);
        }

        return $this->render('backend/etat_civil/edit.html.twig', [
            'etat_civil' => $etatCivil,
            
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/etat_civil/{id}", name="etat_civil_delete", methods="DELETE")
     */
    public function et_delete(Request $request, EtatCivil $etatCivil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatCivil->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etatCivil);
            $em->flush();
        }

        return $this->redirectToRoute('etat_civil_index');
    }
    
    // Contact

        /**
     * @Route("backend/contact/", name="contact_index", methods="GET")
     */
    public function c_index(ContactRepository $contactRepository): Response
    {
        return $this->render('backend/contact/index.html.twig', ['contacts' => $contactRepository->findAll(),'tag'=>'contact']);
    }

    /**
     * @Route("backend/contact/new", name="contact_new", methods="GET|POST")
     */
    public function c_new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contact_index');
        }

        return $this->render('backend/contact/new.html.twig', [
            'contact' => $contact,
            'tag' => 'new contact',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/contact/{id}", name="contact_show", methods="GET")
     */
    public function c_show(Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', ['contact' => $contact,'tag'=>'show contact']);
    }

    /**
     * @Route("backend/contact/{id}/edit", name="contact_edit", methods="GET|POST")
     */
    public function c_edit(Request $request, Contact $contact): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contact_edit', ['id' => $contact->getId()]);
        }

        return $this->render('backend/contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/contact/{id}", name="contact_delete", methods="DELETE")
     */
    public function c_delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contact_index');
    }

    // ABOUT
    /**
     * @Route("backend/about/", name="about_index", methods="GET")
     */
    public function a_index(AboutRepository $aboutRepository): Response
    {
        return $this->render('backend/about/index.html.twig', ['abouts' => $aboutRepository->findAll(),'tag'=>'About']);
    }

    /**
     * @Route("backend/about/new", name="about_new", methods="GET|POST")
     */
    public function a_new(Request $request): Response
    {
        $about = new About();
        $form = $this->createForm(AboutType::class, $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($about);
            $em->flush();

            return $this->redirectToRoute('about_index');
        }

        return $this->render('backend/about/new.html.twig', [
            'about' => $about,
            'tag' => 'new resume',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/about/{id}", name="about_show", methods="GET")
     */
    public function a_show(About $about): Response
    {
        return $this->render('backend/about/show.html.twig', ['about' => $about,'tag'=>'show']);
    }

    /**
     * @Route("backend/about/{id}/edit", name="about_edit", methods="GET|POST")
     */
    public function a_edit(Request $request, About $about): Response
    {
        $form = $this->createForm(AboutType::class, $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('about_edit', ['id' => $about->getId()]);
        }

        return $this->render('backend/about/edit.html.twig', [
            'about' => $about,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("backend/about/{id}", name="about_delete", methods="DELETE")
     */
    public function a_delete(Request $request, About $about): Response
    {
        if ($this->isCsrfTokenValid('delete'.$about->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($about);
            $em->flush();
        }

        return $this->redirectToRoute('about_index');
    }
}
