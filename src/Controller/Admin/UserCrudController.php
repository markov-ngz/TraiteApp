<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud):Crud
    {
        return $crud
            ->setEntityLabelInPlural('Users')
            ->setEntityLabelInSingular('User')
            ->setDateTimeFormat('%%y %%m %%d')
            ->setPageTitle("index", "TraiteApp | usr ")
            ->setPaginatorPageSize(15);
            
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('fullName'),
            TextField::new('email')
                ->setFormTypeOption('disabled','disabled'),
            TextField::new('pseudo'),
            TextField::new('roles')
                ->hideOnIndex(),
        ];
    }
    
}
