<?php

    namespace App\Command;

    use App\Entity\User;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Console\Attribute\AsCommand;
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Style\SymfonyStyle;
    use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

    #[AsCommand(
        name: 'app:create-root-user',
        description: 'Créer un utilisateur root avec des droits administrateurs',
    )]
    class CreateRootUserCommand extends Command
    {
        private EntityManagerInterface $entityManager;
        private UserPasswordHasherInterface $passwordHasher;

        public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
        {
            parent::__construct();
            $this->entityManager = $entityManager;
            $this->passwordHasher = $passwordHasher;
        }

        protected function execute(InputInterface $input, OutputInterface $output): int
        {
            $io = new SymfonyStyle($input, $output);

            // Vérifie si un utilisateur root existe déjà
            $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => 'garybeltou@gmail.com']);
            if ($existingUser) {
                $io->error('L\'utilisateur root existe déjà.');

                return Command::FAILURE;
            }

            // Création de l'utilisateur root
            $user = new User();
            $user->setEmail('garybeltou@gmail.com');
            $user->setRoles(['ROLE_SUPER_ADMIN']);

            // Hashage du mot de passe
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'root');
            $user->setPassword($hashedPassword);

            // Sauvegarde en base de données
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $io->success('Utilisateur root créé avec succès ! Email: garybeltou@gmail.com, Mot de passe: root');

            return Command::SUCCESS;
        }
    }
