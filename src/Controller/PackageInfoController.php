<?php

namespace App\Controller;

use App\Model\PackageInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PackageInfoController extends AbstractController
{
    public function index(string $name)
    {
        $client = new Client();
        $endpoint = 'https://packagist.org/packages';

        try {
            $response = $client->request('GET', \sprintf('%s/%s.json', $endpoint, $name));
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return $this->render('package-info/index.html.twig', [
                    'packageName' => $name
                ]);
            }
        }

        $json = (string) $response->getBody();
        $packageInfo = \json_decode($json, true);

        $packageInfo = $packageInfo['package']['downloads'];
        $packageInfo['name'] = $name;

        $model = PackageInfo::fromArray($packageInfo);

        return $this->render('package-info/index.html.twig', [
            'packageInfo' => $model,
        ]);
    }
}
