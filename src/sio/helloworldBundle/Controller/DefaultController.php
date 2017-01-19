<?php

namespace sio\helloworldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use sio\helloworldBundle\Entity\Amis;
use sio\helloworldBundle\Entity\Hobby;
use sio\helloworldBundle\Entity\AmisHobby;
use sio\helloworldBundle\Entity\InscriptionForm;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use sio\helloworldBundle\Form\InscriptionForm;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('siohelloworldBundle:Default:index.html.twig');
    }
	public function accueilAction()
    {
		/*$meilleur_pote-> new Amis;
		$meilleur_pote->setNom("Minicuicui");
		$meilleur_pote->setPrenom("Mathieu");*/
		/*, array('pote'->$meilleur_pote)*/
        return $this->render('siohelloworldBundle:Default:accueil.html.twig');
    }
	public function headerAction()
    {
        return $this->render('siohelloworldBundle:Default:header.html.twig');
    }
	public function footerAction()
    {
        return $this->render('siohelloworldBundle:Default:footer.html.twig');
    }

	public function inscriptionAction(Request $request)
	{
		// Récupération du créateur de formulaire
		$createur_formulaire=$this->createFormBuilder();
		//ajout des champs dans le formulaire
		$createur_formulaire->add('nom','text');
		$createur_formulaire->add('prenom','text');
		$createur_formulaire->add('adresse_email','email');
		$values=array('h' => 'homme', 'f'=>'femme');
		//exemple de liste déroulante
        $createur_formulaire->add('sexe','choice',
                array('required'=> false,
                    'choices'=>$values,
                    'multiple'=>false,
                    'expanded'=>false,
                    'data'=>'f'
                ));
        /*
        $createur_formulaire->setDueDate(new \DateTime('tomorrow'));
        $createur_formulaire->add('dueDate', DateType::class); */

		$createur_formulaire->add('valider','submit');
/*
        $createur_formulaire->add('hobby','entity',
            array('class'=>'siohelloworldBundle:Hobby','property'=>'intitule')); */


        //$formulaire_inscription=$this->createForm(new InscriptionForm());

        //création effective du formulaire
		$formulaire_inscription=$createur_formulaire->getForm();
		//permet le traitement du formulaire après validation
		$formulaire_inscription->handleRequest($request);
		
		//si le formulaire est transmis et valide on répond que les infos sont bien tranmises
		if ($formulaire_inscription->isSubmitted() && $formulaire_inscription->isValid() ){
			//récupération des données du formulaire

            $ami = new Amis;
            $ami ->setNom($formulaire_inscription->get('nom')->getData());
            $ami ->setPrenom($formulaire_inscription->get('prenom')->getData());
            $ami ->setMail($formulaire_inscription->get('adresse_email')->getData());

            $manager = $this->getDoctrine()->getManager();
            $manager ->persist($ami);
            $manager->flush();
            //return new Response('Les informations ont bien été tranmises');
		    return $this->redirectToRoute('siohelloworld_inscrreussie');
		}

		//on passe en paramètre à la vue, le formulaire crée
		return $this->render('siohelloworldBundle:Default:inscription.html.twig' , array('form'=>$formulaire_inscription->createView()));
	}

}
