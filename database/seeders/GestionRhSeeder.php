<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GestionRhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creer des permissions
        $permissions = [
            'gerer_documents',
            'gerer_employees',
            'gerer_contrats',
            'gerer_conges',
            'gestion_conges',
            'category_conges',
            'listes_conge',
            'gerer_roles',
            'voir_infos',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        //creer des roles

        $administrateur = Role::create(['name' => 'Administrateur']);
        $gestionnaire = Role::create(['name' => 'Gestionnaire']);
        $utilisateurinterne = Role::create(['name' => 'Utilisateur Interne']);

        $gestionnaire->givePermissionTo([
            'gerer_documents',
            'gerer_contrats',
            'voir_infos',
        ]);


        $administrateur->givePermissionTo([
            'gerer_documents',
            'gerer_employees',
            'gerer_contrats',
            'gestion_conges',
            'category_conges',
            'listes_conge',
            'gerer_roles',
        ]);

        $utilisateurinterne->givePermissionTo([
            'gerer_conges',
            'gestion_conges',
            'voir_infos',
        ]);

        //creer des utilisateurs
        $Admin = Employee::create([
            'nom' => 'Beye',
            'prenom' => 'Rokhaya',
            'email' => 'rbeye23@gmail.com',
            'password' => Hash::make('passer@1'),
        ]);
        $Admin->assignRole('Administrateur');


        $gestionnaire = Employee::create([
            'nom' => 'Fall',
            'prenom' => 'Fallou',
            'email' => 'falloufall@gmail.com',
            'password' => Hash::make('passer@2'),
        ]);
        $gestionnaire->assignRole('Gestionnaire');

        $userinterne = Employee::create([
            'nom' => 'sall',
            'prenom' => 'Rokhaya',
            'email' => 'rsall23@gmail.com',
            'password' => Hash::make('passer@3'),
        ]);
        $userinterne->assignRole('Utilisateur Interne');


    }
}
