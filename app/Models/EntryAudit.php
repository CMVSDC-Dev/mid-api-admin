<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryAudit extends Model
{
    use HasFactory;

    protected $table= 'MibEntry_Audit';
}
