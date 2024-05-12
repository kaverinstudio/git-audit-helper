<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditData extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'audit_id',
        'paragraph_qap',
        'questions',
        'requirements',
        'respondent_comments',
        'auditor_comments'
    ];
}
