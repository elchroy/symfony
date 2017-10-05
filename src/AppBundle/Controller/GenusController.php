<?php
/**
 * Created by PhpStorm.
 * User: elchroy
 * Date: 05/10/2017
 * Time: 15:11
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction(string $genusName)
    {
        $notes = [
            'Octopus asked me a riddle, outsmarted',
            'I counted 8 legs... as they wrapped around me',
            'Inked!'
        ];
        $templating = $this->container->get('templating');
        $html = $templating->render('genus/show.html.twig', [
            'name' => $genusName,
            'notes' => $notes
        ]);
        return new Response($html);
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_show_notes")
     * @Method("GET")
     */
    public function getNotesAction()
    {
        $notes = [
            [ "id" => 1, "username" => "apadell0", "avatar_url" => "http://dummyimage.com/209x122.png/5fa2dd/ffffff", "note" => "Nunc nisl. Duis bibendum, felis sed interdu" ],
            [ "id" => 2, "username" => "cstrettell1", "avatar_url" => "http://dummyimage.com/236x128.jpg/ff4444/ffffff", "note" => "Nulla mollis molestiePraesent blandit. Nam nulla." ],
            [ "id" => 3, "username" => "jcrisp2", "avatar_url" => "http://dummyimage.com/169x239.png/ff4444/ffffff", "note" => "Duis at velto." ],
            [ "id" => 4, "username" => "sbeakes3", "avatar_url" => "http://dummyimage.com/145x115.bmp/ff4444/ffffff", "note" => "Mauris sit amet eros. Suspendisse accumsan tortor quis turp." ],
            [ "id" => 5, "username" => "cbour4", "avatar_url" => "http://dummyimage.com/173x190.bmp/ff4444/ffffff", "note" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus." ]
        ];

        $data = [
            'notes' => $notes,
        ];
        return new JsonResponse($data);
        return new Response(json_encode($data));
    }
}