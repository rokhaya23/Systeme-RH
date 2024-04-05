<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Conge extends Model
{
    use HasFactory ,Notifiable;

    protected $fillable = [
        'idEmployee',
        'idType_conge',
        'date_debut',
        'date_fin',
        'nombre_jour',
        'statut',
        'telephone',
    ];

    // Relation avec l'employé
    public function employees()
    {
        return $this->belongsTo(Employee::class, 'idEmployee');
    }

    // Relation avec le type de congé
    public function typeConge()
    {
        return $this->belongsTo(Gestion_Conge::class, 'idType_conge');
    }
}
