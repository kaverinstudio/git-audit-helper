<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditInfo extends Model
{
    use HasFactory;
    protected $keyType = 'string';
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
