<?php

namespace App\Command;

use App\Entity\Loto;
use App\Repository\LotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

#[AsCommand(
    name: 'LotoFromCsv',
    description: 'Récupération des résultats du loto depuis le fichier CSV',
)]
class LotoFromCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private string $dataDirectory;
    private SymfonyStyle $io;

    private LotoRepository $lotoRepository;

    public function __construct(EntityManagerInterface $entityManager, string $dataDirectory, LotoRepository $lotoRepository)
    {
        parent::__construct();
        $this->dataDirectory = $dataDirectory;
        $this->entityManager = $entityManager;
        $this->lotoRepository = $lotoRepository;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->createResults();

        return Command::SUCCESS;
    }

    private function getDataFromFile(): array {
        $file = $this->dataDirectory . 'loto_201911.csv';

        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
        $normalizers = [new ObjectNormalizer()];

        $encoders = [new CsvEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        /** @var string $fileString */
        $fileString = file_get_contents($file);

        $data = $serializer->decode($fileString, $fileExtension);

        dd($data);
    }

    private function createResults(): void {
        $this->io->section('Création des résultats du loto à partir du fichier');
        $this->getDataFromFile();
        $resultCreated = 0;

        foreach ($this->getDataFromFile() as $row) {
            if (array_key_exists('annee_numero_de_tirage', $row) && !empty($row['email'])) {
                $result = $this->lotoRepository->findOneBy([
                    'annee_numero_de_tirage' => $row['annee_numero_de_tirage']
                ]);

                if (!$result) {
                    $result = new Loto();
                    $result->setAnneeNumeroDeTirage($row['annee_numero_de_tirage']);
                    $this->entityManager->persist($result);
                    $resultCreated++;
                }


            }
        }

        $this->entityManager->flush();

        if ($resultCreated > 1) {
            $string = "{$resultCreated} résultats crées en base de données.";
        } elseif ($resultCreated === 1) {
            $string = '1 résultat a été crée en base de données';
        } else {
            $string = 'Aucun résultat n\'a été crée en base de données.';
        }

        $this->io->success($string);

    }
}
