<?php

namespace App\Controller;

use Monolog\Logger;
use App\Entity\Application;
use App\Entity\Utilisateur;
use App\Entity\ApplicationUser;
use App\Form\ApplicationUserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**** cleartrust ***/
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityController extends AbstractController {

	private $em;

	public function __construct(ManagerRegistry $em) {
		$this->em = $em;
	}

	/**
	 * @Route("/", name="index")
	 * @Method("GET")
	 */
	public function index(Request $request) {
		$appli = $this->em->getRepository(Application::class)->findAll();
		return $this->render('base.html.twig',array('applications'=>$appli));
	}
	
	/**
	 * @Route("/sso", name="redirect_sso")
	 * @Method("POST")
	 */
	public function redirectSso(Request $request) {
		$id = $request->get('profil');
		$user = $this->em->getRepository(Utilisateur::class)->find($id);
		$objHeader = $user->getHeadersData();

		$response = new RedirectResponse("http://localhost:8000/");

		foreach ($objHeader as $key => $value) {
			$response->headers->set($key, $value, true);
		}

		return $response;
	}

	/**
	 * @Route("/profil", name="profil_json")
	 * @Method("GET")
	 */
	public function profil(Request $request) {
		$idAppli = $request->query->get('idApplication');
		$profils = $this->em->getRepository(ApplicationUser::class)->getProfil($idAppli);
		$encoders = [new JsonEncoder()];
		$normalizers = [new ObjectNormalizer()];
		$serializer = new Serializer($normalizers, $encoders);
		$jsonContent = $serializer->serialize($profils, 'json');
		return new Response($jsonContent);
	}

	/**
	 * @Route("/alias-appli", name="alias-appli")
	 * @Method("GET")
	 */
	public function getAliasAppli(Request $request) {
		$idAppli = $request->query->get('idAppli');
		$application = $this->em->getRepository(Application::class)->find($idAppli);
		return $this->json($application);
	}
}
