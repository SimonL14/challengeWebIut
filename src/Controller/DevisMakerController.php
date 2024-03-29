<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;

class DevisMakerController extends AbstractController
{
    #[Route('/devis/{id}', name: 'app_devis_maker', methods: ['GET'])]
    public function index($id,EntityManagerInterface $entityManager)
    {
        $event = $entityManager->getRepository(Event::class)->find($id);
        // $html = $this->renderView('MyBundle:Foo:devis.html.twig', array(
        //     'some'  => 'test'
        // ));

        // return new PdfResponse(
        //     $knpSnappyPdf->getOutputFromHtml($html),
        //     'file.pdf'
        // );

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $htmlContent = $this->renderView('devis_maker/body.html.twig', [
            'event' => $event,
            'options' => ["options1", "options2", "options3"]
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($htmlContent);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);

        // return $this->render('devis_maker/devis.html.twig', [
        //     'controller_name' => 'DevisMakerController',
        // ]);
    }
}