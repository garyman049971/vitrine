<?php

    namespace App\Controller\Admin;

    use App\Entity\Product;
    use App\Field\VichImageField;
    use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
    use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
    use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
    use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
    use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
    use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
    use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
    use Vich\UploaderBundle\Form\Type\VichImageType;

    class ProductCrudController extends AbstractCrudController
    {
        public static function getEntityFqcn(): string
        {
            return Product::class;
        }


        public function configureFields(string $pageName): iterable
        {
            return [
                IdField::new('id')
                    ->onlyOnIndex(),
                TextField::new('name'),
                MoneyField::new('price')
                    ->setCurrency("EUR"),


                // Champ pour télécharger l'image via VichUploader
                VichImageField::new('file')->setLabel('Télécharger l\'image'),

                // Champ pour afficher l'image dans les listes
                ImageField::new('filename')
                    ->setBasePath('/uploads/users')
                    ->setLabel('Image actuelle')
                    ->onlyOnIndex(),

                BooleanField::new('featured')

            ];
        }

    }
