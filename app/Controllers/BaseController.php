<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Survey;
use App\Models\Gejala;
use App\Models\History;
use Myth\Auth\Models\UserModel;
use App\Models\Profile;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['auth'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
	}
	protected $surveyModel;
	protected $gejalaModel;
	protected $historyModel;
	public function __construct()
	{
		$this->gejalaModel = new Gejala();
		$this->historyModel = new History();
		$this->userModel = new UserModel();
		$this->profileModel = new Profile();
	}
	protected function gejala()
	{
		$dataGejala = $this->gejalaModel->findAll();
		$gejala = [
			'gejala' => $dataGejala
		];
		return $gejala;
	}
	protected function surveyModel()
	{
		$datasurvey = $this->surveyModel->findAll();
		$survey = [
			'survey' => $datasurvey
		];
		return $survey;
	}
	protected function historyModel()
	{
		$datahistory = $this->historyModel->findAll();
		$history = [
			'history' => $datahistory
		];
		return $history;
	}
	protected function profileModel()
	{
		$dataprofile = $this->profileModel->findAll();
		$profile = [
			'profile' => $dataprofile
		];
		return $profile;
	}
	protected function authService()
	{
		$this->auth = service('authentication');
	}

	public function getDataProfile($kolom,$input){
		return $this->profileModel->where($kolom,$input)->findAll();
	}
}
