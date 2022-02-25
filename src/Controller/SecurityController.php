<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Application;
use App\Entity\Utilisateur;
use App\Entity\ApplicationUser;
use App\Form\ApplicationUserType;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**** cleartrust ***/
use Monolog\Logger;

class SecurityController extends AbstractController {
	
	/**
	 * @Route("/", name="index")
	 * @Method("GET")
	 */
	public function index(Request $request) {
		extract($_POST);
        $em = $this->getDoctrine()->getManager();
		$appli = $em->getRepository(Application::class)->findAll();
		return $this->render('base.html.twig',array('applications'=>$appli));
	}

	/**
	 * @Route("/profil", name="profil_json")
	 * @Method("GET")
	 */
	public function profil(Request $request) {
        $em = $this->getDoctrine()->getManager();
		$idAppli = $request->query->get('idApplication');
		$profils = $em->getRepository(ApplicationUser::class)->getProfil($idAppli);
		$encoders = [new JsonEncoder()];
		$normalizers = [new ObjectNormalizer()];
		$serializer = new Serializer($normalizers, $encoders);
		$jsonContent = $serializer->serialize($profils, 'json');
		return new Response($jsonContent);
	}

	/**
	 * @Route("/user", name="user")
	 * @Method("GET")
	 */
	public function getUtilisateur(Request $request) {
		if(!($request->query->get('id'))){
			return false;
		}
		$id = $request->query->get('id');
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository(Utilisateur::class)->find($id);
		$encoders = [new JsonEncoder()];
		$normalizers = [new ObjectNormalizer()];
		$serializer = new Serializer($normalizers, $encoders);
		$jsonContent = $serializer->serialize($user, 'json');
		return new Response($jsonContent);

	}

	/**
	 * @Route("/alias-appli", name="alias-appli")
	 * @Method("GET")
	 */
	public function getAliasAppli(Request $request) {
		$em = $this->getDoctrine()->getManager();
		$idAppli = $request->query->get('idAppli');
		$application = $em->getRepository(Application::class)->find($idAppli);
		return $this->json($application);
	}
	
}
