<?php

namespace App\Controller;

use App\Repository\SoftwareVersionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConnectedSiteController extends AbstractController
{
    public function softwareDownload(Request $request, SoftwareVersionRepository $repo)
    {
        $version = $request->request->get('version');
        $hwVersion = $request->request->get('hwVersion');

        if (!$version) {
            return new JsonResponse(['msg' => 'Version is required']);
        }

        if (!$hwVersion) {
            return new JsonResponse(['msg' => 'HW Version is required']);
        }

        // Normalize version
        if (strtolower($version[0]) === 'v') {
            $version = substr($version, 1);
        }

        // Detect hardware
        $isLCI = false;
        $st = false;
        $gd = false;
        $lciType = '';

        if (preg_match('/^CPAA_/', $hwVersion)) $st = true;
        if (preg_match('/^CPAA_G_/', $hwVersion)) $gd = true;

        if (preg_match('/^B_C_/', $hwVersion)) {
            $isLCI = true; $lciType = 'CIC'; $st = true;
        } elseif (preg_match('/^B_N_G_/', $hwVersion)) {
            $isLCI = true; $lciType = 'NBT'; $gd = true;
        } elseif (preg_match('/^B_E_G_/', $hwVersion)) {
            $isLCI = true; $lciType = 'EVO'; $gd = true;
        }

        $software = $repo->findOneBy(['systemVersionAlt' => $version]);
        if (!$software) {
            return new JsonResponse([
                'versionExist' => false,
                'msg' => 'There was a problem identifying your software.'
            ]);
        }

        if ($software->isIsLatest()) {
            return new JsonResponse([
                'versionExist' => true,
                'msg' => 'Your system is upto date!',
                'link' => ''
            ]);
        }

        return new JsonResponse([
            'versionExist' => true,
            'msg' => 'The latest version is available',
            'link' => $software->getMainLink(),
            'st' => $st ? $software->getStLink() : '',
            'gd' => $gd ? $software->getGdLink() : ''
        ]);
    }
}