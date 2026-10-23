<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // កំណត់ឈ្មោះ Table ក្នុង Database
    protected $table = 'events';

    // កំណត់ Columns ដែលអនុញ្ញាតឱ្យបញ្ចូល/កែប្រែទិន្នន័យបាន (Mass Assignment)
    protected $fillable = [
        'name',
        'host_name',
        'guest_count',
        'total_amount',
        'status',
    ];
}