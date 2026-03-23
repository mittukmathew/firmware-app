<?php

namespace App\Controller\Admin;

use App\Entity\SoftwareVersion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class SoftwareVersionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SoftwareVersion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            // Firmware Name (Example: LCI_NBT)
            TextField::new('name')
                ->setHelp('Example: LCI_NBT or STD'),

            // Version (IMPORTANT FIELD)
            TextField::new('systemVersionAlt')
                ->setLabel('Software Version')
                ->setHelp('Example: 3.3.6 or 3.4.3'),

            // Is Latest Version?
            BooleanField::new('isLatest')
                ->setHelp('Only ONE version should be marked as latest'),

            // LCI or not
            BooleanField::new('isLci')
                ->setHelp('Check if this is LCI hardware'),

            // LCI Type (only if LCI = true)
            ChoiceField::new('lciType')
                ->setChoices([
                    'CIC' => 'CIC',
                    'NBT' => 'NBT',
                    'EVO' => 'EVO'
                ])
                ->setRequired(false)
                ->setHelp('Only for LCI devices'),

            // Download Links
            TextField::new('stLink')
                ->setLabel('ST File Link')
                ->setRequired(false),

            TextField::new('gdLink')
                ->setLabel('GD File Link')
                ->setRequired(false),

            TextField::new('mainLink')
                ->setLabel('Main Download Link')
                ->setRequired(false),
        ];
    }
}

