<?php namespace App\Controllers;

use Phpml\Classification\KNearestNeighbors;
use Phpml\Regression\LeastSquares;
use Phpml\Association\Apriori;
use Phpml\Clustering\KMeans;
use Phpml\Classification\MLPClassifier;
use Phpml\NeuralNetwork\ActivationFunction\PReLU;
use Phpml\NeuralNetwork\ActivationFunction\Sigmoid;
use Phpml\Metric\Accuracy;
use Phpml\Metric\Regression; //untuk regresi
use Phpml\Metric\ConfusionMatrix;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;



class Mesinlearning extends BaseController
{
    public function __construct()
    {
		session_start();
    }

	public function cobaasosiasi()
	{
		
		$samples = [['Bread', 'Milk'], ['Bread', 'Diaper', 'Beer', 'Eggs'], ['Milk', 'Diaper', 'Beer', 'Coke'], ['Bread', 'Milk', 'Diaper', 'Beer'], ['	Bread', 'Milk', 'Diaper', 'Coke']];
		$labels  = [];

		$associator = new Apriori($support = 0.4, $confidence = 0.6);
		$associator->train($samples, $labels);
		$data['Samples'] = $samples;
		$data['Rules'] = $associator->getRules();

		//return view('welcome_message');
		return view('Mesinlearning/Asosiasi', $data);
	}
}
